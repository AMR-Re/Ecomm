
@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Notification </h1>
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
                  <h3 class="card-title">Contact Us </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0" >
                  <table class="table table-striped">
                    <thead>
                      
                    </thead>
                    <tbody>
                       @foreach($getRecord as $value)
                      <tr>
                        <td>{{$value->id}}</td>
                        
                        <td><a style="color:#000000 {{empty($value->is_read) ? 'font-weight:bold' :'' }}" href="{{$value->url}}?notif_id={{$value->id}}" class="dropdown-item">
                            {{$value->message}} 
                        </a>
                        </td>
                        <td>{{$value->created_at}}</td>
                        
                       
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

@endsection