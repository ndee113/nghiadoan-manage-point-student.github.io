<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noidung extends Model
{
    use HasFactory;
    protected $table = 'noidungs';
    protected $primaryKey = 'id_nd';
    protected $fillable = [
        'id_tc',
        'noidung',
        'diem_nd',
    ];
    public function tieuchi()
    {
        return $this->hasMany(Tieuchi::class, 'id_tc', 'id_tc');
    }
}
