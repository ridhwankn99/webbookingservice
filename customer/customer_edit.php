<?php
	include_once "../functions.php";
	include_once "../koneksi.php";
	//baca parameter nethod GET
	$param_id = $_GET['customerid'];
	//buka koneksi
	$conn = open_connection();
	//bikin query select base on kode
	$query = "SELECT * FROM customer where customerid = '$param_id'";
	//eksekusi query
	$hasil = mysqli_query($conn, $query);
	//baca hasinya
	$dataLama = mysqli_fetch_assoc($hasil);
	


    $customerid = $_POST['customerid'] ?? $dataLama['customerid'];
    $nama = $_POST['customername'] ?? $dataLama['customername'];
    $gender = $_POST['jeniskelamin'] ?? $dataLama['jeniskelamin'];
    $notelp = $_POST['notelp'] ?? $dataLama['notelp'];
    $email = $_POST['email'] ?? $dataLama['email'];
    $alamat = $_POST['alamat'] ?? $dataLama['alamat'];
    $nomesin = $_POST['nomesin'] ?? $dataLama['nomesin'];
    $nopol = $_POST['nopol'] ?? $dataLama['nopol'];

    $isError = FALSE;
    $error= '';
	//validasi form
	
	if($customerid != $dataLama['customerid']){
		$isError = TRUE;
		$error = 'Customer ID tidak boleh diubah';
	}
	if($nama == ''){
        $isError = TRUE;
        $error .= '<br/>Nama is Mandatory!!!';
    }

    if($nomesin == ''){
        $isError = TRUE;
        $error .= '<br/>No Mesin is Mandatory!!!';
    }
    if($nopol == ''){
        $isError = TRUE;
        $error .= '<br/>No Polisi is Mandatory!!';
    }


	//TODO : Jika data disubmit, maka lakukan validasi dan simpan data jika validasi berhasil
	if ($isError != TRUE && isset($_POST['customerid'])){
		$queryUpdate = "UPDATE customer SET
						customername = '$nama',
						jeniskelamin = '$gender',
						notelp = '$notelp',
						email = '$email',
						alamat = '$alamat',
						nomesin = '$nomesin',
						nopol = '$nopol'
						WHERE customerid = '$customerid'";

		
		$hasilUpdate = mysqli_query ($conn, $queryUpdate);
		if ($hasilUpdate){
			$url = BASE_URL . "customer/customer.php";
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
	<title>Edit Data Customer</title>
	<?php include "../contents/headscript.php"; ?>
</head>
<body>
	<?php include "../contents/navbar.php"; ?>

	<main>
		<?php include "form_customer.php" ?>
	</main>

	<?php include "../contents/footer.php"; ?>
</body>
</html>