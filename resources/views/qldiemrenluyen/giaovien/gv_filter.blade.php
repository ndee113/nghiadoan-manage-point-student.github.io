@extends('qldiemrenluyen.giaovien.gv_main')
@section('content')

<form action="" method="GET" >
    <label for=""></label>
    @include('qldiemrenluyen.alert')
    <div style="display: flex;" class="form-group">
        <select class="custom-select" name="id_lop">

        <option value="0">---Lọc theo lớp---</option>
            @foreach($lops as $key => $lop)
            @if($lop->giaovien->id_gv == Auth::guard('giaovien_users')->user()->id_gv)
            <option value="{{$lop->id_lop}}" {{request()->id_lop == $lop->id_lop ? 'selected' : false}}> {{$lop->ten_lop}} </option>
            @endif
            @endforeach
        </select>

        <select style="margin-left: 30px;"  class="custom-select" name="id_hocky" id="id_hocky">
            <option value="0" >---Lọc theo học kỳ---</option>
            @foreach($hockys as $key => $hk)
            <option value="{{$hk->id_hocky}}" {{request()->id_hocky == $hk->id_hocky ? 'selected' : false}}> {{$hk->hk_nk}}</option>
            @endforeach
        </select>
        <div class="button-center" style="margin-left: 30px;"><button type="submit" class="btn btn-primary">Lọc</button></div>
    </div>

    <table class="table">
    <thead>
        <tr>
            <th style="width: 50px;">STT</th>
            <th>MSSV</th>
            <th>Họ</th>
            <th>Tên</th>
            <th>Lớp</th>
            <th>Học Kỳ</th>
            <th>Điểm SV chấm</th>
            <th>Điểm GV chấm</th>
            <th>Duyệt/Xem lại</th>
            <!-- <th style="width:100px;">&nbsp;</th> -->
        </tr>
    </thead>
    <tbody>
        @foreach($danhsach as $key => $data)
        <tr>
            <td>{{++$i}}</td>
            <td>{{$data->ma_sv}}</td>
            <td>{{$data->ho_sv}}</td>
            <td>{{$data->ten_sv}}</td>
            <td>{{$data->ten_lop}}</td>
            <td>{{$data->hocky}}</td>
            <td > <button class="btn btn-warning btn-sm">{{$data->diem_tong_sv}}</button></td>
            @if(@$data->diem_tong_gv == null)
                <th><button class="btn btn-warning btn-sm"><i class="fa-solid fa-spinner"></i> Đang chờ duyệt</button></th> 
            @endif
            @if(@$data->diem_tong_gv != null)
            <td ><button class="btn btn-warning btn-sm">{{$data->diem_tong_gv}}</button></td>
            @endif
           
            <td>
                <a class="btn btn-success btn-sm" href="/teacher/edit-diem-sv/{{$data->id_sinhvien}}&{{$data->id_hk}}">
                    <i class="fas fa-edit"></i>
                </a>
                <a class="btn btn-primary btn-sm" href="/teacher/view-diem-sv/{{$data->id_sinhvien}}&{{$data->id_hk}}">
                    <i class="fas fa-eye"></i>
                </a>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<hr>
<nav class="pagination">
    {{$danhsach->links()}}
</nav>
    <!-- @csrf -->
</form>
@endsection