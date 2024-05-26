 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
  @php
  $getSetting =App\Models\SystemSettingModel::getSingle();
@endphp
    <strong>Copyright  {{date('Y')}} <a href="#">{{$getSetting->website_name}} &copy;</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
    Privacy&Terms
    </div>
  </footer>