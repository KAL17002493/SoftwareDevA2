<?php
require_once './inc/functions.php';
//flex default
 $products = $controllers->products()->getAll();

foreach ($products as $product):

?>
    <div class="col-4 my-2">
        <div class="card">
            <img src="<?= $product['image'] ?>" 
                class="card-img-top" 
                alt="$product['name']">
            <div class="card-body">
                <p class="card-title">Name: <?= $product['name'] ?></p>
                <p class="card-text">Description: <?= $product['description'] ?></p>
                <p class="card-text">Price: £<?= $product['price'] ?></p>
                <p class="card-text">Category: <?= $product['catname']?></p>
                <a href="edit-product.php?id=<?= $product['id'] ?>" type="button" class="btn btn-info w-100">Edit</a>
                <?=var_dump($product)?>
            </div>
        </div>
    </div>
<?php 
endforeach;
?>


