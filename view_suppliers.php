<?php
include('includes/auth.php');
include('includes/db.php');

// Fetch all suppliers
$sql = "SELECT * FROM suppliers";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Suppliers</title>
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
            Suppliers List
        </div>

        <table>
            <tr>
                <th>Supplier ID</th>
                <th>Name</th>
                <th>Contact Info</th>
                <th>Address</th>
                <th>Rating</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['supplier_id']; ?></td>
                <td><?php echo $row['supplier_name']; ?></td>
                <td><?php echo $row['contact_info']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['rating']; ?></td>
            </tr>
            <?php } ?>
        </table>

        <a href="index.php" class="back-button">Back to Dashboard</a>
    </div>

</body>
</html>
