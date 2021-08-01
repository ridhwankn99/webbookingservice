<?php
	include_once "../functions.php";
	include_once "../koneksi.php";
    check_login();
	//baca parameter nethod GET
	$param_id = $_GET['jasaid'];
	//buka koneksi
	$conn = open_connection();
	//bikin query select base on kode
	$query = "SELECT * FROM jasa where jasaid = '$param_id'";
	//eksekusi query
	$hasil = mysqli_query($conn, $query);
	//baca hasinya
	$dataLama = mysqli_fetch_assoc($hasil);
    

    $jasaid = $_POST['jasaid'] ?? $dataLama['jasaid'];
    $namajasa = $_POST['namajasa'] ?? $dataLama['namajasa'];
    $tipejasa = $_POST['tipejasa'] ?? $dataLama['tipejasa'];
    $harga = $_POST['harga'] ?? $dataLama['harga'];
    $estimasiwaktu =  $_POST['estimasiwaktu'] ?? $dataLama['estimasiwaktu'];

    $isError = FALSE;
    $error= '';
	//validasi form
	if($jasaid != $dataLama['jasaid']){
		$isError = TRUE;
		$error = 'Jasa ID tidak boleh diubah';
	}
	if($namajasa == ''){
        $isError = TRUE;
        $error .= '<br/>Nama Jasa is Mandatory!!!';
    }
    if($tipejasa == ''){
        $isError = TRUE;
        $error .= '<br/>Tipe Jasa is Mandatory!!!';
    }

	
	//TODO : Jika data disubmit, maka lakukan validasi dan simpan data jika validasi berhasil
	if ($isError != TRUE && isset($_POST['jasaid'])){
		$queryUpdate = "UPDATE jasa SET
						namajasa = '$namajasa',
                        tipejasa = '$tipejasa',
                        harga = '$harga',
                        estimasiwaktu = '$estimasiwaktu'
						WHERE jasaid = '$jasaid'";

		
		$hasilUpdate = mysqli_query ($conn, $queryUpdate);
		if ($hasilUpdate){
			$url = BASE_URL . "jasa/jasa.php";
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
	<title>Edit Data Jasa</title>
	<?php include "../contents/headscript.php"; ?>
</head>
<body>
	<?php include "../contents/navbar.php"; ?>

	<main>
		<?php include "form_jasa.php" ?>
	</main>

	<?php include "../contents/footer.php"; ?>
</body>
</html>