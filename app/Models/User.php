<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'nombre',
        'a_pat',
        'a_mat',
        'email',
        'password',
        'activo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function nombreCompleto(){
        return "{$this->nombre} {$this->a_pat} {$this->a_mat}";
    }

    public function usrdata(){
        return $this->belongsTo(Usr_data::class, 'id_user', 'id_user');
    }

    public function usrdpto()
    {
        return  User::join('usr_data as ud','users.id_user','ud.id_user')->where('ud.id_departamento',Auth::user()->usrdata->id_departamento)->get();
    }
    public function Tickets()
    {
        return Ticket::where(function ($query) {
            $query->where('id_solicitante', $this->id_user)
                ->orWhere('id_cc', $this->id_user)
                ->orWhere('id_pip', $this->id_user);
        })->get();
    }
}
