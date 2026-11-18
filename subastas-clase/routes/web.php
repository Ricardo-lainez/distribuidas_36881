<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubastaController;

Route::get('/', function () {
    // return view('welcome');

    $nodo = gethostname();

    try {
        $version = DB::scalar('select version()');
        $estadoDb = 'Funcionando: ' . $version;
    } catch (\Throwable $e) {
        $estadoDb = 'Caido: ' . $e->getMessage();
    }

    return "Servidor web (app): funcionando en el nodo $nodo <br><br>" . "Base de datos (db): $estadoDb";
});

Route::get('/subastas', [SubastaController::class, 'index']);
Route::post('/subastas/{subasta}/pujar', [SubastaController::class, 'pujar']);

Route::get('/sala', function () { 
return view('sala'); 
}); 