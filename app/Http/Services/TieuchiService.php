<?php

namespace App\Http\Services;

// use App\Models\Khoa;
// use App\Models\KhoaHoc;
use App\Models\Lop;
use App\Models\Sinhvien;
use Brick\Math\BigInteger;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use App\Models\Tieuchi;

class TieuchiService 
{
    public function getAll()
    {
        return Tieuchi::orderbyDesc('id_tc')->paginate(20);
    }
    
   public function create($request){
        try{
            Tieuchi::create([
                'noidung_tc' => (string) $request->input('noidung_tc'),
                'diem_td' => (int) $request->input('diem_td'),    
            ]);

            Session::flash('success', 'Tạo TC Thành Công');
        } catch (\Exception $err){
            Session::flash('error', 'Tạo TC Thất Bại');

            return false;
        }

        return true;
   }
   public function update($request, $tieuchi) : bool
   {

       $tieuchi->noidung_tc = (string) $request->input('noidung_tc');
       $tieuchi->diem_td = (int) $request->input('diem_td');
       $tieuchi->save();

       Session::flash('success', 'Cập nhật tiêu chí Thành Công');
       return true;
   }
   public function destroy($request)
   {
       $id = (int) $request->input('id');
       $tieuchi = Tieuchi::where('id_tc', $id)->first();

       if ($tieuchi){
           return $tieuchi->delete();
       }

       return false; 
   }
}
