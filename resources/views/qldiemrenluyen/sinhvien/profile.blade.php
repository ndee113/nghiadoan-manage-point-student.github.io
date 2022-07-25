@extends('qldiemrenluyen.main')


@section('content')
<style>
body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}

</style>

<div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="/template/homepage/dist/img/favpng_student-education-medicine-course.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>{{Auth::guard('sinhvien_users')->user()->ho}} {{Auth::guard('sinhvien_users')->user()->ten}}</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Họ và tên</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{Auth::guard('sinhvien_users')->user()->ho}} {{Auth::guard('sinhvien_users')->user()->ten}}
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">MSSV</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{Auth::guard('sinhvien_users')->user()->ma_sv}} 
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Ngày sinh</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{Auth::guard('sinhvien_users')->user()->ngaysinh}}
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Quê quán</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{Auth::guard('sinhvien_users')->user()->diachi}}
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Địa chỉ Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{Auth::guard('sinhvien_users')->user()->email}}
                    </div>
                  </div>
                  <hr>
               
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " target="__blank" href="#">Cập nhật</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>

@endsection

@section('qldiemrenluyen.footer')

@endsection
