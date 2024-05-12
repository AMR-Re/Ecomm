
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
              <h1>Edit Product</h1>
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
                    <div class="row">
                      <div class="col-md-6 ">
                        <div class="form-group">
                          <label for="title"> Title <span style="color: red">*</span></label>
                          <input type="text" class="form-control" name="title" id="title" required value="{{ old('title', $product->title ?? '') }}" placeholder="Enter Product Title">
                        </div>
                      </div>
                      <div class="col-md-6  ">
                        <div class="form-group">
                          <label for="sku"> SKU <span style="color: red">*</span></label>
                          <input type="text" class="form-control" name="sku" id="sku" required value="{{ old('sku', $product->sku ?? '') }}" placeholder="Enter Product SKU">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="title"> Category <span style="color: red">*</span></label>
                          <select class="form-control" name="category_id" id="changeCategory" required>
                            <option value="">Select</option>
                            @foreach($getCategory as $category )
                            <option {{ ($product->category_id == $category->id) ? 'selected': '' }} value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                            
                          </select>    
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="sub_category_id"> Sub Category <span style="color: red">*</span></label>
                          <select class="form-control" name="sub_category_id" id="get_sub_category" required>
                            <option value="">Select</option>
                            @foreach($getSubCategory as $subcategory )
                            <option {{ ($product->sub_category_id == $subcategory->id) ? 'selected': '' }} value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                          @endforeach
                          </select>
                        
                        
                      </div>
                      </div>
                    </div>
                  
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="brand_id">Brand<span style="color: red">*</span></label>
                          <select class="form-control" name="brand_id" id="brand_id" required>
                            <option value="">Select</option>
                            @foreach($getBrand as $brand )
                            <option {{ ($product->brand_id )=== $brand->id ? 'selected' : '' }} value="{{$brand->id}}">{{$brand->name}}</option>
                          @endforeach
                            
                          </select>
                        </div>
                      </div>
                        <div class="col-md-6 ">
                          <div class="form-group ">
                            <label  for="is_trendy">Trendy Product<span style="color: red"></span></label>
                            <div>
                            <label><input  {{!empty($product->is_trendy) ? 'checked' : ''}}  type="checkbox" name="is_trendy" ></label>
                            </div>
                          </div>
                        </div>
                 </div>
                    {{-- fucking divendnot --}}
                    <div class="row">
                      <div class="col-md-12 ml-1">
                        <div class="form-group">
                          <label for="color">Color <span style="color: red">*</span></label>
                          @foreach($getColor as $color )
                            @php
                            $checked='';
                            @endphp
                           @foreach($product->getColor as $pcolor)
                           @if($pcolor->color_id == $color->id)
                            @php
                            $checked='checked';
                            @endphp
                           @endif
                           @endforeach
                          <div>
                            <label><input {{$checked}} type="checkbox" name="color_id[]" value="{{$color->id}}">{{$color->name}}</label>
                          </div>
                        @endforeach
                      
                          </div>
                      </div>
                  </div>
                  <hr>
              
                  <div class="row">
                    <div class="col-md-12 ml-1">
                      <div class="form-group">
                        <label for="size">Size <span style="color: red">*</span></label>
                       <div>
                     <table class="table table-striped">
                    <thead>
                      <tr>
                      <th>Name</th>
                      <th>Price($)</th>
                      <th>Action</th>
                      </tr> 
                    </thead> 
                    <tbody id="AppendSize">
                      @php
                      $i_s=1;
                      @endphp
                      @foreach($product->getSize as $size)
                      
                      <tr id="DeleteSize{{$i_s}}">
                         <td> <input type="text" name="size[{{$i_s}}][name]" value="{{$size->name}}" class="form-control"></td> 
                        <td> <input type="text"  name="size[{{$i_s}}][price]"  value="{{$size->price}}" class="form-control" ></td>
                        <td style="width:100px;">
                          <button type="button"  id="{{$i_s}}"  class="btn btn-danger DeleteSize" style="background-color: rgb(214, 57, 93);">Delete</button>
                        </td>
                      </tr>
                     
                      @php
                      $i_s++;
                      @endphp
                      @endforeach
                      <tr>
                        <td> <input type="text" name="size[100][name]" class="form-control"></td> 
                       <td> <input type="text"  name="size[100][price]"   class="form-control" ></td>
                       <td style="width:100px;">
                         <button type="button" id="" class="btn AddSize " style=" background-color: rgb(0, 255, 191);">Add</button>  
                       </td>
                     </tr>
                      </tbody>
                    </table>
                        </div>
                    </div>
                   
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="price">Price($) <span style="color: red">*</span></label>
                            <input type="number" class="form-control" name="price" id="price" required value="{{ !empty($product->price) ? $product->price : ''}}" placeholder="Enter Product New price">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="old_price">Old Price($) <span style="color: red">*</span></label>
                            <input type="number" class="form-control" name="old_price" id="old_price" required value="{{$product->old_price}}" placeholder="Enter Product Old Price">
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label  style="">Image Description <span style="color: red;">*</span></label>
                          <input type="file" name="image[]" multiple accept="image/*" class="form-control" style="padding: 5px;" >
                            </div>
                        </div>
                    </div>
                    @if(!empty($product->getImage()->count()))
                    <div class="row" id="sortable">
                      @foreach($product->getImage as $image)
                      @if(!empty($image->getLogo()))
                      <div class="col-md-2  ml-2 sortable_image" id="{{$image->id}}" style="text-align: center; ">
                       <img   style="width:100%; height:100px;" src='{{$image->getLogo()}}'>
                       <a onclick="return confirm('Are you sure you want to delete?');" href="{{url('admin/product/image_delete/'.$image->id)}}" class="btn btn-sm btn-danger" style="margin-top:10px; background-color: rgb(214, 57, 93);">Del</a>
                   
                      </div>
                      @endif
                      @endforeach
                    @endif
                      <hr>
                      <div class="row">
                        <div class="col-md-6 ml-4"  >
                          <div class="form-group">
                            <label  style="">Short Description <span style="color: red;">*</span></label>
                            <textarea class="form-control" name="short_description" id="short_description" required placeholder="Enter short description">
                              {{ $product->short_description  }} </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label  style=""> Description <span style="color: red;">*</span></label>
                          <textarea class="form-control editor" name="description" id="description" required  placeholder="Enter description">
                            {{ $product->description  }}</textarea>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label  style="">Additional Description <span style="color: red;">*</span></label>
                        <textarea class="form-control editor" name="additional_description" id="additional_description" required  placeholder="Enter additional description">
                          {{ $product->additional_description  }} </textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label  style="">Shipping & Returns<span style="color: red;">*</span></label>
                      <textarea class="form-control editor" name="shipping_returns" id="shipping_returns" required  placeholder="Enter Shipping & Returns">
                        {{ $product->shipping_returns  }}</textarea>
                      </div>
                  </div>
                  <div class="form-group ml-2">
                        
                    <label > Status <span style="color: red">*</span></label>
                       <select class=" form-control" name="status" required>
                        <option value="0" {{ ($product->status) === 0 ? 'selected' : '' }}>Active</option>
                        <option value="1" {{ ($product->status) === 1 ? 'selected' : '' }}>Inactive</option>
                        </select>
                     </div>
                      <hr> 
                    </div>
                  </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer" style="background-color:azure; box-shadow:0ch;">
                      <button type="submit" class="btn" style="background-color:hotpink; box-shadow:0ch;">Update</button>
                    </div>
              
                </div>
                <!-- /.card -->
    
              </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
   
        </div> 
      </form>
        {{-- removing rows --}}
      </section>
</div>
@endsection
@section('script')
<!-- Summernote -->
<script src="{{url('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{url('/sortable/jquery-ui.js')}}"></script>



<script type="text/javascript">
$(document).ready(function(){
  $( "#sortable" ).sortable({
    update: function(event,ui){
      var photo_id = new Array();
      $('.sortable_image').each(function(){
     var id= $(this).attr('id');
     photo_id.push(id);
      });

      $.ajax({
          type:"POST",
          url:"{{url('admin/product_image_sortable')}}",
          data: { 
              "photo_id":photo_id,
             "_token":"{{csrf_token()}}"
       },
       dataType:"json",
     success: function (data)
     {
     
     
     },
     error:function (data) 
     {
 
     }
   });
    }
  });
});


    $('.editor').summernote({  height:200});

 var i= 101;
 $('body').delegate('.AddSize','click', function(){

var html='<tr id="DeleteSize'+i+'"> \n\
           <td>\n\
           <input type="text" name="size['+i+'][name]"  placeholder=" New Size" class="form-control">\n\
           </td>\n\
              <td>\n\
                 <input type="text" name="size['+i+'][price]" placeholder=" New Price" class="form-control">\n\
                 </td>\n\
                <td style="width:100px;">\n\
            <button type="button"  id="'+i+'"  class="btn btn-danger DeleteSize" style="background-color: rgb(214, 57, 93);">Delete</button>\n\
            </td>\n\
            </tr>';
            
    i++;
    $('#AppendSize').append(html);
 });
 $('body').delegate('.DeleteSize','click', function()
 {
    var id=$(this).attr('id');
    $('#DeleteSize'+id).remove();
 });

  $('body').delegate('#changeCategory','change', function(e){
   var id =$(this).val();
    $.ajax({
     type:"POST",
     url:"{{url('admin/get_sub_category')}}",
     data: { 
      "id":id,
      "_token":"{{csrf_token()}}"
       },
       dataType:"json",
     success: function (data)
     {
     
   $('#get_sub_category').html(data.html);
     
     },
     error:function (data) 
     {
 
     }
   });
  });
  // Select the form element

 
  </script>
@endsection