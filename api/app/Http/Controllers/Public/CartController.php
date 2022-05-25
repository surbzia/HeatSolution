<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\Public\AddToCartRequest;
use App\Http\Requests\Public\GetCartByIdRequest;
use App\Http\Resources\Public\FrontResource;
use Illuminate\Http\Request;
use App\Models\{Cart, Product};
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CartController extends Controller
{
    public function index(Request $request){
        $cart = Cart::create([
            'user_id'=>($request->user()?$request->user()->id:0),
            'coupon_id'=>0,
            'total'=>0,
        ]);
        return new FrontResource(['success' => true, 'data' => $cart]);
    }
    public function get(GetCartByIdRequest $request, $id)
    {
        $cart = Cart::where('id', $id)->firstOrfail();
        return new FrontResource(['success' => true, 'data' => $cart]);
    }
    public function item(AddToCartRequest $request, Cart $cart)
    {

        $product = Product::findOrfail($request->product_id);
        $cart->items()->where('product_id',$request->product_id)
        ->where('variation_id',(isset($request->variation_id)?$request->variation_id:0))->delete();
        $cart->items()->create([
            'product_id'=>$request->product_id,
            'variation_id'=>(isset($request->variation_id)?$request->variation_id:0),
            'quantity'=>$request->quantity,
            'rowtotal'=>($product->price*$request->quantity)
        ]);
        $cart->update(['total'=>$cart->items()->sum('rowtotal')]);
        $cart->refresh();
        return new FrontResource(['success' => true, 'data' => $cart]);
    }
    public function update_quantity(Request $request, Cart $cart)
    {
        $product = Product::findOrfail($request->product_id);
        $cart->items()->where('id', $request->item_id)->where('product_id', $request->product_id)->update([
            'product_id' => $request->product_id,
            'variation_id' => (isset($request->variation_id) ? $request->variation_id : 0),
            'quantity' => $request->quantity,
            'rowtotal' => ($product->price * $request->quantity)
        ]);
        $cart->update(['total' => $cart->items()->sum('rowtotal')]);
        $cart->refresh();
        return new FrontResource(['success' => true, 'data' => $cart]);
    }
    public function deleteCartItem(Request $request, Cart $cart)
    {
        $cart->items()->where('id', $request->item_id)->delete();
        $cart->update(['total' => $cart->items()->sum('rowtotal')]);
        $cart->refresh();
        return new FrontResource(['success' => true, 'data' => $cart]);
    }
}
