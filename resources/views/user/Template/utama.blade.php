<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
@include('user.Template.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">


  <!-- Navbar -->
  @include('user.Template.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('user.Template.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('konten')
  </div>
  <!-- /.content-wrapper -->


  <!-- Main Footer -->
  <footer class="main-footer">
   @include('user.Template.footer')
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@include('user.Template.script')
</body>
</html>
