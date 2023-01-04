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

            <!--Navbar Left-->
            <ul class="navbar-nav mb-2 mb-lg-0">
              <li class="nav-item">
                  <a class="nav-link text-dark" href="./index.php">Home</a>
              </li>
            </ul>

            <!--Navbar Right-->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                  <a class="nav-link" href="./login.php"><i class="bi bi-person-circle" style="font-size: 2rem"></i></a>
              </li>
            </ul>
        </div>
      </div>
    </nav>
  </body>