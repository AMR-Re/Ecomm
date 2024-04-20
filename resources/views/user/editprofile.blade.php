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
            @include('layouts.message')

                <br/>
              <div class="row">
                  @include('user._asidebar')
                    <div class="col-md-8 col-lg-9">
                       
                        <div class="tab-content">
                    
                            <h2 class="checkout-title">Profile Details</h2><!-- End .checkout-title -->
                            <form action="" id="" method="POST">
                                {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>First Name <span style="color: red">*</span></label>
                                    <input type="text" name="first_name" value="{{$getRecord->name}}" class="form-control" required>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Last Name <span style="color: red">*</span></label>
                                    <input type="text" name="last_name" value="{{$getRecord->last_name}}" class="form-control" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->
                            
                            <label>Email address <span style="color: rgb(0, 255, 89)">verified</span></label>
                            <input type="email" name="email"  class="form-control"value="{{$getRecord->email}}" placeholder="NonChangeable">

                            <label>Company Name (Optional)</label>
                            <input type="text" name="company_name" value="{{$getRecord->company_name}}" class="form-control">

                            <label>Country <span style="color: red">*</span></label>
                            <input type="text" name="country" class="form-control" value="{{$getRecord->country}}" required>

                            <label>Street address <span style="color: red">*</span></label>
                            <input type="text" name="address1" value="{{$getRecord->address1}}" class="form-control" placeholder="House number and Street name" required>
                            <input type="text" name="address2" value="{{$getRecord->address2}}" class="form-control" placeholder="Appartments, suite, unit etc ..." required>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Town / City <span style="color: red">*</span></label>
                                    <input type="text" name="city" value="{{$getRecord->city}}" class="form-control" required>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>State <span style="color: red">*</span></label>
                                    <input type="text" name="state" value="{{$getRecord->state}}" class="form-control" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Postcode / ZIP <span style="color: red">*</span></label>
                                    <input type="text" name="zip" value="{{$getRecord->zip}}" class="form-control" required>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Phone <span style="color: red">*</span></label>
                                    <input type="tel" name="tel" value="{{$getRecord->tel}}" class="form-control" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                           
                                 <button type="submit" class="btn btn-outline-primary-2 ">
                                    <span class="btn-text">Update</span>
                                    <span class="btn-hover-text">Save Profile</span>
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