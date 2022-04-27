<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rendeles extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'idopont'];

    protected $visible = [
        'id',
        'user_id',
        'idopont'
    ];

    protected $table = "rendeles";
}
