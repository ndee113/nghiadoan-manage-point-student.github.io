<?php

namespace App\Models;

use App\Models\Khoa;
use App\Models\KhoaHoc;
use App\Models\Giaovien;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lop extends Model
{
    use HasFactory;
    protected $table = 'lops';
    protected $primaryKey = 'id_lop';
    protected $fillable = [
        'ten_lop',
        'id_khoa',
        'id_khoa_hoc',
        'id_gv',
    ];

    public function khoa()
    {
        return $this->hasOne(Khoa::class, 'id_khoa', 'id_khoa');
    }
    public function khoahoc()
    {
        return $this->hasOne(KhoaHoc::class, 'id_khoa_hoc', 'id_khoa_hoc');
    }
    public function giaovien()
    {
        return $this->hasOne(Giaovien::class, 'id_gv', 'id_gv');
    }
}
