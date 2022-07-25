@extends('admin.main')

@section('content')
<form action="" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label >Năm bắt đầu </label>
                    <input required type="text" name="nam_bd" class="form-control" id="khoa_hoc" placeholder="Nhập năm bắt đầu">
                  </div>

                  <div class="form-group">
                    <label >Năm kết thúc</label>
                    <input required type="text" name="nam_kt" class="form-control" id="khoa_hoc" placeholder="Nhập năm kết thúc">
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Thêm mới</button>
                </div>
                @csrf
              </form>
@endsection

@section('footer')
@endsection