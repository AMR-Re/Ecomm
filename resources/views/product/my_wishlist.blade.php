@extends('layouts.app')
@Section('style')
<link rel="stylesheet" href="url('{{url('')}}/front/assets/css/plugins/nouislider/nouislider.css')">
<style type="text/css">
.active-color{
    border: 3px solid #000 !important;
}
</style>
@endsection

@Section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('{{url('')}}/front/assets/images/page-header-bg.jpg')">
        <div class="container">
            
                    <h1 class="page-title">My Wishlist</h1>
      
        </div>
    </div>
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:;">My wishlist</a></li>

            </ol>
        </div>
    </nav>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                   
                    <div id="getProductAjax">
                        @include('product._list')

                   </div>
                </div>
                <div class="col-lg-12">
                    {!! $getProduct->appends(Illuminate\Support\Facades\Request::except('page'))
                    ->links()!!}
                </div>
             </div>
        </div>
    </div>
</main>
@endsection
      
       @Section('script')
      
   @endsection