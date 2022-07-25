
@extends('admin.main')

@section('content')
<a class="btn btn-primary" href="{{ route('noidungs.create')}}">Thêm Mới</a>
<table class="table">
        <thead>
            <tr>
                <th style="width: 50px;">ID ND</th>
                <th>Nội dung</th>
                <th>Mã tiêu chí</th>
                <th>Điểm</th>
                <th>Update</th>
                <th style="width:100px;">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($noidungs as $key => $nd)
                 <tr>
                     <td>
                         {{$nd->id_nd}}
                     </td>
                     <td>
                        {!!$nd->noidung!!}
                     </td>
                     <td>
                         {{$nd->id_tc}}
                     </td>
                     <td>
                         {{$nd->diem_nd}}
                     </td>
                     <td>{{$nd->updated_at}}</td>
                     <td>
                         <a class="btn btn-primary btn-sm" href="/admin/noidungs/edit/{{$nd->id_nd}} " >
                                <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-sm" 
                                onclick="removeRow(<?php echo $nd->id_nd ?>, '/admin/noidungs/destroy')">
                                <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                      
                 </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
<nav class="pagination">
    {{$noidungs->links()}}
</nav>
@endsection