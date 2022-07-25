<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tieuchi extends Model
{
    use HasFactory;
    protected $table = 'tieuchis';
    protected $primaryKey = 'id_tc';
    protected $fillable = [
        'noidung_tc',
        'diem_td',

    ];
}
