<?php
include 'config.php';

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Users</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>SNO</th>
                    <th>Name</th>
                  
                    <th>Email</th>
                    <th>Phone</th>
                    
                    
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $serial=1;
                if ($result && mysqli_num_rows($result) > 0) {
                        

                    while ($row = mysqli_fetch_assoc($result)) {

                        

                ?>
                    <tr>
                        <td><?php echo $serial; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        
                        <td>
    <a href="block.php?id=<?php echo $row['id']; ?> &status=<?php echo ($row['status'] == 1) ? 0 : 1; ?> ">
        <button type="button" class="btn btn-success" onclick="myFunction2()">
            <?php echo ($row['status'] == 1) ? "Block" : "Unblock"; ?>
     

        </button>
    </a>
    

    <a href="update.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-info" onclick="myFunction1()">Edit</a>
    <a href="delete.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-danger" onclick="myFunction()">Delete</button></a>
</td>
<script>
function myFunction2() {
  alert("you want to sure block!");
}
                    

                    </script>

                    
                    <script>
function myFunction1() {
  alert("you want to sure update!");
}
                    

                    </script>

<script>                                                                                

function myFunction() {
  alert("you want to sure delete!");
}
                    </script>               
                    </tr>
                <?php
                $serial++;

            
                if($row['status'] == 0){
                    echo "blocked user";
                    echo "</br>";
                     echo $row['name'];
                     echo "</br>";
                     echo $row['email'];
                     echo "</br>";
            }

                    }

                
                } else {
                    echo "<tr><td colspan='6'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

   

   

</body>
</html>

<?php
mysqli_close($conn);

?>
