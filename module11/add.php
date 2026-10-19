<?php

include_once("config.php");

if(isset($_POST['submit'])){

$name = $_POST['name'];

$username = $_POST['username'];

$email = $_POST['email'];

$sql = "INSERT INTO user(name , username , email) VALUES (:name , :username , :email)";

$sqlQuery = $conn->prepare($sql);

$sqlQuery->blindParam(':name' , $name);
$sqlQuery->blindParam(':username' , $username);
$sqlQuery->blindParam(':email' , $email);

$sqlQuery->execute();

echo"INSERTED";
}


?>