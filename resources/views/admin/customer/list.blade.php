
@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Customer List (Total: {{$getRecord->total()}})</h1>
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
               <form method="GET">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Customer Search</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                          <label for="" >Customer ID </label>
                            <input type="text" name="id" class="form-control" value="{{Request::get('id')}}" placeholder="ID">
                          </div>
                       </div>
                   <div class="col-md-2">
                    <div class="form-group">
                      <label for="" >First Name </label>
                        <input type="text" name="name" class="form-control" value="{{Request::get('name')}}" placeholder="Name">
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
                      <button class="btn btn" style="background-color:rgb(236, 233, 154); color:black;"><i class="fas fa-search"></i></button>
                      <a class="btn" style="background-color:#9af8c3; color:black;" href="{{url('admin/customer/list')}}"><i class="fas fa-redo"></i></a>

                    </div>
                  </div>
                </div>
              </div>
              </div>
              </form>
  
              <div class="card" style=" width:100%;">
                <div class="card-header">
                  <h3 class="card-title">Customers List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0" style="overflow:auto;">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Customer-id</th>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($getRecord as $value)
                      <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{($value->status==0) ? 'Active' : 'inActive'}}</td>
                        <td> {{date('d:m:Y H:i:s',strtotime($value->created_at))}}</td>
                        <td>
                        <a href="{{url('admin/admin/delete/'.$value->id)}}" class="btn btn-danger" style="background-color: rgb(214, 57, 93);">  <i class="fas fa-trash"></i></a>
                     
                        </td>
                      </tr>
                      @endforeach
                                        </tbody>
                  </table>
                  <div style="padding: 10px; float:right;">
                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))
                    ->links()!!}
                  </div>
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


@endsection