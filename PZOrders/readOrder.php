<?php
require 'db.php';
$orderNumber = $_GET['orderNumber'];
$sql = 'SELECT * FROM orders WHERE orderNumber=:orderNumber';
$statement = $connection->prepare($sql);
$statement->execute([':orderNumber' => $orderNumber ]);
$orders = $statement->fetch(PDO::FETCH_OBJ);
 ?>
<?php require 'headerOrder.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Read about order</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <h2 class="text-danger">Order Number</h2>
          <h5><?= $orders->orderNumber; ?></h5>
        </div>
        <div class="form-group">
          <h2 class="text-danger">Order Date/h2>
          <h5><?= $orders->orderDate; ?></h5>
        </div>
        <div class="form-group">
          <h2 class="text-danger">Required Date</h2>
          <h5><?= $orders->requiredDate; ?></h5>
        </div>
        <div class="form-group">
          <h2 class="text-danger">Shipped Date</h2>
          <h5><?= $orders->shippedDate; ?></h5>
        </div>
        <div class="form-group">
          <h2 class="text-danger">Status</h2>
          <h5><?= $orders->status; ?></h5>
        </div><div class="form-group">
          <h2 class="text-danger">Comments</h2>
          <h5><?= $orders->comments; ?></h5>
        </div>
        <div class="form-group">
          <h2 class="text-danger">Customer Number</h2>
          <h5><?= $orders->customerNumber; ?></h5>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
