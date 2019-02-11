<?php require('partials/head.php'); ?>
    <h1>Home</h1>

    <ul>
        <?php foreach($tasks as $task): ?>
            <li><?= $task->title; ?></li>
        <?php endforeach; ?>
    </ul>

<?php require('partials/footer.php'); ?>