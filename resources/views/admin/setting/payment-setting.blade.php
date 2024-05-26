
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
              <h1>Payment Setting</h1>
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
                        <label style="display: block;">is Paypal  <span style="color:#000;"><i class="	fab fa-paypal"></i></span></label>
                        <input type="checkbox" class="" name="is_paypal"  {{!empty($getRecord->is_paypal) ?'checked':''}} >
                    
                      </div>
                      <div class="form-group">
                        <label style="display: block;">is Cash  <span style="color:#7cfb8bc7;"><i class="	fas fa-money-check-alt"></i></span></label>
                        <input type="checkbox" class="" name="is_cash_delivery"   {{!empty($getRecord->is_cash_delivery) ?'checked':''}} >
                    
                      </div><div class="form-group">
                        <label style="display: block;">is Stripe  <span style="color:cornflowerblue;"><i class="	fab fa-stripe"></i></span></label>
                        <input type="checkbox" class="" name="is_stripe" {{!empty($getRecord->is_stripe) ?'checked':''}} >
                    
                      </div>
                        <div class="form-group">
                            <label>Paypal Email ID <span style="color:red;"></span></label>
                            <input type="text" class="form-control" name="paypal_id"  value="{{$getRecord->paypal_id}}" >
                        
                          </div>
                          <div class="form-group">
                            <label>Paypal Status <span style="color:red;"></span></label>
                           <select class="form-control" name='paypal_status' >
                           <option {{($getRecord->paypal_status == 'sandbox') ? 'selected' : ''}} value="sandbox">Sandbox</option>
                           <option {{($getRecord->paypal_status == 'live') ? 'selected' : ''}} value="live">Live</option>
                          </select>
                          </div>
                          <div class="form-group">
                            <label>Stripe Puplic Key <span style="color:red;"></span></label>
                            <input type="text" class="form-control" name="stripe_puplic_key"  value="{{$getRecord->stripe_puplic_key}}" >
                        
                          </div>
                          <div class="form-group">
                            <label>Stripe Secret Key <span style="color:red;"></span></label>
                            <input type="text" class="form-control" name="stripe_secret_key"  value="{{$getRecord->stripe_secret_key}}" >
                        
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