<?php require __DIR__ . "/inc/header.php"; ?>

<?php
//Redirect if user is not logged in
if (!isset($_SESSION['user']))
{
    header('Location: login.php?errmsg=' . 'You need to login.');
    exit;
}
?>

<!--Welcom message-->
<div class="position-absolute top-50 start-50 translate-middle text-center">
    <h1 class="">Welcome <?= htmlspecialchars($_SESSION['user']['firstname'] . ' ' .  $_SESSION['user']['lastname']?? 'Member') ?></h1>
</div>

<?php require __DIR__ . "/inc/footer.php"; ?>