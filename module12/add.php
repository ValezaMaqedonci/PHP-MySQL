
<?php

include_once("config.php");

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash password securely
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (email, password)
            VALUES (:email, :password)";

    $sqlQuery = $conn->prepare($sql);

    $sqlQuery->bindParam(':email', $email);
    $sqlQuery->bindParam(':password', $hashedPassword);

    if ($sqlQuery->execute()) {
        echo "Account created successfully!";
    } else {
        echo "Registration failed!";
    }
}

?>
<button style=" margin: 400px 500px; margin-left: 400px;"><a href="dashboard.php" style="text-decoration: none; color: black; padding: 20px;">go to dashboard</a></button>