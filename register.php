<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/page.php';

require_guest();
$flash = get_flash();
page_header('Create account', 'Start something good');
?>
<div class="form-heading">
    <h2>Create your account</h2>
    <p>Set up your secure space in less than a minute.</p>
</div>
<?php if ($flash): ?>
    <div class="form-alert <?= htmlspecialchars($flash['type'], ENT_QUOTES, 'UTF-8') ?>" role="alert">
        <?= htmlspecialchars($flash['message'], ENT_QUOTES, 'UTF-8') ?>
    </div>
<?php endif; ?>
<form class="auth-form" data-validate action="register_process.php" method="post" novalidate>
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8') ?>">
    <div class="field">
        <label for="full_name">Full name</label>
        <input id="full_name" name="full_name" type="text" autocomplete="name" required placeholder="John Doe">
        <p class="field-error"></p>
    </div>
    <div class="field">
        <label for="username">Username</label>
        <input id="username" name="username" type="text" autocomplete="username" pattern="[A-Za-z0-9_.-]{3,50}" required placeholder="johnnie">
        <p class="field-error"></p>
    </div>
    <div class="field">
        <label for="email">Email address</label>
        <input id="email" name="email" type="email" autocomplete="email" required placeholder="you@example.com">
        <p class="field-error"></p>
    </div>
    <div class="field">
        <label for="password">Password</label>
        <div class="password-control">
            <input id="password" name="password" type="password" autocomplete="new-password" minlength="8" required placeholder="At least 8 characters">
            <button type="button" data-password-toggle="password" aria-label="Show password">Show</button>
        </div>
        <p class="field-error"></p>
    </div>
    <div class="field">
        <label for="confirm_password">Confirm password</label>
        <div class="password-control">
            <input id="confirm_password" name="confirm_password" type="password" autocomplete="new-password" required placeholder="Repeat your password">
            <button type="button" data-password-toggle="confirm_password" aria-label="Show password">Show</button>
        </div>
        <p class="field-error"></p>
    </div>
    <button class="button button-primary" type="submit">Create account</button>
    <div class="divider"><span>or continue with</span></div>
    <a class="button button-google" href="google_login.php"><span class="google-g">G</span> Continue with Google</a>
</form>
<p class="form-switch">Already have an account? <a class="text-link" href="login.php">Log in</a></p>
<?php page_footer(); ?>
