<?php require __DIR__ . "/inc/header.php"; ?>

<?php
//Restricts access to nonadmin users
if ($_SESSION['user']['role'] != "admin")
{
    header('Location: index.php');
    exit;
}
?>
<!--Component display-->
<?php require __DIR__ . "/components/add-product-form.php"; ?>

<?php require __DIR__ . "/inc/footer.php"; ?>