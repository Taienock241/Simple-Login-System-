<?php
function page_header(string $title, string $eyebrow): void
{
    $safeTitle = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
    $safeEyebrow = htmlspecialchars($eyebrow, ENT_QUOTES, 'UTF-8');
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Plogin secure account access">
        <title><?= $safeTitle ?> | Plogin</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <main class="auth-layout">
            <section class="brand-panel" aria-label="ltd login introduction">
                <a class="brand" href="login.php"><span class="brand-mark">P</span><span>ltd login</span></a>
                <div class="brand-copy">
                    <p class="eyebrow"><?= $safeEyebrow ?></p>
                    <h1>Everything important, <em>in one place.</em></h1>
                    <p class="brand-description">A calm, secure space for the work and people that move your day forward.</p>
                </div>
                <div class="brand-footnote"><span class="status-dot"></span> Private by design</div>
            </section>
            <section class="form-panel">
                <div class="form-wrap">
    <?php
}

function page_footer(): void
{
    ?>
                </div>
                <p class="legal">By continuing, you agree to our <a href="#">Terms</a> and <a href="#">Privacy Policy</a>.</p>
            </section>
        </main>
        <script src="assets/js/auth.js"></script>
    </body>
    </html>
    <?php
}
