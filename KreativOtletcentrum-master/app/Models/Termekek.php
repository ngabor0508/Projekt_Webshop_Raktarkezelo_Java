<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Termekek extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'quantity','kodszam','url','kategoria'];

    protected $visible = [
        'id',
        'name',
        'price',
        'quantity',
        'kodszam',
        'url',
        'kategoria'
    ];

    protected $table = "termekek";
}
