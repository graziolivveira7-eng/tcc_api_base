@include('partials.header', ['title' => 'Entrar - MenuCity'])

<main class="container" style="display: flex; align-items: center; justify-content: center; min-height: 70vh;">
    <div class="login-card">
        <div class="login-icon">
            <i class="fa-solid fa-user-shield"></i>
        </div>
        
        <h2>Acesse sua <span>Conta</span></h2>
        <p>Escolha um método para entrar no painel do MenuCity.</p>
        
        <!-- Google Login Button Mock -->
        <button class="btn-google" id="btn-google-login" onclick="handleGoogleLogin()">
            <svg viewBox="0 0 24 24" width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                <g transform="matrix(1, 0, 0, 1, 0, 0)">
                    <path d="M21.35,11.1H12v2.7h5.38c-0.24,1.28 -0.96,2.37 -2.04,3.1v2.56h3.29c1.92,-1.77 3.03,-4.38 3.03,-7.39c0,-0.61 -0.06,-1.2 -0.16,-1.77Z" fill="#4285F4"/>
                    <path d="M12,20.62c2.43,0 4.47,-0.81 5.96,-2.19l-3.29,-2.56c-0.91,0.61 -2.08,0.98 -3.29,0.98c-2.34,0 -4.33,-1.58 -5.04,-3.71H1.05v2.64c1.48,2.94 4.52,4.84 8.01,4.84Z" fill="#34A853"/>
                    <path d="M6.96,13.14c-0.18,-0.54 -0.28,-1.11 -0.28,-1.71c0,-0.6 0.1,-1.18 0.28,-1.71V7.08H1.05C0.44,8.3 0.08,9.7 0.08,11.2c0,1.5 0.36,2.9 0.97,4.12l3.41,-2.64c-0.18,-0.54 -0.28,-1.11 -0.28,-1.71Z" fill="#FBBC05"/>
                    <path d="M12,5.19c1.32,0 2.51,0.45 3.44,1.35l2.58,-2.58C16.46,2.44 14.42,1.78 12,1.78c-3.49,0 -6.53,1.9 -8.01,4.84l3.41,2.64c0.71,-2.13 2.7,-3.71 5.04,-3.71Z" fill="#EA4335"/>
                </g>
            </svg>
            Entrar com o Google
        </button>

        <div class="divider">ou use e-mail</div>

        <!-- Classic form, visually polished but mocked -->
        <form class="light-form" style="text-align: left;" onsubmit="handleEmailLogin(event)">
            <div class="form-group" style="margin-bottom: 1.2rem;">
                <label for="login-email">E-mail</label>
                <input type="email" id="login-email" class="form-control" placeholder="nome@exemplo.com" required>
            </div>

            <div class="form-group" style="margin-bottom: 1.5rem;">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <label for="login-password">Senha</label>
                    <a href="#" style="font-size: 0.8rem; color: var(--primary);">Esqueceu a senha?</a>
                </div>
                <input type="password" id="login-password" class="form-control" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; height: 44px;" id="btn-submit-email">
                <i class="fa-solid fa-right-to-bracket" style="margin-right: 8px;"></i> Acessar Painel
            </button>
        </form>

        <p style="margin-top: 2rem; font-size: 0.9rem; color: var(--text-muted);">
            Não tem uma conta? <a href="/cadastrar-restaurante" style="color: var(--primary); font-weight: 600;">Cadastre-se aqui</a>
        </p>
    </div>
</main>

<script>
function handleGoogleLogin() {
    const btn = document.getElementById('btn-google-login');
    const originalText = btn.innerHTML;
    
    // Simulate google authentication loader
    btn.disabled = true;
    btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Conectando à API do Google...';

    setTimeout(() => {
        alert('Autenticação com Google simulada com sucesso! Você está logado no MenuCity.');
        btn.disabled = false;
        btn.innerHTML = originalText;
        window.location.href = '/';
    }, 1500);
}

function handleEmailLogin(event) {
    event.preventDefault();
    const btn = document.getElementById('btn-submit-email');
    const email = document.getElementById('login-email').value;

    btn.disabled = true;
    btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Validando credenciais...';

    setTimeout(() => {
        alert(`Login simulado com sucesso para o e-mail: ${email}`);
        btn.disabled = false;
        btn.innerHTML = '<i class="fa-solid fa-right-to-bracket" style="margin-right: 8px;"></i> Acessar Painel';
        window.location.href = '/';
    }, 1200);
}
</script>

@include('partials.footer')
