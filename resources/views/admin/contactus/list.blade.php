
@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Contact Us </h1>
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
                <div class="card" style="overflow: auto;">
                  <div class="card-header">
                    <h3 class="card-title">Contact Us Search</h3>
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
                        <label for="" > Name </label>
                          <input type="text" name="name" class="form-control" value="{{Request::get('name')}}" placeholder=" Name">
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
                        <label for="" >Phone </label>
                          <input type="text" name="phone" class="form-control" value="{{Request::get('phone')}}" placeholder="Tel.No">
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group">
                          <label for="" > Subject </label>
                            <input type="text" name="subject" class="form-control" value="{{Request::get('subject')}}" placeholder="Subject">
                          </div>
                       </div>
                       <div class="col-md-2">
                        <div class="form-group">
                          <label for="" > Message </label>
                            <input type="text" name="message" class="form-control" value="{{Request::get('message')}}" placeholder="Search messages">
                          </div>
                       </div>
                    </div> 
                    <div class="row">
                      <div class="col-md-12">
                        <button class="btn btn" style="background-color:cornflowerblue; color:black;"><i class="fas fa-search"></i></button>
                        <a class="btn" style="background-color:coral; color:black;" href="{{url('admin/contactus')}}"><i class="fas fa-redo"></i></a>
  
                      </div>
                    </div>
                  </div>
                </div>
                </div>
                </form>
              <div class="card" style="overflow: auto;">
                <div class="card-header">
                  <h3 class="card-title">Contact Us </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0" >
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>User</th>
                         <th>Name</th>
                         <th>Email</th>
                         <th>Phone</th>
                         <th>Subject</th>
                         <th>Message</th>
                         <th>Created At</th>
                       

                         <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                       @foreach($getRecord as $value)
                      <tr>
                        <td>{{!empty($value->getUser) ? $value->getUser->name : ''  }}</td>
                        <td>{{$value->name}}</td>

                        <td>{{$value->email}}</td>
                        <td>{{$value->phone}}</td>
                        <td>{{$value->subject}}</td>
                        <td>{{$value->message}}</td>
                        <td>{{$value->created_at}}</td>
                        
                        {{-- 
                        
                        <td>{{$value->description}}</td>
                        <td>{{$value->image_name}}</td>
                        <td>{{$value->meta_description}}</td>
                        <td>{{$value->meta_title}}</td>
                        <td>{{$value->meta_keywords}}</td>
                        <td>{{date('Y-m-d',strtotime(($value->created_at)))}}</td> --}}
                        <td>
                        <a href="{{url('admin/contactus/delete/'.$value->id)}}" class="btn btn-danger" style=""><i class="fas fa-trash-alt"></i></a>  
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