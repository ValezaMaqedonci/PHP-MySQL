
<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/functions.php';

$currentPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= isset($pageTitle) ? e($pageTitle) : 'Hotel Bellavista | Spain' ?></title>

    <meta name="description" content="Discover Hotel Bellavista in Spain.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
</head>
<body>

<header class="site-header">

    <a href="<?= BASE_URL ?>index.php" class="brand">
        <span class="brand-name">hotel bellavista</span>
        <span class="brand-location">— SPAIN —</span>
    </a>

    <nav class="main-nav">
        <a href="<?= BASE_URL ?>about.php"
           class="<?= $currentPage === 'about.php' ? 'active' : '' ?>">About</a>

        <a href="<?= BASE_URL ?>services.php"
           class="<?= $currentPage === 'services.php' ? 'active' : '' ?>">Services</a>

        <a href="<?= BASE_URL ?>gallery.php"
           class="<?= $currentPage === 'gallery.php' ? 'active' : '' ?>">Gallery</a>

        <a href="<?= BASE_URL ?>contact.php"
           class="<?= $currentPage === 'contact.php' ? 'active' : '' ?>">Contact</a>
    </nav>

    <div class="header-actions">

        <?php if (isLoggedIn()): ?>

            <span class="welcome-user">
                Hello, <?= e($_SESSION['user_name']) ?>
            </span>

            <?php if (isAdmin()): ?>
                <a href="<?= BASE_URL ?>admin/index.php" class="login-btn">
                    Dashboard
                </a>
            <?php else: ?>
                <a href="<?= BASE_URL ?>bookings/my-bookings.php" class="login-btn">
                    My Bookings
                </a>
            <?php endif; ?>

            <a href="<?= BASE_URL ?>auth/logout.php" class="logout-link">
                Logout
            </a>

        <?php else: ?>

            <a href="<?= BASE_URL ?>auth/login.php" class="login-btn">
                Login / Sign Up
            </a>

        <?php endif; ?>

    </div>

</header>
</body>
</html>
