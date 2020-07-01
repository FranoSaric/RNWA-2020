<?php
require 'db.php';
$productCode = $_GET['productCode'];
$sql = 'DELETE FROM products WHERE productCode=:productCode';
$statement = $connection->prepare($sql);
if ($statement->execute([':productCode' => $productCode])) {
  header("Location: /BIRTandAJAX/PZProducts/index.php");
}