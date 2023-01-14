<?php
require_once './inc/functions.php';
$message = "";

if(isset($_GET["id"]))
{
    $userId = htmlspecialchars($_GET["id"]);
    $user = $controllers->members()->get($userId);
    var_dump($user);
    //if Id exists enter is stement
    if(!empty($user))
    {
        //deketes product by ID
        $result = $controllers->members()->delete($userId);

        //If success return to add category page
        if($result)
        {
            redirect("logout");
        }
    }
    else
    {
        $message = "User Not Found";
    }
}
?>