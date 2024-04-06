
@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Order List</h1>
            </div>
            <div class="col-sm-6 " style="text-align: right;">
             <a href="{{url('admin/category/add')}}" class=" btn text-white " style="background-color:black">Add new Order</a>
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
@include('admin.layouts._message')
              
              <!-- /.card -->
  
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Order List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                         <th>Name</th>
                         <th>Company Name</th>   
                         <th>Country</th>   
                         <th>Address</th>
                         <th>City</th>
                         <th>State</th>
                         <th>Zip</th>
                         <th>Tel</th>
                         <th>Email</th>
                         <th>Discount Code</th>
                         <th>Discount Amount($)</th>
                         <th>Shipping Amount($)</th>
                         <th>Total Amount ($)</th>
                         <th>Payment Method</th>
                         <th>Status</th>
                         <th>CreatedAt</th>
                         <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($getRecord as $value)
                      <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->first_name}} {{$value->last_name}}</td>
                        <td>{{$value->company_name}}</td>
                        <td>{{$value->country}}</td>
                        <td>{{$value->address1}} <br> {{$value->address2}} </td>
                        <td>{{$value->city}}</td>
                        <td>{{$value->state}}</td>
                        <td>{{$value->zip}}</td>
                        <td>{{$value->tel}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->discount_code}}</td>
                        <td>{{number_format($value->discount_amount,2)}}</td>
                        <td>{{number_format($value->shipping_amount,2)}}</td>
                        <td>{{number_format($value->total_amount,2)}}</td>
                        <td style="text-transform: capitalize;">{{$value->payment_method}}</td>
                        <td>{{($value->status==0) ? 'Active' : 'inActive'}}</td>
                        <td>{{date('d-m-y H:i A',strtotime(($value->created_at)))}}</td>
                        <td>
                        <a href="{{url('admin/category/edit/'.$value->id)}}" class="btn" style="background-color: rgb(0, 255, 191);">Edit</a>  
                        <a href="{{url('admin/category/delete/'.$value->id)}}" class="btn btn-danger" style="background-color: rgb(214, 57, 93);">Delete</a>
                     
                        </td>
                      </tr>
                      @endforeach
                      </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
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