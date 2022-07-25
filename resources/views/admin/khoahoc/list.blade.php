
@extends('admin.main')

@section('content')
<a class="btn btn-primary" href="{{ route('khoahocs.create')}}">Thêm Mới</a>
<table class="table">
        <thead>
            <tr>
                <th style="width: 50px;">STT</th>
                <th>Năm bắt đầu</th>
                <th>Năm kết thúc</th>
                <th>Update</th>
                <th style="width:100px;">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($khoahocs as $key => $khoahoc)
                 <tr>
                     <td>
                         {{++$i}}
                     </td>
                     <td>
                         {{$khoahoc->nam_bd}}
                     </td>
                     <td>
                         {{$khoahoc->nam_kt}}
                     </td>
                     <td>{{$khoahoc->updated_at}}</td>
                     <td>
                         <a class="btn btn-primary btn-sm" href="/admin/khoahoc/edit/{{$khoahoc->id_khoa_hoc}} " >
                                <i class="fas fa-edit"></i>
                        </a>

                        <a href="#" class="btn btn-danger btn-sm" 
                                onclick="removeRow(<?php echo $khoahoc->id_khoa_hoc ?>, '/admin/khoahocs/destroy')">
                                <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                      
                 </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
<nav class="pagination">
    {{$khoahocs->links()}}
</nav>
@endsection