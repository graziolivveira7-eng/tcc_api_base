@include('partials.header', ['title' => 'MenuCity - Encontre e Cadastre Restaurantes'])

<!-- Hero Section -->
<header class="hero-section">
    <div class="container hero-grid">
        <div class="hero-content">
            <h1>Descubra os melhores sabores em <span>sua cidade</span></h1>
            <p>O MenuCity ajuda você a encontrar os restaurantes mais bem avaliados ou a cadastrar seu próprio estabelecimento para atrair novos clientes famintos. Tudo em uma plataforma moderna e intuitiva.</p>
            <div class="hero-actions">
                <a href="/cadastrar-restaurante" class="btn btn-primary"><i class="fa-solid fa-plus" style="margin-right: 8px;"></i> Cadastrar Meu Restaurante</a>
                <a href="#buscar" class="btn btn-secondary"><i class="fa-solid fa-magnifying-glass" style="margin-right: 8px;"></i> Buscar Cidades</a>
            </div>
        </div>
        <div class="hero-image" style="display: flex; justify-content: center;">
            <!-- Simple CSS illustration of a plate/restaurant theme to avoid missing image breaks -->
            <div style="width: 320px; height: 320px; border-radius: 50%; background: linear-gradient(135deg, var(--primary) 0%, #f97316 100%); display: flex; align-items: center; justify-content: center; box-shadow: var(--shadow-lg); border: 15px solid white;">
                <i class="fa-solid fa-utensils" style="font-size: 8rem; color: white;"></i>
            </div>
        </div>
    </div>
</header>

<!-- Features section -->
<section class="container" style="padding: 5rem 0 2rem;">
    <h2 class="section-title">Como o <span>MenuCity</span> funciona?</h2>
    
    <div class="cards-grid">
        <!-- Card 1 -->
        <article class="card">
            <div class="card-icon"><i class="fa-solid fa-store"></i></div>
            <h3 class="card-title">Para Restaurantes</h3>
            <p class="card-desc">Crie um perfil completo para o seu restaurante, adicione a categoria culinária, telefone de contato e endereço integrado para que os clientes locais possam te encontrar.</p>
        </article>

        <!-- Card 2 -->
        <article class="card">
            <div class="card-icon"><i class="fa-solid fa-users"></i></div>
            <h3 class="card-title">Para Clientes</h3>
            <p class="card-desc">Navegue pelas listagens, descubra novas categorias como Italiana, Japonesa ou Hambúrgueres, e confira avaliações reais sobre a qualidade dos pratos.</p>
        </article>

        <!-- Card 3 -->
        <article class="card">
            <div class="card-icon"><i class="fa-solid fa-map-location-dot"></i></div>
            <h3 class="card-title">API do IBGE Integrada</h3>
            <p class="card-desc">Nossa plataforma utiliza a API oficial de Localidades do IBGE. Isso garante que a seleção de estados e cidades no cadastro seja precisa e atualizada em tempo real.</p>
        </article>
    </div>
</section>

<!-- Search Section (IBGE Integration) -->
<section id="buscar" class="container">
    <div class="search-section">
        <h2><i class="fa-solid fa-map-pin"></i> Explore Restaurantes por Localidade</h2>
        <p style="text-align: center; color: #cbd5e1; margin-bottom: 2rem; margin-top: -1rem;">Selecione um estado e cidade carregados diretamente da API oficial do IBGE.</p>
        
        <div class="search-grid">
            <div class="form-group">
                <label for="search-estado">Estado (UF)</label>
                <select id="search-estado" class="form-control">
                    <option value="">Carregando estados...</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="search-cidade">Cidade</label>
                <select id="search-cidade" class="form-control" disabled>
                    <option value="">Selecione um estado primeiro</option>
                </select>
            </div>
            
            <button id="btn-buscar-restaurantes" class="btn-search">
                <i class="fa-solid fa-magnifying-glass" style="margin-right: 8px;"></i> Buscar Restaurantes
            </button>
        </div>

        <!-- Dynamic Results Panel -->
        <div id="results-panel" class="results-box">
            <h3 style="color: white; margin-bottom: 1rem; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 0.5rem;" id="results-title">
                Restaurantes Encontrados
            </h3>
            <div id="results-list" class="results-list">
                <!-- Will be populated via JS -->
            </div>
        </div>
    </div>
</section>

<!-- Script for IBGE API in Home -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const estadoSelect = document.getElementById('search-estado');
    const cidadeSelect = document.getElementById('search-cidade');
    const btnBuscar = document.getElementById('btn-buscar-restaurantes');
    const resultsPanel = document.getElementById('results-panel');
    const resultsList = document.getElementById('results-list');
    const resultsTitle = document.getElementById('results-title');

    // Load states from IBGE API
    fetch('https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome')
        .then(response => response.json())
        .then(estados => {
            estadoSelect.innerHTML = '<option value="">Selecione um Estado</option>';
            estados.forEach(estado => {
                const option = document.createElement('option');
                option.value = estado.sigla;
                option.dataset.id = estado.id;
                option.textContent = `${estado.nome} (${estado.sigla})`;
                estadoSelect.appendChild(option);
            });
        })
        .catch(err => {
            console.error('Erro ao carregar estados do IBGE:', err);
            estadoSelect.innerHTML = '<option value="">Erro ao carregar. Tente atualizar.</option>';
        });

    // Load cities based on selected state
    estadoSelect.addEventListener('change', function() {
        const selectedOption = estadoSelect.options[estadoSelect.selectedIndex];
        const stateSigla = estadoSelect.value;
        
        if (!stateSigla) {
            cidadeSelect.innerHTML = '<option value="">Selecione um estado primeiro</option>';
            cidadeSelect.disabled = true;
            return;
        }

        cidadeSelect.disabled = true;
        cidadeSelect.innerHTML = '<option value="">Carregando cidades...</option>';

        fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${stateSigla}/municipios?orderBy=nome`)
            .then(response => response.json())
            .then(cidades => {
                cidadeSelect.innerHTML = '<option value="">Selecione uma Cidade</option>';
                cidades.forEach(cidade => {
                    const option = document.createElement('option');
                    option.value = cidade.nome;
                    option.textContent = cidade.nome;
                    cidadeSelect.appendChild(option);
                });
                cidadeSelect.disabled = false;
            })
            .catch(err => {
                console.error('Erro ao carregar cidades do IBGE:', err);
                cidadeSelect.innerHTML = '<option value="">Erro ao carregar cidades</option>';
            });
    });

    // Simulate search from local state/city
    btnBuscar.addEventListener('click', function() {
        const estado = estadoSelect.value;
        const cidade = cidadeSelect.value;

        if (!estado || !cidade) {
            alert('Por favor, selecione o Estado e a Cidade para buscar.');
            return;
        }

        // Show loading simulation
        resultsList.innerHTML = '<div style="color: white; text-align: center; grid-column: span 3; padding: 2rem;"><i class="fa-solid fa-spinner fa-spin" style="font-size: 2rem; margin-bottom: 10px;"></i><p>Consultando banco de dados...</p></div>';
        resultsPanel.classList.add('active');
        resultsTitle.textContent = `Restaurantes em ${cidade} - ${estado}`;

        // Wait 800ms to simulate network request and load mock results
        setTimeout(() => {
            // Generate some random simulated restaurants for the selected city
            const categories = ['Pizzaria', 'Hambúrguer Gourmet', 'Churrascaria', 'Comida Japonesa', 'Comida Mineira', 'Cafeteria & Bistrô'];
            const names = ['Espaço Sabor', 'Divino Prato', 'Cantinho Gaúcho', 'Bella Itália', 'Estrela do Mar', 'Chef Gourmet', 'Estação Lanches'];
            
            const results = [];
            const count = Math.floor(Math.random() * 3) + 2; // 2 to 4 results

            for (let i = 0; i < count; i++) {
                const name = names[Math.floor(Math.random() * names.length)] + ' ' + (i + 1);
                const category = categories[Math.floor(Math.random() * categories.length)];
                const rating = (Math.random() * (5.0 - 4.0) + 4.0).toFixed(1);
                
                results.push({
                    nome: name,
                    categoria: category,
                    cidade: cidade,
                    estado: estado,
                    avaliacao: rating,
                    telefone: `(${Math.floor(Math.random() * 89) + 10}) 9${Math.floor(Math.random() * 8999) + 1000}-${Math.floor(Math.random() * 8999) + 1000}`
                });
            }

            resultsList.innerHTML = '';
            results.forEach(res => {
                const item = document.createElement('article');
                item.className = 'result-item';
                item.innerHTML = `
                    <h4 style="color: white; font-size: 1.15rem; margin-bottom: 0.3rem;"><i class="fa-solid fa-utensils" style="color: var(--primary); margin-right: 5px;"></i> ${res.nome}</h4>
                    <p style="color: #94a3b8; font-size: 0.85rem; margin: 0.2rem 0;"><i class="fa-solid fa-tags"></i> Categoria: <strong>${res.categoria}</strong></p>
                    <p style="color: #94a3b8; font-size: 0.85rem; margin: 0.2rem 0;"><i class="fa-solid fa-phone"></i> Contato: ${res.telefone}</p>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 0.8rem;">
                        <span style="font-size: 0.85rem; color: #cbd5e1;"><i class="fa-solid fa-location-dot"></i> ${res.cidade} (${res.estado})</span>
                        <span style="background: #fffbeb; color: #b45309; padding: 0.1rem 0.5rem; border-radius: 4px; font-size: 0.8rem; font-weight: 700;">
                            <i class="fa-solid fa-star" style="color: #f59e0b;"></i> ${res.avaliacao}
                        </span>
                    </div>
                `;
                resultsList.appendChild(item);
            });
        }, 800);
    });
});
</script>

@include('partials.footer')
