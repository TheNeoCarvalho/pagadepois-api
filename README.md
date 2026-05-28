# Pagadepois API

API de sistema de pagamentos.

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

# Instalar dependências PHP
composer install

# Configurar ambiente
cp .env.example .env
php artisan key:generate

# Criar banco SQLite (se for usar SQLite)
touch database/database.sqlite

# Executar migrations
php artisan migrate

## Executar

# Ou individualmente:
php artisan serve
```

## Testes

```bash
composer test
```
