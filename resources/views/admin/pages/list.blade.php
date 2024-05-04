
@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Page List</h1>
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
  
              <div class="card" style="overflow:auto;">
                <div class="card-header">
                  <h3 class="card-title">Page  List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0" >
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        
                         <th>Name</th>
                         <th>title</th>
                         {{-- <th>Slug</th>
                         
                         <th>description</th>
                         <th>image_name</th>
                        <th>meta_description</th>
                         <th>meta_title</th>
                         <th>meta_keywords</th>
                         <th>Created At</th> --}}

                         <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                       @foreach($getRecord as $value)
                      <tr>
                        <td>{{$value->name}}</td>
                        <td>{{$value->title}}</td>
                        {{-- <td>{{$value->slug}}</td>
                        
                        <td>{{$value->description}}</td>
                        <td>{{$value->image_name}}</td>
                        <td>{{$value->meta_description}}</td>
                        <td>{{$value->meta_title}}</td>
                        <td>{{$value->meta_keywords}}</td>
                        <td>{{date('Y-m-d',strtotime(($value->created_at)))}}</td> --}}
                        <td>
                        <a href="{{url('admin/pages/edit/'.$value->id)}}" class="btn" style="background-color: rgb(0, 255, 191);">Edit</a>  
                       </td>                    
                    </tr>
                      @endforeach 
                      </tbody>
                  </table>
                  {{-- <div style="padding: 10px; float:right;">
                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))
                    ->links()!!}
                  </div> --}}
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