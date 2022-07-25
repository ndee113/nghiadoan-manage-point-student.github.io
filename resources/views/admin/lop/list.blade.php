
@extends('admin.main')

@section('content')
<a class="btn btn-primary" href="{{ route('lops.create')}}">Thêm Mới</a>
<table class="table">
        <thead>
            <tr>
                <th style="width: 50px;">STT</th>
                <th>Tên Lớp</th>
                <th>Tên Khoa</th>
                <th>Khóa học</th>
                <th>CVHT</th>
                <th>Update</th>
                <th style="width:100px;">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lops as $key => $lop)
                 <tr>
                     <td>
                         {{++$i}}
                     </td>
                     <td>
                         {{$lop->ten_lop}}
                     </td>
                     <td>
                         {{$lop->khoa->tenkhoa}}
                     </td>
                     <td>
                         {{$lop->khoahoc->nam_bd}} - {{$lop->khoahoc->nam_kt}}
                     </td>

                     <td>
                     {{$lop->giaovien->ho_gv}} {{$lop->giaovien->ten_gv}}
                     </td>
                     <td>{{$lop->updated_at}}</td>

                     <td>
                         <a class="btn btn-primary btn-sm" href="/admin/lops/edit/{{$lop->id_lop}} " >
                                <i class="fas fa-edit"></i>
                        </a>

                        <a href="#" class="btn btn-danger btn-sm" 
                                onclick="removeRow(<?php echo $lop->id_lop ?>, '/admin/lops/destroy')">
                                <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                      
                 </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
<nav class="pagination">
    {{$lops->links()}}
</nav>
@endsection