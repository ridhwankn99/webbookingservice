<?php
require_once "../koneksi.php";
require_once "../functions.php";

check_login();
//TODO : Membuat default variable & membaca data POST
    $bengkelid  = $_POST['bengkelid'] ?? '' ;
	$namabengkel  = $_POST['namabengkel'] ?? '' ;
	$kodebengkel  = $_POST['kodebengkel'] ?? '' ;
	$alamat  = $_POST['alamat'] ?? '' ;
	$notelp  = $_POST['notelp'] ?? '' ;
	$jambuka  = $_POST['jambuka'] ?? '' ;
    $jamtutup =$_POST['jamtutup'] ?? '' ;
    $isError = FALSE;
	$error = '';

//TODO : Jika data disubmit, maka lakukan validasi dan simpan data
if(isset($_POST['submit'])){
		
    //contoh validasi data
    if($bengkelid == ''){
        $isError = TRUE;
        $error .= 'ID Bengkel is Mandatory!!!';
    }

    if($namabengkel == ''){
        $isError = TRUE;
        $error .= '<br/>Nama Bengkel is Mandatory!!!';
    }
    if($kodebengkel == ''){
        $isError = TRUE;
        $error .= '<br/>Kode Bengkel is Mandatory!!!';
    }
    //jika tidak ada salah input, maka simpan data ke dalam database
    if(!$isError){
        $conn = open_connection();

        $query = "INSERT INTO 
                   bengkel (bengkelid, namabengkel, kodebengkel, alamat, notelp, jambuka, jamtutup) 
                VALUES ('$bengkelid','$namabengkel', '$kodebengkel', '$alamat', '$notelp', '$jambuka', '$jamtutup'); ";

        $hasil = mysqli_query($conn, $query);
        if($hasil){
            $url = BASE_URL . 'bengkel/bengkel.php';
            header("Location: $url");
        }else{
            $isError = TRUE;
            $error = "gagal menyimpan ke database : " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Input Data Bengkel</title>
        <?php include "../contents/headscript.php";?>
    </head>
    <body>
        <?php include "../contents/navbar.php"; ?>
        <main>
            <?php include "form_bengkel.php"; ?>
        </main>
        <?php include "../contents/footer.php"; ?>
    </body>
</html>
