<?php require __DIR__ . "/inc/header.php"; ?>

<!-- Prevents users who are not logged in from accessing the page -->
<?php
if (!isset($_SESSION['user']))
{
    header('Location: login.php?errmsg=' . 'You need to login.');
    exit;
}
?>

<?php require __DIR__ . "/components/manage-user-form.php"; ?>

<?php require __DIR__ . "/inc/footer.php"; ?>