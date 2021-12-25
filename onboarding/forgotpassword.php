<?php
// Initialize the session
session_start();

// Include config file
require_once "../config/Dbase.php";
 
// Define variables and initialize with empty values
$emailaddress = "";
$emailaddress_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["email"]))){
        $emailaddress_err = "Please enter your email address.";     
    }
    else{
        $emailaddress = trim($_POST["email"]);
    }
    
    // Check input errors before updating the database
    if(empty($emailaddress_err)) {
        // Prepare an update statement
        $sql = "SELECT id FROM shoppers WHERE email = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param('s', $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                // Email Address found, redirect to set new password page
                if($stmt->num_rows == 1){
                    $stmt->bind_result($id);
                    $stmt->fetch();
                    
                    //session_regenerate_id();

                    $_SESSION['idd'] = $id;
                    header("location: resetpassword.php");
                }
                else{
                    $emailaddress_err = "User does not exist";
                }
            } 
            else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
    // Close connection
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="../assets/css/plugins/animate.min.css">

    <link rel="stylesheet" href="../assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="../assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="../assets/css/style.min.css">


    <link rel="stylesheet" type="text/css" href="../assets/css/prostyle/bootstrap.css " />
    <!-- font awesome style -->
    <link href="../assets/css/prostyle/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="../assets/css/prostyle/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="../assets/css/prostyle/responsive.css" rel="stylesheet" />

    <title>Login</title>

    <style>
        .oya {
            display:flex;
            justify-content: center;
            align-items: center;
        }
    </style>


    <?php include "../includes/header.php"?>
</head>
<body>
    
    <div class="container oya">
        <div class="col-lg-6 col-md-6">
                    <div class="account_form" data-aos="fade-up" data-aos-delay="0">
                        <h3>login</h3>
                        <form action="forgotpassword.php" method="POST">
                            <div class="default-form-box">
                                <label>Email<span>*</span></label>
                                <input type="email" required name="email">
                            </div>
                            
                            <div class="login_submit">
                                <button class="btn btn-md btn-black-default-hover mb-4" type="submit" name="login">Reset Password</button>
                                
                                
                                <p class="mt-4"><a href="signup.php">Back to login</a></p>

                            </div>
                        </form>
                    </div>
        </div>
    </div>


    <script src="../assets/js/vendor/vendor.min.js"></script>
    <script src="../assets/js/plugins/plugins.min.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

</body>
</html>