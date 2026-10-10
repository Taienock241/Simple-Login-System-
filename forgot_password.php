<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/page.php';

require_guest();
page_header('Forgot password', 'Account recovery');
?>
<div class="form-heading">
    <h2>Reset your password</h2>
    <p>Enter your email and we will show where to connect your mail service.</p>
</div>
<div class="form-alert success">Password reset email delivery is ready to connect to your preferred mail provider.</div>
<form class="auth-form" action="login.php" method="get">
    <div class="field">
        <label for="email">Email address</label>
        <input id="email" name="email" type="email" autocomplete="email" required placeholder="you@example.com">
        <p class="field-error"></p>
    </div>
    <button class="button button-primary" type="submit">Return to login</button>
</form>
<?php page_footer(); ?>
