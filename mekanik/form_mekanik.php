<div class="container">	
	<?php if($isError) : ?>
		<div class="alert alert-danger" role="alert">
			<?= $error ?>
		</div>
	<?php endif; ?>

	<form method="POST">
        <h1>Halaman Input Mekanik</h1>
    </br>
	
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">ID Mekanik*</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" name="mekanikid" value="<?= $mekanikid ?>">
                </br>
   
			</div> 
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Nama Mekanik*</label>
			<div class="col-sm-5">
            <input type="text" class="form-control" name="namamekanik" value="<?= $namamekanik ?>">
                </br>
			</div>
		</div>

        <div class="form-group row">
			<label for="kodebengkel" class="col-sm-2 col-form-label">Kode Bengkel*</label>
			<div class="col-sm-5">
				<select name="kodebengkel" class="form-select">
                    <option value = "">-- Pilih Kode Bengkel --</option>
                    <?php
                    if(count ($list_bengkel) > 0) {
                        foreach ($list_bengkel as $kbengkel => $namabengkel){
                            $terpilih = '';
                            if($kodebengkel == $kbengkel){
                                $terpilih = ' selected';
                            }
                            echo "<option value='$kbengkel' $terpilih > $kbengkel-$namabengkel</option>";
                        }
                    }

					

                    ?>
    </select>
                </br>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-sm-5">
				<button type="submit" class="btn btn-primary " name="submit">Save</button>
                <button type="reset" class="btn btn-primary " name="reset">Clear</button>
				<a href="<?=BASE_URL?>mekanik/mekanik.php" class="btn btn-primary" role="button">Cancel</a>

			</div>
		</div>
	</form>
</div>	