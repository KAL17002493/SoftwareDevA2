<?php

require_once './inc/functions.php';
$message = " ";

if($_SERVER["REQUEST_METHOD"] = "PUT" && isset($_POST['updateUser']))
{
    $fname = InputProcessor::process_string($_POST['fname'] ?? '', false);
    $sname = InputProcessor::process_string($_POST['sname'] ?? '', false);
    $email = InputProcessor::process_email($_POST['email'] ?? '', false);
    $password = InputProcessor::process_password(($_POST['newPassword'] ?? ''),( $_POST['newPassword-r'] ?? ''), false);

    $valid =  $fname['valid'] && $sname['valid'] && $password['valid'] && $email['valid'];

    if($valid) {

      $args = ['firstname' => $fname['value'] , 
              'lastname' => $sname['value'] , 
              'newPassword' => $password['value'] ,
              'email' =>  $email['value'] ];

      $result = $controllers->members()->update($args);

      if($result) {
        redirect('manage-user');
      }
      else {
        $message = "Editing details failed.";
      }
    }
    else {
       $message =  "Please fix the following errors: ";
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

              <h3 class="mb-2">Manage User</h3>  

                <div class="form-outline mb-4">
                  <input type="text" id="fname" name="fname" class="form-control form-control-lg inputValue" placeholder=<?= $_SESSION['user']['firstname'] ?> value="<?=htmlspecialchars($fname['value'] ?? '')?>"/>
                  <span class="text-danger"><?= $fname['error'] ?? '' ?></span>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="sname" name="sname" class="form-control form-control-lg inputValue" placeholder=<?= $_SESSION['user']['lastname'] ?> value="<?=htmlspecialchars($sname['value'] ?? '')?>"/>
                  <span class="text-danger"><?= $sname['error'] ?? '' ?></span>
                </div>

                <div class="form-outline mb-4">
                    <input type="email" id="email" name="email" class="form-control form-control-lg inputValue" placeholder=<?= $_SESSION['user']['email'] ?> value="<?=htmlspecialchars($email['value'] ?? '')?>"/>
                    <span class="text-danger"><?= $email['error'] ?? '' ?></span>
                </div>
  
                <div class="form-outline mb-4">
                    <input type="password" autocomplete="new-password" id="newPassword" name="newPassword" class="form-control form-control-lg" placeholder="New Password" value="<?= htmlspecialchars($password['value'] ?? '') ?>"/>
                    <span class="text-danger"><?= $password['error'] ?? '' ?></span>
                </div>

                <div class="form-outline mb-4">
                    <input type="password" id="newPassword-r" name="newPassword-r" class="form-control form-control-lg" placeholder="Repear New Password" value="<?= htmlspecialchars($password['value'] ?? '') ?>"/>
                    <span class="text-danger"><?= $password['error'] ?? '' ?></span>
                </div>
                
                <input type="hidden" name="updateUser" value="true"/>
  
              <button class="btn btn-primary btn-lg w-100 mb-4" type="submit">Save</button>
      
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>