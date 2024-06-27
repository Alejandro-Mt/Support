<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Usr_data;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        // Validar datos del formulario
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);

            $url = 'https://api-seguridad-67vdh6ftzq-uc.a.run.app/api/v2/login';
            #$url = 'https://api-seguridad-preproduction-mb3clvz7ya-uc.a.run.app/api/v2/login';
            $data = [
                'idOrigen' => 1,
                'idUsuarioOS' => '',
                'password' => $request->input('password'),
                'user' => $request->input($this->username()),
                'tokenFcm' => '',
                'idAplicacion' => 70,
                'idAmbiente' => '1'
            ];
            // Enviar datos a la API externa
            
            $response = Http::post($url, $data);

        try {
            $user = $response->json();
            $usr_data = Usr_data::where('id_sc',  $user['idUsuario'])->first();
            if($usr_data){
                $usr_data->remember_token = $user['token'];
                $usr_data->save();
                $finduser = User::where('id_user', $usr_data->id_user)->first();
                if($finduser){
                    Auth::login($finduser);
                    return redirect(route('home'));
                }else{
                    dd($response->json(),$usr_data);
                    return redirect()->back()->withErrors(['login' => 'Credenciales inválidas']);
                }
            }else{
                $parts = explode(" ", $user['nombre']);
                $nombre = $parts[0];
                $lastTwoWords = array_slice($parts, -2);
                $a_pat = $lastTwoWords[0] ?? '';
                $a_mat = $lastTwoWords[1] ?? '';// Tercer elemento, si existe
                $newUser = User::updateOrCreate(
                    ['email' => $user['correo']],
                    [
                        'nombre'  => $nombre,
                        'a_pat'   => $a_pat,
                        'a_mat'   => $a_mat,
                        'password'=> Hash::make($request->input('password'))
                    ]);
                    
                $usrData = $newUser->usrData;
                if ($usrData) {
                    // Si ya tiene un Usr_data, actualizar los campos 'external_id' y 'token_google'
                    $usrData->update([
                        'remember_token'    => $user['token'],
                        'id_sc'             => $user['idUsuario']
                    ]);
                } else {
                    Usr_data::Create([
                        'id_user'           => $newUser->id_user,
                        'id_departamento'   => 28,
                        'id_division'       => 3,
                        'id_rol'            => 3,
                        'id_sc'             => $user['idUsuario'],
                        'remember_token'    => $user['token']]
                    );
                }
                Auth::login($newUser);
                return redirect(route('home'));
            }
        } catch (Exception $e) {
            // Captura la excepción y verifica el mensaje o el código de error
            $errorMessage = $e->getMessage();
        
            if (strpos($errorMessage, 'Undefined index') !== false) {
                // Maneja el caso específico de "Undefined index"
                return redirect()->back()->withErrors(['login' => 'Credenciales inválidas']);
            } else {
                // Maneja otros mensajes o códigos de error, si es necesario
                dd("Error: " . $errorMessage);
            }
        }
    }
}
