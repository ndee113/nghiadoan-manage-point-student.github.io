@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label >Họ</label>
                    <input required type="text" name="ho" class="form-control" id="lop" placeholder="Nhập họ">
                  </div>

                  <div class="form-group">
                    <label >Tên</label>
                    <input required type="text" name="ten" class="form-control" id="lop" placeholder="Nhập tên">
                  </div>

                  <div class="form-group">
                    <label >Ngày Sinh</label>
                    <input required type="date" name="ngaysinh" class="form-control" id="klophoa" placeholder="Nhập ngày sinh">
                  </div>

                  <div class="form-group">
                    <label >Địa Chỉ</label>
                    <input required type="text" name="diachi" class="form-control" id="lop" placeholder="Nhập địa chỉ">
                  </div>

                  <div class="form-group">
                    <label>Lớp</label>
                    <select name="id_lop" class="form-control" id="lop">
                        @foreach($lops as $key => $lop)
                            <option value="{{$lop->id_lop}}">{{$lop->ten_lop}}</option>
                        @endforeach
                    </select>
                  </div>


                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Thêm mới</button>
                </div>
                @csrf
              </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection