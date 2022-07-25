
@extends('admin.main')

@section('content')
<a class="btn btn-primary" href="{{ route('giaoviens.create')}}">Thêm Mới</a>
<table class="table">
        <thead>
            <tr>
                <th style="width: 50px;">STT</th>
                <th>Họ</th>
                <th>Tên</th>
                <th>Mã GV</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Khoa</th>
                <th style="width:100px;">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($giaoviens as $key => $gv)
                 <tr>
                     <td>{{++$i}}</td>
                     <td>
                         {{$gv->ho_gv}}
                     </td>
                     <td>
                         {{$gv->ten_gv}}
                     </td>
                     <td>
                         {{$gv->ma_gv}}
                     </td>
                     <td>
                         {{$gv->email}}
                     </td>
                     <td>
                         {{$gv->so_dt}}
                     </td>
                     <td>
                         {{$gv->khoa->tenkhoa}}
                     </td>
                     <td>{{$gv->updated_at}}</td>
                     <td>
                         <a class="btn btn-primary btn-sm" href="/admin/giaoviens/edit/{{$gv->id_gv}} " >
                                <i class="fas fa-edit"></i>
                        </a>

                        <a href="#" class="btn btn-danger btn-sm" 
                                onclick="removeRow(<?php echo $gv->id_gv ?>, '/admin/giaoviens/destroy')">
                                <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                      
                 </tr>
            @endforeach
        </tbody>
    </table>
<hr>
<nav class="pagination">
    {{$giaoviens->links()}}
</nav>
@endsection