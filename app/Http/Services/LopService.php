<?php

namespace App\Http\Services;

use App\Models\Giaovien;
use App\Models\Khoa;
use App\Models\KhoaHoc;
use App\Models\Lop;
use Brick\Math\BigInteger;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class LopService 
{
    public function getAll()
    {
        return Lop::orderbyDesc('id_lop')->paginate(20);
    }
    public function getMaKhoa()
    {
        return Khoa::orderbyDesc('id_khoa')->get();
    }
    public function getMaKhoaHoc()
    {
        return KhoaHoc::orderbyDesc('id_khoa_hoc')->get();
    }
    public function getMaGV()
    {
        return Giaovien::orderbyDesc('id_gv')->paginate(20);
    }
    public function get()
    {
        return Lop::with('khoa')->orderbyDesc('id_lop')->paginate(20);
    }
    public function getGV()
    {
        return Lop::with('giaovien')->orderbyDesc('id_lop')->paginate(20);
    }
    public function getKH()
    {
        return Lop::with('khoahoc')->orderbyDesc('id_lop')->paginate(20);
    }


   public function create($request){
        try{
            Lop::create([
                'ten_lop' => (string) $request->input('ten_lop'),
                'id_khoa' => (int) $request->input('id_khoa'),
                'id_khoa_hoc' => (int) $request->input('id_khoa_hoc'),
                'id_gv' => (int) $request->input('id_gv'),
                
            ]);

            Session::flash('success', 'Tạo Lớp Thành Công');
        } catch (\Exception $err){
            Session::flash('error', 'Tạo Lớp Thất Bại');

            return false;
        }

        return true;
   }
   public function update($request, $lop) : bool
   {

       $lop->ten_lop = (string) $request->input('ten_lop');
       $lop->id_khoa = (int) $request->input('id_khoa');
       $lop->id_khoa_hoc = (int) $request->input('id_khoa_hoc');
       $lop->id_gv = (int) $request->input('id_gv');
       $lop->save();

       Session::flash('success', 'Cập nhật Lớp Thành Công');
       return true;
   }
   public function destroy($request)
   {
       $id = (int) $request->input('id');
       $lop = Lop::where('id_lop', $id)->first();

       if ($lop){
           return $lop->delete();
       }

       return false; 
   }

   public function getGVbyKhoaAjax($request){
    return Giaovien::where('id_khoa', $request->input('id_khoa'))->get();
   }
}
