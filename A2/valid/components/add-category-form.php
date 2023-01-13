<?php
require_once './inc/functions.php';

$allCategories = $controllers->categories()->getAll();

 //Adds new category PHP
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["name"]))
{
    $name = InputProcessor::process_string($_POST['name'] ?? '');

    $valid = $name["valid"];

    if($valid)
    {
        $args = ["name" => $name["value"]];

        if(!empty($args))
        {
            $result = $controllers->categories()->create($args);
        }

        if($result)
        {
            redirect('add-category');
        }
        else
        {
            $message = "Adding category failed";
        }
    }
    else 
    {
        $message =  "Please fix the following errors: ";
    }
}
?>

<!--Input fields for add and search category-->
<div class="container mb-2">
    <div class="row">

        <!--Col 1 ADD CATEGORY-->
        <div class="col">
            <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Category Name" id="name" name="name" value="<?= htmlspecialchars($name['value'] ?? '') ?>">
                    <button class="input-group-text btn btn-warning" type="submit">Add</button>
                </div>
            </form>
        </div>

        <!--Col 2 SEARCH CATEGORY-->
        <div class="col">
            <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search By Name" id="nameGet" name="nameGet" value="<?= htmlspecialchars($nameGet['value'] ?? '') ?>">
                    <button class="input-group-text btn btn-warning" type="submit">Search</button>
                </div>
            </form>
        </div>

     </div>
 </div>

<!--Table Displey-->
<table class="table table-striped table-dark text-center">
    <thead>
        <tr>
            <th scope="col">Category</th>
            <th scope="col">  </th>
        </tr>
    </thead>

    <tbody>
      
<?php
    foreach ($allCategories as $category):
?>

        <tr>
            <td><?= $category["name"]?></td>
            <td><a href="delete-category.php?id=<?= $category['id'] ?>" type="button" class="btn btn-danger">Delete</a></td>
        </tr>

<?php 
    endforeach;
?>


    </tbody>
</table>