<?php

require_once __DIR__ . '/../backend/config/init.php';
$adminName = $_SESSION['user_name'] ?? 'Administrator';

$pageTitle = 'Admin Dashboard | Restaurant Website';

$additionalStylesheet = '/restaurant-website/assets/css/admin.css';
$additionalScript = '/restaurant-website/assets/js/admin-logout.js';

require_once __DIR__ . '/../includes/head.php';
require_once __DIR__ . '/../includes/admin_navbar.php';

?>

<main class="admin-dashboard">
    <div class="page-container">
        <h1>Admin Dashboard</h1>

<p>
    Welcome,
    <strong>
        <?php echo htmlspecialchars($adminName, ENT_QUOTES, 'UTF-8'); ?>
    </strong>.
</p>

        <p>
            Dashboard statistics and management tools will be added here.
        </p>
    </div>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>