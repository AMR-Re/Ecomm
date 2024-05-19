@extends('layouts.app')
      <!-- End .header -->
@Section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('{{url('front/assets/images/page-header-bg.jpg')}}'); height:300px;">
        <div class="container">
            <h1 class="page-title"><span>{{$getCategory->name}}</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('blog')}}">Blog</a></li>
                <li class="breadcrumb-item active"><a href="#">{{$getCategory->name}}</a></li>
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
                                        <a href="#">{{$blog->getCommentCount()}} Comments</a>
                                    </div>

                                    <h2 class="entry-title">
                                        <a href="{{url('blog/'.$blog->slug)}}">{{$blog->title}}</a>
                                    </h2>
                                    @if(!empty($blog->getCategory))
                                    <div class="entry-cats">
                                      
                                    <a href="{{url('blog/category/'.$blog->getCategory->slug)}}">{{$blog->getCategory->name}}</a>
                                     </div>
                                    @endif
                                    <div class="entry-content">
                                        <p>{{$blog->short_description}}</p>
                                        <a href="{{url('blog/'.$blog->slug)}}" class="read-more">Continue Reading</a>
                                    </div>
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
                    @include('blog._sidebar')
                </aside>
            </div>
        </div>
    </div>
</main>
@endsection
      
   