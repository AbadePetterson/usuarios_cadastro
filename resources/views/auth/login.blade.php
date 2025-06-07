<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #20B2AA 0%, #48D1CC 25%, #40E0D0 50%, #00CED1 75%, #5F9EA0 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Efeito de ondas animadas */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Ccircle cx='30' cy='30' r='4'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            padding: 50px 40px;
            width: 100%;
            max-width: 450px;
            position: relative;
            z-index: 10;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, #20B2AA, #48D1CC, #40E0D0);
            border-radius: 24px 24px 0 0;
        }

        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .login-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #20B2AA, #48D1CC);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: white;
            font-size: 32px;
            box-shadow: 0 10px 30px rgba(32, 178, 170, 0.3);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .login-title {
            font-size: 2.2rem;
            font-weight: 700;
            background: linear-gradient(135deg, #20B2AA, #48D1CC);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 8px;
        }

        .login-subtitle {
            color: #6c757d;
            font-weight: 400;
            font-size: 1rem;
        }

        .form-group {
            position: relative;
            margin-bottom: 25px;
        }

        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-label i {
            color: #20B2AA;
            width: 16px;
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 15px 20px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
            position: relative;
        }

        .form-control:focus {
            border-color: #20B2AA;
            box-shadow: 0 0 0 0.2rem rgba(32, 178, 170, 0.25);
            background: rgba(255, 255, 255, 1);
            transform: translateY(-2px);
        }

        .password-toggle {
            position: absolute;
            right: 16px;
            top: 42px;
            background: none;
            border: none;
            color: #6c757d;
            cursor: pointer;
            padding: 0;
            z-index: 10;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: #20B2AA;
        }

        .btn-login {
            background: linear-gradient(135deg, #20B2AA 0%, #48D1CC 100%);
            border: none;
            border-radius: 12px;
            padding: 16px 24px;
            font-weight: 600;
            font-size: 16px;
            color: white;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            width: 100%;
            margin-top: 20px;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(32, 178, 170, 0.4);
            color: white;
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .alert {
            border-radius: 12px;
            border: none;
            padding: 16px 20px;
            margin-bottom: 25px;
        }

        .alert-danger {
            background: linear-gradient(135deg, rgba(220, 53, 69, 0.1) 0%, rgba(220, 53, 69, 0.05) 100%);
            color: #dc3545;
            border-left: 4px solid #dc3545;
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: floatShapes 15s infinite linear;
        }

        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            left: 10%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 120px;
            height: 120px;
            left: 80%;
            animation-delay: 5s;
        }

        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            left: 50%;
            animation-delay: 10s;
        }

        @keyframes floatShapes {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }

        .admin-info {
            background: rgba(32, 178, 170, 0.1);
            border: 1px solid rgba(32, 178, 170, 0.3);
            border-radius: 12px;
            padding: 15px;
            margin-top: 30px;
            text-align: center;
        }

        .admin-info h6 {
            color: #20B2AA;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .admin-info p {
            color: #6c757d;
            font-size: 14px;
            margin: 0;
        }

        .fade-in {
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { 
                opacity: 0; 
                transform: translateY(30px); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }
    </style>
</head>
<body>
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="login-container fade-in">
        <div class="login-header">
            <div class="login-icon">
                <i class="fas fa-users"></i>
            </div>
            <h1 class="login-title">Bem-vindo</h1>
            <p class="login-subtitle">Faça login para acessar o sistema</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <div class="d-flex align-items-center">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>{{ $errors->first() }}</strong>
                </div>
            </div>
        @endif

        <form method="POST" action="/login" id="loginForm">
            @csrf
            
            <div class="form-group">
                <label class="form-label">
                    <i class="fas fa-envelope"></i>
                    E-mail
                </label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required 
                       placeholder="Digite seu e-mail" autofocus>
            </div>
            
            <div class="form-group">
                <label class="form-label">
                    <i class="fas fa-lock"></i>
                    Senha
                </label>
                <div class="position-relative">
                    <input type="password" name="password" id="password" class="form-control" required 
                           placeholder="Digite sua senha">
                    <button type="button" class="password-toggle" onclick="togglePassword()">
                        <i id="eyeIcon" class="fas fa-eye"></i>
                        <i id="eyeSlashIcon" class="fas fa-eye-slash" style="display:none;"></i>
                    </button>
                </div>
            </div>
            
            <button type="submit" class="btn btn-login">
                <i class="fas fa-sign-in-alt me-2"></i>Entrar
            </button>
        </form>

        <div class="admin-info">
            <h6><i class="fas fa-info-circle me-2"></i>Acesso Administrativo</h6>
            <p><strong>E-mail:</strong> admin@sistema.com</p>
            <p><strong>Senha:</strong> admin123</p>
        </div>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const eye = document.getElementById('eyeIcon');
            const eyeSlash = document.getElementById('eyeSlashIcon');
            
            if (input.type === 'password') {
                input.type = 'text';
                eye.style.display = 'none';
                eyeSlash.style.display = 'inline';
            } else {
                input.type = 'password';
                eye.style.display = 'inline';
                eyeSlash.style.display = 'none';
            }
        }

        // Animação de entrada dos campos
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.form-control');
            
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('focused');
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('focused');
                });
            });
        });
    </script>
</body>
</html> 