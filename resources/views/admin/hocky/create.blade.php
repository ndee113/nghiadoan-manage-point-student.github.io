@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label >Học kỳ - Niên khóa</label>
                    <input required type="text" name="hk_nk" class="form-control" id="hocky" placeholder="Nhập tên khoa">
                  </div>

                  <div class="form-group">
                    <label >Học kỳ xét</label>  
                    <input required type="text" name="hk_xet" class="form-control" id="hocky" placeholder="Nhập tên tài khoản">
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