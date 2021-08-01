<?php
require_once "../koneksi.php";
require_once "../functions.php";

check_login();
//TODO : Membuat default variable & membaca data POST
    $jasaid  = $_POST['jasaid'] ?? '' ;
	$namajasa  = $_POST['namajasa'] ?? '' ;
	$tipejasa  = $_POST['tipejasa'] ?? '' ;
	$harga  = $_POST['harga'] ?? '' ;
	$estimasiwaktu  = $_POST['estimasiwaktu'] ?? '' ;
    $isError = FALSE;
	$error = '';

//TODO : Jika data disubmit, maka lakukan validasi dan simpan data
if(isset($_POST['submit'])){
		
    //contoh validasi data
    if($jasaid == ''){
        $isError = TRUE;
        $error .= 'Jasa ID is Mandatory!!';
    }else if (checkCustomerid($jasaid)== FALSE){
        $isError = TRUE;
        $error .= 'Jasa ID is Already Exist!!';
    }
    if($namajasa == ''){
        $isError = TRUE;
        $error .= '<br/>Nama Jasa is Mandatory!!!';
    }

    if($tipejasa == ''){
        $isError = TRUE;
        $error .= '<br/>Tipe Jasa is Mandatory!!!';
    }
   // if($harga == ''){
      //  $isError = TRUE;
      //  $error .= '<br/>Harga is Mandatory!!';
  //  }

    //jika tidak ada salah input, maka simpan data ke dalam database
    if(!$isError){
        $conn = open_connection();

        $query = "INSERT INTO 
                    jasa (jasaid, namajasa, tipejasa, harga, estimasiwaktu) 
                VALUES ('$jasaid','$namajasa', '$tipejasa', '$harga', '$estimasiwaktu'); ";

        $hasil = mysqli_query($conn, $query);
        if($hasil){
            $url = BASE_URL . 'jasa/jasa.php';
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
        <title> Input Data Customer</title>
        <?php include "../contents/headscript.php";?>
    </head>
    <body>
        <?php include "../contents/navbar.php"; ?>
        <main>
            <?php include "form_jasa.php"; ?>
        </main>
        <?php include "../contents/footer.php"; ?>
    </body>
</html>
