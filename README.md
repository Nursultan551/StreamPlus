<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# StreamPlus Onboarding Application

This application is a multi-step onboarding wizard built with Laravel, Livewire, and Bootstrap 5. It collects user information across several steps, normalizes the data into separate tables (users, addresses, and payments), and preserves state using session-based persistence.

## Table of Contents

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Database Setup](#database-setup)
- [Running the Application](#running-the-application)
- [Deployment](#deployment)
- [Troubleshooting](#troubleshooting)

## Features

- Multi-step onboarding form with dynamic steps based on subscription type.
- Interactive UI using Livewire for real-time validation and state persistence.
- Normalized database design: separate tables for users, addresses, and payments.
- Session-based persistence to retain form data on refresh or back navigation.
- Bootstrap 5 for a responsive, modern UI.

## Requirements

- **PHP**: 8.2 or higher
- **Composer**: For dependency management
- **MySQL** (or another supported relational database)
- **Web Server**: Apache or Nginx (Not required if served locally)

## Installation

1. **Clone the Repository:**

   ```bash
   git clone https://github.com/Nursultan551/StreamPlus.git
   cd streamplus-onboarding
   ```

2. **Install Composer Dependencies:**

   ```bash
   composer install
   ```

## Configuration

1. **Environment File:**

   Copy the example environment file and update it:

   ```bash
   cp .env.example .env
   ```

2. **Generate Application Key:**

   ```bash
   php artisan key:generate
   ```

3. **Database Configuration:**

   In your `.env` file, set your database credentials:

   ```dotenv
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

4. **Session and Cache Configuration:**

   Make sure the session driver is set appropriately (e.g., `SESSION_DRIVER=database`).

## Database Setup

1. **Run Migrations:**

   This project uses three migrations to create the necessary tables:

   ```bash
   php artisan migrate
   ```

## Running the Application

- **Local Development:**

  Use Laravel’s built-in server:

  ```bash
  php artisan serve
  ```

  Your application will be accessible at `http://localhost:8000`.

## Deployment

I am not giving deployment instructions since it's not a production ready application, for security reasons


## Troubleshooting

- **Session Persistence:**

  If form state isn’t being retained, verify that your session driver is configured correctly.

- **Caching Issues:**

  If you encounter stale configurations, clear caches:

  ```bash
  php artisan cache:clear
  php artisan config:clear
  php artisan route:clear
  php artisan view:clear
  ```

- **Deployment Errors:**

  Check your web server logs (Apache/Nginx) and Laravel logs (`storage/logs/laravel.log`) for details on any errors during deployment.
