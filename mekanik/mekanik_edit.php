<?php
	include_once "../functions.php";
	include_once "../koneksi.php";
    check_login();
	$list_bengkel = get_kode_bengkel();
	//baca parameter nethod GET
	$param_id = $_GET['mekanikid'];
	//buka koneksi
	$conn = open_connection();
	//bikin query select base on kode
	$query = "SELECT * FROM mekanik where mekanikid = '$param_id'";
	//eksekusi query
	$hasil = mysqli_query($conn, $query);
	//baca hasinya
	$dataLama = mysqli_fetch_assoc($hasil);
    

    $mekanikid = $_POST['mekanikid'] ?? $dataLama['mekanikid'];
    $namamekanik = $_POST['namamekanik'] ?? $dataLama['namamekanik'];
    $kodebengkel = $_POST['kodebengkel'] ?? $dataLama['kodebengkel'];

    $isError = FALSE;
    $error= '';

	//validasi form
	if($mekanikid != $dataLama['mekanikid']){
		$isError = TRUE;
		$error = 'Mekanik ID tidak boleh diubah';
	}
	if($namamekanik == ''){
        $isError = TRUE;
        $error .= '<br/>Nama Mekanik is Mandatory!!!';
    }
    if($kodebengkel == ''){
        $isError = TRUE;
        $error .= '<br/>Kode Bengkel is Mandatory!!!';
    }

	
	//TODO : Jika data disubmit, maka lakukan validasi dan simpan data jika validasi berhasil
	if ($isError != TRUE && isset($_POST['mekanikid'])){
		$queryUpdate = "UPDATE mekanik SET
						namamekanik = '$namamekanik',
						kodebengkel = '$kodebengkel'
						WHERE mekanikid = '$dataLama[mekanikid]'";

		
		$hasilUpdate = mysqli_query ($conn, $queryUpdate);
		if ($hasilUpdate){
			$url = BASE_URL . "mekanik/mekanik.php";
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
	<title>Edit Data Mekanik</title>
	<?php include "../contents/headscript.php"; ?>
</head>
<body>
	<?php include "../contents/navbar.php"; ?>

	<main>
		<?php include "form_mekanik.php" ?>
	</main>

	<?php include "../contents/footer.php"; ?>
</body>
</html>