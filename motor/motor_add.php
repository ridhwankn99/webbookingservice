<?php
require_once "../koneksi.php";
require_once "../functions.php";

check_login();
//TODO : Membuat default variable & membaca data POST
    $motorid  = $_POST['motorid'] ?? '' ;
	$motorname  = $_POST['motorname'] ?? '' ;
	$motortype  = $_POST['motortype'] ?? '' ;
	$taper  = $_POST['taper'] ?? '' ;
	$warmot  = $_POST['warmot'] ?? '' ;
    $isError = FALSE;
	$error = '';

//TODO : Jika data disubmit, maka lakukan validasi dan simpan data
if(isset($_POST['submit'])){
		
    //contoh validasi data
    if($motorid == ''){
        $isError = TRUE;
        $error .= 'Motor ID is Mandatory!!';
    }

    if($motortype == ''){
        $isError = TRUE;
        $error .= '<br/>Type Motor is Mandatory!!!';
    }
    if($warmot == ''){
        $isError = TRUE;
        $error .= '<br/>Warna Motor is Mandatory!!';
    }
    //jika tidak ada salah input, maka simpan data ke dalam database
    if(!$isError){
        $conn = open_connection();

        $query = "INSERT INTO 
                    motor (motorid, motorname, motortype, taper, warmot) 
                VALUES ('$motorid','$motorname', '$motortype', '$taper', '$warmot'); ";

        $hasil = mysqli_query($conn, $query);
        if($hasil){
            $url = BASE_URL . 'motor/motor.php';
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
        <title> Input Detail Motor</title>
        <?php include "../contents/headscript.php";?>
    </head>
    <body>
        <?php include "../contents/navbar.php"; ?>
        <main>
            <?php include "form_motor.php" ?>
        </main>
        <?php include "../contents/footer.php"; ?>
    </body>
</html>
