<?php 

require_once './inc/functions.php';
$message = '';

//Retrieves product data by ID
if (isset($_GET["id"]))
{
    $productId = htmlspecialchars($_GET["id"]);
    $product = $controllers->products()->get($productId);
    
    //Executres when posting data
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {

      //Validates input data
      $name = InputProcessor::process_string($_POST['name'] ?? $product["name"]);
      $description = InputProcessor::process_string($_POST['description'] ?? $product["description"]);
      $price = InputProcessor::process_string($_POST['price'] ?? $product["price"]);
      //Processes data saving in a folder
      $image = InputProcessor::process_file($_FILES['image'] ?? []);

      $valid =  $name['valid'] && $description['valid'] && $price['valid'] && $image['valid'];

      //Executres if provided data is valid
      if($valid) 
      {
        
        //Check if image input field is not null, changes image path if it is not null
        if ($image["value"] != '' ) {
            $imageURL = ImageProcessor::upload($_FILES['image']);
        } 
        //Changes image path
        else 
        {
          $imageURL = $product['image'];
        }

        $args = ['id' => $product['id'],
                'name' => $name['value'] , 
                'description' => $description['value'] , 
                'price' => $price['value'] ,
                'image' =>  $imageURL
                ];

      if (!empty($args)) 
      {
          $id = $controllers->products()->update($args);
      }

        if(!empty($product['id']) && $product['id'] > 0) {
          redirect('product', ['id' => $product['id']]);
        }
        else {
          $message = "Editing product failed"; //Change
        }
      }
      else {
        $message =  "Please fix the following errors: ";
      }
    }
}

?>

  <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) . "?id=" . htmlspecialchars($product["id"] ?? '')?>" enctype="multipart/form-data">
    <section class="vh-100">
      <div class="container py-5 h-75">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
              <div class="card-body p-5 text-center">
    
                <h3 class="mb-2">Edit Product</h3>
                <div class="form-outline mb-4">
                  <input type="text" id="name" name="name" class="form-control form-control-lg" value="<?= htmlspecialchars($product['name'] ?? "") ?>"/>
                  <span class="text-danger"><?= $name['error'] ?? '' ?></span>
                </div>
                
                <div class="form-outline mb-4">
                  <input type="text" id="description" name="description" class="form-control form-control-lg" value="<?= htmlspecialchars($product['description'] ?? "") ?>"/>
                  <span class="text-danger"><?= $description['error'] ?? '' ?></span>
                </div>
    
                <div class="form-outline mb-4">
                  <input type="number" id="price" name="price" class="form-control form-control-lg" value="<?= htmlspecialchars($product['price'] ?? "") ?>"/>
                  <span class="text-danger"><?= $price['error'] ?? '' ?></span>
                </div>

                <div class="form-outline mb-4">
                <img src="<?= $product['image'] ?>" class="card-img-top" alt="$product['name']">
                <span class="text-danger"><?= $price['error'] ?? '' ?></span>
                </div>
    
                <div class="form-outline mb-4">
                  <input type="file" accept="image/*" id="image" name="image" class="form-control form-control-lg" placeholder="Select Image"/>
                </div>
    
                <button class="btn btn-primary btn-lg w-100 mb-4" type="submit">Save</button>
               
                <?= isset($_GET['errmsg']) ? $message = $_GET['errmsg'] : '' ?>
                <?= $message ? alert($message, 'danger') : '' ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </form>
