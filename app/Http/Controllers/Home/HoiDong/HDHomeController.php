<?php

namespace App\Http\Controllers\Home\HoiDong;

use Dompdf\Dompdf;
use App\Models\Lop;
use App\Models\Sinhvien;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\qldiemrenluyen\MainHoidongService;
use App\Http\Services\qldiemrenluyen\MainGiaovienService;

class HDHomeController extends Controller
{
    protected $MainHoiDongService;

    public function __construct(MainHoidongService $MainHoiDongService)
    {
        $this->MainHoiDongService = $MainHoiDongService;
    }

    public function index()
    {
        return view('qldiemrenluyen.hoidong.hd_home',[
            'title' => 'Hội đồng quản lí điểm rèn luyện ',
        ]);
    }
    public function filter_gv(Request $request){
       
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
       
        $danhsach = $this->MainHoiDongService->get_diem_distinct_join($filters);
        // dd($danhsach);
        // return dd($danhsach);
        return view('qldiemrenluyen.hoidong.hd_filter',[
            'title'=>'Danh sách điểm rèn luyện sinh viên',
            'lops' => $this->MainHoiDongService->getLop(),
            'hockys'=>$this->MainHoiDongService->getHocky(),
            'danhsach'=>$danhsach,
            'sinhvien'=>$this->MainHoiDongService->getSV(),
            'i'=>"0",

            // 'diems' => $this->MainGiaovienService->getDiem(),
        ]);
    }
    public function list_diem_lop(Request $request){
        // $id_sv = $request->id;
        // $hocky = $request->hocky;
        // return dd($hocky);
        $diem = $this->MainHoiDongService->list_diem_lop($request);
        $ds_sv =$this->MainHoiDongService->get_sv_id($request);
        $diem_tc_1 = $this->MainHoiDongService->get_diem_gv_tieuchi1($request);
        $diem_tc_2 = $this->MainHoiDongService->get_diem_gv_tieuchi2($request);
        $diem_tc_3 = $this->MainHoiDongService->get_diem_gv_tieuchi3($request);
        $diem_tc_4 = $this->MainHoiDongService->get_diem_gv_tieuchi4($request);
        $diem_tc_5 = $this->MainHoiDongService->get_diem_gv_tieuchi5($request);
        $tong_diem_tc = $diem_tc_1 + $diem_tc_2 + $diem_tc_3 + $diem_tc_4 + $diem_tc_5;

        // return dd($diem);
        return view('qldiemrenluyen.hoidong.hd_view_diem',[
            'title' => '',
            'tieuchis' => $this->MainHoiDongService->getTieuChi(),
            'noidungs' => $this->MainHoiDongService->getNDRL(),
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
        $hocky = $this->MainHoiDongService->getHocky_id($request);
        $diem = $this->MainHoiDongService->list_diem_lop($request);
        $ds_sv =$this->MainHoiDongService->get_sv_id($request);
        $diem_tc_1 = $this->MainHoiDongService->get_diem_sv_tieuchi1($request);
        $diem_tc_2 = $this->MainHoiDongService->get_diem_sv_tieuchi2($request);
        $diem_tc_3 = $this->MainHoiDongService->get_diem_sv_tieuchi3($request);
        $diem_tc_4 = $this->MainHoiDongService->get_diem_sv_tieuchi4($request);
        $diem_tc_5 = $this->MainHoiDongService->get_diem_sv_tieuchi5($request);
        $tong_diem_tc = $diem_tc_1 + $diem_tc_2 + $diem_tc_3 + $diem_tc_4 + $diem_tc_5;



        $diem_gv_tc_1 = $this->MainHoiDongService->get_diem_gv_tieuchi1($request);
        $diem_gv_tc_2 = $this->MainHoiDongService->get_diem_gv_tieuchi2($request);
        $diem_gv_tc_3 = $this->MainHoiDongService->get_diem_gv_tieuchi3($request);
        $diem_gv_tc_4 = $this->MainHoiDongService->get_diem_gv_tieuchi4($request);
        $diem_gv_tc_5 = $this->MainHoiDongService->get_diem_gv_tieuchi5($request);
        $tong_diem_tc_gv = $diem_gv_tc_1 + $diem_gv_tc_2 + $diem_gv_tc_3 + $diem_gv_tc_4 + $diem_gv_tc_5;
        return view('qldiemrenluyen.hoidong.hd_edit_diem_gv',[
            'title' => '',
            'tieuchis' => $this->MainHoiDongService->getTieuChi(),
            'noidungs' => $this->MainHoiDongService->getNDRL(),
            'sinhviens' => $ds_sv,
            'diem_tc_1' => $diem_tc_1,
            'diem_tc_2' => $diem_tc_2,
            'diem_tc_3' => $diem_tc_3,
            'diem_tc_4' => $diem_tc_4,
            'diem_tc_5' => $diem_tc_5,

            'diem_gv_tc_1' => $diem_gv_tc_1,
            'diem_gv_tc_2' => $diem_gv_tc_2,
            'diem_gv_tc_3' => $diem_gv_tc_3,
            'diem_gv_tc_4' => $diem_gv_tc_4,
            'diem_gv_tc_5' => $diem_gv_tc_5,
            'tong_diem_tc_gv' =>$tong_diem_tc_gv,
            'hocky' => $hocky,
            'diems' => $diem,
        ]);
    }

    public function view_diem_lop(Request $request)
    {
        $hocky = $this->MainHoiDongService->getHocky_id($request);
        $diem = $this->MainHoiDongService->list_diem_lop($request);
        $ds_sv =$this->MainHoiDongService->get_sv_id($request);
        $diem_tc_1 = $this->MainHoiDongService->get_diem_sv_tieuchi1($request);
        $diem_tc_2 = $this->MainHoiDongService->get_diem_sv_tieuchi2($request);
        $diem_tc_3 = $this->MainHoiDongService->get_diem_sv_tieuchi3($request);
        $diem_tc_4 = $this->MainHoiDongService->get_diem_sv_tieuchi4($request);
        $diem_tc_5 = $this->MainHoiDongService->get_diem_sv_tieuchi5($request);
        $tong_diem_tc = $diem_tc_1 + $diem_tc_2 + $diem_tc_3 + $diem_tc_4 + $diem_tc_5;

        $diem_gv_tc_1 = $this->MainHoiDongService->get_diem_gv_tieuchi1($request);
        $diem_gv_tc_2 = $this->MainHoiDongService->get_diem_gv_tieuchi2($request);
        $diem_gv_tc_3 = $this->MainHoiDongService->get_diem_gv_tieuchi3($request);
        $diem_gv_tc_4 = $this->MainHoiDongService->get_diem_gv_tieuchi4($request);
        $diem_gv_tc_5 = $this->MainHoiDongService->get_diem_gv_tieuchi5($request);

        $tong_diem_tc_gv = $diem_gv_tc_1 + $diem_gv_tc_2 + $diem_gv_tc_3 + $diem_gv_tc_4 + $diem_gv_tc_5;

        $diem_hd_tc_1 = $this->MainHoiDongService->get_diem_gv_tieuchi1($request);
        $diem_hd_tc_2 = $this->MainHoiDongService->get_diem_gv_tieuchi2($request);
        $diem_hd_tc_3 = $this->MainHoiDongService->get_diem_gv_tieuchi3($request);
        $diem_hd_tc_4 = $this->MainHoiDongService->get_diem_gv_tieuchi4($request);
        $diem_hd_tc_5 = $this->MainHoiDongService->get_diem_gv_tieuchi5($request);

        $tong_diem_tc_hd = $diem_gv_tc_1 + $diem_gv_tc_2 + $diem_gv_tc_3 + $diem_gv_tc_4 + $diem_gv_tc_5;

        // return dd($diem_tong_gv);
        return view('qldiemrenluyen.hoidong.hd_view_diem',[
            'title' => '',
            'tieuchis' => $this->MainHoiDongService->getTieuChi(),
            'noidungs' => $this->MainHoiDongService->getNDRL(),
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

            'diem_hd_tc_1' => $diem_hd_tc_1,
            'diem_hd_tc_2' => $diem_hd_tc_2,
            'diem_hd_tc_3' => $diem_hd_tc_3,
            'diem_hd_tc_4' => $diem_hd_tc_4,
            'diem_hd_tc_5' => $diem_hd_tc_5,
            'tong_diem_tc_hd' => $tong_diem_tc_hd,
            'hocky' => $hocky,
            'diems' => $diem,   
        ]);
    }
    public function store_diem_lop($request){
        $result = $this->MainHoiDongService->update_diem_hd($request);
        $lop = $request->id_lop[0];
        $idhk = $request->id_hocky[0];
        // dd($lop);
        if($result){
            return redirect('hoidong/bang-top-hop-gv?id_lop='.$lop.'&id_hocky='.$idhk); 
        }
        return redirect()->back();
    }

    public function in_diem_theo_lop(){
        // $pdf = PDF::loadHTML('<h1>test</h1>');
        // return $pdf->stream();
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->setDefaultFont('Courier');
        $dompdf->setOptions($options);  
        
        $dompdf->loadHtml(view('qldiemrenluyen.hoidong.hd_print_pdf_dslop'));

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('demo.pdf',['Attachment' => false]);

    }
    // public function print_diem_convert(Request $request){
    //     $hocky = $this->MainHoiDongService->getHocky_id($request);
    //     $diem = $this->MainHoiDongService->list_diem_lop($request);
    //     $ds_sv =$this->MainHoiDongService->get_sv_id($request);
    //     $diem_tc_1 = $this->MainHoiDongService->get_diem_sv_tieuchi1($request);
    //     $diem_tc_2 = $this->MainHoiDongService->get_diem_sv_tieuchi2($request);
    //     $diem_tc_3 = $this->MainHoiDongService->get_diem_sv_tieuchi3($request);
    //     $diem_tc_4 = $this->MainHoiDongService->get_diem_sv_tieuchi4($request);
    //     $diem_tc_5 = $this->MainHoiDongService->get_diem_sv_tieuchi5($request);
    //     $tong_diem_tc = $diem_tc_1 + $diem_tc_2 + $diem_tc_3 + $diem_tc_4 + $diem_tc_5;

    //     $diem_gv_tc_1 = $this->MainHoiDongService->get_diem_gv_tieuchi1($request);
    //     $diem_gv_tc_2 = $this->MainHoiDongService->get_diem_gv_tieuchi2($request);
    //     $diem_gv_tc_3 = $this->MainHoiDongService->get_diem_gv_tieuchi3($request);
    //     $diem_gv_tc_4 = $this->MainHoiDongService->get_diem_gv_tieuchi4($request);
    //     $diem_gv_tc_5 = $this->MainHoiDongService->get_diem_gv_tieuchi5($request);

    //     $tong_diem_tc_gv = $diem_gv_tc_1 + $diem_gv_tc_2 + $diem_gv_tc_3 + $diem_gv_tc_4 + $diem_gv_tc_5;

    //     $diem_hd_tc_1 = $this->MainHoiDongService->get_diem_gv_tieuchi1($request);
    //     $diem_hd_tc_2 = $this->MainHoiDongService->get_diem_gv_tieuchi2($request);
    //     $diem_hd_tc_3 = $this->MainHoiDongService->get_diem_gv_tieuchi3($request);
    //     $diem_hd_tc_4 = $this->MainHoiDongService->get_diem_gv_tieuchi4($request);
    //     $diem_hd_tc_5 = $this->MainHoiDongService->get_diem_gv_tieuchi5($request);

    //     $tong_diem_tc_hd = $diem_gv_tc_1 + $diem_gv_tc_2 + $diem_gv_tc_3 + $diem_gv_tc_4 + $diem_gv_tc_5;
        
    // }

}
