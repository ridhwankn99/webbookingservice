<div class="container">	
	<?php if($isError) : ?>
		<div class="alert alert-danger" role="alert">
			<?= $error ?>
		</div>
	<?php endif; ?>

	<form method="POST">
        <h1>Halaman Input Customer</h1>
    </br>
	
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">ID Customer*</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="customerid" value="<?= $customerid ?>">
    </br>
   
			</div> 
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Nama*</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="customername" value="<?= $nama ?>">
                </br>
			</div>
		</div>

        <fieldset class="form-group">
			<div class="row">
				<legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
				<div class="col-sm-10">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="gender" 
						value="Pria" <?= $gender == "Pria" ? 'checked' : '' ?> >
						<label class="form-check-label">Laki-laki</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="gender" 
						value="Wanita" <?= $gender == "Wanita" ? 'checked' : '' ?> >
						<label class="form-check-label">Perempuan</label>
                        </br>
					</div>
				</div>
                </fieldset>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">No Telepon</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="notelp" value="<?= $notelp ?>">
                </br>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Email</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="email" value="<?= $email ?>">
                </br>
			</div>
		</div>
        <div class="form-group row">
			<label class="col-sm-2 col-form-label">Alamat</label>
			<div class="col-sm-10">
				<textarea class="form-control" name="alamat"><?= $alamat ?></textarea>
                </br>
			</div>
		</div>
        <div class="form-group row">
			<label class="col-sm-2 col-form-label">No. Mesin Kendaraan*</label>
			<div class="col-sm-10">
            <input type="text" class="form-control" name="nomesin" value="<?= $nomesin ?>">
    </br>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">No. Polisi Kendaraan*</label>
			<div class="col-sm-10">
            <input type="text" class="form-control" name="nopol" value="<?= $nopol ?>">
    </br>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-sm-10">
				<button type="submit" class="btn btn-primary " name="submit">Simpan</button>
				<button type="reset" class="btn btn-primary " name="reset">Clear</button>
				<a href="<?=BASE_URL?>customer/customer.php" class="btn btn-primary" role="button">Cancel</a>
			</div>
		</div>
	</form>
</div>	