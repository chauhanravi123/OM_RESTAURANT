<?php
// login.php
include 'connection.php';
// Assuming you have already connected to your database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Sample query (please sanitize and use prepared statements in production)
    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $res = mysqli_num_rows($result);

    if ($res > 0) {
        $data = mysqli_fetch_assoc($result);
        if ($data['password'] == $password) {
            $message = "LOGIN SUCCESSFULLY!";
            $color = "green";
            header("location:home.php");
        } else {
            $message = "Wrong password!";
            $color = "orange";
        }
    } else {
        $message = "Email not registered. Please register first!";
        $color = "red";

    }
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login GUI</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #74ebd5, #acb6e5);
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .login-box {
            background: #fff;
            padding: 40px 30px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-box h2 {
            margin-bottom: 25px;
            color: #333;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 6px;
            font-weight: 600;
            color: #444;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #6c63ff;
            outline: none;
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background: #6c63ff;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button[type="submit"]:hover {
            background: #574fd6;
        }

        .message {
            margin-top: 20px;
            font-weight: bold;
            color: #d8000c;
        }

        /* Responsive design */
        @media (max-width: 480px) {
            .login-box {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Login</h2>
    <form method="POST" action="login.php">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Enter your email" required>
         
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter your password" required>
        
        <button type="submit">Login</button>
        New User:
        <a href="index.php">Register</a>
    </form>

    <?php if (isset($message)): ?>
        <div class="message" style="color: <?= $color ?>;">
            <?= $message ?>
        </div>
    <?php endif; ?>
</div>

</body>
 
</html>
