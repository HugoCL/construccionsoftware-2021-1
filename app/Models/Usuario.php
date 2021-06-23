<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Usuario extends Model
{
    use HasFactory;

    /**
     * @return BelongsToMany
     * Se retornan los proyectos que dirige el usuario
     */
    public function leadProject(){
        return $this->belongsToMany(Proyecto::class,  'proyecto_usuario', 'id_proyecto', 'id_usuario');
    }
}
