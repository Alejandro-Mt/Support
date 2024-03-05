<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usr_data extends Model
{
    use HasFactory;

    protected $table = 'usr_data';
    protected $primaryKey = 'id_usr_data';
    protected $fillable = [
        'id_user',
        'id_rol',
        'id_puesto',
        'id_area',
        'id_departamento',
        'avatar',
        'external_id',
        'remember_token',
        'token_google',
        'id_sc'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    // Define la relación belongsTo con el modelo Departamento
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'id_departamento', 'id_departamento');
    }

    // Define la relación belongsTo con el modelo Division
    public function division()
    {
        return $this->belongsTo(Division::class, 'id_division', 'id_division');
    }
    
    // Define la relación hasMany con el modelo AccesoSistema
    public function accesosis(){
        return $this->hasMany(AccesoSistema::class, 'id_user', 'id_user');
    }

    // Define la relación belongsTo con el modelo Puesto
    public function puesto()
    {
        return $this->belongsTo(Puesto::class, 'id_puesto', 'id_puesto');
    }

    // Define la relación belongsTo con el modelo Rol
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol', 'id_rol');
    }
    // En el modelo Usr_data
    public function usuariosdep()
    {
        return $this->hasMany(Usr_data::class, 'id_departamento', 'id_departamento');
    }

}
