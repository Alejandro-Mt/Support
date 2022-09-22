<?php

namespace App\Http\Controllers;

use App\Models\analisis;
use App\Models\bitacora;
use App\Models\construccion;
use App\Models\cronograma;
use App\Models\desfase;
use App\Models\implementacion;
use App\Models\liberacion;
use App\Models\registro;
use App\Models\informacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConstruccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($folio){
        $registros = registro::select('folio', 'id_estatus')->where('folio',$folio)->get();
        $id = registro::latest('id_registro')->first();
        $desfases = desfase::all();
        $previo = construccion::select('*')->where('folio',$folio)->get();
        $vacio = construccion:: select('*')->where('folio',$folio)->count();
        $solinf = informacion::where('folio',$folio)->whereNULL('respuesta')->count();
        return view('formatos.requerimientos.construccion',compact('registros','id','desfases','previo','vacio','solinf'));
        dd($previo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $data){
        $val = analisis::select('fechaCompReqR')->where('folio',$data['folio'])->get();
        if($data['desfase'] == '1'){
            $this->validate($data, ['motivodesfase' => "required"]);
            $this->validate($data, ['fechareact' => "required|date|after_or_equal:$data[fechaCompReqC]"]);
        }
        foreach($val as $fecha){$this->validate($data, ['fechaCompReqC' => "required|date|after_or_equal:$fecha->fechaCompReqR"]);}
        $verificar = construccion::where('folio',$data['folio'])->count();
        if($data['fechaCompReqC']<>NULL){$fechaCompReqC=date("y/m/d", strtotime($data['fechaCompReqC']));}else{$fechaCompReqC=NULL;}
        if($data['fechaCompReqR']<>NULL){
            if($data['fechaCompReqC'] <> NULL){
                $this->validate($data, ['fechaCompReqR' => "required|date|after_or_equal:$data[fechaCompReqC]"]);
            }
            $fechaCompReqR=date("y/m/d", strtotime($data['fechaCompReqR']));}
        else{
            $fechaCompReqR=NULL;
        }
        if($data['fechareact']<>NULL){$fechareact=date("y/m/d", strtotime($data['fechareact']));}else{$fechareact=NULL;}
        if($data['id_estatus'] == 8){$this->validate($data, ['fechaCompReqR' => "required|date|after_or_equal:$data[fechaCompReqC]"]);}
        if($verificar == 0){
            construccion::create([
            'folio' => $data['folio'],
            'fechaCompReqC' => $fechaCompReqC,
            'evidencia' => $data['evidencia'],
            'fechaCompReqR' => $fechaCompReqR,
            'desfase' => $data['desfase'],
            'motivodesfase' => $data['motivodesfase'],
            'motivopausa' => $data['motivopausa'],
            'evpausa' => $data['evpausa'],
            'fechareact' => $fechareact,
            ]);
        }
        else{
            $previo = construccion::select('*')->where('folio',$data['folio'])->get();
            foreach($previo as $fecha){
                if(date('y/m/d', strtotime($fecha->fechaCompReqC)) <> $fechaCompReqC){
                    if(date('y/m/d', strtotime($fecha->fechaCompReqR)) <> $fechaCompReqR){
                        bitacora::create([
                            'id_user' => auth::user()->id,
                            'usuario' => auth::user()->fullname,
                            'id_estatus' => '7',
                            'campo' => 'Fechas de construcción actualizadas'
                        ]);
                    }else{
                        bitacora::create([
                            'id_user' => auth::user()->id,
                            'usuario' => auth::user()->fullname,
                            'id_estatus' => '7',
                            'campo' => 'Fecha compromiso cliente'
                        ]);
                    }
                }else{
                    if(date('y/m/d', strtotime($fecha->fechaCompReqR)) <> $fechaCompReqR){
                        bitacora::create([
                            'id_user' => auth::user()->id,
                            'usuario' => auth::user()->fullname,
                            'id_estatus' => '7',
                            'campo' => 'Fecha compromiso real'
                        ]);
                    }
                }
            }
            $update = construccion::select('*')->where('folio',$data['folio'])->first();
            $update->fechaCompReqC = $fechaCompReqC;
            $update->evidencia = $data['evidencia'];
            $update->fechaCompReqR = $fechaCompReqR;
            $update->desfase = $data['desfase'];
            $update->motivodesfase = $data['motivodesfase'];
            $update->motivopausa = $data['motivopausa'];
            $update->evpausa = $data['evpausa'];
            $update->fechareact = $fechareact;
            $estatus = registro::select()-> where ('folio', $data->folio)->first();
            $estatus->id_estatus = $data['id_estatus'];
            $estatus->save();
            $update->save(); 
        } 
        if($data['fechaInConP']<>NULL){
            if(construccion::where('folio',$data['folio'])->count() == 0){
                cronograma::create([
                    'folio' => $data['folio'],
                    'titulo' => 'Construcción',
                    'inicio' => date("y/m/d", strtotime($data['fechaInConP'])),
                    'fin' => date("y/m/d", strtotime($data['fechaInConR'])),
                    'color' => 'bg-danger'
                ]);
                construccion::create([
                    'folio' => $data['folio'],
                    'fechaCompReqC' => date("y/m/d", strtotime($data['fechaInConP'])),
                    'evidencia' => 'null',
                    'fechaCompReqR' => date("y/m/d", strtotime($data['fechaInConR'])),
                ]);
            }/*else{
                $updateC = construccion::where('folio',$data['folio'])->first();
                $updateC->fechaCompReqC = date("y/m/d", strtotime($data['fechaInConP']));
                $updateC->fechaCompReqR = date("y/m/d", strtotime($$data['fechaInConR']));
                $update->save();
                $updateCC = cronograma::where('folio',$data['folio'])->orwhere('titulo','Construcción')->first();
                $updateCC->inicio = date('y/m/d',strtotime($data('fechaInConP')));
                $updateCC->fin = date('y/m/d',strtotime($data('fechaInConR')));
                $updateCC->save();
            }*/
        }
        if($data['FechaLibP']<>NULL){
            if(liberacion::where('folio',$data['folio'])->count() == 0){
                cronograma::create([
                    'folio' => $data['folio'],
                    'titulo' => 'Liberación',
                    'inicio' => date("y/m/d", strtotime($data['FechaLibP'])),
                    'fin' => date("y/m/d", strtotime($data['FechaLibR'])),
                    'color' => 'bg-warning'
                ]);
                liberacion::create([
                    'folio' => $data['folio'],
                    'fecha_lib_a' => date("y/m/d", strtotime($data['FechaLibP'])),
                    'evidencia' => 'null',
                    'fecha_lib_r' => date("y/m/d", strtotime($data['FechaLibR'])),
                ]);
            }/*else{
                $updateL = liberacion::where('folio',$data['folio'])->first();
                $updateL->fecha_lib_a = date("y/m/d", strtotime($data['FechaLibP']));
                $updateL->fecha_lib_r = date("y/m/d", strtotime($$data['FechaLibR']));
                $update->save();
                $updateCL = cronograma::where('folio',$data['folio'])->orwhere('titulo','Liberación')->first();
                $updateCL->inicio = date('y/m/d',strtotime($data('FechaLibP')));
                $updateCL->fin = date('y/m/d',strtotime($data('FechaLibR')));
                $updateCL->save();
            }*/
        }
        if($data['FechaImpP']<>NULL){
            if(implementacion::where('folio',$data['folio'])->count() == 0){
                cronograma::create([
                    'folio' => $data['folio'],
                    'titulo' => 'Implementación',
                    'inicio' => date("y/m/d", strtotime($data['FechaImpP'])),
                    'fin' => date("y/m/d", strtotime($data['FechaImpP'])),
                    'color' => 'bg-primary'
                ]);
                implementacion::create([
                    'folio' => $data['folio'],
                    'f_implementacion' => date("y/m/d", strtotime($data['FechaImpP'])),
                ]);
            }
        }
        $update = registro::select()-> where ('folio', $data->folio)->first();
        $update->id_estatus = $data->input('id_estatus');
        $update->save();
        return redirect(route('Editar'));

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
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
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
