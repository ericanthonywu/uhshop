<?
// session_start();
require_once('../class/connection.php');
$datas = '';
if(isset($_GET['data'])){
$datas = $_GET['data'];
}
//if(isset($_GET['data'])){
//    $date = date('Y-m-d');
//    $hari = date('d');
//    $bulan = date('m');
//	if($bulan == 01){
//		$bulan = 12;
//	}else{
//		$bulanlalu = $bulan-1;
//	}
//    $tahun = date('Y');
//    $data = $_POST['data'];
//    $waktu = $whereclause = $tglkurang = $jangkawaktu = $between = $bulanlalu ='';
//    switch ($data) {
//        case "Hari ini":
//            $whereclause = "where buy_date = $date";
//            break;
//        case "Kemarin":
//            $waktu = '1 DAY';
//            break;
//        case "7 Hari Terakhir":
//            $waktu = '6 DAY';
//            $between = 'yes';
//            break;
//        case "30 Hari Terakhir":
//            $waktu = '29 DAY';
//            $between = 'yes';
//            break;
//        case "Bulan ini":
//            $whereclause = "where month(buy_date) = '$bulan' AND YEAR(buy_date)='$tahun'";
//            break;
//        case "Bulan lalu":
//
//			$whereclause = "where month(buy_date) = '$bulanlalu' AND YEAR(buy_date)='$tahun'";
//            break;
//        case "Custom":
//            $tglawals = $_POST['tglawal'];
//			$explode1 = explode("/",$tglawals);
//			$tglawal = $explode1[2]."-".$explode1[0]."-".$explode1[1];
//
//			$tglakhirs = $_POST['tglakhir'];
//			$explode2 = explode("/",$tglakhirs);
//			$tglakhir = $explode2[2]."-".$explode2[0]."-".$explode2[1];
//            $whereclause = "where buy_date between '$tglawal' and '$tglakhir'";
//            break;
//		case "":
//			$whereclause = '';
//			break;
//        default:
//            break;
//    }
//    if (!empty($waktu) && empty($whereclause)) {
//        $sqltgl = mysqli_query($inventory, "SELECT DATE_SUB('$date', INTERVAL $waktu ) as 'hasiltgl'");
//        $re = mysqli_fetch_array($sqltgl);
//        $tglkurang = $re['hasiltgl'];
//        if(empty($between)) {
//            $whereclause = "where buy_date = '$tglkurang'";
//        }else{
//            $whereclause = "where buy_date between '$tglkurang' and '$date'";
//        }
//    }
    //$sql = mysqli_query($inventory, "SELECT * FROM v_buy where month(buy_date) = '$bulan' AND YEAR(buy_date)='$tahun'")or die(mysqli_error($inventory));
    $sql = mysqli_query($inventory, "SELECT * FROM v_buy $datas")or die(mysqli_error($inventory));
	$arr=array();
	$no=0;
	while($row = mysqli_fetch_array($sql)){
		$no++;
		$temp=array(
		   "no"=>$no,
		   "kode"=>$row['buy_invoice'],
		   "supplier"=>$row['supplier_name'],
		   "tanggal"=>TanggalIndo($row['buy_date']),
		   "total"=>"Rp. ".number_format($row['buy_total_price'])
	   );
	   array_push($arr,$temp);
	}
	$data = json_encode($arr);

	echo "{\"data\" : " . $data . "}";
//}
?>