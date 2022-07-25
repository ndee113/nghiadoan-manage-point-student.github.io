@extends('admin.main')


@section('content')
<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$sinhvien->count()}}</h3>
                <p>Sinh viên</p>
              </div>
              <div class="icon">
              <i class="fas fa-graduation-cap"></i>
              </div>
              <a href="/admin/sinhviens/list" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$giaovien->count()}}</h3>

                <p>Giáo viên</p>
              </div>
              <div class="icon">
              <i class="fas fa-chalkboard-teacher"></i>
              </div>
              <a href="/admin/giaoviens/list" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$lop->count()}}</h3>

                <p>Lớp</p>
              </div>
              <div class="icon">
              <i class="fas fa-users"></i>
              </div>
              <a href="/admin/lops/list" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$khoa->count()}}</h3>

                <p>Khoa</p>
              </div>
              <div class="icon">
              <i class="fas fa-university"></i>
              </div>
              <a href="/admin/khoas/list" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
@endsection