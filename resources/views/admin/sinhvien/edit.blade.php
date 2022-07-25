@extends('admin.main')

@section('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="" method="POST">
  <div class="card-body">
    <div class="form-group">
      <label>Họ</label>
      <input required type="text" value="{{$sinhvien->ho}}" name="ho" class="form-control" id="lop" placeholder="Nhập họ">
    </div>

    <div class="form-group">
      <label>Tên</label>
      <input required type="text" value="{{$sinhvien->ten}}" name="ten" class="form-control" id="lop" placeholder="Nhập tên">
    </div>

    <div class="form-group">
      <label>Ngày Sinh</label>
      <input required type="date" value="{{$sinhvien->ngaysinh}}" name="ngaysinh" class="form-control" id="klophoa" placeholder="Nhập ngày sinh">
    </div>

    <div class="form-group">
      <label>Địa Chỉ</label>
      <input required type="text" value="{{$sinhvien->diachi}}" name="diachi" class="form-control" id="lop" placeholder="Nhập địa chỉ">
    </div>

    <div class="form-group">
      <label>Lớp</label>
      <select name="id_lop" class="form-control" id="lop">
        @foreach($lops as $key => $lop)
        <option {{ $sinhvien->id_lop == $lop->id_lop  ? 'selected' : ''}} value="{{$lop->id_lop}}">{{$lop->ten_lop}}
        </option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label>Mật Khẩu</label>
      <input required type="password" name="matkhau" class="form-control" id="lop" placeholder="Mật khẩu">
    </div>


    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Cập Nhật</button>
    </div>
    @csrf
</form>
@endsection

@section('footer')
<script>
  CKEDITOR.replace('content');
</script>
@endsection