<?php

require_once __DIR__ . '/../backend/config/init.php';

$pageTitle = 'Admin Login | Restaurant Website';
$additionalScript = '/restaurant-website/assets/js/admin-login.js';

$oldEmail = $_SESSION['old_input']['email'] ?? '';
unset($_SESSION['old_input']);

require_once __DIR__ . '/../includes/head.php';

?>

<main class="auth-page">
    <section class="auth-card">
        <h1>Admin Login</h1>

        <p class="auth-description">
            Sign in to manage the restaurant website.
        </p>

        <?php require __DIR__ . '/../includes/flash_message.php'; ?>
        <div
            id="login-message"
            class="ajax-message"
            role="alert"
            aria-live="polite"></div>

        <form
            id="admin-login-form"
            action="/restaurant-website/backend/processes/auth/admin_login_process.php"
            method="POST"
            class="auth-form"
            novalidate>
            <input
                type="hidden"
                name="csrf_token"
                value="<?php echo htmlspecialchars(
                            $_SESSION['csrf_token'] ?? '',
                            ENT_QUOTES,
                            'UTF-8'
                        ); ?>">

            <div class="form-group">
                <label for="email">Email address</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="<?php echo htmlspecialchars(
                                $oldEmail,
                                ENT_QUOTES,
                                'UTF-8'
                            ); ?>"
                    autocomplete="email"
                    required>
                <small
                    id="email-error"
                    class="field-error"
                    aria-live="polite"></small>
            </div>

            <div class="form-group">
                <label for="password">Password</label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    autocomplete="current-password"
                    required>
                <small
                    id="password-error"
                    class="field-error"
                    aria-live="polite"></small>
            </div>

            <button type="submit" class="primary-button auth-button">
                Login
            </button>
        </form>

        <a class="back-link" href="/restaurant-website/index.php">
            Return to website
        </a>
    </section>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>