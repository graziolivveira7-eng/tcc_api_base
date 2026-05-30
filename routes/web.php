<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - MenuCity
|--------------------------------------------------------------------------
|
| Aqui registramos as rotas da interface web do MenuCity. Cada rota
| renderiza um template Blade separado correspondente às telas solicitadas.
|
*/

// Página Inicial
Route::get('/', function () {
    return view('home');
});

// Página Quem Somos
Route::get('/quem-somos', function () {
    return view('about');
});

// Página de Contato
Route::get('/contato', function () {
    return view('contact');
});

// Página de Login (Google Auth Mock)
Route::get('/login', function () {
    return view('login');
});

// Página de Cadastro de Restaurante (com integração da API do IBGE)
Route::get('/cadastrar-restaurante', function () {
    return view('register-restaurant');
});
