<?php
session_start();

require_once "../config/Shopper.php";

// Validate username
if (empty(trim($_POST["username"]))) {
    $username_err = "Please enter a username.";
} elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
    $username_err = "Username can only contain letters, numbers, and underscores.";
} else {
    $username = $_POST['username'];
};

// Validate emailAddress
if (empty(trim($_POST["emailaddress"]))) {
    $emailaddress_err = "Please enter a valid email address.";
} else {
    $email = trim($_POST["email"]);
}

// Validate password
if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter a password.";
} elseif (strlen(trim($_POST["password"])) < 6) {
    $password_err = "Password must have at least 6 characters.";
} else {
    $password = trim($_POST["password"]);
}

// Validate confirm password
if (empty(trim($_POST["confirm_password"]))) {
    $confirm_password_err = "Please confirm password.";
} else {
    $confirm_password = trim($_POST["confirm_password"]);
    if (empty($password_err) && ($password != $confirm_password)) {
        $confirm_password_err = "Passwords do not match.";
    }
};

$signup=$shopper->register($email, $username, $password);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="./assets/css/plugins/animate.min.css">

    <link rel="stylesheet" href="./assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="./assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="./assets/css/style.min.css">


    <title>Login</title>

    <style>
        .oya {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
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
                        <label>Email address <span>*</span></label>
                        <input type="email" name="email">
                        <span class="invalid-feedback"><?php echo $emailaddress_err; ?></span>
                    </div>
                    <div class="default-form-box">
                        <label>Username <span>*</span></label>
                        <input type="text" name="username">
                        <span class="invalid-feedback"><?php echo $username_err; ?></span>
                    </div>
                    <div class="default-form-box">
                        <label>Password <span>*</span></label>
                        <input type="password" name="password">
                        <span class="invalid-feedback"><?php echo $password_err; ?></span>
                    </div>
                    <div class="default-form-box">
                        <label>Confirm Password <span>*</span></label>
                        <input type="password" name="confirm_password">
                        <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                    </div>
                    <div class="login_submit">
                        <button class="btn btn-md btn-black-default-hover" type="submit">Register</button>
                    </div>

                    <p class="mt-4">Already have an account? <a href="login.php">Login here</a></p>
                </form>
            </div>
        </div>
        <!--register area end-->
    </div>



    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

</body>

</html>