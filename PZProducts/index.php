<?php
require 'db.php';
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `products` WHERE CONCAT(`productCode`, `productName`, `productLine`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `products`";
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
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>All products</h2>
    </div>
    <div class="card-body">
    <form action="index.php" method="post" class="form-inline d-flex justify-content-center md-form form-sm">
            <input type="text" name="valueToSearch" placeholder="Unesite podatak za pretragu" class="form-control form-control-sm mr-3 w-75" aria-label="Search">
            <i class="fas fa-search" aria-hidden="true"></i><br><br>
            <input type="submit" name="search" value="Pretraži" class="btn btn-primary"><br><br>
      <table class="table table-bordered">
        <tr>
          <th>Product Code</th>
          <th>Products Name</th>
          <th>Products Line</th>
          <th>Action</th>
        </tr>
        <?php while($row = mysqli_fetch_array($search_result)):?>
          <tr>
            <td><?php echo $row['productCode'];?></td>
            <td><?php echo $row['productName'];?></td>
            <td><?php echo $row['productLine'];?></td>
            <td>
              <a href="read.php?productCode=<?= $row['productCode']; ?>" class="btn btn-success">Read</a>
              <a href="edit.php?productCode=<?= $row['productCode']; ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?productCode=<?= $row['productCode']; ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
