<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_division';
    protected $table = 'divisiones';
    protected $fillable = [
        'nombre',
        'activo'
    ];
}
