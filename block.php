<?php
include "config.php";

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];

   
    $sql = "UPDATE users SET status='$status' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: view.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
