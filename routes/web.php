<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Seccion_clientes\DireccionController;
use App\Http\Controllers\Seccion_clientes\ClienteController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/', 'home')->name('Home');

Route::get('/direcciones', [DireccionController::class, 'index'])->name('direcciones.index'); 
Route::get('/direccion', [DireccionController::class, 'show'])->name('direccion.show');
Route::post('/direccion/guardar', [DireccionController::class, 'save'])->name('direccion.save');
Route::post('/direccion/{direccionId}/actualizar', [DireccionController::class, 'update'])->name('direccion.update');
Route::get('/direccion/eliminar/{direccionId}', [DireccionController::class, 'delete'])->name('direccion.delete');

Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/cliente/{clienteId}', [ClienteController::class, 'getOne'])->name('cliente.show');
Route::post('/cliente/guardar', [ClienteController::class, 'save'])->name('cliente.save');
Route::get('/cliente/guardar/{clienteId}', [ClienteController::class, 'save'])->name('cliente.fillUpdateView');
Route::post('/cliente/{clienteId}/actualizar', [ClienteController::class, 'update'])->name('cliente.update');
Route::get('/cliente/eliminar/{clienteId}', [ClienteController::class, 'delete'])->name('cliente.delete');

Route::view('ejercicio4', 'Ejercicios_JavaScript\ejercicio4')->name('ejercicio#4');
Route::view('ejercicio5', 'Ejercicios_JavaScript\ejercicio5')->name('ejercicio#5');
Route::get('/clientesjson', [ClienteController::class, 'getjson'])->name('consulta.json'); 
Route::get('/clientesxml', [ClienteController::class, 'getxml'])->name('consulta.xml'); 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
