
<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';

if (isLoggedIn()) {
    redirect('index.php');
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!verifyCsrfToken()) {
        $error = 'Invalid request. Please try again.';

    } else {

        $email = strtolower(trim($_POST['email'] ?? ''));
        $password = $_POST['password'] ?? '';

        $stmt = $pdo->prepare(
            "SELECT * FROM users WHERE email = ?"
        );

        $stmt->execute([$email]);

        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {

            session_regenerate_id(true);

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['full_name'];
            $_SESSION['user_role'] = $user['role'];

            unset($_SESSION['csrf_token']);

            if ($user['role'] === 'admin') {
                redirect('admin/index.php');
            }

            redirect('index.php');

        } else {
            $error = 'Incorrect email or password.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Hotel Bellavista</title>

    <link rel="stylesheet"
    href="<?= BASE_URL ?>assets/css/style.css">

</head>

<body>

<div class="auth-container">

    <div class="auth-card">

        <h1>Hotel Bellavista</h1>
        <p class="auth-subtitle">SPAIN</p>

        <h2>Welcome Back</h2>

        <p>Sign in to continue your journey.</p>

        <?php if ($error): ?>
            <div class="alert error">
                <?= e($error) ?>
            </div>
        <?php endif; ?>

        <form method="POST">

            <input type="hidden"
            name="csrf_token"
            value="<?= e(csrfToken()) ?>">

            <label>Email Address</label>

            <input type="email"
            name="email"
            placeholder="Your email address"
            autocomplete="email"
            required>

            <label>Password</label>

            <input type="password"
            name="password"
            placeholder="Your password"
            autocomplete="current-password"
            required>

            <button type="submit">
                Login
            </button>

        </form>

        <p class="auth-footer">
            Don't have an account?

            <a href="<?= BASE_URL ?>auth/register.php">
                Create Account
            </a>
        </p>

    </div>

</div>

</body>
</html>
