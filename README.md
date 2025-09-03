<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# BlogSystem (Laravel + Livewire + Vite)

A Laravel application powered by **Laravel**, **Livewire**, and **Vite**.

---

## Requirements

- **PHP** ≥ 8.1  
- **Composer**  
- **Node.js** ≥ 18 and **npm**  
- **SQLite** (no separate database server required)  
- **Laragon** (optional, for PHP runtime & local dev environment)  

---

## Quick Start

### 1. Clone the repository
```bash
git clone https://github.com/<your-username>/<your-repo>.git BlogSystem
cd BlogSystem
```
### 2. Copy the environment file
- **Windows (PowerShell):**
```bash
copy .env.example .env
```
### 3. Configure SQLite in .env
```bash
DB_CONNECTION=sqlite
```

### 4. Create SQLite database file
- ** Windows (cmd):**
```bash
type nul > database/database.sqlite
```

### 5. Install PHP dependencies
```bash
composer install
```

### 6. Generate Application Key
```bash
php artisan key:generate
```

### 7. Run migrations
```bash
php artisan migrate
```

### 8. Install JavaScript dependencies
```bash
npm install
```

### 9. Run Vite (development)
```bash
npm run dev
```

### 10. Start Laravel server
```bash
php artisan serve
```
