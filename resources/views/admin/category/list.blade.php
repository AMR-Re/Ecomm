
@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Category List</h1>
            </div>
            <div class="col-sm-6 " style="text-align: right;">
             <a href="{{url('admin/category/add')}}" class=" btn text-white " style="background-color:black">Add new Category</a>
            </div>
          </div>
        </div>
      </section>
  
      
      <section class="content">
        <div class="container-fluid">
          <div class="row">
           
         
            <div class="col-md-12">
  @include('admin.layouts._message')
              
       
  
              <div class="card" style="overflow: auto;">
                <div class="card-header">
                  <h3 class="card-title">Category List</h3>
                </div>
              
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                         <th>Cat-id</th>
                         <th>Image</th>
                         <th>Name</th>
                         <th>Slug</th>
                         <th>meta_title</th>   
                         <th>Meta_description</th>   
                         <th>meta_keywords</th>
                         <th>created_by</th>
                         <th>Home</th>
                         <th>Menu</th>
                         <th>Status</th>
                         <th>Create Date</th>
                         <th>Action</th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach($getRecord as $value)
                      <tr>
                        <td>{{$value->id}}</td>
                        <td>
                        @if(!empty($value->getImage()))
                        <img src="{{$value->getImage()}}" style="height: 100px; width:90px;">
                        @endif
                      </td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->slug}}</td>
                       
                        <td>{{$value->meta_title}}</td>
                        <td>{{$value->meta_description}}</td>
                        <td>{{$value->meta_keywords}}</td>
                        <td>{{$value->created_by_name}}</td>
                        <td>{{($value->is_home==1)? 'Yes' : 'No'}}</td>
                        <td>{{($value->is_menu==1)? 'Yes' : 'No'}}</td>
                        <td>{{($value->status==0) ? 'Active' : 'inActive'}}</td>
                        <td>{{date('d-m-y',strtotime(($value->created_at)))}}</td>
                        <td style="display: inline-flex;">
                        <a href="{{url('admin/category/edit/'.$value->id)}}" class="btn" style="background-color: rgb(0, 255, 191);">Edit</a>  
                        <a href="{{url('admin/category/delete/'.$value->id)}}" class="btn btn-danger " style="background-color: rgb(214, 57, 93);">Delete</a>
                     
                        </td>
                        


                      </tr>
                      @endforeach
                      </tbody>
                  </table>
                </div>
      
              </div>
    
            </div>
         
          </div>
       
        </div> 
   
      </section>
</div>
@endsection

@section('script')


@endsection