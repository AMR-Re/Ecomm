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
              
                <form action="#">
                    <div class="row">
                        <div class="col-lg-9">
                            <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>First Name *</label>
                                        <input type="text" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>Last Name *</label>
                                        <input type="text" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label>Company Name (Optional)</label>
                                <input type="text" class="form-control">

                                <label>Country *</label>
                                <input type="text" class="form-control" required>

                                <label>Street address *</label>
                                <input type="text" class="form-control" placeholder="House number and Street name" required>
                                <input type="text" class="form-control" placeholder="Appartments, suite, unit etc ..." required>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Town / City *</label>
                                        <input type="text" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>State / County *</label>
                                        <input type="text" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Postcode / ZIP *</label>
                                        <input type="text" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>Phone *</label>
                                        <input type="tel" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label>Email address *</label>
                                <input type="email" class="form-control" required>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkout-create-acc">
                                    <label class="custom-control-label" for="checkout-create-acc">Create an account?</label>
                                </div><!-- End .custom-checkbox -->

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkout-diff-address">
                                    <label class="custom-control-label" for="checkout-diff-address">Ship to a different address?</label>
                                </div><!-- End .custom-checkbox -->

                                <label>Order notes (optional)</label>
                                <textarea class="form-control" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
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
                                                        <input type="text" class="form-control" id="getDiscountCode"  placeholder="Discount code">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-primary-2" id="ApplyDiscount" type="button" style="height: 30px;"><i class="icon-long-arrow-right"></i></button>
                                                        </div><!-- .End .input-group-append -->
                                                    </div><!-- End .input-group -->
                                               </div><!-- End .cart-discount -->
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Discount:</td>
                                            <td>$ <span id="getDiscountAmount"></span> </td>
                                        </tr><!-- End .summary-subtotal -->
                                        <tr class="summary-shipping">
                                            <td>Shipping:</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    @foreach($getShipping as $shipping)
                                        <tr class="summary-shipping-row">
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" data-price="{{!empty($shipping->price) ? $shipping->price:0}}" id="free-shipping{{$shipping->id}}" name="shipping" class="custom-control-input getShippingPrice">
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
                                <input type="text" id="getShippingChargeTotal" value="0">
                                
                                <input type="text" id="payableTotal" value="{{Cart::getSubTotal()}}">

                                <div class="accordion-summary" id="accordion-payment">
                                    <div class="card">
                                        <div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#accordion-payment">
                                            <div class="card-body">
                                                Ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. 
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->

                                    <div class="card">
                                        <div class="card-header" id="heading-3">
                                            <h2 class="card-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                                    Cash on delivery
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-payment">
                                            <div class="card-body">Quisque volutpat mattis eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. 
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->

                                    <div class="card">
                                        <div class="card-header" id="heading-4">
                                            <h2 class="card-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                                                    PayPal <small class="float-right paypal-link">What is PayPal?</small>
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-4" class="collapse" aria-labelledby="heading-4" data-parent="#accordion-payment">
                                            <div class="card-body">
                                                Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum.
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->

                                    <div class="card">
                                        <div class="card-header" id="heading-5">
                                            <h2 class="card-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-5" aria-expanded="false" aria-controls="collapse-5">
                                                    Credit Card (Stripe)
                                                    <img src="front/assets/images/payments-summary.png" alt="payments cards">
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-5" class="collapse" aria-labelledby="heading-5" data-parent="#accordion-payment">
                                            <div class="card-body"> Donec nec justo eget felis facilisis fermentum.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Lorem ipsum dolor sit ame.
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->
                                </div><!-- End .accordion -->

                                <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                    <span class="btn-text">Place Order</span>
                                    <span class="btn-hover-text">Proceed to Checkout</span>
                                </button>
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


$('body').delegate('.getShippingPrice','change',function (){
    var price=$(this).attr('data-price');
    var total = $('#payableTotal').val();
    $('#getShippingChargeTotal').val(price);
    var final_total=parseFloat(price)+ parseFloat(total);
    $('#getPayableTotal').html(final_total.toFixed(2));


    
    console.log(price);

});
  $('body').delegate('#ApplyDiscount','click',function (){
          var discount_code =$('#getDiscountCode').val();
      
          // console.log(page);
       
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