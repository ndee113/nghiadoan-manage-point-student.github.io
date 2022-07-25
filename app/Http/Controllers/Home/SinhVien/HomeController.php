<?php

namespace App\Http\Controllers\Home\SinhVien;

use App\Models\Diem;
use App\Models\Noidung;
use App\Models\Thongbao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\qldiemrenluyen\MainSinhvienService;

class HomeController extends Controller
{
    protected $MainSinhvienService;

    public function __construct(MainSinhvienService $MainSinhvienService)
    {
        $this->MainSinhvienService = $MainSinhvienService;
    }

    public function index()
    {
        return view('qldiemrenluyen.home',[
            'title' => 'Quản lí điểm rèn luyện',
        ]);
    }

    public function sv_chamdiem()
    {
        return view('qldiemrenluyen.sinhvien.create',[
            'title' => 'Sinh viên điểm rèn luyện',
            'tieuchis' => $this->MainSinhvienService->getTieuChi(),
            'noidungs' => $this->MainSinhvienService->getNDRL(),
            'thongbaos' =>$this->MainSinhvienService->getHocky_TB()
        ]);
    }
    public function store_diem(Request $request){
        // dd($request->all());
        $this->validate($request,[
            "diem_sv.*"=>'numeric|min:-15|max:15',
        ],[
            // 'diem_sv[].required' => 'Bạn chưa nhập điểm !',
            'diem_sv.*.numeric' => 'Điểm nhập vào phải là số !',
            'diem_sv.*.max' => 'Điểm nhập vào không được lớn hơn 15!',
            'diem_sv.*.max' => 'Điểm nhập vào không được nhỏ hơn -15!',
            

        ]);
        $id_sv = $request->id_sinhvien[0];
        $result = $this->MainSinhvienService->create($request);
        if($result){
                return redirect('sinhvien/xem-diem-ren-luyen?id='.$id_sv); 
            
        }
        return redirect()->back();
    }
    // public function update_diem_tc(){
    //     $id_sinhvien = Auth::guard('sinhvien_users')->id();
    //     $diem_tc = $this->MainSinhvienService->get_diem_tc_by_idnd($id_sinhvien);
    // }
    public function list_diem(Request $request){
        // $filters = [];


        // if(!empty($request->id_hocky)){
        //     $id_hocky = $request->id_hocky;
        //     $filters [] = ['hockys.id_hocky', '=' , $id_hocky];
        // }
       
        $danhsach = $this->MainSinhvienService->get_diem_distinct_sinhvien($request);
        return view('qldiemrenluyen.sinhvien.list',[
            'title'=>'Xem lại điểm rèn luyện sinh viên',
            // 'lops' => $this->MainGiaovienService->getLop(),
            'hockys'=>$this->MainSinhvienService->getHocky(),
            'danhsach'=>$danhsach,
            // 'sinhvien'=>$this->MainSinhvienService->getSV(),
            'i'=>"0",

        ]);
    }
    public function edit_diem(Diem $diem){
        //  return $this->MainSinhvienService->diem_tc() ;

        $id_sinhvien = Auth::guard('sinhvien_users')->id();
        $diem = $this->MainSinhvienService->get_diem_by_idsv_hk($id_sinhvien);
        $diem_tc_1 = $this->MainSinhvienService->get_diem_by_idsv_hk_tieu_chi_1($id_sinhvien);
        $diem_tc_2 = $this->MainSinhvienService->get_diem_by_idsv_hk_tieu_chi_2($id_sinhvien);
        $diem_tc_3 = $this->MainSinhvienService->get_diem_by_idsv_hk_tieu_chi_3($id_sinhvien);
        $diem_tc_4 = $this->MainSinhvienService->get_diem_by_idsv_hk_tieu_chi_4($id_sinhvien);
        $diem_tc_5 = $this->MainSinhvienService->get_diem_by_idsv_hk_tieu_chi_5($id_sinhvien);
        $tong_diem_tc = $diem_tc_1 + $diem_tc_2 + $diem_tc_3 + $diem_tc_4 + $diem_tc_5;
        // return dd($tong_diem_tc);

        return view('qldiemrenluyen.sinhvien.edit',[
            'title' => 'Sinh viên điểm rèn luyện',
            'tieuchis' => $this->MainSinhvienService->getTieuChi(),
            'noidungs' => $this->MainSinhvienService->getNDRL(),
            'thongbaos' =>$this->MainSinhvienService->getHocky_TB(),
            'diems' => $diem,
            'diem_tc_1'=>$diem_tc_1,
            'diem_tc_2'=>$diem_tc_2,
            'diem_tc_3'=>$diem_tc_3,
            'diem_tc_4'=>$diem_tc_4,
            'diem_tc_5'=>$diem_tc_5,
            'tong_diem_tc'=>$tong_diem_tc,
            
        ]);
    }
    public function update_diem(Request $request){
        $id_sv = $request->id_sinhvien[0];

        $result = $this->MainSinhvienService->update($request);
        // return dd($result);
        if($result){
            return redirect('sinhvien/xem-diem-ren-luyen?id='.$id_sv);
        }
        return redirect()->back();
    }
    
    public function profile(){
        return view('qldiemrenluyen.sinhvien.profile',[
            'title' => 'Thông tin sinh viên',
        ]);
    }


    
  
}
