@extends('admin.main')

@section('content')
<form action="" method="POST">
  <div class="card-body">
    <div class="form-group">
      <label>Tên Lớp</label>
      <input required type="text" value="{{$lop->ten_lop}}" name="ten_lop" class="form-control" id="lop" placeholder="Nhập tên lớp">
    </div>

    <div class="form-group">
      <label>Tên Khoa</label>
      <select name="id_khoa" class="form-control" id="lop">
      @foreach($khoas as $key => $khoa)
        <option {{ $lop->id_khoa == $khoa->id_khoa ? 'selected' : ''}} value="{{$khoa->id_khoa}}">{{$khoa->tenkhoa}}
        </option>
        @endforeach
      </select>
    </div>


    <div class="form-group">
      <label>CVHT</label>
      <select name="id_gv" class="form-control" id="lop">
      @foreach($giaovien as $key => $gv)
        <option {{ $lop->id_gv == $gv->id_gv  ? 'selected' : ''}} value="{{$gv->id_gv}}">{{$gv->ten_gv}}
        </option>
        @endforeach
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
      <button type="submit" class="btn btn-primary">Cập Nhật</button>
    </div>
    @csrf
</form>
@endsection

@section('footer')
@endsection