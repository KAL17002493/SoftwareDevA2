<?php
require_once './inc/functions.php';

 $users =$controllers->members()->getAll();
?>

<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th scope="col"> Name </th>
            <th scope="col"> Surname </th>
            <th scope="col"> Email </th>
        </tr>
    </thead>

    <tbody>
<?php
foreach ($users as $user):
?>

    <tr>
        <td><?= $user["firstname"]?></td>
        <td><?= $user["lastname"]?></td>
        <td><?= $user["email"]?></td>
    </tr>

<?php 
endforeach;
?>

    </tbody>
</table>