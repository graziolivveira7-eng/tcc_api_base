@include('partials.header', ['title' => 'Quem Somos - MenuCity'])

<section class="container about-section">
    <div class="about-grid">
        <div class="about-img-container">
            <!-- Simplified beautiful CSS card illustration instead of missing image files -->
            <div style="background: linear-gradient(135deg, var(--secondary) 0%, #1e293b 100%); padding: 4rem 2rem; border-radius: var(--radius-lg); box-shadow: var(--shadow-lg); text-align: center; color: white;">
                <i class="fa-solid fa-clock-rotate-left" style="font-size: 5rem; color: var(--primary); margin-bottom: 1.5rem;"></i>
                <h3 style="color: white; font-size: 1.8rem; margin-bottom: 0.5rem;">Desde 2026</h3>
                <p style="color: #94a3b8;">Conectando paladares e impulsionando negócios locais.</p>
            </div>
            
            <div class="about-badge">
                <h3>100%</h3>
                <p>Nacional e Gratuito</p>
            </div>
        </div>
        
        <div class="about-content">
            <h2>Nossa <span>História</span></h2>
            <p>O <strong>MenuCity</strong> nasceu em 2026 a partir do desafio enfrentado por pequenos empresários da gastronomia de divulgarem seus cardápios e estabelecimentos de forma simplificada na internet.</p>
            
            <p>Como projeto de TCC para o curso de tecnologia, idealizamos uma plataforma onde donos de restaurantes (sejam eles pizzarias familiares, food trucks ou grandes buffets) pudessem cadastrar seus próprios estabelecimentos, inserindo informações essenciais para o cliente, tudo com um design acolhedor e integrando dados demográficos do IBGE para facilitar a busca local.</p>

            <p>Acreditamos que a comida conecta pessoas e que o acesso digital deve ser descomplicado e direto, servindo tanto para quem quer cadastrar e gerir seu restaurante quanto para quem quer apenas descobrir o que comer perto de casa.</p>
        </div>
    </div>
</section>

<!-- Values Grid Section -->
<section class="container" style="padding: 2rem 0 6rem;">
    <h2 class="section-title" style="margin-bottom: 2.5rem;">Nossos <span>Pilares</span></h2>
    
    <div class="cards-grid">
        <article class="card">
            <div class="card-icon"><i class="fa-solid fa-bullseye"></i></div>
            <h3 class="card-title">Missão</h3>
            <p class="card-desc">Proporcionar visibilidade digital gratuita para pequenos e médios restaurantes, facilitando a vida dos clientes na busca local por refeições de qualidade.</p>
        </article>

        <article class="card">
            <div class="card-icon"><i class="fa-solid fa-eye"></i></div>
            <h3 class="card-title">Visão</h3>
            <p class="card-desc">Tornar-se a referência em diretórios gastronômicos locais para cidades de médio e pequeno porte, expandindo a integração com serviços públicos de geolocalização.</p>
        </article>

        <article class="card">
            <div class="card-icon"><i class="fa-solid fa-heart"></i></div>
            <h3 class="card-title">Valores</h3>
            <p class="card-desc">Valorização do comércio e cultura culinária local, acessibilidade tecnológica, transparência nas avaliações e simplicidade nas operações do usuário.</p>
        </article>
    </div>
</section>

@include('partials.footer')
