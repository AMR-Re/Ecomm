
@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1>Add new Admin</h1>
            </div>
            {{-- <div class="col-sm-6 " style="text-align: right;">
              <a href="{{url('admin/admin/add')}}" class=" btn btn-primary">Add new Admin</a>
             </div> --}}
          </div>
        </div><!-- /.container-fluid -->
      </section>
  {{-- when - Add new Admin-btn is clicked the route is checked by the controller 
    related to , in this case adminController and
     return the view as in the controller wich in this case 
     is admin/admin/add.blade.php --}}
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            {{-- removing column --}}

            <!-- /.col -->
            <div class="col-md-12">
           
@include('admin.layouts._message')
               <div class="card card-primary">
                  
                  <form  action="#" method="POST" >
                    {{csrf_field()}}
                    <div class="card-body">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="name" class="form-control " name="name" required placeholder="Enter Your Name">
                      </div>
                      <div class="form-group">
                        <label >Email</label>
                        <input type="email" class="form-control" name="email" required  placeholder="Enter your Email">
                        <div style="color: red;" >{{$errors->first('email')}}</div>
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password"  placeholder="Enter your password">
                        <div class="input-group">
                        </div>
                        <div class="form-group">
                        
                          <label>Status</label>
                       <select class=" form-control" name="status" required>
                          <option value="0" {{ old('status') === 0 ? 'selected' : '' }}>Active</option>
                          <option value="1" {{ old('status') === 1 ? 'selected' : '' }}>Inactive</option>
                      </select>
                          </div>
                         
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
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