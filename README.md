<p align="center"> <a href="https://laravel.com" target="_blank"> <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"> </a> </p> <p align="center"> <a href="https://github.com/laravel/framework/actions"> <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"> </a> <a href="https://packagist.org/packages/laravel/framework"> <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"> </a> <a href="https://packagist.org/packages/laravel/framework"> <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"> </a> <a href="https://packagist.org/packages/laravel/framework"> <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"> </a> </p>

## 👤 Student Information
- **Full Name:** TAN, CHESKA MONIC L.  
- **Student ID:** 240000000378  

---

## 📦 Project Setup

Follow these steps to set up and run the project locally:

### 1️⃣ Install Dependencies
From your project folder, run:<br>

# Install PHP dependencies
`composer install`<br>

# Install Node.js dependencies
`npm install`<br>


---

### 2️⃣ Configure environment
Copy .env.example to .env and set your database details:

`cp .env.example .env`

Example .env configuration:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=book_inventory_db
DB_USERNAME=root
DB_PASSWORD= 
```

---

### 3️⃣ Generate Application Key
`php artisan key:generate`

---

### 4️⃣ Run Migrations
`php artisan migrate`

---

### 5️⃣ Serve the Project
`php artisan serve`

Visit http://127.0.0.1:8000 in your browser.


---

### The Bonus Tasked I attempted is:
1. Search Functionality
2. Soft Deletes
