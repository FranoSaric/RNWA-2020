<?php
$connect = mysqli_connect("localhost", "root", "", "hr_debt");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM employees 
	WHERE emp_no LIKE '%".$search."%'
	OR first_name LIKE '%".$search."%' 
	OR gender LIKE '%".$search."%' 
	";
}
else
{
	$query = "
	SELECT * FROM employees ORDER BY emp_no";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>EMP No.</th>
							<th>First_name</th>
							<th>Last_Name</th>
							<th>Gender</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["emp_no"].'</td>
				<td>'.$row["first_name"].'</td>
				<td>'.$row["last_name"].'</td>
				<td>'.$row["gender"].'</td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>