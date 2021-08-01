<div class="container">	
	<?php if($isError) : ?>
		<div class="alert alert-danger" role="alert">
			<?= $error ?>
		</div>
	<?php endif; ?>

	<form method="POST">
        <h1>Halaman Input Jasa</h1>
    </br>
	
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Jasa ID*</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="jasaid" value="<?= $jasaid ?>">
    </br>
   
			</div> 
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Nama Jasa*</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="namajasa" value="<?= $namajasa ?>">
                </br>
			</div>
		</div>


		<div class="form-group row">
			<label for= "tipejasa" class="col-sm-2 col-form-label">Tipe Jasa*</label>
			<div class="col-sm-10">
				<select name="tipejasa" class="form-control" >
                    <option value = "">-- Pilih Tipe Jasa --</option>
					<option value = "REGULAR" <?=$tipejasa ?> <?= $tipejasa == "REGULAR" ? ' selected' : ''?> >REGULAR</option>
					<option value = "NON REGULAR" <?=$tipejasa ?> <?= $tipejasa == "NON REGULAR" ? ' selected' : ''?> >NON REGULAR</option>
    </select>
                </br>
			</div>
		</div>
        


		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Harga</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="harga" value="<?= $harga ?>">
                </br>
			</div>
		</div>
        
        <div class="form-group row">
			<label class="col-sm-2 col-form-label">Estimasi Waktu (Menit)</label>
			<div class="col-sm-10">
            <input type="text" class="form-control" name="estimasiwaktu" value="<?= $estimasiwaktu ?>">
    </br>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-sm-10">
				<button type="submit" class="btn btn-primary " name="submit">Simpan</button>
				<button type="reset" class="btn btn-primary " name="reset">Clear</button>
				<a href="<?=BASE_URL?>jasa/jasa.php" class="btn btn-primary" role="button">Cancel</a>
			</div>
		</div>
	</form>
</div>	