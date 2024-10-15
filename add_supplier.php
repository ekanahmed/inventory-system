<?php
include('includes/auth.php');
include('includes/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $supplier_name = $_POST['supplier_name'];
    $contact_info = $_POST['contact_info'];
    $address = $_POST['address'];
    $rating = $_POST['rating'];

    // Insert supplier into the database
    $sql = "INSERT INTO suppliers (supplier_name, contact_info, address, rating)
            VALUES ('$supplier_name', '$contact_info', '$address', '$rating')";

    if ($conn->query($sql) === TRUE) {
        echo "Supplier added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Supplier</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form method="POST" action="">
        <h2>Add Supplier</h2>
        <label>Supplier Name:</label><br>
        <input type="text" name="supplier_name" required><br>
        <label>Contact Info:</label><br>
        <input type="text" name="contact_info"><br>
        <label>Address:</label><br>
        <input type="text" name="address"><br>
        <label>Rating (1-5):</label><br>
        <input type="number" name="rating" min="1" max="5" value="5"><br>
        <button type="submit">Add Supplier</button>
    </form>
</body>
</html>
