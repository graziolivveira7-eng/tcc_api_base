<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'MenuCity - Cadastro de Restaurantes' }}</title>
    <link rel="stylesheet" href="/css/menucity.css">
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <!-- Navbar Premium -->
    <nav class="navbar">
        <div class="container navbar-container">
            <a href="/" class="logo">
                <i class="fa-solid fa-utensils"></i> Menu<span>City</span>
            </a>
            
            <ul class="nav-links">
                <li><a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}"><i class="fa-solid fa-house"></i> Início</a></li>
                <li><a href="/quem-somos" class="nav-link {{ request()->is('quem-somos') ? 'active' : '' }}"><i class="fa-solid fa-circle-info"></i> Quem Somos</a></li>
                <li><a href="/contato" class="nav-link {{ request()->is('contato') ? 'active' : '' }}"><i class="fa-solid fa-envelope"></i> Contato</a></li>
                <li><a href="/api/status" target="_blank" class="nav-link"><i class="fa-solid fa-server"></i> API Status</a></li>
                <li><a href="/login" class="nav-link {{ request()->is('login') ? 'active' : '' }}"><i class="fa-solid fa-right-to-bracket"></i> Entrar</a></li>
                <li><a href="/cadastrar-restaurante" class="btn btn-nav"><i class="fa-solid fa-plus"></i> Cadastrar Restaurante</a></li>
            </ul>
        </div>
    </nav>
