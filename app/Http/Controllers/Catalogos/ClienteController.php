<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'nombre' => strtoupper($data['nombre']),
        ]);
        return redirect(route('home'));
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
        
        /*$listado = 
            cliente::
                orderby('nombre_cl')->get();
        
        $proyectos = 
            registro::
                select('registros.id_sistema','nombre_s')->
                join('sistemas as s','registros.id_sistema','s.id_sistema')->
                wherenotin('id_estatus',[18])->
                distinct()->
                orderby('nombre_s','asc')->
                get();
        
        return view('cliente.clientes',compact('proyectos'));*/
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
        $update->nombre = strtoupper($data['nombre']);
        $update->activo = $data['activo'];
        $update->save();  
        return redirect(route('home'));
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
        return redirect(route('home'));
    }
}
