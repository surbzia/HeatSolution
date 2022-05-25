<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductSaleTypeRequest;
use App\Http\Resources\ProductSaleTypeResource;
use App\Models\ProductSaleType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Repositories\ListRepository;

class ProductSaleTypeController extends Controller
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
        $this->listRep->bindModel(ProductSaleType::class);
    }
    public function index()
    {
        Gate::authorize('viewAny',ProductSaleType::class);
        $query = $this->listRep->listFilteredQuery(['single_qty_text', 'multiple_qty_text'])
        ->select('product_sale_type.*');
        if(isset($_GET['perpage'])&&intval($_GET['perpage'])>0){
            $query=$query->paginate($_GET['perpage']);
        }else{
            $query=$query->get();
        }
        return ProductSaleTypeResource::collection($query);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductSaleTypeRequest $request)
    {
        Gate::authorize('create',ProductSaleType::class);
        $productSaleType = ProductSaleType::create($request->only('single_qty_text', 'multiple_qty_text'));
        return new ProductSaleTypeResource($productSaleType);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductSaleType  $productSaleType
     * @return \Illuminate\Http\Response
     */
    public function show(ProductSaleType $productSaleType)
    {
        Gate::authorize('view',$productSaleType);
        return new ProductSaleTypeResource($productSaleType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductSaleType  $productSaleType
     * @return \Illuminate\Http\Response
     */
    public function update(ProductSaleTypeRequest $request, ProductSaleType $productSaleType)
    {
        Gate::authorize('update',$productSaleType);
        $productSaleType->update($request->only('single_qty_text', 'multiple_qty_text'));
        return new ProductSaleTypeResource($productSaleType);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductSaleType  $productSaleType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductSaleType $productSaleType)
    {
        Gate::authorize('delete',$productSaleType);
        $productSaleType->delete();
        return response()->json(null, 204);
    }
}
