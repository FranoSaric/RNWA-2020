<h2 style="color:#007bff; text-align:center; font-weight: bold" >DODAVANJE NOVOG DJELATNIKA</h2>
<a href="index.php?controller=employee&action=index" style="color:#007bff; padding-left:50px" >Natrag</a>
<p>
</p>

<form action="index.php?controller=employee&action=employeeCreate" method="post">
	<div class="card">

				
				<div class="card-body">

					<div class="col-sm-6">

						<h5 class="card-title">Polja sa <span class="text-danger">*</span> su obavezna!</h5>

						<form method="post">

							<div class="form-group">

								<label>Ime <span class="text-danger">*</span></label>

								<input type="text" name="firstName" class="form-control" id="firstName" > 

							</div>

							<div class="form-group">

								<label>Prezime <span class="text-danger">*</span></label>

								<input type="text" name="lastName" class="form-control" id="lastName" > 

							</div>


							<div class="form-group">

								<label>Osobni ID <span class="text-danger">*</span></label>

								<input type="text" name="extension" class="form-control" id="extension" > 

							</div>

							<div class="form-group">

								<label>E-mail <span class="email-danger">*</span></label>

								<input type="email" name="email" class="form-control" id="email" > 

							</div>

							<div class="form-group">

								<label>Broj ureda <span class="text-danger">*</span></label>

								<input type="text" name="officeCode" class="form-control" id="officeCode" > 

							</div>

							<div class="form-group">

								<label>Broj obrađenih zahtjeva <span class="number-danger">*</span></label>

								<input type="number" name="reportsTo" class="form-control" id="reportsTo" > 

							</div>

							<div class="form-group">

								<label>Naziv posla <span class="text-danger">*</span></label>

								<input type="text" name="jobTitle" class="form-control" id="jobTitle" > 

							</div>


							<div class="form-group">

								<button type="submit" name="submit" value="Kreiraj" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Kreiraj</button>

							</div>

						</form>

					</div>

				</div>

			</div>
	</from>