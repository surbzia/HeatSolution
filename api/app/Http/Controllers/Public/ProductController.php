<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\Public\GetCategoryRequest;
use App\Http\Requests\Public\ProductByCategory;
use App\Http\Requests\Public\ProductBySlugRequest;
use App\Http\Resources\Public\FrontResource;
use Illuminate\Http\Request;
use App\Models\{Product, Category};

class ProductController extends Controller
{
    public function all()
    {
        return Product::with('category', 'category.parent', 'category.parent.parent', 'category.parent.parent.parent', 'related')->get();
    }
    public function allCategories()
    {
        return Category::all();
    }
    public function categories()
    {
        $categories = Category::query();
        $categories = $categories->with('parent');
        $categories = $categories->orderBy('sort_order', 'asc');
        if (isset($_GET['featured'])) {
            $categories = $categories->where('is_featured', 1);
        }
        if (isset($_GET['show_in_menu'])) {
            $categories = $categories->where('show_in_menu', 1);
        }
      
        if (isset($_GET['perpage']) && intval($_GET['perpage']) > 0) {
            $categories = $categories->paginate(18);
        } else {
            $categories = $categories->get();
        }
        return new FrontResource(['success' => true, 'data' => $categories]);
    }
    public static function childs($category, $arr = [])
    {
        $arr[] = $category->id;
        foreach ($category->children as $child) {
            $arr = self::childs($child, $arr);
        }
        return $arr;
    }
    public function getViaSlug(ProductByCategory $request)
    {

        $arr =  explode('/', $request->slug);
        $lastSlug = $arr[(count($arr) - 1)];
        $products = Product::orderBy('id', 'desc');
        if ($lastSlug != 'all') {
            $category = Category::where('slug', $lastSlug)->first();
            $ids = $this->childs($category);
            $products = $products->whereIn('category_id', $ids);
        }
        if (isset($request->search)) {
            $products = $products->where('name', 'like', '%' . $request->search . '%');
        }
        $products = $products->get();
        return new FrontResource(['success' => true, 'data' => $products]);
    }
    public function index()
    {
        $products = Product::orderBy('id', 'desc');
        if (isset($_GET['featured'])) {
            $products = $products->where('is_featured', 1);
        }
        if (isset($_GET['category_id']) && intval($_GET['category_id']) > 0) {
            $products = $products->where('category_id', intval($_GET['category_id']));
        }
        if (isset($_GET['keyword'])) {
            $products = $products->Where(
                function ($query) {
                    $q = $_GET['keyword'];
                    $query
                        ->orWhere('products.name', 'like', '%' . $q . '%')
                        ->orWhere('products.slug', 'like', '%' . $q . '%')
                        ->orWhere('products.price', 'like', '%' . $q . '%')
                        ->orWhere('products.description', 'like', '%' . $q . '%');
                }
            );
        }
        if (isset($_GET['perpage']) && intval($_GET['perpage']) > 0) {
            $products = $products->paginate(intval($_GET['perpage']));
        } else {
            $products = $products->get();
        }
        // $products = $products->groupBy('category.parent.name');

        return new FrontResource(['success' => true, 'data' => $products]);
    }
    public function get(ProductBySlugRequest $request, $slug)
    {
        $product = Product::where('slug', $slug)->with('related')->firstOrfail();
        $product->load('category', 'category.parent', 'category.parent.parent', 'category.parent.parent.parent');
        return new FrontResource(['success' => true, 'data' => $product]);
    }
    public function category(GetCategoryRequest $request,  $slug)
    {
        $category = Category::where('slug', $slug)->first();
        return new FrontResource(['success' => true, 'data' => $category]);
    }
}
