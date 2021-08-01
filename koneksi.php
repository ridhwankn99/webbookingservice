
<?php
function open_connection()
{
    $host = "localhost";
    $username = "root";
    $password = "";
    $databasename = "pwl";

    $koneksi = mysqli_connect($host,$username,$password,$databasename);
    //periksa koneksi
    if(mysqli_connect_errno())
    {
        die ("Gagal melakukan koneksi ke MySQL : " .mysqli_conncet_error());
    }
    return $koneksi;
    }



?>