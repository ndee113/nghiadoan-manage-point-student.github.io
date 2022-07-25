<?php

namespace App\Http\Services;

// use App\Models\Khoa;
// use App\Models\KhoaHoc;
use App\Models\Lop;
use App\Models\Sinhvien;
use Brick\Math\BigInteger;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class SinhvienService 
{
    // public function getParent()
    // {
    //     return Menu::where('parent_id', 0)->get();
    // }
    // public function getAll()
    // {
    //     return Lop::orderbyDesc('id_lop')->paginate(20);
    // }
    // public function getMaKhoa()
    // {
    //     return Khoa::orderbyDesc('id_khoa')->get();
    // }
    public function getMaLop()
    {
        return Lop::orderbyDesc('id_lop')->get();
    }
    public function get()
    {
        return Sinhvien::with('lop')->paginate(20);
    }

   public function create($request){
        try{
            Sinhvien::create([
                'ho' => (string) $request->input('ho'),
                'ten' => (string) $request->input('ten'),
                'ngaysinh' =>(string)$request->input('ngaysinh'),
                'diachi' => (string) $request->input('diachi'),
                'id_lop' => (int) $request->input('id_lop'),
                'password' => bcrypt('123456'),
                'email' => "",
                'ma_sv' =>""
            ]);
            $this->create_ma_sv();
            $this->create_email();
            Session::flash('success', 'Tạo Sinh Viên Thành Công');
        } catch (\Exception $err){
            Session::flash('error', 'Tạo Sinh Viên Thất Bại' . $err);

            return false;
        }

        return true;
   }
   public function create_ma_sv(){
    $sinhvien =  Sinhvien::with('lop.khoahoc')->
    orderbyDesc('id_sinhvien')->first();
    $nam = $sinhvien->lop->khoahoc->nam_bd;
    $nam1 = substr($nam,2,3);
    $id = str_pad($sinhvien->id_sinhvien,6,'0',STR_PAD_LEFT);
    $sinhvien->ma_sv = ($nam1.$id);
    $sinhvien->save();
   }
   public function create_email(){
    $sinhvien =  Sinhvien::orderbyDesc('id_sinhvien')->first();
    $str = $sinhvien->ten . $sinhvien->ma_sv;

    
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
           }
           $str1 =  str_replace(" ", "", $str);
           $str2 = Str::lower($str1);
           $sinhvien->email = $str2."@student.dnc.edu.vn";
           $sinhvien->save();
   }
   public function update($request, $sinhvien) : bool
   {

       $sinhvien->ho = (string) $request->input('ho');
       $sinhvien->ten = (string) $request->input('ten');
       $sinhvien->ngaysinh = $request->input('ngaysinh');
       $sinhvien->diachi = (string) $request->input('diachi');
       $sinhvien->password = bcrypt($request->input('password'));
       $sinhvien->id_lop = (int) $request->input('id_lop');
       $sinhvien->save();

       Session::flash('success', 'Cập nhật Lớp Thành Công');
       return true;
   }
   public function destroy($request)
   {
       $id = (int) $request->input('id');
       $sinhvien = Sinhvien::where('id_sinhvien', $id)->first();

       if ($sinhvien){
           return $sinhvien->delete();
       }

       return false; 
   }
}
