<?php

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Soportes\RegistroController;
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

#          Catalogo         #
Route::get('/layouts.datos', [MenuController::class, 'store'])->middleware('auth')->name('Seguir');
#          Cliente         #
#Route::post('cliente.nuevo', [ClienteController::class, 'create'])->name('NCliente');
#Route::post('cliente.actualizar.{id_cliente}', [ClienteController::class, 'update'])->name('UCliente');
#Route::delete('cliente.Borrar.{id_cliente}', [ClienteController::class, 'destroy'])->name('DCliente');
#          Puesto         #
Route::post('puesto.nuevo', [PuestoController::class, 'create'])->name('NPuesto');
Route::post('puesto.actualizar.{id_puesto}', [PuestoController::class, 'update'])->name('UPuesto');
Route::delete('puesto.Borrar.{id_puesto}', [PuestoController::class, 'destroy'])->name('DPuesto');
#          Sistema         #
Route::post('sistema.nuevo', [SistemaController::class, 'create'])->name('NSistema');
Route::post('sistema.actualizar.{id_sistema}', [SistemaController::class, 'update'])->name('USistema');
Route::delete('sistema.Borrar.{id_sistema}', [SistemaController::class, 'destroy'])->name('DSistema');

Route::get('registro',[RegistroController::class,'index'])->name('Formulario_Soporte');
Route::post('soporte.create',[RegistroController::class,'create'])->name('Reg_Sop');
Route::get(substr(Crypt::encryptString('preregistro.datos'), 80, 5).'{folio}',[PreregistroController::class, 'show'])->name('AA');
route::get(substr(Crypt::encryptString('requerimiento.nuevo'), 85, 5).'{folio}',[PreregistroController::class, 'edit'])->name('NR');