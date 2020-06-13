<?php
require 'db.php';
$message = '';
if (isset($_POST['orderNumber']) && isset ($_POST['orderDate'])  && isset($_POST['requiredDate'])  && isset($_POST['shippedDate']) && isset($_POST['status']) && isset($_POST['comments']) && isset($_POST['customerNumber']) && isset($_POST['priceEach'])) {
  $orderNumber = $_POST['orderNumber'];
  $orderDate = $_POST['orderDate'];
  $requiredDate = $_POST['requiredDate'];
  $shippedDate = $_POST['shippedDate'];
  $status = $_POST['status'];
  $comments = $_POST['comments'];
  $customerNumber = $_POST['customerNumber'];
  $priceEach = $_POST['priceEach'];
  $sql = 'INSERT INTO orders(orderNumber, orderDate, requiredDate, shippedDate, status, comments, customerNumber, priceEach) VALUES(:orderNumber, :orderDate, :requiredDate, :shippedDate, :status, :comments, :customerNumber, :priceEach)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':orderNumber' => $orderNumber, ':orderDate' => $orderDate, ':requiredDate' => $requiredDate, ':shippedDate' => $shippedDate,':status' => $status,':comments' => $comments,':customerNumber' => $customerNumber,':priceEach' => $priceEach])) {
    $message = 'data inserted successfully';
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Create product</h2>
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
          <input type="text"  name="orderNumber" id="orderNumber" class="form-control">
        </div>
        <div class="form-group">
          <label for="orderDate">Order Date</label>
          <input type="text" name="orderDate" id="orderDate" class="form-control">
        </div>
        <div class="form-group">
          <label for="requiredDate">Required Date</label>
          <input type="text" name="requiredDate" id="requiredDate" class="form-control">
        </div>
        <div class="form-group">
          <label for="shippedDate">Shipped Date</label>
          <input type="text" name="shippedDate" id="shippedDate" class="form-control">
        </div>
        <div class="form-group">
          <label for="status">Status</label>
          <input type="text" name="status" id="status" class="form-control">
        </div><div class="form-group">
          <label for="comments">Comments</label>
          <input type="text" name="comments" id="comments" class="form-control">
        </div>
        <div class="form-group">
          <label for="customerNumber">Customer Number</label>
          <input type="text" name="customerNumber" id="customerNumber" class="form-control">
        </div><div class="form-group">
          <label for="priceEach">Price Each</label>
          <input type="text" name="priceEach" id="priceEach" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Create product</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
