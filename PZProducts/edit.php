<?php
require 'db.php';
$productCode = $_GET['productCode'];
$sql = 'SELECT * FROM products WHERE productCode=:productCode';
$statement = $connection->prepare($sql);
$statement->execute([':productCode' => $productCode ]);
$products = $statement->fetch(PDO::FETCH_OBJ);
if (isset($_POST['productCode']) && isset ($_POST['productName'])  && isset($_POST['productLine'])  && isset($_POST['productScale']) && isset($_POST['productVendor']) && isset($_POST['productDescription']) && isset($_POST['quantityInStock']) && isset($_POST['buyPrice']) && isset($_POST['MSRP'])) {
  $productCode = $_POST['productCode'];
  $productName = $_POST['productName'];
  $productLine = $_POST['productLine'];
  $productScale = $_POST['productScale'];
  $productVendor = $_POST['productVendor'];
  $productDescription = $_POST['productDescription'];
  $quantityInStock = $_POST['quantityInStock'];
  $buyPrice = $_POST['buyPrice'];
  $MSRP = $_POST['MSRP'];
  $sql = 'UPDATE products SET productCode=:productCode, productName=:productName, productLine=:productLine, productScale=:productScale, productVendor=:productVendor, productDescription=:productDescription, quantityInStock=:quantityInStock, buyPrice=:buyPrice, MSRP=:MSRP WHERE productCode=:productCode';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':productCode' => $productCode, ':productName' => $productName, ':productLine' => $productLine, ':productScale' => $productScale,':productVendor' => $productVendor,':productDescription' => $productDescription,':quantityInStock' => $quantityInStock,':buyPrice' => $buyPrice,':MSRP' => $MSRP])) {
    header("Location: /crud");
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update product</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="productCode">Product Code</label>
          <input type="text" value="<?= $products->productCode; ?>" name="productCode" id="productCode" class="form-control">
        </div>
        <div class="form-group">
          <label for="productName">Name of product</label>
          <input value="<?= $products->productName; ?>" type="text" name="productName" id="productName" class="form-control">
        </div>
        <div class="form-group">
          <label for="productLine">Product Line</label>
          <input type="text" value="<?= $products->productLine; ?>" name="productLine" id="productLine" class="form-control">
        </div>
        <div class="form-group">
          <label for="productScale">Product Scale</label>
          <input value="<?= $products->productScale; ?>" type="text" name="productScale" id="productScale" class="form-control">
        </div>
        <div class="form-group">
          <label for="productVendor">Product Vendor</label>
          <input type="text" value="<?= $products->productVendor; ?>" name="productVendor" id="productVendor" class="form-control">
        </div><div class="form-group">
          <label for="productDescription">Product Description</label>
          <input value="<?= $products->productDescription; ?>" type="text" name="productDescription" id="productDescription" class="form-control">
        </div>
        <div class="form-group">
          <label for="quantityInStock">Quantity In Stock</label>
          <input type="text" value="<?= $products->quantityInStock; ?>" name="quantityInStock" id="quantityInStock" class="form-control">
        </div><div class="form-group">
          <label for="buyPrice">Buy Price</label>
          <input value="<?= $products->buyPrice; ?>" type="text" name="buyPrice" id="buyPrice" class="form-control">
        </div>
        <div class="form-group">
          <label for="MSRP">MSRP</label>
          <input type="text" value="<?= $products->MSRP; ?>" name="MSRP" id="MSRP" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update product</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
