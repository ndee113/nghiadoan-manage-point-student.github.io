<?php

namespace App\Http\Controllers\Home\GiaoVien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\qldiemrenluyen\MainGiaovienService;
use App\Models\Lop;
use App\Models\Sinhvien;

class GVHomeController extends Controller
{
    protected $MainGiaovienService;

    public function __construct(MainGiaovienService $MainGiaovienService)
    {
        $this->MainGiaovienService = $MainGiaovienService;
    }

    public function index()
    {
        return view('qldiemrenluyen.giaovien.gv_home',[
            'title' => 'Giáo viên quản lí điểm rèn luyện ',
        ]);
    }
    public function filter_sv(Request $request){
       
        $filters = [];
        if(!empty($request->id_lop)){
            $id_lop = $request->id_lop;
            $filters [] = ['lops.id_lop', '=' , $id_lop];
        }
        if(!empty($request->id_hocky)){
            $id_hocky = $request->id_hocky;
            $filters [] = ['hockys.id_hocky', '=' , $id_hocky];
        }
        // dd($filters);
       
        $danhsach = $this->MainGiaovienService->get_diem_distinct_join($filters);
        // dd($danhsach);
        // return dd($danhsach);
        return view('qldiemrenluyen.giaovien.gv_filter',[
            'title'=>'Danh sách điểm rèn luyện sinh viên',
            'lops' => $this->MainGiaovienService->getLop(),
            'hockys'=>$this->MainGiaovienService->getHocky(),
            'danhsach'=>$danhsach,
            'sinhvien'=>$this->MainGiaovienService->getSV(),
            'i'=>"0",

            // 'diems' => $this->MainGiaovienService->getDiem(),
        ]);
    }
    public function list_diem_lop(Request $request){
        // $id_sv = $request->id;
        // $hocky = $request->hocky;
        // return dd($hocky);
        $diem = $this->MainGiaovienService->list_diem_lop($request);
        $ds_sv =$this->MainGiaovienService->get_sv_id($request);
        $diem_tc_1 = $this->MainGiaovienService->get_diem_sv_tieuchi1($request);
        $diem_tc_2 = $this->MainGiaovienService->get_diem_sv_tieuchi2($request);
        $diem_tc_3 = $this->MainGiaovienService->get_diem_sv_tieuchi3($request);
        $diem_tc_4 = $this->MainGiaovienService->get_diem_sv_tieuchi4($request);
        $diem_tc_5 = $this->MainGiaovienService->get_diem_sv_tieuchi5($request);
        $tong_diem_tc = $diem_tc_1 + $diem_tc_2 + $diem_tc_3 + $diem_tc_4 + $diem_tc_5;

        // return dd($diem);
        return view('qldiemrenluyen.giaovien.gv_view_diem',[
            'title' => '',
            'tieuchis' => $this->MainGiaovienService->getTieuChi(),
            'noidungs' => $this->MainGiaovienService->getNDRL(),
            'sinhviens' => $ds_sv,
            'diem_tc_1' => $diem_tc_1,
            'diem_tc_2' => $diem_tc_2,
            'diem_tc_3' => $diem_tc_3,
            'diem_tc_4' => $diem_tc_4,
            'diem_tc_5' => $diem_tc_5,
            'tong_diem_tc' => $tong_diem_tc,
            'diems' => $diem,
        ]);
    }
    public function update_diem_lop(Request $request)
    {
        $hocky = $this->MainGiaovienService->getHocky_id($request);
        $diem = $this->MainGiaovienService->list_diem_lop($request);
        $ds_sv =$this->MainGiaovienService->get_sv_id($request);
        $diem_tc_1 = $this->MainGiaovienService->get_diem_sv_tieuchi1($request);
        $diem_tc_2 = $this->MainGiaovienService->get_diem_sv_tieuchi2($request);
        $diem_tc_3 = $this->MainGiaovienService->get_diem_sv_tieuchi3($request);
        $diem_tc_4 = $this->MainGiaovienService->get_diem_sv_tieuchi4($request);
        $diem_tc_5 = $this->MainGiaovienService->get_diem_sv_tieuchi5($request);
        $tong_diem_tc = $diem_tc_1 + $diem_tc_2 + $diem_tc_3 + $diem_tc_4 + $diem_tc_5;

        return view('qldiemrenluyen.giaovien.gv_edit_diem_sv',[
            'title' => '',
            'tieuchis' => $this->MainGiaovienService->getTieuChi(),
            'noidungs' => $this->MainGiaovienService->getNDRL(),
            'sinhviens' => $ds_sv,
            'diem_tc_1' => $diem_tc_1,
            'diem_tc_2' => $diem_tc_2,
            'diem_tc_3' => $diem_tc_3,
            'diem_tc_4' => $diem_tc_4,
            'diem_tc_5' => $diem_tc_5,
            'tong_diem_tc' => $tong_diem_tc,
            'hocky' => $hocky,
            'diems' => $diem,
        ]);
    }

    public function view_diem_lop(Request $request)
    {
        $hocky = $this->MainGiaovienService->getHocky_id($request);
        $diem = $this->MainGiaovienService->list_diem_lop($request);
        $ds_sv =$this->MainGiaovienService->get_sv_id($request);
        $diem_tc_1 = $this->MainGiaovienService->get_diem_sv_tieuchi1($request);
        $diem_tc_2 = $this->MainGiaovienService->get_diem_sv_tieuchi2($request);
        $diem_tc_3 = $this->MainGiaovienService->get_diem_sv_tieuchi3($request);
        $diem_tc_4 = $this->MainGiaovienService->get_diem_sv_tieuchi4($request);
        $diem_tc_5 = $this->MainGiaovienService->get_diem_sv_tieuchi5($request);
        $tong_diem_tc = $diem_tc_1 + $diem_tc_2 + $diem_tc_3 + $diem_tc_4 + $diem_tc_5;


        $diem_gv_tc_1 = $this->MainGiaovienService->get_diem_gv_tieuchi1($request);
        $diem_gv_tc_2 = $this->MainGiaovienService->get_diem_gv_tieuchi2($request);
        $diem_gv_tc_3 = $this->MainGiaovienService->get_diem_gv_tieuchi3($request);
        $diem_gv_tc_4 = $this->MainGiaovienService->get_diem_gv_tieuchi4($request);
        $diem_gv_tc_5 = $this->MainGiaovienService->get_diem_gv_tieuchi5($request);

        $tong_diem_tc_gv = $diem_gv_tc_1 + $diem_gv_tc_2 + $diem_gv_tc_3 + $diem_gv_tc_4 + $diem_gv_tc_5;

        // return dd($diem_tong_gv);
        return view('qldiemrenluyen.giaovien.gv_view_diem',[
            'title' => '',
            'tieuchis' => $this->MainGiaovienService->getTieuChi(),
            'noidungs' => $this->MainGiaovienService->getNDRL(),
            'sinhviens' => $ds_sv,
            'diem_tc_1' => $diem_tc_1,
            'diem_tc_2' => $diem_tc_2,
            'diem_tc_3' => $diem_tc_3,
            'diem_tc_4' => $diem_tc_4,
            'diem_tc_5' => $diem_tc_5,
            'tong_diem_tc' => $tong_diem_tc,
            
            'diem_gv_tc_1' => $diem_gv_tc_1,
            'diem_gv_tc_2' => $diem_gv_tc_2,
            'diem_gv_tc_3' => $diem_gv_tc_3,
            'diem_gv_tc_4' => $diem_gv_tc_4,
            'diem_gv_tc_5' => $diem_gv_tc_5,
            'tong_diem_tc_gv' => $tong_diem_tc_gv,
            'hocky' => $hocky,
            'diems' => $diem,   
        ]);
    }
    public function store_diem_lop(Request $request){
        $result = $this->MainGiaovienService->update_diem_gv($request);
        $lop = $request->id_lop[0];
        $idhk = $request->id_hocky[0];
        // dd($lop);
        if($result){
            return redirect('teacher/bang-top-hop-sv?id_lop='.$lop.'&id_hocky='.$idhk); 
        }
        return redirect()->back();
    }

}
