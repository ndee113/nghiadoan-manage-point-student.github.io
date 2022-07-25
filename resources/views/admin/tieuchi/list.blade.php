
@extends('admin.main')

@section('content')
<a class="btn btn-primary" href="{{ route('tieuchis.create')}}">Thêm Mới</a>
<table class="table">
        <thead>
            <tr>
                <th style="width: 50px;">ID TC</th>
                <th>Tên tiêu chí</th>
                <th>Điểm tối đa</th>
                <th>Update</th>
                <th style="width:100px;">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tieuchis as $key => $tc)
                 <tr>
                     <td>
                         {{$tc->id_tc}}
                     </td>
                     <td>
                         {{$tc->noidung_tc}}
                     </td>
                     <td>
                         {{$tc->diem_td}}
                     </td>
                     <td>{{$tc->updated_at}}</td>
                     <td>
                         <a class="btn btn-primary btn-sm" href="/admin/tieuchis/edit/{{$tc->id_tc}} " >
                                <i class="fas fa-edit"></i>
                        </a>

                        <a href="#" class="btn btn-danger btn-sm" 
                                onclick="removeRow(<?php echo $tc->id_tc ?>, '/admin/tieuchis/destroy')">
                                <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                      
                 </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
<nav class="pagination">
    {{$tieuchis->links()}}
</nav>
@endsection