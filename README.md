![image](https://github.com/user-attachments/assets/f0f60707-5780-4591-842c-b11d92b001f8)

# 🚀 Sistema de Cadastro de Usuários

Um sistema completo de gerenciamento de usuários desenvolvido em Laravel com interface moderna e responsiva.

## 📋 Índice

- [Sobre o Projeto](#sobre-o-projeto)
- [Funcionalidades](#funcionalidades)
- [Tecnologias Utilizadas](#tecnologias-utilizadas)
- [Pré-requisitos](#pré-requisitos)
- [Instalação com Docker](#instalação-com-docker)
- [Comandos Docker Úteis](#comandos-docker-úteis)
- [Instalação Local (Alternativa)](#instalação-local-alternativa)
- [Como Usar](#como-usar)
- [Estrutura do Projeto](#estrutura-do-projeto)
- [Troubleshooting](#troubleshooting)
- [Contribuição](#contribuição)
- [Licença](#licença)

## 📖 Sobre o Projeto

Este é um sistema web para cadastro e gerenciamento de usuários com diferentes níveis de acesso (Admin e Usuário comum). O projeto foi desenvolvido com foco na segurança, usabilidade e design moderno.

### 🎯 Principais Características

- **Interface Moderna**: Design responsivo com gradientes e animações suaves
- **Segurança Robusta**: Controle de acesso baseado em roles (Admin/User)
- **Validação Completa**: Validação de CPF, email e outros campos
- **Dashboard Interativo**: Painéis diferentes para admin e usuários comuns
- **Máscaras de Input**: Formatação automática para CPF e telefone
- **Containerização**: Execução simplificada com Docker

## ✨ Funcionalidades

### 👤 Para Usuários Comuns
- ✅ Visualizar e editar próprio perfil
- ✅ Dashboard personalizado com estatísticas pessoais
- ✅ Visualização de dados formatados (CPF, telefone)
- ✅ Impressão de dados pessoais

### 👨‍💼 Para Administradores
- ✅ Gerenciar todos os usuários do sistema
- ✅ Criar, editar e excluir usuários
- ✅ Dashboard administrativo com estatísticas do sistema
- ✅ Visualizar atividade recente
- ✅ Ações rápidas para gerenciamento

### 🔒 Segurança
- ✅ Autenticação obrigatória
- ✅ Usuários admin protegidos contra exclusão
- ✅ Controle de permissões por role
- ✅ Validação de CPF com algoritmo oficial
- ✅ Proteção contra acesso não autorizado

## 📋 Pré-requisitos

- Docker instalado
- Docker Compose instalado
- Porta 8000 disponível (aplicação)
- Porta 3306 disponível (MySQL)

## 🐳 Instalação com Docker

### 1. Clone o repositório
```bash
git clone https://github.com/AbadePetterson/usuarios_cadastro.git
cd usuarios_cadastro
```

### 2. Configure o ambiente
```bash
# Copie o arquivo de exemplo
cp .env.example .env
```

### 3. Execute com Docker
```bash
# Construa e execute os containers
docker-compose up --build

# Ou execute em background
docker-compose up -d --build
```

### 4. Acesse a aplicação
- **URL**: http://localhost:8000
- **Admin**: admin@sistema.com
- **Senha**: admin123

## 🔧 Comandos Docker Úteis

### Gerenciamento dos Containers
```bash
# Parar os containers
docker-compose down

# Ver status dos containers
docker-compose ps

# Ver logs da aplicação
docker-compose logs app

# Ver logs do banco
docker-compose logs db

# Acompanhar logs em tempo real
docker-compose logs -f
```

### Executar Comandos Laravel
```bash
# Entrar no container da aplicação
docker-compose exec app bash

# Executar migrations
docker-compose exec app php artisan migrate

# Executar seeders
docker-compose exec app php artisan db:seed

# Limpar cache
docker-compose exec app php artisan cache:clear

# Ver rotas
docker-compose exec app php artisan route:list
```

### Backup e Restauração
```bash
# Criar backup do banco
docker-compose exec db mysqldump -u root -proot usuarios_cadastro > backup.sql

# Restaurar backup
docker-compose exec -T db mysql -u root -proot usuarios_cadastro < backup.sql
```

### Resetar Banco de Dados
```bash
# Parar containers
docker-compose down

# Remover volume do banco (CUIDADO: apaga todos os dados!)
docker volume rm usuarios_cadastro_mysql_data

# Subir novamente
docker-compose up --build
```

## 📊 Estrutura dos Containers

### Container da Aplicação (`usuarios_cadastro_app`)
- **Imagem**: PHP 8.3 customizada
- **Porta**: 8000
- **Funcionalidades**:
  - Instala dependências automaticamente
  - Executa migrations
  - Cria usuários padrão
  - Serve a aplicação

### Container do Banco (`usuarios_cadastro_db`)
- **Imagem**: MySQL 8.0
- **Porta**: 3306
- **Configurações**:
  - Database: `usuarios_cadastro`
  - Usuário: `laravel_user`
  - Senha: `laravel_password`
  - Root password: `root`

## 💻 Instalação Local (Alternativa)

Caso prefira não usar Docker:

```bash
# 1. Clone o repositório
git clone https://github.com/AbadePetterson/usuarios_cadastro.git
cd usuarios_cadastro

# 2. Instale as dependências
composer install

# 3. Configure o ambiente
cp .env.example .env
php artisan key:generate

# 4. Configure o banco de dados no .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=usuarios_cadastro
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

# 5. Execute as migrações e seeders
php artisan migrate
php artisan db:seed

# 6. Inicie o servidor
php artisan serve
```

**Pré-requisitos para instalação local:**
- PHP 8.2+
- Composer
- MySQL 8.0+
- Node.js (opcional)

## 🏗️ Estrutura do Projeto

```
usuarios_cadastro/
├── app/
│   ├── Http/Controllers/     # Controladores
│   ├── Models/              # Modelos Eloquent
│   └── ...
├── database/
│   ├── migrations/          # Migrações do banco
│   └── seeders/            # Dados iniciais
├── resources/
│   └── views/              # Templates Blade
├── routes/
│   └── web.php             # Rotas da aplicação
├── docker-compose.yaml     # Configuração Docker
├── Dockerfile             # Imagem Docker
└── README.md              # Este arquivo
```

## 🔒 Segurança

- ✅ Senhas criptografadas com Hash
- ✅ Validação de CPF com algoritmo oficial
- ✅ Proteção contra SQL Injection
- ✅ Middleware de autenticação
- ✅ Controle de permissões por nível de usuário
- ✅ Validação server-side em todos os formulários
```

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

---

⭐ **Se este projeto foi útil para você, considere dar uma estrela!**

Desenvolvido com ❤️ usando Laravel e Docker
