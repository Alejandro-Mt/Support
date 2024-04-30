<?php

namespace App\Http\Controllers\Soportes;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Comentario;
use App\Models\Estatus;
use App\Models\Incidencia;
use App\Models\Invitado;
use App\Models\Localidad;
use App\Models\Sistema;
use App\Models\SO;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Usr_data;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $arq = Usr_data::where('id_departamento',14)->get();
        $cc = Usr_data::where('id_departamento',9)->get();
        $clientes = Cliente::all();
        $estatus = Estatus::all();
        $incidencias = Incidencia::all();
        $localidades = Localidad::all();
        $ops = Usr_data::where('id_departamento',28)->get();
        $pip = Usr_data::where('id_departamento',29)->get();
        $sistemas = Sistema::all();
        $sos = SO::all();
        $users = User::select('nombre', 'a_pat', 'a_mat', 'email')->union(Invitado::select('nombre', 'a_pat', 'a_mat', 'email'))->get();
        return view('soporte.registro',compact('arq','cc','clientes','estatus','incidencias','localidades','ops','pip','sistemas','sos','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $data)
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function create(Request $data)
        {
            $rol =Auth::user()->usrdata->rol->id_rol;
            $nivel = Estatus::where('id_estatus',$data['estatus'])->first();
            if(!$nivel->nivel) {$nivel->nivel = 1;}
            if($rol == 3){
                $solicitante = User::where('email',Auth::user()->email)->first();
                $fecha_soporte = now();
            }else{
                $solicitante = User::where('email',$data['email'])->first();
                $fecha_soporte = Carbon::createFromFormat('d-m-Y H:i', $data['fecha_soporte'])->format('Y-m-d H:i:s');
            }        
            if(!$solicitante){
                $solicitante=Invitado::updateOrCreate(
                    ['email'    => $data['email']],
                    [
                    'nombre'  => strtoupper($data['nombre_prom']),
                    'a_pat'   => strtoupper($data['a_pat']),
                    'a_mat'   => strtoupper($data['a_mat']),
                    'movil'   => $data['movil']
                    ]
                );
            }
            $ticket = Ticket::create([
                'fecha_reporte'     => $fecha_soporte,
                'id_cliente'        => $data['cliente'],
                'id_localidad'      => $data['localidad'],
                'id_sistema'        => $data['sistema'],
                'id_so'             => $data['so'],
                'id_incidencia'     => $data['incidencia'],
                'id_solicitante'    => $solicitante->email,
                'nivel'             => $nivel->nivel,
                'id_estatus'        => $data['estatus'],
                'id_departamento'   => $solicitante->usrdata->id_departamento ?? 35,
                'id_cc'             => $data['id_cc'],
                'id_pip'            => $data['id_pip']
            ]);
            switch ($rol) {
                case '1':
                    $estCmt = 1;
                    break;
                case '2':
                    $estCmt = 2;
                    break;
                default:
                    $estCmt = 1;
                    break;
            }
            Comentario::Create(
                [
                'folio'     => $ticket->folio,
                'id_user'   => Auth::user()->id_user,
                'comentario'=> $data['comentario'],
                'tipo'      => 'padre',
                'id_estatus'=> $estCmt,
                ]
            );
            return redirect('/')->with('success', $ticket->folio);
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($folio)
    {
        //
        $arq = Usr_data::where('id_departamento',14)->get();
        $cc = Usr_data::where('id_departamento',9)->get();
        $clientes = Cliente::all();
        $estatus = Estatus::all();
        $incidencias = Incidencia::all();
        $localidades = Localidad::all();
        $ops = Usr_data::where('id_departamento',28)->get();
        $pip = Usr_data::where('id_departamento',29)->get();
        $sistemas = Sistema::all();
        $sos = SO::all();
        $ticket      = Ticket::where('folio',$folio)->first();
        return view('soporte.seguimiento',compact('arq','cc','clientes','estatus','incidencias','localidades','ops','pip','sistemas','sos','ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $data, $folio)
    {
        //
        $rol =Auth::user()->usrdata->rol->id_rol;
        $nivel = Estatus::where('id_estatus',$data['estatus'])->first();
        if(!$nivel->nivel) {$nivel->nivel = 1;}
        $fecha_seg = Carbon::createFromFormat('d-m-Y H:i', $data['fecha_soporte'])->format('Y-m-d H:i:s');
        $ticket = Ticket::where('folio',$folio)->first();
        if($rol != 3){
            $ticket->where('folio', $folio)->update([
                'id_cliente'        => $data['cliente'],
                'id_localidad'      => $data['localidad'],
                'id_sistema'        => $data['sistema'],
                'id_so'             => $data['so'],
                'id_incidencia'     => $data['incidencia'],
                'nivel'             => $nivel->nivel,
                'id_estatus'        => $data['estatus'],
                'id_cc'             => $data['id_cc'],
                'id_pip'            => $data['id_pip'],
                'id_op'             => $data['id_op'],
                'id_arq'            => $data['id_arq']
            ]);
        }
        // Guarda los cambios en la base de datos
        $ticket->save();
        switch ($rol) {
            case '1':
                $estCmt = 1;
                break;
            case '2':
                $estCmt = 2;
                break;
            default:
                $estCmt = 1;
                break;
        }
        Comentario::Create(
            [
            'folio'     => $ticket->folio,
            'id_user'   => Auth::user()->id_user,
            'comentario'=> $data['comentario'],
            'fecha_seg' => $fecha_seg,
            'tipo'      => 'hijo',
            'id_estatus'=> $estCmt,
            ]
        );
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
