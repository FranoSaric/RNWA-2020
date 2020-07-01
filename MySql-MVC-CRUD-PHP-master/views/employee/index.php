
<h2 style="color:#007bff; text-align:center; font-weight: bold" >POPIS SVIH DJELATNIKA</h2>
<a href="index.php?controller=employee&action=createIndex" style="color:#007bff; padding-left:50px" >Dodaj djelatnika</a>
<p>
   
</p>
<div class="container">
	<table class="table table-striped table-bordered">
					<thead>
						<tr class="bg-primary text-white">
							<th>Ime</th>
							<th>Prezime</th>
							<th>Osobni ID</th>
							<th>E-mail</th>
							<th>Broj ureda</th>
							<th>Broj obrađenih prijava</th>
							<th>Naziv Posla</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($employee as $employeesingle) { ?>
						<tr>
							<td><?php echo $employeesingle->firstName ?></td>
							<td><?php echo $employeesingle->lastName  ?></td>
							<td><?php echo $employeesingle->extension ?></td>
							<td><?php echo $employeesingle->email ?></td>
							<td><?php echo $employeesingle->officeCode ?></td>
							<td><?php echo $employeesingle->reportsTo ?></td>
							<td><?php echo $employeesingle->jobTitle ?></td>
							<td align="center">
							<a href="?controller=employee&action=show&employeeNumber=<?php echo  $employeesingle->employeeNumber  ?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Uredi</a> 
							<br>
							<a href="?controller=employee&action=deletEmployee&employeeNumber=<?php echo  $employeesingle->employeeNumber  ?>"class="text-danger" onClick="return confirm('Jeste sigurno da želite obrisati ovoga djelatnika?');"><i style="padding-top:15px" class="fa fa-fw fa-trash"></i> Obriši</a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
	</table>

<div>
