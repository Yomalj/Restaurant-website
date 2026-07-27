<?php

$pageTitle = 'Home | Restaurant Website';

require_once __DIR__ . '/includes/head.php';
require_once __DIR__ . '/includes/public_navbar.php';

?>

<main>
    <section class="hero-section">
        <div class="page-container">
            <h1>Welcome to Our Restaurant</h1>

            <p>
                Enjoy delicious food, friendly service, and a comfortable
                dining experience.
            </p>

            <a class="primary-button" href="/restaurant-website/menu.php">
                View Our Menu
            </a>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>