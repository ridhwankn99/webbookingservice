<?php
require_once "../koneksi.php";
require_once "../functions.php";

check_login();
$list_bengkel = get_kode_bengkel();
//TODO : Membuat default variable & membaca data POST
    $mekanikid  = $_POST['mekanikid'] ?? '' ;
	$namamekanik  = $_POST['namamekanik'] ?? '' ;
	$kodebengkel  = $_POST['kodebengkel'] ?? '' ;
    $isError = FALSE;
	$error = '';

//TODO : Jika data disubmit, maka lakukan validasi dan simpan data
if(isset($_POST['submit'])){
		
    //contoh validasi data
    if($mekanikid == ''){
        $isError = TRUE;
        $error .= 'ID Mekanik is Mandatory!!!';
    }

    if($namamekanik == ''){
        $isError = TRUE;
        $error .= '<br/>Nama Mekanik is Mandatory!!!';
    }
    if($kodebengkel == ''){
        $isError = TRUE;
        $error .= '<br/>Kode Bengkel is Mandatory!!!';
    }
    //jika tidak ada salah input, maka simpan data ke dalam database
    if(!$isError){
        $conn = open_connection();

        $query = "INSERT INTO 
                   mekanik (mekanikid, namamekanik, kodebengkel) 
                VALUES ('$mekanikid','$namamekanik', '$kodebengkel'); ";

        $hasil = mysqli_query($conn, $query);
        if($hasil){
            $url = BASE_URL . 'mekanik/mekanik.php';
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
        <title> Input Data Mekanik</title>
        <?php include "../contents/headscript.php";?>
    </head>
    <body>
        <?php include "../contents/navbar.php"; ?>
        <main>
            <?php include "form_mekanik.php"; ?>
        </main>
        <?php include "../contents/footer.php"; ?>
    </body>
</html>
