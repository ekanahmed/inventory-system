<?php
session_start();
// Ensure user is logged in, otherwise redirect to login
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        /* General Body Styling */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
        }

        /* Header */
        header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 24px;
        }

        /* Navigation Menu */
        nav {
            display: flex;
            justify-content: center;
            background-color: #333;
            padding: 10px 0;
        }

        nav a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #555;
        }

        /* Main Content Area */
        .content {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 40px;
        }

        .card {
            background-color: white;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            width: 300px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card h3 {
            margin-bottom: 20px;
            font-size: 20px;
        }

        .card a {
            display: block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        .card a:hover {
            background-color: #0056b3;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 20px;
            background-color: #333;
            color: white;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .content {
                flex-direction: column;
                padding: 20px;
            }

            .card {
                width: 100%;
                max-width: 500px;
            }
        }
    </style>
</head>
<body>

<header>
    Welcome, <?php echo $_SESSION['username']; ?>!
</header>

<nav>
    <a href="view_products.php">View Products</a>
    <a href="add_product.php">Add Product</a>
    <a href="view_suppliers.php">View Suppliers</a>
    <a href="add_supplier.php">Add Supplier</a>
    <a href="logout.php">Logout</a>
</nav>

<div class="content">
    <div class="card">
        <h3>View Products</h3>
        <p>Manage and track all the products in your inventory.</p>
        <a href="view_products.php">Go to Products</a>
    </div>

    <div class="card">
        <h3>Add New Product</h3>
        <p>Add new items to your inventory.</p>
        <a href="add_product.php">Add Product</a>
    </div>

    <div class="card">
        <h3>View Suppliers</h3>
        <p>View and manage your list of suppliers.</p>
        <a href="view_suppliers.php">Go to Suppliers</a>
    </div>

    <div class="card">
        <h3>Add Supplier</h3>
        <p>Add new suppliers to your inventory system.</p>
        <a href="add_supplier.php">Add Supplier</a>
    </div>
</div>

<footer>
    Inventory Management System © 2024
</footer>

</body>
</html>
