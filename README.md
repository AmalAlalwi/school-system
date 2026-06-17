# School Management System

A modern, professional school management system built with Laravel 12, AdminLte package, and Laravel components for a seamless user experience. This system efficiently manages students, teachers, classrooms, and user authentication with a powerful admin dashboard.

---

## 📋 Table of Contents

- [Features](#features)
- [Technologies Stack](#technologies-stack)
- [Requirements](#requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Project Structure](#project-structure)
- [Authentication](#authentication)
- [Components & Views](#components--views)
- [AdminLte Package](#adminlte-package)
- [Database Schema](#database-schema)
- [Routes](#routes)
- [Development Commands](#development-commands)
- [Testing](#testing)
- [Troubleshooting](#troubleshooting)
- [Contributing](#contributing)
- [License](#license)

---

## ✨ Features

- **User Authentication**: Secure login, registration, and password reset via Laravel Breeze
- **Student Management**: Add, update, delete, and manage student records and information
- **Teacher Management**: Add, update, delete, and manage teacher records and information
- **Classroom Management**: Create and organize classrooms, assign teachers and students
- **Professional Dashboard**: AdminLte-powered admin dashboard with statistics and overview
- **Component-Based Views**: Reusable Laravel components for consistent UI/UX
- **Database Seeders**: Quick database population with sample data

---

## 🛠 Technologies Stack

### Backend
- **Laravel 12.x** - Modern PHP web framework
- **Laravel Breeze** - Authentication scaffolding with login & registration
- **Laravel Tinker** - Interactive shell for development

### Frontend
- **AdminLte** - Professional admin dashboard template
- **Blade Templating** - Laravel template engine
- **Bootstrap** 

### Database
- **MySQL** - Relational database (configurable)
- **Eloquent ORM** - Object-relational mapping


## 📦 Requirements

- **PHP**: 8.2 or higher
- **Composer**: Latest version
- **Node.js**: 18.x or higher
- **npm**: 9.x or higher
- **MySQL**: 8.0+ 
- **Git**: For version control

---

## 🚀 Installation

### Step 1: Clone the Repository

```bash
git clone <https://github.com/AmalAlalwi/school-system.git>
cd school-system
```

### Step 2: Install PHP Dependencies

```bash
composer install
```

### Step 3: Install Node.js Dependencies

```bash
npm install
```

### Step 4: Setup Environment File

```bash
# Copy the example environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### Step 5: Configure Database

Edit the `.env` file with your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=school_system
DB_USERNAME=root
DB_PASSWORD=your_password
```

### Step 6: Run Database Migrations

```bash
# Run all migrations
php artisan migrate

# Seed the database with sample data (optional)
php artisan db:seed
```

### Step 7: Build Frontend Assets

```bash
# Development mode
npm run dev

### Step 8: Start Development Server

```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser.

---

## ⚙️ Configuration

### Key Configuration Files

- **`.env`** - Environment variables and sensitive data
- **`config/app.php`** - Application settings
- **`config/auth.php`** - Authentication configuration
- **`config/database.php`** - Database connections
- **`config/mail.php`** - Email settings (for password resets)
- **`tailwind.config.js`** - Tailwind CSS customization
- **`vite.config.js`** - Vite build configuration

### Application Settings

Update timezone in `config/app.php`:

```php
'timezone' => 'UTC', // Change as needed
```

---

## 📁 Project Structure

```
school-system/
├── app/
│   ├── Http/
│   │   ├── Controllers/          # Application controllers
│   │   └── Requests/             # Form validation requests
│   ├── Models/                   # Eloquent models
│   │   ├── User.php
│   │   ├── Student.php
│   │   ├── Teacher.php
│   │   └── Classroom.php
│   ├── View/
│   │   └── Components/           # Reusable Laravel components
│   │       ├── AppLayout.php     # Main app layout component
│   │       ├── FrontLayout.php   # Front-end layout
│   │       ├── GuestLayout.php   # Guest/auth layout
│   │       └── Nav.php           # Navigation component
│   └── Providers/
│       └── AppServiceProvider.php
├── config/                       # Configuration files
├── database/
│   ├── factories/                # Model factories for testing
│   ├── migrations/               # Database migrations
│   └── seeders/                  # Database seeders
├── resources/
│   ├── css/
│   │   └── app.css              # Main stylesheet (Tailwind)
│   ├── js/
│   │   ├── app.js               # Main application script
│   │   └── bootstrap.js         # Bootstrap script
│   └── views/                   # Blade templates
│       ├── auth/                # Authentication pages
│       ├── components/          # View components
│       ├── dashboard/           # Dashboard pages
│       ├── layouts/             # Layout templates
│       ├── profile/             # Profile pages
│       └── welcome.blade.php
├── routes/
│   ├── web.php                  # Web routes
│   ├── auth.php                 # Authentication routes (Breeze)
│   ├── dashboard.php            # Dashboard routes
│   └── console.php              # Artisan commands
├── storage/                     # Application storage
├── tests/                       # Test files (Pest)
│   ├── Feature/                 # Feature tests
│   └── Unit/                    # Unit tests
├── public/                      # Public assets
├── vendor/                      # Composer dependencies
├── .env.example                 # Example environment file
├── artisan                      # Laravel CLI
├── composer.json                # PHP dependencies
├── package.json                 # Node dependencies
├── tailwind.config.js           # Tailwind configuration
├── vite.config.js               # Vite configuration
└── README.md                    # This file
```

---

## 🔐 Authentication

This project uses **Laravel Breeze** for authentication scaffolding.

### Available Features

- User registration
- Login with "Remember Me" option

### Authentication Routes

```
POST   /login              # Submit login form
GET    /login              # Show login page
POST   /logout             # Logout user
GET    /register           # Show registration page
POST   /register           # Submit registration form
GET    /forgot-password    # Show password reset request
POST   /forgot-password    # Submit password reset request
GET    /reset-password     # Show password reset form
POST   /reset-password     # Submit new password
```
### AdminLte Features Utilized

- **Responsive Dashboard**: Works on desktop, tablet, and mobile
- **Pre-built Components**: Buttons, cards, tables, forms, charts
- **Modern Styling**: Professional and clean UI
- **Customizable Themes**: Dark mode and light mode support
- **Layout Options**: Fixed, static, and sidebar variations
- **Navigation**: Sidebar and top navigation components




## 🎯 Quick Start Summary

```bash
# Clone & setup
git clone https://github.com/AmalAlalwi/school-system.git
cd school-system

# Install dependencies
composer install
npm install

# Configure environment
cp .env.example .env
php artisan key:generate

# Setup database
php artisan migrate --seed

# Run development server
php artisan serve
npm run dev

# Visit http://localhost:8000
```

---

**Happy coding! 🚀**

Last Updated: June 17, 2026
