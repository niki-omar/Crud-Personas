<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use app\Http\Controllers\PersonaController;
use app\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
                // LAS RUTAS FUNCIONAN DE LA SIGUIENTE MANERA
                // PRIMERO SE CARGA EL METODO, EN EL CASO DE HOMECONTROLLER
                // CARGA PRIMERO EL METODO GET, DE AHI SIGUE LO QUE VA A CARGAR, EN ESTE CASO
                // SERIA LA VISTA HOME. SI ESTUVIERA SOLO UN / CARGARIA LA RAIZ.
                // despues sigue la RUTA del controlador, esta nos especificara que es lo
                // que vamos a cargar, en este caso el index

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::apiResource ('/personas',PersonaController::class);
Route::apiResource('/personas', App\Http\Controllers\PersonaController::class);
Route::resource('/telefonos', App\Http\Controllers\TelefonoController::class);
