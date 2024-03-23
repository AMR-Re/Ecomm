<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\ProductSizeModel;
use App\Models\DiscountCodeModel;
use App\Models\ShippingChargeModel;
use Darryldecode\Cart\Facades\CartFacade as Cart;



class PaymentController extends Controller
{   
   public function apply_discount_code(Request $request)
   {

     $getDiscount= DiscountCodeModel::checkDiscount(trim($request->discount_code));
       
          if(!empty($getDiscount))
          {
            $total=Cart::getSubTotal();
               if(trim($getDiscount->type )=== 'Amount')
               {
                  $discount_amount=$getDiscount->percent_amount;
                  $payable_total=$total - $discount_amount;

               }
               else
               {
                  $discount_amount=($total * $getDiscount->percent_amount)/100;
                  $payable_total=$total-$discount_amount;
               }
            $json['status']=true;
            $json['discount_amount']=number_format($discount_amount,2);
            $json['payable_total']= $payable_total;
            $json['message']="success";
          }
          else
          {
            $json['status']=false;
            $json['discount_amount']=0;
            $json['payable_total']= number_format(Cart::getSubTotal(),2);
            $json['message']="Invalid Discount Code";

          }

          echo json_encode($json);
   }
   public function checkout(Request $request)
   {
      
      $data['meta_title']='Checkout';
      $data['meta_keywords'] ='Shopping checkout';
      $data['meta_description']='Your Checkout ';
      $data['getShipping']=ShippingChargeModel::getRecordActive();



      return view('payment.checkout',$data);
   }




   public function cart(Request $request)
   {

      $data['meta_title']='Cart';
      $data['meta_keywords'] ='Shopping Cart';
      $data['meta_description']='Your Cart Store';

      return view('payment.cart',$data);

   }

   public function add_to_cart(Request $request)
   {
       $getProduct= ProductModel::getSingle($request->product_id);
       $total= $getProduct->price;
         if(!empty($request->size))
         {
            $size_id=$request->size;
            $getSize= ProductSizeModel::getSingle($size_id);
            
            $size_price= !empty($getSize->price) ? $getSize->price : 0;
            $total= $total + $size_price;
           
         }
         else{
            $size_id=0;
         }

           $color_id=!empty($request->color) ? $request->color : 0;
               Cart::add([
                  'id'=>$getProduct->id,
                  'name'=>'Product',
                  'price'=>$total,
                  'quantity'=>$request->qty,
                  'attributes'=>[
                  'color_id'=>$color_id,
                  'size_id'=>$size_id,
               ]
   
          ]);
   //  dd($total);
   // dd($request->all());
   return redirect()->back();
   }


   public function removeItem($id)
   {
      Cart::remove($id);
      return redirect()->back();
   }


   public function cart_update(Request $request)
   {
   //     dd($request->all());
   //  best practices:
   // PHP
   // **Key-Based Value Access in Associative Arrays:**
   // Within associative arrays, each element is accessed using a unique key,
   // rather than a numerical index. To retrieve a value, provide the corresponding key.
   //
   // In this code, the 'id' key serves as the identifier for cart items.
   // It's used to access specific item details within the loop.

   foreach($request->cart as $key=> $cart)
      Cart::update($key, array(
               'quantity' => array(
               'relative' => false,
               'value' => $cart['qty']
            ),
         ));

     return redirect()->back();
   }
}
