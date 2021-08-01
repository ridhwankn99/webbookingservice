<?php
require_once "../koneksi.php";
require_once "../functions.php";

check_login();
    $list_gruppart = array("OLI", "BAN", "REM", "ELEKTRIK", "ACC");
//TODO : Membuat default variable & membaca data POST
    $partid  = $_POST['partid'] ?? '' ;
	$kodepart  = $_POST['kodepart'] ?? '' ;
	$description  = $_POST['description'] ?? '' ;
	$gruppart  = $_POST['gruppart'] ?? '' ;
	$harga  = $_POST['harga'] ?? '' ;
    $isError = FALSE;
	$error = '';

//TODO : Jika data disubmit, maka lakukan validasi dan simpan data
if(isset($_POST['submit'])){
		
    //contoh validasi data
    if($partid == ''){
        $isError = TRUE;
        $error .= 'ID Part is Mandatory!!';
    }

    if($kodepart == ''){
        $isError = TRUE;
        $error .= '<br/>Kode Part is Mandatory!!!';
    }
    if($description == ''){
        $isError = TRUE;
        $error .= '<br/>Deskripsi is Mandatory!!';
    }
    if($gruppart == ''){
        $isError = TRUE;
        $error .= '<br/>Grup Part is Mandatory!!';
    }
    if($harga == ''){
        $isError = TRUE;
        $error .= '<br/>Harga is Mandatory!!';
    }
    //jika tidak ada salah input, maka simpan data ke dalam database
    if(!$isError){
        $conn = open_connection();

        $query = "INSERT INTO 
                    part (partid, kodepart, description, gruppart, harga) 
                VALUES ('$partid','$kodepart', '$description', '$gruppart', '$harga'); ";

        $hasil = mysqli_query($conn, $query);
        if($hasil){
            $url = BASE_URL . 'sparepart/sparepart.php';
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
        <title> Input Data Sparepart</title>
        <?php include "../contents/headscript.php";?>
    </head>
    <body>
        <?php include "../contents/navbar.php"; ?>
        <main>
            <?php include "form_sparepart.php" ?>
        </main>
        <?php include "../contents/footer.php"; ?>
    </body>
</html>
