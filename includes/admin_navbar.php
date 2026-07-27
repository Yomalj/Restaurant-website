<nav class="admin-navbar">
    <div class="navbar-container">
        <a class="navbar-brand" href="/restaurant-website/admin/dashboard.php">
            Restaurant Admin
        </a>

        <div class="navbar-links">
            <a href="/restaurant-website/admin/dashboard.php">Dashboard</a>
            <a href="/restaurant-website/admin/categories/index.php">Categories</a>
            <a href="/restaurant-website/admin/menu-items/index.php">Menu Items</a>
            <a href="/restaurant-website/admin/reservations/index.php">Reservations</a>
            <a href="/restaurant-website/admin/messages/index.php">Messages</a>
            <form
                id="admin-logout-form"
                action="/restaurant-website/backend/processes/auth/admin_logout_process.php"
                method="POST"
                class="logout-form">
                <input
                    type="hidden"
                    name="csrf_token"
                    value="<?php echo htmlspecialchars(
                                $_SESSION['csrf_token'] ?? '',
                                ENT_QUOTES,
                                'UTF-8'
                            ); ?>">

                <button type="submit" class="logout-button">
                    Logout
                </button>
            </form>
        </div>
    </div>
</nav>
<div
    id="admin-logout-message"
    class="ajax-message admin-logout-message"
    role="alert"
    aria-live="polite"
></div>