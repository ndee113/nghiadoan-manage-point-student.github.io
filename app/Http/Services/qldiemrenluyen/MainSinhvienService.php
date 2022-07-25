<?php 

namespace App\Http\Services\qldiemrenluyen;

use App\Models\Diem;
use App\Models\Hocky;
use App\Models\KhoaHoc;
use App\Models\Noidung;
use App\Models\Tieuchi;
use App\Models\Sinhvien;
use App\Models\Thongbao;
use Illuminate\Support\Facades\Session;

class MainSinhvienService
{
    public function getNDRL(){
        return Noidung::get();
    }
    public function getTieuChi(){
        return Tieuchi::get();
    }
    public function getHocky_TB(){
        return Thongbao::with('hocky')->orderbyDesc('id_thongbao')->paginate(1);
    }
    public function getDiem(){
        return Diem::get();
        
    }
    public function getHocky(){
        return Hocky::get();
    }
    public function getSV(){
        return Sinhvien::orderbyDesc('id_sinhvien')->get();
    }

    

    public function create($request){
        $id_sinhvien =  $request->input('id_sinhvien');
        $id_hocky = $request->input('id_hocky');
        $id_nd = $request->input('id_nd');
        $diem_sv = $request->input('diem_sv');
        
        try{
            for($i = 0; $i < count($id_sinhvien); $i++){
                Diem::create([
                    'id_sinhvien' =>(int) $id_sinhvien[$i],
                    'id_hocky' => (int)$id_hocky[$i],
                    'id_nd' => (int)$id_nd[$i],
                    'diem_sv' =>(int) $diem_sv[$i]
                ]);
            }
            $this->update_diem_tong_sv($request);
            Session::flash('success', 'Lưu điểm Thành Công');
        } catch (\Exception $err){
            Session::flash('error', 'Lưu điểm Thất Bại');

            return false;
        }
        return true;
   }
   public function update($request){
       $id_sinhvien = $request->id_sinhvien;
       $id_hocky = $request->id_hocky;
       $diem = $request->diem_sv;
       $diem_update = Diem::where('id_sinhvien', $id_sinhvien[0])->where('id_hocky', $id_hocky[0])->get();
    //    return dd($diem[0]);
       try{
        for ($i = 0; $i < count($diem_update); $i++){
            $diem_update[$i]->diem_sv = $diem[$i];
            $diem_update[$i]->save();
        }
            $this->update_diem_tong_sv($request);
       
        Session::flash('success', 'Lưu điểm Thành Công');
        } catch (\Exception $err){
            Session::flash('error', 'Lưu điểm Thất Bại' . $err);

            return false;
        }
        return true;
   }

   public function update_diem_tong_sv($request){
    $id_sinhvien = $request->id_sinhvien;
    $id_hocky = $request->id_hocky;
    $diem_1 = $this->get_diem_by_idsv_hk_tieu_chi_1($id_sinhvien);
    $diem_2 = $this->get_diem_by_idsv_hk_tieu_chi_2($id_sinhvien);
    $diem_3 = $this->get_diem_by_idsv_hk_tieu_chi_3($id_sinhvien);
    $diem_4 = $this->get_diem_by_idsv_hk_tieu_chi_4($id_sinhvien);
    $diem_5 = $this->get_diem_by_idsv_hk_tieu_chi_5($id_sinhvien);

   $diem_tong_sv = $diem_1 + $diem_2 + $diem_3 + $diem_4 + $diem_5;

   $diem_update = Diem::where('id_sinhvien', $id_sinhvien[0])->where('id_hocky', $id_hocky[0])->get();

    $diem_tong_sv_arr = array();
        for($i = 0; $i < count($diem_update); $i++)
        {
        $diem_tong_sv_arr[$i] = "$diem_tong_sv";
        $diem_update[$i]->diem_tong_sv = $diem_tong_sv_arr[$i];
            $diem_update[$i]->save();
        }

    }

   public function get_diem_by_idsv_hk($id_sinhvien){
        $id_hk_new_first = Diem::select('id_hocky')->distinct()->orderbyDesc('id_hocky')->first();
        $diem = Diem::where('id_sinhvien', $id_sinhvien)->where('id_hocky', $id_hk_new_first->id_hocky)->get();
        // $diemtc_1 = Diem::with('noidung')->where('id_sinhvien', $id_sinhvien)->where('id_hocky', $id_hk_new_first->id_hocky)->whereRelation('noidung','id_tc',1)->sum('diem_sv');
        return $diem;
    }
    public function get_diem_by_idsv_hk_tieu_chi_1($id_sinhvien){
        $id_hk_new_first = Diem::select('id_hocky')->distinct()->orderbyDesc('id_hocky')->first();
        $diemtc_1 = Diem::with('noidung')->where('id_sinhvien', $id_sinhvien)->where('id_hocky', $id_hk_new_first->id_hocky)->whereRelation('noidung','id_tc',1)->sum('diem_sv');
        if($diemtc_1 >= 20){
            return $diemtc_1 = 20;
        }
        return $diemtc_1;
    }
    public function get_diem_by_idsv_hk_tieu_chi_2($id_sinhvien){
        $id_hk_new_first = Diem::select('id_hocky')->distinct()->orderbyDesc('id_hocky')->first();
        $diemtc_2 = Diem::with('noidung')->where('id_sinhvien', $id_sinhvien)->where('id_hocky', $id_hk_new_first->id_hocky)->whereRelation('noidung','id_tc',2)->sum('diem_sv');
        if($diemtc_2 >= 25){
            return $diemtc_2 =25;
        }
        return $diemtc_2;
    }
    public function get_diem_by_idsv_hk_tieu_chi_3($id_sinhvien){
        $id_hk_new_first = Diem::select('id_hocky')->distinct()->orderbyDesc('id_hocky')->first();
        $diemtc_3 = Diem::with('noidung')->where('id_sinhvien', $id_sinhvien)->where('id_hocky', $id_hk_new_first->id_hocky)->whereRelation('noidung','id_tc',3)->sum('diem_sv');
        if($diemtc_3 >= 20){
            return $diemtc_3 =20;
        }
        return $diemtc_3;
    }
    public function get_diem_by_idsv_hk_tieu_chi_4($id_sinhvien){
        $id_hk_new_first = Diem::select('id_hocky')->distinct()->orderbyDesc('id_hocky')->first();
        $diemtc_4 = Diem::with('noidung')->where('id_sinhvien', $id_sinhvien)->where('id_hocky', $id_hk_new_first->id_hocky)->whereRelation('noidung','id_tc',4)->sum('diem_sv');
        if($diemtc_4 >= 20){
            return $diemtc_4 =20;
        }
        return $diemtc_4;
    }
    public function get_diem_by_idsv_hk_tieu_chi_5($id_sinhvien){
        $id_hk_new_first = Diem::select('id_hocky')->distinct()->orderbyDesc('id_hocky')->first();
        $diemtc_5 = Diem::with('noidung')->where('id_sinhvien', $id_sinhvien)->where('id_hocky', $id_hk_new_first->id_hocky)->whereRelation('noidung','id_tc',5)->sum('diem_sv');
        if($diemtc_5 >= 10){
            return $diemtc_5 = 10;
        }
        return $diemtc_5;
    }
    public function get_diem_distinct_sinhvien($request){
        $id_sinhvien = $request->id;
        $diem = Diem::select('diems.id_sinhvien','diems.diem_tong_sv','diems.diem_tong_gv','sinhviens.ten as ten_sv','sinhviens.ho as ho_sv','sinhviens.ma_sv as ma_sv','lops.ten_lop as ten_lop','hockys.hk_nk as hocky','lops.id_lop as id_lop','hockys.id_hocky as id_hk')->distinct()
        ->join('sinhviens', 'diems.id_sinhvien', '=', 'sinhviens.id_sinhvien')
        ->join('lops', 'sinhviens.id_lop', '=', 'lops.id_lop')
        ->join('hockys', 'diems.id_hocky', '=', 'hockys.id_hocky')
        ->where('diems.id_sinhvien','=',$id_sinhvien)
        ->paginate(10);

        return $diem;

        //du lieu
        // "id_sinhvien" => 28
        // "diem_tong_sv" => 29
        // "ten_sv" => "Nghĩa"
        // "ho_sv" => "Đoàn Minh"
        // "ten_lop" => "DH18TIN01"
        // "hocky" => "HK1(2021-2022)"
        // "id_lop" => 8
        // "id_hk" => 5
        // if(!empty($filters))
        // {
        //     $diem = $diem->where($filters);
        // }
        // $diem = $diem->paginate(10);
        // return $diem;
        // return dd($diem);
    }


}