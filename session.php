<?php 
/* include "config.php"; */
include "process.php";

   session_start();
  $_SESSION['email']=$email;

  if(!isset($_SESSION['email'])){

    header("location: index.php");
  }
?>