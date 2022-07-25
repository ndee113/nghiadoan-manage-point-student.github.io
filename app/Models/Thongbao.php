<?php

namespace App\Models;

use App\Models\Hocky;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Thongbao extends Model
{
    use HasFactory;
    protected $table = 'thongbaos';
    protected $primaryKey = 'id_thongbao';
    protected $fillable = [
        'id_hocky',
        'ngay_sv',
        'ngay_ktsv',
        'ngay_gv',
        'ngay_ktgv',
        'ngay_hd',
        'ngay_kthd',
    ];
    public function hocky()
    {
        return $this->hasOne(Hocky::class, 'id_hocky', 'id_hocky');
    }
}
