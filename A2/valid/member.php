<?php require __DIR__ . "/inc/header.php"; ?>

<?php
if (!isset($_SESSION['user']))
{
    header('Location: login.php?errmsg=' . 'You need to login.');
    exit;
}
?>


<div class="position-absolute top-50 start-50 translate-middle text-center">
    <h1 class="">Welcome <?= htmlspecialchars($_SESSION['user']['firstname'] . ' ' .  $_SESSION['user']['lastname']?? 'Member') ?></h1>
</div>

<h1 class="">Role = <?= htmlspecialchars($_SESSION['user']['role'] ?? 'Member') ?></h1>

<?php require __DIR__ . "/inc/footer.php"; ?>