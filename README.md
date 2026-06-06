# Loop API (Backend)

Loop API is a Laravel-based backend to let multiple users create and manage their own APIs/endpoints and submit JSON or categorized data. This repository will host the backend: role-based auth, cookie-based (Sanctum) authentication for frontends, and API management scaffolding.

Quick overview
- Framework: Laravel 12 (PHP 8.2)
- Auth: Laravel Sanctum (cookie-based SPA authentication)
- DB: MySQL / MariaDB (configurable)

Quick start (recommended local path)

1. Install dependencies and create a Laravel 12 project in this folder (requires Composer and PHP 8.2):

```bash
# from repository root
composer create-project laravel/laravel . "^12.0" --prefer-dist
composer install
cp .env.example .env
php artisan key:generate
```

2. Run with Docker (optional): see `docker-compose.yml` and `Dockerfile`.

3. After Laravel installation, run migrations and install Sanctum:

```bash
php artisan migrate
composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\\Sanctum\\SanctumServiceProvider"
```

What I added now
- Project scaffold files: README.md, SECURITY.md, DATABASE.md, ARCHITECTURE.md, docker-compose.yml, Dockerfile, .env.example
- Basic Laravel skeleton files: `app/Models/User.php`, `app/Http/Controllers/AuthController.php`, `routes/api.php`, `routes/web.php`, `database/migrations/2026_06_06_000000_create_users_table.php` (placeholders)

Next steps I can run for you
- Install Laravel into this folder (`composer create-project`) and configure Sanctum.
- Implement role-based middleware, full migrations, and API endpoint scaffolding.

If you want, I can now install Laravel here and wire Sanctum + role-based auth.
