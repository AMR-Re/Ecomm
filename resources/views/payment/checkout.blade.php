@extends('layouts.app')
@Section('style')
   

@endsection
@Section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('front/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Checkout<span>ARABICA</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">ARABICA</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="checkout">
            <div class="container">
              
                <form action="{{url('checkout/place_order')}}" id="submitForm" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-9">
                            <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>First Name <span style="color: red">*</span></label>
                                        <input type="text" name="first_name" value="{{!empty(Auth::user()->name) ? Auth::user()->name :''}}" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>Last Name <span style="color: red">*</span></label>
                                        <input type="text" name="last_name" value="{{!empty(Auth::user()->last_name) ? Auth::user()->last_name :''}}" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label>Company Name (Optional)</label>
                                <input type="text" name="company_name" value="{{!empty(Auth::user()->company_name) ? Auth::user()->company_name :''}}" class="form-control">

                                <label>Country <span style="color: red">*</span></label>
                                <input type="text" name="country" value="{{!empty(Auth::user()->country) ? Auth::user()->country :''}}" class="form-control" required>

                                <label>Street address <span style="color: red">*</span></label>
                                <input type="text" name="address1" value="{{!empty(Auth::user()->address1) ? Auth::user()->address1 :''}}" class="form-control" placeholder="House number and Street name" required>
                                <input type="text" name="address2" value="{{!empty(Auth::user()->address2) ? Auth::user()->address2 :''}}" class="form-control" placeholder="Appartments, suite, unit etc ..." required>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Town / City <span style="color: red">*</span></label>
                                        <input type="text" name="city" value="{{!empty(Auth::user()->city) ? Auth::user()->city :''}}" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>State <span style="color: red">*</span></label>
                                        <input type="text" name="state" value="{{!empty(Auth::user()->state) ? Auth::user()->state :''}}" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Postcode / ZIP <span style="color: red">*</span></label>
                                        <input type="text" name="zip" value="{{!empty(Auth::user()->zip) ? Auth::user()->zip :''}}" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>Phone <span style="color: red">*</span></label>
                                        <input type="tel" name="tel" value="{{!empty(Auth::user()->tel) ? Auth::user()->tel :''}}" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label>Email address <span style="color: red">*</span></label>
                                <input type="email" name="email" value="{{!empty(Auth::user()->email) ? Auth::user()->email :''}}" class="form-control" required>
                                @if(empty(Auth::check()))
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox"   name="is_create" class="custom-control-input createAcc" id="checkout-create-acc">
                                    <label class="custom-control-label" for="checkout-create-acc">Create an account?</label>
                                </div><!-- End .custom-checkbox -->

                             
                               <div id="showPassword" style="display: none;">
                                 
                                <label>Password <span style="color: red">*</span></label>
                                <input type="text" name="password" id="inputPassword" class="form-control" >

                               </div>
                               @endif
                                <label>Order notes (optional)</label>
                                <textarea class="form-control" name="note" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3">
                            <div class="summary">
                                <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach(Cart::getContent() as $key => $cart)
                                        @php
                                        $getCartProduct= App\Models\ProductModel::getSingle($cart->id)
                                        @endphp
                                           
                                     @if(!empty($getCartProduct))
                                           @php
                                           $getProductImage=$getCartProduct->getImageSingle($getCartProduct->id)
          
                                           @endphp
                                        <tr>
                                            <td><a href="{{url($getCartProduct->slug)}}">{{($getCartProduct->title)}}</a></td>
                                            <td>${{number_format( $cart->price * $cart->quantity ,2)}}</td>
                                        </tr>
                                      @endif
                                      @endforeach
                                        
                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <td>${{number_format(Cart::getSubTotal(),2)}}</td>
                                        </tr><!-- End .summary-subtotal -->
                                            <tr>
                                            <td colspan="2">
                                                <div class="cart-discount">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="getDiscountCode" name="discount_code" placeholder="Discount code">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-primary-2" id="ApplyDiscount" type="button" style="height: 30px;"><i class="icon-long-arrow-right"></i></button>
                                                        </div><!-- .End .input-group-append -->
                                                    </div><!-- End .input-group -->
                                               </div><!-- End .cart-discount -->
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Discount:</td>
                                            <td>$ <span id="getDiscountAmount" ></span> </td>
                                        </tr><!-- End .summary-subtotal -->
                                        <tr class="summary-shipping">
                                            <td>Shipping:</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    @foreach($getShipping as $shipping)
                                        <tr class="summary-shipping-row">
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" data-price="{{!empty($shipping->price) ? $shipping->price:0}}" value="{{$shipping->id}}" id="free-shipping{{$shipping->id}}" name="shipping" class="custom-control-input getShippingPrice" required>
                                                    <label class="custom-control-label " for="free-shipping{{$shipping->id}}">{{$shipping->name}}</label>
                                                </div>
                                            </td>
                                            <td>
                                              @if(!empty($shipping->price))  
                                              ${{number_format($shipping->price,2)}}
                                               @endif
                                            </td>
                                        </tr><!-- End .summary-shipping-row -->
                                        @endforeach
                                 
                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td id="getPayableTotal">${{number_format(Cart::getSubTotal(),2)}}</td>
                                        </tr><!-- End .summary-total -->
                                    </tbody>
                                
                                </table><!-- End .table table-summary -->
                                <input type="hidden" id="getShippingChargeTotal" value="0">
                                
                                <input type="hidden" id="payableTotal" value="{{Cart::getSubTotal()}}">

                                <div class="accordion-summary" id="accordion-payment">

                                    @if(!empty($getPaymentSetting->is_cash_delivery))
                                    <div class="custom-control custom-radio">
                                        <input type="radio" value="Cash On Delivery"  id="Cash_on_delivery" name="payment_method" class="custom-control-input" required>
                                        <label class="custom-control-label " for="Cash_on_delivery">Cash on delivery</label>
                                    </div>
                                    @endif
                                    @if(!empty($getPaymentSetting->is_paypal))

                                    <div class="custom-control custom-radio">
                                        <input type="radio" value="paypal"  id="PayPal" name="payment_method" class="custom-control-input" style="margin-top: 0px;" required>
                                        <label class="custom-control-label " for="PayPal">PayPal</label>
                                    </div>
                                    @endif

                                    @if(!empty($getPaymentSetting->is_stripe))
                                    
                                    <div class="custom-control custom-radio">
                                        <input type="radio" value="stripe"   id="Stripe" name="payment_method" class="custom-control-input" style="margin-top: 0px;" required>
                                        <label class="custom-control-label" for="Stripe">Credit Card (Stripe)</label>
                                    </div>
                                    @endif

                                </div><!-- End .accordion -->

                                <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                    <span class="btn-text">Place Order</span>
                                    <span class="btn-hover-text">Proceed to Checkout</span>
                                </button>
                                <br> <br>
                                <img src="{{url('front/assets/images/payments-summary.png')}}" style="margin-top: 3px;" >

                            </div><!-- End .summary -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </form>
            </div><!-- End .container -->
        </div><!-- End .checkout -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection

@Section('script')
 <script type="text/javascript">


$('body').delegate('.createAcc','change',function (){
    if(this.checked)
    {
        $('#showPassword').show();
        $('#inputPassword').prop('required',true);

    }
    else
    {
        $('#showPassword').hide();
        $('#inputPassword').prop('required',false);

    }

});


$('body').delegate('#submitForm','submit',function(e){
  e.preventDefault();
  $.ajax({
                type:"POST",
                url:"{{url('checkout/place_order')}}",
                data:new FormData(this),
                processData:false,
                contentType:false,
                dataType:"json",
                success:function(data){
               
                    if(data.status==false)
                    {
                        alert(data.message);
                    }
                    else{
                        window.location.href=data.redirect;
                    }
             
                },
                error:function(data){

                }

            });
         });
   

$('body').delegate('.getShippingPrice','change',function (){
    var price=$(this).attr('data-price');
    var total = $('#payableTotal').val();
    $('#getShippingChargeTotal').val(price);
    var final_total=parseFloat(price)+ parseFloat(total);
    $('#getPayableTotal').html(final_total.toFixed(2));


    
   

});
  $('body').delegate('#ApplyDiscount','click',function (){
          var discount_code =$('#getDiscountCode').val();
      
        
       
            $.ajax({
                type:"POST",
                url:"{{url('checkout/apply_discount_code')}}",
                data:{
                    discount_code:discount_code,
                    "_token":"{{csrf_token()}}",
                },
                dataType:"json",
                success:function(data){

                    $('#getDiscountAmount').html(data.discount_amount);
                    var shipping=$('#getShippingChargeTotal').val(price);
                    var final_total=parseFloat(shipping)+parseFloat(data.payable_total);

                    $('#getPayableTotal').html(final_total.toFixed(2));
                    $('#payableTotal').val(data.payable_total);

                    if(data.status==false)
                    {
                        alert(data.message);
                    }
                },
                error:function(data){
                }
            });
         });
</script>

@endsection