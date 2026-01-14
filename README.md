# Nikitos Web Application

A pixel-perfect, responsive web application for Nikitos, built with Laravel 12.

## Features
- **Public Site**: Landing page with Hero Slide, Product Grid (filtered by category), and Contact Form.
- **Admin Dashboard**: Secure area to manage Banners, Categories, Products, and view Contact Messages.
- **Responsive Design**: Optimized for Mobile, Tablet, and Desktop.

## Requirements
- PHP 8.2+
- Composer
- Node.js & NPM
- SQLite (enabled in PHP)

## Installation

1. **Clone the repository** (if not already done).
2. **Install Dependencies**:
   ```bash
   composer install
   npm install
   ```
3. **Environment Setup**:
   - `cp .env.example .env` (if needed, already set up)
   - Ensure `DB_CONNECTION=sqlite` and `database/database.sqlite` exists.
4. **Generate Key**:
   ```bash
   php artisan key:generate
   ```
5. **Run Migrations & Seeders**:
   ```bash
   php artisan migrate --seed
   ```
   *This creates the default Admin user.*
6. **Link Storage**:
   ```bash
   php artisan storage:link
   ```
7. **Compile Assets**:
   ```bash
   npm run build
   ```

## Usage

1. **Start Server**:
   ```bash
   php artisan serve
   ```
2. **Access Site**: `http://localhost:8000`
3. **Admin Login**:
   - URL: `http://localhost:8000/login`
   - Email: `admin@nikitos.com`
   - Password: `password`

## Project Structure
- `app/Models`: Banner, Category, Product, Message.
- `app/Http/Controllers/Admin`: Controllers for backend management.
- `app/Http/Controllers/Public`: Controllers for frontend.
- `resources/views/public`: Frontend Blade templates.
- `resources/views/admin`: Backend Blade templates.
