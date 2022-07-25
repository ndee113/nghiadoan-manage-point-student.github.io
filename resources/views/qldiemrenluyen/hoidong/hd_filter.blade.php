@extends('qldiemrenluyen.hoidong.hd_main')
@section('content')

<form action="" method="GET" >
    <label for=""></label>
    @include('qldiemrenluyen.alert')
    <div style="display: flex;" class="form-group">
        <select class="custom-select" name="id_lop">

        <option value="0">---Lọc theo lớp---</option>
            @foreach($lops as $key => $lop)
            @if($lop->id_khoa == Auth::guard('hoidong_users')->user()->id_khoa)
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
            <th>Điểm HĐ chấm</th>
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
            @if(@$data->diem_tong_gv != null)
            <td > <span class="badge badge-warning ">{{$data->diem_tong_sv}}</span></td>
            @endif
            @if(@$data->diem_tong_gv == null)
                <th><span class="badge badge-warning "><i class="fa-solid fa-spinner"></i> Đang chờ duyệt</span></th> 
            @endif
            @if(@$data->diem_tong_gv != null)
            <td ><span class="badge badge-warning ">{{$data->diem_tong_gv}}</span></td>
            @endif
            @if(@$data->diem_tong_gv == null)
            <td ><span class="badge badge-warning ">Đang chờ duyệt</span></td>
            @endif
            @if(@$data->diem_tong_hd != null)
            <td ><span class="badge badge-warning ">{{$data->diem_tong_hd}}</span></td>
            @endif
            @if(@$data->diem_tong_hd == null)
            <td ><span class="badge badge-danger ">Đang chờ duyệt</span></td>
            @endif
           
            <td>
                <a class="btn btn-success btn-sm" href="/hoidong/edit-diem-gv/{{$data->id_sinhvien}}&{{$data->id_hk}}">
                    <i class="fas fa-edit"></i>
                </a>
                <a class="btn btn-primary btn-sm" href="/hoidong/view-diem-hd/{{$data->id_sinhvien}}&{{$data->id_hk}}">
                    <i class="fas fa-eye"></i>
                </a>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<hr>
<div style="margin-bottom:30px"><a class="btn btn-success" href="/hoidong/print-pdf-bang-diem/{{request()->id_lop}}&{{request()->id_hocky}}"><i class="fas fa-print"></i> In bảng điểm</a></div>
<nav class="pagination"></nav>
    {{$danhsach->links()}}
</nav>
    <!-- @csrf -->
</form>

@endsection