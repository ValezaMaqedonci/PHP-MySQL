<?php

$host = 'localhost'; 
$user = 'root'; 
$db   = 'challenge'; 
$pass = ''; 

try{

   $conn = new PDO("mysql:host=$host;dbname=$db" , $user , $pass);

//    echo("Connected");


}catch(Exeption $e){
    echo "error".$e->getMessage();
}

?>