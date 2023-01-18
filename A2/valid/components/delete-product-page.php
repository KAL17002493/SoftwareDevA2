<?php
require_once './inc/functions.php';
$message = "";

//Checks if ID has been sent
if(isset($_GET["id"]))
{
    $productId = htmlspecialchars($_GET["id"]);
    $product = $controllers->products()->get($productId);

    //if Id exists enter is stement
    if(!empty($product))
    {
        //deketes product by ID
        $result = $controllers->products()->delete($productId);

        //If success return to add category page
        if($result)
        {
            redirect("manage-product");
        }
    }
    else
    {
        $message = "Product Not Found";
    }
}
?>