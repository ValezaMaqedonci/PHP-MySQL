
<?php
require_once('config.php');

if (isset($_POST['submit'])) {

    $emri = trim($_POST['emri']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $tempPass = $_POST['password'];

    if (empty($emri) || empty($username) || empty($email) || empty($tempPass)) {
        die("Please fill in all fields.");
    }

    // Check if username or email already exists
    $checkSql = "SELECT id FROM users
                 WHERE username = :username OR email = :email";

    $check = $conn->prepare($checkSql);

    $check->execute([
        ':username' => $username,
        ':email' => $email
    ]);

    if ($check->fetch()) {
        die("This user is already registered. Please log in.");
    }

    // Hash password
    $password = password_hash($tempPass, PASSWORD_DEFAULT);

    // Insert new user
    $sql = "INSERT INTO users (emri, username, email, password)
            VALUES (:emri, :username, :email, :password)";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        ':emri' => $emri,
        ':username' => $username,
        ':email' => $email,
        ':password' => $password
    ]);

    header("Location: login.php");
    exit();
}
?>
