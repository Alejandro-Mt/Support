<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use App\Models\AccesoSistema;
use App\Models\Departamento;
use App\Models\Division;
use App\Models\Puesto;
use App\Models\Rol;
use App\Models\Sistema;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Usr_data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
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
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => [
                'required', 
                'string', 
                'email', 'ends_with:triplei.mx,it-strategy.mx,zacatepromotion.mx,idmkt.mx,stlog.mx',
                'max:255', 
                'unique:users'],
                'nombre' => 'required|string|max:255',
                'a_pat' => 'required|string|max:255',
                'a_mat' => 'nullable|string|max:255',
                'email' => 'required|email|unique:users,email',
                'id_departamento' => 'required|numeric',
                'id_division' => 'required|numeric',
                'id_puesto' => 'required|numeric',
                'id_rol' => 'required|numeric',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $data)
    {
        $this->validator($data->all())->validate();
        $user = User::create([
            'nombre' => strtoupper($data['nombre']), 
            'a_pat'  => strtoupper($data['a_pat']), 
            'a_mat'  => strtoupper($data['a_mat']), 
            'email'  => $data['email'],
            'password' => Hash::make('Triplei.mx')
        ]);
        $user->usrdata()->create([
            'id_user' => $user->id_user,
            'id_departamento'=>$data['id_departamento'],
            'id_division'=>$data['id_division'],
            'id_puesto' => $data['id_puesto'],
            'id_rol' => $data['id_rol'],
            'email' => $data['email'],
        ]);
        $user->sendEmailVerificationNotification();
        return redirect(route('home'))->with('success', 'Usuario creado exitosamente.');
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
        $departamentos = Departamento::all();
        $divisiones = Division::all();
        if (Auth::user()->usrdata->rol->id_rol == 4) {
            $equipo = User::all();
        } else {
            $equipo = User::join('usr_data as ud','users.id_user','ud.id_user')->where('ud.id_departamento',Auth::user()->usrdata->id_departamento)->get();
        }
        $puestos = Puesto::all();
        $roles = Rol::all();
        #$sistemas = Sistema::all();
        $sistemas = Sistema::join('acceso_sistema as acs', 'sistemas.id_sistema','acs.id_sistema')->where('id_user',Auth::user()->id_user)->get();
        return view('catalogos.usuario',compact('departamentos','divisiones','equipo','puestos','roles','sistemas'));
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
    public function update(Request $data, $id_user)
    {

        $user = User::findOrFail($id_user);
        $user->nombre = strtoupper($data['nombre']);
        $user->a_pat = strtoupper($data['a_pat']);
        $user->a_mat = strtoupper($data['a_mat']);
        $user->email = $data['email'];
        $user->usrdata()->update([
            'id_departamento'=>$data['id_departamento'],
            'id_division'=>$data['id_division'],
            'id_puesto' => $data['id_puesto'],
            'id_rol' => $data['id_rol']
        ]);
        $user->save();
        return redirect(route('home'))->with('Usr_data', 'Usuario actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_user)
    {
        //
        
    }
}
