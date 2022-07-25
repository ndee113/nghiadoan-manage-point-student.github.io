
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="/teacher" class="navbar-brand">
        <img src="/template/homepage/dist/img/sv_logo_dashboard.png" style="height:40px !important" alt="DNC Logo" class="brand-image" style="opacity: .8">
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="/teacher" class="nav-link"> <i class="fas fa-home"></i> Trang chủ</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"> <i class="fas fa-list"></i> Điểm rèn luyện</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <!-- <li><a href="/sinhvien/cham-diem-ren-luyen" class="dropdown-item">Sinh viên chấm điểm rèn luyện</a></li>
              <li><a href="#" class="dropdown-item">Xem lại điểm rèn luyện</a></li> -->

              <li class="dropdown-divider"></li>

              <!-- Level two dropdown-->
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Bảng tổng hợp</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1" href="{{Route('filter')}}" class="dropdown-item">Bảng tổng hợp SV chấm</a>
                  </li>
                </ul>
              </li>
              <!-- End Level two -->
            </ul>
          </li>
        </ul>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fas fa-user"></i> {{Auth::guard('giaovien_users')->user()->ho_gv}} {{Auth::guard('giaovien_users')->user()->ten_gv}}</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="#" class="dropdown-item">Quản lí tài khoản</a></li>
              <li class="dropdown-divider"></li>
              <li><a href="#" class="dropdown-item">Đổi mật khẩu</a></li>
              <li class="dropdown-divider"></li>
              <!-- Level two dropdown-->
              <li><a href="{{ Route('sign-out-gv')}}" class="dropdown-item">Đăng xuất</a></li>
              <!-- End Level two -->
            </ul>
          </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->