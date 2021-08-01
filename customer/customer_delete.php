<?php
require_once "../koneksi.php";
require_once "../functions.php";

check_login();

$customerid = $_GET['customerid'];
$conn = open_connection();
$query = "DELETE FROM customer WHERE customerid = '$customerid'";

$hasil = mysqli_query($conn, $query);

if ($hasil) {
    $url = BASE_URL . "customer/customer.php";
    header("Location: $url");
}else {
    echo "Gagaal menghapus data $customerid: ". mysqli_error($conn);
}
?>