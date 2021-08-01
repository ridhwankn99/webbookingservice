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
            $query = "SELECT * FROM bengkel, booking, motor WHERE bengkel.bengkelid = '$idd' AND booking.bengkelid = '$idd' AND motor.motorid=booking.motorid AND booking.tanggalbooking='$datebooking'";
										
            $data = mysqli_query($conn, $query);
            $dataPdf = '<h1>REPORT MOTOR</h1>';
            $dataPdf .= '<table border= "1" cellpading = "10" cellspacing = "0">
            <tr>
				<th scope="col">ID Motor</th>
				<th scope="col">Tanggal Booking</th>
				<th scope="col">Nama Motor</th>
				<th scope="col">Tahun Perakitan</th>
				<th scope="col">Warna Motor</th>
				<th scope="col">Tipe Motor</th>
			</tr>';
										
            if(mysqli_num_rows($data) > 0){
                while($row = mysqli_fetch_assoc($data)){
                    echo "<tr>";
						echo "<td>$row[motorid]</td>";
						echo "<td>$row[tanggalbooking]</td>";
						echo "<td>$row[motorname]</td>";
						echo "<td>$row[taper]</td>";
						echo "<td>$row[warmot]</td>";
						echo "<td>$row[motortype]</td>";
						echo "</tr>";

                    $dataPdf .= '<tr>
                        <td>'.$row['motorid'] .' </td>
                        <td>'.$row['tanggalbooking'] .' </td>
                        <td>'.$row['motorname'] .' </td>
                        <td>'.$row['taper'] .' </td>
                        <td>'.$row['warmot'] .' </td>
                        <td>'.$row['motortype'] .' </td>												
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