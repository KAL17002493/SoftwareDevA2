<?php
if (isset($_SESSION['username']))
{
    session_destroy();
}
?>

<?php $title = "Login Page"; require __DIR__ . "/inc/header.php"; ?>
     
<?php require __DIR__ . "/components/login-form.php"; ?>

<?php require __DIR__ . "/inc/footer.php"; ?>