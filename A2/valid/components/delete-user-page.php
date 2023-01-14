<?php
require_once './inc/functions.php';
$message = "";

if(isset($_GET["id"]))
{
    $userId = htmlspecialchars($_GET["id"]);
    $user = $controllers->members()->get($userId);
    //if Id exists enter is stement
    if(!empty($user))
    {
        //Deletes user by ID
        $result = $controllers->members()->delete($userId);

        //If success return to add category page
        if($result && $_SESSION["user"]["role"] != "admin")
        {
            redirect("logout");
        }
        else
        {
            redirect("user-ovreview");
        }
    }
    else
    {
        $message = "User Not Found";
    }
}
?>