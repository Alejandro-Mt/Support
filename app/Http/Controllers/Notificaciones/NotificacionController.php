<?php

namespace App\Http\Controllers\Notificaciones;

use App\Http\Controllers\Controller;
use App\Mail\Ticket\Estatus;
use App\Models\Bitacora;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class NotificacionController extends Controller
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
    public function create(){}

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
    public function edit($id){
        $notification = Auth::user()->notifications()->find($id);
        //dd($notification->data['folio']);
        if ($notification) {
            $notification->read_at = now();
            $notification->save();
        }

        return redirect(route('Seguimiento_Soporte', $notification->data['folio']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($idSC,$message){
        $url = 'https://servicionotificaciones-67vdh6ftzq-uc.a.run.app/api/v1/messagenotification';
        #$url = 'https://servicionotificaciones-preproduction-mb3clvz7ya-uc.a.run.app/api/v1/messagenotification';
        $data = [
            "reasonId" => 0,
            "notificationTypeId" => 0,
            "parameters" => "IT-SUPPORT|$message|$idSC|70|1|6",
            "userIdAct" => 1,
            "url" => "",
            "scheduledDate" => null,
            "xml" => "",
            "html" => "",
            "type" => "",
            "path" => "",
            "fileName" => ""
        ];
    
        try {
            $response = Http::post($url, $data);
    
            // Verifica el código de respuesta y toma acciones apropiadas
            if ($response->successful()) {
                // Acciones si la solicitud fue exitosa
                return $response->json();
            } else {
                // Acciones si la solicitud falló
                return $response->status();
            }
        } catch (\Exception $e) {
            // Captura de excepciones si ocurre algún error en la solicitud
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($ticket){
        $user           = User::findOrFAil(Auth::user()->id_user);
        $campo          = 
        Bitacora::create([
          'folio'         => $ticket->folio,
          'id_user'       => $user->id,
          'usuario'       => $user->email,
          #'campo'         => $form->estatus->posicion = 5 ? "Se envió formato de solicitud a cliente" : "Se envió formato de solicitud a desarrollo",
          'id_estatus'    => $ticket->id_estatus,
        ]);
        if($ticket->solicitante){
            #$notificacionUserC = Http::withOptions(['verify' => false])->get('https://api-seguridadv2.tiii.mx/api/v1/login/validacionRF/0/'.$ticket->solicitante->email);
            $notificacionUserC = http::get("https://api-seguridad-67vdh6ftzq-uc.a.run.app/api/v1/login/validacionRF/0/{$ticket->solicitante->email}");
            $datos = $notificacionUserC->json();
            $idSC = $datos['idUsuario'];
            $message = 'El estatus de su solicitud de soporte con folio '.$ticket->folio.' ha cambiado a '.$ticket->estatus->nombre.'. Revise los detalles en nuestra aplicación.';
            $this->store($idSC,$message);
        }
        $cc = [];
        if (!empty($ticket->rCC) && !empty($ticket->rCC->email)) {
            $cc[] = $ticket->rCC->email;
        }
        if (!empty($ticket->rPIP) && !empty($ticket->rPIP->email)) {
            $cc[] = $ticket->rPIP->email;
        }
        // Los archivos requeridos existen, proceder con el envío de correo y actualización de estatus
        Mail::to($ticket->id_solicitante)->cc($cc)->send(new Estatus($ticket->folio));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    function push($idSC,$message){
        $url = 'https://servicionotificaciones-67vdh6ftzq-uc.a.run.app/api/v1/messagenotification';
        #$url = 'https://servicionotificaciones-preproduction-mb3clvz7ya-uc.a.run.app/api/v1/messagenotification';
        $data = [
            "reasonId" => 0,
            "notificationTypeId" => 0,
            "parameters" => "SMART PLANNER|$message|$idSC|68|1|6",
            "userIdAct" => 1,
            "url" => "",
            "scheduledDate" => null,
            "xml" => "",
            "html" => "",
            "type" => "",
            "path" => "",
            "fileName" => ""
        ];
    
        try {
            $response = Http::post($url, $data);
    
            // Verifica el código de respuesta y toma acciones apropiadas
            if ($response->successful()) {
                // Acciones si la solicitud fue exitosa
                return $response->json();
            } else {
                // Acciones si la solicitud falló
                return $response->status();
            }
        } catch (\Exception $e) {
            // Captura de excepciones si ocurre algún error en la solicitud
            return $e->getMessage();
        }
    }
}
