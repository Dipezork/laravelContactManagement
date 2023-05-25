<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;


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
    return view('login');
});

// Rota para exibir o formulário de cadastro
Route::get('/cadastro', [RegisterController::class, 'showRegistrationForm'])->name('showRegistrationForm');

// Rota para processar o formulário de cadastro
Route::post('/cadastro', [RegisterController::class, 'register'])->name('register');

// Rota para exibir formulario de login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');



Route::middleware('web')->group(function () {
    // Rotas de autenticação
   // Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
   Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    // Outras rotas de autenticação...
});

Route::middleware('auth')->group(function () {

    //Listagem
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

    //Criação de contato
    Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
    Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

    //Detalhes
    Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('contacts.show');

    //Edição e exclusão
    Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::put('/contacts/{id}', [ContactController::class, 'update'])->name('contacts.update');
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
});
