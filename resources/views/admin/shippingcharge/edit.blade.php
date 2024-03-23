
@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1>Edit Shipping Charge</h1>
            </div>
            {{-- <div class="col-sm-6 " style="text-align: right;">
              <a href="{{url('admin/admin/add')}}" class=" btn btn-primary">Add new Admin</a>
             </div> --}}
          </div>
        </div><!-- /.container-fluid -->
      </section>
  {{-- when - Add new category-btn is clicked the route is checked by the controller 
    related to , in this case CategoryController and
     return the view as in the controller wich in this case 
     is admin/category/add.blade.php --}}
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            {{-- removing column --}}

            <!-- /.col -->
            <div class="col-md-12">
           

               <div class="card card-primary">
                  
                  <form  action="#" method="POST" >
                    {{csrf_field()}}
                    <div class="card-body">
                      <div class="form-group">
                        <label>Shipping Charge Name <span style="color: red">*</span></label>
                        <input type="name" class="form-control " name="name" required value="{{old('name',$getRecord->name)}}" placeholder="Enter Shipping Charge Name">
                      </div>
                     
                          <div class="card-body">
                          <label> Percent/ Amount <span style="color: red">*</span></label>
                          <input type="text" class="form-control " name="price" required value="{{old('price',$getRecord->price)}}" placeholder="Enter shipping price ">
                        </div>
                          <label>Status<span style="color: red">*</span></label>
                             <select class=" form-control" name="status" required>
                              <option value="0" {{ old('status') === 0 ? 'selected' : '' }}>Active</option>
                              <option value="1" {{ old('status') === 1 ? 'selected' : '' }}>Inactive</option>
                              </select>
                          </div>
                        </div>
                        <hr>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Update</button>
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