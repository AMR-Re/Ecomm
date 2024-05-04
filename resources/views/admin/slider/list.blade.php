
@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Slider List</h1>
            </div>
            <div class="col-sm-6 " style="text-align: right;">
             <a href="{{url('admin/slider/add')}}" class=" btn text-white " style="background-color:black">Add new Slider</a>
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
                  <h3 class="card-title">Slider List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                         <th>Slider id</th>
                         <th>Slider-name</th>
                         <th>Image</th>
                         <th>Button name</th>
                         <th>Button link</th>
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
                     <td>
                      @if(!empty($value->getImage()))
                      <img src="{{$value->getImage()}}" style="height: 100px;">
                      @endif
                     </td>
                        <td>{{$value->button_name}}</td> 
                        <td>{{$value->button_link}}</td> 


                        <td>{{($value->status==0) ? 'Active' : 'inActive'}}</td>
                        <td>{{date('d-m-y',strtotime(($value->created_at)))}}</td> 

                        <td>
                        <a href="{{url('admin/slider/edit/'.$value->id)}}" class="btn" style="background-color: rgb(0, 255, 191);">Edit</a>  
                        <a href="{{url('admin/slider/delete/'.$value->id)}}" class="btn btn-danger" style="background-color: rgb(214, 57, 93);">Delete</a>
                     
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