<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitado extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'nombre',
        'a_pat',
        'a_mat',
        'email',
        'movil'
    ];
    public function nombreCompleto(){
      return "{$this->nombre} {$this->a_pat} {$this->a_mat}";
    }
}
