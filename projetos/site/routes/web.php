<?php

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
    return "<center><h1>Oi Fatec Araras</h1></center>";
});
Route::get('/laravel', function () {
    return view('welcome');
});
Route::get('/orlando', function () {
    return "<center><h1>Melhor professor !</h1></center>";
});
Route::get('/ola/{nome?}', function($nome=null){
    if (isset($nome)) {
        return 'Olá '.$nome.'<br>';
    } else {
        return 'Olá anônimo';
    }
});

Route::get('/rotascomregras/{nome}/{n}', function($nome, $n){
    for($x=0;$x<$n;$x++){
        echo "Olá $nome <br>";
    }
})->where('nome','[A-Za-z]+')->where('n','[0-9]+');

Route::prefix('/app')->group(function(){
    Route::get('/', function () {
        return 'View App Index';
    })->name('app');
    Route::get('/user', function () {
        return '<center>View App User</center>';
    })->name('app.user');;
    Route::get('/profile', function () {
        return '<center>View App Profile</center>';
    })->name('app.profile');;
});

Route::redirect('bla','app', 301);

Route::get('bla1', function() {
    return redirect()->route('app');
});

use App\Http\Controllers\TaskController;
Route::get('/1', [TaskController::class, 'home']);
Route::get('/2', [TaskController::class, 'home2']);

use App\Http\Controllers\ClienteController;
Route::resource('cliente', ClienteController::class);