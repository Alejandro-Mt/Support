<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comentario extends Model
{
    use HasFactory;
    protected $fillable = [
        'folio',
        'comentario',
        'id_user',
        'tipo',
        'id_estatus',
        'fecha_seg'
    ];
    
    public function user()
    {
    return $this->belongsTo(User::class, 'id_user', 'id_user')
        ->select(['nombre', 'a_pat', 'a_mat', 'id_user'])
        ->withCasts([
            'id_user' => 'string', // Asegura que id_user sea tratado como cadena
        ])
        ->withDefault([
            'nombre' => '',
            'a_pat' => '',
            'a_mat' => '',
        ])
        ->addSelect([
            DB::raw("CONCAT_WS(' ', nombre, a_pat, a_mat) as full_name"),
        ]);
    }

    public function user_data()
    {
        return $this->belongsTo(Usr_data::class,'id_user','id_user');
    }
}
