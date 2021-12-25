<?php 
session_start();

// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
//include the config folders.
require_once "../config/Dbase.php";


// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have at least 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the new password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Passwords do not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE shoppers SET password = ? WHERE id = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param('si', $param_password, $param_id);
            
            // Set parameters
            $param_password = md5($new_password);
            $param_id = $_SESSION["idd"];
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                
                // delete cookies by setting the expiration date to one hour ago
                setcookie("username", "", time() - 7200);
                setcookie("password", "", time() - 7200);

                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: login.php");
                exit();
            } else{
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
    
    <?php ?>


    <div class="container oya">
        <!--register area start-->
        <div class="col-lg-6 col-md-6">
            <div class="account_form register" data-aos="fade-up" data-aos-delay="200">
                <h3>Register</h3>
                <form action="#">
                   
                    <div class="default-form-box">
                        <label>Password <span>*</span></label>
                        <input type="password">
                    </div>
                    <div class="default-form-box">
                        <label>Confirm Password <span>*</span></label>
                        <input type="password">
                        <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                    </div>
                    <div class="login_submit">
                        <button class="btn btn-md btn-black-default-hover" type="submit">Confirm Reset</button>
                    </div>

                    <p class="mt-4">Already have an account? <a href="login.php">Login here</a></p>
                </form>
            </div>
        </div>
        <!--register area end-->
    </div>



    <script src="../assets/js/vendor/vendor.min.js"></script>
    <script src="../assets/js/plugins/plugins.min.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <?php include "../includes/footer.php"?>

</body>
</html>