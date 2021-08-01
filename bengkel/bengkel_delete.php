<?php
require_once "../koneksi.php";
require_once "../functions.php";

check_login();

$bengkelid = $_GET['bengkelid'];
$conn = open_connection();
$query = "DELETE FROM bengkel WHERE bengkelid = '$bengkelid'";

$hasil = mysqli_query($conn, $query);

if ($hasil) {
    $url = BASE_URL . "bengkel/bengkel.php";
    header("Location: $url");
}else {
    echo "Gagaal menghapus data $bengkelid: ". mysqli_error($conn);
}
?>