
@extends('admin.main')

@section('content')
<a class="btn btn-primary" href="{{ route('thongbaos.create')}}">Thêm Mới</a>
<table class="table">
        <thead>
            <tr>
                <th style="width: 50px;">ID</th>
                <th>Học kỳ</th>
                <th>Thời gian chấm SV</th>
                <th>Thời gian duyệt GV</th>
                <th>Thời gian duyệt HD</th>
                <th>Update</th>
                <th style="width:100px;">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($thongbaos as $key => $tb)
                 <tr>
                     <td>
                         {{$tb->id_thongbao}}
                     </td>
                     <td>
                         {{$tb->hocky->hk_nk}}
                     </td>
                     <td>
                         {{$tb->ngay_sv}} - {{$tb->ngay_ktsv}}
                     </td>
                     <td>
                         {{$tb->ngay_gv}} - {{$tb->ngay_ktgv}}
                     </td>
                     <td>
                         {{$tb->ngay_hd}} - {{$tb->ngay_kthd}}
                     </td>
                     <td>{{$tb->updated_at}}</td>
                     <td>
                         <a class="btn btn-primary btn-sm" href="/admin/thongbaos/edit/{{$tb->id_thongbao}} " >
                                <i class="fas fa-edit"></i>
                        </a>

                        <a href="#" class="btn btn-danger btn-sm" 
                                onclick="removeRow(<?php echo $tb->id_thongbao ?>, '/admin/thongbaos/destroy')">
                                <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                      
                 </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
<nav class="pagination">
    {{$thongbaos->links()}}
</nav>
@endsection