<?php
session_start();
include 'connection.php';  // $conn = new mysqli(...);
if(isset($_POST['submit']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql="SELECT * FROM `users` where `email`='$email' || `password`='$password'";
    $result=mysqli_query($conn,$sql);

    if($result)
    {
        echo "LOGIN SUCCESSFULLY!";
    }
    else
    {
        echo "Invalid Login credentials";
    }
}

   


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <script>
                    function login()
                {
                   
                    var email=document.getElementById("email").value;
                    var password=document.getElementById("password").value;

                    if(email==""||password=="")
                    {
                        alert("All Fields Are Mendatory!");
                        return false;
                    }
                    else if(password.length<6)
                    {
                        alert("Password Should above 6 character!");
                        return false;
                    }
                    else
                    {
                        alert("Login SuccessFully!");
                        return true;
                    }

                }
                

  </script>
  <style>
    body {font-family: Arial; background:#f4f4f4; display:flex; justify-content:center;align-items:center;height:100vh;}
    .container {background:#fff;padding:20px;border-radius:5px;box-shadow:0 2px 5px rgba(0,0,0,.1);width:300px;}
    .form-group {margin-bottom:15px;}
    input {width:100%;padding:8px;border:1px solid #ccc;border-radius:4px;}
    input:focus {border-color:#007BFF; outline:none;}
    .error {color:#d9534f;font-size:0.9em;}
    .success {color:#28a745;font-size:1em;text-align:center;margin-bottom:10px;}
    button {width:100%;padding:10px;background:#007BFF;color:#fff;border:none;border-radius:4px;cursor:pointer;}
    button:hover {background:#0056b3;}
  </style>
</head>
<body>
  <div class="container">

    <form action="login.php" method="post" onsubmit="return login()">
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" required>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" required>
        
      </div>
      <button type="submit" name="submit">Login</button>
    </form>
  </div>
</body>
</html>

