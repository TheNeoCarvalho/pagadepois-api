# Pagadepois API

API de sistema de pagamentos construída com Laravel 13 e Sanctum para autenticação via tokens.

## Requisitos

- PHP ^8.3
- Composer
- Node.js e NPM
- SQLite (padrão) ou MySQL/PostgreSQL

## Instalação

```bash
# Clone o repositório
git clone <url-do-repositorio> pagadepois-api
cd pagadepois-api

# Setup completo (dependências, .env, key, migrations, frontend)
composer setup

# Ou passo a passo:
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install && npm run build
```

## Desenvolvimento

```bash
# Sobe servidor + queue + logs + Vite em paralelo
composer dev
```

## Testes

```bash
composer test
```

## Endpoints da API

### Autenticação

| Método | Rota | Autenticação | Descrição |
|--------|------|-------------|-----------|
| `POST` | `/api/auth/register` | — | Cadastro de usuário |
| `POST` | `/api/auth/login` | — | Login |
| `GET` | `/api/auth/me` | `auth:sanctum` | Dados do usuário logado |
| `POST` | `/api/auth/logout` | `auth:sanctum` | Logout (invalida token) |

### Exemplos de requisição

**Cadastro:**

```bash
curl -X POST http://localhost:8000/api/auth/register \
  -H "Content-Type: application/json" \
  -d '{"name":"João","email":"joao@email.com","password":"12345678"}'
```

**Login:**

```bash
curl -X POST http://localhost:8000/api/auth/login \
  -H "Content-Type: application/json" \
  -d '{"email":"joao@email.com","password":"12345678"}'
```

**Usar token retornado nas rotas protegidas:**

```bash
curl http://localhost:8000/api/auth/me \
  -H "Authorization: Bearer <token>"
```

**Logout:**

```bash
curl -X POST http://localhost:8000/api/auth/logout \
  -H "Authorization: Bearer <token>"
```

### Respostas

Todas as respostas da API são em JSON e mensagens em português.

| Status | Significado |
|--------|-------------|
| `200` | Sucesso |
| `201` | Recurso criado |
| `401` | Credenciais inválidas |
| `422` | Erro de validação |

## Configuração

| Variável | Padrão | Descrição |
|----------|--------|-----------|
| `DB_CONNECTION` | `sqlite` | Driver do banco |
| `CORS_ALLOWED_ORIGINS` | `http://localhost:8081` | Origem permitida para CORS |

## Estrutura do projeto

```
app/Http/Controllers/AuthController.php   # Lógica de autenticação
app/Models/User.php                        # Modelo de usuário
routes/api.php                             # Rotas da API
config/cors.php                            # Configuração CORS
database/migrations/                       # Migrations do banco
tests/                                     # Testes
```

## Stack

- **Laravel 13** — framework PHP
- **Sanctum 4** — autenticação por token
- **SQLite** — banco de dados padrão
- **Vite + Tailwind CSS 4** — frontend (asset bundling)
