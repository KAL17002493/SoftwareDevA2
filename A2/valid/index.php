<?php require __DIR__ . "/inc/header.php"; ?>

<section class="vh-100 text-center">
  <?php var_dump($_SESSION)?>
    <div class="container py-5 h-75">
      <div class="row d-flex align-items-center h-100">
         <?php require __DIR__ . "/components/products.php"; ?>
      </div>
    </div>
</section>  

<?php require __DIR__ . "/inc/footer.php"; ?>