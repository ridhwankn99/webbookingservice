<div class="container">	
	<?php if($isError) : ?>
		<div class="alert alert-danger" role="alert">
			<?= $error ?>
		</div>
	<?php endif; ?>

	<form method="POST">
        <h1>Halaman Input Bengkel</h1>
    </br>
	
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">ID Bengkel*</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="bengkelid" value="<?= $bengkelid ?>">
                </br>
   
			</div> 
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Nama Bengkel*</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="namabengkel" value="<?= $namabengkel ?>">
                </br>
			</div>
		</div>

        <div class="form-group row">
			<label class="col-sm-2 col-form-label">Kode Bengkel*</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="kodebengkel" value="<?= $kodebengkel ?>">
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
			<label class="col-sm-2 col-form-label">No Telepon</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="notelp" value="<?= $notelp ?>">
                </br>
			</div>
		</div>

        <div class="form-group row">
			<label class="col-sm-2 col-form-label">Jam Buka</label>
			<div class="col-sm-10">
				<input type="time" class="form-control" name="jambuka" value="<?= $jambuka ?>">
                </br>
			</div>
		</div>

        <div class="form-group row">
			<label class="col-sm-2 col-form-label">Jam Tutup</label>
			<div class="col-sm-10">
				<input type="time" class="form-control" name="jamtutup" value="<?= $jamtutup ?>">
                </br>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-sm-10">
				<button type="submit" class="btn btn-primary " name="submit">Save</button>
                <button type="reset" class="btn btn-primary " name="reset">Clear</button>
				<a href="<?=BASE_URL?>bengkel/bengkel.php" class="btn btn-primary" role="button">Cancel</a>
			</div>
		</div>
	</form>
</div>	