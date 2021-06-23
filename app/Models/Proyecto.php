<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Proyecto extends Model
{
    use HasFactory;

    /**
     * @return BelongsToMany
     * Se retorna los usuarios que dirigen el proyecto
     */
    public function leadBy(){
        return $this->belongsToMany(Usuario::class, 'proyecto_usuario', 'id_proyecto', 'id_usuario');
    }
}
