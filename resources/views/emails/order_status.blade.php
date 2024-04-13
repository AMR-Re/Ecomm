@component('mail::message')
@php
  $logoUrl = url('front/assets/images/logo-no-background.png'); // Replace with the actual path to your logo
@endphp
<img src="{{ $logoUrl }}" alt="{{ config('app.name') }} Logo" style="height: auto; max-width: 100px;">


    
<p>Hi, {{$order->first_name}} </p>
   <p>Order Status: <b>
@if($order->status==0)
Pending
@elseif($order->status==1)
In Progress
@elseif($order->status==2)
Dilevered
@elseif($order->status==3)
Completed
@elseif($order->status==4)
Cancelled
@endif
    </b>  
 </p>
   <h3>Billing To:</h3>
     <ul>
        <li>{{$order->first_name}}</li>
        <li>{{$order->address1}}</li>
        <li>Order #: {{$order->order_number}}</li>
        <li>Order Date: {{date('y:m:d H:i:s',strtotime($order->created_at))}}</li>
    </ul>
    
<table style="border-collapse: collapse; width:100%; margin-bottom:20px;">
  <thead>
    <tr>
      <th style="border-bottom:1px solid #ddd;padding:8px; text-align: left">Item</th>
      <th style="border-bottom:1px solid #ddd;padding:8px; text-align: left">Quantity</th>
      <th style="border-bottom:1px solid #ddd;padding:8px; text-align: left">Price</th>
    </tr>
  </thead>
<tbody>
@foreach($order->getItem as $item)
<tr>
<td style="border-bottom:1px solid #ddd; padding:8px; text-align: left;">{{$item->getProduct->title}}
    @if(!empty($item->color_name))
    <br>
Color :{{$item->color_name}} 
@endif
@if(!empty($item->size_name))
    Size :{{$item->size_name}}
    <br>
    Size Amount :{{$item->size_amount}}
@endif
</td>  
    <td style="border-bottom:1px solid #ddd; padding:8px; text-align: left;"> {{$item->quantity}}</td>
     <td style="border-bottom:1px solid #ddd; padding:8px; text-align: left;"> ${{number_format($item->price,2)}}</td>
    </tr>
  @endforeach
</tbody>
</table>
<p>Shipping Name:<b>{{$order->getShipping->name}}</b></p>
<p>Shipping Amount:$<b>{{number_format($order->shipping_amount,2)}}</b></p>
@if(!empty($order->discount_code))
<p>Discount Code:<b>{{$order->discount_code}}</b></p>
<p>Discount Amount:${{number_format($order->discount_amount,2)}}</p>
@endif
<p>Total Amount:$<b>{{number_format($order->total_amount,2)}}</b></p>
<p style="text-transform: capitalize;">Payment Method:<b>{{$order->payment_method}}</b></p>
<p>Thanks for choosing <b>Arabica</b>!</p>
<p>We appreciate <b>your</b> business!</p>



Thanks. <br>
{{config('app.name')}}<b>Arabica</b>

@endcomponent











