<footer class="site-footer">
    <div class="footer-container">
        <p>
            &copy; <?php echo date('Y'); ?> Restaurant Website.
            All rights reserved.
        </p>
    </div>
</footer>

<script src="/restaurant-website/assets/js/main.js"></script>

<?php if (!empty($additionalScript)): ?>
    <script
        src="<?php echo htmlspecialchars(
            $additionalScript,
            ENT_QUOTES,
            'UTF-8'
        ); ?>"
    ></script>
<?php endif; ?>
</body>
</html>