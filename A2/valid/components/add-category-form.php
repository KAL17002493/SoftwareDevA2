<?php
require_once './inc/functions.php';

//Assigns getAll to variable
$allCategories = $controllers->categories()->getAll();

 //Adds new category PHP
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["catname"]))
{
    //Sends user provided data to InputProcessor
    $name = InputProcessor::process_string($_POST['catname'] ?? '');

    $valid = $name["valid"];

    //if valid creates new category else outputs an error message
    if($valid)
    {
        $args = ["catname" => $name["value"]];

        //checks if args not emtpy if not creates category
        if(!empty($args))
        {
            $result = $controllers->categories()->create($args);
        }

        //if category created redirects to add-category page
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
                    <input type="text" class="form-control" placeholder="Category Name" id="catname" name="catname" value="<?= htmlspecialchars($catname['value'] ?? '') ?>">
                    <button id="addButton" class="input-group-text btn btn-warning" type="submit">Add</button>
                </div>
            </form>
        </div>

        <!--Col 2 SEARCH CATEGORY-->
        <div class="col">
            <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search By Name" id="nameGet" name="nameGet" value="<?= htmlspecialchars($nameGet['value'] ?? '') ?>">
                    <button id="searchButton" class="input-group-text btn btn-warning" type="submit">Search</button>
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
    //foreach loop outputs all categories by ID
    foreach ($allCategories as $category):
?>

        <tr>
            <td><?= $category["catname"]?></td>
            <!--Redirects to delete-category.php page with categories Id-->
            <td><a id="category<?= $category["catid"] ?>" href="delete-category.php?id=<?= $category['catid'] ?>" type="button" class="btn btn-danger">Delete</a></td>
        </tr>

<?php 
    endforeach;
?>


    </tbody>
</table>