
<div class="sidebar">
    <div class="widget widget-search">
        <h3 class="widget-title">Search</h3>
        <form action="{{url('blog')}}" method="GET">
            <label for="ws" class="sr-only">Search in blog</label>
            <input type="text" class="form-control" name="search" value="{{Request::get('search')}}" id="ws" placeholder="Search in blog">
            <button type="submit" class="btn"><i class="icon-search"></i><span class="sr-only">Search</span></button>
        </form>
    </div><!-- End .widget -->

    <div class="widget widget-cats">
        <h3 class="widget-title">Categories</h3><!-- End .widget-title -->

        <ul>
            @foreach($getBlogCategory as $category)
            <li><a href="{{url('blog/category/'.$category->slug)}}">{{$category->name}}<span>{{$category->getCountBlog()}}</span></a></li>
            @endforeach
       
        </ul>
    </div><!-- End .widget -->

    <div class="widget">
        <h3 class="widget-title">Popular Posts</h3><!-- End .widget-title -->

        <ul class="posts-list">
            @foreach($getPopularPost as $value)
            <li>
                <figure>
                    <a href="#">
                        <img src="{{$value->getImage()}}" alt="{{$value->name}}">
                    </a>
                </figure>

                <div>
                    <span>{{date('d M,Y',strtotime($value->created_at))}}</span>
                    <h4><a href="{{url('blog/'.$value->slug)}}">{{$value->title}}</a></h4>
                </div>
            </li>
            @endforeach
        
        </ul>
    </div>
    <div class="widget widget-banner-sidebar">
        <div class="banner-sidebar-title">Ads</div><!-- End .ad-title -->
        
        <div class="banner-sidebar banner-overlay">
            <a href="#">
                <img src="front/assets/images/blog/sidebar/banner.jpg" alt="banner">
            </a>
        </div><!-- End .banner-ad -->
    </div><!-- End .widget -->
</div>