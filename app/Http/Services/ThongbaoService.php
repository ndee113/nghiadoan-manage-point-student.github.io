<?php 

namespace App\Http\Services;

use App\Models\Giaovien;
use App\Models\Hocky;
use App\Models\KhoaHoc;
use App\Models\Thongbao;
use Illuminate\Support\Facades\Session;

class ThongbaoService 
{
    
    public function get()
    {
        return Thongbao::with('hocky')->orderbyDesc('id_thongbao')->paginate(20);
    }
    public function getHK()
    {
        return Hocky::orderbyDesc('id_hocky')->paginate(20);
    }

   public function create($request){
        try{
            Thongbao::create([
                'id_hocky' => (int) $request->input('id_hocky'),
                'ngay_sv' => $request->input('ngay_sv'),
                'ngay_ktsv' => $request->input('ngay_ktsv'),
                'ngay_gv' => $request->input('ngay_gv'),
                'ngay_ktgv' => $request->input('ngay_ktgv'),
                'ngay_hd' => $request->input('ngay_hd'),
                'ngay_kthd' => $request->input('ngay_kthd'),
            ]);
            Session::flash('success', 'Tạo thông báo Thành Công');
        } catch (\Exception $err){
            Session::flash('error', 'Tạo thông báo Thất Bại');

            return false;
        }

        return true;
   }
   public function update($request, $thongbao) : bool
   {
       $thongbao->id_hocky = (int)$request->input('id_hocky');
       $thongbao->ngay_sv = $request->input('ngay_sv');
       $thongbao->ngay_ktsv = $request->input('ngay_ktsv');
       $thongbao->ngay_gv = $request->input('ngay_gv');
       $thongbao->ngay_ktgv = $request->input('ngay_ktgv');
       $thongbao->ngay_hd = $request->input('ngay_hd');
       $thongbao->ngay_kthd = $request->input('ngay_kthd');
      
       $thongbao->save();

       Session::flash('success', 'Cập nhật thông báo Thành Công');
       return true;
   }
   public function destroy($request)
   {
       $id = (int) $request->input('id');
       $thongbao = Thongbao::where('id_thongbao', $id)->first();

       if ($thongbao){
           return $thongbao->delete();
       }

       return false; 
   }
}