@extends('admin.main')

@section('content')
<a class="btn btn-primary" href="{{ route('sinhviens.create')}}">Thêm Mới</a>
<div class="flex" >
    <form style="display: flex;margin-top:10px;" action="{{Route('export_sv')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" accept=".xlsx"><br>
        <input type="submit" value="Import CSV" name="import_csv" class="btn btn-warning">
    </form>
</div>
<table class="table">
    <thead>
        <tr>
            <th style="width: 50px;">STT</th>
            <th>MSSV</th>
            <th>Họ</th>
            <th>Tên</th>
            <th>Ngày Sinh</th>
            <th>Địa chỉ</th>
            <th>Email</th>
            <th>Lớp</th>
            <th>Update</th>
            <th style="width:100px;">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sinhviens as $key => $sv)
        <tr>
            <td>
                {{++$i}}
            </td>
            <td>
                {{$sv->ma_sv}}
            </td>
            <td>
                {{$sv->ho}}
            </td>
            <td>
                {{$sv->ten}}
            </td>
            <td>
                {{$sv->ngaysinh}}
            </td>
            <td>
                {{$sv->diachi}}
            </td>
            <td>
                {{$sv->email}}
            </td>
            <td>
                {{$sv->lop->ten_lop}}
            </td>
            <td>{{$sv->updated_at}}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="/admin/sinhviens/edit/{{$sv->id_sinhvien}} ">
                    <i class="fas fa-edit"></i>
                </a>

                <a href="#" class="btn btn-danger btn-sm" onclick="removeRow(<?php echo $sv->id_sinhvien ?>, '/admin/sinhviens/destroy')">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
<hr>
<nav class="pagination">
    {{$sinhviens->links()}}
</nav>
@endsection