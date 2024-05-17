
@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1>Add new Blog</h1>
            </div>
           
          </div>
        </div>
      </section>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
               <div class="card card-primary">
                  <form  action="#" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card-body">
                      <div class="form-group">
                        <label>Blog Name <span style="color: red">*</span></label>
                        <input type="name" class="form-control " name="name" required value="{{old('name')}}" placeholder="Enter blog Name">
                      </div>
                      <div class="form-group">
                        <label>Slug <span style="color: red">*</span></label>
                        <input type="text" class="form-control " name="slug" value="{{old('slug')}}"required placeholder="slug EX. URL">
                        <div style="color: red;" >{{$errors->first('slug')}}</div>
                    </div>
                   
                        <div class="form-group">
                          <label>Status <span style="color: red">*</span></label>
                             <select class=" form-control" name="status" required>
                              <option value="0" {{ old('status') === 0 ? 'selected' : '' }}>Active</option>
                              <option value="1" {{ old('status') === 1 ? 'selected' : '' }}>Inactive</option>
                              </select>
                          </div>
                            <hr> 
                           
                            {{-- Horizonatal Line  --}}
                         <div class="form-group">
                            <label>Meta title <span style="color: red">*</span></label>
                            <input type="text" class="form-control " name="meta_title" value="{{old('meta_title')}}" required placeholder="Meta Title">
                          </div>
                          <div class="form-group">
                            <label>Meta Description</label>
                           <textarea class="form-control" name="meta_description" placeholder="Meta Description">{{old('meta_description')}}</textarea>
                          <div class="form-group">
                            <label>Meta Keywords</label>
                            <input type="text" class="form-control " name="meta_keywords"value="{{old('meta_keywords')}}"  placeholder="Meta Keywords">
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


@endsection