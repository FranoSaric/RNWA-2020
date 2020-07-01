<h2 style="color:#007bff; text-align:center; font-weight: bold" >UREĐIVANJE PROIZVODA</h2>
<a href="index.php?controller=products&action=index" style="color:#007bff; padding-left:50px" >Natrag</a>
<p>
</p>

<form action="index.php?controller=products&action=productEdit" method="post">
	<div class="card">

				
				<div class="card-body">

					<div class="col-sm-6">

						<h5 class="card-title">Polja sa <span class="text-danger">*</span> su obavezna!</h5>

						<form method="post">

							<div class="form-group">

								<label>Proizvod ID <span class="text-danger">*</span></label>

								<input type="text" name="productCode" class="form-control" id="productCode" value="<?php echo $products->productCode; ?>"> 

							</div>

							<div class="form-group">

								<label>Naziv proizvoda <span class="text-danger">*</span></label>

								<input type="text" name="productName" class="form-control" id="productName" value="<?php echo $products->productName; ?>">

							</div>

							<div class="form-group">

								<label>Kategorija <span class="text-danger">*</span></label>

								<input type="text" name="productLine" class="form-control" id="productLine" value="<?php echo $products->productLine; ?>">

							</div>

							<div class="form-group">

								<label>Skala <span class="text-danger">*</span></label>

								<input type="text" name="productScale" class="form-control" id="productScale" value="<?php echo $products->productScale; ?>">

							</div>

							<div class="form-group">

								<label>Proizvođač <span class="text-danger">*</span></label>

								<input type="text" name="productVendor" class="form-control" id="productVendor" value="<?php echo $products->productVendor; ?>">

							</div>

							<div class="form-group">

								<label>Detalji <span class="text-danger">*</span></label>

								<input type="text" name="productDescription" class="form-control" id="productDescription" value="<?php echo $products->productDescription; ?>">

							</div>

							<div class="form-group">

								<label>Količina <span class="text-danger">*</span></label>

								<input type="text" name="quantityInStock" class="form-control" id="quantityInStock" value="<?php echo $products->quantityInStock; ?>">

							</div>

							<div class="form-group">

								<label>Nabavna cijena <span class="text-danger">*</span></label>

								<input type="text" name="buyPrice" class="form-control" id="buyPrice" value="<?php echo $products->buyPrice; ?>">

							</div>

							<div class="form-group">

								<label>Prodajna cijena <span class="text-danger">*</span></label>

								<input type="text" name="MSRP" class="form-control" id="MSRP" value="<?php echo $products->MSRP; ?>"> 

							</div>

							<div class="form-group">

								<button type="submit" name="submit" value="Kreiraj" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Uredi</button>

							</div>

						</form>

					</div>

				</div>

			</div>
	</from>