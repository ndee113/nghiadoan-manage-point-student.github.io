<?php 

namespace App\Http\Services;

use App\Models\Giaovien;
use App\Models\Khoa;
use App\Models\Lop;
use App\Models\Sinhvien;

class MainService{
    public function getSV()
    {
        return Sinhvien::orderbyDesc('id_sinhvien')->get();
    }
    public function getGV()
    {
        return Giaovien::orderbyDesc('id_gv')->get();
    }
    public function getLop()
    {
        return Lop::orderbyDesc('id_lop')->get();
    }
    public function getKhoa()
    {
        return Khoa::orderbyDesc('id_khoa')->get();
    }
}