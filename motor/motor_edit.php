<?php
	include_once "../functions.php";
	include_once "../koneksi.php";
	//baca parameter nethod GET
	$param_id = $_GET['motorid'];
	//buka koneksi
	$conn = open_connection();
	//bikin query select base on kode
	$query = "SELECT * FROM motor where motorid = '$param_id'";
	//eksekusi query
	$hasil = mysqli_query($conn, $query);
	//baca hasinya
	$dataLama = mysqli_fetch_assoc($hasil);
	

    $motorid = $_POST['motorid'] ?? $dataLama['motorid'];
    $motorname = $_POST['motorname'] ?? $dataLama['motorname'];
    $motortype = $_POST['motortype'] ?? $dataLama['motortype'];
    $taper = $_POST['taper'] ?? $dataLama['taper'];
    $warmot = $_POST['warmot'] ?? $dataLama['warmot'];

    $isError = FALSE;
    $error= '';
	//validasi form
	if($motorid != $dataLama['motorid']){
		$isError = TRUE;
		$error = 'Motor ID tidak boleh diubah';
	}

	
	//TODO : Jika data disubmit, maka lakukan validasi dan simpan data jika validasi berhasil
	if ($isError != TRUE && isset($_POST['motorid'])){
		$queryUpdate = "UPDATE motor SET
						motorname = '$motorname',
						motortype = '$motortype',
						taper = '$taper',
						warmot = '$warmot'
						WHERE motorid = '$motorid'";

		
		$hasilUpdate = mysqli_query ($conn, $queryUpdate);
		if ($hasilUpdate){
			$url = BASE_URL . "motor/motor.php";
			header ("Location: $url");
		
		}else {
			$isError = TRUE;
			$error = "Gagal Mengupdate data ke database ";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Detail Motor</title>
	<?php include "../contents/headscript.php"; ?>
</head>
<body>
	<?php include "../contents/navbar.php"; ?>

	<main>
		<?php include "form_motor.php" ?>
	</main>

	<?php include "../contents/footer.php"; ?>
</body>
</html>