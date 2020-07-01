<h2 style="color:#007bff; text-align:center; font-weight: bold" >DODAVANJE NOVOG PROIZVODA</h2>
<a href="index.php?controller=products&action=index" style="color:#007bff; padding-left:50px" >Natrag</a>
<p>
</p>

<form action="index.php?controller=products&action=productCreate" method="post">
	<div class="card">

				
				<div class="card-body">

					<div class="col-sm-6">

						<h5 class="card-title">Polja sa <span class="text-danger">*</span> su obavezna!</h5>

						<form method="post">

							<div class="form-group">

								<label>Proizvod ID <span class="text-danger">*</span></label>

								<input type="text" name="productCode" class="form-control" id="productCode" > 

							</div>

							<div class="form-group">

								<label>Naziv proizvoda <span class="text-danger">*</span></label>

								<input type="text" name="productName" class="form-control" id="productName" > 

							</div>

							<div class="form-group">

								<label>Kategorija <span class="text-danger">*</span></label>

								<input type="text" name="productLine" class="form-control" id="productLine" > 

							</div>

							<div class="form-group">

								<label>Skala <span class="text-danger">*</span></label>

								<input type="text" name="productScale" class="form-control" id="productScale" > 

							</div>

							<div class="form-group">

								<label>Proizvođač <span class="text-danger">*</span></label>

								<input type="text" name="productVendor" class="form-control" id="productVendor" > 

							</div>

							<div class="form-group">

								<label>Detalji <span class="text-danger">*</span></label>

								<input type="text" name="productDescription" class="form-control" id="productDescription" > 

							</div>

							<div class="form-group">

								<label>Količina <span class="text-danger">*</span></label>

								<input type="text" name="quantityInStock" class="form-control" id="quantityInStock" > 

							</div>

							<div class="form-group">

								<label>Nabavna cijena <span class="text-danger">*</span></label>

								<input type="text" name="buyPrice" class="form-control" id="buyPrice" > 

							</div>

							<div class="form-group">

								<label>Prodajna cijena <span class="text-danger">*</span></label>

								<input type="text" name="MSRP" class="form-control" id="MSRP" > 

							</div>

							<div class="form-group">

								<button type="submit" name="submit" value="Kreiraj" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Kreiraj</button>

							</div>

						</form>

					</div>

				</div>

			</div>
	</from>