<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .error {
            color: red;
        }
        .success {
            color: green;
        }
        .box{
            height: 25%;
            width: 30%;
            
        }
    </style>
</head>
<body>

<fieldset>   <center>
    <div class="container mt-4">
        <div class="box">
        
        <form id="registrationForm" action="process.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Name" id="name">
                <span class="error" id="name-error"></span>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" id="email">
                <span class="error" id="email-error"></span>
            </div>
            <div class="form-group">
                <input type="tel" class="form-control" name="phone" placeholder="Phone" id="phone">
                <span class="error" id="phone-error"></span>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" id="password">
                <span class="error" id="password-error"></span>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" id="confirm_password">
                <span class="error" id="confirm_password-error"></span>
            </div>
            <div class="mt-3">
            <button type="submit" class="btn btn-primary">Register</button> 
            <a href="login_process.php" class="btn btn-success">Login</a>
        </div>
        </form>
     
        <div id="response" class="mt-3"></div>
       
        </div>
    </div>
    </center></fieldset>
    <script>
        $(document).ready(function() {
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
           
           var namePattern = /^([A-Za-z0-9-_]+)$/;
           var namePattern = /^([A-Za-z0-9-_]+)$/;
          
            var phonePattern = /^[0-9]{10}$/;

            
            function showError(inputId, message) {
                $("#" + inputId + "-error").text(message);
            }
            
            $("#registrationForm").submit(function(event) {
                event.preventDefault();
            
                var name = $("#name").val();
                var email = $("#email").val();
                var phone = $("#phone").val();
                var password = $("#password").val();
                var confirm_password = $("#confirm_password").val();
                
                // Clear previous error messages
                $(".error").text("");
                
                var isValid = true;
                
                if (!name.match(namePattern)) {
                    showError("name", "Only letters allowed");
                    isValid = false;
                }

                
                
                if (!email.match(emailPattern)) {
                    showError("email", "Invalid email format");
                    isValid = false;
                }
                
                if (!phone.match(phonePattern)) {
                    showError("phone", "Invalid phone number format (10 digits only)");
                    isValid = false;
                }
                
                if (password.length < 4) {
                    showError("password", "Password must be at least 4 characters long");
                    isValid = false;
                }
                
                if (password !== confirm_password) {
                    showError("confirm_password", "Passwords do not match");
                    isValid = false;
                }
                
                if (isValid) {
                    // All fields are valid, submit the form
                    $.ajax({
                        type: "POST",                                  
                        url: $("#registrationForm").attr("action"),
                        data: $("#registrationForm").serialize(),
                        dataType: "json",
                        success: function(data) {
                            if (data.success) {
                                $("#response").removeClass("error").addClass("success").text(data.message);
                                $("#registrationForm")[0].reset();   
                                                                   
                            } else {
                                $("#response").removeClass("success").addClass("error").text(data.message);
                            }
                        },
                        error: function() {                                                                     
                            $("#response").removeClass("success").addClass("error").text("An error occurred.");
                        }
                    });
                }
            });
        });
        
    </script>


</body>


</html>
