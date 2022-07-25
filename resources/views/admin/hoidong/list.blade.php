
@extends('admin.main')

@section('content')
<a class="btn btn-primary" href="{{ route('hoidongs.create')}}">Thêm Mới</a>
<table class="table">
        <thead>
            <tr>
                <th style="width: 50px;">STT</th>
                <th>Họ</th>
                <th>Tên</th>
                <th>Mã HĐ</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Khoa</th>
                <th style="width:100px;">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hoidongs as $key => $hd)
                 <tr>
                     <td>{{++$i}}</td>
                     <td>
                         {{$hd->ho_hd}}
                     </td>
                     <td>
                         {{$hd->ten_hd}}
                     </td>
                     <td>
                         {{$hd->ma_hd}}
                     </td>
                     <td>
                         {{$hd->email}}
                     </td>
                     <td>
                         {{$hd->so_dt}}
                     </td>
                     <td>
                         {{$hd->khoa->tenkhoa}}
                     </td>
                     <td>{{$hd->updated_at}}</td>
                     <td>
                         <a class="btn btn-primary btn-sm" href="/admin/hoidongs/edit/{{$hd->id_hd}} " >
                                <i class="fas fa-edit"></i>
                        </a>

                        <a href="#" class="btn btn-danger btn-sm" 
                                onclick="removeRow(<?php echo $hd->id_hd ?>, '/admin/hoidongs/destroy')">
                                <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                      
                 </tr>
            @endforeach
        </tbody>
    </table>
<hr>
<nav class="pagination">
    {{$hoidongs->links()}}
</nav>
@endsection