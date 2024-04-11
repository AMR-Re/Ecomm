
@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Sub Category List</h1>
            </div>
            <div class="col-sm-6 " style="text-align: right;">
             <a href="{{url('admin/sub_category/add')}}" class=" btn text-white " style="background-color:black">Add new sub_Category</a>
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
  
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">sub_Category List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0 " style="overflow: auto;">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                         <th>#id</th>
                         <th>Name</th>
                         <th>Category name</th>
                          <th>Slug</th>
                         <th>meta_title</th>   
                         <th>Meta_description</th>   
                         <th>meta_keywords</th>
                         <th>created_by</th>
                         <th>Status</th>
                         <th>Create_date</th>
                         <th>Action</th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach($getRecord as $value)
                      <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->category_name}}</td>
                        <td>{{$value->slug}}</td>
                        <td>{{$value->meta_title}}</td>
                        <td>{{$value->meta_description}}</td>
                        <td>{{$value->meta_keywords}}</td>
                        <td>{{$value->created_by_name}}</td>
                        <td>{{($value->status==0) ? 'Active' : 'inActive'}}</td>
                        <td>{{date('d-m-y',strtotime(($value->created_at)))}}</td>
                        <td style="display:flex;">
                        <a href="{{url('admin/sub_category/edit/'.$value->id)}}" class="btn" style="background-color: rgb(0, 255, 191);">Edit</a>  
                        <a href="{{url('admin/sub_category/delete/'.$value->id)}}" class="btn btn-danger" style="background-color: rgb(214, 57, 93);">Delete</a>
                     
                        </td>
                        


                      </tr>
                      @endforeach
                      </tbody>
                  </table>
                  <div style="padding: 10px; float:right;">
                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))
                    ->links()!!}
                  </div>
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