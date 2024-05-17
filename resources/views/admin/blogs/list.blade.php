
@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Blog List</h1>
            </div>
            <div class="col-sm-6 " style="text-align: right;">
             <a href="{{url('admin/blogs/add')}}" class=" btn text-white " style="background-color:black">Add new blog</a>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            {{-- removing column --}}

            <!-- /.col -->
            <div class="col-md-12">
  @include('admin.layouts._message')
              
              <!-- /.card -->
  
              <div class="card" style="overflow: auto;">
                <div class="card-header">
                  <h3 class="card-title">Blog List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                         <th>Blog-id</th>
                         <th>Title</th>
                         <th>Category</th>
                         <th>Image Name</th>
                         <th>Short description</th>
                         <th>Discription</th>
                         <th>meta_title</th>   
                         <th>Meta_description</th>   
                         <th>meta_keywords</th>
                         <th>Status</th>
                         <th>Create Date</th>
                         <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($getRecord as $value)
                      <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->title}}</td>
                        <td>{{$value->blog_category_id}}</td>
                        @if(!empty($value->getImage()))
                                    <td>
                                      <img src="{{$value->getImage()}}" style="height: 100px;">
                                    </td>
                         @endif
                        <td>{!!$value->short_description!!}</td>
                        <td>{!!$value->description!!}</td>
                        <td>{{$value->meta_title}}</td>
                        <td>{{$value->meta_description}}</td>
                        <td>{{$value->meta_keywords}}</td>
                        <td>{{($value->status==0) ? 'Active' : 'inActive'}}</td>
                        <td>{{date('d-m-y',strtotime(($value->created_at)))}}</td>
                        <td style="display: inline-flex;">
                        <a href="{{url('admin/blogs/edit/'.$value->id)}}" class="btn" style="background-color: rgb(0, 255, 191);">Edit</a>  
                        <a href="{{url('admin/blogs/delete/'.$value->id)}}" class="btn btn-danger " style="background-color: rgb(214, 57, 93);">Delete</a>
                        </td>
                      </tr>
                      @endforeach
                      </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
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
{{-- <script src="{{url('assets/dist/js/pages/dashboard3.js')}}"></script> --}}

@endsection