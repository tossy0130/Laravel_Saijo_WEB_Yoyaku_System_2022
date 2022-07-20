<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('kanri_title') - Saijo_Demo-管理画面</title>

<!-- chromeの翻訳を出さないため -->
<meta http-equiv="Content-Language" content="ja">
<meta name="google" content="notranslate">
<!-- chromeの翻訳を出さないため END -->

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->

  <!--　20220615 変更
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
  -->

  <!-- Navbar -->

  
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->

 @include('parts.header_kanri_top')
  
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('yoyaku.index') }}" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">●●斎場</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="background: #2e465e;">
   
      <!-- Sidebar Menu -->
      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

             <li class="nav-item" id="menu_d">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
               マスター設定
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview" id="menu_c">

              <li class="nav-item">
                <a href="{{ route('sisetu.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>施設登録</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ユーザー登録</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>火葬枠登録</p>
                </a>
              </li>

                 <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>式場枠登録</p>
                </a>
              </li>

                 <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>休場登録</p>
                </a>
              </li>

                 <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>日別枠登録</p>
                </a>
              </li>

                  <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>料金登録</p>
                </a>
              </li>

                  <li class="nav-item">
                <a href="{{ route('wareki.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>和暦登録</p>
                </a>
              </li>

                  <li class="nav-item">
                <a href="{{ route('info.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>お知らせ登録</p>
                </a>
              </li>

            </ul>
          </li>


          <li class="nav-item" style="background: #2c3e50;padding: 5px 0;margin: 2.5px 0;">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
              火葬台帳入力
              </p>
            </a>
          </li>

        <li class="nav-item" style="background: #2c3e50;padding: 5px 0;margin: 2.5px 0;">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                予約状況表
              </p>
            </a>
          </li>

          <li class="nav-item" style="background: #2c3e50;padding: 5px 0;margin: 2.5px 0;">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                利用許可書
              </p>
            </a>
          </li>

          <li class="nav-item" style="background: #2c3e50;padding: 5px 0;margin: 2.5px 0;">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                領収書
              </p>
            </a>
          </li>

        <li class="nav-item" style="background: #2c3e50;padding: 5px 0;margin: 2.5px 0;">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                火葬報告一覧
              </p>
            </a>
        </li>

        <li class="nav-item" style="background: #2c3e50;padding: 5px 0;margin: 2.5px 0;">
            <a href="#" class="nav-link">
             <i class="nav-icon fas fa-columns"></i>
              <p>
                施設利用一覧
              </p>
            </a>
        </li>

          <li class="nav-item" style="background: #2c3e50;padding: 5px 0;margin: 2.5px 0;">
            <a href="{{ route('syokisettei.index') }}" class="nav-link">
             <i class="nav-icon fas fa-columns"></i>
              <p>
                基本情報設定
              </p>
            </a>
        </li>

       

  

          <li class="nav-item" style="background: #2c3e50;padding: 10px 0;margin: 5px 0;">
            <a href="#" class="nav-link">
              <i class="nav-icon">業務終了</i>
              <p>
            
              </p>
            </a>
        </li>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
@yield('kanri_content')
</div>

 
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="https://adminlte.io">●●斎場.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<script>
$(function(){ 
  $('#menu_d').click(function(){
    $('#menu_c').toggle(400);
  });
});


</script>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->




<script src="plugins/jquery-ui/jquery-ui.min.js"></script>


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->


<script src="plugins/sparklines/sparkline.js"></script>


<!-- JQVMap -->

<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>


<!-- jQuery Knob Chart -->

<script src="plugins/jquery-knob/jquery.knob.min.js"></script>


<!-- daterangepicker -->

<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>


<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>

<!-- overlayScrollbars -->

<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- AdminLTE App -->

<!-- 20220615 変更
<script src="dist/js/adminlte.js"></script>
-->

<script src="dist/js/demo.js"></script>
<script src="dist/js/pages/dashboard.js"></script>


</body>
</html>
