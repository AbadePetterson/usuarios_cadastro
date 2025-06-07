<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistema de Usuários</title>
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
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
        }

        .navbar {
            background: linear-gradient(135deg, #20B2AA 0%, #48D1CC 100%);
            box-shadow: 0 4px 20px rgba(32, 178, 170, 0.3);
            padding: 15px 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: white !important;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-brand i {
            font-size: 1.8rem;
        }

        .user-info {
            color: white;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        .logout-btn {
            background: rgba(220, 53, 69, 0.9);
            border: 1px solid rgba(220, 53, 69, 1);
            color: white;
            border-radius: 8px;
            padding: 10px 18px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .logout-btn:hover {
            background: rgba(220, 53, 69, 1);
            color: white;
            text-decoration: none;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3);
        }

        .logout-btn:active {
            transform: translateY(0);
        }

        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        .dashboard-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .dashboard-title {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #20B2AA, #48D1CC);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 10px;
        }

        .dashboard-subtitle {
            color: #6c757d;
            font-size: 1.1rem;
        }

        .nav-tabs {
            border: none;
            margin-bottom: 30px;
            justify-content: center;
        }

        .nav-tabs .nav-link {
            border: none;
            background: rgba(255, 255, 255, 0.8);
            color: #6c757d;
            border-radius: 12px 12px 0 0;
            padding: 15px 25px;
            margin: 0 5px;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .nav-tabs .nav-link:hover {
            background: rgba(32, 178, 170, 0.1);
            color: #20B2AA;
            transform: translateY(-2px);
        }

        .nav-tabs .nav-link.active {
            background: linear-gradient(135deg, #20B2AA, #48D1CC);
            color: white;
            border: none;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(32, 178, 170, 0.3);
        }

        .tab-content {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 0 0 20px 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            padding: 40px;
            min-height: 500px;
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: linear-gradient(135deg, rgba(32, 178, 170, 0.1), rgba(72, 209, 204, 0.05));
            border: 1px solid rgba(32, 178, 170, 0.2);
            border-radius: 16px;
            padding: 25px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(32, 178, 170, 0.2);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #20B2AA, #48D1CC);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            color: white;
            font-size: 24px;
        }

        .stat-content h3 {
            font-size: 2rem;
            font-weight: 700;
            color: #20B2AA;
            margin-bottom: 5px;
        }

        .stat-content p {
            color: #6c757d;
            font-weight: 500;
            margin: 0;
        }

        .tabs-container {
            margin-bottom: 30px;
        }

        .tabs-nav {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 0;
        }

        .tab-btn {
            border: none;
            background: rgba(255, 255, 255, 0.8);
            color: #6c757d;
            border-radius: 12px 12px 0 0;
            padding: 15px 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .tab-btn:hover {
            background: rgba(32, 178, 170, 0.1);
            color: #20B2AA;
            transform: translateY(-2px);
        }

        .tab-btn.active {
            background: linear-gradient(135deg, #20B2AA, #48D1CC);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(32, 178, 170, 0.3);
        }

        .welcome-message {
            background: linear-gradient(135deg, rgba(32, 178, 170, 0.1), rgba(72, 209, 204, 0.05));
            border: 1px solid rgba(32, 178, 170, 0.2);
            border-radius: 16px;
            padding: 30px;
            text-align: center;
            margin-bottom: 30px;
        }

        .welcome-message h3 {
            color: #20B2AA;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .welcome-message p {
            color: #6c757d;
            margin: 0;
        }

        .admin-badge {
            background: linear-gradient(135deg, #20B2AA, #48D1CC);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-left: 10px;
        }

        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .iframe-container {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .iframe-container iframe {
            width: 100%;
            height: 600px;
            border: none;
        }

        @media (max-width: 768px) {
            .stats-cards {
                grid-template-columns: 1fr;
            }
            
            .nav-tabs .nav-link {
                padding: 12px 20px;
                margin: 0 2px;
            }

            .user-profile-overview {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }

            .profile-details {
                text-align: left;
            }

            .overview-card {
                padding: 20px;
            }

            .activity-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .activity-avatar {
                margin-right: 0;
            }

            .quick-action-btn {
                justify-content: center;
            }

            .tabs-nav {
                flex-wrap: wrap;
            }

            .tab-btn {
                flex: 1;
                min-width: 120px;
                justify-content: center;
            }
        }

        .overview-card {
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(32, 178, 170, 0.1);
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .overview-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(32, 178, 170, 0.1);
        }

        .overview-card h5 {
            color: #20B2AA;
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .activity-list {
            max-height: 400px;
            overflow-y: auto;
        }

        .activity-item {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid rgba(32, 178, 170, 0.1);
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #20B2AA, #48D1CC);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            margin-right: 15px;
            font-size: 0.9rem;
        }

        .activity-content {
            flex: 1;
        }

        .activity-time {
            font-size: 0.8rem;
            color: #6c757d;
            margin-top: 2px;
        }

        .activity-badge {
            background: linear-gradient(135deg, #20B2AA, #48D1CC);
            color: white;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .quick-actions {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .quick-action-btn {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            background: rgba(32, 178, 170, 0.05);
            border: 1px solid rgba(32, 178, 170, 0.2);
            border-radius: 12px;
            color: #20B2AA;
            text-decoration: none;
            transition: all 0.3s ease;
            gap: 12px;
        }

        .quick-action-btn:hover {
            background: rgba(32, 178, 170, 0.1);
            color: #20B2AA;
            text-decoration: none;
            transform: translateX(5px);
        }

        .quick-action-btn i {
            width: 20px;
            text-align: center;
        }

        .system-info {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px solid rgba(32, 178, 170, 0.1);
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            color: #6c757d;
            font-weight: 500;
        }

        .info-value {
            color: #333;
            font-weight: 600;
        }

        .user-profile-overview {
            display: flex;
            gap: 25px;
            align-items: flex-start;
        }

        .profile-avatar-large {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #20B2AA, #48D1CC);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 2rem;
            box-shadow: 0 8px 25px rgba(32, 178, 170, 0.3);
            flex-shrink: 0;
        }

        .profile-info {
            flex: 1;
        }

        .profile-info h4 {
            color: #333;
            margin-bottom: 5px;
        }

        .profile-details {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .detail-item {
            display: flex;
            align-items: center;
            color: #6c757d;
        }

        .detail-item i {
            color: #20B2AA;
            width: 20px;
        }

        .personal-stats {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 12px;
            background: rgba(32, 178, 170, 0.05);
            border-radius: 12px;
        }

        .stat-icon-small {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #20B2AA, #48D1CC);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1rem;
        }

        .stat-number-small {
            font-size: 1.2rem;
            font-weight: 700;
            color: #20B2AA;
        }

        .stat-label-small {
            font-size: 0.8rem;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center w-100">
                <a class="navbar-brand">
                    <i class="fas fa-users"></i>
                    Sistema de Usuários
                </a>
                <div class="user-info">
                    <div class="user-avatar">
                        {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                    </div>
                    <div>
                        <div style="font-weight: 600;">{{ auth()->user()->name }}</div>
                        <div style="font-size: 0.9rem; opacity: 0.8;">{{ auth()->user()->email }}</div>
                        @if(auth()->user()->is_admin)
                            <span class="admin-badge">ADMIN</span>
                        @endif
                    </div>
                    <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                        @csrf
                        <button type="submit" class="logout-btn" onclick="return confirm('Tem certeza que deseja sair?')">
                            <i class="fas fa-sign-out-alt"></i>
                            Sair
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="main-container fade-in">
        <div class="dashboard-header">
            <h1 class="dashboard-title">Dashboard</h1>
            <p class="dashboard-subtitle">Gerencie usuários e visualize estatísticas do sistema</p>
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

        <div class="stats-container">
            @if(Auth::user()->is_admin)
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-content">
                        <h3>{{ \App\Models\User::count() }}</h3>
                        <p>Total de Usuários</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <div class="stat-content">
                        <h3>{{ \App\Models\User::where('is_admin', true)->count() }}</h3>
                        <p>Administradores</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <div class="stat-content">
                        <h3>{{ \App\Models\User::where('is_admin', false)->count() }}</h3>
                        <p>Usuários Comuns</p>
                    </div>
                </div>
            @else
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="stat-content">
                        <h3>Bem-vindo!</h3>
                        <p>{{ Auth::user()->name }}</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <div class="stat-content">
                        <h3>{{ \Carbon\Carbon::parse(Auth::user()->birth_date)->age }}</h3>
                        <p>Anos de Idade</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-content">
                        <h3>{{ \Carbon\Carbon::parse(Auth::user()->created_at)->diffForHumans() }}</h3>
                        <p>Membro desde</p>
                    </div>
                </div>
            @endif
        </div>

        <!-- Tabs Navigation -->
        <div class="tabs-container">
            <div class="tabs-nav">
                <button class="tab-btn active" data-tab="overview">
                    <i class="fas fa-chart-line"></i>
                    Visão Geral
                </button>
                <button class="tab-btn" data-tab="users">
                    <i class="fas fa-users"></i>
                    @if(Auth::user()->is_admin)
                        Gerenciar Usuários
                    @else
                        Meu Perfil
                    @endif
                </button>
                @if(Auth::user()->is_admin)
                    <button class="tab-btn" data-tab="create">
                        <i class="fas fa-user-plus"></i>
                        Criar Usuário
                    </button>
                @endif
            </div>
        </div>

        <div class="tab-content" id="dashboardTabsContent">
            <div class="tab-pane fade show active" id="overview" role="tabpanel">
                <div class="welcome-section">
                    <h3>
                        <i class="fas fa-chart-line me-2"></i>
                        @if(Auth::user()->is_admin)
                            Painel Administrativo
                        @else
                            Meu Painel
                        @endif
                    </h3>
                    <p class="text-muted">
                        @if(Auth::user()->is_admin)
                            Gerencie usuários e monitore o sistema
                        @else
                            Visualize e edite suas informações pessoais
                        @endif
                    </p>
                </div>

                @if(Auth::user()->is_admin)
                    <!-- Admin Overview Content -->
                    <div class="row mt-4">
                        <div class="col-md-8">
                            <div class="overview-card">
                                <h5><i class="fas fa-clock me-2"></i>Atividade Recente</h5>
                                <div class="activity-list">
                                    @php
                                        $recentUsers = \App\Models\User::orderBy('created_at', 'desc')->take(5)->get();
                                    @endphp
                                    @forelse($recentUsers as $user)
                                        <div class="activity-item">
                                            <div class="activity-avatar">
                                                {{ strtoupper(substr($user->name, 0, 2)) }}
                                            </div>
                                            <div class="activity-content">
                                                <strong>{{ $user->name }}</strong> se cadastrou no sistema
                                                <div class="activity-time">{{ $user->created_at->diffForHumans() }}</div>
                                            </div>
                                            @if($user->is_admin)
                                                <span class="activity-badge admin">ADMIN</span>
                                            @endif
                                        </div>
                                    @empty
                                        <div class="text-muted text-center py-3">
                                            <i class="fas fa-inbox me-2"></i>Nenhuma atividade recente
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="overview-card">
                                <h5><i class="fas fa-bolt me-2"></i>Ações Rápidas</h5>
                                <div class="quick-actions">
                                    <a href="{{ route('users.create') }}" class="quick-action-btn">
                                        <i class="fas fa-user-plus"></i>
                                        <span>Criar Usuário</span>
                                    </a>
                                    <a href="{{ route('users.index') }}" class="quick-action-btn">
                                        <i class="fas fa-users"></i>
                                        <span>Ver Todos os Usuários</span>
                                    </a>
                                    <a href="{{ route('users.edit', Auth::id()) }}" class="quick-action-btn">
                                        <i class="fas fa-user-edit"></i>
                                        <span>Editar Meu Perfil</span>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="overview-card mt-3">
                                <h5><i class="fas fa-info-circle me-2"></i>Informações do Sistema</h5>
                                <div class="system-info">
                                    <div class="info-row">
                                        <span class="info-label">Versão:</span>
                                        <span class="info-value">1.0.0</span>
                                    </div>
                                    <div class="info-row">
                                        <span class="info-label">Laravel:</span>
                                        <span class="info-value">{{ app()->version() }}</span>
                                    </div>
                                    <div class="info-row">
                                        <span class="info-label">PHP:</span>
                                        <span class="info-value">{{ PHP_VERSION }}</span>
                                    </div>
                                    <div class="info-row">
                                        <span class="info-label">Último Login:</span>
                                        <span class="info-value">{{ now()->format('d/m/Y H:i') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- User Overview Content -->
                    <div class="row mt-4">
                        <div class="col-md-8">
                            <div class="overview-card">
                                <h5><i class="fas fa-user me-2"></i>Meus Dados</h5>
                                <div class="user-profile-overview">
                                    <div class="profile-avatar-large">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                                    </div>
                                    <div class="profile-info">
                                        <h4>{{ Auth::user()->name }}</h4>
                                        <p class="text-muted">{{ Auth::user()->email }}</p>
                                        <div class="profile-details">
                                            <div class="detail-item">
                                                <i class="fas fa-id-card me-2"></i>
                                                <strong>CPF:</strong> {{ substr(Auth::user()->cpf, 0, 3) }}.{{ substr(Auth::user()->cpf, 3, 3) }}.{{ substr(Auth::user()->cpf, 6, 3) }}-{{ substr(Auth::user()->cpf, 9, 2) }}
                                            </div>
                                            <div class="detail-item">
                                                <i class="fas fa-phone me-2"></i>
                                                <strong>Telefone:</strong> {{ Auth::user()->phone ?: 'Não informado' }}
                                            </div>
                                            <div class="detail-item">
                                                <i class="fas fa-birthday-cake me-2"></i>
                                                <strong>Nascimento:</strong> {{ \Carbon\Carbon::parse(Auth::user()->birth_date)->format('d/m/Y') }}
                                            </div>
                                            <div class="detail-item">
                                                <i class="fas fa-calendar-plus me-2"></i>
                                                <strong>Membro desde:</strong> {{ Auth::user()->created_at->format('d/m/Y') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="overview-card">
                                <h5><i class="fas fa-bolt me-2"></i>Ações Rápidas</h5>
                                <div class="quick-actions">
                                    <a href="{{ route('users.edit', Auth::id()) }}" class="quick-action-btn">
                                        <i class="fas fa-user-edit"></i>
                                        <span>Editar Meu Perfil</span>
                                    </a>
                                    <a href="#" onclick="window.print()" class="quick-action-btn">
                                        <i class="fas fa-print"></i>
                                        <span>Imprimir Dados</span>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="overview-card mt-3">
                                <h5><i class="fas fa-chart-pie me-2"></i>Estatísticas Pessoais</h5>
                                <div class="personal-stats">
                                    <div class="stat-item">
                                        <div class="stat-icon-small">
                                            <i class="fas fa-calendar"></i>
                                        </div>
                                        <div>
                                            <div class="stat-number-small">{{ \Carbon\Carbon::parse(Auth::user()->birth_date)->age }}</div>
                                            <div class="stat-label-small">Anos de idade</div>
                                        </div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="stat-icon-small">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                        <div>
                                            <div class="stat-number-small">{{ Auth::user()->created_at->diffInDays(now()) }}</div>
                                            <div class="stat-label-small">Dias no sistema</div>
                                        </div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="stat-icon-small">
                                            <i class="fas fa-user-check"></i>
                                        </div>
                                        <div>
                                            <div class="stat-number-small">Ativo</div>
                                            <div class="stat-label-small">Status da conta</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="tab-pane fade" id="users" role="tabpanel">
                <div class="iframe-container">
                    <iframe src="{{ route('users.index') }}" id="usersFrame"></iframe>
                </div>
            </div>

            @if(Auth::user()->is_admin)
            <div class="tab-pane fade" id="create" role="tabpanel">
                <div class="iframe-container">
                    <iframe src="{{ route('users.create') }}" id="createFrame"></iframe>
                </div>
            </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Tab functionality
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.tab-btn');
            const tabContents = document.querySelectorAll('.tab-pane');
            
            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetTab = this.getAttribute('data-tab');
                    
                    // Remove active class from all buttons
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    // Add active class to clicked button
                    this.classList.add('active');
                    
                    // Hide all tab contents
                    tabContents.forEach(content => {
                        content.classList.remove('show', 'active');
                    });
                    
                    // Show target tab content
                    const targetContent = document.getElementById(targetTab);
                    if (targetContent) {
                        targetContent.classList.add('show', 'active');
                        
                        // Reload iframe if present
                        const iframe = targetContent.querySelector('iframe');
                        if (iframe) {
                            iframe.src = iframe.src;
                        }
                    }
                });
            });
        });
    </script>
</body>
</html> 