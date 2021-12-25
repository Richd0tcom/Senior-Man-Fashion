<?php

// Initialize the session
//session_start();
 
// Check if the user is already logged in, if yes then redirect him to home page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ./index.php");
    exit;
}

require_once "../config/Shopper.php" ;

if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = $_POST['password'];

    $login = $shopper->login($email, $password);
    echo $login;
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


    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
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
                        <form action="login.php" method="POST">
                            <div class="default-form-box">
                                <label>Username<span>*</span></label>
                                <input type="text" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>" required>
                            </div>
                            <div class="default-form-box">
                                <label>Passwords <span>*</span></label>
                                <input type="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" required>
                            </div>
                            <div class="login_submit">
                                <button class="btn btn-md btn-black-default-hover mb-4" type="submit" name="login">login</button>
                                <label class="checkbox-default mb-4" for="offer">
                                    <input type="checkbox" id="offer" name="remember">
                                    <span>Remember me</span>
                                </label>
                                <a href="resetpassword.php">Lost your password?</a>
                                <p class="mt-4">Don't have an account? <a href="signup.php">Sign up now</a></p>

                            </div>
                        </form>
                    </div>
        </div>
    </div>


    <script src="../assets/js/vendor/vendor.min.js"></script>
    <script src="../assets/js/plugins/plugins.min.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>


    <?php include "../includes/footer.php"?>

</body>
</html>