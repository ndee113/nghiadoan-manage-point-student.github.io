<?php

namespace App\Models;

use App\Models\Hocky;
use App\Models\Noidung;
use App\Models\Sinhvien;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Diem extends Model
{
    use HasFactory;
    protected $table = 'diems';
    protected $primaryKey = 'id_diem';
    protected $fillable = [
        'id_sinhvien',
        'id_hocky',
        'id_nd',
        'diem_sv',
        'diem_gv',
        'diem_hd',
    ];
    public function sinhvien(){
        return $this->hasMany(Sinhvien::class, 'id_sinhvien', 'id_sinhvien');
    }
    public function hocky(){
        return $this->hasMany(Hocky::class, 'id_hocky', 'id_hocky');
    }
    public function noidung(){
        return $this->hasMany(Noidung::class, 'id_nd', 'id_nd');
    }
}
