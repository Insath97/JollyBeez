# Jolly Bees - E-Commerce Website

**Jolly Bees** is a comprehensive food ordering e-commerce platform featuring both an **admin panel** and a **user panel**. Admins can manage products, categories, and orders, while customers can register, browse products, add items to their cart, and complete their orders with checkout.

---

## Features

### Admin Panel
- **Admin Login**: Secure login for admins.
- **Manage Products**: Add, edit, and delete products.
- **Manage Categories**: Create, modify, and delete product categories.
- **Order Management**: View and update order statuses (Pending, Paid, Shipped).
- **Sales Reports**: View detailed sales analytics.

### User Panel
- **User Registration and Login**: Customers can register and log in.
- **Browse Products**: Users can view and search all products by category.
- **Add to Cart**: Customers can add products to their shopping cart.
- **Order Checkout**: Review cart and place orders securely.
- **Order History**: Users can view previous orders and track status.

---

## Technologies Used
- **Frontend**: HTML, CSS, Bootstrap, JavaScript
- **Backend**: PHP
- **Database**: MySQL
- **Version Control**: Git

---

## Installation Guide

### Method 1: Using Git

1. Clone the repository to your local machine:
    ```bash
    git clone https://github.com/your-username/jolly-bees.git
    ```

2. Navigate to the project directory:
    ```bash
    cd jolly-bees
    ```

3. Initialize the database:
    - Create a new MySQL database (e.g., `jolly_bees_db`).
    - Import the SQL file located in the `/database` folder (`jolly_bees.sql`):
    ```sql
    CREATE DATABASE jolly_bees_db;
    USE jolly_bees_db;
    SOURCE /path/to/jolly_bees.sql;
    ```

4. Configure the database connection:
    - Edit the `config.php` file with your database credentials:
    ```php
    // config.php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'your-database-username');
    define('DB_PASS', 'your-database-password');
    define('DB_NAME', 'jolly_bees_db');
    ```

5. Start a PHP server:
    ```bash
    php -S localhost:8000
    ```

6. Open your web browser and go to `http://localhost:8000` to view the application.

### Method 2: Download and Manual Setup

1. Download the repository as a ZIP file and extract it to your local machine.

2. Navigate to the extracted folder in your terminal or command prompt.

3. Initialize the database (as detailed in Method 1).

4. Configure the database connection (as detailed in Method 1).

5. Start a PHP server (as detailed in Method 1).

6. Open your web browser and go to `http://localhost:8000` to view the application.

---

## Usage

- Once the application is running, you can perform various operations:
  - **Admin Panel**: Manage products, categories, and orders.
  - **User Panel**: Browse products, add to cart, and complete orders.

### Default Admin Credentials
- **Username**: `admin`
- **Password**: `admin123`

---

## Folder Structure
```plaintext
jolly-bees/
│
├── admin/                  # Admin panel files
├── assets/                 # CSS, JS, images
├── config.php              # Database connection settings
├── database/               # SQL file for database setup
├── includes/               # Common include files
├── user/                   # User-facing panel
└── README.md               # Documentation (this file)

## How to Contribute

1. **Fork the repository**.

2. **Create a new branch**:
    ```bash
    git checkout -b feature-branch
    ```

3. **Commit your changes**:
    ```bash
    git commit -m "Add new feature"
    ```

4. **Push to your branch**:
    ```bash
    git push origin feature-branch
    ```

5. **Create a Pull Request** for review.

---

## License

This project is licensed under the MIT License. You can modify and distribute the code as needed.

---

## Contact

For questions or support, please contact:

- **Email**: insath1997.mi@gmail.com
- **GitHub**: [Your GitHub Profile](https://github.com/your-username)
