<h2 style="color:#007bff; text-align:center; font-weight: bold" >UREĐIVANJE DJELATNIKA</h2>
<a href="index.php?controller=employee&action=index" style="color:#007bff; padding-left:50px" >Natrag</a>
<p>
</p>

<form action="index.php?controller=employee&action=employeeEdit" method="post">
	<div class="card">

				
				<div class="card-body">

					<div class="col-sm-6">

						<h5 class="card-title">Polja sa <span class="text-danger">*</span> su obavezna!</h5>

						<form method="post">

							<div class="form-group">

								<label>Broj uposlenika <span class="text-danger">*</span></label>

								<input type="text" name="employeeNumber" class="form-control" id="employeeNumber" value="<?php echo $employee->employeeNumber; ?>"> 

							</div>
							
							
							<div class="form-group">

								<label>Ime <span class="text-danger">*</span></label>

								<input type="text" name="firstName" class="form-control" id="firstName" value="<?php echo $employee->firstName; ?>"> 

							</div>

							<div class="form-group">

								<label>Prezime <span class="text-danger">*</span></label>

								<input type="text" name="lastName" class="form-control" id="lastName" value="<?php echo $employee->lastName; ?>">

							</div>

							<div class="form-group">

								<label>Osobni ID <span class="text-danger">*</span></label>

								<input type="text" name="extension" class="form-control" id="extension" value="<?php echo $employee->extension; ?>">

							</div>

							<div class="form-group">

								<label>E-mail <span class="text-danger">*</span></label>

								<input type="email" name="email" class="form-control" id="email" value="<?php echo $employee->email; ?>">

							</div>

							<div class="form-group">

								<label>Proizvođač <span class="text-danger">*</span></label>

								<input type="text" name="productVendor" class="form-control" id="productVendor" value="<?php echo $employee->productVendor; ?>">

							</div>

							<div class="form-group">

								<label>Broj ureda <span class="text-danger">*</span></label>

								<input type="text" name="officeCode" class="form-control" id="officeCode" value="<?php echo $employee->officeCode; ?>">

							</div>

							<div class="form-group">

								<label>Broj obrađenih podataka<span class="text-danger">*</span></label>

								<input type="number" name="reportsTo" class="form-control" id="reportsTo" value="<?php echo $employee->reportsTo; ?>">

							</div>

							<div class="form-group">

								<label>Naziv posla <span class="text-danger">*</span></label>

								<input type="text" name="jobTitle" class="form-control" id="jobTitle" value="<?php echo $employee->jobTitle; ?>">

							</div>

							<div class="form-group">

								<button type="submit" name="submit" value="" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Uredi</button>

							</div>

						</form>

					</div>

				</div>

			</div>
	</from>