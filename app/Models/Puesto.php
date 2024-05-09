<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_puesto';
    protected $fillable = [
        'nombre',
        'activo'
    ];
}