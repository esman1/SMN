<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\AsigaperController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\PuestoController;
use App\Http\COntrollers\AsigsucController;
use App\Http\Controllers\PDFController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/generar-pdf/{id}', [PDFController::class, 'generarPDF'])->name('pdf.generar');


Route::resources([
    'roles' => RoleController::class,
    'users' => UserController::class,
    'empleado' => EmpleadoController::class,
    'stock' => StockController::class,
    'asigaper'=> AsigaperController::class, 
    'departamento' => DepartamentoController::class, 
    'sucursal' => SucursalController::class,
    'puesto' => PuestoController::class,
    'asigsuc' => AsigsucController::class
]); 