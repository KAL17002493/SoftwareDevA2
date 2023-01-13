<?php
require_once './inc/functions.php';
$message = "";

if(isset($_GET["id"]))
{
    $categoryId = htmlspecialchars($_GET["id"]);
    $category = $controllers->categories()->get($categoryId);

    //if Id exists enter is stement
    if(!empty($category))
    {
        //deketes product by ID
        $result = $controllers->categories()->delete($categoryId);

        //If success return to add category page
        if($result)
        {
            redirect("add-category");
        }
    }
    else
    {
        $message = "Category Not Found";
    }
}
?>