<?php
include('includes/auth.php');
include('includes/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $reorder_level = $_POST['reorder_level'];

    // Insert product into the database
    $sql = "INSERT INTO products (product_name, category, quantity, price, reorder_level)
            VALUES ('$product_name', '$category', '$quantity', '$price', '$reorder_level')";

    if ($conn->query($sql) === TRUE) {
        echo "Product added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* General Page Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .title {
            font-size: 28px;
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"], input[type="number"] {
            padding: 10px;
            font-size: 16px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #4cae4c;
        }

        .back-button {
            display: block;
            margin-top: 20px;
            text-align: center;
            padding: 10px 20px;
            background-color: #5cb85c;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="title">
            Add New Product
        </div>

        <form method="POST" action="">
            <label>Product Name:</label>
            <input type="text" name="product_name" required>

            <label>Category:</label>
            <input type="text" name="category" required>

            <label>Quantity:</label>
            <input type="number" name="quantity" required>

            <label>Price:</label>
            <input type="number" step="0.01" name="price" required>

            <label>Reorder Level:</label>
            <input type="number" name="reorder_level" required>

            <button type="submit">Add Product</button>
        </form>

        <a href="index.php" class="back-button">Back to Dashboard</a>
    </div>

</body>
</html>
