@extends('layouts.app')
      <!-- End .header -->
      @section('style')
      <style type="text/css">
      .banner-img {
        object-fit: cover; /* Or "contain" to avoid cropping */
        width: 100%; /* Or set a specific width */
        aspect-ratio: 16 / 9; /* Optional for specific aspect ratio */
      }
      
 
@media (max-width: 575.99px) {
    .banner-img {
        object-fit:fill; /* Or "contain" to avoid cropping */
        width: 100%; /* Or set a specific width */
        aspect-ratio: 16 / 9; /* Optional for specific aspect ratio */
      }
  .categories {
    flex-direction: column; /* Stack items vertically on mobile */
    
  }
  .category{
    text-align: center;
  display: block;
  margin-left: 111px;
  }
  .banner {
    width: 100%; /* Make each category full width */

  }
  .category{
    text-align: center;
  display: block;
  margin-left: 111px;
  }
}
     
@media (min-width: 576px) and (max-width: 767.99px) {
  .banner {
    width: calc(50% - 15px); /* Two categories per row with some margin */  }
    .category{
    text-align: center;
  display: grid;
  margin-left: 111px;

  }
  .banner-img {
        object-fit:fill; /* Or "contain" to avoid cropping */
        width: 100%; /* Or set a specific width */
        aspect-ratio: 16 / 9; /* Optional for specific aspect ratio */
      }
}

@media (min-width: 768px) and (max-width: 991.99px) {
  .banner {
    width: calc(33.33% - 10px); /* Three categories per row with some margin */
  }
  .category{
    text-align: center;
  display: block;
  margin-left: 111px;
}
.banner-img {
        object-fit:fill; /* Or "contain" to avoid cropping */
        width: 100%; /* Or set a specific width */
        aspect-ratio: 16 / 9; /* Optional for specific aspect ratio */
      }
}
@media (min-width: 992px) and (max-width: 1199.99px) {
  .banner {
    width: calc(100% - 8px); /* Four categories per row with some margin */
  }
  .banner-img {
        object-fit:fill; /* Or "contain" to avoid cropping */
        width: 100%; /* Or set a specific width */
        aspect-ratio: 16 / 9; /* Optional for specific aspect ratio */
      }
  .category{
    text-align: center;
  display: block;
  margin-left: 80px;
}}
      </style>
      
@endsection
    
@Section('content')
        <main class="main">
            <div class="intro-section bg-lighter  pb-6">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="intro-slider-container slider-container-ratio slider-container-1 mb-2 mb-lg-0">
                                <div class="intro-slider intro-slider-1 owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl" data-owl-options='{
                                        "nav": false, 
                                        "responsive": {
                                            "768": {
                                                "nav": true
                                            }
                                        }
                                    }'>
                                    @foreach($getSlider as $slider)
                                    @if(!empty($slider->getImage()))
                                    <div class="intro-slide">
                                        <figure class="slide-image">
                                            <picture>
                                                <source media="(max-width: 480px)" srcset="{{$slider->getImage()}}">
                                                <img src="{{$slider->getImage()}}" alt="Image Desc">
                                            </picture>
                                        </figure>

                                        <div class="intro-content">
                                       
                                            <h1 class="intro-title">{!!$slider->title !!}</h1>
                                            @if(!empty($slider->button_link) && !empty($slider->button_name))
                                            <a href="{{$slider->button_link}}" class="btn btn-outline-white">
                                                <span>{{$slider->button_name}}</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    
                                </div><!-- End .intro-slider owl-carousel owl-simple -->
                                
                                <span class="slider-loader"></span>
                            </div><!-- End .intro-slider-container -->
                        </div><!-- End .col-lg-8 -->
                    
                    </div><!-- End .row -->
                    @if(!empty($getPartner->count()))
                    <div class="mb-6"></div>

                    <div class="owl-carousel owl-simple" data-toggle="owl" 
                        data-owl-options='{
                            "nav": false, 
                            "dots": false,
                            "margin": 30,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":2
                                },
                                "420": {
                                    "items":3
                                },
                                "600": {
                                    "items":4
                                },
                                "900": {
                                    "items":5
                                },
                                "1024": {
                                    "items":6
                                }
                            }
                        }'>
                        @foreach($getPartner as $partner)
                        @if(!empty($partner->getImage()))
                        <a href="{{!empty($partner->button_link)? $partner->button_link : '' }}" class="brand">
                            <img src="{{$partner->getImage()}}" >
                        </a>
                        @endif
                        @endforeach
                        
                    </div>
                    @endif
                </div>
            </div>

            <div class="mb-6"></div>
        @if(!empty($getTrendyProduct))
            <div class="container">
                <div class="heading heading-center mb-3">
                    <h2 class="title-lg">{{!empty($getSetting->trendy_product_title)?$getSetting->trendy_product_title:'Trendy Now'}}</h2><!-- End .title -->

                    
                </div>

                <div class="tab-content tab-content-carousel">
                    <div class="tab-pane p-0 fade show active" id="trendy-all-tab" role="tabpanel" aria-labelledby="trendy-all-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":4,
                                        "nav": true,
                                        "dots": false
                                    }
                                }
                            }'>
                            @foreach($getTrendyProduct as $value)
                            @php
                            $getProductImage=$value->getImageSingle($value->id)
                                @endphp
                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        <span class="product-label label-new">New</span>
                                        <a href="{{url($value->slug)}}">
                                            @if(!empty($getProductImage)&& !empty($getProductImage->getLogo()))
                                            <img class="" style="width: 100%;hieght:280px;object-fit:cover;border-radius: 70% 70% 3px 12px; " src="{{$getProductImage->getLogo() }}" alt="{{$value->title}}" class="product-image">
                                             @endif 
                                        </a>
                    
                                        <div class="product-action-vertical">
                                            @if(!empty(Auth::check()))
                                            <a href="javascript:;"  id="{{$value->id}}"  class="add_to_wishlist add_to_wishlist{{$value->id}} btn-product-icon  btn-expandable btn-wishlist {{!empty($value->checkWishlist($value->id)) ? 'btn-wishlist-add' : ''}}" title="Wishlist"><span>Add to Wishlist</span></a>
                                           @else
                                        <a href="#signin-modal" data-toggle="modal" class="btn-product-icon   btn-expandable btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></a>
                                        @endif
                                        </div><!-- End .product-action-vertical -->
                    
                                      
                                    </figure><!-- End .product-media -->
                    
                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="{{url($value->category_slug.'/'.$value->subcategory_slug)}}">{{$value->subcategory_name}}</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="{{url($value->slug)}}">{{$value->title}}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                           ${{number_format($value->price,2)}}
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: {{$value->getReviewRating($value->id)}}%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( ({{$value->getProductTotalReview()}}) Reviews )</span>
                                        </div><!-- End .rating-container -->
                    
                                     
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                           
                            @endforeach
                           </div><!-- End .owl-carousel -->
                    </div>
                    
                </div>
            </div>
            @endif
        @if(!empty($getCategory->count()))
    		<div class="container categories  pt-6">
        		<h2 class="title-lg text-center mb-4">{{$getSetting->shop_category_title}}</h2>
                <div class="row" style="display: inline-flex;">
                    @foreach($getCategory as $category)
                        @if(!empty($category->getImage()))
        			<div class="col-sm-12 col-lg-4 category banners-sm">
                         <div class="banner banner-display banner-link-anim col-lg-12 col-6  ">
                           
            					<a href="{{url($category->slug)}}">
                    				<img src="{{$category->getImage()}}" class="banner-img category" style="border-radius: 100% 100% 12px 12px;" >
                    			</a>
                    			<div class="banner-content banner-content-center">
                    				<h3 class="banner-title text-white"><a href="{{url($category->slug)}}">{{$category->name}}</a></h3><!-- End .banner-title -->
                    				<a href="{{url($category->slug)}}" class="btn btn-outline-white banner-link">{{$category->button_name}}<i class="icon-long-arrow-right"></i></a>
                    			</div>
                		 </div>
                    </div>
                            @endif
                        @endforeach
        			
        		</div>
            </div>
            <div class="mb-5"></div><!-- End .mb-6 -->
        
            @endif
            <div class="container">
                <div class="heading heading-center mb-6">
                    <h2 class="title">{{!empty($getSetting->recent_arrival_title)?$getSetting->recent_arrival_title:'Recent Arrival'}}</h2><!-- End .title -->

                    <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="top-all-link" data-toggle="tab" href="#top-all-tab" role="tab" aria-controls="top-all-tab" aria-selected="true">All</a>
                        </li>
                        @foreach($getCategory as $category)
                        <li class="nav-item">
                            <a class="nav-link getCategoryProduct" id="top-{{$category->slug}}-link" data-val="{{$category->id}}" data-toggle="tab" href="#top-{{$category->slug}}-tab" role="tab" aria-controls="top-{{$category->slug}}-tab" aria-selected="false">{{$category->name}}</a>
                        </li>
                        @endforeach
                        
                    </ul>
                </div>

                <div class="tab-content">
                    <div class="tab-pane p-0 fade show active" id="top-all-tab" role="tabpanel" aria-labelledby="top-all-link">
                        <div class="products">
                            @php
                            $is_home=1;
                            @endphp
                            @include('product._list')
                        </div>
                            <div class="more-container text-center">
                                <a href="{{url('search')}}" class="btn btn-outline-darker btn-more"><span>Load more products</span><i class="icon-long-arrow-down"></i></a>
                            </div>
                    
                    </div>
                    
                    @foreach($getCategory as $category)
                    <div class="tab-pane p-0 fade getCategoryProduct{{ $category->id }}"
                     id="top-{{$category->slug}}-tab" 
                     role="tabpanel" 
                     aria-labelledby="top-{{$category->slug}}-link">
            
                    </div>
                @endforeach
                </div>
               
            </div>

            <div class="container">
                <hr>
            	<div class="row justify-content-center">
                    <div class="col-lg-4 col-sm-6">
                        <div class="icon-box icon-box-card text-center">
                            <span class="icon-box-icon">
                                <i class="icon-rocket"></i>
                            </span>
                            <div class="icon-box-content">
                                <h3 class="icon-box-title">{{!empty($getSetting->payment_delivery_title)?$getSetting->payment_delivery_title:'Payment & Delivery'}}</h3><!-- End .icon-box-title -->
                                <p>{{!empty($getSetting->payment_delivery_description)?$getSetting->payment_delivery_description:'Free shipping for orders over $50'}}</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-lg-4 col-sm-6 -->

                    <div class="col-lg-4 col-sm-6">
                        <div class="icon-box icon-box-card text-center">
                            <span class="icon-box-icon">
                                <i class="icon-rotate-left"></i>
                            </span>
                            <div class="icon-box-content">
                                <h3 class="icon-box-title">{{!empty($getSetting->refund_title)?$getSetting->refund_title:'Return & Refund'}}</h3><!-- End .icon-box-title -->
                                <p>{{!empty($getSetting->refund_description)?$getSetting->refund_description:'Free 100% money back guarantee'}}</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-lg-4 col-sm-6 -->

                    <div class="col-lg-4 col-sm-6">
                        <div class="icon-box icon-box-card text-center">
                            <span class="icon-box-icon">
                                <i class="icon-life-ring"></i>
                            </span>
                            <div class="icon-box-content">
                                <h3 class="icon-box-title">{{!empty($getSetting->support_title)?$getSetting->support_title:'Quality Support'}}</h3><!-- End .icon-box-title -->
                                <p>{{!empty($getSetting->support_description)?$getSetting->support_description:'Alway online feedback 24/7'}}</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-lg-4 col-sm-6 -->
                </div><!-- End .row -->

                <div class="mb-2"></div><!-- End .mb-2 -->
            </div><!-- End .container -->
            @if(!empty($getBlog->count()))
            <div class="blog-posts pt-7 pb-7" style="background-color: #fafafa;">
                <div class="container">
                   <h2 class="title-lg text-center mb-3 mb-md-4">{{!empty($getSetting->blog_title)?$getSetting->blog_title:'Our Blog'}}</h2><!-- End .title-lg text-center -->
             
                    <div class="owl-carousel owl-simple carousel-with-shadow" data-toggle="owl" 
                        data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "items": 3,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "600": {
                                    "items":2
                                },
                                "992": {
                                    "items":3
                                }
                            }
                        }'>
                        @foreach($getBlog as $blog)
                        <article class="entry entry-display">
                            <figure class="entry-media">
                                <a href="{{url('blog/'.$blog->slug)}}">
                                    <img src="{{$blog->getImage()}}" alt="{{$blog->name}}" style="height:179px; object-fit:cover;">
                                </a>
                            </figure><!-- End .entry-media -->

                            <div class="entry-body pb-4 text-center">
                                <div class="entry-meta">
                                    <a href="#">{{date('d M,Y',strtotime($blog->created_at))}}</a>,&nbsp; <span style="color: #c96"> {{$blog->getCommentCount()}}</span>&nbsp;  Comments
                                </div>

                                <h3 class="entry-title">
                                    <a href="single.html">{{$blog->title}}</a>
                                </h3><!-- End .entry-title -->

                                <div class="entry-content">
                                    <p>{!!$blog->short_description!!}</p>
                                    <a href="{{url('blog/'.$blog->slug)}}" class="read-more">Read More</a>
                                </div>
                            </div>
                        </article>
                        @endforeach
                       
                    </div><!-- End .owl-carousel -->
                  
                </div><!-- container -->

                <div class="more-container text-center mb-0 mt-3">
                    <a href="{{url('blog')}}" class="btn btn-outline-darker btn-more"><span>View more articles</span><i class="icon-long-arrow-right"></i></a>
                </div><!-- End .more-container -->
            </div>
            @endif
            <div class="cta cta-display bg-image pt-4 pb-4" style="background-image: url({{$getSetting->getSUI()}});">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-9 col-xl-8">
                            <div class="row no-gutters flex-column flex-sm-row align-items-sm-center">
                                <div class="col">
                                    <h3 class="cta-title text-white">{{!empty($getSetting->signup_title)? $getSetting->signup_title :'Sign Up & Get 10% Off' }}</h3><!-- End .cta-title -->
                                    <p class="cta-desc text-white">{{!empty($getSetting->signup_description)?$getSetting->signup_description:'Arabica presents the best in interior design'}}</p><!-- End .cta-desc -->
                                </div><!-- End .col -->
                                @if(empty(Auth::check()))
                                <div class="col-auto">
                                    <a href="#signup-modal" data-toggle="modal" class="btn btn-outline-white"><span>SIGN UP</span><i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .col-auto -->
                                @else
                                <div class="col-auto">
                                    <a href="{{url('')}}"  class="btn btn-outline-white"><span>Shop</span><i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .col-auto -->
                                @endif
                            </div><!-- End .row no-gutters -->
                        </div><!-- End .col-md-10 col-lg-9 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .cta -->
        </main><!-- End .main -->
@endsection
@section('script')
<script type="text/javascript">
$('body').delegate('.getCategoryProduct','click',function() {
    var category_id =$(this).attr('data-val');

    $.ajax({
        url:"{{url('recent_arrival_category_product')}}" ,
        type:"POST" ,
        data:{
            "_token":"{{csrf_token()}}",
            category_id:category_id,
            

        },
        dataType:"json",
        success:function(response)
        {
        $('.getCategoryProduct'+category_id).html(response.success)
        },
    });
});
</script>
@endsection
       <!-- End .footer -->
   