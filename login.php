<?php  
    include "connection.php";
   if (isset($_POST['submit']))
      {
         $email =$_POST['email'];
         $password= $_POST['password'];

         $sql= "select * from users where email='$email'";
         $result = mysqli_query($conn,$sql);

         if(!$result)
           {
               echo "Error! :{$conn->error}";

           }
        else
           {
             if($result->num_rows>0)
              {
                 $row= mysqli_fetch_assoc($result);
                 if($row['password']==$password)
                  {
                    header ("Location:admin/dashboard.php");
                  }
                  else
                    {
                        echo "<h1>Password is Wrong!</h1>";
                    }
              }
           }
      }
   ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OM RESTAURANT</title>

    <link rel="stylesheet" href="form.css">
</head>
<body>

        <form action="login.php" method="POST">
        Enter your Email:
        <input type="email" name="email" required>
        Enter your Password:
        <input type="password" name="password" required>

        <input   class="loginbutton" type="submit" value="Log In" name="submit">
        <p>Go For Registration!</p>
        <a href="">Register</a>

        </form>
    
</body>
</html>