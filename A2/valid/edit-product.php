<?php require __DIR__ . "/inc/header.php"; ?>

<!-- Prevents non admin users who are not logged in from accessing the page -->
<?php
if ($_SESSION['user']['role'] != "admin")
{
    header('Location: index.php');
    exit;
}
?>

<!--Display component-->
<section class="vh-100 text-center">
    <div class="container py-5 h-75">
      <div class="row d-flex align-items-center h-100">
         <?php require __DIR__ . "/components/manage-product-form.php"; ?>
      </div>
    </div>
</section>  

<?php require __DIR__ . "/inc/footer.php"; ?>