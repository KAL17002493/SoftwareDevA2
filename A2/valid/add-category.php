<?php require __DIR__ . "/inc/header.php"; ?>

<?php

//Restricts access to nonadmin users
if ($_SESSION['user']['role'] != "admin")
{
    header('Location: index.php');
    exit;
}
?>
<section class="vh-100">
    <!--Component display-->
    <div class="container py-5">
        <?php require __DIR__ . "/components/add-category-form.php"; ?>
    </div>
</section>  

<?php require __DIR__ . "/inc/footer.php"; ?>