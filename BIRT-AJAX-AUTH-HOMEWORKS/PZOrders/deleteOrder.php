<?php
require 'db.php';
$orderNumber = $_GET['orderNumber'];
$sql = 'DELETE FROM orders WHERE orderNumber=:orderNumber';
$statement = $connection->prepare($sql);
if ($statement->execute([':orderNumber' => $orderNumber])) {
  header("Location: /BIRTandAJAX/PZOrders/indexOrder.php");
}