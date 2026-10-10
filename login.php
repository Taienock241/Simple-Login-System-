<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/page.php';

require_guest();
$flash = get_flash();
page_header('Log in', 'Welcome back');
?>
<div class="form-heading">
    <h2>Log in to ltd systems</h2>
    <p>Your focused workspace is waiting for you.</p>
</div>
<?php if ($flash): ?>
    <div class="form-alert <?= htmlspecialchars($flash['type'], ENT_QUOTES, 'UTF-8') ?>" role="alert">
        <?= htmlspecialchars($flash['message'], ENT_QUOTES, 'UTF-8') ?>
    </div>
<?php endif; ?>
<form class="auth-form" data-validate action="authenticate.php" method="post" novalidate>
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8') ?>">
    <div class="field">
        <label for="email">Email address</label>
        <input id="email" name="email" type="email" autocomplete="email" required placeholder="you@example.com">
        <p class="field-error"></p>
    </div>
    <div class="field">
        <label for="password">Password</label>
        <div class="password-control">
            <input id="password" name="password" type="password" autocomplete="current-password" required placeholder="Enter your password">
            <button type="button" data-password-toggle="password" aria-label="Show password">Show</button>
        </div>
        <p class="field-error"></p>
    </div>
    <div class="form-options">
        <label class="checkbox"><input type="checkbox" name="remember"> Remember me</label>
        <a class="text-link" href="forgot_password.php">Forgot password?</a>
    </div>
    <button class="button button-primary" type="submit">Log in</button>
    <div class="divider"><span>or continue with</span></div>
    <a class="button button-google" href="google_login.php"><span class="google-g">G</span> Continue with Google</a>
</form>
<p class="form-switch">New here? <a class="text-link" href="register.php">Create an account</a></p>
<?php page_footer(); ?>
