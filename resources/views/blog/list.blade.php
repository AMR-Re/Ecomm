@extends('layouts.app')
      <!-- End .header -->
@Section('content')
<main class="main">
    <div class="page-header text-center" style="background-image:url('{{$getPage->getImage()}}'); height:300px;">
        <div class="container">
            <h1 class="page-title"><span>{{$getPage->title}}</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{url('blog')}}">Blog</a></li>
                </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="entry-container max-col-2" data-layout="fitRows">
                        @foreach($getBlog as $blog)
                        <div class="entry-item col-sm-6">
                            <article class="entry entry-grid">
                                <figure class="entry-media">
                                    <a href="{{url('blog/'.$blog->slug)}}">
                                        <img src="{{$blog->getImage()}}" style="height:300px; width:100%; object-fit:cover;">
                                    </a>
                                </figure>

                                <div class="entry-body">
                                    <div class="entry-meta">
                                        <span class="meta-separator">|</span>
                                        <a href="#">{{date('d M,Y',strtotime($blog->created_at))}}</a>
                                        <span class="meta-separator">|</span>
                                        <a href="#">0 Comments</a>
                                    </div>

                                    <h2 class="entry-title">
                                        <a href="{{url('blog/'.$blog->slug)}}">{{$blog->title}}</a>
                                    </h2>
                                </div>
                            </article>
                        </div>
                        @endforeach
            
                    </div>

                    <div style="padding: 10px; float:right;">
                        {!! $getBlog->appends(Illuminate\Support\Facades\Request::except('page'))
                        ->links()!!}
                      </div>
                </div>

                <aside class="col-lg-3">
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
                                <li>
                                    <figure>
                                        <a href="#">
                                            <img src="front/assets/images/blog/sidebar/post-1.jpg" alt="post">
                                        </a>
                                    </figure>

                                    <div>
                                        <span>Nov 22, 2018</span>
                                        <h4><a href="#">Aliquam tincidunt mauris eurisus.</a></h4>
                                    </div>
                                </li>
                                <li>
                                    <figure>
                                        <a href="#">
                                            <img src="front/assets/images/blog/sidebar/post-2.jpg" alt="post">
                                        </a>
                                    </figure>

                                    <div>
                                        <span>Nov 19, 2018</span>
                                        <h4><a href="#">Cras ornare tristique elit.</a></h4>
                                    </div>
                                </li>
                                <li>
                                    <figure>
                                        <a href="#">
                                            <img src="front/assets/images/blog/sidebar/post-3.jpg" alt="post">
                                        </a>
                                    </figure>

                                    <div>
                                        <span>Nov 12, 2018</span>
                                        <h4><a href="#">Vivamus vestibulum ntulla nec ante.</a></h4>
                                    </div>
                                </li>
                                <li>
                                    <figure>
                                        <a href="#">
                                            <img src="front/assets/images/blog/sidebar/post-4.jpg" alt="post">
                                        </a>
                                    </figure>

                                    <div>
                                        <span>Nov 25, 2018</span>
                                        <h4><a href="#">Donec quis dui at dolor  tempor interdum.</a></h4>
                                    </div>
                                </li>
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
                </aside>
            </div>
        </div>
    </div>
</main>
@endsection
      
   