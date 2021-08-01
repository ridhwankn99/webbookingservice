<?php
session_start();
define('BASE_URL', "http://localhost/Project PWL/");

function check_login() {
    if (!isset($_SESSION['username'])) {
        header ("Location: http://localhost/Project PWL/login.php");
    }
}
function checkCustomerid ($customerid){
    include_once "../koneksi.php";
	$conn = open_connection();
	$query = "SELECT * FROM customer where customerid = '$customerid'";
	$hasil = mysqli_query($conn, $query);
	$dataLama = mysqli_fetch_assoc($hasil);

    if ($dataLama){
        return FALSE;
    }else {
        return TRUE;
    }
}
function get_kode_bengkel() {
    require_once "koneksi.php";
    $conn = open_connection();
    $query = "SELECT kodebengkel, namabengkel FROM bengkel";
    $hasil = mysqli_query($conn, $query);

    $list = array();
    while ($row = mysqli_fetch_assoc($hasil)){
        $list[$row['kodebengkel']] = $row ['namabengkel'];
    }
    return $list;
}

?>