<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes - MenuCity
|--------------------------------------------------------------------------
|
| Aqui definimos as rotas para a API do MenuCity. Estas rotas são
| prefixadas automaticamente com "/api" pelo Laravel.
| Todas as respostas são estruturadas em JSON de forma simples e didática.
|
*/

/**
 * Rota 1: GET /api/status
 * Objetivo: Verificar se a API está online e mostrar as configurações do ambiente.
 */
Route::get('/status', function () {
    return response()->json([
        'status' => 'online',
        'sistema' => 'MenuCity - Cadastro de Restaurantes',
        'descricao' => 'API de suporte para o TCC de cadastro de restaurantes.',
        'versao' => '1.0.0',
        'ambiente_offline' => [
            'informacao' => 'O sistema está rodando sem banco de dados externo (MySQL/PostgreSQL) para facilidade de desenvolvimento local.',
            'drivers_ativos' => [
                'SESSION_DRIVER' => env('SESSION_DRIVER', 'file'),
                'CACHE_STORE' => env('CACHE_STORE', 'file'),
                'QUEUE_CONNECTION' => env('QUEUE_CONNECTION', 'sync')
            ]
        ]
    ], 200, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
});

/**
 * Rota 2: GET /api/restaurantes
 * Objetivo: Listar todos os restaurantes cadastrados no sistema (exemplo de dados/mock).
 */
Route::get('/restaurantes', function () {
    return response()->json([
        [
            'id' => 1,
            'nome' => 'Cantina di Napoli',
            'categoria' => 'Italiana',
            'estado' => 'SP',
            'cidade' => 'São Paulo',
            'endereco' => 'Rua das Massas, 123 - Bixiga',
            'telefone' => '(11) 98765-4321',
            'descricao' => 'Massas artesanais feitas na hora e tradicionais pizzas no forno a lenha.',
            'avaliacao' => 4.8
        ],
        [
            'id' => 2,
            'nome' => 'Burger Monster',
            'categoria' => 'Hamburgueria',
            'estado' => 'MG',
            'cidade' => 'Belo Horizonte',
            'endereco' => 'Av. dos Hambúrgueres, 456 - Savassi',
            'telefone' => '(31) 99876-5432',
            'descricao' => 'Hambúrgueres artesanais grelhados no fogo forte, com molhos especiais da casa.',
            'avaliacao' => 4.6
        ],
        [
            'id' => 3,
            'nome' => 'Sushi Master',
            'categoria' => 'Japonesa',
            'estado' => 'RJ',
            'cidade' => 'Rio de Janeiro',
            'endereco' => 'Rua do Peixe Fresco, 789 - Copacabana',
            'telefone' => '(21) 97654-3210',
            'descricao' => 'Combinados tradicionais e contemporâneos feitos por sushimen experientes.',
            'avaliacao' => 4.7
        ]
    ], 200, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
});

/**
 * Rota 3: GET /api/categorias
 * Objetivo: Obter as categorias de comida disponíveis para os restaurantes.
 */
Route::get('/categorias', function () {
    return response()->json([
        [
            'id' => 1,
            'nome' => 'Italiana',
            'slug' => 'italiana',
            'icone' => '🍝',
            'quantidade_restaurantes' => 1
        ],
        [
            'id' => 2,
            'nome' => 'Hamburgueria',
            'slug' => 'hamburgueria',
            'icone' => '🍔',
            'quantidade_restaurantes' => 1
        ],
        [
            'id' => 3,
            'nome' => 'Japonesa',
            'slug' => 'japonesa',
            'icone' => '🍣',
            'quantidade_restaurantes' => 1
        ],
        [
            'id' => 4,
            'nome' => 'Brasileira',
            'slug' => 'brasileira',
            'icone' => '🍲',
            'quantidade_restaurantes' => 0
        ],
        [
            'id' => 5,
            'nome' => 'Doces & Sobremesas',
            'slug' => 'doces-sobremesas',
            'icone' => '🍰',
            'quantidade_restaurantes' => 0
        ]
    ], 200, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
});

/**
 * Rota 4: GET /api/destaques
 * Objetivo: Retornar o restaurante destaque da semana ou com as melhores avaliações.
 */
Route::get('/destaques', function () {
    return response()->json([
        'periodo' => 'Destaques da Semana',
        'atualizado_em' => date('Y-m-d'),
        'restaurante' => [
            'id' => 1,
            'nome' => 'Cantina di Napoli',
            'motivo' => 'Eleito o melhor restaurante de massas pelos usuários com avaliação média de 4.8 estrelas!',
            'cupom_desconto' => 'NAPOLI10'
        ]
    ], 200, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
});
