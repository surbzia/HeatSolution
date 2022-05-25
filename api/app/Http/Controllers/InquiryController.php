<?php

namespace App\Http\Controllers;

use App\Http\Requests\InquiryRequest;
use App\Http\Resources\InquiryResource;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Repositories\ListRepository;

class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $listRep;
    public function __construct(ListRepository $listRep)
    {
        $this->listRep = $listRep;
        $this->listRep->bindModel(Inquiry::class);
    }
    public function index()
    {
        Gate::authorize('viewAny',Inquiry::class);
        $query = $this->listRep->listFilteredQuery(['first_name', 'last_name', 'email','phone','message'])
        ->select('inquiries.*');
        if(isset($_GET['perpage'])&&intval($_GET['perpage'])>0){
            $query=$query->paginate($_GET['perpage']);
        }else{
            $query=$query->get();
        }
        return InquiryResource::collection($query);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InquiryRequest $request)
    {
        Gate::authorize('create',Inquiry::class);
        $inquiry = Inquiry::create($request->only('first_name', 'last_name', 'email','phone','message'));
        return new InquiryResource($inquiry);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inquiry  $inquiry
     * @return \Illuminate\Http\Response
     */
    public function show(Inquiry $inquiry)
    {
        Gate::authorize('view',$inquiry);
        return new InquiryResource($inquiry);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inquiry  $inquiry
     * @return \Illuminate\Http\Response
     */
    public function update(InquiryRequest $request, Inquiry $inquiry)
    {
        Gate::authorize('update',$inquiry);
        $inquiry->update($request->only('first_name', 'last_name', 'email', 'phone', 'message'));
        return new InquiryResource($inquiry);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inquiry  $inquiry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inquiry $inquiry)
    {
        Gate::authorize('delete',$inquiry);
        $inquiry->delete();
        return response()->json(null, 204);
    }
}
