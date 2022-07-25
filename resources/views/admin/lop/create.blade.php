@extends('admin.main')

@section('content')
<form action="" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label >Tên Lớp</label>
                    <input required type="text" name="ten_lop" class="form-control" id="lop" placeholder="Nhập tên lớp">
                  </div>

                  <div class="form-group">
                    <label>Tên Khoa</label>
                    <select name="id_khoa" class="form-control" id="khoa">
                    <option value="#">--Chọn Khoa--</option>
                        @foreach($khoas as $key => $khoa)
                            <option value="{{$khoa->id_khoa}}">{{$khoa->tenkhoa}}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label>CVHT</label>
                    <select name="id_gv" class="form-control" id="GVSelectBox">

                    </select>
                  </div>

                  <div class="form-group">
                    <label>Khóa học</label>
                    <select name="id_khoa_hoc" class="form-control" id="lop">
                        @foreach($khoa_hocs as $key => $khoahoc)
                            <option value="{{$khoahoc->id_khoa_hoc}}">K{{$khoahoc->id_khoa_hoc}} ({{$khoahoc->nam_bd}}-{{$khoahoc->nam_kt}})</option>
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
@endsection