<?php

namespace App\Models;

use App\Models\Khoa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HoiDong extends Authenticatable
{
    use HasFactory;
    protected $table = 'hoi_dongs';
    protected $primaryKey = 'id_hd';
    protected $hidden = ['password'];
    protected $fillable = [
        'ten_hd',
        'ho_hd',
        'email',
        'so_dt',
        'password',
        'id_khoa',
        'ma_hd'
    ];

    public function khoa()
    {
        return $this->hasOne(Khoa::class, 'id_khoa', 'id_khoa');
    }

}

