@extends('layouts.app')
@Section('style')
   

@endsection
      <!-- End .header -->
@Section('content')

<main class="main">
    <div class="page-header text-center" >
        <div class="container">
            <h1 class="page-title">Orders<span>ARABICA!</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
   
   

    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <br/>
              <div class="row">
                  @include('user._asidebar')
                    <div class=" col-md-8 col-lg-9">
                        <div class="tab-content" style="box-sizing:content-box;">
                    <div class="card-body" style="box-sizing:content-box;">
                              <table class=" table-striped" style="box-sizing:content-box; border-collapse:separate;">
                                <thead>
                                  <tr>
                             
                                    <th>Order Number</th>
                                     <th>Total Amount($)</th>
                                     <th>Payment Method</th>
                                     <th>Status</th>
                                     <th>CreatedAt</th>
                                     <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($getOrders as $value)
                                  <tr>
                                
                                    <td style="padding-left:8px;">{{$value->order_number}}</td>
                                    <td>{{number_format($value->total_amount,2)}}</td>
                                    <td style="text-transform: capitalize;">{{$value->payment_method}}</td>
                                    <td>
                                        @if($value->status==0)
                                        Pending
                                        @elseif($value->status==1)
                                        In Progress
                                        @elseif($value->status==2)
                                        Dilevered
                                        @elseif($value->status==3)
                                        Completed
                                        @elseif($value->status==4)
                                        Cancelled
                                        @endif
                                      </td>
                                    <td>{{date('d-m-y H:i A',strtotime(($value->created_at)))}}</td>
                                    <td>
                                    <a href="{{url('user/orders/details/'.$value->id)}}" class="btn btn-primary">Details</a>  
                                    </td>
                                  </tr>
                                  @endforeach
                                  </tbody>
                              </table>
                    </div>
                              <div style="padding: 10px; float:right;">
                                {!! $getOrders->appends(Illuminate\Support\Facades\Request::except('page'))
                                ->links()!!}
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