@extends('layouts.app')
@Section('style')
   <style type="text/css">
   .box-btn{
padding: 10px; text-align: center; border-radius: 5px; box-shadow: 0 0 1px rgba(0,0,0,.125),0 1px 3px rgba(0,0,0,.2);

   }
   </style>

@endsection
      <!-- End .header -->
@Section('content')

<main class="main">
    <div class="page-header text-center" >
        <div class="container">
            <h1 class="page-title">My Dashboard<span>ARABICA!</span></h1>
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
                                        
                        <div class="row">
                            <div class="col-md-3">
                                <div class="box-btn">
                                    <div style="font-size: 20px; font-weight:bold;">{{$TotalOrder}}</div>
                                    <div style="font-size: 16px;">Total Orders</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="box-btn">
                                    <div style="font-size: 20px; font-weight:bold;">{{$TotalTodayOrder}}</div>
                                    <div style="font-size: 16px;">Today Orders</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="box-btn" >
                                    <div style="font-size: 20px; font-weight:bold;">${{number_format($TotalTodayPayments,2)}}</div>
                                    <div style="font-size: 16px;">Today Payments</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="box-btn">
                                    <div style="font-size: 20px; font-weight:bold;">${{number_format($TotalPayments,2)}}</div>
                                    <div style="font-size: 16px;">Total Payments</div>
                                </div>
                            </div>
                            <div class="col-md-3 pt-1">
                                <div class="box-btn" >
                                    <div style="font-size: 20px; font-weight:bold; color: rgb(54, 229, 147);">{{$TotalCompleted}}</div>
                                    <div style="font-size: 16px; color: rgb(54, 229, 147);">Completed Orders</div>
                                </div>
                            </div>
                            <div class="col-md-3 pt-1">
                                <div class="box-btn">
                                    <div style="font-size: 20px; font-weight:bold;">{{$TotalInProgress }}</div>
                                    <div style="font-size: 16px;">In Progress Orders</div>
                                </div>
                            </div>
                            <div class="col-md-3 pt-1">
                                <div class="box-btn">
                                    <div style="font-size: 20px; font-weight:bold;">{{$TotalPending}}</div>
                                    <div style="font-size: 16px;">Pending Orders</div>
                                </div>
                            </div>
                          
                            <div class="col-md-3 pt-1">
                                <div class="box-btn">
                                    <div style="font-size: 20px; font-weight:bold;color: rgb(253, 118, 118);">{{$TotalCanceled}}</div>
                                    <div style="font-size: 16px;color: rgb(253, 118, 118);">Canceled Orders</div>
                                </div>
                            </div>
                        </div>
                   

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