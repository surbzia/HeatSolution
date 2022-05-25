<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
</head>

<body>
 <div style="padding: 3px 0px 0px 44px; border: 2px solid #dbdbdb54;">
     <h4 style="margin-bottom: -2px;">Dear Customer,</h4>
     <p>Your order has been recived, below is your generated invoice.</p>
 </div>
  <div style="border: 2px solid #dbdbdb54;">
       <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    </table>
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#fff">
        <tbody>
            <tr>
            </tr>
            <tr>
                <td height="30"></td>
            </tr>
            <tr>
                <td align="center">
                    <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0"
                        style="margin-left:20px; margin-right:20px;">
                        <tbody>
                            <tr>
                                <td width="183" align="left"
                                    style="font-family: 'Raleway', sans-serif; font-size:22px; font-weight: bold; color:#2a3a4b;width: 50%;">
                                    <img src="https://thefreshify.com/images/ftr-logo.png" alt=""
                                        style="width: 34%;height: 84px;">
                                    <p style="margin: 9px 0 0px;font-size: 12px;">
                                         <b>Shop# 12, Plot# FL-4, Block 3,Hamid Square, </b>
                                        <b> Gulshan-e-Iqbal Karachi, 75300</b><br>
                                        <b>info@thefreshify.com</b><br>
                                         <b>0213-4813621</b>
                                    </p>
                                </td>
                                <td align="right"
                                    style="font-family: 'Raleway', sans-serif; font-size:22px; padding-top: 70px; font-weight: bold; color:#2a3a4b;width: 50%;text-align: right;">
                                    <p style="font-size: 12px;"><b>Invoice: {{$order->id}}</b><br>
                                        <b>Date: {{$order->created_date_formatted_us}}</b><br>
                                        {{-- <b>Sales Rep. SAM</b> --}}
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td height="30"></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <table class="col-600" width="580" border="0" align="center" cellpadding="0" cellspacing="0"
                        style="margin-left:20px;margin-right:20px;">
                        <tbody>
                            <tr class="col-600" width="560" style="">
                                <td bgcolor="" align="left"
                                    style="font-family: 'Raleway', sans-serif;font-size: 12px;color:#2a3a4b;padding: 0; ">
                                    <table style="width: 100%;text-align: left;">
                                        <tbody>
                                            <tr>
                                                <th style="border: 2px solid black;text-align: center;">Bill To</th>
                                                <th style="border: 2px solid black;text-align: center;">Ship To</th>
                                            </tr>
                                            <tr>
                                                <td style="border: 2px solid black;">
                                                    <ul style="margin: 20px 0;line-height: 24px;">
                                                        <li style="list-style: none;">{{ $order->billing_first_name }}
                                                            {{ $order->billing_last_name }}</li>
                                                        <li style="list-style: none;">{{ $order->billing_address }}
                                                        </li>
                                                        <li style="list-style: none;">
                                                            {{ $order->billing_city }},{{ $order->billing_state }},
                                                            {{ $order->billing_country }},{{ $order->billing_zipcode }}
                                                        </li>
                                                        <li style="list-style: none;">{{ $order->billing_phone }}</li>
                                                    </ul>
                                                </td>
                                                <td style="border: 2px solid black;">
                                                    <ul style="margin: 20px 0;line-height: 24px;">
                                                        <li style="list-style: none;">
                                                            {{ $order->shipping_first_name }}
                                                            {{ $order->shipping_last_name }}</li>
                                                        <li style="list-style: none;">{{ $order->shipping_address }}
                                                        </li>
                                                        <li style="list-style: none;">
                                                            {{ $order->shipping_city }},{{ $order->shipping_state }},
                                                            {{ $order->shipping_country }},{{ $order->shipping_zipcode }}
                                                        </li>
                                                        <li style="list-style: none;">{{ $order->shipping_phone }}
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>


                    <table class="col-600" width="575" border="0" align="center" cellpadding="0" cellspacing="0"
                        style="
                margin-left: 20px;
                margin-right: 20px;
                border: 2px solid black;
                padding: 7px 10px;
                font-size: 12px;
              ">
                        <tbody style="">
                            <tr style="">
                                <th style="
                      border-right: 1px solid #000;
                      text-align: left;
                      font-size: 12px;
                      white-space: nowrap;
                      padding-right: 10px;
                    ">
                                    S. No
                                </th>
                                <th style="
                      border-right: 1px solid #000;
                      text-align: left;
                      padding: 0 5px;
                      font-size: 12px;
                    ">
                                    Product Name
                                </th>
                                <th style="
                      font-size: 12px;
                      border-right: 1px solid #000;
                      padding: 0 5px;
                      white-space: nowrap;
                    ">
                                    Cost
                                </th>

                                <th style="
                      font-size: 11px;
                      padding: 0 5px;
                      border-right: none;
                    ">
                                    QTY
                                </th>

                                <th style="
                      font-size: 11px;
                      padding: 0 5px;
                      border-right: 1px solid #000;">
                                </th>

                                <th style="font-size: 11px">Sub Total</th>
                            </tr>
                           
                            @foreach ($order->products as $key => $products)
                                <tr>
                                    <td style="border-right: 1px solid #000">{{ $key + 1 }}.</td>
                                    <td style="border-right: 1px solid #000; padding: 6px">
                                        {{ $products->product->name }}
                                    </td>
                                    <td style="border-right: 1px solid #000; padding: 0 4px">
                                        {{$products->product->price }} / KG
                                    </td>
                                    <td style="border-right: navajowhite; padding: 0 4px">
                                        {{ $products->quantity }} KG
                                    </td>
                                    <td style="border-right: 1px solid #000; padding: 0 4px">
                                    </td>
                                    <td style="padding: 0 4px"> PKR {{ $products->rowtotal }}</td>
                                </tr>
                            @endforeach
                            
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr class="subtotal">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td colspan="2" style="border: 1px solid #000; padding: 6px">
                                    SubTotal
                                </td>
                                <td colspan="2" style="border: 1px solid #000; padding: 6px">
                                    PKR {{ $order->subtotal }}
                                </td>
                            </tr>
                            <tr class="subtotal">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td colspan="2" style="border: 1px solid #000; padding: 6px">
                                    Total
                                </td>
                                <td colspan="2" style="border: 1px solid #000; padding: 6px">
                                    PKR {{ $order->total }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td height="20"></td>
            </tr>
            <tr>
                <td height="20"></td>
            </tr>
        </tbody>
    </table>
  </div>

</body>

</html>
