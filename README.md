# Laravel Technical Assessment

## Overview

This repository contains my solution for a technical assessment developed with **Laravel**.

The objective of the challenge was to demonstrate backend development skills by implementing a small business application with common enterprise features such as product management, order processing, inventory control, and discount handling.

Rather than focusing on visual design, the project emphasizes clean architecture, Laravel best practices, and business logic implementation.

---

## Features

* Product Management
* Order Management
* Coupon Management
* Inventory Control
* CRUD Operations
* Database Relationships
* Business Rules Implementation

---

## Technology Stack

* PHP
* Laravel
* MySQL
* Blade Templates
* Composer
* Eloquent ORM

---

## Skills Demonstrated

* Laravel Framework
* MVC Architecture
* RESTful Development
* CRUD Operations
* Database Modeling
* Business Logic
* Authentication
* Routing
* Eloquent ORM
* Blade Templates
* Form Validation
* Service Layer Organization

---

## Project Structure

```text
app/
├── Http/
│   ├── Controllers
│   └── Middleware
├── Models
├── Providers
└── Services

database/
├── migrations
└── seeders

resources/
├── views
└── js

routes/
├── web.php
└── api.php
```

---

## Local Development

### Requirements

* PHP 8+
* Composer
* Node.js
* MySQL or MariaDB

### Installation

Clone the repository.

```bash
git clone <repository-url>
```

Install PHP dependencies.

```bash
composer install
```

Create the environment configuration.

```bash
cp .env.example .env
```

Generate the application key.

```bash
php artisan key:generate
```

Configure the database connection inside `.env`.

Run database migrations.

```bash
php artisan migrate
```

Install frontend dependencies.

```bash
npm install
npm run dev
```

Start the development server.

```bash
php artisan serve
```

The application will be available at:

```
http://localhost:8000
```

---

## Testing

Run the automated test suite:

```bash
./vendor/bin/phpunit
```

---

## Purpose

This repository represents a completed technical assessment preserved as part of my software engineering portfolio.

It demonstrates practical experience with Laravel application development, including backend architecture, business rules implementation, database modeling, and common enterprise development patterns.

---

## License

This project is available under the MIT License.
