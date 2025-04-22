<?php

namespace App\Http\Controllers;

use App\Models\acceso;
use App\Models\AccesoSistema;
use App\Models\Area;
use App\Models\Cliente;
use App\Models\Departamento;
use App\Models\Division;
use App\Models\Incidencia;
use App\Models\Puesto;
use App\Models\Rol;
use App\Models\Sistema;
use App\Models\Ticket;
use App\Models\User;
use Google_Client;
use Google\Service\Sheets;
use Google\Service\Sheets\ValueRange;
use Google\Service\Sheets\Spreadsheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clientes       = Cliente::all();
        $departamentos  = Departamento::all();
        $divisiones     = Division::all();
        $incidencias    = Incidencia::all();
        $puestos        = Puesto::all();
        $roles          = Rol::all();
        $sistemas       = Sistema::all();
        $sistemasAcceso = AccesoSistema::where('id_user', Auth::user()->id_user)->pluck('id_sistema')->toArray();
        if(Auth::user()->usrdata->is_rol == 3){
            $tabla = Ticket::where(function($query) {
                $query->where('id_estatus', '!=', 5)
                      ->orWhere(function($q) {
                          $q->where('id_estatus', 5)
                            ->whereMonth('created_at', now()->month)
                            ->whereYear('created_at', now()->year);
                      });
            })
            ->where('id_solicitante', Auth::user()->id_user)
            ->get();
        }else{
            $tabla = Ticket::where(function($query) {
                $query->where('id_estatus', '!=', 5)
                      ->orWhere(function($q) {
                          $q->where('id_estatus', 5)
                            ->whereMonth('created_at', now()->month)
                            ->whereYear('created_at', now()->year);
                      });
            })
            ->whereIn('id_sistema', $sistemasAcceso)->get();
        }
        $usuarios       = User::all();
        return view('principal',compact('clientes','departamentos','divisiones','incidencias','puestos','roles','sistemas','tabla','usuarios'));
        #dd($sistemas);
    }

    
    public function gsheets(Request $data){
        $datos = $data->get('data');
        $header = $datos['header'];
        $folios = $datos['body'];
        #$ruta = '\Users\alejandro.garcia\Documents\PHP\web\credentials.json';
        $ruta = base_path('credentials.json');
        
        foreach ($folios as &$fila) {
            foreach ($fila as &$valor) {
                if ($valor === null) {
                    $valor = "";
                }
            }
        }
        
        // Crea el cliente y autenticación
        $client = new Google_Client();
        $client->setAuthConfig($ruta);
        $token = Auth::user()->token_google; // Implementa tu propia función para cargar el token almacenado
        $client->setAccessToken($token);
        $service = new Sheets($client);
    
        // Crea la hoja de cálculo
        $spreadsheet = new Spreadsheet([
            'properties' => [
                'title' => 'Registro de folios'
            ]
        ]);
        $spreadsheet = $service->spreadsheets->create($spreadsheet);
        $fileId = $spreadsheet->spreadsheetId;
        // Divide los registros en lotes de 100
        
        $values = [$header];
        foreach ($folios as $filas) {
            $values [] = $filas;
        };
        $body = new ValueRange([
            'values' => $values
        ]);
        $params = [
            'valueInputOption' => 'RAW'
        ];
        $insert = [
            "insertDataOption" => "INSERT_ROWS"
        ];

        $result = $service->spreadsheets_values->append(
            $fileId,
            'Hoja 1',
            $body,
            $params,
            $insert
        );
        
        if ($result->error) {
            echo "Error: " . $result->error->message;
        } else {
            if ($result->updates->updatedRows > 0) {
                // Abre el archivo de Excel en el navegador
            
                $spreadsheetLink = "https://docs.google.com/spreadsheets/d/$fileId";
                if (stristr(PHP_OS, 'linux')) {
                    // Utiliza el comando xdg-open para abrir el enlace en el navegador predeterminado de Linux
                    exec("xdg-open \"$spreadsheetLink\"");
                } else {
                    // Maneja otros sistemas operativos aquí (por ejemplo, Windows)
                    // Puedes usar shell_exec u otros comandos según corresponda
                    // Por ejemplo, en Windows podrías usar "start" para abrir el enlace
                    shell_exec("start $spreadsheetLink");
                }
            
            }             
        }
        #dd($body,$datos['body'],$folios);
    
    }
}    