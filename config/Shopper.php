<?php
//initialize a ssession variable
session_start();


//this is the shopper(user) class
//please i'm not using prepared staement for the login as i dont know it yet.
class shopper{
    // a shopper should be able to register.
    public static function register($email, $username, $password){
        require 'Dbase.php';
        $newPassword = md5($password);
        //registration query
        $regquery = "INSERT INTO shoppers (email,username,password) values('$email', '$username','$newPassword')";
        
        $register = $conn->query($regquery);

        //this comment is here to handle the problem of multiple same emails and/or usernames when i can think of a solution for it.

        
            //if (){}


    }

    // a shopper should be able to login
    public static function login($username, $password,){
        require 'Dbase.php';
        $newPassword = md5($password);

        $logquery= "SELECT * FROM shoppers where username='$username' and password = '$newPassword' ";
        $login=$conn->query($logquery);

        //the query should return a number of rows 
        $count = $login->num_rows;

        if($count > 0){
            if($row = mysqli_fetch_array($login)){//can also use the fetch_assoc() method


                session_start();
                $_SESSION['loggedIn']==true;


                $_SESSION['user_name'] = $row['username'];

                
                 // if remember me check box is clicked, values will be stored in $_COOKIE array
                if(!empty($_POST["remember"])) {
                    //COOKIES for username
                    setcookie ("username",$_POST["username"],time()+ 8600);
                    //COOKIES for password
                    setcookie ("password",$_POST["password"],time()+ 8600);
                }

                header("Location: ./onboarding/dashboard.php?message=sucsess");
            }
        }else{
            // Username doesn't exist, display a generic error message
            $login_err = "Invalid username or password.";
            header("Location: login.php?message=errror");  //error=Cannot login
        }

    }
}

$shopper = new Shopper();