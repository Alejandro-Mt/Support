<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\registro;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Usr_data;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
{
    //
    public function edit()
    {
       /* $data = user::select('nombre','apaterno','avatar','p.puesto')
                    ->leftjoin('puestos as p','users.id_puesto','p.id_puesto')
                    ->where('id', auth::user()->id)->get();
        $fechas = db::table('registros as r')
                    ->select(
                        'r.folio as folio',
                        'r.descripcion',
                        'r.created_at as req',
                        db::raw('datediff(l.fechades,l.created_at) as levantamiento'),
                        db::raw('datediff(c.fechaCompReqR,p.fechaCompReqR) as construccion'),
                        db::raw('datediff(li.fecha_lib_r, c.fechaCompReqR) as liberacion'),
                        db::raw('datediff(i.f_implementacion,li.fecha_lib_r) as implementacion'),
                        db::raw('(
                            datediff(l.fechades,l.created_at)+
                            datediff(c.fechaCompReqR,p.fechaCompReqR)+
                            datediff(li.fecha_lib_r, c.fechaCompReqR)+
                            datediff(i.f_implementacion,li.fecha_lib_r)
                            ) as total'),
                        'l.solicitante',
                        db::raw('if(r.id_cliente = cl.id_cliente, cl.nombre_cl,NULL) as cliente'),
                        db::raw('if(r.id_sistema = s.id_sistema, s.nombre_s,NULL) as sistema'),
                        db::raw('IF(r.id_estatus = 17, "requerimiento",
                            IF(r.id_estatus in (10,16), "levantamiento",
                              IF(r.id_estatus in (11,9,7), "construccion",
                                IF(r.id_estatus = 8, "liberacion",
                                  IF(r.id_estatus = 2, "implementacion",
                                    IF(r.id_estatus = 13, "pospuesto", "implementado")
                                  )
                                )
                              )
                            )
                        ) as estatus'),
                        db::raw('if(r.id_responsable = re.id_responsable, concat(re.nombre_r, " ", re.apellidos),NULL) as responsable'))
                    ->leftJoin('levantamientos as l', 'r.folio', 'l.folio')
                    ->leftJoin('planeacion as p', 'r.folio', 'p.folio')
                    ->leftJoin('construccion as c', 'r.folio', 'c.folio')
                    ->leftJoin('liberaciones as li', 'r.folio', 'li.folio')
                    ->leftJoin('implementaciones as i', 'r.folio', 'i.folio')
                    ->LEFTJOIN( 'clientes as cl', 'r.id_cliente', 'cl.id_cliente')
                    ->LEFTJOIN ('sistemas as s', 'r.id_sistema', 's.id_sistema')
                    ->LEFTJOIN ('estatus as e', 'r.id_estatus', 'e.id_estatus')
                    ->LEFTJOIN ('responsables as re', 'r.id_responsable', 're.id_responsable')
                    ->get();
        $folios = Ticket::all();*/
        return view('profile'/*,compact('data','fechas','folios')*/);
        #return $folios;
    }

    public function update(Request $data){
        $avatar = str_replace('storage','public',Auth::user()->usrdata->avatar);
        Storage::delete($avatar);
        $data->validate(['avatar'=>'required|image|max:2048']);
        $nuevaRuta = $data->file('avatar')->store('public/avatar/'.Auth::user()->id_user);
        $update = Usr_data::where('id_user',Auth::user()->id_user)->first();
        $update->avatar = storage::url($nuevaRuta);
        $update->save(); 
        return redirect(route('profile',Auth::user()->id_user));
        #return $data->avatar;
    }

    public function updatePass(Request $data){
      $data->validate([
        'oldpass' => 'required',
        'password' => ['required', 'confirmed', Rules\Password::defaults(),'different:oldpass']
      ]);
      $update = User::findOrFail(Auth::user()->id);
      if(Hash::check($data['oldpass'],Auth::user()->password)){
        $update->password = Hash::make($data['password']);
        $update->save(); 
        return redirect(route('profile',Auth::user()->id))->with('success','Contraseña actualizada con exito');
      }
      else{
        return redirect(route('profile',Auth::user()->id))->with('danger','Estas credenciales no coinciden con nuestros registros.');
      }
      #dd($data['password']);
    }
    
    public function settings(Request $data){
      User::where('id', Auth::user()->id)->update([$data['var'] => $data['val']]);
      #return $data->avatar;
  }
}
