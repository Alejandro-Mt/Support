<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use App\Models\Usr_data;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')
        ->scopes([
            'https://www.googleapis.com/auth/spreadsheets', // Alcance para hojas de cálculo
            'https://www.googleapis.com/auth/userinfo.profile',
            'https://www.googleapis.com/auth/userinfo.email',
            'https://www.googleapis.com/auth/drive'
        ])
        ->redirect();
    }
          
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $usr_data = Usr_data::where('external_id', $user->id)->first();
            if($usr_data){
                $usr_data->token_google = $user->token;
                $usr_data->save();
                $finduser = User::where('id_user', $usr_data->id_user)->first();
                if($finduser){
                    Auth::login($finduser);
                    return redirect(route('home'));
                }
            }else{
                $parts = explode(" ", $user->name);
                $nombre = $parts[0];
                $a_pat = isset($parts[1]) ? $parts[1] : ''; // Segundo elemento, si existe
                $a_mat = isset($parts[2]) ? $parts[2] : ''; // Tercer elemento, si existe
                $newUser = User::updateOrCreate(
                    ['email' => $user->email],
                    [
                        'nombre'  => $nombre,
                        'a_pat'   => $a_pat,
                        'a_mat'   => $a_mat,
                        'password'=> Hash::make($nombre.'1%')
                    ]);
                    
                // Obtener el Usr_data asociado al nuevo usuario
                $usrData = $newUser->usrData;
                if ($usrData) {
                    // Si ya tiene un Usr_data, actualizar los campos 'external_id' y 'token_google'
                    $usrData->update([
                        'external_id' => $user->id,
                        'token_google' => $user->token,
                    ]);
                } else {
                // Si no tiene un Usr_data, crear uno nuevo con los campos proporcionados
                    Usr_data::create([
                        'id_user'         => $newUser->id_user,
                        'id_departamento' => 28,
                        'id_division'     => 3,
                        'id_rol'          => 3,
                        'external_id'     => $user->id,
                        'token_google'    => $user->token,
                    ]);
                }
                Auth::login($newUser);
                return redirect(route('home'));
                #dd($user->token);
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}

# enviar ticket por GLPI a mesa de ayuda helpdesk, desarrollo para asignar a los usuarios la aplicacion SP