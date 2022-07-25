<?php 

namespace App\Http\Services;

use App\Models\Hocky;
use App\Models\KhoaHoc;
use Illuminate\Support\Facades\Session;

class HockyService 
{
    // public function getParent()
    // {
    //     return Menu::where('parent_id', 0)->get();
    // }
    public function getAll()
    {
        return Hocky::orderbyDesc('id_hocky')->paginate(20);
    }

   public function create($request){
        try{
            Hocky::create([
                'hk_nk' => (string) $request->input('hk_nk'),
                'hk_xet' => (string) $request->input('hk_xet'),
            ]);
            Session::flash('success', 'Tạo Học kỳ Thành Công');
        } catch (\Exception $err){
            Session::flash('error', 'Tạo Học kỳ Thất Bại');

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
       $hocky = Hocky::where('id_hocky', $id)->first();

       if ($hocky){
           return $hocky->delete();
       }

       return false; 
   }
}