@extends('layouts.app')
@Section('style')
<style type="text/css">
    .form-group{
      margin-bottom:2px,
    }
    </style>  

@endsection
      <!-- End .header -->
@Section('content')

<main class="main">
    <div class="page-header text-center" >
        <div class="container">
            <h1 class="page-title">Orders Details<span>ARABICA!</span></h1>
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
                                    <div class="card">
                                            <div class="form-group">
                                                <label>#Order : <span style="font-weight: normal;">{{$getOrderDetails->order_number}}</span></label>
                                            </div>
                                        <div class="form-group">
                                            <label>Transaction Id :  <span style="font-weight: normal;">{{$getOrderDetails->transaction_id}}</span></label>
                                        </div>
                                        <div class="form-group">
                                            <label>Name :  <span style="font-weight: normal;">{{$getOrderDetails->first_name}} {{$getOrderDetails->last_name}}</span></label>
                                        </div>
                                            <div class="form-group">
                                            <label>Company Name :  <span style="font-weight: normal;">{{$getOrderDetails->company_name}}</span></label>
                                        </div>
                                            <div class="form-group">
                                            <label>Country : <span style="font-weight: normal;">{{$getOrderDetails->country}}</span></label>
                                        </div>
                                            <div class="form-group">
                                            <label>Address : <span style="font-weight: normal;"> {{$getOrderDetails->address1}} {{$getOrderDetails->address2}}</span></label>
                                        </div>
                                            <div class="form-group">
                                            <label>City/Town :  <span style="font-weight: normal;">{{$getOrderDetails->city}}</span></label>
                                            </div>
                                            <div class="form-group">
                                            <label>State/Region : <span style="font-weight: normal;"> {{$getOrderDetails->state}}</span></label>
                                            </div>
                                            <div class="form-group">
                                                <label>Zip.Code : <span style="font-weight: normal;"> {{$getOrderDetails->zip}}</span></label>
                                            </div>
                                            <div class="form-group">
                                            <label>Tel.Number :  <span style="font-weight: normal;">{{$getOrderDetails->tel}}</span></label>
                                            </div>
                                            <div class="form-group">
                                                <label>Discount Code :  <span style="font-weight: normal;">{{$getOrderDetails->discount_code}}</span></label>
                                            </div>
                                            <div class="form-group">
                                                <label>Discount Amount($) :  <span style="font-weight: normal;">{{number_format($getOrderDetails->disount_amount,2)}}</span></label>
                                            </div>
                                            <div class="form-group">
                                                <label>Shipping Name : <span style="font-weight: normal;"> {{$getOrderDetails->getShipping->name}}</span></label>
                                            </div>
                                            <div class="form-group">
                                            <label>Shipping Amount($) :  <span style="font-weight: normal;">{{number_format($getOrderDetails->shipping_amount,2)}}</span></label>
                                            </div>
                                            <div class="form-group">
                                                <label>Total Amount($) :  <span style="font-weight: normal;">{{number_format($getOrderDetails->total_amount,2)}}</span></label>
                                        </div>       
                                        <div class="form-group">
                                            <label style="text-transform: capitalize;">Payment Method : <span style="font-weight: normal;">{{$getOrderDetails->payment_method}}</span> </label>
                                    </div>
                                    <div class="form-group">
                                        <label >Status :  <span style="font-weight: normal;">     @if($getOrderDetails->status==0)
                                            Pending
                                            @elseif($getOrderDetails->status==1)
                                            In Progress
                                            @elseif($getOrderDetails->status==2)
                                            Dilevered
                                            @elseif($getOrderDetails->status==3)
                                            Completed
                                            @elseif($getOrderDetails->status==4)
                                            Cancelled
                                            @endif</span></label>
                                    </div>
                                    <div class="form-group">
                                    <label >Note :  <span style="font-weight: normal;">{{$getOrderDetails->note}}</span></label>
                                    </div>
                                    <div class="form-group">
                                        <label>Created At : <span style="font-weight: normal;"> {{date('d-m-y H:i A',strtotime($getOrderDetails->createdAt))}}</span></label>
                                    </div>
                                    
                                </div>
                              
                       
                              <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header" style="margin-top: 20px;">
                                      <h3 class="card-title">Product Details</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body" style="overflow:auto;">
                                      <table class="table table-striped">
                                        <thead>
                                          <tr>
                                            <th>Image</th>
                                             <th> Title</th>
                                             <th >QTY</th>  
                                             <th>Price</th>   
                                             <th>Size Am $</th>
                                             <th>Total $</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        @foreach($getOrderDetails->getItem as $item)
                                        @php
                                        $getProductImage=$item->getProduct->getImageSingle($item->getProduct->id)
                                      @endphp
                                        <tr>
                                          <td><img style="height: 100px; width:100px;" src="{{$getProductImage->getLogo()}}" alt="Product image"></td> 
                                          <td><a target="_blank" href="{{url($item->getProduct->slug)}}" style="color: black;">{{$item->getProduct->title}}</a>
                                      @if(!empty($item->size_name))
                                            <br>
                                        Size:    {{$item->size_name}}<br>
                                        @endif
                                        @if(!empty($item->color_name))

                                        Color:    {{$item->color_name}}<br>
                                        @endif
                                    </td>
                                          <td>{{$item->quantity}}</td>
                                          <td>{{number_format($item->price,2)}}$</td>
                                        
                                          <td>{{number_format($item->size_amount,2)}}$</td>
                                          <td>{{number_format($item->total_price,2)}}$</td>
                                       
                                        @endforeach
                                          </tbody>
                                      </table>
                                    </div>
                                    <!-- /.card-body -->
                                  </div>
                      
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
       <!-- End .footer -->
       @Section('script')

       
       @endsection