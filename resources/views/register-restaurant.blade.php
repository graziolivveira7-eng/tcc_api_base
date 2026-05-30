@include('partials.header', ['title' => 'Cadastrar Restaurante - MenuCity'])

<main class="container" style="padding: 2rem 0 5rem;">
    <div class="form-container light-form">
        <h2>Cadastrar <span>Restaurante</span></h2>
        <p>Preencha os dados abaixo para divulgar seu restaurante no MenuCity e atrair clientes.</p>

        <!-- Success Message Toast/Alert -->
        <div id="register-success" class="alert-success" style="display: none;">
            <i class="fa-solid fa-circle-check" style="margin-right: 8px;"></i>
            Restaurante cadastrado com sucesso na base local do MenuCity!
        </div>

        <form id="restaurant-form" onsubmit="handleRegisterSubmit(event)">
            <div class="form-grid">
                
                <!-- Restaurant Name -->
                <div class="form-group form-span-2">
                    <label for="rest-nome">Nome do Restaurante</label>
                    <input type="text" id="rest-nome" class="form-control" placeholder="Ex: Pizzaria Bella Itália" required>
                </div>

                <!-- Culinary Category -->
                <div class="form-group">
                    <label for="rest-categoria">Categoria Culinária</label>
                    <select id="rest-categoria" class="form-control" required>
                        <option value="">Selecione uma Categoria</option>
                        <option value="Italiana">Italiana (Massas/Pizzas)</option>
                        <option value="Hamburgueria">Hamburgueria (Artesanal/Lanches)</option>
                        <option value="Japonesa">Japonesa (Sushi/Temaki)</option>
                        <option value="Brasileira">Brasileira (Churrascaria/Self-service)</option>
                        <option value="Doces e Sobremesas">Doces e Sobremesas</option>
                    </select>
                </div>

                <!-- Contact Phone -->
                <div class="form-group">
                    <label for="rest-telefone">Telefone de Contato</label>
                    <input type="tel" id="rest-telefone" class="form-control" placeholder="Ex: (11) 99876-5432" required>
                </div>

                <!-- State (UF) - DYNAMIC IBGE -->
                <div class="form-group">
                    <label for="rest-estado">Estado (UF)</label>
                    <select id="rest-estado" class="form-control" required>
                        <option value="">Carregando estados...</option>
                    </select>
                </div>

                <!-- City - DYNAMIC IBGE -->
                <div class="form-group">
                    <label for="rest-cidade">Cidade</label>
                    <select id="rest-cidade" class="form-control" required disabled>
                        <option value="">Selecione o estado primeiro</option>
                    </select>
                </div>

                <!-- Address -->
                <div class="form-group form-span-2">
                    <label for="rest-endereco">Endereço Completo (Rua, Número, Bairro)</label>
                    <input type="text" id="rest-endereco" class="form-control" placeholder="Ex: Rua das Flores, 123 - Centro" required>
                </div>

                <!-- Description -->
                <div class="form-group form-span-2">
                    <label for="rest-descricao">Descrição Curta (Especialidades e diferenciais)</label>
                    <textarea id="rest-descricao" class="form-control" rows="4" placeholder="Fale um pouco sobre o cardápio, ambiente ou horários..." style="resize: vertical; font-family: inherit;" required></textarea>
                </div>

                <!-- Submit Button -->
                <div class="form-span-2" style="margin-top: 1.5rem;">
                    <button type="submit" class="btn btn-primary" style="width: 100%; height: 50px;">
                        <i class="fa-solid fa-cloud-arrow-up" style="margin-right: 8px;"></i> Concluir Cadastro do Restaurante
                    </button>
                </div>

            </div>
        </form>
    </div>
</main>

<!-- IBGE API integration script and form submit handler -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const estadoSelect = document.getElementById('rest-estado');
    const cidadeSelect = document.getElementById('rest-cidade');

    // 1. Fetch states from IBGE Localidades API
    fetch('https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome')
        .then(response => response.json())
        .then(estados => {
            estadoSelect.innerHTML = '<option value="">Selecione um Estado</option>';
            estados.forEach(estado => {
                const option = document.createElement('option');
                // We use sigla as values (like SP, MG, RJ)
                option.value = estado.sigla;
                option.textContent = `${estado.nome} (${estado.sigla})`;
                estadoSelect.appendChild(option);
            });
        })
        .catch(err => {
            console.error('Erro ao buscar estados do IBGE:', err);
            estadoSelect.innerHTML = '<option value="">Erro ao carregar estados</option>';
        });

    // 2. Fetch cities from IBGE on State select change
    estadoSelect.addEventListener('change', function() {
        const selectedState = estadoSelect.value;

        if (!selectedState) {
            cidadeSelect.innerHTML = '<option value="">Selecione o estado primeiro</option>';
            cidadeSelect.disabled = true;
            return;
        }

        cidadeSelect.disabled = true;
        cidadeSelect.innerHTML = '<option value="">Carregando cidades...</option>';

        fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${selectedState}/municipios?orderBy=nome`)
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
                console.error('Erro ao buscar cidades do IBGE:', err);
                cidadeSelect.innerHTML = '<option value="">Erro ao carregar cidades</option>';
            });
    });
});

// 3. Form submission simulation
function handleRegisterSubmit(event) {
    event.preventDefault();
    
    const form = document.getElementById('restaurant-form');
    const successBox = document.getElementById('register-success');
    const submitBtn = form.querySelector('button[type="submit"]');

    // Button loader state
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Cadastrando no MenuCity...';

    setTimeout(() => {
        // Stop loader
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fa-solid fa-cloud-arrow-up" style="margin-right: 8px;"></i> Concluir Cadastro do Restaurante';

        // Display success banner
        successBox.style.display = 'block';

        // Get details to show alert preview
        const nome = document.getElementById('rest-nome').value;
        const cidade = document.getElementById('rest-cidade').value;
        const estado = document.getElementById('rest-estado').value;

        alert(`Sucesso!\nO Restaurante "${nome}" foi registrado com endereço em ${cidade} - ${estado}.`);

        // Reset form
        form.reset();
        document.getElementById('rest-cidade').disabled = true;
        document.getElementById('rest-cidade').innerHTML = '<option value="">Selecione o estado primeiro</option>';

        // Smooth scroll to success top
        successBox.scrollIntoView({ behavior: 'smooth', block: 'end' });

        // Hide banner after 6 seconds
        setTimeout(() => {
            successBox.style.display = 'none';
        }, 6000);
    }, 1500);
}
</script>

@include('partials.footer')
