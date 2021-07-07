<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Integrant extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_proyect',
        'id_user',
        'rol',
        'created_at',
        'updated_at'
    ];
}
