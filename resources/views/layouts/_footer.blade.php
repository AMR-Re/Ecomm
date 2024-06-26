<footer class="footer footer-dark">
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="widget widget-about">
                        <img src="{{url('front/assets/images/logo-no-background.svg')}}" class="footer-logo" alt="Footer Logo" width="105" height="25">
                        <p>Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. </p>

                        <div class="social-icons">
                            @if(!empty( $getSystemApp->facebook_link))
                            <a href="{{$getSystemApp->facebook_link}}" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                           @endif
                           @if(!empty( $getSystemApp->twitter_link))
                           <a href="{{$getSystemApp->twitter_link}}" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                           @endif
                           @if(!empty( $getSystemApp->instagram_link))
                           <a href="{{$getSystemApp->instagram_link}}" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                            @endif
                            @if(!empty( $getSystemApp->youtube_link))
                           <a href="{{$getSystemApp->youtube_link}}" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                           @endif
                           @if(!empty( $getSystemApp->pinterest_link))
                            <a href="{{ $getSystemApp->pinterest_link}}" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                            @endif
                        </div><!-- End .soial-icons -->
                    </div><!-- End .widget about-widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Useful Links</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            <li><a href="{{url('about')}}">About Arabica</a></li>
                            <li><a href="{{url('user_guide')}}">How to shop on Arabica</a></li>
                            <li><a href="{{url('faq')}}">FAQ</a></li>
                            <li><a href="{{url('contact')}}">Contact us</a></li>
                            <li><a href="{{url('blog')}}">Blog</a></li>

                            @if(empty(Auth::check()))
                            <li><a href="#signin-modal" data-toggle="modal">Log in</a></li>
                            @else
                            <li><a href="{{url('admin/logout')}}">LogOut</a></li>

                        @endif
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Customer Service</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            <li><a href="{{url('payment_method')}}">Payment Methods</a></li>
                            <li><a href="{{url('money_back_guarantee')}}">Money-back guarantee!</a></li>
                            <li><a href="{{url('returns')}}">Returns</a></li>
                            <li><a href="{{url('shipping')}}">Shipping</a></li>
                            <li><a href="{{url('terms_and_conditions')}}">Terms and conditions</a></li>
                            <li><a href="{{url('privacy_policy')}}">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">My Account</h4>

                        <ul class="widget-list">
                            <li><a href="{{url('cart')}}">View Cart</a></li>
                            @if(!empty(Auth::check()))
                            <li><a href="{{url('my_wishlist')}}">My Wishlist</a></li>
                            @endif
                            <li><a href="{{url('checkout')}}">Checkout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <p class="footer-copyright">Copyright © {{date('Y')}} Arabica. All Rights Reserved.</p><!-- End .footer-copyright -->
            <figure class="footer-payments">
                <img src="{{url('front/assets/images/payments.png')}}" alt="Payment methods" width="272" height="30">
            </figure>
        </div>
    </div>
</footer>