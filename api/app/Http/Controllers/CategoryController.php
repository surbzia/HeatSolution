<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Repositories\ListRepository;
use App\Repositories\FileRepository;
use DB;
class CategoryController extends Controller
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
        $this->listRep->bindModel(Category::class);
        $this->file = $file;
    }
    public function index()
    {
        Gate::authorize('viewAny',Category::class);
        $query = $this->listRep->listFilteredQuery(['categories.name', 'categories.slug', 'categories.short_description','categories.description'])
        ->leftJoin('categories as parent','parent.id','=','categories.parent_id')
        ->select('categories.*',DB::raw("IFNULL(parent.name,'No Parent') as parent_name"));
        $query = $query->orderBy('sort_order', 'desc');
        if(isset($_GET['perpage'])&&intval($_GET['perpage'])>0){
            $query=$query->paginate($_GET['perpage']);
        }else{
            $query = $query->orderByRaw('id, parent_id, categories.level desc')->get();
        }
        return CategoryResource::collection($query);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function getParents($category, $count=0){
        if($category->parent){
            $count = self::getParents($category->parent, ($count+1));
        }
        return $count;
    }
    public function store(CategoryRequest $request)
    {
        Gate::authorize('create',Category::class);
        $category = Category::create($request->only('name', 'slug', 'sort_order', 'short_description', 'description', 'parent_id', 'is_featured', 'show_in_menu'));
        $level = $this->getParents($category, 0);
        $category->level = $level;
        $category->save();
        if($request->image){
            $this->file->create([$request->image], 'categories', $category->id, 1);
        }
        if($request->icon){
            $this->file->create([$request->icon], 'categories_icon', $category->id, 1);
        }        
        return new CategoryResource($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        Gate::authorize('view',$category);
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        Gate::authorize('update',$category);
        $category->update($request->only('name', 'slug', 'sort_order', 'short_description', 'description', 'parent_id', 'is_featured', 'show_in_menu'));
        $level = $this->getParents($category, 0);
        $category->level = $level;
        $category->save();
        if($request->image){
            $this->file->create([$request->image], 'categories', $category->id, 1);
        }
        if($request->icon){
            $this->file->create([$request->icon], 'categories_icon', $category->id, 1);
        }
        return new CategoryResource($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Gate::authorize('delete',$category);
        $category->delete();
        return response()->json(null, 204);
    }
}
