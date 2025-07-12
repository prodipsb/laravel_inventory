#  Inventory Management System

A simple Laravel-based Inventory Management System that includes:

- ✅ Product CRUD (Create, Read, Update, Delete)
- ✅ Category CRUD with parent-child hierarchy
- ✅ Search and filter products by name, description, category, and price range
- ✅ Export filtered products to CSV
- ✅ Sidebar navigation with a clean UI using Bootstrap

---

## 🚀 Features

- Products with:
  - Name, Description, Category, Price, Quantity
- Categories with optional Parent Category (nested)
- Sidebar layout with page switching between Products and Categories
- Product filtering:
  - By name, description, category name
  - By price range
- Export filtered product list as CSV

---

## 🛠️ Tech Stack

- Laravel 12
- PHP 8.2
- Bootstrap 5
- Blade Templating

---

## ⚙️ Installation

```bash
git clone https://github.com/prodipsb/laravel_inventory.git
cd laravel_inventory
composer install
cp .env.example .env
php artisan key:generate
