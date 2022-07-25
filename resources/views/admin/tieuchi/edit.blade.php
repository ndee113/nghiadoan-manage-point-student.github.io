@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label >Tên tiêu chí</label>
                    <input required type="text" value="{{$tieuchi->noidung_tc}}" name="noidung_tc" class="form-control" id="tieuchi" placeholder="Nhập tên tc">
                  </div>

                  <div class="form-group">
                    <label >Điểm tối đa</label>
                    <input required type="text" value="{{$tieuchi->diem_td}}" name="diem_td" class="form-control" id="tieuchi" placeholder="Nhập điểm">
                  </div>


                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
                @csrf
              </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection