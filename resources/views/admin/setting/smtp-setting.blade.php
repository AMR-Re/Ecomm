
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
              <h1>SMTP Setting</h1>
            </div>
         
          </div>
        </div>
      </section>
 
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
          

            <div class="col-md-12">
                @include('admin.layouts._message')
           

               <div class="card card-primary">
                  
                  <form  action="#" method="POST"  enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name <span style="color:red;">*</span></label>
                            <input type="text" class="form-control" name="name" required value="{{$getRecord->name}}" >
                        
                          </div>
                          <div class="form-group">
                            <label>Mail Mailer <span style="color:red;">*</span></label>
                            <input type="text" class="form-control " name="mail_mailer" required value="{{$getRecord->mail_mailer}}" >
                        
                          </div>
                          <div class="form-group">
                            <label>Mail Host <span style="color:red;">*</span></label>
                            <input type="text" class="form-control " name="mail_host" required value="{{$getRecord->mail_host}}" >
                          </div>

                          <div class="form-group">
                            <label>Mail Username <span style="color:red;">*</span></label>
                            <input type="text" class="form-control " name="mail_username" required value="{{$getRecord->mail_username}}" >
                          </div>
                          <div class="form-group">
                            <label>Mail Passwrod <span style="color:red;">*</span></label>
                            <input type="text" class="form-control " name="mail_password" required value="{{$getRecord->mail_password}}" >
                          </div>
                          
                          <div class="form-group">
                            <label>Mail Port <span style="color:red;">*</span></label>
                            <input type="number" class="form-control " name="mail_port" required value="{{$getRecord->mail_port}}" >
                          </div>
                          <div class="form-group">
                            <label>Encryption <span style="color:red;">*</span></label>
                            <input type="text" class="form-control " name="mail_encryption"  value="{{$getRecord->mail_encryption}}" >
                            
                        </div>
                          <div class="form-group">
                            <label>MAIL FROM ADDRESS <span style="color:red;">*</span></label>
                            <input type="email" class="form-control " name="mail_from_address" required value="{{$getRecord->mail_from_address}}" >
                          </div>
                          
                         
                    <!-- /.card-body -->
                    </div>
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