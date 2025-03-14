# 🚀 Laravel 11 API Setup Guide

Welcome to the **Laravel 11 API** project! This guide walks you through setting up the project, configuring the database, and handling CRUD operations for products.

---

## 📌 Prerequisites

Before you begin, ensure you have the following installed:
- PHP 8.2+
- Composer
- MySQL
- Laravel Installer (optional)

---

## 🔥 Step 1: Create a New Laravel 11 Project

Run the following command:
```bash
composer create-project laravel/laravel project-name
```

---

## 🛠 Step 2: Configure the Database

Laravel 11 uses SQLite by default. Change it to MySQL in the `.env` file:

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

✅ **Ensure you have created a database** in MySQL before proceeding.

---

## 🌐 Step 3: Create API Authentication

Install Laravel API authentication:
```bash
php artisan install:api
```

Update `config/auth.php` to add API authentication:
```php
'api' => [
    'driver' => 'passport',
    'provider' => 'users',
],
```

---

## 🏗 Step 4: Create Migration Tables

Generate a migration file for your database:
```bash
php artisan make:migration create_products_table
```

Run all migrations:
```bash
php artisan migrate
```

Run a specific migration file:
```bash
php artisan migrate --path=database/migrations/2024_05_09_111656_add_username_to_users_table.php
```

---

## 🎮 Step 5: Create a Controller & Model

Generate a **resource controller** with a model:
```bash
php artisan make:controller ProductController --model=Product
```

Generate a controller with CRUD functionality:
```bash
php artisan make:controller ProductController --resource --model=Product
```

---

## 🔍 Step 6: Create a Request Validation File

Generate a request file:
```bash
php artisan make:request ProductRequest
```

**Use the request class in your controller methods:**
```php
public function store(ProductRequest $request) {
    // Handle validated data
}
```

---

## 📡 Step 7: Create a Resource File for API Response

Generate an API resource:
```bash
php artisan make:resource ProductResource
```

**Use the resource in your controller response:**
```php
return new ProductResource($product);
```

---

## 📬 API Endpoints

| Method | Endpoint | Description |
|--------|---------|-------------|
| `GET` | `/api/products` | Fetch all products |
| `POST` | `/api/products` | Create a new product |
| `GET` | `/api/products/{id}` | Get product details |
| `PUT` | `/api/products/{id}` | Update a product |
| `DELETE` | `/api/products/{id}` | Delete a product |

---

## 🎨 Interactive API Testing

Use **Postman** or **Insomnia** to test API routes with:
- `Authorization: Bearer {TOKEN}` for authentication
- JSON payloads for `POST` and `PUT` requests

---

## 📌 Final Notes

- Run `php artisan serve` to start the Laravel development server.
- Use **Laravel Telescope** for debugging API requests.
- Deploy using **Laravel Forge**, **Heroku**, or **VPS hosting**.

🎉 **Congratulations! Your Laravel 11 API is ready.** 🚀

