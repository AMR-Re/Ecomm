
@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Order List (Total: {{$getRecord->total()}})</h1>
            </div>
            <div class="col-sm-6 " style="text-align: right;">
             {{-- <a href="{{url('admin/category/add')}}" class=" btn text-white " style="background-color:black">Add new Order</a> --}}
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
              <form>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Order Search</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <div class="row">
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="" > ID </label>
                        <input type="text" name="id" class="form-control" value="{{Request::get('id')}}" placeholder="ID">
                      </div>
                   </div>
                   <div class="col-md-2">
                    <div class="form-group">
                      <label for="" >Company Name </label>
                        <input type="text" name="company_name" class="form-control" value="{{Request::get('comapny_name')}}" placeholder="Company Name">
                      </div>
                   </div>
                   <div class="col-md-2">
                    <div class="form-group">
                      <label for="" >1st Na. </label>
                        <input type="text" name="fname" class="form-control" value="{{Request::get('fname')}}" placeholder="First Name">
                      </div>
                   </div> <div class="col-md-2">
                    <div class="form-group">
                      <label for="" > 2nd Na. </label>
                        <input type="text" name="lname" class="form-control" value="{{Request::get('lname')}}" placeholder="Last Name">
                      </div>
                   </div>
                   <div class="col-md-2">
                    <div class="form-group">
                      <label for="" >Email </label>
                        <input type="text" name="Email" class="form-control" value="{{Request::get('Email')}}" placeholder="Email">
                      </div>
                   </div>
                   <div class="col-md-2">
                    <div class="form-group">
                      <label for="" >Country </label>
                        <input type="text" name="country" class="form-control" value="{{Request::get('country')}}" placeholder="Country">
                      </div>
                   </div>
                   <div class="col-md-2">
                    <div class="form-group">
                      <label for="" >State</label>
                        <input type="text" name="state" class="form-control" value="{{Request::get('state')}}" placeholder="State">
                      </div>
                   </div>
                   <div class="col-md-2">
                    <div class="form-group">
                      <label for="" >City </label>
                        <input type="text" name="city" class="form-control" value="{{Request::get('city')}}" placeholder="City">
                      </div>
                   </div>
                   <div class="col-md-2">
                    <div class="form-group">
                      <label for="" >Tel </label>
                        <input type="text" name="tel" class="form-control" value="{{Request::get('tel')}}" placeholder="Tel.No">
                      </div>
                   </div>
                   <div class="col-md-2">
                    <div class="form-group">
                      <label for="" >Zip </label>
                        <input type="text" name="zip" class="form-control" value="{{Request::get('zip')}}" placeholder="Zip.code">
                      </div>
                   </div>
                   <div class="col-md-2">
                    <div class="form-group">
                      <label for="" >From Date </label>
                        <input type="date" name="from_date" class="form-control" value="{{Request::get('from_date')}}">
                      </div>
                   </div>
                   <div class="col-md-2">
                    <div class="form-group">
                      <label for="" >To Date </label>
                        <input type="date" name="to_date" class="form-control" value="{{Request::get('to_date')}}" >
                      </div>
                   </div>
                  </div> 
                  <div class="row">
                    <div class="col-md-12">
                      <button class="btn btn" style="background-color: aquamarine; color:black;">Search</button>
                      <a class="btn" style="background-color:coral; color:black;" href="{{url('admin/order/list')}}">Reset</a>

                    </div>
                  </div>
                </div>
              </div>
              </div>
              </form>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Order List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0" style="overflow: auto;">
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
                        <td>{{$value->address1}} <br /> {{$value->address2}} </td>
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
                        <td>{{($value->status==0) ? 'Pending' : 'delivered'}}</td>
                        <td>{{date('d-m-y H:i A',strtotime(($value->created_at)))}}</td>
                        <td>
                        <a href="{{url('admin/order/details/'.$value->id)}}" class="btn" style="background-color: rgb(60, 205, 101);">Details</a>  
                     
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