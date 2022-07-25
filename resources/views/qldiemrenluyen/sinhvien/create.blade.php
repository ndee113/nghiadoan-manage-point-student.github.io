@extends('qldiemrenluyen.main')


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
    @foreach($thongbaos as $key => $tb)
    <P>Học kỳ xét: {{$tb->hocky->hk_nk}}</P>
    @endforeach


</div>
<div class="info" style="display: flex;justify-content:space-around; line-height:10px">
    <div class="line-1">
        <p>Họ và tên: {{Auth::guard('sinhvien_users')->user()->ho}} {{Auth::guard('sinhvien_users')->user()->ten}}</p>
        <p>Ngày sinh: {{Auth::guard('sinhvien_users')->user()->ngaysinh}}</p>
    </div>
    <div class="line-1">
        <p>MSSV: {{Auth::guard('sinhvien_users')->user()->ma_sv}}</p>
        <p>Lớp: {{Auth::guard('sinhvien_users')->user()->lop->ten_lop}}</p>
    </div>
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
                    <form action="" method="post">
                        
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
                            <td>
                              <input class="form-control" name="diem_sv[]" type="text" value="0">
                              <input type="text" name="id_nd[]" value="{{ $nd->id_nd }}" hidden>
                              <input name="id_sinhvien[]" value="{{Auth::guard('sinhvien_users')->user()->id_sinhvien}}" type="text" hidden>
                            <input name="id_hocky[]" value="{{$tb->id_hocky}}" type="text" hidden>
            
                          </td>
                          <td>
                              <input class="form-control" name="" readonly="true" type="text">
                          </td>
                          <td>
                              <input class="form-control" name="" readonly="true" type="text">
                          </td>
                        </tr>
                            @endif
                        @endforeach
                        <tr>
                            <td class="tieuchi" style="font-weight: bolder ;" > Tổng điểm(không vượt quá {{$tc->diem_td}}đ): </td>
                            <td>
                              <input class="form-control" name="" readonly="true" type="text">
                          </td>
                          <td>
                              <input class="form-control"name="" readonly="true" type="text">
                          </td>
                          <td>
                              <input class="form-control"name="" readonly="true" type="text">
                          </td>
                        </tr>
                    @endforeach
                    <tr>
                            <td class="tieuchi" style="font-weight: bolder ;" > Tổng điểm (1)+(2)+(3)+(4)+(5) <= (100 điểm) </td>
                            <td>
                              <input class="form-control" name="" readonly="true" type="text">
                          </td>
                          <td>
                              <input class="form-control"name="" readonly="true" type="text">
                          </td>
                          <td>
                              <input class="form-control"name="" readonly="true" type="text">
                          </td>
                        </tr>
                    
                    </tbody>
                </table>
                <div class="button-center" style="display:flex;justify-content:center"><button type="submit" class="btn btn-primary">Lưu Điểm</button></div>
                @csrf
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('qldiemrenluyen.footer')

@endsection