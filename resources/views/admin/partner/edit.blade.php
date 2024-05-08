
@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1>Edit Partner</h1>
            </div>
     
          </div>
        </div>
      </section>
  
      <section class="content">
        <div class="container-fluid">
          <div class="row">
     

        
            <div class="col-md-12">
           

               <div class="card card-primary">
                  
                  <form  action="#" method="POST"  enctype="multipart/form-data">
                    {{csrf_field()}}
                    
                      <div class="form-group">
                        <label>Image Name <span style="color: red"></span></label>
                        <input type="file" class="form-control " name="image_name"  value="{{$getRecord->getImage()}}"  >
                        @if(!empty($getRecord->getImage()))
                        <img src="{{$getRecord->getImage()}}" style="height: 100px;">
                        @endif
                      
                   </div>
                      
                            <div class="form-group">
                                <label>Button Link <span style="color: red">*</span></label>
                                <input type="text" class="form-control " name="button_link"  value="{{$getRecord->button_link}}" placeholder=" Button Link">
                              
                          </div>
                           
                          
                          <label>Status<span style="color: red">*</span></label>
                             <select class=" form-control" name="status" required>
                              <option value="0" {{ $getRecord->status === 0 ? 'selected' : '' }}>Active</option>
                              <option value="1" {{ $getRecord->status === 1 ? 'selected' : '' }}>Inactive</option>
                              </select>
                          </div>
                        </div>
                        <hr>
        
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </form>
                </div>
    
              </div>
          </div>
       
        </div> 

      </section>
</div>
@endsection

@section('script')

@endsection