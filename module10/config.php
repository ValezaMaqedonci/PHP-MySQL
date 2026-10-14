<?php 
$host = 'localhost'; 
$user = 'root'; 
$db   = 'my_database_'; 
$pass = ''; 

try { 
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass); 
    
    // $username = "Valeza";
    // $password = password_hash("12345678" , PASSWORD_DEFAULT);


    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // $sql = "INSERT INTO test (username, password) VALUES ('$username ', '$password')"; 
    
    // $conn->exec($sql); 
    // echo "INSERTED";
    
    //$sql = "ALTER TABLE test ADD email VARCHAR(255)";
    //$sql = "ALTER TABLE test DROP COLUMN email";
    $sql = "DROP TABLE users";

    $conn->exec($sql);

    echo "altered";

    
} catch(Exception $e) { 
    echo "Insertion failed: " . $e->getMessage(); 
} 
?>