<?php

namespace App\Http\Controllers;

use App\Models\archivo;
use App\Models\Cliente;
use App\Models\comentario;
use App\Models\estatu;
use App\Models\levantamiento;
use App\Models\pausa;
use App\Models\registro;
use App\Models\sistema;
use App\Models\solpri;
use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $data)
    {
        Cliente::create([
            'nombre_cl' => $data['nombre_cl'],
            'abreviacion' => $data['abreviacion'],
        ]);
        return redirect(route('Seguir'));
        #dd($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $listado = 
            cliente::
                orderby('nombre_cl')->get();
        
        $proyectos = 
            registro::
                select('registros.id_cliente','nombre_cl')->
                join('clientes as cl','registros.id_cliente','cl.id_cliente')->
                wherenotin('id_estatus',[18])->
                distinct()->
                orderby('nombre_cl','asc')->
                get();
        
        return view('cliente.clientes',compact('proyectos'));
        #dd($listado);
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
    public function edit(Request $data)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $data, $id_cliente)
    {
        $update = Cliente::FindOrFail($id_cliente);
        $update->nombre_cl = $data['nombre_cl'];
        $update->abreviacion = $data['abreviacion'];
        $update->save();  
        return redirect(route('Seguir'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_cliente)
    {
        $id_cliente = Cliente::find($id_cliente);
        $id_cliente->delete();
        return redirect(route('Seguir'));
    }

    public function document($folio)
    {
        $registros= registro::where('folio',$folio)->get();
        $estatus = estatu::all();
        $comentarios = comentario::select ('nombre',
                                            'apaterno',
                                            'folio',
                                            'contenido',
                                            'p.puesto',
                                            'respuesta',
                                            'comentarios.created_at',
                                            'id_estatus')
                                    ->leftjoin ('users as u','u.id','comentarios.usuario')
                                    ->leftjoin ('puestos as p', 'u.id_puesto','p.id_puesto')
                                    ->where('folio',$folio)->get();
        $archivos = archivo::where('folio',$folio)->get();
        $formatos = levantamiento::where('folio',$folio)->count();
        return view('cliente.documentacion',compact('archivos','comentarios','estatus','folio','formatos','registros'));
        #dd($formatos);
    }

    public function priority($id)
    {
        //
        $orden = solpri::where([['estatus', 'autorizado'],['id_cliente',$id]])->orderby('id','desc')->limit(1)->get();
        $validar = solpri::where([['estatus', 'autorizado'],['id_cliente',$id]])->count();
        $pendientes = 
            registro::
                join('sistemas as s','s.id_sistema','registros.id_sistema')
                ->wherenotin('registros.id_estatus',[13,14,18])
                ->wherenotin('folio',pausa::select('folio')->where('pausa',2)->distinct())
                ->where('registros.id_cliente', $id)
                ->get();
        $implementados = 
            registro::
                join('sistemas as s','s.id_sistema','registros.id_sistema')
                ->where('registros.id_estatus','18')
                ->where('registros.id_cliente', $id)
                ->get();
        $pospuestos = 
            registro::
                join('sistemas as s','s.id_sistema','registros.id_sistema')
                ->wherein(
                    'folio',
                    pausa::select('folio')
                    ->where('pausa',2)
                    ->where('registros.id_cliente', $id)
                    ->distinct()
                )
                ->orwhere('registros.id_estatus',13)
                ->where('registros.id_cliente', $id)
                ->get();
        return view('cliente.prioridad',compact('implementados','orden','pendientes','pospuestos','validar'));
        dd($validar);
    }
    public function request(Request $data)
    {
        solpri::create([
            'id_cliente' => $data['id_cliente'],
            'orden' => $data['orden'],
            'solicitante' => $data['solicitante']
        ]);
    }
}