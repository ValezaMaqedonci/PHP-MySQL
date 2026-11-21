
<?php

session_start();

$_SESSION['user_id'] = (int)$user['id'];
$_SESSION['username'] = $user['username'];
$_SESSION['is_admin'] = (int)($user['is_admin'] ?? 0);

header("Location: dashboard.php");
exit();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        die("Please enter your username and password.");
    }

    $sql = "SELECT * FROM users WHERE username = :username";

    $stmt = $conn->prepare($sql);
    $stmt->execute(['username' => $username]);

    $user = $stmt->fetch();

    if (!$user) {
        die("This user does not exist. Please register first.");
    }

    if (!password_verify($password, $user['password'])) {
        die("Incorrect password. Please try again.");
    }

$_SESSION['user_id'] = $user['id'];
$_SESSION['username'] = $user['username'];
$_SESSION['is_admin'] = $user['is_admin'] ?? 0;

    header("Location: dashboard.php");
    exit();
}
?>
