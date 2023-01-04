<?php
session_start();

if (!isset($_SESSION['username']))
{
    header('Location: login.php?errmsg=' . 'You need to login.');
    exit;
}
?>

<?php require __DIR__ . "/inc/header.php"; ?>
<div class="position-absolute top-50 start-50 translate-middle text-center">
    <h1 class="">Welcome <?= htmlspecialchars($_SESSION['username'] ?? 'Member') ?></h1>
</div>
<?php require __DIR__ . "/inc/footer.php"; ?>