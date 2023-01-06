<form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
  <section class="vh-100">
    <div class="container py-5 h-75">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <h3 class="mb-2">Manage User</h3>  

                <div class="form-outline mb-4">
                  <input type="text" id="fname" name="fname" class="form-control form-control-lg" placeholder="<?= $_SESSION['user']['firstname'] ?>" required value="<?= htmlspecialchars($fname['value'] ?? '') ?>"/>
                  <span class="text-danger"><?= $fname['error'] ?? '' ?></span>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="sname" name="sname" class="form-control form-control-lg" placeholder="<?= $_SESSION['user']['lastname'] ?>" required value="<?= htmlspecialchars($sname['value'] ?? '') ?>"/>
                  <span class="text-danger"><?= $sname['error'] ?? '' ?></span>
                </div>

                <div class="form-outline mb-4">
                    <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="<?= $_SESSION['user']['email'] ?>" required value="<?= htmlspecialchars($email['value'] ?? '') ?>"/>
                    <span class="text-danger"><?= $email['error'] ?? '' ?></span>
                </div>
  
                <div class="form-outline mb-4">
                    <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="New Password" required value="<?= htmlspecialchars($password['value'] ?? '') ?>"/>
                    <span class="text-danger"><?= $password['error'] ?? '' ?></span>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="password-v" name="password-v" class="form-control form-control-lg" placeholder="Repeat New Password" />
                  <span class="text-danger"><?= $password['error'] ?? '' ?></span>
                </div>
  
              <button class="btn btn-primary btn-lg w-100 mb-4" type="submit">Save</button>
      
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php
    var_dump($_SESSION);
  ?>