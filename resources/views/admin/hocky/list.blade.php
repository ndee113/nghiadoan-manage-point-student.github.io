
@extends('admin.main')

@section('content')
<a class="btn btn-primary" href="{{ route('hockys.create')}}">Thêm Mới</a>
<table class="table">
        <thead>
            <tr>
                <th style="width: 50px;">ID HK</th>
                <th>Học kỳ - Niên khóa</th>
                <th>Học kỳ xét</th>
                <th>Update</th>
                <th style="width:100px;">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hockys as $key => $hk)
                 <tr>
                     <td>
                         {{$hk->id_hocky}}
                     </td>
                     <td>
                         {{$hk->hk_nk}}
                     </td>
                     <td>
                         {{$hk->hk_xet}}
                     </td>
                     <td>{{$hk->updated_at}}</td>
                     <td>
                         <!-- <a class="btn btn-primary btn-sm" href="/admin/hockys/edit/{{$hk->id_hocky}} " >
                                <i class="fas fa-edit"></i>
                        </a> -->

                        <a href="#" class="btn btn-danger btn-sm" 
                                onclick="removeRow(<?php echo $hk->id_hocky ?>, '/admin/hockys/destroy')">
                                <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                      
                 </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
<nav class="pagination">
    {{$hockys->links()}}
</nav>
@endsection