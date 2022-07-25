<?php

namespace App\Http\Services\Menu;

use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class MenuService 
{
    public function getParent()
    {
        return Menu::where('parent_id', 0)->get();
    }
    public function getAll()
    {
        return Menu::orderbyDesc('id')->paginate(20);
    }
   public function create($request){
        try{
             Menu::create([
                'name' => (string) $request->input('name'),
                'parent_id' => (int) $request->input('parent_id'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
                'active' => (string) $request->input('active'),
            ]);

            Session::flash('success', 'Tạo Danh Mục Thành Công');
        } catch (\Exception $err){
            Session::flash('error', 'Tạo Danh Mục Thất Bại');

            return false;
        }

        return true;
   }
   public function update($request, $menu) : bool
   {
       if($request->input('parent_id') != $menu->id){
           $menu->parent_id = (int) $request->input('parent_id');
       }

       $menu->name = (string) $request->input('name');
       $menu->description = (string) $request->input('description');
       $menu->content = (string) $request->input('content');
       $menu->active = (string) $request->input('active');
       $menu->save();

       Session::flash('success', 'Cập nhật Danh Mục Thành Công');
       return true;
   }
   public function destroy($request)
   {
       $id = (int) $request->input('id');
       $menu = Menu::where('id', $id)->first();

       if ($menu){
           return Menu::where('id', $id)->orWhere('parent_id', $id)->delete();
       }

       return false; 
   }
}
