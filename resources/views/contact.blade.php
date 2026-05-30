@include('partials.header', ['title' => 'Contato - MenuCity'])

<main class="container" style="padding: 4rem 0;">
    <h2 class="section-title">Fale <span>Conosco</span></h2>
    <p style="text-align: center; color: var(--text-muted); margin-bottom: 3rem; margin-top: -2rem;">Dúvidas, sugestões ou suporte técnico? Preencha o formulário ou entre em contato direto.</p>

    <div class="contact-grid">
        <!-- Contact details column -->
        <div class="contact-info">
            <div class="info-card">
                <div class="info-card-icon"><i class="fa-solid fa-phone"></i></div>
                <div>
                    <h4>Telefone / WhatsApp</h4>
                    <p>(11) 4002-8922</p>
                    <p>Seg a Sex: 09h às 18h</p>
                </div>
            </div>

            <div class="info-card">
                <div class="info-card-icon"><i class="fa-solid fa-envelope"></i></div>
                <div>
                    <h4>E-mail Suporte</h4>
                    <p>suporte@menucity.com.br</p>
                    <p>Respostas em até 24 horas úteis</p>
                </div>
            </div>

            <div class="info-card">
                <div class="info-card-icon"><i class="fa-solid fa-location-dot"></i></div>
                <div>
                    <h4>Endereço Acadêmico</h4>
                    <p>Av. das Laranjeiras, 100</p>
                    <p>São Paulo - SP (TCC 2026)</p>
                </div>
            </div>
        </div>

        <!-- Contact form column -->
        <div style="background: var(--card); border: 1px solid var(--border); border-radius: var(--radius-md); padding: 2.5rem; box-shadow: var(--shadow);">
            
            <!-- Success Message Alert -->
            <div id="contact-success-alert" class="alert-success" style="display: none;">
                <i class="fa-solid fa-circle-check" style="margin-right: 8px;"></i>
                Mensagem enviada com sucesso! Entraremos em contato em breve.
            </div>

            <form id="contact-form" class="light-form" onsubmit="handleContactSubmit(event)">
                <div class="form-grid">
                    <div class="form-group form-span-2">
                        <label for="name">Nome Completo</label>
                        <input type="text" id="name" class="form-control" placeholder="Digite seu nome" required>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" class="form-control" placeholder="nome@exemplo.com" required>
                    </div>

                    <div class="form-group">
                        <label for="subject">Assunto</label>
                        <select id="subject" class="form-control" required>
                            <option value="">Selecione um assunto</option>
                            <option value="duvida">Dúvida Geral</option>
                            <option value="suporte">Suporte ao Cadastro</option>
                            <option value="sugestao">Sugestão de Funcionalidade</option>
                            <option value="outros">Outros</option>
                        </select>
                    </div>

                    <div class="form-group form-span-2">
                        <label for="message">Mensagem</label>
                        <textarea id="message" class="form-control" rows="5" placeholder="Escreva sua mensagem aqui..." style="resize: vertical; font-family: inherit;" required></textarea>
                    </div>
                    
                    <div class="form-span-2" style="margin-top: 1rem;">
                        <button type="submit" class="btn btn-primary" style="width: 100%; height: 48px;">
                            <i class="fa-solid fa-paper-plane" style="margin-right: 8px;"></i> Enviar Mensagem
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
function handleContactSubmit(event) {
    event.preventDefault();
    
    const form = document.getElementById('contact-form');
    const successAlert = document.getElementById('contact-success-alert');
    const submitBtn = form.querySelector('button[type="submit"]');

    // Simulate loader
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Enviando...';

    setTimeout(() => {
        // Reset loader
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fa-solid fa-paper-plane" style="margin-right: 8px;"></i> Enviar Mensagem';
        
        // Show success alert
        successAlert.style.display = 'block';
        
        // Clear fields
        form.reset();

        // Scroll to success message
        successAlert.scrollIntoView({ behavior: 'smooth', block: 'end' });

        // Hide alert after 5 seconds
        setTimeout(() => {
            successAlert.style.display = 'none';
        }, 5000);
    }, 1000);
}
</script>

@include('partials.footer')
