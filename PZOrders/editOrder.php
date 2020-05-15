<?php
require 'db.php';
$orderNumber = $_GET['orderNumber'];
$sql = 'SELECT * FROM orders WHERE orderNumber=:orderNumber';
$statement = $connection->prepare($sql);
$statement->execute([':orderNumber' => $orderNumber ]);
$orders = $statement->fetch(PDO::FETCH_OBJ);
if (isset($_POST['orderNumber']) && isset ($_POST['orderDate'])  && isset($_POST['requiredDate'])  && isset($_POST['shippedDate']) && isset($_POST['status']) && isset($_POST['comments']) && isset($_POST['customerNumber'])) {
  $orderNumber = $_POST['orderNumber'];
  $orderDate = $_POST['orderDate'];
  $requiredDate = $_POST['requiredDate'];
  $shippedDate = $_POST['shippedDate'];
  $status = $_POST['status'];
  $comments = $_POST['comments'];
  $customerNumber = $_POST['customerNumber'];
  $sql = 'UPDATE orders SET orderNumber=:orderNumber, orderDate=:orderDate, requiredDate=:requiredDate, shippedDate=:shippedDate, status=:status, comments=:comments, customerNumber=:customerNumber WHERE orderNumber=:orderNumber';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':orderNumber' => $orderNumber, ':orderDate' => $orderDate, ':requiredDate' => $requiredDate, ':shippedDate' => $shippedDate,':status' => $status,':comments' => $comments,':customerNumber' => $customerNumber])) {
    header("Location: /crud/indexOrder.php");
  }



}


 ?>
<?php require 'headerOrder.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update order</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="orderNumber">Order Number</label>
          <input type="text" value="<?= $orders->orderNumber; ?>" name="orderNumber" id="orderNumber" class="form-control">
        </div>
        <div class="form-group">
          <label for="orderDate">Order Date</label>
          <input value="<?= $orders->orderDate; ?>" type="text" name="orderDate" id="orderDate" class="form-control">
        </div>
        <div class="form-group">
          <label for="requiredDate">Required Date</label>
          <input type="text" value="<?= $orders->requiredDate; ?>" name="requiredDate" id="requiredDate" class="form-control">
        </div>
        <div class="form-group">
          <label for="shippedDate">Shipped Datee</label>
          <input value="<?= $orders->shippedDate; ?>" type="text" name="shippedDate" id="shippedDate" class="form-control">
        </div>
        <div class="form-group">
          <label for="status">status</label>
          <input type="text" value="<?= $orders->status; ?>" name="status" id="status" class="form-control">
        </div><div class="form-group">
          <label for="comments">Comments</label>
          <input value="<?= $orders->comments; ?>" type="text" name="comments" id="comments" class="form-control">
        </div>
        <div class="form-group">
          <label for="customerNumber">Customer Number</label>
          <input type="text" value="<?= $orders->customerNumber; ?>" name="customerNumber" id="customerNumber" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update product</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
