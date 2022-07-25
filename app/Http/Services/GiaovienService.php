<?php

namespace App\Http\Services;

use App\Models\Giaovien;
use App\Models\Khoa;
use App\Models\KhoaHoc;
use App\Models\Lop;
use Brick\Math\BigInteger;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class GiaovienService 
{
    public function getMaKhoa()
    {
        return Khoa::orderbyDesc('id_khoa')->get();
    }
    // public function getMaKhoaHoc()
    // {
    //     return KhoaHoc::orderbyDesc('id_khoa_hoc')->get();
    // }
    public function get()
    {
        return Giaovien::with('khoa')->paginate(20);
    }

   public function create($request){
        try{
            Giaovien::create([
                'ten_gv' => (string) $request->input('ten_gv'),
                'ho_gv' => (string) $request->input('ho_gv'),
                'so_dt' => (string) $request->input('so_dt'),
                'password' => bcrypt('123456'),
                'id_khoa' => (int) $request->input('id_khoa'),
                'ma_gv' =>"",
                'email'=>""
                
            ]);
            $this->create_ma_gv();
            $this->create_email_gv();
            Session::flash('success', 'Tạo Giáo viên Thành Công');
        } catch (\Exception $err){
            Session::flash('error', 'Tạo Giáo viên Thất Bại');

            return false;
        }

        return true;
   }
   public function create_ma_gv(){
    $giaovien =  Giaovien::orderbyDesc('id_gv')->first();
    // $nam = $sinhvien->lop->khoahoc->nam_bd;
    // $nam1 = substr($nam,2,3);
    $id = str_pad($giaovien->id_gv,6,'0',STR_PAD_LEFT);
    $giaovien->ma_gv = ('GV'.$id);
    $giaovien->save();
   }
   public function create_email_gv(){
    $giaovien =  Giaovien::orderbyDesc('id_gv')->first();
    $str = $giaovien->ten_gv;
    $ho = $giaovien->ho_gv;
    //loai bo dau tieng viet
            $unicode = array(
                'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
                'd'=>'đ',
                'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
                'i'=>'í|ì|ỉ|ĩ|ị',
                'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
                'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
                'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
                'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
                'D'=>'Đ',
                'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
                'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
                'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
                'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
                'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
            );
            
           foreach($unicode as $nonUnicode=>$uni){
                $str = preg_replace("/($uni)/i", $nonUnicode, $str);
                $ho = preg_replace("/($uni)/i", $nonUnicode, $ho);
           }
           $str1 =  str_replace(" ", "", $str);
           $str2 = Str::lower($str1);

            //xu li ho - bo khoang trang - lay chu cai dau
            $expr = '/(?<=\s|^)[a-z]/i';
            preg_match_all($expr, $ho, $matches);
            $ho1 = implode('', $matches[0]);
            $ho2 = strtolower($ho1);

           $giaovien->email = $ho2.$str2."@dnc.edu.vn";
           $giaovien->save();
   }
   public function update($request, $giaovien) : bool
   {

       $giaovien->ten_gv = (string) $request->input('ten_gv');
       $giaovien->email = (string) $request->input('email');
       $giaovien->so_dt = (string) $request->input('so_dt');
       $giaovien->password = bcrypt($request->input('password'));
       $giaovien->id_khoa = (int) $request->input('id_khoa');
       $giaovien->save();

       Session::flash('success', 'Cập nhật Lớp Thành Công');
       return true;
   }
   public function destroy($request)
   {
       $id = (int) $request->input('id');
       $giaovien = Giaovien::where('id_gv', $id)->first();

       if ($giaovien){
           return $giaovien->delete();
       }

       return false; 
   }
}
