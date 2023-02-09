<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Models\SalesCommission;
use Illuminate\Support\Facades\Route;
use OpenAI\Laravel\Facades\OpenAI;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/clients', ClientController::class);

    Route::get('/chart', function () {
        $fields = implode(',',SalesCommission::getColumns());

        $question = 'Gere um gráfico das vendas por empresa no eixo y ao longo dos últimos 5 anos';

        $config =  OpenAI::completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => "Considerando a lista de campos ($fields), gere uma configuração json do Vega-lite v5 (sem campo de dados e com descrição) que atenda o seguinte pedido $question. Resposta:",
            'max_tokens' => 1500
        ])->choices[0]->text;

        return $config;
    });
});

require __DIR__.'/auth.php';
