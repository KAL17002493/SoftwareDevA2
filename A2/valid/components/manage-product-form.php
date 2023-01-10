<?php 

require_once './inc/functions.php';
$message = '';

if (isset($_GET["id"]))
{
    $productId = htmlspecialchars($_GET["id"]);
    $product = $controllers->products()->get($productId);

    $name = InputProcessor::process_string($_POST['name'] ?? '');
    $description = InputProcessor::process_string($_POST['description'] ?? '');
    $price = InputProcessor::process_string($_POST['price'] ?? '');
    $image = InputProcessor::process_file($_FILES['image'] ?? []);

    $valid =  $name['valid'] && $description['valid'] && $price['valid'] && $image['valid'];

    var_dump($product);

    if($valid) {

      $image['value'] = ImageProcessor::upload($_FILES['image']);
      
      $valueCheck = [
        'name' => 'name',
        'description' => 'description',
        'price' => 'price',
        'image' => 'image'];
    
    $args = [];
    foreach ($valueCheck as $input => $value) 
    {
        if (${$input}['value'] !== $product[$value])
        {
            $args[$value] = ${$input}['value'];
        }
    }

    if (!empty($args)) {
        $id = $controllers->products()->update($args);
    }

      if(!empty($id) && $id > 0) {
        redirect('edit-product', ['id' => $id]);
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
    
                <h3 class="mb-2">Edit Product</h3>
                <div class="form-outline mb-4">
                  <input type="text" id="name" name="name" class="form-control form-control-lg" required value="<?= htmlspecialchars($product['name'] ?? "") ?>"/>
                  <span class="text-danger"><?= $name['error'] ?? '' ?></span>
                </div>
                
                <div class="form-outline mb-4">
                  <input type="text" id="description" name="description" class="form-control form-control-lg" required value="<?= htmlspecialchars($product['description'] ?? " ") ?>"/>
                  <span class="text-danger"><?= $description['error'] ?? '' ?></span>
                </div>
    
                <div class="form-outline mb-4">
                  <input type="number" id="price" name="price" class="form-control form-control-lg" required value="<?= htmlspecialchars($product['price'] ?? " ") ?>"/>
                  <span class="text-danger"><?= $price['error'] ?? '' ?></span>
                </div>

                <div class="form-outline mb-4">
                <img src="<?= $product['image'] ?>" class="card-img-top" alt="$product['name']">
                <span class="text-danger"><?= $price['error'] ?? '' ?></span>
                </div>
    
                <div class="form-outline mb-4">
                  <input type="file" accept="image/*" id="image" name="image" class="form-control form-control-lg" placeholder="Select Image"required />
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
