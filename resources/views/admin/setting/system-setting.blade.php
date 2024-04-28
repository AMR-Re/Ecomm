
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
              <h1>System Setting</h1>
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
@include('admin.layouts._message')
           

               <div class="card card-primary">
                  
                  <form  action="#" method="POST"  enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="form-group">
                            <label>Website Name <span style="color:red;">*</span></label>
                            <input type="text" class="form-control " name="website_name" required value="{{$getRecord->website_name}}" >
                          </div>
                      <div class="form-group">
                        <label>Logo <span style="color:red;"></span></label>
                        <input type="file" class="form-control " name="logo" >
                        @if(!empty($getRecord->getLogo()))
                        <img src="{{$getRecord->getLogo()}}" style="width: 200px;">
                        @endif
                      </div>
                      <div class="form-group">
                        <label>Favicon <span style="color:red;"></span></label>
                        <input type="file" class="form-control " name="favicon" >
                        @if(!empty($getRecord->getFavicon()))
                        <img src="{{$getRecord->getFavicon()}}" style="width: 50px;">
                        @endif
                      </div>
                      <div class="form-group">
                        <label>Footer Description <span style="color:red;"></span></label>
                        <textarea class="form-control editor" name="footer_description" value="{{$getRecord->footer_description}}"></textarea>
                      </div>
                      <div class="form-group">
                        <label>Footer Payment Icon <span style="color:red;"></span></label>
                        <input type="file" class="form-control " name="footer_payment_icon" >
                        @if(!empty($getRecord->getFooter_Payment_Icon()))
                        <img src="{{$getRecord->getFooter_Payment_Icon()}}" style="width: 200px;">
                        @endif
                      </div>
                      <hr>
                      <div class="form-group">
                        <label>Address <span style="color:red;"></span></label>
                        <textarea class="form-control" name="address" >{{$getRecord->address}}</textarea>
                      </div>
                      <div class="form-group">
                        <label>Phone Number 1 <span style="color:red;"></span></label>
                        <input type="number" class="form-control" name="phone_num_1" value="{{$getRecord->phone_num_1}}" />
                      </div>
                      <div class="form-group">
                        <label>Phone Number 2 <span style="color:red;"></span></label>
                        <input type="number" class="form-control" name="phone_num_2"value="{{$getRecord->phone_num_2}}" />
                      </div>
                      <div class="form-group">
                        <label>Submit Contact Email <span style="color:red;"></span></label>
                        <input type="email" class="form-control" name="submit_email" value="{{$getRecord->submit_email}}"/>
                      </div>
                      <div class="form-group">
                        <label>Email 1 <span style="color:red;"></span></label>
                        <input type="email" class="form-control" name="email" value="{{$getRecord->email}}"/>
                      </div>
                      <div class="form-group">
                        <label>Email 2 <span style="color:red;"></span></label>
                        <input type="email" class="form-control" name="email_2" value="{{$getRecord->email_2}}" />
                      </div>
                      <div class="form-group">
                        <label>Working Hours <span style="color:red;"></span></label>
                        <input type="email" class="form-control" name="working_hours" value="{{$getRecord->working_hours}}" />
                      </div>
                      <hr>
                      <div class="form-group">
                        <label>Facebook<span style="color:red;"></span></label>
                        <input type="email" class="form-control" name="facebook_link" value="{{$getRecord->facebook_link}}" />
                      </div>
                      <div class="form-group">
                        <label>Twitter<span style="color:red;"></span></label>
                        <input type="email" class="form-control" name="twitter_link" value="{{$getRecord->twitter_link}}" />
                      </div>
                      <div class="form-group">
                        <label>Instagram <span style="color:red;"></span></label>
                        <input type="email" class="form-control" name="instagram_link" value="{{$getRecord->instagram_link}}"/>
                      </div>
                      <div class="form-group">
                        <label>Youtube <span style="color:red;"></span></label>
                        <input type="email" class="form-control" name="youtube_link" value="{{$getRecord->youtube_link}}"/>
                      </div>
                      <div class="form-group">
                        <label>Pintrest <span style="color:red;"></span></label>
                        <input type="email" class="form-control" name="pintrest_link" value="{{$getRecord->pintrest_link}}"/>
                      </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn text-white"style="background-color:#73BFB8;">Submit</button>
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


<script src="text/javascript">

 $('.editor').summernote({  height:200});

</script>
@endsection