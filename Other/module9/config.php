<?php 
$host = 'localhost'; 
$user = 'root'; 
$db   = 'my_database_'; 
$pass = ''; 

try { 
    // 2. Changed $my_database_ to the correct variable $db
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass); 
    
    // 3. Set the PDO error mode to Exception to properly catch errors
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "CREATE TABLE test(
        id INT(255) AUTO_INCREMENT PRIMARY KEY, 
        username VARCHAR(255) NOT NULL, 
        password VARCHAR(255) NOT NULL
    )"; 
    
    $conn->exec($sql); 
    echo "Table is created"; 
} catch(Exception $e) { 
    echo "Connection failed: " . $e->getMessage(); 
} 
?>
