
@extends('admin.layouts.app')
@section('style')
<link rel="stylesheet" href="{{url('assets/plugins/summernote/summernote-bs4.min.css')}}">

@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1>Edit Page</h1>
            </div>
           
          </div>
        </div>
      </section>
  {{-- when - Add new category-btn is clicked the route is checked by the controller 
    related to , in this case CategoryController and
     return the view as in the controller wich in this case 
     is admin/category/add.blade.php --}}
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
           
            <div class="col-md-12">
           

               <div class="card card-primary">
                  
                  <form  action="#" method="POST" enctype="multipart/form-data" >
                    {{csrf_field()}}
                    <div class="card-body">
                      <div class="form-group">
                        <label>Page Name <span style="color: red">*</span></label>
                        <input type="name" class="form-control " name="name"  value="{{$getRecord->name}}" placeholder="Enter Page Name">
                      </div>
                      <div class="form-group">
                        <label>Page Title <span style="color: red">*</span></label>
                        <input type="text" class="form-control " name="title"  value="{{$getRecord->title}}" placeholder="Enter Page Title">
                      </div>
                     <div class="form-group">
                          <label  style=""> Description <span style="color: red;">*</span></label>
                          <textarea class="form-control editor" name="description" id="description" required  placeholder="Enter description">
                            {{ $getRecord->description  }}</textarea>
                          </div>
                          <div class="form-group">
                            <label>Image<span style="color: red">*</span></label>
                            <input type="file" class="form-control" name="image">
                            @if(!empty($getRecord->getImage()))
                            <img src="{{$getRecord->getImage()}}" style="width: 50%; hieght:50%;">
                          @endif
                          </div>
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
                          </div>
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

<script src="{{url('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script type="text/javascript">
$('.editor').summernote({  height:200});
</script>
@endsection