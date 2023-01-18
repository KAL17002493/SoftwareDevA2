<?php
require_once './inc/functions.php';
//flex default
 $products = $controllers->products()->getAll();

 //Displays all products in SQL database and their matching data
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

                <!--Assignts each product their unique ID to Edit button-->
                <a id="product<?=$product["id"]?>" href="edit-product.php?id=<?= $product['id'] ?>" type="button" class="btn btn-info w-100">Edit</a>
                <!--Assignts each product their unique ID to Delete button PRODUCT DELETED INSTANTLY-->
                <a id="productDelete<?=$product["id"]?>" href="delete-product.php?id=<?= $product['id'] ?>" type="button" class="btn btn-danger w-100 mt-2">Delete</a>
            </div>
        </div>
    </div>
<?php 
endforeach;
?>


