<?php
  session_start();
?>

<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="\SoftwareDevA2\A2\valid\css\Stylesheet.css" type="text/css">
    <title><?= $title ?? 'Welcome' ?></title>
  </head>
  <body class="bg-primary">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand fs-3 fw-bold" href="./index.php">CMS</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!--Not logged in-->
            <ul class="navbar-nav mb-2 mb-lg-0">
              <li class="nav-item">
                  <a class="nav-link text-dark" href="./index.php">Home</a>
              </li>
            </ul>

              <?php
              //If user is not logged it show login icon
              if (!isset($_SESSION['user']))
              {
                ?>
                  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="./login.php"><i class="bi bi-person-circle" id="loginButton" style="font-size: 2rem"></i></a>
                    </li>
                  </ul>
                <?php
              }
              //If user is logged in display logout text
              else
              {
                ?>
                <!--Left side of the NavBar-->
                <?php
                //if user role is Admin
                  if($_SESSION["user"]["role"] == "admin") 
                  {
                ?>
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-dark" id="addProduct" href="./add-product.php">Add Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" id="editProduct" href="./manage-product.php">Edit Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" id="userOverview" href="./user-overview.php">User Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" id="addCategory" href="./add-category.php">Add Category</a>
                        </li>
                    </ul>
                <?php
                  }
                ?>

                  <!--Right side of the NavBar-->
                  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                      <li class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <a class="nav-link text-dark" id="user" href="manage-user.php?id=<?= $_SESSION["user"]["id"]?>"><?= $_SESSION['user']['firstname'] . ' ' .  $_SESSION['user']['lastname']?? 'User' ?></a>
                      </li>

                    <li class="nav-item">
                      <form action="login.php" method="post">
                          <a class="nav-link text-dark" type="submit" id="logout" href="./logout.php">Logout</a>
                      </form>
                    </li>
                  </ul>
                <?php
              }
            ?>
        </div>
      </div>
    </nav>
  </body>