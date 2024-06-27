<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'folio',
        'fecha_reporte',
        'id_cliente',
        'id_localidad',
        'id_sistema',
        'id_so',
        'id_incidencia',
        'id_solicitante',
        'nivel',
        'id_estatus',
        'id_area',
        'id_cc',
        'id_pip',
        'id_op',
        'id_arq',

    ];

    protected $dates = ['created_at', 'updated_at'];

    public function allComentarios()
    {
        return $this->hasMany(Comentario::class, 'folio', 'folio')->latest('created_at');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente','id_cliente');
    }

    public function comentario()
    {
        return $this->hasOne(Comentario::class, 'folio', 'folio')->latest();
        #return $this->belongsTo(Comentario::class,'folio','folio');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'folio', 'folio');
    }

    public function comentarioPadre()
    {
        return $this->comentarios()->where('tipo', 'padre')->value('comentario');
    }

    public function estatus()
    {
        return $this->belongsTo(Estatus::class, 'id_estatus','id_estatus');
    }

    public function incidencia()
    {
        return $this->belongsTo(Incidencia::class, 'id_incidencia','id_incidencia');
    }

    public function invitado()
    {
        return $this->belongsTo(Invitado::class, 'id_solicitante','email');
    }

    public function localidad()
    {
        return $this->belongsTo(Localidad::class, 'id_localidad','id_localidad');
    }

    public function role()
    {
        return $this->belongsTo(Rol::class,'id_rol','id_rol');
    }

    public function sistema()
    {
        return $this->belongsTo(Sistema::class, 'id_sistema','id_sistema');
    }

    public function solicitante()
    {
        return $this->belongsTo(User::class,'id_solicitante','email');
    }

    public function so()
    {
        return $this->belongsTo(SO::class,'id_so','id_so');
    }

    public function rCC()
    {
        return $this->belongsTo(User::class,'id_cc','id_user');
    }

    public function rPIP()
    {
        return $this->belongsTo(User::class,'id_pip','id_user');
    }

    public function rOP()
    {
        return $this->belongsTo(User::class,'id_op','id_user');
    }

    public function rAR()
    {
        return $this->belongsTo(User::class,'id_arq','id_user');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($ticket) {
            // Obtener el prefijo del rol seleccionado
            $prefijo = Auth::user()->usrdata->rol->prefijo;
            // Obtener el año actual y tomar los últimos 2 dígitos
            $anio = date('y');
            // Obtener el máximo número autoincrementable actual con el mismo prefijo y año
            $maxConsecutivo = Ticket::where('folio', 'like', "$prefijo%-$anio")->count('folio');
            // Si no se encontró un número autoincrementable, establecerlo en 1; de lo contrario, incrementar en 1
            $nextConsecutivo = ($maxConsecutivo) ? ((int)substr($maxConsecutivo, -3) + 1) : 1;
            // Crear el folio combinando el prefijo, el nuevo número autoincrementable y el año
            $ticket->folio = $prefijo . '-' . str_pad($nextConsecutivo, 3, '0', STR_PAD_LEFT) . '-' . $anio;

        });
    }
}
