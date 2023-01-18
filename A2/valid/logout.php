<?php
//Destroy sesstion and redirect to loing page
session_start();
session_unset();
session_destroy();


header('Location: login.php');
?>