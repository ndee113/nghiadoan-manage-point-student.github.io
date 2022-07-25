<?php

namespace App\Http\Services;


use App\Models\Lop;
use App\Models\Noidung;
use App\Models\Sinhvien;
use Brick\Math\BigInteger;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use App\Models\Tieuchi;

class NoidungService 
{
    public function getAll()
    {
        return Noidung::orderbyDesc('id_nd')->paginate(10);
    }
    public function getTC()
    {
        return Tieuchi::orderbyDesc('id_tc')->paginate(20);
    }
    
   public function create($request){
        try{
            Noidung::create([
                'noidung' =>(string) $request->input('noidung'),
                'id_tc' => (int) $request->input('id_tc'),    
                'diem_nd' => (int) $request->input('diem_nd'),    
            ]);
            Session::flash('success', 'Tạo nội dung Thành Công');
        } catch (\Exception $err){
            Session::flash('error', 'Tạo nội dung Thất Bại');

            return false;
        }

        return true;
   }
   public function update($request, $noidung) : bool
   {

       $noidung->noidung = (string) $request->input('noidung');
       $noidung->id_tc = (int) $request->input('id_tc');
       $noidung->diem_nd = (int) $request->input('diem_nd');
       $noidung->save();

       Session::flash('success', 'Cập nhật nội dung Thành Công');
       return true;
   }
   public function destroy($request)
   {
       $id = (int) $request->input('id');
       $noidung = Noidung::where('id_nd', $id)->first();

       if ($noidung){
           return $noidung->delete();
       }

       return false; 
   }
}
