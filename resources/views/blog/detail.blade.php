@extends('layouts.app')
      
@Section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('{{url('front/assets/images/page-header-bg.jpg')}}')">
        <div class="container">
            <h1 class="page-title"><span>{{$getBlog->title}}</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('blog')}}">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$getBlog->title}}</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <article class="entry single-entry">
                        <figure class="entry-media">
                            @if(!empty($getBlog->getImage()))
                            <img src="{{$getBlog->getImage()}}" alt="{{$getBlog->title}}">
                            @endif
                        </figure>

                        <div class="entry-body">
                            <div class="entry-meta">
                                <span class="meta-separator"></span>
                                <a href="#">{{date('d M,Y',strtotime($getBlog->created_at))}}</a>
                                <span class="meta-separator">|</span>
                                <a href="#">0 Comments</a>
                                @if(!empty($getBlog->getCategory))
                                <span class="meta-separator">|</span>
                                <a href="{{url('blog/category/'.$getBlog->getCategory->slug)}}">{{$getBlog->getCategory->name}}</a>
                                @endif
                            </div>
                            <br/>

                            <div class="entry-content editor-content">
                                {!!$getBlog->description!!}
                            </div><!-- End .entry-content -->

                     
                        </div><!-- End .entry-body -->

                       
                    </article><!-- End .entry -->

                  @if(!empty($getRelatedPost->count()))

                    <div class="related-posts">
                        <h3 class="title">Related Posts</h3><!-- End .title -->

                        <div class="owl-carousel owl-simple" data-toggle="owl" 
                            data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":1
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    }
                                }
                            }'>
                            @foreach($getRelatedPost as $post)
                            <article class="entry entry-grid">
                                <figure class="entry-media">
                                    <a href="{{url('blog/'.$post->slug)}}">
                                        <img src="{{$post->getImage()}}" alt="image desc">
                                    </a>
                                </figure><!-- End .entry-media -->

                                <div class="entry-body">
                                    <div class="entry-meta">
                                        <a href="#">{{date('d M,Y',strtotime($post->created_at))}}</a>
                                        <span class="meta-separator">|</span>
                                        <a href="#">2 Comments</a>
                                    </div><!-- End .entry-meta -->

                                    <h2 class="entry-title">
                                        <a href="{{url('blog/'.$post->slug)}}">{{$post->title}}</a>
                                    </h2><!-- End .entry-title -->
                                    @if(!empty($post->getCategory))
                                    <div class="entry-cats">
                                      
                                    <a href="{{url('blog/category/'.$post->getCategory->slug)}}">{{$post->getCategory->name}}</a>
                                     </div>
                                    @endif
                                      
                                </div><!-- End .entry-body -->
                            </article><!-- End .entry -->
                            @endforeach
                            @endif
                            </div><!-- End .owl-carousel -->
                    </div><!-- End .related-posts -->

                    <div class="comments">
                        <h3 class="title">3 Comments</h3><!-- End .title -->

                        <ul>
                            <li>
                                <div class="comment">
                                    <figure class="comment-media">
                                        <a href="#">
                                            <img src="assets/images/blog/comments/1.jpg" alt="User name">
                                        </a>
                                    </figure>

                                    <div class="comment-body">
                                        <a href="#" class="comment-reply">Reply</a>
                                        <div class="comment-user">
                                            <h4><a href="#">Jimmy Pearson</a></h4>
                                            <span class="comment-date">November 9, 2018 at 2:19 pm</span>
                                        </div><!-- End .comment-user -->

                                        <div class="comment-content">
                                            <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti. </p>
                                        </div><!-- End .comment-content -->
                                    </div><!-- End .comment-body -->
                                </div><!-- End .comment -->

                                <ul>
                                    <li>
                                        <div class="comment">
                                            <figure class="comment-media">
                                                <a href="#">
                                                    <img src="assets/images/blog/comments/2.jpg" alt="User name">
                                                </a>
                                            </figure>

                                            <div class="comment-body">
                                                <a href="#" class="comment-reply">Reply</a>
                                                <div class="comment-user">
                                                    <h4><a href="#">Lena  Knight</a></h4>
                                                    <span class="comment-date">November 9, 2018 at 2:19 pm</span>
                                                </div><!-- End .comment-user -->

                                                <div class="comment-content">
                                                    <p>Morbi interdum mollis sapien. Sed ac risus.</p>
                                                </div><!-- End .comment-content -->
                                            </div><!-- End .comment-body -->
                                        </div><!-- End .comment -->
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <div class="comment">
                                    <figure class="comment-media">
                                        <a href="#">
                                            <img src="assets/images/blog/comments/3.jpg" alt="User name">
                                        </a>
                                    </figure>

                                    <div class="comment-body">
                                        <a href="#" class="comment-reply">Reply</a>
                                        <div class="comment-user">
                                            <h4><a href="#">Johnathan Castillo</a></h4>
                                            <span class="comment-date">November 9, 2018 at 2:19 pm</span>
                                        </div><!-- End .comment-user -->

                                        <div class="comment-content">
                                            <p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>
                                        </div><!-- End .comment-content -->
                                    </div><!-- End .comment-body -->
                                </div><!-- End .comment -->
                            </li>
                        </ul>
                    </div><!-- End .comments -->
                    <div class="reply">
                        <div class="heading">
                            <h3 class="title">Leave A Reply</h3><!-- End .title -->
                            <p class="title-desc">Your email address will not be published. Required fields are marked *</p>
                        </div><!-- End .heading -->

                        <form action="#">
                            <label for="reply-message" class="sr-only">Comment</label>
                            <textarea name="reply-message" id="reply-message" cols="30" rows="4" class="form-control" required placeholder="Comment *"></textarea>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="reply-name" class="sr-only">Name</label>
                                    <input type="text" class="form-control" id="reply-name" name="reply-name" required placeholder="Name *">
                                </div><!-- End .col-md-6 -->

                                <div class="col-md-6">
                                    <label for="reply-email" class="sr-only">Email</label>
                                    <input type="email" class="form-control" id="reply-email" name="reply-email" required placeholder="Email *">
                                </div><!-- End .col-md-6 -->
                            </div><!-- End .row -->

                            <button type="submit" class="btn btn-outline-primary-2">
                                <span>POST COMMENT</span>
                                <i class="icon-long-arrow-right"></i>
                            </button>
                        </form>
                    </div><!-- End .reply -->
                </div><!-- End .col-lg-9 -->
                <aside class="col-lg-3">
                  @include('blog._sidebar')
                </aside>
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->


@endsection
      
   