<?php

if (!empty($_SESSION['success_message'])):
?>
    <div class="flash-message flash-success">
        <?php
        echo htmlspecialchars(
            $_SESSION['success_message'],
            ENT_QUOTES,
            'UTF-8'
        );
        ?>
    </div>
<?php
    unset($_SESSION['success_message']);
endif;

if (!empty($_SESSION['error_message'])):
?>
    <div class="flash-message flash-error">
        <?php
        echo htmlspecialchars(
            $_SESSION['error_message'],
            ENT_QUOTES,
            'UTF-8'
        );
        ?>
    </div>
<?php
    unset($_SESSION['error_message']);
endif;
?>