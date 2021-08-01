<?php
require_once "../koneksi.php";
require_once "../functions.php";

check_login();
//TODO : Membuat default variable & membaca data POST
    $customerid  = $_POST['customerid'] ?? '' ;
	$nama  = $_POST['customername'] ?? '' ;
	$gender  = $_POST['gender'] ?? '' ;
	$notelp  = $_POST['notelp'] ?? '' ;
	$email  = $_POST['email'] ?? '' ;
	$alamat  = $_POST['alamat'] ?? '' ;
    $nomesin =$_POST['nomesin'] ?? '' ;
    $nopol =$_POST['nopol'] ?? '' ;
    $isError = FALSE;
	$error = '';

//TODO : Jika data disubmit, maka lakukan validasi dan simpan data
if(isset($_POST['submit'])){
		
    //contoh validasi data
    if($customerid == ''){
        $isError = TRUE;
        $error .= 'ID Customer is Mandatory!!';
    }else if (checkCustomerid($customerid)== FALSE){
        $isError = TRUE;
        $error .= 'ID Customer is Already Exist!!';
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
    //jika tidak ada salah input, maka simpan data ke dalam database
    if(!$isError){
        $conn = open_connection();

        $query = "INSERT INTO 
                    customer (customerid, customername, jeniskelamin, notelp, email, alamat, nomesin, nopol) 
                VALUES ('$customerid','$nama', '$gender', '$notelp', '$email', '$alamat', '$nomesin', '$nopol'); ";

        $hasil = mysqli_query($conn, $query);
        if($hasil){
            $url = BASE_URL . 'customer/customer.php';
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
            <?php include "form_customer.php"; ?>
        </main>
        <?php include "../contents/footer.php"; ?>
    </body>
</html>
