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
                           @include('layouts.message')
                                    <div class="card">
                                            <div class="form-group">
                                                <label><b>#Order :</b> <span style="font-weight: normal;">{{$getOrderDetails->order_number}}</span></label>
                                            </div>
                                            @if(!empty($getOrderDetails->transaction_id))
                                        <div class="form-group">
                                            <label><b>Transaction Id :</b>  <span style="font-weight: normal;">{{$getOrderDetails->transaction_id}}</span></label>
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <label><b>Name :</b>  <span style="font-weight: normal;">{{$getOrderDetails->first_name}} {{$getOrderDetails->last_name}}</span></label>
                                        </div>
                                            <div class="form-group">
                                            <label><b>Company Name :</b>  <span style="font-weight: normal;">{{$getOrderDetails->company_name}}</span></label>
                                        </div>
                                            <div class="form-group">
                                            <label><b>Country :</b> <span style="font-weight: normal;">{{$getOrderDetails->country}}</span></label>
                                        </div>
                                            <div class="form-group">
                                            <label><b>Address :</b> <span style="font-weight: normal;"> {{$getOrderDetails->address1}} {{$getOrderDetails->address2}}</span></label>
                                        </div>
                                            <div class="form-group">
                                            <label><b>City/Town :</b>  <span style="font-weight: normal;">{{$getOrderDetails->city}}</span></label>
                                            </div>
                                            <div class="form-group">
                                            <label><b>State/Region :</b> <span style="font-weight: normal;"> {{$getOrderDetails->state}}</span></label>
                                            </div>
                                            <div class="form-group">
                                                <label><b>Zip.Code :</b> <span style="font-weight: normal;"> {{$getOrderDetails->zip}}</span></label>
                                            </div>
                                            <div class="form-group">
                                            <label><b>Tel.Number :</b>  <span style="font-weight: normal;">{{$getOrderDetails->tel}}</span></label>
                                            </div>
                                            <div class="form-group">
                                                <label><b>Discount Code :</b>  <span style="font-weight: normal;">{{$getOrderDetails->discount_code}}</span></label>
                                            </div>
                                            <div class="form-group">
                                                <label><b>Discount Amount($) :</b>  <span style="font-weight: normal;">{{number_format($getOrderDetails->disount_amount,2)}}</span></label>
                                            </div>
                                            <div class="form-group">
                                                <label><b>Shipping Name :</b> <span style="font-weight: normal;"> {{$getOrderDetails->getShipping->name}}</span></label>
                                            </div>
                                            <div class="form-group">
                                            <label><b>Shipping Amount($) :</b>  <span style="font-weight: normal;">{{number_format($getOrderDetails->shipping_amount,2)}}</span></label>
                                            </div>
                                            <div class="form-group">
                                                <label> <b>Total Amount($) :</b>  <span style="font-weight: normal;">{{number_format($getOrderDetails->total_amount,2)}}</span></label>
                                        </div>       
                                        <div class="form-group">
                                            <label style="text-transform: capitalize;"><b>Payment Method : </b><span style="font-weight: normal;">{{$getOrderDetails->payment_method}}</span> </label>
                                    </div>
                                    <div class="form-group">
                                        <label ><b>Status :</b>  <span style="font-weight: normal;">     @if($getOrderDetails->status==0)
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
                                    <label> <b>Note :</b>  <span style="font-weight: normal;">{{$getOrderDetails->note}}</span></label>
                                    </div>
                                    <div class="form-group">
                                        <label><b>Created At : </b><span style="font-weight: normal;"> {{date('d-m-y H:i A',strtotime($getOrderDetails->created_at))}}</span></label>
                                    </div>
                                    
                                </div>
                              
                       
                              <div class="col-md-12 sm-6">
                                <div class="card">
                                    <div class="card-header" style="margin-top: 20px;">
                                      <h3 class="card-title">Product Details</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body" style="box-sizing:content-box">
                                      <table class="table table-striped">
                                        <thead>
                                          <tr>
                                            <th>Image</th>
                                             <th>Title</th>
                                             <th >QTY&nbsp;&nbsp;</th>  
                                             <th><small>Price</small></th>   
                                             <th>Total$</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        @foreach($getOrderDetails->getItem as $item)
                                        @php
                                        $getProductImage=$item->getProduct->getImageSingle($item->getProduct->id)
                                      @endphp
                                        <tr>
                                          <td style="max-width:200px;"><img style="height:100px; width:100px;" src="{{$getProductImage->getLogo()}}" alt="Product image"></td> 
                                          <td style="max-width: 100px; padding-left:2px;" ><a target="_blank" href="{{url($item->getProduct->slug)}}" style="color: black;">{{$item->getProduct->title}}</a>
                                      @if(!empty($item->size_name))
                                            <br>
                                        <b>Size:</b>    {{$item->size_name}} ${{$item->size_amount}}<br>
                                        @endif
                                        @if(!empty($item->color_name))

                                      <b> Color:</b>    {{$item->color_name}}<br>
                                        @endif
                                        @if($getOrderDetails->status==3)
                                        @php
                                        $getReview=$item->getReview($item->getProduct->id,$getOrderDetails->id);
                                        @endphp
                            
                                            @if(!empty($getReview))
                                                       <br>    <b> Rating:</b> {{$getReview->rating}}<br>
                                                            <b>Review:</b> {{$getReview->review}}                                                           

                                                    @else
                                                <button type="submit" style="display: block;" class="btn btn-primary MakeReview" id="{{$item->getProduct->id}}" data-order="{{$getOrderDetails->id}}"> Make Review</button>
                                                @endif
                                            @endif
                                            
                                    </td>
                                          <td style="text-align: center;"><strong>{{$item->quantity}}</strong></td>
                                          <td><small>{{number_format($item->price,2)}}$&nbsp;</small></td>
                                         
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
    </div>
</main>
<!-- Modal -->
<div class="modal fade" id="MakeReviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Make Review</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{url('user/make_review')}}"  method="POST">
            {{csrf_field()}}

            <input type="hidden" id="getProductid" name="product_id" required>
            <input type="hidden" id="getOrderid" name="order_id" required>
        <div class="modal-body" style="padding:20px;">
            <div class="form-group" style="margin-bottom:15px;" >
                <label>How Many Stars ?</label>
                <select class="form-control" name="rating" required>
                <option value="">Select</option>
                <option value="1">Bad</option>
                <option value="2">Normal</option>
                <option value="3">Good</option>
                <option value="4">Very good</option>
                <option value="5">Excellant</option>
                </select>
            </div>

            <div class="form-group">

                <label>Review</label>
                
              <textarea class="form-control" name="review" required></textarea>

            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
      </div>
    </div>
  </div>

@endsection
       <!-- End .footer -->
       @Section('script')

       <script type="text/javascript">
    
         $('body').delegate('.MakeReview','click',function(){
            var product_id =$(this).attr('id');
            var order_id=$(this).attr('data-order');
            $('#getProductid').val(product_id);
            $('#getOrderid').val(order_id);

            $('#MakeReviewModal').modal('show');


         });
    
        </script>
       @endsection