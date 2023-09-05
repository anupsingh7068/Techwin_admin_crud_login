<?php

//include "session.php";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "validation";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' AND status = 1";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $loginMessage = "Login successful!";
      
        header('Location: view.php');
            exit();
      
    } else {
        $loginMessage = "Incorrect ID or Password or your account is blocked.";
    }
   
        
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <style>
        .box {
            height: 25%;
            width: 30%;
        }
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .error {
            color: red;
        }
        .success {
            color: green;
        }
        .center1 {
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 5%;
          
        }

    </style>
</head>
<body>
    <div class="center">
        <fieldset class="box">
            <center><h3 style="color: green;">Login Page</h3></center>
            <center>
                <form action="" method="post" id="loginpage">
                    <label for="email">User Email:</label>
                    <input type="email" name="email" placeholder="Please Enter The User Mail" id="email" required>
                    <br><br>
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Enter The Password" id="password" required>
                    <br><br>
                    <label for="submit">Login:</label>
                    <button type="submit" name="login">Login</button>

                </form><br>
                Register:<a href="index.php" class="btn btn-success"><button> Registation</button></a>
            </center>
        </fieldset>
       
         
        </div>
       
    </div>
    <div class="center1" > <?php
            if (isset($loginMessage)) {
                echo $loginMessage;
            }
            ?></div>
    
</body>
</html>
