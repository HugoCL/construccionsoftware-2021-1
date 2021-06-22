<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * Se retornan los proyectos que dirige el usuario
     */
    public function leadProject(){
        return $this->belongsToMany(Proyecto::class,  'proyecto_usuario', 'id_proyecto', 'id_usuario');
    }
}
