<?php require __DIR__ . "/inc/header.php"; ?>

<!-- Prevents non admin users who are not logged in from accessing the page -->
<?php
if ($_SESSION['user']['role'] != "admin")
{
    header('Location: index.php');
    exit;
}
?>

<section class="vh-100">
    <!--Component display-->
    <div class="container py-5">
         <?php require __DIR__ . "/components/user-overview-list.php"; ?>
    </div>
</section>  

<?php require __DIR__ . "/inc/footer.php"; ?>