<?php 

require_once './inc/functions.php';

$message = '';
$allCategories = $controllers->categories()->getAll();

//Checks if data is being posted to avoid errors
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    //Sends user provided data to InputProcessors for validation
    $name = InputProcessor::process_string($_POST['name'] ?? '');
    $description = InputProcessor::process_string($_POST['description'] ?? '');
    $price = InputProcessor::process_number($_POST['price'] ?? '' && $_POST["price"] < 0);
    $image = InputProcessor::process_file($_FILES['image'] ?? []);

    $valid =  $name['valid'] && $description['valid'] && $price['valid'] && $image['valid'];

    //If valid creates new product
    if($valid) {

      $image['value'] = ImageProcessor::upload($_FILES['image']);
      
      $args = ['name' => $name['value'] , 
              'description' => $description['value'] , 
              'price' => $price['value'] ,
              'image' =>  $image['value'],
              'categoryId' => (int)$_POST['categoryId'] 
              ];
      $id = $controllers->products()->create($args);

      //if product created redirects to product page with newly created product displalyed
      if(!empty($id) && $id > 0) {
        redirect('product', ['id' => $id]);
      }
      else {
        $message = "Error adding product."; //Change
      }
    }
    else {
       $message =  "Please fix the following errors: ";
   }

} 


?>

  <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
    <section class="vh-100">
      <div class="container py-5 h-75">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
              <div class="card-body p-5 text-center">
    
                <h3 class="mb-2">Add Product</h3>
                <!--Product Name-->
                <div class="form-outline mb-4">
                  <input type="text" id="name" name="name" class="form-control form-control-lg" placeholder="Name" required value="<?= htmlspecialchars($name['value'] ?? '') ?>"/>
                  <span class="text-danger"><?= $name['error'] ?? '' ?></span>
                </div>
                
                <!--Description-->
                <div class="form-outline mb-4">
                  <input type="text" id="description" name="description" class="form-control form-control-lg" placeholder="Description" required value="<?= htmlspecialchars($description['value'] ?? '') ?>"/>
                  <span class="text-danger"><?= $description['error'] ?? '' ?></span>
                </div>
    
                <!--Price-->
                <div class="form-outline mb-4">
                  <input type="number" step="0.01" id="price" name="price" class="form-control form-control-lg" placeholder="Price" required value="<?= htmlspecialchars($price['value'] ?? '') ?>"/>
                  <span class="text-danger"><?= $price['error'] ?? '' ?></span>
                </div>

                <!--Category Dropdown List Start-->
                <div class="dropdown mb-4">
                    <select class="form-select" aria-label="Default select example" name="categoryId">
                  <?php
                      //Dropdown populated by category items by ID
                      foreach ($allCategories as $category):
                  ?>
                    <option value=<?=$category["catid"]?>><?= $category["catname"]?></option>

                  <?php 
                      endforeach;
                  ?>
                    </select>
                </div>
                <!--Category Dropdown List End-->
    
                <!--Image Input-->
                <div class="form-outline mb-4">
                  <input type="file" accept="image/*" id="image" name="image" class="form-control form-control-lg" placeholder="Select Image"required />
                </div>
    
                <button class="btn btn-primary btn-lg w-100 mb-4" id="addProductButton" type="submit">Add Product</button>
               
                <?= isset($_GET['errmsg']) ? $message = $_GET['errmsg'] : '' ?>
                <?= $message ? alert($message, 'danger') : '' ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </form>
