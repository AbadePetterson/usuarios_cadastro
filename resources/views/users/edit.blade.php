<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
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
            background: transparent;
            padding: 20px;
        }

        .form-container {
            max-width: 600px;
            margin: 0 auto;
        }

        .page-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(135deg, #20B2AA, #48D1CC);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 8px;
        }

        /*
        .logout-btn {
            background: rgba(220, 53, 69, 0.9);
            border: 1px solid rgba(220, 53, 69, 1);
            color: white;
            border-radius: 8px;
            padding: 8px 16px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 6px;
            font-weight: 600;
            cursor: pointer;
            font-size: 0.85rem;
        }

        .logout-btn:hover {
            background: rgba(220, 53, 69, 1);
            color: white;
            text-decoration: none;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3);
        }
        */

        .page-subtitle {
            color: #6c757d;
            font-weight: 400;
        }

        .elegant-form {
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(32, 178, 170, 0.1);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 15px 35px rgba(32, 178, 170, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .elegant-form::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #20B2AA, #48D1CC);
        }

        .elegant-form:hover {
            box-shadow: 0 20px 40px rgba(32, 178, 170, 0.15);
            border-color: rgba(32, 178, 170, 0.2);
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
            font-size: 0.95rem;
        }

        .input-group {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            color: #20B2AA;
            z-index: 2;
            font-size: 1.1rem;
        }

        .form-control {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
        }

        .form-control:focus {
            outline: none;
            border-color: #20B2AA;
            box-shadow: 0 0 0 3px rgba(32, 178, 170, 0.1);
            background: white;
        }

        .form-control:hover {
            border-color: #48D1CC;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            background: none;
            border: none;
            color: #6c757d;
            cursor: pointer;
            font-size: 1.1rem;
            z-index: 2;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: #20B2AA;
        }

        .curious-eyes {
            position: absolute;
            right: 50px;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            gap: 8px;
            z-index: 2;
        }

        .eye {
            width: 20px;
            height: 20px;
            background: #20B2AA;
            border-radius: 50%;
            position: relative;
            animation: blink 3s infinite;
        }

        .eye::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 8px;
            height: 8px;
            background: white;
            border-radius: 50%;
            animation: look 2s infinite;
        }

        @keyframes blink {
            0%, 90%, 100% { transform: scaleY(1); }
            95% { transform: scaleY(0.1); }
        }

        @keyframes look {
            0%, 100% { transform: translate(-50%, -50%); }
            25% { transform: translate(-30%, -50%); }
            75% { transform: translate(-70%, -50%); }
        }

        .eye.surprised {
            animation: surprise 0.5s ease;
        }

        .eye.curious {
            animation: curious 0.5s ease;
        }

        @keyframes surprise {
            0% { transform: scale(1); }
            50% { transform: scale(1.3); }
            100% { transform: scale(1); }
        }

        @keyframes curious {
            0% { transform: rotate(0deg); }
            25% { transform: rotate(-10deg); }
            75% { transform: rotate(10deg); }
            100% { transform: rotate(0deg); }
        }

        .btn-submit {
            background: linear-gradient(135deg, #20B2AA, #48D1CC);
            border: none;
            border-radius: 12px;
            padding: 15px 30px;
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
            width: 100%;
            transition: all 0.3s ease;
            margin-bottom: 15px;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(32, 178, 170, 0.4);
        }

        .btn-back {
            background: linear-gradient(135deg, #6c757d, #495057);
            border: none;
            border-radius: 12px;
            padding: 12px 25px;
            color: white;
            font-weight: 600;
            text-decoration: none;
            width: 100%;
            text-align: center;
            display: block;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(108, 117, 125, 0.4);
            color: white;
            text-decoration: none;
        }

        .alert {
            border-radius: 12px;
            border: none;
            padding: 16px 20px;
            margin-bottom: 25px;
        }

        .alert-danger {
            background: linear-gradient(135deg, rgba(220, 53, 69, 0.1), rgba(220, 53, 69, 0.05));
            color: #dc3545;
            border-left: 4px solid #dc3545;
        }

        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 768px) {
            .elegant-form {
                padding: 25px;
                margin: 10px;
            }
            
            .form-control {
                padding: 12px 12px 12px 40px;
            }
        }
    </style>
</head>
<body>
    <div class="fade-in">
        <div class="form-container">
            <div class="page-header">
                <h1 class="page-title">Editar Usuário</h1>
                <p class="page-subtitle">Atualize os dados do usuário {{ $user->name }}</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Erro!</strong> Verifique os campos abaixo:
                    <ul class="mt-2 mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('users.update', $user->id) }}" class="elegant-form">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="name">Nome Completo</label>
                    <div class="input-group">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" 
                               class="form-control" 
                               id="name" 
                               name="name" 
                               value="{{ old('name', $user->name) }}" 
                               required 
                               placeholder="Digite o nome completo">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <div class="input-group">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" 
                               class="form-control" 
                               id="email" 
                               name="email" 
                               value="{{ old('email', $user->email) }}" 
                               required 
                               placeholder="Digite o e-mail">
                    </div>
                </div>

                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <div class="input-group">
                        <i class="fas fa-id-card input-icon"></i>
                        <input type="text" 
                               class="form-control" 
                               id="cpf" 
                               name="cpf" 
                               value="{{ old('cpf', $user->cpf) }}" 
                               required 
                               placeholder="000.000.000-00"
                               maxlength="14">
                    </div>
                </div>

                <div class="form-group">
                    <label for="birth_date">Data de Nascimento</label>
                    <div class="input-group">
                        <i class="fas fa-calendar-alt input-icon"></i>
                        <input type="date" 
                               class="form-control" 
                               id="birth_date" 
                               name="birth_date" 
                               value="{{ old('birth_date', $user->birth_date) }}" 
                               required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="phone">Telefone (Opcional)</label>
                    <div class="input-group">
                        <i class="fas fa-phone input-icon"></i>
                        <input type="text" 
                               class="form-control" 
                               id="phone" 
                               name="phone" 
                               value="{{ old('phone', $user->phone) }}" 
                               placeholder="(00) 00000-0000"
                               maxlength="15">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Nova Senha (deixe em branco para manter a atual)</label>
                    <div class="input-group">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" 
                               class="form-control" 
                               id="password" 
                               name="password" 
                               placeholder="Digite uma nova senha (opcional)">
                        <div class="curious-eyes" id="curiousEyes">
                            <div class="eye" id="leftEye"></div>
                            <div class="eye" id="rightEye"></div>
                        </div>
                        <button type="button" class="password-toggle" id="togglePassword">
                            <i class="fas fa-eye" id="toggleIcon"></i>
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirmar Nova Senha</label>
                    <div class="input-group">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" 
                               class="form-control" 
                               id="password_confirmation" 
                               name="password_confirmation" 
                               placeholder="Confirme a nova senha">
                    </div>
                </div>

                <button type="submit" class="btn-submit">
                    <i class="fas fa-save me-2"></i>
                    Atualizar Usuário
                </button>

                <a href="{{ route('users.index') }}" class="btn-back">
                    <i class="fas fa-arrow-left me-2"></i>
                    Voltar para Lista
                </a>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Password toggle functionality
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.getElementById('toggleIcon');
        const leftEye = document.getElementById('leftEye');
        const rightEye = document.getElementById('rightEye');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            if (type === 'text') {
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
                // Eyes surprised when password is shown
                leftEye.classList.add('surprised');
                rightEye.classList.add('surprised');
            } else {
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
                // Eyes curious when password is hidden
                leftEye.classList.add('curious');
                rightEye.classList.add('curious');
            }
            
            // Remove animation classes after animation completes
            setTimeout(() => {
                leftEye.classList.remove('surprised', 'curious');
                rightEye.classList.remove('surprised', 'curious');
            }, 500);
        });

        // Eyes react to typing
        passwordInput.addEventListener('input', function() {
            leftEye.classList.add('curious');
            rightEye.classList.add('curious');
            
            setTimeout(() => {
                leftEye.classList.remove('curious');
                rightEye.classList.remove('curious');
            }, 300);
        });

        // Eyes react to focus/blur
        passwordInput.addEventListener('focus', function() {
            leftEye.style.background = '#48D1CC';
            rightEye.style.background = '#48D1CC';
        });

        passwordInput.addEventListener('blur', function() {
            leftEye.style.background = '#20B2AA';
            rightEye.style.background = '#20B2AA';
        });

        // CPF formatting
        document.getElementById('cpf').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            value = value.replace(/(\d{3})(\d)/, '$1.$2');
            value = value.replace(/(\d{3})(\d)/, '$1.$2');
            value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
            e.target.value = value;
        });

        // Phone formatting
        document.getElementById('phone').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            value = value.replace(/(\d{2})(\d)/, '($1) $2');
            value = value.replace(/(\d{5})(\d)/, '$1-$2');
            e.target.value = value;
        });

        // Remove formatting before form submission
        document.querySelector('.elegant-form').addEventListener('submit', function(e) {
            // Remove CPF formatting (keep only numbers)
            const cpfField = document.getElementById('cpf');
            cpfField.value = cpfField.value.replace(/\D/g, '');
            
            // Remove phone formatting (keep only numbers)
            const phoneField = document.getElementById('phone');
            phoneField.value = phoneField.value.replace(/\D/g, '');
        });
    </script>
</body>
</html>
