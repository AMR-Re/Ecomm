<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\ProductSizeModel;
use App\Models\ColorModel;
use App\Models\User;
use App\Models\DiscountCodeModel;
use App\Models\ShippingChargeModel;
use App\Models\OrderModel;
use App\Models\OrderItemModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Darryldecode\Cart\Facades\CartFacade as Cart;



class PaymentController extends Controller
{
   public function apply_discount_code(Request $request)
   {

      $getDiscount = DiscountCodeModel::checkDiscount(trim($request->discount_code));

      if (!empty($getDiscount)) {
         $total = Cart::getSubTotal();
         if (trim($getDiscount->type) === 'Amount') {
            $discount_amount = $getDiscount->percent_amount;
            $payable_total = $total - $discount_amount;
         } else {
            $discount_amount = ($total * $getDiscount->percent_amount) / 100;
            $payable_total = $total - $discount_amount;
         }
         $json['status'] = true;
         $json['discount_amount'] = number_format($discount_amount, 2);
         $json['payable_total'] = $payable_total;
         $json['message'] = "success";
      } else {
         $json['status'] = false;
         $json['discount_amount'] = 0;
         $json['payable_total'] = number_format(Cart::getSubTotal(), 2);
         $json['message'] = "Invalid Discount Code";
      }

      echo json_encode($json);
   }
   public function checkout(Request $request)
   {

      $data['meta_title'] = 'Checkout';
      $data['meta_keywords'] = 'Shopping checkout';
      $data['meta_description'] = 'Your Checkout ';
      $data['getShipping'] = ShippingChargeModel::getRecordActive();



      return view('payment.checkout', $data);
   }




   public function cart(Request $request)
   {

      $data['meta_title'] = 'Cart';
      $data['meta_keywords'] = 'Shopping Cart';
      $data['meta_description'] = 'Your Cart Store';

      return view('payment.cart', $data);
   }

   public function add_to_cart(Request $request)
   {
      $getProduct = ProductModel::getSingle($request->product_id);
      $total = $getProduct->price;
      if (!empty($request->size)) {
         $size_id = $request->size;
         $getSize = ProductSizeModel::getSingle($size_id);

         $size_price = !empty($getSize->price) ? $getSize->price : 0;
         $total = $total + $size_price;
      } else {
         $size_id = 0;
      }

      $color_id = !empty($request->color) ? $request->color : 0;
      Cart::add([
         'id' => $getProduct->id,
         'name' => 'Product',
         'price' => $total,
         'quantity' => $request->qty,
         'attributes' => [
            'color_id' => $color_id,
            'size_id' => $size_id,
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

      foreach ($request->cart as $key => $cart)
         Cart::update($key, array(
            'quantity' => array(
               'relative' => false,
               'value' => $cart['qty']
            ),
         ));

      return redirect()->back();
   }


   public function place_order(Request $request)
   {
      $validate = 0;
      $message = '';
      if (!empty(Auth::check())) {
         $user_id = Auth::user()->id;
      } else {
         if (!empty($request->is_create)) {
            $checkEmail = User::checkEmail($request->email);
            if (!empty($checkEmail)) {

               $message = 'This email already registered Please choose  another';
               $validate = 0;
            } else {
               $save = new User;
               $save->name = trim($request->first_name);
               $save->email = trim($request->email);
               $save->password = Hash::make($request->password);
               $save->save();
               $user_id = $save->id;
            }
         } else {
            $user_id = "";
         }
      }



      if (empty($validate)) {

         $getShipping = ShippingChargeModel::getSingle($request->shipping);
         $payable_total = Cart::getSubTotal();
         $discount_amount = 0;
         $discount_code = '';
         if (!empty($request->discount_code)) {

            $getDiscount = DiscountCodeModel::checkDiscount($request->discount_code);
            if (!empty($getDiscount)) {
               $discount_code = $request->discount_code;
               if (trim($getDiscount->type) === 'Amount') {
                  $discount_amount = $getDiscount->percent_amount;
                  $payable_total = $payable_total - $discount_amount;
               } else {
                  $discount_amount = ($payable_total * $getDiscount->percent_amount) / 100;
                  $payable_total = $payable_total - $discount_amount;
               }
            }
         }
         $shipping_amount = !empty($getShipping->price) ? $getShipping->price : 0;
         $total_amount = $payable_total + $shipping_amount;


         $order = new OrderModel;
         if (!empty($user_id)) {
            $order->user_id = trim($user_id);
         }
         $order->first_name = trim($request->first_name);
         $order->last_name = trim($request->last_name);
         $order->company_name = trim($request->company_name);
         $order->country = trim($request->country);
         $order->address1 = trim($request->address1);
         $order->address2 = trim($request->address2);
         $order->city = trim($request->city);
         $order->state = trim($request->state);
         $order->zip = trim($request->zip);
         $order->tel = trim($request->tel);
         $order->email = trim($request->email);
         $order->note = trim($request->note);
         $order->discount_code = trim($discount_code);
         $order->discount_amount = trim($discount_amount);
         $order->shipping_id = trim($request->shipping);
         $order->shipping_amount = trim($shipping_amount);
         $order->total_amount = trim($total_amount);
         $order->payment_method = trim($request->payment_method);
         $order->save();

         foreach (Cart::getContent() as $key => $cart) {
            // dd($cart);

            $order_item = new OrderItemModel;
            $order_item->order_id = $order->id;
            //we take the item info from cart
            $order_item->product_id = $cart->id;
            $order_item->quantity = $cart->quantity;
            $order_item->price = $cart->price;

            $color_id = $cart->attributes->color_id;
            if (!empty($color_id)) {
               $getColor = ColorModel::getSingle($color_id);
               $order_item->color_name = $getColor->name;
            }
            $size_id = $cart->attributes->size_id;
            if (!empty($size_id)) {
               $getSize = ProductSizeModel::getSingle($size_id);
               $order_item->size_name = $getSize->name;
               $order_item->size_amount = $getSize->price;
            }

            $order_item->total_price = $cart->price;
            $order_item->save();
         }

         $json['status'] = true;
         $json['message'] = 'success';
         $json['redirect'] = url('checkout/payment?order_id='.base64_encode($order->id));

      } else {
         $json['status'] = false;
         $json['message'] = $message;
      }

      echo json_encode($json);
         
      //  dd($request->all());
      
   }


   public function checkout_payment(Request $request) 
   {
      if(!empty(Cart::getSubTotal()) && !empty($request->order_id))
      {
         $order_id= base64_decode($request->order_id);
         $getOrder=OrderModel::getSingle($order_id);
         if(!empty($getOrder))
         {
           if($getOrder->payment_method=='Cash On Delivery')
           {
            $getOrder->is_payment=1;
            $getOrder->save();
             Cart::clear();
             
            return redirect('cart')->with('success','Order Successfully placed');

           }
           elseif($getOrder->payment_method=='paypal')
            {

            }
            elseif($getOrder->payment_method=='stripe')
            {

            }
         }
         else
         {

         }

      }
      else
      {
         abort(404);
      }
      
   }
}
