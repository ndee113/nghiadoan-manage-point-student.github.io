<?php

namespace App\Models;

use App\Models\Lop;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Sinhvien extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    protected $table = 'sinhviens';
    protected $primaryKey = 'id_sinhvien';
    protected $fillable = [
        'ho',
        'ten',
        'ngaysinh',
        'diachi',
        'password',
        'id_lop',
        'email',
        'ma_sv'
    ];
    protected $hidden = ['password'];
    public function lop()
    {
        return $this->hasOne(Lop::class, 'id_lop', 'id_lop');
    }
}
