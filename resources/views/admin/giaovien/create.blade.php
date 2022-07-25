@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label >Họ</label>
                    <input required type="text" name="ho_gv" class="form-control" id="giaovien" placeholder="Nhập họ">
                  </div>
                  <div class="form-group">
                    <label >Tên</label>
                    <input required type="text" name="ten_gv" class="form-control" id="giaovien" placeholder="Nhập tên">
                  </div>

                  <div class="form-group">
                    <label >Số điện thoại</label>
                    <input required type="text" name="so_dt" class="form-control" id="giaovien" placeholder="Nhập số điện thoại">
                  </div>

                  <div class="form-group">
                    <label>Khoa</label>
                    <select name="id_khoa" class="form-control" id="giaovien">
                        @foreach($khoas as $key => $khoa)
                            <option value="{{$khoa->id_khoa}}">{{$khoa->tenkhoa}}</option>
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