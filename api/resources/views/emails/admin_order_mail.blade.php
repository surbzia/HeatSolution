@component('mail::message')
# Order Received..  



* Order #  : {{$order->id}}
* Cutomer Name    : {{$order->shipping_first_name}} {{$order->shipping_last_name}}
* Customer Email  : {{$order->shipping_email}}
* Invoice Total  : PKR {{$order->total}}

 @component('mail::table')
| S#    | Product Name   | Quantity     |
|-------|----------------|---------------|
@foreach ($order->products as $key => $item)
| {{$key +1}}   | {{$item->product->name }}  | {{$item->quantity}} |
@endforeach
@endcomponent



Thanks,<br>
{{ config('app.name') }}
@endcomponent
