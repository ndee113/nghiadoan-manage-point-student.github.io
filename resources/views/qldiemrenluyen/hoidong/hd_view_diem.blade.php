@extends('qldiemrenluyen.hoidong.hd_main')


@section('content')
<style>
    .inline {
        position: relative;
    }

    .inline h5:after,
    .inline p:after {
        content: "";
        float: left;
        background: black;
        transform: translateX(50%);
        width: 50%;
        height: 1.5px;
        border-radius: 3px;
    }
</style>
<div class="container" style="display: flex;justify-content:space-between">
    <div class="left">
        <div class="center-box" style="display: flex;justify-content:center">
            <h5>BỘ GIÁO DỤC VÀ ĐÀO TẠO</h5>
        </div>
        <span class="inline">
            <h5>TRƯỜNG ĐẠI HỌC NAM CẦN THƠ</h5>
        </span>
    </div>
    <div class="right">
        <h5>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</h5>
        <div class="center-box" style="display: flex;justify-content:center">
            <span class="inline">
                <p>Độc lập - Tự do - Hạnh phúc</p>
            </span>
        </div>
    </div>
</div>
<div class="title" style="display: flex;justify-content:center">
    <h5>BẢN TỰ ĐÁNH GIÁ KẾT QUẢ RÈN LUYỆN CỦA NGƯỜI HỌC ĐƯỢC ĐÀO TẠO TRÌNH ĐỘ ĐẠI HỌC HỆ CHÍNH QUY</h5>
</div>
<div class="year" style="display: flex;justify-content:center;">
@foreach($hocky as $key => $h)
    <P>Học kỳ xét: {{$h->hk_nk}}</P>
@endforeach
    
</div>
<div class="info" style="display: flex;justify-content:space-around; line-height:10px">
    @foreach($sinhviens as $key => $sv)
    
    <div class="line-1">
        <p>Họ và tên:{{$sv->ho}} {{$sv->ten}}</p>
        <p>Ngày sinh: {{$sv->ngaysinh}}</p>
    </div>
    <div class="line-1">
        <p>MSSV: {{$sv->ma_sv}} </p>
        <p>Lớp: {{$sv->lop->ten_lop}}</p>
    </div>
    @endforeach
</div>

<!-- <table class="table">
    <thead>
        <tr>
            <th>Nội dung cần đánh giá</th>
            <th style="width:80px">HSSV tự đánh giá</th>
            <th style="width:80px">GVCN đánh giá</th>
            <th style="width:80px">Hội đồng đánh giá</th>
        </tr>
    </thead>
</table> -->

<div class="card-body">
@include('qldiemrenluyen.alert')
    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12 col-md-6"></div>
            <div class="col-sm-12 col-md-6"></div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                    <form action="/teacher/store-diem-sv/{{$sv->id_sinhvien}}&{{$h->id_hocky}}" method="post">
                        
                    <thead>
                        <tr>
                            <th  class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" >Nội dung cần đánh giá</th>
                            <th style="width:100px" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >HSSV tự đánh giá</th>
                            <th style="width:100px" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >GVCN đánh giá</th>
                            <th style="width:100px" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Hội đồng đánh giá</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($tieuchis as $key => $tc)
                        <tr class="odd">
                        <td class="tieuchi" style="font-weight: bolder ;" >Tiêu chí {{$tc->id_tc}}: {{$tc->noidung_tc}}</td>
                        </tr>
                            @foreach($noidungs as $key => $nd)
                                @if($nd->id_tc == $tc -> id_tc)
                        <tr class="even">
                            <td class="content" tabindex="0">{!!$nd->noidung!!}</td>
                            <td class="table-success">
                                @foreach($diems as $key =>$d)
                                @if($nd->id_nd == $d->id_nd)
                              <p style="text-align: center;">{{$d->diem_sv}}</p>
                                 @endif
                              @endforeach
                              <input type="text" name="id_nd[]" value="{{ $nd->id_nd }}" hidden>
                              <input name="id_sinhvien[]" value="{{$sv->id_sinhvien}}" type="text" hidden>
                              <input type="text" value="{{$tong_diem_tc}}" name="tong_diem_sv[]" hidden>
                            <input name="id_hocky[]" value="{{$h->id_hocky}}" type="text" hidden>
                            <input name="id_lop[]" value="{{$sv->id_lop}}" type="text" hidden>
                            
                           
                          </td>
                          <td class="table-success">
                          @foreach($diems as $key =>$d)
                                @if($nd->id_nd == $d->id_nd)
                                <p style="text-align: center;">{{$d->diem_gv}}</p>
                                @endif
                            @endforeach
                          </td>
                          <td class="table-success">
                          @foreach($diems as $key =>$d)
                                @if($nd->id_nd == $d->id_nd)
                                <p style="text-align: center;">{{$d->diem_hd}}</p>
                                @endif
                            @endforeach
                          </td>
                        </tr>
                            @endif
                        @endforeach
                        <tr class="table-success"> 
                            <td class="tieuchi"  style="font-weight: bolder ;" > Tổng điểm(không vượt quá {{$tc->diem_td}}đ):  </td>

                            <td class="table-success">
                            @if($tc->id_tc == 1)
                            <p style="text-align:center ;font-weight:bolder;">{{$diem_tc_1}}</p>
                            @endif
                            @if($tc->id_tc == 2)
                            <p style="text-align:center;font-weight:bolder;">{{$diem_tc_2}}</p>
                            @endif
                            @if($tc->id_tc == 3)
                            <p style="text-align:center;font-weight:bolder;">{{$diem_tc_3}}</p>
                            @endif
                            @if($tc->id_tc == 4)
                            <p style="text-align:center;font-weight:bolder;">{{$diem_tc_4}}</p>
                            @endif
                            @if($tc->id_tc == 5)
                            <p style="text-align:center;font-weight:bolder;">{{$diem_tc_5}}</p>
                            @endif
            
                          </td>

                          <td>
                          @if($tc->id_tc == 1)
                            <p style="text-align:center;font-weight:bolder;">{{$diem_gv_tc_1}}</p>
                            @endif
                            @if($tc->id_tc == 2)
                            <p style="text-align:center;font-weight:bolder; ">{{$diem_gv_tc_2}}</p>
                            @endif
                            @if($tc->id_tc == 3)
                            <p style="text-align:center;font-weight:bolder;">{{$diem_gv_tc_3}}</p>
                            @endif
                            @if($tc->id_tc == 4)
                            <p style="text-align:center;font-weight:bolder;">{{$diem_gv_tc_4}}</p>
                            @endif
                            @if($tc->id_tc == 5)
                            <p style="text-align:center;font-weight:bolder;">{{$diem_gv_tc_5}}</p>
                            @endif
            
                          </td>

                          <td>
                          @if($tc->id_tc == 1)
                            <p style="text-align:center;font-weight:bolder;">{{$diem_hd_tc_1}}</p>
                            @endif
                            @if($tc->id_tc == 2)
                            <p style="text-align:center;font-weight:bolder; ">{{$diem_hd_tc_2}}</p>
                            @endif
                            @if($tc->id_tc == 3)
                            <p style="text-align:center;font-weight:bolder;">{{$diem_hd_tc_3}}</p>
                            @endif
                            @if($tc->id_tc == 4)
                            <p style="text-align:center;font-weight:bolder;">{{$diem_hd_tc_4}}</p>
                            @endif
                            @if($tc->id_tc == 5)
                            <p style="text-align:center;font-weight:bolder;">{{$diem_hd_tc_5}}</p>
                            @endif
            
                          </td>
                        </tr>
                    @endforeach
                    <tr class="table-success">
                            <td class="tieuchi" style="font-weight: bolder ;" > Tổng điểm (1)+(2)+(3)+(4)+(5) <= (100 điểm)  </td>
                            <td class="table-success">
                              <p style="text-align: center;font-weight:bolder;">{{$tong_diem_tc}}</p>
                          </td>
                          <td >
                          <p style="text-align: center;font-weight:bolder;">{{$tong_diem_tc_gv}}</p>
                          </td>
                          <td>
                          <p style="text-align: center;font-weight:bolder;">{{$tong_diem_tc_hd}}</p>
                          </td>
                    </tr>
                    <tr class="table-info">
                            <td class="tieuchi" style="font-weight: bolder ;" > Xếp loại rèn luyện: 
                            @if($tong_diem_tc_hd > 90 )
                            Xuất sắc
                            @endif

                            @if($tong_diem_tc_hd > 80 && $tong_diem_tc_hd < 90 )
                            Tốt
                            @endif

                            @if($tong_diem_tc_hd > 70 && $tong_diem_tc_hd < 80 )
                            Trung bình khá
                            @endif
                            
                            @if($tong_diem_tc_hd > 60 && $tong_diem_tc_hd < 70 )
                            Khá 
                            @endif

                            @if($tong_diem_tc_hd > 50 && $tong_diem_tc_hd < 60 )
                            Trung bình
                            @endif

                            @if($tong_diem_tc_hd > 30 && $tong_diem_tc_hd < 50 )
                            Yếu 
                            @endif
                            
                            @if($tong_diem_tc_hd < 30 )
                            Kém
                            @endif
                            </td>
                    </tr>
                    
                    </tbody>
                </table>
                <!-- <div class="button-center" style="display:flex;justify-content:center"><button type="submit" class="btn btn-primary">Duyệt Điểm</button></div> -->
                @csrf
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('qldiemrenluyen.footer')

@endsection