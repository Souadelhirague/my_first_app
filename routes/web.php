<?php
use App\Http\Controllers\CategoryController;
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

Route::resource('categories', CategoryController::class);
Route::resource('tables', 'App\Http\Controllers\TableController');
Route::resource('serveurs','App\Http\Controllers\ServantsController');
Route::resource('menus','App\Http\Controllers\MenuController');
Route::resource('sales','App\Http\Controllers\SalesController');
Route::get('payments','App\Http\Controllers\PaymentController@index')->name('payments.index');
Route::get('reports','App\Http\Controllers\ReportController@index')->name('reports.index');
Route::post('reports/generate','App\Http\Controllers\ReportController@generate')->name('reports.generate');
Route::post('reports/export','App\Http\Controllers\ReportController@export')->name('reports.export');

//si le serveur n'arrive pas a connaitre le controller 
//c'est mieux d'utliliser cette façon pour le guidé vers le chemin exact
// Route::get('/post/create', [PostController::class, 'create']);
// Route::post('/post', [PostController::class, 'store'])
// Auth::routes([register => falses ,reset=>false]) pour désactiver register