@extends('layouts.app')
      <!-- End .header -->
@Section('content')

<main class="main">
    <div class="page-header  page-header-big text-center" style=" background-image: url('{{$getPage->getImage()}}')">
        <div class="container">
            <h1 class="page-title"><span>ARABICA</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$getPage->title}}</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-3 mb-lg-2">
                    <h2 class="title">People Questioning?</h2><!-- End .title -->
                    <p>{!!$getPage->description!!} </p>
                    <br/>
                    <h2 class="title">Our Policy</h2><!-- End .title -->
                    <p>{!!$getPage->description!!} </p>
                </div><!-- End .col-lg-6 -->
              </div>

            <div class="mb-5"></div>
        </div>

      
    </div>

    <div class="cta cta-display bg-image pt-4 pb-4" style="background-image: url(front/assets/images/backgrounds/cta/bg-7.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9 col-xl-7">
                    <div class="row no-gutters flex-column flex-sm-row align-items-sm-center">
                        <div class="col">
                            <h3 class="cta-title text-white">If You Have More Questions</h3><!-- End .cta-title -->
                            <p class="cta-desc text-white">Quisque volutpat mattis eros</p><!-- End .cta-desc -->
                        </div><!-- End .col -->

                        <div class="col-auto">
                            <a href="{{url('contact')}}" class="btn btn-outline-white"><span>CONTACT US</span><i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .col-auto -->
                    </div><!-- End .row no-gutters -->
                </div><!-- End .col-md-10 col-lg-9 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .cta -->
</main><!-- End .main -->
@endsection
       <!-- End .footer -->
   