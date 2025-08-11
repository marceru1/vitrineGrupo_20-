<?php
use App\Models\Imagem;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImagemController;

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


Route::redirect('/', '/login');

// Rota principal do dashboard
Route::get('/dashboard', [ImagemController::class, 'galeria'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rota para pagar a imagem.
Route::delete('/imagens/{id}', [ImagemController::class, 'destroy'])->name('imagens.destroy');

// Recebe os dados do formulário para salvar uma nova imagem.
Route::post('/events', [ImagemController::class, 'store']);


require __DIR__.'/auth.php';

// Rota extra para o carrossel, para listar as imagens em outro formato.
Route::get('/imagens/carrossel', [ImagemController::class, 'listarImagens']);
