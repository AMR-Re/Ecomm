
@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1>Edit Category</h1>
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
                        <label>Category Name <span style="color: red">*</span></label>
                        <input type="name" class="form-control " name="name" required value="{{old('name',$getRecord->name)}}" placeholder="Enter Category Name">
                      </div>
                      <div class="form-group">
                        <label>Slug <span style="color: red">*</span></label>
                        <input type="slug" class="form-control " name="slug" value="{{old('slug',$getRecord->slug)}}"required placeholder="slug EX. URL">
                        <div style="color: red;" >{{$errors->first('slug')}}</div>
                    </div>
                    
                        <div class="form-group">
                        
                          <label>Status <span style="color: red">*</span></label>
                             <select class=" form-control" name="status" required>
                              <option value="0" {{ old('status',$getRecord->status) === 0 ? 'selected' : '' }}>Active</option>
                              <option value="1" {{ old('status',$getRecord->status) === 1 ? 'selected' : '' }}>Inactive</option>
                              </select>
                          </div>
                            <hr> 
                            {{-- Horizonatal Line  --}}
                         <div class="form-group">
                            <label>Meta title <span style="color: red">*</span></label>
                            <input type="text" class="form-control " name="meta_title" value="{{old('meta_title',$getRecord->meta_title)}}" required placeholder="Meta Title">
                          </div>
                          <div class="form-group">
                            <label>Meta Description</label>
                           <textarea class="form-control" name="meta_description" placeholder="Meta Description">{{old('meta_description',$getRecord->meta_description)}}</textarea>
                          <div class="form-group">
                            <label>Meta Keywords</label>
                            <input type="text" class="form-control " name="meta_keywords" value="{{old('meta_keywords',$getRecord->meta_keywords)}}"  placeholder="Meta Keywords">
                          </div>
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