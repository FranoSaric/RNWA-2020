
<h2 style="color:#007bff; text-align:center; font-weight: bold" >POPIS SVIH PROIZVODA</h2>
<a href="index.php?controller=products&action=createIndex" style="color:#007bff; padding-left:50px" >Dodaj proizvod</a>
<p>
   
</p>
<div class="container">
	<table class="table table-striped table-bordered">
					<thead>
						<tr class="bg-primary text-white">
							<th>Proizvod ID</th>
							<th>Naziv proizovda</th>
							<th>Skala</th>
							<th>Proizvođač</th>
							<th>Detalji</th>
							<th>Dostupan broj</th>
							<th>Nabavna cijena</th>
							<th>Prodajna cijena</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($products as $productsingle) { ?>
						<tr>
							<td><?php echo $productsingle->productCode ?></td>
							<td><?php echo $productsingle->productName  ?></td>
							<td><?php echo $productsingle->productScale ?></td>
							<td><?php echo $productsingle->productLine ?></td>
							<td><?php echo $productsingle->productDescription ?></td>
							<td><?php echo $productsingle->quantityInStock ?></td>
							<td><?php echo $productsingle->buyPrice ?></td>
							<td><?php echo $productsingle->MSRP ?></td>
							<td align="center">
							<a href="?controller=products&action=show&productCode=<?php echo  $productsingle->productCode ?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Uredi</a> 
							<a href="?controller=products&action=deleteproduct&productCode=<?php echo  $productsingle->productCode ?>"class="text-danger" onClick="return confirm('Jeste sigurno da želite obrisati ovaj proizvod?');"><i style="padding-top:15px" class="fa fa-fw fa-trash"></i> Obriši</a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
	</table>

<div>
