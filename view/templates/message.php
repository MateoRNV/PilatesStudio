<?php if (isset($_SESSION['message'])): ?>
    <div class="container">
        <div class="alert alert-<?= $_SESSION['class_message'] ?>">
            <?= $_SESSION['message'] ?>
        </div>
    </div>
    <?php
    unset($_SESSION['message']);
    unset($_SESSION['class_message']);
    ?>
<?php endif; ?>
