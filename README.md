# Plogin

A clean PHP/MySQL login and registration starter for XAMPP.

## Folder structure

- `config/database.php` - PDO connection settings.
- `database/schema.sql` - database and `users` table definition.
- `includes/auth.php` - session, CSRF, flash message, and route helpers.
- `includes/page.php` - shared page shell.
- `assets/css/style.css` - responsive custom styling.
- `assets/js/auth.js` - password toggles and form validation.
- `login.php`, `register.php` - public forms.
- `authenticate.php`, `register_process.php` - POST-only auth handlers.
- `dashboard.php`, `logout.php` - protected page and secure logout.
- `google_login.php` - isolated OAuth configuration stub.

## XAMPP setup

1. Copy this folder to `C:\xampp\htdocs\Plogin`.
2. Start Apache and MySQL in the XAMPP Control Panel.
3. Open phpMyAdmin and import `database/schema.sql`.
4. Confirm the credentials in `config/database.php` match your local MySQL setup.
5. Open `http://localhost/Plogin/`.

The app uses `password_hash()`/`password_verify()`, PDO prepared statements, CSRF tokens, secure session cookies, and database-level unique constraints for usernames and emails. Configure Google OAuth only in `google_login.php` and keep its credentials outside version control.
