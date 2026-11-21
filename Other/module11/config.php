<?php

$host = 'localhost'; 
$user = 'root'; 
$db   = 'my_database_'; 
$pass = ''; 

try{

   $conn = new PDO("mysql:host=$host;dbname=$db" , $user , $pass);


}catch(Exeption $e){
    echo "error".$e->getMessage();
}





?>