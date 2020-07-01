<?php
require 'db.php';
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM orders o1 INNER JOIN orderdetails o2 ON o1.orderNumber=o2.orderNumber WHERE `status` LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM orders o1 INNER JOIN orderdetails o2 ON o1.orderNumber=o2.orderNumber";
    //$query = "SELECT * FROM `orders` JOIN `orderdetails` ON `orders.orderNumber=orderdetailes.orderNumber`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "classicmodels");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

 ?>
<?php require 'headerOrder.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>All orders</h2>
    </div>
    <div class="card-body">
    
    <form action="indexOrder.php" method="post" class="form-inline d-flex justify-content-center md-form form-sm">
            <input type="text" name="valueToSearch" placeholder="Unesite podatak za pretragu" class="form-control form-control-sm mr-3 w-75" aria-label="Search">
            <i class="fas fa-search" aria-hidden="true"></i><br><br>
            <input type="submit" name="search" value="Pretraži" class="btn btn-primary"><br><br>
      <table class="table table-bordered">
        <tr>
          <th>Order Number</th>
          <th>Order Date</th>
          <th>Required Date</th>
          <th>Shipped Date</th>
          <th>Status</th>
          <th>Comments</th>
          <th>Customer Number</th>
          <th>Price Each</th>
          <th>Action</th>
        </tr>
        <?php while($row = mysqli_fetch_array($search_result)):
          ?>
          <tr>
            <td><?php echo $row['orderNumber'];?></td>
            <td><?php echo $row['orderDate'];?></td>
            <td><?php echo $row['requiredDate'];?></td>
            <td><?php echo $row['shippedDate'];?></td>
            <td><?php echo $row['status'];?></td>
            <td><?php echo $row['comments'];?></td>
            <td><?php echo $row['customerNumber'];?></td>
            <td><?php echo $row['priceEach'];?></td>
            <td>
              <a href="readOrder.php?orderNumber=<?= $row['orderNumber']; ?>" class="btn btn-success">Read</a>
              <a href="editOrder.php?orderNumber=<?= $row['orderNumber']; ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="deleteOrder.php?orderNumber=<?= $row['orderNumber']; ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
