@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label >Nội dung </label>
                    <textarea  name="noidung" class="form-control" id="noidung" >{{$noidung->noidung}}</textarea>
                  </div>

                  <div class="form-group">
                    <label>Tiêu chí</label>
                    <select name="id_tc" class="form-control" id="lop">
                        @foreach($tieuchis as $key => $tc)
                        <option {{ $noidung->id_tc == $tc->id_tc  ? 'selected' : ''}} value="{{$tc->id_tc}}">{{$tc->noidung_tc}}
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label >Điểm tối đa nội dung</label>
                    <input required type="text"  value="{{$noidung->diem_nd}}" name="diem_nd" class="form-control" id="tieuchi" placeholder="Nhập điểm">
                  </div>


                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Cập nhât</button>
                </div>
                @csrf
              </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('noidung');
    </script>
@endsection