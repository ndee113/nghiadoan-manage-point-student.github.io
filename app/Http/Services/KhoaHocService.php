<?php 

namespace App\Http\Services;

use App\Models\KhoaHoc;
use Illuminate\Support\Facades\Session;

class KhoaHocService 
{
    // public function getParent()
    // {
    //     return Menu::where('parent_id', 0)->get();
    // }
    public function getAll()
    {
        return KhoaHoc::orderbyDesc('id_khoa_hoc')->paginate(20);
    }

   public function create($request){
        try{
            KhoaHoc::create([
                'nam_bd' => (string) $request->input('nam_bd'),
                'nam_kt' => (string) $request->input('nam_kt'),
            ]);
            Session::flash('success', 'Tạo Khoa Thành Công');
        } catch (\Exception $err){
            Session::flash('error', 'Tạo Khoa Thất Bại');

            return false;
        }

        return true;
   }
//    public function update($request, $khoa) : bool
//    {

//        $khoa->tenkhoa = (string) $request->input('tenkhoa');
//        $khoa->matkhau = (string) $request->input('matkhau');
//        $khoa->save();

//        Session::flash('success', 'Cập nhật Khoa Thành Công');
//        return true;
//    }
   public function destroy($request)
   {
       $id = (int) $request->input('id');
       $khoahoc = KhoaHoc::where('id_khoa_hoc', $id)->first();

       if ($khoahoc){
           return $khoahoc->delete();
       }

       return false; 
   }
}