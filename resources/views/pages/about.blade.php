@extends('layouts.app')
      <!-- End .header -->
@Section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About us</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
    <div class="container">
        <div class="page-header page-header-big text-center" style="background-image:url('{{$getPage->getImage()}}') ">
        </div><!-- End .page-header -->
    </div><!-- End .container -->

    <div class="page-content pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-3 mb-lg-2">
                    <h2 class="title">Our Vision</h2><!-- End .title -->
                    <p>{!!$getPage->description!!} </p>
                    <br/>
                    <h2 class="title">Our Vision</h2><!-- End .title -->
                    <p>{!!$getPage->description!!} </p>
                </div><!-- End .col-lg-6 -->
              </div>

            <div class="mb-5"></div>
        </div>

      
    </div>
</main>
@endsection
      
   