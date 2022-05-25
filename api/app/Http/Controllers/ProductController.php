<?php

namespace App\Http\Controllers;

use App\Models\{Product, RelatedProduct};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\ProductResource;
use App\Http\Requests\ProductRequest;
use App\Repositories\FileRepository;

class ProductController extends Controller
{
    protected $file;
    public function __construct(FileRepository $file)
    {
        $this->file = $file;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('viewAny',Product::class);
        if(isset($_GET['sortCol'])){
            $products = Product::orderBy($_GET['sortCol'],($_GET['sortByDesc']==1?'desc':'asc'));
        }else{
            $products = Product::orderBy('products.id','desc');
        }
        if(!empty($_GET['search'])){
            $products = $products->Where(
                function($query) {
                $q = $_GET['search'];
                $query
                ->orWhere('products.name', 'like', '%'.$q.'%')
                ->orWhere('products.slug', 'like', '%'.$q.'%')
                ->orWhere('products.price', 'like', '%'.$q.'%')
                ->orWhere('products.description', 'like', '%'.$q.'%');
            });
        }
        if(isset($_GET['perpage'])&&intval($_GET['perpage'])>0){
            $products=$products->paginate($_GET['perpage']);
        }else{
            $products=$products->get();
        }
        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        Gate::authorize('create',Product::class);
        $product = Product::create($request->only('name', 'slug', 'price', 'description', 'short_description', 'category_id', 'is_featured', 'in_stock', 'product_sale_type_id'));
        if(isset($request->related)&&count($request->related)>0){
            $related = array_map(function($rel_id){
                return ['reference_product'=>$rel_id];
            },$request->related);
            $product->related()->createMany($related);
        }
        $this->file->create([$request->image], 'products', $product->id, 1);
        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        Gate::authorize('view',$product);
        $product->load('related');
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        Gate::authorize('update',$product);
        $product->update($request->only('name', 'slug', 'price', 'description', 'in_stock', 'short_description', 'category_id', 'is_featured', 'product_sale_type_id'));
        $product->related()->delete();
        if(isset($request->related_products)&&count($request->related_products)>0){
            $related = array_map(function($rel_id){
                return ['reference_product'=>$rel_id];
            },$request->related_products);
            $product->related()->createMany($related);
        }
        if($request->image){
            $this->file->create([$request->image], 'products', $product->id, 1);
        }
        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Gate::authorize('delete',$product);
        $product->delete();
        return response()->json(null, 204);
    }
}
