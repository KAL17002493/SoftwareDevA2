<?php
require_once './inc/functions.php';

 $allUsers = $controllers->members()->getAll();
?>

<!--Search bar
<div class="input-group mb-2">
  <input type="search" name="buttonPress"  class="form-control rounded" placeholder="Search by email" aria-label="Search" aria-describedby="search-addon" />
  <button type="button" name="buttonPress" class="btn btn-danger">Search</button>
</div>-->

<!--Table Displey-->
<table class="table table-striped table-dark text-center">
    <thead>
        <tr>
            <th scope="col"> Name </th>
            <th scope="col"> Surname </th>
            <th scope="col"> Email </th>
            <th scope="col"> Role </th>
            <th scope="col">  </th>
        </tr>
    </thead>

    <tbody>
        
<?php
    foreach ($allUsers as $user):
    ?>

        <tr>
            <td><?= $user["firstname"]?></td>
            <td><?= $user["lastname"]?></td>
            <td><?= $user["email"]?></td>
            <td><?= $user["role"]?></td>
            <td><a id="user<?= $user['id'] ?>" href="manage-user.php?id=<?= $user['id'] ?>" type="button" class="btn btn-info">Edit User</a></td>
        </tr>

    <?php 
    endforeach;
?>


    </tbody>
</table>