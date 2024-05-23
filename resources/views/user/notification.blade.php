@extends('layouts.app')
@Section('style')
   

@endsection
      <!-- End .header -->
@Section('content')

<main class="main">
    <div class="page-header text-center" >
        <div class="container">
            <h1 class="page-title">Notifications<span>ARABICA!</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
   
   

    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <br/>
              <div class="row">
                  @include('user._asidebar')
                    <div class=" col-md-8 col-lg-9">
                        <div class="tab-content" style="box-sizing:content-box;">
                    <div class="card-body" style="box-sizing:content-box;">
                              <table class=" table-striped" style="box-sizing:content-box; border-collapse:separate;">
                                <thead>
                                  <tr>
                                    <th>Notification Id</th>
                                    <th style="width:200px" class="text-center">Message</th>

                                     <th>CreatedAt</th>
                                  
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($getRecord as $value)
                                    <tr>
                                      <td>{{$value->id}}</td>
                                      
                                      <td>
                                        <a style="color:#000; {{ empty($value->is_read) ? 'font-weight:bold' : '' }}"
                                           href="{{$value->url}}?notif_id={{$value->id}}" >
                                            {{$value->message}}
                                        </a>
                                    </td>
                                      <td><small>{{Carbon\carbon::parse($value->created_at)->diffForHumans()}}</small></td>
                                      
                                     
                                    </tr>
                                    @endforeach
                                  </tbody>
                              </table>
                    </div>
                              <div style="">
                                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))
                                ->links()!!}
                              </div>
                       
                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->


@endsection
       <!-- End .footer -->
       @Section('script')

       
       @endsection