# KidneyMate Backend

RESTful Backend API built with Laravel for managing
kidney health records including authentication,
fluid intake, blood pressure, weight monitoring,
medications, schedules, and health reports.

---

## Tech Stack

[![Laravel](https://img.shields.io/badge/LARAVEL-13-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.3+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MYSQL-LATEST-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![Eloquent](https://img.shields.io/badge/ELOQUENT-ORM-EA4335?style=for-the-badge)](https://laravel.com/docs/eloquent)
[![REST API](https://img.shields.io/badge/REST-API-14B8A6?style=for-the-badge)](https://restfulapi.net/)
[![Composer](https://img.shields.io/badge/COMPOSER-LATEST-885630?style=for-the-badge&logo=composer&logoColor=white)](https://getcomposer.org/)

---

## Preview

### Landing Page

![Landing](screenshots/landing.png)

---

### Authentication

- User Registration
- User Login
- User Logout
- Token-based Authentication using JWT
- Protected API Routes

### Health Management

- Fluid Intake Management
- Blood Pressure Records
- Weight Records
- Medication Management
- Scheduling

### Reports & Analytics

- Dashboard Summary API
- Health Insights API
- Monthly Health Reports API

### Account

- View Profile
- Update Profile
- Change Password

---

## Installation

Clone the repository

```bash
git clone https://github.com/yourFEdev/backend-kidneyMate.git
```

Move into the project

```bash
cd kidneymate-backend
```

Install dependencies

```bash
composer install
```

Copy the environment file

```bash
cp .env.example .env
```

Generate application key

```bash
php artisan key:generate
```

Configure your database inside the `.env` file.

Run migrations

```bash
php artisan migrate
```

Serve the application

```bash
php artisan serve
```

The API will be available at

```text
http://127.0.0.1:8000/api
```

---
