<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_incidencia';
    protected $table = 'incidencias';
    protected $fillable = [
        'nombre',
        'activo'
    ];

    public function sistema()
    {
        return $this->belongsTo(Sistema::class, 'id_sistema','id_sistema');
    }
}
