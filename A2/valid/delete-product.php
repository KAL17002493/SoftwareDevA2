<?php require __DIR__ . "/inc/header.php"; ?>

<!-- Prevents non admin users who are not logged in from accessing the page -->
<?php
if ($_SESSION['user']['role'] != "admin")
{
    header('Location: index.php');
    exit;
}

//Display delete-product component 
?>
<?php require __DIR__ . "/components/delete-product-page.php"; ?>

<?php require __DIR__ . "/inc/footer.php"; ?>