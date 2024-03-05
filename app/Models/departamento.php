<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_departamento';
    protected $fillable = [
        'nombre',
        'activo'
    ];
    // En el modelo Departamento.php
    public function usuarios()
    {
        return $this->hasMany(Usr_data::class, 'id_departamento', 'id_departamento');
    }

    // En algún lugar de tu aplicación donde necesitas contar usuarios por departamento
    public function usdep()
    {
        // Obtén la información de departamentos con el conteo de usuarios
        return $this->usuarios()->count();
    }

}