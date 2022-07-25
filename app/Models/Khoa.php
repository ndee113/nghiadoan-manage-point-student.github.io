<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khoa extends Model
{
    use HasFactory;
    protected $table = 'khoas';
    protected $primaryKey = 'id_khoa';
    protected $fillable = [
        'tenkhoa',
        'taikhoan',
        'matkhau',
    ];
}
