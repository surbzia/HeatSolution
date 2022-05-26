<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Repositories\ListRepository;
use App\Repositories\FileRepository;
use DB;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $listRep;
    protected $file;
    public function __construct(ListRepository $listRep, FileRepository $file)
    {
        $this->listRep = $listRep;
        $this->listRep->bindModel(Service::class);
        $this->file = $file;
    }
    public function index()
    {
        $services = Service::query();
        $services = $services->with('category');
            if(isset($_GET['sortCol'])){
            $services = $services->orderBy($_GET['sortCol'],($_GET['sortByDesc']==1?'desc':'asc'));
        }else{
            $services = $services->orderBy('services.id','desc');
        }
        if(!empty($_GET['search'])){
            $services = $services->Where(
                function($query) {
                $q = $_GET['search'];
                $query
                ->orWhere('services.name', 'like', '%'.$q.'%')
                ->orWhere('services.slug', 'like', '%'.$q.'%')
                ->orWhere('services.description', 'like', '%'.$q.'%')
                ->orWhere('services.short_description', 'like', '%'.$q.'%');
            });
        }
        if(isset($_GET['perpage'])&&intval($_GET['perpage'])>0){
            $services=$services->paginate($_GET['perpage']);
        }else{
            $services=$services->get();
        }
  
        return CategoryResource::collection($services);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function getParents($service, $count=0){
        if($service->parent){
            $count = self::getParents($service->parent, ($count+1));
        }
        return $count;
    }
    public function store(CategoryRequest $request)
    {
        // Gate::authorize('create',Service::class);
        $service = Service::create($request->only('name', 'slug','short_description', 'description', 'category_id', 'is_featured', 'show_in_menu'));
        if($request->image){
            $this->file->create([$request->image], 'services', $service->id, 1);
        }
        if($request->icon){
            $this->file->create([$request->icon], 'services_icon', $service->id, 1);
        }        
        return new CategoryResource($service);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        // Gate::authorize('view',$service);
        return new CategoryResource($service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $service
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Service $service)
    {
        // Gate::authorize('update',$service);
         $service->update($request->only($request->only('name', 'slug','short_description', 'description', 'category_id', 'is_featured', 'show_in_menu')));
        if($request->image){
            $this->file->create([$request->image], 'services', $service->id, 1);
        }
        if($request->icon){
            $this->file->create([$request->icon], 'services_icon', $service->id, 1);
        }
        return new CategoryResource($service);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return response()->json(null, 204);
    }
}
