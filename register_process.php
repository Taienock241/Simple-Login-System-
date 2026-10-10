<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/auth.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !verify_csrf_token($_POST['csrf_token'] ?? null)) {
    set_flash('error', 'Your session expired. Please try again.');
    redirect('register.php');
}

$fullName = trim((string) ($_POST['full_name'] ?? ''));
$username = trim((string) ($_POST['username'] ?? ''));
$email = strtolower(trim((string) ($_POST['email'] ?? '')));
$password = (string) ($_POST['password'] ?? '');
$confirmation = (string) ($_POST['confirm_password'] ?? '');

$errors = [];
if ($fullName === '' || mb_strlen($fullName) > 120) $errors[] = 'Enter your full name.';
if (!preg_match('/^[A-Za-z0-9_.-]{3,50}$/', $username)) $errors[] = 'Username must be 3-50 letters, numbers, dots, dashes, or underscores.';
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || mb_strlen($email) > 190) $errors[] = 'Enter a valid email address.';
if (strlen($password) < 8) $errors[] = 'Password must be at least 8 characters.';
if (!hash_equals($password, $confirmation)) $errors[] = 'Passwords do not match.';

if ($errors) {
    set_flash('error', implode(' ', $errors));
    redirect('register.php');
}

try {
    $pdo = get_pdo();
    $check = $pdo->prepare('SELECT username, email FROM users WHERE username = :username OR email = :email LIMIT 1');
    $check->execute(['username' => $username, 'email' => $email]);
    $existing = $check->fetch();

    if ($existing) {
        $message = strcasecmp($existing['username'], $username) === 0
            ? 'That username is already taken.'
            : 'An account with that email already exists.';
        set_flash('error', $message);
        redirect('register.php');
    }

    // Store only a one-way hash. The original password is never saved.
    $statement = $pdo->prepare(
        'INSERT INTO users (full_name, username, email, password_hash) VALUES (:full_name, :username, :email, :password_hash)'
    );
    $statement->execute([
        'full_name' => $fullName,
        'username' => $username,
        'email' => $email,
        'password_hash' => password_hash($password, PASSWORD_DEFAULT),
    ]);

    set_flash('success', 'Account created. You can now log in.');
    redirect('login.php');
} catch (PDOException $exception) {
    error_log($exception->getMessage());
    set_flash('error', 'We could not create your account right now. Please try again.');
    redirect('register.php');
}
