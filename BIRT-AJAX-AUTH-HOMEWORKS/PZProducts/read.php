<?php
require 'db.php';
$productCode = $_GET['productCode'];
$sql = 'SELECT * FROM products WHERE productCode=:productCode';
$statement = $connection->prepare($sql);
$statement->execute([':productCode' => $productCode ]);
$products = $statement->fetch(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Read about product</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <h2 class="text-danger">Product Code</h2>
          <h5><?= $products->productCode; ?></h5>
        </div>
        <div class="form-group">
          <h2 class="text-danger">Name of product</h2>
          <h5><?= $products->productName; ?></h5>
        </div>
        <div class="form-group">
          <h2 class="text-danger">Product Line</h2>
          <h5><?= $products->productLine; ?></h5>
        </div>
        <div class="form-group">
          <h2 class="text-danger">Product Scale</h2>
          <h5><?= $products->productScale; ?></h5>
        </div>
        <div class="form-group">
          <h2 class="text-danger">Product Vendor</h2>
          <h5><?= $products->productVendor; ?></h5>
        </div><div class="form-group">
          <h2 class="text-danger">Product Description</h2>
          <h5><?= $products->productDescription; ?></h5>
        </div>
        <div class="form-group">
          <h2 class="text-danger">Quantity In Stock</h2>
          <h5><?= $products->quantityInStock; ?></h5>
        </div><div class="form-group">
          <h2 class="text-danger">Buy Price</h2>
          <h5><?= $products->buyPrice; ?></h5>
        </div>
        <div class="form-group">
          <h2 class="text-danger">MSRP</h2>
          <h5><?= $products->MSRP; ?></h5>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
