<?php
include('includes/auth.php');
include('includes/db.php');

// Fetch all products
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Products</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* General Page Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #5cb85c;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .back-button {
            display: inline-block;
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
            Products List
        </div>

        <table>
            <tr>
                <th>Product ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Reorder Level</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['product_id']; ?></td>
                <td><?php echo $row['product_name']; ?></td>
                <td><?php echo $row['category']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['reorder_level']; ?></td>
            </tr>
            <?php } ?>
        </table>

        <a href="index.php" class="back-button">Back to Dashboard</a>
    </div>

</body>
</html>
