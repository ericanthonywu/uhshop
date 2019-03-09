<?php
session_start();
require_once('../class/connection.php');
if(isset($_POST['data'])){
    $date = date('Y-m-d');
    $hari = date('d');
    $bulan = date('m');
    $tahun = date('Y');
    $data = $_POST['data'];
    $waktu = $whereclause = $tglkurang = $jangkawaktu = $between = $bulanlalu ='';
    switch ($data) {
        case "Hari ini":
            $whereclause = "where sale_date = $date";
            break;
        case "Kemarin":
            $waktu = '1 DAY';
            break;
        case "7 Hari Terakhir":
            $waktu = '6 DAY';
            $between = 'yes';
            break;
        case "30 Hari Terakhir":
            $waktu = '29 DAY';
            $between = 'yes';
            break;
        case "Bulan ini":
            $whereclause = "where month(sale_date) = '$bulan' AND YEAR(sale_date)='$tahun'";
            break;
        case "Bulan lalu":
            //$waktu = '1 MONTH';
			if($bulan == 1){
				$bulan = 12;
			}else{
				$bulan = $bulan - 1;
			}
			$whereclause = "where month(sale_date) = '$bulan' AND YEAR(sale_date)='$tahun'";
            break;
        case "Custom":
            $tglawals = $_POST['tglawal'];
			$explode1 = explode("/",$tglawals);
			$tglawal = $explode1[2]."-".$explode1[0]."-".$explode1[1];
            
			$tglakhirs = $_POST['tglakhir'];
			$explode2 = explode("/",$tglakhirs);
			$tglakhir = $explode2[2]."-".$explode2[0]."-".$explode2[1];
            $whereclause = "where sale_date between '$tglawal' and '$tglakhir'";
            break;
        default:
            break;
    }
    if (!empty($waktu) && empty($whereclause)) {
        $sqltgl = mysqli_query($inventory, "SELECT DATE_SUB('$date', INTERVAL $waktu ) as 'hasiltgl'");
        $re = mysqli_fetch_array($sqltgl);
        $tglkurang = $re['hasiltgl'];
        if(empty($between)) {
            $whereclause = "where sale_date = '$tglkurang'";
        }else{
            $whereclause = "where sale_date between '$tglkurang' and '$date'";
        }
    }
    //$sql = mysqli_query($inventory, "select * from report $whereclause");
	echo $whereclause;
}
?>