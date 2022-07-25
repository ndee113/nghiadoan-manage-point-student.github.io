@extends('admin.main')

@section('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="" method="POST">
  <div class="card-body">
    <div class="form-group">
      <label>Tên</label>
      <input required type="text" value="{{$hoidongs->ten_hd}}" name="ten_gv" class="form-control" id="giaovien" placeholder="Nhập tên">
    </div>

    <div class="form-group">
      <label>Email</label>
      <input required type="email" value="{{$hoidongs->email}}" name="email" class="form-control" id="giaovien" placeholder="Nhập email">
    </div>

    <div class="form-group">
      <label>Số điện thoại</label>
      <input required type="text" value="{{$hoidongs->so_dt}}" name="so_dt" class="form-control" id="giaovien" placeholder="Nhập số điện thoại">
    </div>

    <div class="form-group">
      <label>Khoa</label>
      <select name="id_khoa" class="form-control" id="giaovien">
        @foreach($khoas as $key => $khoa)
        <option {{ $hoidongs->id_khoa == $khoa->id_khoa ? 'selected' : ''}} value="{{$khoa->id_khoa}}">{{$khoa->tenkhoa}}
        </option>
        @endforeach
      </select>
    </div>


    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Thêm Mới</button>
    </div>
    @csrf
</form>
@endsection

@section('footer')
<script>
  CKEDITOR.replace('content');
</script>
@endsection