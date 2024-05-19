
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
              <h1>Home Setting</h1>
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
                            <label>Trendy Product Title <span style="color:red;">*</span></label>
                            <input type="text" class="form-control" name="trendy_product_title" required value="{{$getRecord->trendy_product_title}}" >
                        
                          </div>
                          <div class="form-group">
                            <label>Shop Category Title <span style="color:red;">*</span></label>
                            <input type="text" class="form-control " name="shop_category_title" required value="{{$getRecord->shop_category_title}}" >
                        
                          </div>
                          <div class="form-group">
                            <label>Recent Arrival Title <span style="color:red;">*</span></label>
                            <input type="text" class="form-control " name="recent_arrival_title" required value="{{$getRecord->recent_arrival_title}}" >
                          </div>

                          <div class="form-group">
                            <label>Blog Title <span style="color:red;">*</span></label>
                            <input type="text" class="form-control " name="blog_title" required value="{{$getRecord->blog_title}}" >
                          </div>
                          <div class="form-group">
                            <label>Payment delivery Title <span style="color:red;">*</span></label>
                            <input type="text" class="form-control " name="payment_delivery_title" required value="{{$getRecord->payment_delivery_title}}" >
                          </div>
                          
                          <div class="form-group">
                            <label>Payment delivery Description <span style="color:red;">*</span></label>
                            <input type="text" class="form-control " name="payment_delivery_description" required value="{{$getRecord->payment_delivery_description}}" >
                          </div>
                          <div class="form-group">
                            <label>Payment delivery Image <span style="color:red;">*</span></label>
                            <input type="file" class="form-control " name="payment_delivery_image"   >
                            @if(!empty($getRecord->getPDI()))
                            <img src="{{$getRecord->getPDI()}}" style="width: 200px;">
                            @endif
                        </div>
                          <div class="form-group">
                            <label>Redfund Title <span style="color:red;">*</span></label>
                            <input type="text" class="form-control " name="refund_title" required value="{{$getRecord->refund_title}}" >
                          </div>
                          
                          <div class="form-group">
                            <label>Refund Description <span style="color:red;">*</span></label>
                            <input type="text" class="form-control " name="refund_description" required value="{{$getRecord->refund_description}}" >
                          </div>
                          <div class="form-group">
                            <label>Refund Image <span style="color:red;">*</span></label>
                            <input type="file" class="form-control " name="refund_image"   >
                          </div>
                          <div class="form-group">
                            <label>Support Title <span style="color:red;">*</span></label>
                            <input type="text" class="form-control " name="support_title" required value="{{$getRecord->support_title}}" >
                          </div>
                          
                          <div class="form-group">
                            <label>Support Description <span style="color:red;">*</span></label>
                            <input type="text" class="form-control " name="support_description" required value="{{$getRecord->support_description}}" >
                          </div>
                          <div class="form-group">
                            <label>Support Image <span style="color:red;">*</span></label>
                            <input type="file" class="form-control " name="support_image"  >
                          </div>
                          <div class="form-group">
                            <label>Signup Title <span style="color:red;">*</span></label>
                            <input type="text" class="form-control " name="signup_title" required value="{{$getRecord->signup_title}}" >
                          </div>
                          
                          <div class="form-group">
                            <label>Signup Description <span style="color:red;">*</span></label>
                            <input type="text" class="form-control " name="signup_description" required value="{{$getRecord->signup_description}}" >
                          </div>
                          <div class="form-group">
                            <label>Signup Image <span style="color:red;">*</span></label>
                            <input type="file" class="form-control " name="signup_image" required  >
                            @if(!empty($getRecord->getSUI()))
                            <img src="{{$getRecord->getSUI()}}" style="width: 600px;">
                            @endif
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