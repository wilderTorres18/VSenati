<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DefaultJobController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeRoleController;
use App\Http\Controllers\MachineryController;
use App\Http\Controllers\MachineryMaintenanceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\GrossProfitPerDayController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\HomeController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//ruta de multiroles y pagina principal


//rutas de admin
Route::middleware('admin')->group(function () {
  Route::resource('machineries',MachineryController::class);

  Route::resource('machineries-mant',MachineryMaintenanceController::class);

  Route::resource('employees',EmployeeController::class);
});


//Route::get('/employee-roles',[EmployeeRoleController::class,'index']);

Route::get('/payment-method',[PaymentMethodController::class,'index']);

//Rutas cualquier usuario registrado
Route::middleware('auth')->group(function () {

  Route::resource('vehicles',VehicleController::class);

  Route::resource('jobs',JobController::class);

  Route::resource('/default-jobs',DefaultJobController::class);

  Route::get('home',[HomeController::class,'redirect'])->name('home');
});
//Route::get('/user-roles',[UserRoleController::class,'index']);

//Route::get('/profits',[GrossProfitPerDayController::class,'index']);



Route::controller(PaymentController::class)->group(function () {
    Route::get('/payments','index');
    Route::post('/payments/create','create');
});
