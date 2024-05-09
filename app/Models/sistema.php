<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_sistema';
    protected $fillable = [
        'nombre',
        'descripcion',
        'email',
    ];

    public function incidencia()
    {
        return $this->hasMany(incidencia::class, 'id_sistema', 'id_sistema');
    }

}
