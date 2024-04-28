@extends('layouts.app')
      <!-- End .header -->
@Section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$getPage->title}}</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
    <div class="container">
        <div class="page-header page-header-big text-center" style="background-image: url('{{$getPage->getImage()}}')">
            <h1 class="page-title text-white">{{$getPage->title}}<span class="text-white">ARABICA</span></h1>
        </div><!-- End .page-header -->
    </div><!-- End .container -->

    <div class="page-content pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-3 mb-lg-2">
                    <h2 class="title"><span style="color:#cc9966;">100%</span> Money Back <span style="color:#73BFB8;">Guarrantee</span></h2><!-- End .title -->
                    <p>{!!$getPage->description!!} </p>
                    <br/>
                    <h2 class="title"><span style="color:#cc9966;">Verified</span> Transactions<span style="color:#73BFB8;"> Fraud Detection</span></h2><!-- End .title -->
                    <p>{!!$getPage->description!!} </p>
                </div><!-- End .col-lg-6 -->
              </div>

            <div class="mb-5"></div>
        </div>

      
    </div>
</main>
@endsection
      
   