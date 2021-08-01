<?php
	include_once "../functions.php";
	include_once "../koneksi.php";
	//baca parameter nethod GET
	$param_id = $_GET['partid'];
	//buka koneksi
	$conn = open_connection();
	//bikin query select base on kode
	$query = "SELECT * FROM part where partid = '$param_id'";
	//eksekusi query
	$hasil = mysqli_query($conn, $query);
	//baca hasinya
	$dataLama = mysqli_fetch_assoc($hasil);
	


    $partid  = $_POST['partid'] ??  $dataLama['partid'] ;
	$kodepart  = $_POST['kodepart'] ??  $dataLama['kodepart'] ;
	$description  = $_POST['description'] ?? $dataLama['description'] ;
	$gruppart  = $_POST['gruppart'] ?? $dataLama['gruppart'] ;
	$harga  = $_POST['harga'] ?? $dataLama['harga'] ;

    $isError = FALSE;
    $error= '';
	//validasi form
	if($partid != $dataLama['partid']){
		$isError = TRUE;
		$error = 'Part ID tidak boleh diubah';
	}

	
	//TODO : Jika data disubmit, maka lakukan validasi dan simpan data jika validasi berhasil
	if (isset($_POST['partid'])){
		$queryUpdate = "UPDATE part SET
						kodepart = '$kodepart',
						description = '$description',
						gruppart = '$gruppart',
						harga = '$harga'
						WHERE partid = '$partid'";

		
		$hasilUpdate = mysqli_query ($conn, $queryUpdate);
		if ($hasilUpdate){
			$url = BASE_URL . "sparepart/sparepart.php";
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
	<title>Edit Data Sparepart</title>
	<?php include "../contents/headscript.php"; ?>
</head>
<body>
	<?php include "../contents/navbar.php"; ?>

	<main>
		<?php include "form_sparepart.php" ?>
	</main>

	<?php include "../contents/footer.php"; ?>
</body>
</html>