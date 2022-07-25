<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hocky extends Model
{
    use HasFactory;
    protected $table = 'hockys';
    protected $primaryKey = 'id_hocky';
    protected $fillable = [
        'hk_nk',
        'hk_xet',
    ];
}
