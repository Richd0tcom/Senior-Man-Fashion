<?php 
//set up database connection
$conn = new mysqli('localhost', 'root', '', 'cart');
//check connection
if($conn->connect_error){
    printf("could not connect: ", $conn->connect_error);
    exit();
}
?>