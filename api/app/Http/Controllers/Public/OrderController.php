<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Order, Cart, User};
use App\Http\Requests\OrderRequest;
use App\Http\Requests\Public\OrderByIDRequest;
use App\Http\Resources\Public\FrontResource;
use App\Jobs\NewOrderNotificationJob;
use App\Mail\Public\AdminOrderMail;
use App\Mail\Public\OrderMail;
use App\Notifications\NewOrderNotification;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index(OrderByIDRequest $request, $id)
    {
        $order = Order::where('id', $id)->firstOrfail();
        $order->load('products', 'products.product');
        return new FrontResource(['success' => true, 'data' => $order]);
    }
    public function store(OrderRequest $request)
    {
        $arr = $request->only(
            'billing_first_name',
            'billing_last_name',
            'billing_address',
            'billing_address_2',
            'billing_city',
            'billing_zip',
            'billing_phone',
            'billing_email',
            'billing_notes',
            'shipping_first_name',
            'shipping_last_name',
            'shipping_address',
            'shipping_address_2',
            'shipping_city',
            'shipping_zip',
            'shipping_phone',
            'subtotal',
            'total',
        );
        if ($request->same_as_billing === true) {
            $arr['shipping_first_name'] = $arr['billing_first_name'];
            $arr['shipping_last_name'] = $arr['billing_last_name'];
            $arr['shipping_address'] = $arr['billing_address'];
            $arr['shipping_address_2'] = $arr['billing_address_2'];
            $arr['shipping_city'] = $arr['billing_city'];
            $arr['shipping_zip'] = $arr['billing_zip'];
            $arr['shipping_phone'] = $arr['billing_phone'];
        }
        $order = Order::create($arr);
        $total = 0;
        foreach ($request->items as $key => $value) {
            $qty = intval($value['quantity']);
            $price = floatval($value['product']['price']);
            $order->products()->create(['product_id' => $value['product']['id'],
                'quantity' => $value['quantity'],
                'rowtotal' => ($price * $qty)
            ]);
            $total += ($price * $qty);
        }
        $order->subtotal = $total;
        $order->total = $total;
        $order->save();


        try {
            $user = User::where('role_id', 1)->first();
            Mail::to($request->billing_email)->send(new OrderMail($order));
            Mail::to('ordersthefreshify@gmail.com')->send(new AdminOrderMail($order));
            NewOrderNotificationJob::dispatch($user, $order)->onQueue('high');
        } catch (Exception $e) {
        }
        return new FrontResource(['success' => true, 'data' => $order]);
    }
    public function storewcart(OrderRequest $request)
    {
        $arr = $request->only(
            'billing_first_name',
            'billing_last_name',
            'billing_address',
            'billing_address_2',
            'billing_city',
            'billing_zip',
            'billing_phone',
            'billing_email',
            'billing_notes',
            'shipping_first_name',
            'shipping_last_name',
            'shipping_address',
            'shipping_address_2',
            'shipping_city',
            'shipping_zip',
            'shipping_phone',
        );
        if ($request->same_as_billing === true) {
            $arr['shipping_first_name'] = $arr['billing_first_name'];
            $arr['shipping_last_name'] = $arr['billing_last_name'];
            $arr['shipping_address'] = $arr['billing_address'];
            $arr['shipping_address_2'] = $arr['billing_address_2'];
            $arr['shipping_city'] = $arr['billing_city'];
            $arr['shipping_zip'] = $arr['billing_zip'];
            $arr['shipping_phone'] = $arr['billing_phone'];
        }
        $order = Order::create($arr);
        $items = Cart::find($request->cart_id)->items;
        foreach ($items as $key => $value) {
            $order->products()->create(['product_id' => $value->product_id,
                'quantity' => $value->quantity,
                'rowtotal' => $value->rowtotal
            ]);
        }


        return new FrontResource(['success' => true, 'data' => $order]);
    }
    public function getUserOrders(Request $request)
    {
        $orders = Order::where('user_id', $request->user()->id)->get();
        return new FrontResource(['success' => true, 'data' => $orders]);
    }
}
