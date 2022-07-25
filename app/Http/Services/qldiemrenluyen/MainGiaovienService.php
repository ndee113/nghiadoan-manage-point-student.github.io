<?php 

namespace App\Http\Services\qldiemrenluyen;

use App\Models\Diem;
use App\Models\Hocky;
use App\Models\KhoaHoc;
use App\Models\Lop;
use App\Models\Noidung;
use App\Models\Sinhvien;
use App\Models\Tieuchi;
use App\Models\Thongbao;
use Illuminate\Support\Facades\Session;

class MainGiaovienService
{
    public function getNDRL(){
        return Noidung::get();
    }
    public function getTieuChi(){
        return Tieuchi::get();
    }
    public function getHocky(){
        return Hocky::get();
    }
    public function getHocky_id($request){
        $id_hk = $request->hocky;
        return Hocky::get()->where('id_hocky',$id_hk);
    }
    public function getLop(){
        return Lop::with('giaovien')->orderbyDesc('id_lop')->get();
    }
    public function getSV(){
        return Sinhvien::get();
    }
    public function get_sv_id($request){
        $id_sv = $request->id;
        return Sinhvien::with('lop')->where('id_sinhvien',$id_sv)->get();

    }
    public function get_diem_distinct_join($filters = []){
        $diem = Diem::select('diems.id_sinhvien','diems.diem_tong_sv','diems.diem_tong_gv','sinhviens.ten as ten_sv','sinhviens.ho as ho_sv','sinhviens.ma_sv as ma_sv','lops.ten_lop as ten_lop','hockys.hk_nk as hocky','lops.id_lop as id_lop','hockys.id_hocky as id_hk')->distinct()
        ->join('sinhviens', 'diems.id_sinhvien', '=', 'sinhviens.id_sinhvien')
        ->join('lops', 'sinhviens.id_lop', '=', 'lops.id_lop')
        ->join('hockys', 'diems.id_hocky', '=', 'hockys.id_hocky');
        //du lieu
        // "id_sinhvien" => 28
        // "diem_tong_sv" => 29
        // "ten_sv" => "Nghĩa"
        // "ho_sv" => "Đoàn Minh"
        // "ten_lop" => "DH18TIN01"
        // "hocky" => "HK1(2021-2022)"
        // "id_lop" => 8
        // "id_hk" => 5
        if(!empty($filters))
        {
            $diem = $diem->where($filters);
        }
        $diem = $diem->paginate(10);
        return $diem;
        // return dd($diem);
    }

    public function list_diem_lop($request){
        $id_sinhvien = $request->id;
        $id_hocky = $request->hocky;
        return $diem_sv = Diem::get()->where('id_sinhvien',$id_sinhvien)->where('id_hocky',$id_hocky);
    }

    public function get_diem_sv_tieuchi1($request){
        $id_sinhvien = $request->id;
        $id_hocky = $request->hocky;
        $diemtc_1 = Diem::with('noidung')->where('id_sinhvien', $id_sinhvien)->where('id_hocky',$id_hocky)->whereRelation('noidung','id_tc',1)->sum('diem_sv');
        if($diemtc_1 >= 20){
            return $diemtc_1 = 20;
        }
        return $diemtc_1;
    }
    public function get_diem_sv_tieuchi2($request){
        $id_sinhvien = $request->id;
        $id_hocky = $request->hocky;
        $diemtc_1 = Diem::with('noidung')->where('id_sinhvien', $id_sinhvien)->where('id_hocky',$id_hocky)->whereRelation('noidung','id_tc',2)->sum('diem_sv');
        if($diemtc_1 >= 25){
            return $diemtc_1 =25;
        }
        return $diemtc_1;
    }
    public function get_diem_sv_tieuchi3($request){
        $id_sinhvien = $request->id;
        $id_hocky = $request->hocky;
        $diemtc_1 = Diem::with('noidung')->where('id_sinhvien', $id_sinhvien)->where('id_hocky',$id_hocky)->whereRelation('noidung','id_tc',3)->sum('diem_sv');
        if($diemtc_1 >= 20){
            return $diemtc_1 = 20;
        }
        return $diemtc_1;
    }
    public function get_diem_sv_tieuchi4($request){
        $id_sinhvien = $request->id;
        $id_hocky = $request->hocky;
        $diemtc_1 = Diem::with('noidung')->where('id_sinhvien', $id_sinhvien)->where('id_hocky',$id_hocky)->whereRelation('noidung','id_tc',4)->sum('diem_sv');
        if($diemtc_1 >= 20){
            return $diemtc_1 = 20;
        }
        return $diemtc_1;
    }
    public function get_diem_sv_tieuchi5($request){
        $id_sinhvien = $request->id;
        $id_hocky = $request->hocky;
        $diemtc_1 = Diem::with('noidung')->where('id_sinhvien', $id_sinhvien)->where('id_hocky',$id_hocky)->whereRelation('noidung','id_tc',5)->sum('diem_sv');
        if($diemtc_1 >= 10){
            return $diemtc_1 =10;
        }
        return $diemtc_1;
    }
    public function update_diem_gv($request)
    {
        $id_sinhvien = $request->id_sinhvien;
        $id_hocky = $request->id_hocky;
        $diem = $request->diem_gv;
        // $diem_tong = $request->diem_tong_tc;
        // dd($diem_tong);
        $diem_update = Diem::where('id_sinhvien', $id_sinhvien[0])->where('id_hocky', $id_hocky[0])->get();
     //    return dd($diem[0]);
        try{
         for($i = 0; $i < count($diem_update); $i++){
             $diem_update[$i]->diem_gv = $diem[$i];
             $diem_update[$i]->save();
         }
         $this->update_diem_tong_gv($request);
         Session::flash('success', 'Lưu điểm Thành Công');
         } catch (\Exception $err){
             Session::flash('error', 'Lưu điểm Thất Bại' . $err);
 
             return false;
         }
         return true;
    }
    public function view_diem_lop($request){
        $id_sinhvien = $request->id_sinhvien;
        $id_hocky = $request->id_hocky;
        $diem = $request->diem_gv;
        // $diem_tong = $request->diem_tong_tc;
        // dd($diem_tong);
        $diem_update = Diem::where('id_sinhvien', $id_sinhvien[0])->where('id_hocky', $id_hocky[0])->get();
     //    return dd($diem[0]);
        try{
         for($i = 0; $i < count($diem_update); $i++){
             $diem_update[$i]->diem_gv = $diem[$i];
             $diem_update[$i]->save();
         }
         $this->update_diem_tong_gv($request);
         Session::flash('success', 'Lưu điểm Thành Công');
         } catch (\Exception $err){
             Session::flash('error', 'Lưu điểm Thất Bại' . $err);
 
             return false;
         }
         return true;
    }
    public function get_diem_gv_tieuchi1($request){
        $id_sinhvien = $request->id;
        $id_hocky = $request->hocky;
        $diemtc_1 = Diem::with('noidung')->where('id_sinhvien', $id_sinhvien)->where('id_hocky',$id_hocky)->whereRelation('noidung','id_tc',1)->sum('diem_gv');
        if($diemtc_1 >= 20){
            return $diemtc_1 = 20;
        }
        return $diemtc_1;
    }
    public function get_diem_gv_tieuchi2($request){
        $id_sinhvien = $request->id;
        $id_hocky = $request->hocky;
        $diemtc_1 = Diem::with('noidung')->where('id_sinhvien', $id_sinhvien)->where('id_hocky',$id_hocky)->whereRelation('noidung','id_tc',2)->sum('diem_gv');
        if($diemtc_1 >= 25){
            return $diemtc_1 =25;
        }
        return $diemtc_1;
    }
    public function get_diem_gv_tieuchi3($request){
        $id_sinhvien = $request->id;
        $id_hocky = $request->hocky;
        $diemtc_1 = Diem::with('noidung')->where('id_sinhvien', $id_sinhvien)->where('id_hocky',$id_hocky)->whereRelation('noidung','id_tc',3)->sum('diem_gv');
        if($diemtc_1 >= 20){
            return $diemtc_1 = 20;
        }
        return $diemtc_1;
    }
    public function get_diem_gv_tieuchi4($request){
        $id_sinhvien = $request->id;
        $id_hocky = $request->hocky;
        $diemtc_1 = Diem::with('noidung')->where('id_sinhvien', $id_sinhvien)->where('id_hocky',$id_hocky)->whereRelation('noidung','id_tc',4)->sum('diem_gv');
        if($diemtc_1 >= 20){
            return $diemtc_1 = 20;
        }
        return $diemtc_1;
    }
    public function get_diem_gv_tieuchi5($request){
        $id_sinhvien = $request->id;
        $id_hocky = $request->hocky;
        $diemtc_1 = Diem::with('noidung')->where('id_sinhvien', $id_sinhvien)->where('id_hocky',$id_hocky)->whereRelation('noidung','id_tc',5)->sum('diem_gv');
        if($diemtc_1 >= 10){
            return $diemtc_1 =10;
        }
        return $diemtc_1;
    }
    public function update_diem_tong_gv($request){
        $id_sinhvien = $request->id;
        $id_hocky = $request->hocky;
        $diem_1 = $this->get_diem_gv_tieuchi1($request);
        $diem_2 = $this->get_diem_gv_tieuchi2($request);
        $diem_3 = $this->get_diem_gv_tieuchi3($request);
        $diem_4 = $this->get_diem_gv_tieuchi4($request);
        $diem_5 = $this->get_diem_gv_tieuchi5($request);
    
       $diem_tong_gv = $diem_1 + $diem_2 + $diem_3 + $diem_4 + $diem_5;
    
       $diem_update = Diem::where('id_sinhvien', $id_sinhvien)->where('id_hocky', $id_hocky)->get();
    
        $diem_tong_sv_arr = array();
            for($i = 0; $i < count($diem_update); $i++)
            {
            $diem_tong_sv_arr[$i] = "$diem_tong_gv";
            $diem_update[$i]->diem_tong_gv = $diem_tong_sv_arr[$i];
                $diem_update[$i]->save();
            }
        }
   
        
}