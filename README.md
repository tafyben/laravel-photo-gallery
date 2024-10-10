<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel Photo Gallery

This is a simple photo gallery application built with **Laravel 11**, **Spatie Media Library**, and **Tailwind CSS**.

## Installation

Follow these steps to get your Laravel Photo Gallery up and running:

### Prerequisites

Make sure you have the following installed:

- PHP (>= 8.1)
- Composer
- Laravel Installer (optional)

### Step 1: Clone the Repository

Clone the project to your local machine:

```bash
git clone https://github.com/yourusername/laravel-photo-gallery.git

cd laravel-photo-gallery
```
### Step 2: Create the Environment File
```bash
cp .env.example .env
php artisan key:generate

```
### Step 3: Set Up Database
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password


```
### Step 4: Run Migrations
```bash
php artisan migrate


```

### Step 5: Install Spatie Media Library
```bash
composer require spatie/laravel-medialibrary
php artisan vendor:publish --provider="Spatie\MediaLibrary\MediaLibraryServiceProvider"



```

### Step 6: Serve the Application
```bash
php artisan serve


```
Your application should now be running at http://localhost:8000.
