
@extends('admin.layouts.app')
@section('style')
<style type="text/css">
.form-group{
  margin-bottom: 2px,
}
</style>
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1>Order Details</h1>
            </div>
        
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            {{-- removing column --}}

            <!-- /.col -->
            <div class="col-md-12">
           
               <div class="card card-primary">
                <div class="card-body" style="overflow: auto;">
                        <div class="form-group">
                            <label>ID : <span style="font-weight: normal;">{{$getRecord->id}}</span></label>
                        </div>
                        <div class="form-group">
                          <label>Order # : <span style="font-weight: normal;">{{$getRecord->order_number}}</span></label>
                      </div>
                  
                      <div class="form-group">
                        <label>Name :  <span style="font-weight: normal;">{{$getRecord->first_name}} {{$getRecord->last_name}}</span></label>
                      </div>
                        <div class="form-group">
                        <label>Company Name :  <span style="font-weight: normal;">{{$getRecord->company_name}}</span></label>
                    </div>
                        <div class="form-group">
                        <label>Country : <span style="font-weight: normal;">{{$getRecord->country}}</span></label>
                    </div>
                        <div class="form-group">
                        <label>Address : <span style="font-weight: normal;"> {{$getRecord->address1}} {{$getRecord->address2}}</span></label>
                    </div>
                        <div class="form-group">
                        <label>City/Town :  <span style="font-weight: normal;">{{$getRecord->city}}</span></label>
                        </div>
                        <div class="form-group">
                        <label>State/Region : <span style="font-weight: normal;"> {{$getRecord->state}}</span></label>
                        </div>
                        <div class="form-group">
                            <label>Zip.Code : <span style="font-weight: normal;"> {{$getRecord->zip}}</span></label>
                        </div>
                        <div class="form-group">
                        <label>Tel.Number :  <span style="font-weight: normal;">{{$getRecord->tel}}</span></label>
                        </div>
                        <div class="form-group">
                            <label>Discount Code :  <span style="font-weight: normal;">{{$getRecord->discount_code}}</span></label>
                        </div>
                        <div class="form-group">
                            <label>Discount Amount($) :  <span style="font-weight: normal;">{{number_format($getRecord->disount_amount,2)}}</span></label>
                        </div>
                        <div class="form-group">
                            <label>Shipping Name : <span style="font-weight: normal;"> {{$getRecord->getShipping->name}}</span></label>
                        </div>
                        <div class="form-group">
                                <label>Shipping Amount($) :  <span style="font-weight: normal;">{{number_format($getRecord->shipping_amount,2)}}</span></label>
                        </div>
                        <div class="form-group">
                            <label>Total Amount($) :  <span style="font-weight: normal;">{{number_format($getRecord->total_amount,2)}}</span></label>
                    </div>       
                    <div class="form-group">
                        <label style="text-transform: capitalize;">Payment Method : <span style="font-weight: normal;">{{$getRecord->payment_method}}</span> </label>
                </div>
                <div class="form-group">
                    <label >Status :  <span style="font-weight: normal;">{{($getRecord->status==0)? 'Pending' : 'delivered'}}</span></label>
                </div>
                <div class="form-group">
                  <label >Note :  <span style="font-weight: normal;">{{$getRecord->note}}</span></label>
                </div>
                <div class="form-group">
                    <label>Created At : <span style="font-weight: normal;"> {{date('d-m-y H:i A',strtotime($getRecord->createdAt))}}</span></label>
                </div>
                 
                    <hr> 
                            {{-- Horizonatal Line  --}}
                   
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
                <!-- /.card -->
    
              </div>
            </div>
            <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Product Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" style="overflow: auto;">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Image</th>
                       <th>Product Name</th>
                       <th>Quantity</th>  
                       <th>Price</th>   
                       <th>Size Na</th>   
                       <th>Color Na</th>
                       <th>Size Amount($)</th>
                       <th>Total ($):</th>
                      </tr>
                  </thead>
                  <tbody>
                  
                  @foreach($getRecord->getItem as $item)
                  @php
                  $getProductImage=$item->getProduct->getImageSingle($item->getProduct->id)
                @endphp
                  <tr>
                    <td><img style="height: 100px; width:100px;" src="{{$getProductImage->getLogo()}}" alt="Product image"></td> 
                    <td><a target="_blank" href="{{url($item->getProduct->slug)}}" style="color: black;">{{$item->getProduct->title}}</a></td>
                    <td>{{$item->quantity}}</td>
                    <td>{{number_format($item->price,2)}} $</td>
                    <td>{{$item->size_name}}</td>
                    <td>{{$item->color_name}}</td>
                    <td>{{number_format($item->size_amount,2)}} $</td>
                    <td>{{number_format($item->total_price,2)}} $</td>



                 
                  @endforeach
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
       
        </div> 
        {{-- removing rows --}}
      </section>
</div>
@endsection

@section('script')
{{-- <script src="{{url('assets/dist/js/pages/dashboard3.js')}}"></script> --}}

@endsection