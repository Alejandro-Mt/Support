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
        'nombre_cl',
        'a_pat_cl',
        'a_mat_cl',
        'movil',
        'fecha_reporte',
        'cliente_id',
        'localidad_id',
        'sistema_id',
        'so_id',
        'incidencia_id',
        'area_id',
        'reportante_id',
        'usuario_id',

    ];

    protected $dates = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function incidencia()
    {
        return $this->belongsTo(Incidencia::class, 'incidencia_id','id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id','id');
    }

    public function sistema()
    {
        return $this->belongsTo(Sistema::class, 'sistema_id','id');
    }

    public function estatus()
    {
        return $this->belongsTo(Estado::class, 'estatus_id','id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id','id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($ticket) {
            // Obtener el prefijo del rol seleccionado
            $prefijo = Auth::user()->rol->prefijo;
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
