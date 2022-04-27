<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kosar extends Model
{
    use HasFactory;

    protected $fillable = ['mennyiseg', 'kosarba_helyezes','rendeles_id','termekek_id'];

    protected $visible = [
        'id',
        'mennyiseg',
        'kosarba_helyezes',
        'rendeles_id',
        'termekek_id'
    ];
    //teszt
    protected $table = "kosar";
}
