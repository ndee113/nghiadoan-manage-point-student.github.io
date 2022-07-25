@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="" method="POST">
                <div class="card-body">
                <div class="form-group">
                    <label>Học kỳ</label>
                    <select name="id_hocky" class="form-control" id="id_hocky">
                        @foreach($hockys as $key => $hk)
                            <option value="{{$hk->id_hocky}}">{{$hk->hk_nk}}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label >Ngày SV bắt đầu</label>
                    <input required type="date" name="ngay_sv" class="form-control" id="ngay_sv" placeholder="Nhập tên tc">
                  </div>

                  <div class="form-group">
                    <label >Ngày SV kết thúc</label>
                    <input required type="date" name="ngay_ktsv" class="form-control" id="ngay_ktsv" placeholder="Nhập tên tc">
                  </div>
                  <div class="form-group">
                    <label >Ngày GV bắt đầu</label>
                    <input required type="date" name="ngay_gv" class="form-control" id="ngay_gv" placeholder="Nhập tên tc">
                  </div>

                  <div class="form-group">
                    <label >Ngày GV kết thúc</label>
                    <input required type="date" name="ngay_ktgv" class="form-control" id="ngay_ktgv" placeholder="Nhập tên tc">
                  </div>
                  <div class="form-group">
                    <label >Ngày HĐ bắt đầu</label>
                    <input required type="date" name="ngay_hd" class="form-control" id="ngay_hd" placeholder="Nhập tên tc">
                  </div>

                  <div class="form-group">
                    <label >Ngày HĐ kết thúc</label>
                    <input required type="date" name="ngay_kthd" class="form-control" id="ngay_kthd" placeholder="Nhập tên tc">
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