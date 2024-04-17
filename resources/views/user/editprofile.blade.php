@extends('layouts.app')
@Section('style')
   

@endsection
      <!-- End .header -->
@Section('content')

<main class="main">
    <div class="page-header text-center" >
        <div class="container">
            <h1 class="page-title">Edit Profile<span>ARABICA!</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
   
   

    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <br/>
              <div class="row">
                  @include('user._asidebar')
                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                    
        <p>Hello <span class="font-weight-normal text-dark">{{Auth::user()->name}}</span> (not <span class="font-weight-normal text-dark">User</span>? <a href="#">Log out</a>) 
        <br>
        From your account dashboard you can view your 
        <a href="#tab-orders" class="tab-trigger-link link-underline">recent orders</a>
        , manage your 
        <a href="#tab-address" class="tab-trigger-link">shipping and billing addresses</a>,
            and <a href="#tab-account" class="tab-trigger-link">edit your password and account details</a>.</p>

                                

                       
                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->


@endsection
       <!-- End .footer -->
       @Section('script')

       
       @endsection