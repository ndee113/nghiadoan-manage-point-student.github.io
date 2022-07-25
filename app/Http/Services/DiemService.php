<?php

namespace App\Http\Services;

use App\Models\Diem;
use App\Models\Giaovien;
use App\Models\Khoa;
use App\Models\KhoaHoc;
use App\Models\Lop;
use Brick\Math\BigInteger;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class DiemService 
{

    public function get()
    {
        return Diem::with('sinhvien','hocky','noidung')->orderbyDesc('id_gv')->paginate(20);
    }
    public function get_distinc_masv(){
        $ma_sv = Diem::distinct('id_sinhvien')->get('id_sinhvien');
    }
//    public function create($request){
//         try{
//             Diem::create([
//                 'diem_sv' => (string) $request->input('diem_sv'),
//             ]);

//             Session::flash('success', 'Lưu điểm Thành Công');
//         } catch (\Exception $err){
//             Session::flash('error', 'Lưu điểm Thất Bại');

//             return false;
//         }

//         return true;
//    }
//    public function update($request, $giaovien) : bool
//    {

//        $giaovien->ten_gv = (string) $request->input('ten_gv');
//        $giaovien->email = (string) $request->input('email');
//        $giaovien->so_dt = (string) $request->input('so_dt');
//        $giaovien->password = bcrypt($request->input('password'));
//        $giaovien->id_khoa = (int) $request->input('id_khoa');
//        $giaovien->save();

//        Session::flash('success', 'Cập nhật Lớp Thành Công');
//        return true;
//    }
//    public function destroy($request)
//    {
//        $id = (int) $request->input('id');
//        $giaovien = Giaovien::where('id_gv', $id)->first();

//        if ($giaovien){
//            return $giaovien->delete();
//        }

//        return false; 
//    }
}
