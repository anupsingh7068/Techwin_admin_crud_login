<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "validation";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$response = array("success" => false, "message" => "");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Check if email already exists
    $checkQuery = "SELECT * FROM users WHERE email = '$email'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $response["message"] = "Email already exists.";
    } else {
        // Check if phone number already exists
        $checkQuery1 = "SELECT * FROM users WHERE phone = '$phone'";
        $checkResult1 = mysqli_query($conn, $checkQuery1);

        if (mysqli_num_rows($checkResult1) > 0) {
            $response["message"] = "Phone number already exists.";
        } else {
            // Insert the data into the database
            $insertQuery = "INSERT INTO users (name, email, phone, password, status) VALUES ('$name', '$email', '$phone', '$password', 1)";
            if (mysqli_query($conn, $insertQuery)) {
                $response["success"] = true;
                $response["message"] = "Registration successful!";
            } else {
                $response["message"] = "Error: " . mysqli_error($conn);
            }
        }
    }
}

mysqli_close($conn);
echo json_encode($response);
?>
