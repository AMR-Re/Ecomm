
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      
      <!-- Messages Dropdown Menu -->
      @php
      $getUnreadNotification= App\Models\NotificationModel::getUnreadNotification();
      @endphp
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">{{$getUnreadNotification->count()}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">{{$getUnreadNotification->count()}} Notifications</span>
          @foreach($getUnreadNotification as $notif)
          <div class="dropdown-divider"></div>
          <a style="color:#000; {{ empty($notif->is_read) ? 'font-weight:bold' : '' }}" href="{{$notif->url}}?notif_id={{$notif->id}}" class="dropdown-item">
          <div>{{$notif->message}}</div>
            <div class=" text-muted text-sm"><small>{{Carbon\carbon::parse($notif->created_at)->diffForHumans()}}</small></div>
          </a>
          @endforeach
          <div class="dropdown-divider"></div>
          <a href="{{url('admin/notification')}}" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
     
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div href="javascript" class="brand-link" style="text-align: center">
      <span class="brand-text ">Welcom <span><i class=" fas fa-home" style="color: #785494"></i></span> 
        <a>{{Auth::user()->name}}</a>
      </span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
    
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="{{url('admin/dashboard')}}" class="nav-link   @if( Request::segment(2)=='dashboard') active @endif ">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard  
                    <i class="right fas fa-angle-left"></i>

                  </p>
                </a>
              </li>
              <li class="nav-item">
                {{-- how to use Segment in laravel reach every part of the yrl using the segment request and pass the number of part you want to reach 'segment' --}}
                <a href="{{url('admin/admin/list')}}" class="nav-link @if( Request::segment(2)=='admin') active @endif  ">
                  <i class="nav-icon fas  fa-user"></i>
                  <p>
                   Admin
                    <i class="right fas fa-angle-left"></i>

                  </p>
                </a>
              </li>
              <li class="nav-item">
                {{-- how to use Segment in laravel reach every part of the yrl using the segment request and pass the number of part you want to reach 'segment' --}}
                <a href="{{url('admin/customer/list')}}" class="nav-link @if( Request::segment(2)=='customer') active @endif  ">
                  <i class="nav-icon 	fas fa-users"></i>
                  <p>
                 Customer
                    <i class="right fas fa-angle-left"></i>

                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/order/list')}}" class="nav-link @if( Request::segment(2)=='order') active @endif  ">
                  <i class="nav-icon left 	fas fa-cart-plus"></i>
                  <p>
                  Orders
                 </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/category/list')}}" class="nav-link @if( Request::segment(2)=='category') active @endif  ">
                  <i class="nav-icon left far fa-object-ungroup"></i>
                  <p>
                  Category
                 </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/sub_category/list')}}" class="nav-link @if( Request::segment(2)=='sub_category') active @endif  ">
                  <i class="nav-icon left far fa-object-group"></i>
                  <p>
                  Sub-Category
                 </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/brand/list')}}" class="nav-link @if( Request::segment(2)=='brand') active @endif  ">
                  <i class="nav-icon left		fab fa-creative-commons"></i>
                  <p>
                  Brand
                 </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/color/list')}}" class="nav-link @if( Request::segment(2)=='color') active @endif  ">
                  <i class="nav-icon left	fas fa-palette"></i>
                  <p>
                  Color
                 </p>
                </a>
              </li>
              <li class="nav-item">
              <a href="{{url('admin/product/list')}}" class="nav-link @if( Request::segment(2)=='product') active @endif  ">
                <i class="nav-icon left fas fa-box "></i>
                <p>
                 Products
               </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('admin/discount_code/list')}}" class="nav-link @if( Request::segment(2)=='discount_code') active @endif  ">
                <i class="nav-icon left fas fa-barcode "></i>
                <p>
                 Discount Code
               </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('admin/shipping_charge/list')}}" class="nav-link @if( Request::segment(2)=='shipping_charge') active @endif  ">
                <i class="nav-icon left fas fa-shipping-fast "></i>
                <p>
             Shipping Charge
               </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('admin/pages/list')}}" class="nav-link @if( Request::segment(2)=='pages') active @endif  ">
                <i class="nav-icon left far fa-folder-open"></i>
                <p>
             Pages
               </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('admin/slider/list')}}" class="nav-link @if( Request::segment(2)=='slider') active @endif  ">
                <i class="nav-icon left fa fa-spinner"></i>
                <p>
             Slider
               </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('admin/partner/list')}}" class="nav-link @if( Request::segment(2)=='partner') active @endif  ">
                <i class="nav-icon left fas fa-award"></i>
                <p>
             Partner Logo
               </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('admin/contactus')}}" class="nav-link @if( Request::segment(2)=='contactus') active @endif  ">
                <i class="nav-icon left fas fa-address-book"></i>
                <p>
             Contact Us
               </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('admin/blog/list')}}" class="nav-link @if( Request::segment(2)=='blog') active @endif  ">
                <i class="nav-icon left fas fa-blog"></i>
                <p>
             Blog Category
               </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('admin/blogs/list')}}" class="nav-link @if( Request::segment(2)=='blogs') active @endif  ">
                <i class="nav-icon left fas fa-blog"></i>
                <p>
             Blog 
               </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('admin/system-setting')}}" class="nav-link @if( Request::segment(2)=='system-setting') active @endif  ">
                <i class="nav-icon left fas fa-cogs"></i>
                <p>
           Setting
               </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('admin/payment-setting')}}" class="nav-link @if( Request::segment(2)=='payment-setting') active @endif  ">
                <i class="nav-icon left fas fa-key"></i>
                <p>
           Payment Setting
               </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('admin/home-setting')}}" class="nav-link @if( Request::segment(2)=='home-setting') active @endif  ">
                <i class="nav-icon left fas fa-cogs"></i>
                <p>
         Home  Setting
               </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('admin/smtp-setting')}}" class="nav-link @if( Request::segment(2)=='smtp-setting') active @endif  ">
                <i class="nav-icon left fas fa-cogs"></i>
                <p>
         SMTP  Setting
               </p>
              </a>
            </li>
          <li class="nav-item">
            <a href="{{url('admin/logout')}}" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt "></i>
              <p>
                Logout
            
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
