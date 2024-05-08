<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use App\Models\Sistema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SistemaController extends Controller
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
        Sistema::create([
            'nombre' => $data['nombre'],
            'email'=> $data['email']
        ]);
        return redirect(route('home'));
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
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $data, $id_sistema)
    {
        $update = Sistema::FindOrFail($id_sistema);
        $update->nombre = $data['nombre'];
        $update->dispercion= $data['dispercion'];
        $update->activo= $data['activo'];
        $update->save();  
        return redirect(route('Seguir'));
        #dd($rename);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_sistema)
    {
        $id_sistema = Sistema::find($id_sistema);
        $id_sistema->delete();
        return redirect(route('Seguir'));
    }
}
