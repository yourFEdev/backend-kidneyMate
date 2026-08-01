# KidneyMate Backend

Backend REST API for **KidneyMate**, a health monitoring application designed to help hemodialysis patients manage their daily health records, medications, appointments, and overall treatment progress.

Built with **Laravel 13** and **JWT** for secure API authentication.

---

## Tech Stack

[![Laravel](https://img.shields.io/badge/LARAVEL-13-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MYSQL-LATEST-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![Eloquent](https://img.shields.io/badge/ELOQUENT-ORM-EA4335?style=for-the-badge)](https://laravel.com/docs/eloquent)
[![REST API](https://img.shields.io/badge/REST-API-14B8A6?style=for-the-badge)](https://restfulapi.net/)
[![Composer](https://img.shields.io/badge/COMPOSER-LATEST-885630?style=for-the-badge&logo=composer&logoColor=white)](https://getcomposer.org/)

---

## Features

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
- Appointment Scheduling

### Reports & Analytics

- Dashboard Summary API
- Health Insights API
- Monthly Health Reports API

### Account

- View Profile
- Update Profile
- Change Password

---

## Tech Stack

- Laravel 13
- PHP 8.2+
- JWT
- MySQL
- Eloquent ORM

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

## API Modules

### Authentication

- POST `/register`
- POST `/login`
- POST `/logout`

### Profile

- GET `/profile`
- PUT `/profile`
- PUT `/profile/password`

### Fluid Intake

- GET `/fluid-intakes`
- POST `/fluid-intakes`
- GET `/fluid-intakes/{id}`
- PUT `/fluid-intakes/{id}`
- DELETE `/fluid-intakes/{id}`

### Blood Pressure

- GET `/blood-pressures`
- POST `/blood-pressures`
- GET `/blood-pressures/{id}`
- PUT `/blood-pressures/{id}`
- DELETE `/blood-pressures/{id}`

### Weight Records

- GET `/weight-records`
- POST `/weight-records`
- GET `/weight-records/{id}`
- PUT `/weight-records/{id}`
- DELETE `/weight-records/{id}`

### Medications

- GET `/medications`
- POST `/medications`
- GET `/medications/{id}`
- PUT `/medications/{id}`
- DELETE `/medications/{id}`

### Appointments

- GET `/appointments`
- POST `/appointments`
- GET `/appointments/{id}`
- PUT `/appointments/{id}`
- DELETE `/appointments/{id}`

### Dashboard

- GET `/dashboard`

### Insights

- GET `/insights`

### Reports

- GET `/reports`

---

## API Response Format

### Success

```json
{
    "status": true,
    "message": "Data fetched successfully.",
    "data": {}
}
```

### Error

```json
{
    "status": false,
    "message": "You are not allowed to access this resource."
}
```

---
