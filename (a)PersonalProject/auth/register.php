
<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';

if (isLoggedIn()) {
    redirect('index.php');
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!verifyCsrfToken()) {
        $error = 'Invalid request. Please try again.';
    } else {

        $fullName = trim($_POST['full_name'] ?? '');
        $email = strtolower(trim($_POST['email'] ?? ''));
        $phone = trim($_POST['phone'] ?? '');
        $password = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';

        if (
            $fullName === '' ||
            $email === '' ||
            $password === '' ||
            $confirmPassword === ''
        ) {
            $error = 'Please fill in all required fields.';

        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'Please enter a valid email address.';

        } elseif (strlen($password) < 8) {
            $error = 'Password must contain at least 8 characters.';

        } elseif ($password !== $confirmPassword) {
            $error = 'Passwords do not match.';

        } else {

            $stmt = $pdo->prepare(
                "SELECT id FROM users WHERE email = ?"
            );

            $stmt->execute([$email]);

            if ($stmt->fetch()) {
                $error = 'This email is already registered.';

            } else {

                $hashedPassword = password_hash(
                    $password,
                    PASSWORD_DEFAULT
                );

                $stmt = $pdo->prepare(
                    "INSERT INTO users
                    (full_name, email, password, phone)
                    VALUES (?, ?, ?, ?)"
                );

                $stmt->execute([
                    $fullName,
                    $email,
                    $hashedPassword,
                    $phone
                ]);

                $success = 'Account created successfully! You can now log in.';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Account | Hotel Bellavista</title>

    <link rel="stylesheet"
    href="<?= BASE_URL ?>assets/css/style.css">
</head>

<body>

<div class="auth-container">

    <div class="auth-card">

        <h1>Hotel Bellavista</h1>
        <p class="auth-subtitle">SPAIN</p>

        <h2>Create your account</h2>

        <p>Join us and experience a beautiful stay.</p>

        <?php if ($error): ?>
            <div class="alert error">
                <?= e($error) ?>
            </div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="alert success">
                <?= e($success) ?>
                <br>
                <a href="<?= BASE_URL ?>auth/login.php">
                    Login here
                </a>
            </div>
        <?php endif; ?>

        <?php if (!$success): ?>

        <form method="POST">

            <input type="hidden"
            name="csrf_token"
            value="<?= e(csrfToken()) ?>">

            <label>Full Name</label>
            <input type="text"
            name="full_name"
            placeholder="Your full name"
            maxlength="100"
            autocomplete="name"
            required>

            <label>Email Address</label>
            <input type="email"
            name="email"
            placeholder="example@email.com"
            maxlength="150"
            autocomplete="email"
            required>

            <label>Phone Number</label>
            <input type="tel"
            name="phone"
            placeholder="+34 000 000 000"
            maxlength="30"
            autocomplete="tel">

            <label>Password</label>
            <input type="password"
            name="password"
            placeholder="Minimum 8 characters"
            autocomplete="new-password"
            required>

            <label>Confirm Password</label>
            <input type="password"
            name="confirm_password"
            placeholder="Repeat your password"
            autocomplete="new-password"
            required>

            <button type="submit">
                Create Account
            </button>

        </form>

        <?php endif; ?>

        <p class="auth-footer">
            Already have an account?
            <a href="<?= BASE_URL ?>auth/login.php">
                Login
            </a>
        </p>

    </div>

</div>

</body>
</html>
