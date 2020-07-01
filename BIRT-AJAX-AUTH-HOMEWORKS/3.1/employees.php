<?php
require 'db.php';
$s = $_REQUEST["s"];
$hint = "";
if ($s !== "") {
    $s = strtolower($s);
    $len=strlen($s);


    $query = "SELECT * FROM `employees` WHERE CONCAT(`first_name`, `last_name`, `gender`) LIKE '%".$s."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `employees`";
    $search_result = filterTable($query);
}

function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "hr_debt");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}


?>


<table class="table table-bordered">
    <tr style='border: 1px solid black;'>
        <th style='border: 1px solid black;'>First Name</th>
        <th style='border: 1px solid black;'>Last Name</th>
        <th style='border: 1px solid black;'>Gender</th>
    </tr>
  <?php while($myrow=mysqli_fetch_array($search_result)):?>
    <tr style='border: 1px solid black;'>
        <td style='border: 1px solid black;'><?php echo $myrow['first_name'];?></td>
        <td style='border: 1px solid black;'><?php echo $myrow['last_name'];?></td>
        <td style='border: 1px solid black;'><?php echo $myrow['gender'];?></td>
    </tr>
  <?php endwhile; ?>
</table>