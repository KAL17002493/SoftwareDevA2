<?php require __DIR__ . "/inc/header.php"; ?>

<!-- Prevents non admin users who are not logged in from accessing the page -->
<?php
if ($_SESSION['user']['role'] != "admin")
{
    header('Location: index.php');
    exit;
}
?>
<?php require __DIR__ . "/components/delete-category-page.php"; ?>

<?php require __DIR__ . "/inc/footer.php"; ?>