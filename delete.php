<?php
include "config.php";
if(isset($_GET['id'])){

    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id=$id"; 
    $result = mysqli_query($conn, $sql);

    if($result == TRUE){
        // echo "Record Successfully Deleted.";
        header('Location: view.php');
        exit();

    }
    else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


?>
