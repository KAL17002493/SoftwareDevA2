<?php require __DIR__ . "/inc/header.php"; ?>

<?php
if ($_SESSION['user']['role'] != "admin")
{
    header('Location: index.php');
    exit;
}
?>

<?php require __DIR__ . "/components/add-product-form.php"; ?>

<?php require __DIR__ . "/inc/footer.php"; ?>