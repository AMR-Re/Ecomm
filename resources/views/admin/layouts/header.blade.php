
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{url('assets/dist/img/user1-128x128.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{url('assets/dist/img/user8-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{url('assets/dist/img/user3-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
     
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div href="javascript" class="brand-link" style="text-align: center">
      <span class="brand-text ">E-commerce</span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a >{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
    

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
