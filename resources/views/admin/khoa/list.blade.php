
@extends('admin.main')

@section('content')
<a class="btn btn-primary" href="{{ route('khoas.create')}}">Thêm Mới</a>
<table class="table">
        <thead>
            <tr>
                <th style="width: 50px;">STT</th>
                <th>Tên Khoa</th>
                <th>Update</th>
                <th style="width:100px;">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($khoas as $key => $khoa)
                 <tr>
                     <td>
                         {{++$i}}
                     </td>
                     <td>
                         {{$khoa->tenkhoa}}
                     </td>
                     <td>{{$khoa->updated_at}}</td>
                     <td>
                         <a class="btn btn-primary btn-sm" href="/admin/khoas/edit/{{$khoa->id_khoa}} " >
                                <i class="fas fa-edit"></i>
                        </a>

                        <a href="#" class="btn btn-danger btn-sm" 
                                onclick="removeRow(<?php echo $khoa->id_khoa ?>, '/admin/khoas/destroy')">
                                <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                      
                 </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
<nav class="pagination">
    {{$khoas->links()}}
</nav>
@endsection