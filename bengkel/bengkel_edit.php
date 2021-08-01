<?php
	include_once "../functions.php";
	include_once "../koneksi.php";
	//baca parameter nethod GET
	$param_id = $_GET['bengkelid'];
	//buka koneksi
	$conn = open_connection();
	//bikin query select base on kode
	$query = "SELECT * FROM bengkel where bengkelid = '$param_id'";
	//eksekusi query
	$hasil = mysqli_query($conn, $query);
	//baca hasinya
	$dataLama = mysqli_fetch_assoc($hasil);

    $bengkelid = $_POST['bengkelid'] ?? $dataLama['bengkelid'];
    $namabengkel = $_POST['namabengkel'] ?? $dataLama['namabengkel'];
    $kodebengkel = $_POST['kodebengkel'] ?? $dataLama['kodebengkel'];
    $alamat = $_POST['alamat'] ?? $dataLama['alamat'];
    $notelp = $_POST['notelp'] ?? $dataLama['notelp'];
    $jambuka = $_POST['jambuka'] ?? $dataLama['jambuka'];
    $jamtutup = $_POST['jamtutup'] ?? $dataLama['jamtutup'];

    $isError = FALSE;
    $error= '';
	//validasi form
	if($bengkelid != $dataLama['bengkelid']){
		$isError = TRUE;
		$error = 'Bengkel ID tidak boleh diubah';
	}
	if($namabengkel == ''){
        $isError = TRUE;
        $error .= '<br/>Nama Bengkel is Mandatory!!!';
    }
    if($kodebengkel == ''){
        $isError = TRUE;
        $error .= '<br/>Kode Bengkel is Mandatory!!!';
    }

	
	//TODO : Jika data disubmit, maka lakukan validasi dan simpan data jika validasi berhasil
	if ($isError != TRUE && isset($_POST['bengkelid'])){
		$queryUpdate = "UPDATE bengkel SET
						namabengkel = '$namabengkel',
						kodebengkel = '$kodebengkel',
						alamat = '$alamat',
						notelp = '$notelp',
						jambuka = '$jambuka',
						jamtutup = '$jamtutup'
						WHERE bengkelid = '$bengkelid'";

		
		$hasilUpdate = mysqli_query ($conn, $queryUpdate);
		if ($hasilUpdate){
			$url = BASE_URL . "bengkel/bengkel.php";
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
	<title>Edit Data Bengkel</title>
	<?php include "../contents/headscript.php"; ?>
</head>
<body>
	<?php include "../contents/navbar.php"; ?>

	<main>
		<?php include "form_bengkel.php" ?>
	</main>

	<?php include "../contents/footer.php"; ?>
</body>
</html>