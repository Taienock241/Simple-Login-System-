<?php
require_once __DIR__ . '/includes/auth.php';
require_auth();

$name = htmlspecialchars((string) ($_SESSION['user_name'] ?? 'there'), ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars((string) ($_SESSION['user_email'] ?? ''), ENT_QUOTES, 'UTF-8');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Plogin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <main class="dashboard-page">
        <nav class="dashboard-nav"><a class="brand" href="dashboard.php"><span class="brand-mark">P</span><span>Plogin</span></a><a class="text-link" href="logout.php">Log out</a></nav>
        <section class="dashboard-card">
            <p class="eyebrow">Your private space</p>
            <h1>Good to see you, <em><?= $name ?></em>.</h1>
            <p>You are signed in as <?= $email ?>. Your account is ready for whatever comes next.</p>
            <div class="dashboard-accent"></div>
        </section>
    </main>
</body>
</html>
