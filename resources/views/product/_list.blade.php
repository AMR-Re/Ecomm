<div class="products mb-3">
    <div class="row justify-content-center">
        @foreach($getProduct as $value)
        @php
    $getProductImage=$value->getImageSingle($value->id)
        @endphp
        <div class="col-12 @if(!empty($is_home)) col-md-3 col-lg-3 @else col-md-4 col-lg-4 @endif ">
            <div class="product product-7 text-center">
                <figure class="product-media">
                    <span class="product-label label-new">New</span>
                    <a href="{{url($value->slug)}}">
                        @if(!empty($getProductImage)&& !empty($getProductImage->getLogo()))
                        <img style="width: 100%;hieght:280px;object-fit:cover;" src="{{$getProductImage->getLogo() }}" alt="{{$value->title}}" class="product-image">
                         @endif 
                    </a>

                    <div class="product-action-vertical">
                        @if(!empty(Auth::check()))
                        <a href="javascript:;"  id="{{$value->id}}"  class="add_to_wishlist add_to_wishlist{{$value->id}} btn-product-icon  btn-expandable btn-wishlist {{!empty($value->checkWishlist($value->id)) ? 'btn-wishlist-add' : ''}}" title="Wishlist"><span>Add to Wishlist</span></a>
                       @else
                    <a href="#signin-modal" data-toggle="modal" class="btn-product-icon   btn-expandable btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></a>
                    @endif
                    </div><!-- End .product-action-vertical -->

                    <div class="product-action">
                        <a href="{{url($value->slug)}}" class="btn-product btn-cart"><span></span></a>
                    </div><!-- End .product-action -->
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
        </div><!-- End .col-sm-6 col-lg-4 -->
        @endforeach
       
    </div><!-- End .row -->
</div><!-- End .products -->
