<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhoaHoc extends Model
{
    use HasFactory;
    protected $table = 'khoa_hocs';
    protected $primaryKey = 'id_khoa_hoc';
    protected $fillable = [
        'nam_bd',
        'nam_kt',
    ];
}
