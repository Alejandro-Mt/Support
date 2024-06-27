<?php

use App\Http\Controllers\AccesoController;
use App\Http\Controllers\Catalogos\ClienteController;
use App\Http\Controllers\Catalogos\DepartamentoController;
use App\Http\Controllers\Catalogos\DivisionController;
use App\Http\Controllers\Catalogos\IncidenciaContoller;
use App\Http\Controllers\Catalogos\PuestoController;
use App\Http\Controllers\Catalogos\RolController;
use App\Http\Controllers\Catalogos\SistemaController;
use App\Http\Controllers\Catalogos\UsuarioController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Indicadores\ReporteContoller;
use App\Http\Controllers\Notificaciones\NotificacionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Soportes\RegistroController;
use App\Http\Controllers\Soportes\RegistroMasivoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


#Route::get('/', function () {return view('auth.login');});
Route::get('auth/google', [GoogleController::class,'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class,'handleGoogleCallback']);
Auth::routes();
auth::routes(['verify'=>true]);

#          Pagina Principal         #
Route::get('/', [HomeController::class, 'index'])->middleware('verified')->name('home');
Route::get('/principal',[HomeController::class, 'principal'])->middleware('auth')->name('principal');
Route::post('gsheets',[HomeController::class, 'gsheets'])->name('GSheet');
#          Perfil         #
Route::post('/profile', [ProfileController::class, 'update'])->name('Actualiza');
Route::get(substr(Crypt::encryptString('/profile'), 0, 3).'{id}', [ProfileController::class, 'edit'])->middleware('auth')->name('profile');
Route::post('user.pass',[ProfileController::class, 'updatepass'])->middleware('auth')->name('UsrPass');
Route::get('configuracion', [ProfileController::class, 'settings']);

##  Usuario "Accesos" ##
route::post('accesosS.{id_user}.{id_sistema}',[AccesoController::class, 'create'])->name('AcUser');
route::get('accesosS.update.{id_user}.{id_sistema}',[AccesoController::class, 'update'])->name('DAcUser');

#          Usuarios         #
Route::get('catalogo.usuario', [UsuarioController::class, 'store'])->middleware('auth')->name('UserAdmon');
#          Cliente         #
Route::post('cliente.nuevo', [ClienteController::class, 'create'])->name('NCliente');
Route::post('cliente.actualizar.{id_cliente}', [ClienteController::class, 'update'])->name('UCliente');
Route::delete('cliente.Borrar.{id_cliente}', [ClienteController::class, 'destroy'])->name('DCliente');
#          Departamento         #
Route::post('depto.nuevo', [DepartamentoController::class, 'create'])->name('NDepto');
Route::post('depto.actualizar.{id}', [DepartamentoController::class, 'update'])->name('UDepto');
Route::delete('depto.Borrar.{id}', [DepartamentoController::class, 'destroy'])->name('DDepto');
#          Incidencias         #
Route::post('incid.nuevo', [IncidenciaContoller::class, 'create'])->name('NIncidencia');
Route::post('incid.actualizar.{id}', [IncidenciaContoller::class, 'update'])->name('UIncidencia');
Route::delete('incid.Borrar.{id}', [IncidenciaContoller::class, 'destroy'])->name('DIncidencia');
#          Division         #
Route::post('div.nuevo', [DivisionController::class, 'create'])->name('NDivision');
Route::post('div.actualizar.{id_division}', [DivisionController::class, 'update'])->name('UDivision');
Route::delete('div.Borrar.{id_division}', [DivisionController::class, 'destroy'])->name('DDivision');
#          Puesto         #
Route::post('puesto.nuevo', [PuestoController::class, 'create'])->name('NPuesto'); 
Route::post('puesto.actualizar.{id_puesto}', [PuestoController::class, 'update'])->name('UPuesto');
Route::delete('puesto.Borrar.{id_puesto}', [PuestoController::class, 'destroy'])->name('DPuesto');
#          Rol         #
Route::post('rol.nuevo', [RolController::class, 'create'])->name('NRol'); 
Route::post('rol.actualizar.{id_puesto}', [RolController::class, 'update'])->name('URol');
Route::delete('rol.Borrar.{id_puesto}', [RolController::class, 'destroy'])->name('DRol');
#          Sistema         #
Route::post('sistema.nuevo', [SistemaController::class, 'create'])->name('NSistema');
Route::post('sistema.actualizar.{id_sistema}', [SistemaController::class, 'update'])->name('USistema');
Route::delete('sistema.Borrar.{id_sistema}', [SistemaController::class, 'destroy'])->name('DSistema');
#          Usuario         #
Route::post('usuario.nuevo', [UsuarioController::class, 'create'])->name('NUsuario');
Route::post('usuario.actualizar.{id_usuario}', [UsuarioController::class, 'update'])->name('UUsuario');
Route::delete('usuario.Borrar.{id_usuario}', [UsuarioController::class, 'destroy'])->name('DUsuario');

Route::get('registro',[RegistroController::class,'index'])->middleware('auth')->name('Formulario_Soporte');
Route::post('soporte.create',[RegistroController::class,'create'])->name('Reg_Sop');
Route::get('seguimiento.{folio}',[RegistroController::class,'edit'])->middleware('auth')->name('Seguimiento_Soporte');
Route::post('soporte.edit.{folio}',[RegistroController::class,'update'])->name('Seg_Sop');
Route::post('soporte.documentacion.{folio}',[RegistroController::class, 'store'])->name('Documentacion');
Route::delete('file.borrar.{id}', [RegistroController::class, 'destroyF'])->name('DFile');
Route::get('carga.masiva',[RegistroMasivoController::class,'index'])->middleware('auth')->name('CM');
Route::post('soporte.excel',[RegistroMasivoController::class, 'store'])->name('Importar');
Route::post('soporte.registro.masivo',[RegistroMasivoController::class,'create'])->name('RM');
Route::get('descargable',[ReporteContoller::class,'create'])->middleware('auth')->name('Reporte');
Route::get('notificacion.vista.{folio}',[NotificacionController::class, 'edit'])->middleware('auth')->name('Visto');
//Route::get(substr(Crypt::encryptString('preregistro.datos'), 80, 5).'{folio}',[PreregistroController::class, 'show'])->name('AA');
//route::get(substr(Crypt::encryptString('requerimiento.nuevo'), 85, 5).'{folio}',[PreregistroController::class, 'edit'])->name('NR');