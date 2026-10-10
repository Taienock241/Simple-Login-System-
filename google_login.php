<?php
// OAuth is intentionally isolated here. Add Google client credentials and
// the provider redirect flow without changing the local authentication code.
require_once __DIR__ . '/includes/auth.php';

set_flash('error', 'Google sign-in is not configured yet. Use your email and password.');
redirect('login.php');
