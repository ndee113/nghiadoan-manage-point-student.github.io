
<!DOCTYPE html>
<html lang="en">
<head>
@include('qldiemrenluyen.head')
</head>
<body class="hold-transition layout-top-nav">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- /.navbar -->
@include('qldiemrenluyen.hoidong.hd_navbar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
      <h1 class="card-title">{{$title}}</h1>
        <div class="card-body">
                @yield('content')
        </div>
      </div><!-- /.container-fluid -->
    </div>
  </div>
</div>

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <!-- Default to the left -->
    <strong>Copyright &copy; 2022 <a href="#">Quản lí điểm rèn luyện</a>.</strong> All rights reserved.
  </footer>
@include('qldiemrenluyen.footer')
</body>
</html>
