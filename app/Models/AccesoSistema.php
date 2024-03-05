<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccesoSistema extends Model
{
    use HasFactory;
    protected $table = 'acceso_sistema';
    protected $fillable = [
        'id_user',
        'id_sistema'
    ];

    public function userdata(){
        return $this->belongsTo(Usr_data::class, 'id_user', 'id_user');
    }

    public function sistema(){
        return $this->belongsTo(Sistema::class, 'id_sistema', 'id_sistema');
    }
}
