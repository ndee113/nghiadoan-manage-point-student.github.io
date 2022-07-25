  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
      <img src="/template/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">QL Điểm Rèn Luyện</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/template/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}} </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <!-- <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-bars"></i>&ensp;
              <p>
                Danh Mục
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/menus/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm Danh Mục</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/menus/list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách</p>
                </a>
              </li>
            </ul>
          </li>
        </ul> -->
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/home" class="nav-link">
            <i class="fa-solid fa-pager"></i>&ensp;
              <p>
                Truy cập web
              </p>
            </a>
          </li>
        </ul>

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/admin/khoas/list" class="nav-link">
              <i class="fas fa-university"></i>&ensp;
              <p>
                Khoa
              </p>
            </a>
          </li>
        </ul>

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/admin/khoahocs/list" class="nav-link">
              <i class="fas fa-school"></i>&ensp;
              <p>
                Khóa Học
              </p>
            </a>
          </li>
        </ul>

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/admin/lops/list" class="nav-link">
              <i class="fas fa-users"></i>&ensp;
              <p>
                Lớp
              </p>
            </a>
          </li>
        </ul>

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/admin/sinhviens/list" class="nav-link">
              <i class="fas fa-graduation-cap"></i>&ensp;
              <p>
                Sinh Viên
              </p>
            </a>
          </li>
        </ul>

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/admin/giaoviens/list" class="nav-link">
              <i class="fas fa-chalkboard-teacher"></i>&ensp;
              <p>
                Giáo Viên
              </p>
            </a>
          </li>
        </ul>

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/admin/hoidongs/list" class="nav-link">
              <i class="fas fa-chalkboard-teacher"></i>&ensp;
              <p>
                Hội Đồng
              </p>
            </a>
          </li>
        </ul>

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-bars"></i>&ensp;
              <p>
                Quản lí điểm rèn luyện
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="/admin/tieuchis/list" class="nav-link">
                  <i class="fas fa-tasks"></i>&ensp;
                  <p>
                    Tiêu chí rèn luyện
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/admin/noidungs/list" class="nav-link">
                  <i class="fas fa-tasks"></i>&ensp;
                  <p>
                    Nội dung rèn luyện
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/admin/hockys/list" class="nav-link">
                  <i class="fas fa-tasks"></i>&ensp;
                  <p>
                    Học kỳ - niên khóa
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/admin/diems/list" class="nav-link">
                  <i class="fas fa-tasks"></i>&ensp;
                  <p>
                    Điểm rèn luyện
                  </p>
                </a>
              </li>
            </ul>
          </li>
        </ul>

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/admin/thongbaos/list" class="nav-link">
              <i class="fas fa-bell"></i>&ensp;
              <p>
                Quản lí thông báo
              </p>
            </a>
          </li>
        </ul>

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('logout')}}" class="nav-link">
              <<i class="fas fa-sign-out-alt"></i>&ensp;
                <p>
                  Đăng Xuất
                </p>
            </a>
          </li>
        </ul>
        </ul>
    </div>
    </nav>
    <!-- Sidebar Menu -->
    <!-- /.sidebar -->
  </aside>