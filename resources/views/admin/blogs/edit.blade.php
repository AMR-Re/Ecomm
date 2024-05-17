
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
              <h1>Edit Blog</h1>
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
                        <label>Title <span style="color: red">*</span></label>
                        <input type="text" class="form-control " name="title" value="{{$getRecord->title}}"required placeholder="Title Here">
                        <div style="color: red;" >{{$errors->first('title')}}</div>
                      </div>
                      <div class="form-group">
                        <label>Blog Category <span style="color: red">*</span></label>
                        <select class="form-control" name="blog_category_id" required>
                          <option value=""> Select</option>
                          @foreach($getCategory as $category)
                          <option {{($getRecord->blog_category_id == $category->id) ? 'selected' : ''}} value="{{$category->id}}"> {{$category->name}}</option>
                          @endforeach
                        </select>
                      </div>
                      
                    <div class="form-group">
                      <label>Image <span style="color: red">*</span></label>
                      <input type="file" class="form-control " name="image_name" >
                     @if(!empty($getRecord->getImage()))
                      <img src="{{$getRecord->getImage()}}" style="height: 200px;">
                      @endif
                  </div>
                  <div class="form-group">
                    <label>Short Description <span style="color: red">*</span></label>
                    <textarea class="form-control" name="short_description"  required >{{$getRecord->short_description}}</textarea>
                  </div>
                  <div class="form-group">
                    <label>Description <span style="color: red">*</span></label>
                    <textarea class="form-control editor" name="description">{{$getRecord->description}}</textarea>  
                  </div>
                  <div class="form-group">
                    <label>Status <span style="color: red">*</span></label>
                        <select class=" form-control" name="status" required>
                        <option value="0" {{ $getRecord->status=== 0 ? 'selected' : '' }}>Active</option>
                        <option value="1" {{ $getRecord->status === 1 ? 'selected' : '' }}>Inactive</option>
                        </select>
                  </div>
                            <hr> 
                           
                            {{-- Horizonatal Line  --}}
                         <div class="form-group">
                            <label>Meta title <span style="color: red">*</span></label>
                            <input type="text" class="form-control " name="meta_title" value="{{$getRecord->meta_title}}" required placeholder="Meta Title">
                          </div>

                          <div class="form-group">
                            <label>Meta Description</label>
                           <textarea class="form-control " name="meta_description" placeholder="Meta Description">{{$getRecord->meta_title}}</textarea>
                          </div>
                           <div class="form-group">
                            <label>Meta Keywords</label>
                            <input type="text" class="form-control " name="meta_keywords"value="{{$getRecord->meta_title}}"  placeholder="Meta Keywords">
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
<script src="{{url('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>

<script type="text/javascript">

  $('.editor').summernote({  height:200});

</script>
@endsection