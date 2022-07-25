@extends('qldiemrenluyen.main')
@section('content')
@include('qldiemrenluyen.alert')
<form action="" method="GET">
<h1 style="line-height:50px;">Danh sách điểm sinh viên</h1>
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
            <td><span class="badge badge-warning " style="font-size: 16px;" >{{$data->diem_tong_sv}}</span></td>
            @if(@$data->diem_tong_gv == null)
                <td > <span class="badge badge-danger" style="font-size: 16px;"><i class="fa-solid fa-spinner"></i> Đang chờ duyệt</span></td> 
            @endif
            @if(@$data->diem_tong_gv != null)
            <td><span class="badge badge-warning" style="font-size: 16px;" >{{$data->diem_tong_gv}}</span></td>
            @endif

            @if(@$data->diem_tong_hd == null)
                <td><span class="badge badge-danger" style="font-size: 16px;"><i class="fa-solid fa-spinner"></i> Đang chờ duyệt</span></td> 
            @endif
            @if(@$data->diem_tong_hd != null)
            <td >{{$data->diem_tong_hd}}</td>
            @endif
           
            <td>
                <a class="btn btn-success btn-sm" href="/sinhvien/sua-diem-ren-luyen">
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
    <!-- @csrf -->
</form>
@endsection