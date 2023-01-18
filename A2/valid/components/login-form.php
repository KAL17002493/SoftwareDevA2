<?php

require_once './inc/functions.php';
$message = '';

//Check if method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    //validates email and password
    $email = InputProcessor::process_email($_POST['email'] ?? '');
    $password = InputProcessor::process_password($_POST['password'] ?? '');

    $valid = $email['valid'] && $password['valid'];

    if ($valid) {
      //if validated checks agins SQL database if user matches to any record
      $user = $controllers->members()->login($email['value'], $password['value']);

      //If user not found error 
      if (!$user) {
          $message = "Incorrect password and/or username";
      }
      //If user found startes sesstion and redirect to member page
      else {
        
          $_SESSION['user'] = $user;

          redirect('member');
      }
      
    }

    else {
       $message =  "Please fix the above errors. ";
   }

} 
?>

<form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
  <section class="vh-100">
    <div class="container py-5 h-75">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
              <h3 class="mb-2">Sign in</h3>  
              <!--Email-->
              <div class="form-outline mb-4">
                <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Email" required value="<?= htmlspecialchars($email['value'] ?? '') ?>"/>
                  <span class="text-danger"><?= $email['error'] ?? '' ?></span>
                </div>
  
                <!--Password-->
              <div class="form-outline mb-4">
                <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password" required value="<?= htmlspecialchars($password['value'] ?? '') ?>"/>
                  <span class="text-danger"><?= $password['error'] ?? '' ?></span>
                </div>
  
                <!--Submits entered info-->
              <button class="btn btn-primary btn-lg w-100 mb-4" id="login" type="submit">Login</button>
              <!--Takes to register page-->
              <a class="btn btn-secondary btn-lg w-100" id="register" type="submit" href="./register.php" >Not got an account?</a>
              
              <?= isset($_GET['errmsg']) ? $message = $_GET['errmsg'] : '' ?>
              <?= $message ? alert($message, 'danger') : '' ?>
      
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</form>