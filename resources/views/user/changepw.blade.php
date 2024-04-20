@extends('layouts.app')
@Section('style')
   

@endsection
      <!-- End .header -->
@Section('content')

<main class="main">
    <div class="page-header text-center" >
        <div class="container">
            <h1 class="page-title">Change Password<span>ARABICA!</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
   
   

    <div class="page-content">
        <div class="dashboard">
            <div class="container">
            @include('layouts.message')

                <br/>
              <div class="row">
                  @include('user._asidebar')
                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                    
                            <h2 class="checkout-title">Change Password</h2><!-- End .checkout-title -->
                            <form action="" id="" method="POST">
                                {{ csrf_field() }}
                            
                            
                            <label>Current Password <span style="color: #c96">Required</span></label>
                            <input type="password" name="password"  class="form-control" placeholder=" Your Current Password" required>

                           
                            <div class="row">
                                <div class="col-sm-6">
                                    <label> Create New Password <span style="color:  rgb(109, 193, 141)">New</span></label>
                                    <input type="password" name="new_password"  class="form-control" required>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Confirm password <span style="color: rgb(109, 193, 141)">Confirm</span></label>
                                    <input type="password" name="c_password"  class="form-control" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            
                           
                                 <button type="submit" class="btn btn-outline-primary-2 ">
                                    <span class="btn-text">Confirm</span>
                                    <span class="btn-hover-text">Change Password</span>
                                </button>

                            </form>
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