<?php

require_once './inc/functions.php';
$message = "";

if(isset($_GET["id"]))
{
  $userId = htmlspecialchars($_GET["id"]);
  $user = $controllers->members()->get($userId);

  if($user["role"] == "admin")
  {
    redirect("cannot-change");
  }


  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
      $firstname = InputProcessor::process_string($_POST['firstname'] ?? $user['firstname']);
      $lastname = InputProcessor::process_string($_POST['lastname'] ?? $user["lastname"]);
      $email = InputProcessor::process_email($_POST['email'] ?? $user["email"]);
      $role = InputProcessor::process_string($_POST['role'] ?? $user["role"]);

      $passwordChanged = strlen($_POST['password']) > 0;

      $password = InputProcessor::process_password(($_POST['password'] ?? $user["password"]),( $_POST['password-v'] ?? $user["password"]), $passwordChanged);

      $valid =  $firstname['valid'] && $lastname['valid'] && $email['valid'] && $password['valid'] && $role["valid"];

      if($valid) {
        //hashes the new password
        $password["value"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
  
        $args = ["id" => $user["id"],
                'firstname' => $firstname['value'] , 
                'lastname' => $lastname['value'] , 
                'password' => $password['value'] ,
                'role' => $role['value'] ,
                'email' =>  $email['value'] ];
        
        if(!empty($args))
        {
            $id = $controllers->members()->update($args);
        }
      
        if(!empty($user["id"]) && $user["id"] > 0) 
        {
          redirect('manage-user', ['id' => $user['id']]);
        }
        else {
          $message = "Editing profile failed.";
        }
      }
      else {
         $message =  "Please fix the following errors: ";
     }
  }
}
?>

<form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) . "?id=" . htmlspecialchars($_GET["id"] ?? '')?>">
  <section class="vh-100">
    <div class="container py-5 h-75">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <h3 class="mb-2">Manage User</h3>  

              <!--Name-->
                <div class="form-outline mb-4">
                  <input type="text" id="firstname" name="firstname" class="form-control form-control-lg inputValue" value="<?=htmlspecialchars($user['firstname'] ?? '')?>"/>
                  <span class="text-danger"><?= $firstname['error'] ?? '' ?></span>
                </div>

                <!--Surname-->
                <div class="form-outline mb-4">
                  <input type="text" id="lastname" name="lastname" class="form-control form-control-lg inputValue" value="<?=htmlspecialchars($user['lastname'] ?? '')?>"/>
                  <span class="text-danger"><?= $lastname['error'] ?? '' ?></span>
                </div>

                <!--Email-->
                <div class="form-outline mb-4">
                    <input type="email" id="email" name="email" class="form-control form-control-lg inputValue" value="<?=htmlspecialchars($user['email'] ?? '')?>"/>
                    <span class="text-danger"><?= $email['error'] ?? '' ?></span>
                </div>

                <!--Role-->
                <?php
                  //if user role is admin display
                  if($_SESSION["user"]["role"] == "admin")
                  { 
                ?>
                <div class="form-outline mb-4">
                    <input type="text" id="role" name="role" class="form-control form-control-lg inputValue" value="<?=htmlspecialchars($user['role'] ?? '')?>"/>
                    <span class="text-danger"><?= $email['error'] ?? '' ?></span>
                </div>
                <?php
                  }
                ?>
  
                <!--Password-->
                <div class="form-outline mb-4">
                    <input type="password" autocomplete="new-password" id="password" name="password" class="form-control form-control-lg" placeholder="New Password" />
                    <span class="text-danger"><?= $password['error'] ?? '' ?></span>
                </div>

                <!--Password-v-->
                <div class="form-outline mb-4">
                    <input type="password" id="password-v" name="password-v" class="form-control form-control-lg" placeholder="Repear New Password"/>
                    <span class="text-danger"><?= $password['error'] ?? '' ?></span>
                </div>
                

  
              <button class="btn btn-primary btn-lg w-100 mb-4" type="submit">Save</button>
              <a class="link-danger mt-3 deleteAccount" type="submit">Delete Account</a>

      
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--Delete account popup and redirection-->
  <script type="text/javascript">
    var elems = document.getElementsByClassName('deleteAccount');
    var confirmIt = function (e) 
    {
        if (!confirm('Are you sure you want to delete your account?'))
        {
           e.preventDefault();
        }
        else
        {
          window.location.href = "delete-user.php?id=<?= $user['id'] ?>";
        }
    };

    //Added event listener
    for (var i = 0, l = elems.length; i < l; i++) 
    {
        elems[i].addEventListener('click', confirmIt, false);
    };
</script>