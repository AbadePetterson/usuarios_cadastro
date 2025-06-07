<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
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

        .page-subtitle {
            color: #6c757d;
            font-weight: 400;
        }

        .action-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .user-count {
            background: linear-gradient(135deg, rgba(32, 178, 170, 0.1), rgba(72, 209, 204, 0.05));
            border: 1px solid rgba(32, 178, 170, 0.2);
            border-radius: 12px;
            padding: 12px 20px;
            color: #20B2AA;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-create {
            background: linear-gradient(135deg, #20B2AA, #48D1CC);
            border: none;
            border-radius: 12px;
            padding: 12px 20px;
            color: white;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-create:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(32, 178, 170, 0.4);
            color: white;
            text-decoration: none;
        }

        .users-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .user-card {
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(32, 178, 170, 0.1);
            border-radius: 16px;
            padding: 25px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .user-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(32, 178, 170, 0.15);
            border-color: rgba(32, 178, 170, 0.3);
        }

        .user-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #20B2AA, #48D1CC);
        }

        .user-avatar {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #20B2AA, #48D1CC);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.5rem;
            margin: 0 auto 15px;
            box-shadow: 0 8px 20px rgba(32, 178, 170, 0.3);
        }

        .user-name {
            font-size: 1.2rem;
            font-weight: 600;
            color: #333;
            text-align: center;
            margin-bottom: 8px;
        }

        .user-email {
            color: #6c757d;
            text-align: center;
            margin-bottom: 15px;
            font-size: 0.9rem;
        }

        .user-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-bottom: 20px;
        }

        .info-item {
            text-align: center;
            padding: 8px;
            background: rgba(32, 178, 170, 0.05);
            border-radius: 8px;
        }

        .info-label {
            font-size: 0.8rem;
            color: #6c757d;
            margin-bottom: 2px;
        }

        .info-value {
            font-weight: 600;
            color: #333;
            font-size: 0.9rem;
        }

        .user-actions {
            display: flex;
            gap: 8px;
            justify-content: center;
        }

        .btn-edit, .btn-delete {
            background: rgba(32, 178, 170, 0.1);
            border: 1px solid rgba(32, 178, 170, 0.3);
            color: #20B2AA;
            border-radius: 8px;
            padding: 8px 12px;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
        }

        .btn-edit:hover {
            background: rgba(32, 178, 170, 0.2);
            color: #20B2AA;
            text-decoration: none;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(32, 178, 170, 0.2);
        }

        .btn-delete {
            background: rgba(220, 53, 69, 0.1);
            border-color: rgba(220, 53, 69, 0.3);
            color: #dc3545;
        }

        .btn-delete:hover {
            background: rgba(220, 53, 69, 0.2);
            color: #dc3545;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(220, 53, 69, 0.2);
        }

        .admin-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: linear-gradient(135deg, #20B2AA, #48D1CC);
            color: white;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #6c757d;
        }

        .empty-icon {
            font-size: 4rem;
            color: #20B2AA;
            margin-bottom: 20px;
            opacity: 0.5;
        }

        .empty-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: #333;
        }

        .empty-text {
            margin-bottom: 25px;
        }

        .alert {
            border-radius: 12px;
            border: none;
            padding: 16px 20px;
            margin-bottom: 25px;
        }

        .alert-success {
            background: linear-gradient(135deg, rgba(40, 167, 69, 0.1), rgba(40, 167, 69, 0.05));
            color: #28a745;
            border-left: 4px solid #28a745;
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
            .users-grid {
                grid-template-columns: 1fr;
            }
            
            .action-bar {
                flex-direction: column;
                align-items: stretch;
            }
            
            .user-info {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="fade-in">
        <div class="page-header">
            <h1 class="page-title">Usuários Cadastrados</h1>
            <p class="page-subtitle">Gerencie todos os usuários do sistema</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="action-bar">
            <div class="user-count">
                <i class="fas fa-users"></i>
                {{ count($users) }} usuário{{ count($users) != 1 ? 's' : '' }} cadastrado{{ count($users) != 1 ? 's' : '' }}
            </div>
            @if(auth()->user()->is_admin)
                <a href="{{ route('users.create') }}" class="btn-create">
                    <i class="fas fa-user-plus"></i>
                    Novo Usuário
                </a>
            @endif
        </div>

        @if(count($users) > 0)
            <div class="users-grid">
                @foreach($users as $user)
                    <div class="user-card">
                        @if($user->is_admin)
                            <div class="admin-badge">
                                <i class="fas fa-crown me-1"></i>ADMIN
                            </div>
                        @endif
                        
                        <div class="user-avatar">
                            {{ strtoupper(substr($user->name, 0, 2)) }}
                        </div>
                        
                        <div class="user-name">{{ $user->name }}</div>
                        <div class="user-email">{{ $user->email }}</div>
                        
                        <div class="user-info">
                            <div class="info-item">
                                <div class="info-label">CPF</div>
                                <div class="info-value">{{ substr($user->cpf, 0, 3) }}.{{ substr($user->cpf, 3, 3) }}.{{ substr($user->cpf, 6, 3) }}-{{ substr($user->cpf, 9, 2) }}</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Telefone</div>
                                <div class="info-value">{{ $user->phone ?: 'Não informado' }}</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Nascimento</div>
                                <div class="info-value">{{ \Carbon\Carbon::parse($user->birth_date)->format('d/m/Y') }}</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Cadastro</div>
                                <div class="info-value">{{ $user->created_at->format('d/m/Y') }}</div>
                            </div>
                        </div>
                        
                        <div class="user-actions">
                            @if(Auth::user()->is_admin || Auth::id() === $user->id)
                                @if(!$user->is_admin || Auth::user()->is_admin)
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn-edit" title="Editar usuário">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                @endif
                            @endif
                            
                            @if(Auth::user()->is_admin && !$user->is_admin && Auth::id() !== $user->id)
                                <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display: inline;" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete" title="Excluir usuário">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="empty-title">Nenhum usuário encontrado</h3>
                <p class="empty-text">Ainda não há usuários cadastrados no sistema.</p>
                @if(auth()->user()->is_admin)
                    <a href="{{ route('users.create') }}" class="btn-create">
                        <i class="fas fa-user-plus"></i>
                        Criar Primeiro Usuário
                    </a>
                @endif
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
