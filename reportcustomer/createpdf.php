<?php
require_once "../functions.php";
check_login();

require_once "../koneksi.php";	
require_once "../vendor/autoload.php";
$conn = open_connection();

    if (isset($_POST['print'])) {
        $namebengkel = $_POST['bengkelname'];
        $datebooking = $_POST['datebooking'];
        if($namebengkel != "" || $datebooking != ""){
            $querybengkelid = "SELECT bengkelid FROM bengkel WHERE namabengkel = '$namebengkel'";
            $id = mysqli_query($conn, $querybengkelid);
            while($row = mysqli_fetch_assoc($id)){
                $idd = $row['bengkelid'];
            }
            $query = "SELECT * FROM bengkel, booking, customer WHERE bengkel.bengkelid = '$idd' AND booking.bengkelid = '$idd' AND customer.customerid=booking.customerid AND booking.tanggalbooking='$datebooking'";
										
            $data = mysqli_query($conn, $query);
            $dataPdf = '<h1>REPORT CUSTOMER</h1>';
            $dataPdf .= '<table border= "1" cellpading = "10" cellspacing = "0">
            <tr>
            <th scope="col">ID Customer</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">No Telepon </th>
            <th scope="col">Email</th>
            <th scope="col">Alamat</th>
            <th scope="col">No Mesin</th>
            <th scope="col">No Polisi</th>
            </tr>';
										
            if(mysqli_num_rows($data) > 0){
                while($row = mysqli_fetch_assoc($data)){
                    echo "<tr>";
                    echo "<td>$row[customerid]</td>";
                    echo "<td>$row[tanggalbooking]</td>";
                    echo "<td>$row[customername]</td>";
                    echo "<td>$row[jeniskelamin]</td>";
                    echo "<td>$row[notelp]</td>";
                    echo "<td>$row[email]</td>";
                    echo "<td>$row[alamat]</td>";
                    echo "<td>$row[nomesin]</td>";
                    echo "<td>$row[nopol]</td>";
                    echo "</tr>";

                    $dataPdf .= '<tr>
                    <td>'.$row['customerid'] .' </td>
                    <td>'.$row['tanggalbooking'] .' </td>
                    <td>'.$row['customername'] .' </td>
                    <td>'.$row['jeniskelamin'] .' </td>
                    <td>'.$row['notelp'] .' </td>
                    <td>'.$row['email'] .' </td>                        
                    <td>'.$row['alamat'] .' </td>
                    <td>'.$row['nomesin'] .' </td>
                    <td>'.$row['nopol'] .' </td>
                    </tr>';
                }

                    $dataPdf .= '</table>';
                    ob_start();
                    //Create New PDF instance
                    $mpdf = new \Mpdf\Mpdf();
                    //write pdf
                    $mpdf->WriteHTML($dataPdf);
                    //ouput to browser
                    ob_end_clean();
                    $mpdf->Output('myreport.pdf', 'D');
                
            }
        }
    }

    
?>
