<?php
include "config.php";
if (isset($_POST['update'])) {
    $name = $_POST["name"];
    
    $id = $_POST["id"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
   

    $sql = "UPDATE users SET name='$name', email='$email', phone='$phone' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Record updated successfully.";
        
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    if($result==True){
        header('Location: view.php');
        exit();
      
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];
        
            $email = $row['email'];
            $phone = $row['phone'];
           
            $id = $row['id'];
        }

?>
       <html>
  <head>
<style>
    .box{
        height: 20%;
            width: 30%;
    }
    .center{
        display: flex;
            justify-content: center;
            align-items: center;
            
    }
</style>
  </head>
       <body>

      <center> <h2 style="color: green;">Update Form</h2></center>
      <div class="center">
       <fieldset class="box">
        <center>
        <form action="" method="post">
        
                <legend><h3> Personal Information</h3></legend>
                <br>
              <label for="Name">Name:</label>
                <input type="text" name="name" value="<?php echo $name; ?>">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <br><br>
               <!--  lastname: <br>
                <input type="text" name="lastname" value="<?php echo $lastname; ?>">
                <br> -->
                <label for="Email">Email:</label>
                <input type="email" name="email" value="<?php echo $email; ?>">
                <br><br>
                <label for="Phone">Phone:</label>
                <input type="phone" name="phone" value="<?php echo $phone; ?>">
                
                
                <br><br>
                <input type="submit" value="Update" name="update">

          

         
        </form>
        </center>
        </fieldset> 
        </div>
            
        </body>
        </html>
   
    <?php

    }
}
?>
