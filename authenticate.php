<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/auth.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !verify_csrf_token($_POST['csrf_token'] ?? null)) {
    set_flash('error', 'Your session expired. Please try again.');
    redirect('login.php');
}

$email = strtolower(trim((string) ($_POST['email'] ?? '')));
$password = (string) ($_POST['password'] ?? '');

if (!filter_var($email, FILTER_VALIDATE_EMAIL) || $password === '') {
    set_flash('error', 'Enter a valid email and password.');
    redirect('login.php');
}

try {
    // Prepared statements keep user input separate from the SQL query.
    $statement = get_pdo()->prepare('SELECT id, full_name, email, password_hash FROM users WHERE email = :email LIMIT 1');
    $statement->execute(['email' => $email]);
    $user = $statement->fetch();

    // password_verify() compares the plain password to the one-way hash in MySQL.
    if (!$user || !password_verify($password, $user['password_hash'])) {
        set_flash('error', 'The email or password is incorrect.');
        redirect('login.php');
    }

    session_regenerate_id(true);
    $_SESSION['user_id'] = (int) $user['id'];
    $_SESSION['user_name'] = $user['full_name'];
    $_SESSION['user_email'] = $user['email'];
    unset($_SESSION['csrf_token']);
    redirect('dashboard.php');
} catch (PDOException $exception) {
    error_log($exception->getMessage());
    set_flash('error', 'We could not sign you in right now. Please try again.');
    redirect('login.php');
}
