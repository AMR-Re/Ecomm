<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-close"></i></span>

        <form action="{{url('search')}}" method="get" class="mobile-search">
            <label for="mobile-search" class="sr-only" >Search</label>
            <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required value="{{!empty(Request::get('mobile-search')) ? Request::get('mobile-search') : '' }}">
            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
        </form>
        
        <nav class="mobile-nav">
            <ul class="mobile-menu">
                <li class="active">
                    <a href="{{url('')}}">Home</a>

                    </li>
                    @php
                    $getCategoryMobile=App\Models\CategoryModel::getRecordMenu();
                    @endphp
                    @foreach($getCategoryMobile as $value_m_c)
                    @if(!empty($value_m_c->getSubCategory()->count()))
                <li>
                    <a href="{{url($value_m_c->slug)}}">{{$value_m_c->name}}</a>
                    <ul>
                        @foreach($value_m_c->getSubCategory as $value_m_sub)
                        <li><a href="{{url($value_m_c->slug.'/'.$value_m_sub->slug)}}">{{$value_m_sub->name}}</a></li>
                       @endforeach
                        <li><a href="{{url('cart')}}">Cart</a></li>
                        <li><a href="{{url('checkout')}}">Checkout</a></li>
                        <li><a href="{{url('wishlist')}}">Wishlist</a></li>
                      
                    </ul>
                </li>
                @endif
                @endforeach
                <li>
                    <a href="product.html" class="sf-with-ul">Product</a>
                    <ul>
                        <li><a href="product.html">Default</a></li>
                        <li><a href="product-centered.html">Centered</a></li>
                        <li><a href="product-extended.html"><span>Extended Info<span class="tip tip-new">New</span></span></a></li>
                        <li><a href="product-gallery.html">Gallery</a></li>
                        <li><a href="product-sticky.html">Sticky Info</a></li>
                        <li><a href="product-sidebar.html">Boxed With Sidebar</a></li>
                        <li><a href="product-fullwidth.html">Full Width</a></li>
                        <li><a href="product-masonry.html">Masonry Sticky Info</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Pages</a>
                    <ul>
                        <li>
                            <a href="{{url('about')}}">About</a>

                            
                        </li>
                        <li>
                            <a href="{{url('contact')}}">Contact</a>

                           
                        </li>
                        @if(empty(Auth::check()))
                        <li><a href="#signin-modal" data-toggle="modal">Login</a></li>
                        @else
                        <li><a href="{{url('admin/logout')}}">LogOut</a></li>

                    @endif
                        <li><a href="{{url('faq')}}">FAQs</a></li>
                        {{-- <li><a href="404.html">Error 404</a></li> --}}
                        <li><a href="coming-soon.html">Coming Soon</a></li>
                    </ul>
                </li>
                </ul>
        </nav><!-- End .mobile-nav -->

        <div class="social-icons">
            <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
        </div><!-- End .social-icons -->
    </div><!-- End .mobile-menu-wrapper -->
</div><!-- End .mobile-menu-container -->