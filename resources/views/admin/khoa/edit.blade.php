@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label >Tên Khoa</label>
                    <input required type="text" value="{{$khoa->tenkhoa}}" name="tenkhoa" class="form-control" id="khoa" placeholder="Nhập tên khoa">
                  </div>
                  <div class="form-group">
                    <label >Mật Khẩu</label>
                    <input required type="password" name="matkhau" class="form-control" id="khoa" placeholder="Mật khẩu">
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