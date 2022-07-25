<?php

namespace App\Models;

use App\Models\Khoa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Giaovien extends Authenticatable
{
    use HasFactory;
    protected $table = 'giaoviens';
    protected $primaryKey = 'id_gv';
    protected $hidden = ['password'];
    protected $fillable = [
        'ten_gv',
        'ho_gv',
        'email',
        'so_dt',
        'password',
        'id_khoa',
        'ma_gv'
    ];

    public function khoa()
    {
        return $this->hasOne(Khoa::class, 'id_khoa', 'id_khoa');
    }

}

