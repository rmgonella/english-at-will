# English At Will - Institutional Website

This is a complete institutional website project for the English teacher **English At Will**, developed using a pure PHP MVC architecture.

## 🚀 Technologies Used

- **Backend:** PHP 8.1+ (Pure, no frameworks)
- **Frontend:** HTML5, CSS3, JavaScript
- **Database:** MySQL
- **CSS Framework:** Bootstrap 5
- **Design:** Netflix-inspired Dark Mode

## 📂 Project Structure

- `/app`: Contains the application logic (Controllers, Models, Views, and Core).
- `/public`: Public folder with the entry point (`index.php`), CSS, JS, and images.
- `/config`: Database configuration files.
- `/sql`: Database creation script.

## 🛠️ Installation Guide

1. Clone or download the files to your server (Apache/Nginx).
2. Import the `/sql/database.sql` file into your MySQL server.
3. Configure the database credentials in `/config/database.php`.
4. Make sure the server is pointing to the `/public` folder or configure an `.htaccess` file to redirect routes.

## 🔐 Admin Panel

- **URL:** `your-domain.com/admin`
- **Default User:** `admin`
- **Default Password:** `admin123`

## ✨ Features

- Responsive and modern frontend.
- Dynamic testimonial system.
- Course and service management.
- Contact form with database storage and WhatsApp integration.
- Complete admin panel for content management.
- SQL Injection protection using PDO.
- Encrypted passwords.

Developer by Rodrigo Marchi Gonella
