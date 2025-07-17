<?php
/*include 'connection.php';



if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $address = $_POST['address'];

    $query = "INSERT INTO `users` (`name`,`phone`,`email`,`password`,`cpassword`,`address`) 
              VALUES ('$name','$phone','$email','$password','$cpassword','$address')";

    $res = mysqli_query($conn, $query);

    if (!$res) {
        echo "Error: " . mysqli_error($conn); // Show the error message for debugging
    }
}*/


if (isset($_POST['submit'])) {
    include 'connection.php';

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $address = $_POST['address'];

    // Optional: Check if email or phone already exists
    $check = "SELECT * FROM users WHERE email = ? OR phone = ?";
    $stmt = mysqli_prepare($conn, $check);
    mysqli_stmt_bind_param($stmt, "ss", $email, $phone);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email or phone already exists please try another!');</script>";
        
    } else {
            $query = "INSERT INTO users (name, phone, email, password, cpassword, address)
               VALUES (?, ?, ?, ?, ?, ?)";

            $stmt = mysqli_prepare($conn, $query);

// Must match 6 parameters
mysqli_stmt_bind_param($stmt, "ssssss", $name, $phone, $email, $password, $cpassword, $address);


        if ($stmt === false) {
            die("Prepare failed: " . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "ssssss", $name, $phone, $email, $password, $cpassword, $address);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Registered Successfully');</script>";

            // echo "<script>alert('Registered Successfully');</script>"; // Not reliable after redirect
            header("Location: login.php"); // Redirect to login after success
            exit;


        } else {
            echo "Execute failed: " . mysqli_stmt_error($stmt);
        }
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
   <style>         
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>

 


       <script>
                function register()
                {
                    var name=document.getElementById("name").value;
                    var phone=document.getElementById("phone").value;
                    var email=document.getElementById("email").value;
                    var password=document.getElementById("password").value;
                    var cpassword=document.getElementById("cpassword").value;                                          
                    var address=document.getElementById("address").value;

                    if(name==""|| phone=="" || email==""|| password==""|| cpassword==""|| address=="")
                    {
                      alert("ALL Fields Are Mendatory!");
                      return false;
                    }
                    else if(phone.length>10||phone.length<10)

                    {
                        alert("Mobile number should be 10 digit! please Enter valid Number");
                        return false;
                    }
                    else if(isNaN(phone))
                    {
                      alert("Enter only digit ! alphabet Not allowed!");
                      return false;
                    }
                    else if(password.length<6)
                    {
                      alert("Password shoulde be above 6 digit!");
                      return false;
                    }
                    else if(password!=cpassword)
                    {
                      alert("Password must be same");
                      return false;
                    }
                    else
                    {
                      alert("Registered SuccessFully! ");
                      header("Location: login.php");
                      exit;

                      return true;
                    }

                }
    
            </script>
<body>
    <div class="container">
        <h2 style="color: #007bff;">Create Account</h2>
        <form onsubmit="return register()" method="POST" action="index.php">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="phone">Phone number</label>
                <input type="text" id="phone" name="phone">
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="confirmpassword">Confirm Password</label>
                <input type="password" id="cpassword" name="cpassword">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address">
            </div>
      
            <input type="submit" value="Register" name="submit">
            If you Are Registred :
            <a href="login.php">Login</a>
        </form>
    </div>
</body>


</html>