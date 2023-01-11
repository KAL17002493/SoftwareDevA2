<?php
require_once './inc/functions.php';

 $allUsers = $controllers->members()->getAll();
 //$singeUser =$controllers->members()->getByEmail();
?>

<!--Dropdown
<div class="dropdown container">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        Role list
    </button>

    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <?php
            foreach ($allUsers as $user):
        ?>
        
            <li><a class="dropdown-item"><?= $user["role"]?></a></li>

        <?php 
            endforeach;
        ?>
    </ul>
 
</div>-->

<!--Search bar-->
<div class="input-group">
  <input type="search" name="buttonPress"  class="form-control rounded" placeholder="Search by email" aria-label="Search" aria-describedby="search-addon" />
  <button type="button" name="buttonPress" class="btn btn-danger">Search</button>
</div>

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
            <td><a href="manage-user.php?id=<?= $user['id'] ?>" type="button" class="btn btn-info">Edit User</a></td>
        </tr>

    <?php 
    endforeach;
?>


    </tbody>
</table>