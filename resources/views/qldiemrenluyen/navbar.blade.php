<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="/" class="navbar-brand">
        <img src="/template/homepage/dist/img/sv_logo_dashboard.png" style="height:40px !important" alt="DNC Logo" class="brand-image" style="opacity: .8">
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="/" class="nav-link"> <i class="fas fa-home"></i> Trang chủ</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"> <i class="fas fa-list"></i> Điểm rèn luyện</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="{{route('cham-diem')}}" class="dropdown-item">Sinh viên chấm điểm rèn luyện</a></li>
              <li><a href="{{route('list_diem_sv')}}/?id={{Auth::guard('sinhvien_users')->user()->id_sinhvien}} " class="dropdown-item">Xem lại điểm rèn luyện</a></li>

              <li class="dropdown-divider"></li>

              <!-- Level two dropdown-->
              <!-- End Level two -->
            </ul>
          </li>
        </ul>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fas fa-user"></i> {{Auth::guard('sinhvien_users')->user()->ho}} {{Auth::guard('sinhvien_users')->user()->ten}}</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="{{route('profile-student')}}" class="dropdown-item">Quản lí tài khoản</a></li>
              <li class="dropdown-divider"></li>
              <li><a href="#" class="dropdown-item">Đổi mật khẩu</a></li>
              <li class="dropdown-divider"></li>
              <!-- Level two dropdown-->
              <li><a href="{{ Route('sign-out')}}" class="dropdown-item">Đăng xuất</a></li>
              <!-- End Level two -->
            </ul>
          </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->