<?php

namespace App\Http\Services;

use App\Models\Khoa;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class KhoaService 
{
    // public function getParent()
    // {
    //     return Menu::where('parent_id', 0)->get();
    // }
    public function getAll()
    {
        return Khoa::orderbyDesc('id_khoa')->paginate(20);
    }

   public function create($request){
        try{
             Khoa::create([
                'tenkhoa' => (string) $request->input('tenkhoa'),
                'taikhoan' => (string) $request->input('taikhoan'),
                'matkhau' => bcrypt($request->input('matkhau')),
            ]);

            Session::flash('success', 'Tạo Khoa Thành Công');
        } catch (\Exception $err){
            Session::flash('error', 'Tạo Khoa Thất Bại');

            return false;
        }

        return true;
   }
   public function update($request, $khoa) : bool
   {

       $khoa->tenkhoa = (string) $request->input('tenkhoa');
       $khoa->matkhau = (string) $request->input('matkhau');
       $khoa->save();

       Session::flash('success', 'Cập nhật Khoa Thành Công');
       return true;
   }
   public function destroy($request)
   {
       $id = (int) $request->input('id');
       $khoa = Khoa::where('id_khoa', $id)->first();

       if ($khoa){
           return $khoa->delete();
       }

       return false; 
   }
}
