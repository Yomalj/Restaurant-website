<?php

$pageTitle = $pageTitle ?? 'Restaurant Website';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?>
    </title>

    <link
        rel="stylesheet"
        href="/restaurant-website/assets/css/style.css"
    >

    <?php if (!empty($additionalStylesheet)): ?>
        <link
            rel="stylesheet"
            href="<?php echo htmlspecialchars(
                $additionalStylesheet,
                ENT_QUOTES,
                'UTF-8'
            ); ?>"
        >
    <?php endif; ?>
</head>
<body>