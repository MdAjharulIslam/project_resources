# 📦 Laravel CRUD Application

A complete **Create, Read, Update, Delete (CRUD)** application built with **Laravel**. This project demonstrates full resource management using Laravel's MVC architecture, Eloquent ORM, and RESTful routing.

---

## 🚀 Features

- Create new records via a form
- List all records with pagination
- View individual record details
- Update existing records
- Delete records with confirmation
- Form validation (server-side)
- Flash messages for success/error feedback
- Clean RESTful routes using Laravel Resource Controllers

---

## 🛠️ Tech Stack

| Layer        | Technology              |
|--------------|-------------------------|
| Framework    | Laravel 10.x / 11.x     |
| Language     | PHP 8.1+                |
| Database     | MySQL / PostgreSQL       |
| ORM          | Eloquent                |
| Frontend     | Blade Templates         |
| Styling      | Bootstrap 5 / Tailwind  |
| Auth (opt.)  | Laravel Breeze / Sanctum |

---

## 📋 Requirements

Before you begin, make sure your environment has:

- PHP >= 8.1
- Composer
- MySQL or PostgreSQL
- Node.js & NPM (for frontend assets)
- Laravel CLI (`composer global require laravel/installer`)

---

## ⚙️ Installation

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/your-repo-name.git
cd your-repo-name
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 4. Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

### 5. Configure the Database

Open `.env` and update your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 6. Run Migrations

```bash
php artisan migrate
```

### 7. (Optional) Seed the Database

```bash
php artisan db:seed
```

### 8. Start the Development Server

```bash
php artisan serve
```

Visit **http://localhost:8000** in your browser.

---

## 📁 Project Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   └── ItemController.php      # CRUD controller
│   └── Requests/
│       └── StoreItemRequest.php    # Form validation
├── Models/
│   └── Item.php                    # Eloquent model
database/
├── migrations/
│   └── xxxx_create_items_table.php
├── seeders/
│   └── ItemSeeder.php
resources/
└── views/
    └── items/
        ├── index.blade.php         # List all items
        ├── create.blade.php        # Create form
        ├── edit.blade.php          # Edit form
        └── show.blade.php          # Single item view
routes/
└── web.php                         # Resource routes
```

---

## 🔁 CRUD Routes

The following RESTful routes are registered via `Route::resource()`:

| Method    | URI                  | Action    | Description              |
|-----------|----------------------|-----------|--------------------------|
| GET       | `/items`             | index     | List all items           |
| GET       | `/items/create`      | create    | Show create form         |
| POST      | `/items`             | store     | Save new item            |
| GET       | `/items/{id}`        | show      | View a single item       |
| GET       | `/items/{id}/edit`   | edit      | Show edit form           |
| PUT/PATCH | `/items/{id}`        | update    | Update existing item     |
| DELETE    | `/items/{id}`        | destroy   | Delete an item           |

Registered in `routes/web.php`:

```php
Route::resource('items', ItemController::class);
```

---

## 🧠 Controller Overview

```php
// app/Http/Controllers/ItemController.php

public function index()      // GET    /items
public function create()     // GET    /items/create
public function store()      // POST   /items
public function show($id)    // GET    /items/{id}
public function edit($id)    // GET    /items/{id}/edit
public function update($id)  // PUT    /items/{id}
public function destroy($id) // DELETE /items/{id}
```

---

## 🗄️ Database Migration

```php
Schema::create('items', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->text('description')->nullable();
    $table->decimal('price', 8, 2)->nullable();
    $table->timestamps();
});
```

Run the migration:

```bash
php artisan migrate
```

To rollback:

```bash
php artisan migrate:rollback
```

---

## ✅ Validation Rules

Form requests are validated using Laravel's `StoreItemRequest`:

```php
public function rules(): array
{
    return [
        'name'        => 'required|string|max:255',
        'description' => 'nullable|string',
        'price'       => 'nullable|numeric|min:0',
    ];
}
```

---

## 🧪 Running Tests

```bash
php artisan test
```

Or with a specific test file:

```bash
php artisan test --filter ItemTest
```

---

## 🌐 API Endpoints (Optional)

If API routes are included, they are available under `/api/`:

| Method | Endpoint         | Description         |
|--------|------------------|---------------------|
| GET    | `/api/items`     | Fetch all items     |
| POST   | `/api/items`     | Create a new item   |
| GET    | `/api/items/{id}`| Get single item     |
| PUT    | `/api/items/{id}`| Update an item      |
| DELETE | `/api/items/{id}`| Delete an item      |

---

## 🔐 Authentication (Optional)

If authentication is enabled via Laravel Breeze:

```bash
composer require laravel/breeze --dev
php artisan breeze:install
npm install && npm run dev
php artisan migrate
```

---


## 🤝 Contributing

1. Fork the repository
2. Create a new branch: `git checkout -b feature/your-feature`
3. Commit your changes: `git commit -m "Add some feature"`
4. Push to the branch: `git push origin feature/your-feature`
5. Open a Pull Request

---

## 📄 License

This project is open-sourced under the [MIT License](LICENSE).

---


> Built with ❤️ using [Laravel](https://laravel.com)