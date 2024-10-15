<?php
include('includes/db.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            header('Location: index.php');
        } else {
            echo "Invalid Password!";
        }
    } else {
        echo "No user found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
        /* General Body Styling */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Login Container */
        .login-container {
            background-color: white;
            padding: 40px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
        }

        .login-container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 28px;
        }

        /* Form Styling */
        .login-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        label {
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"], input[type="password"] {
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        /* Button Styling */
        button {
            padding: 12px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Error Message */
        .error {
            color: #dc3545;
            font-size: 14px;
            text-align: center;
            margin-bottom: 15px;
        }

        /* Links */
        .login-container a {
            display: block;
            margin-top: 10px;
            text-align: center;
            color: #007bff;
            text-decoration: none;
        }

        .login-container a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .login-container {
                padding: 20px;
            }
        }
    </style>
<body>
<div class="login-container">
        <h2>Login</h2>

        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form class="login-form" method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <button type="submit">Login</button>
        </form>

        <a href="register.php">Don’t have an account? Register here.</a>
    </div>
</body>
</html>
