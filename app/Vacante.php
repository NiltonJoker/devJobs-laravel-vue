<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{

    protected $fillable = [
        'titulo', 'imagen', 'descripcion', 'skills', 'categoria_id', 'experiencia_id', 'ubicacion_id', 'salario_id'
    ];

    // Relacion 1:1 Categoria y vacante
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
     // Relacion 1:1 Salario y vacante
    public function salario(){
        return $this->belongsTo(Salario::class);
    }
     // Relacion 1:1 Ubicacion y vacante
    public function ubicacion(){
        return $this->belongsTo(Ubicacion::class);
    }
     // Relacion 1:1 Experiencia y vacante
    public function experiencia(){
        return $this->belongsTo(Experiencia::class);
    }
    // Relacion 1:1 Reclutador y vacante
    public function reclutador(){
        return $this->belongsTo(User::class, 'user_id');
    }
    // Relacion 1:n vacante y candidatos
    public function candidatos(){
        return $this->hasMany(Candidato::class);
    }
}
