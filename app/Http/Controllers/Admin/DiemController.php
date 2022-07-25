<?php

namespace App\Http\Controllers\Admin;

use App\Models\Diem;
use Illuminate\Http\Request;
use App\Http\Services\DiemService;
use App\Http\Controllers\Controller;
use App\Http\Services\qldiemrenluyen\MainGiaovienService;

class DiemController extends Controller
{
    protected $MainGiaovienService;

    public function __construct(MainGiaovienService $MainGiaovienService)
    {
        $this->MainGiaovienService = $MainGiaovienService;
    }
  
    public function index(Request $request){
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
        return view('admin.diem.list',[
            'title'=>'Danh sách điểm rèn luyện sinh viên',
            'lops' => $this->MainGiaovienService->getLop(),
            'hockys'=>$this->MainGiaovienService->getHocky(),
            'danhsach'=>$danhsach,
            'sinhvien'=>$this->MainGiaovienService->getSV(),
            'i'=>"0",

            // 'diems' => $this->MainGiaovienService->getDiem(),
        ]);
    }
}
