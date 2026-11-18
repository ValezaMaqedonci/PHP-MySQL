
<?php

require_once __DIR__ . '/../config/app.php';

function e($value) {
    return htmlspecialchars(
        (string)$value,
        ENT_QUOTES,
        'UTF-8'
    );
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function isAdmin() {
    return isset($_SESSION['user_role'])
        && $_SESSION['user_role'] === 'admin';
}

function redirect($url) {
    header('Location: ' . BASE_URL . $url);
    exit;
}

function requireLogin() {
    if (!isLoggedIn()) {
        redirect('auth/login.php');
    }
}

function requireAdmin() {
    requireLogin();

    if (!isAdmin()) {
        http_response_code(403);
        exit('Access denied.');
    }
}

function csrfToken() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(
            random_bytes(32)
        );
    }

    return $_SESSION['csrf_token'];
}

function verifyCsrfToken() {
    return isset($_POST['csrf_token'], $_SESSION['csrf_token'])
        && hash_equals(
            $_SESSION['csrf_token'],
            $_POST['csrf_token']
        );
}
