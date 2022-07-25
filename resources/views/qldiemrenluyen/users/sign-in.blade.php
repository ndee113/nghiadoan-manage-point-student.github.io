
<!DOCTYPE html>
<html lang="en">
<head>
    @include('qldiemrenluyen.head') 
</head>
<body class="hold-transition layout-top-nav">
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container" style="display:flex;justify-content:center">
      <a href="#" class="navbar-brand">
        <img src="/template/homepage/dist/img/sv_logo_dashboard.png" style="height:60px !important" alt="DNC Logo" class="brand-image" style="opacity: .8">
      </a>
    </div>
</nav>

<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="/template/homepage/dist/img/sinhvien.png"
          class="img-fluid" alt="Phone image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
      <h2 class="fw-bold mb-5">ĐĂNG NHẬP HỆ THỐNG</h2>
      @include('qldiemrenluyen.alert')
        <form action="{{ Route('sign-in-store') }}" method="post">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="form1Example13" class="form-control form-control-lg" name="email" />
            <label class="form-label" for="form1Example13">Email</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" id="form1Example23" class="form-control form-control-lg" name="password" />
            <label class="form-label" for="form1Example23">Mật khẩu</label>
          </div>

          <div class="d-flex justify-content-around align-items-center mb-4">
            <!-- Checkbox -->
            <div class="form-check">
              <input class="form-check-input" name="remember" type="checkbox" value="" id="form1Example3" checked />
              <label class="form-check-label"  for="form1Example3"> Nhớ mật khẩu </label>
            </div>
            <a href="#!">Quên mật khẩu?</a>
          </div>
          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-lg btn-block">Đăng nhập</button>
          @csrf
        </form>

        <div class="" style="line-height: 50px;">
            <!-- Link login giao vien -->
          <a href="{{ Route('sign-in-gv')}}">Trang đăng nhập dành cho CB-GV <i class="fa-solid fa-right-long"></i></a>
        </div>
        <div class="" style="line-height: 50px;">
            <!-- Link login giao vien -->
          <a href="{{ Route('sign-in-hd')}}">Trang đăng nhập dành cho Hội đồng <i class="fa-solid fa-right-long"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>
@include('qldiemrenluyen.footer') 
</body>
</html>