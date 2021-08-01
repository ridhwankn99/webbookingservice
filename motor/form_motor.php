<div class="container">	
	<?php if($isError) : ?>
		<div class="alert alert-danger" role="alert">
			<?= $error ?>
		</div>
	<?php endif; ?>

	<form method="POST">
        <h1>Halaman Input Motor</h1>
    </br>
	
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Motor ID</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="motorid" value="<?= $motorid ?>">
    </br>
   
			</div> 
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Nama Motor</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="motorname" value="<?= $motorname ?>">
                </br>
			</div>
		</div>

        <fieldset class="form-group">
			<div class="row">
				<legend class="col-form-label col-sm-2 pt-0">Type Motor</legend>
				<div class="col-sm-10">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="motortype" 
						value="Manual" <?= $motortype == "Manual" ? 'checked' : '' ?> >
						<label class="form-check-label">Manual</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="motortype" 
						value="Matic" <?= $motortype == "Matic" ? 'checked' : '' ?> >
						<label class="form-check-label">Matic</label>
					</div>
                    <div class="form-check">
						<input class="form-check-input" type="radio" name="motortype" 
						value="Kopling" <?= $motortype == "Kopling" ? 'checked' : '' ?> >
						<label class="form-check-label">Kopling</label>
					</div>
                    </br>
				</div>
                </fieldset>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Tahun Perakitan</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="taper" value="<?= $taper ?>">
                </br>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Warna Motor</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="warmot" value="<?= $warmot ?>">
                </br>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-sm-10">
				<button type="submit" class="btn btn-primary " name="submit">Simpan</button>
				<button type="reset" class="btn btn-primary " name="reset">Clear</button>
				<a href="<?=BASE_URL?>motor/motor.php" class="btn btn-primary" role="button">Cancel</a>
			</div>
		</div>
	</form>
</div>	