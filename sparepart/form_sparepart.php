<div class="container">	
	<?php if($isError) : ?>
		<div class="alert alert-danger" role="alert">
			<?= $error ?>
		</div>
	<?php endif; ?>

	<form method="POST">
        <h1>Halaman Input Sparepart</h1>
    	</br>
	
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">ID Sparepart</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="partid" value="<?= $partid ?>">
    	</br>
   
			</div> 
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Kode Sparepart</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="kodepart" value="<?= $kodepart ?>">
                </br>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Deskripsi</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="description" value="<?= $description ?>">
                </br>
			</div>
		</div>

		<div class="form-group row">
			<label for="gruppart" class="col-sm-2 col-form-label">Grup Sparepart*</label>
			<div class="col-sm-10">
				<select name="gruppart" class="form-control" >
                    <option value = "">-- Pilih Grup Sparepart --</option>
                    <option value = "OLI<?=$gruppart ?>" <?= $gruppart == "OLI" ? ' selected' : ''?> >OLI</option>
                    <option value = "BAN<?=$gruppart ?>" <?= $gruppart == "BAN" ? ' selected' : ''?> >BAN</option>
                    <option value = "REM<?=$gruppart ?>" <?= $gruppart == "REM" ? ' selected' : ''?> >REM</option>
                    <option value = "ELEKTRIK<?=$gruppart ?>" <?= $gruppart == "ELEKTRIK" ? ' selected' : ''?> >ELEKTRIK</option>
                    <option value = "ACC<?=$gruppart ?>" <?= $gruppart == "ACC" ? ' selected' : ''?> >ACC</option>
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
			<div class="col-sm-10">
				<button type="submit" class="btn btn-success " name="submit">Simpan</button>
				<button type="reset" class="btn btn-danger " name="reset">Clear</button>
				<a href="<?=BASE_URL?>sparepart/sparepart.php" class="btn btn-primary" role="button">Back</a>
			</div>
		</div>
	</form>
</div>	