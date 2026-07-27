<?php

require_once __DIR__ . '/../backend/config/init.php';

$pageTitle = 'Admin Dashboard | Restaurant Website';

$additionalStylesheet = '/restaurant-website/assets/css/admin.css';

require_once __DIR__ . '/../includes/head.php';
require_once __DIR__ . '/../includes/admin_navbar.php';

?>

<main class="admin-dashboard">
    <div class="page-container">
        <h1>Admin Dashboard</h1>

        <p>
            Welcome to the restaurant administration area.
        </p>

        <p>
            Dashboard statistics and management tools will be added here.
        </p>
    </div>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>