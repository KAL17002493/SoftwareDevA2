<?php
require_once './inc/functions.php';

 $allUsers = $controllers->members()->getAll();
?>

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
//Displays all user in SQL database
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