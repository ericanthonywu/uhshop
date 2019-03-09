<?
// session_start();
require_once('../class/connection.php');

if(isset($_GET['kode'])){
	$kode = $_GET['kode'];
}else{
	$query_kode=mysqli_query($inventory,"SELECT buy_invoice FROM buy ORDER BY buy_id DESC LIMIT 1");
	$num_urut_kode = mysqli_num_rows($query_kode);
	$data_urut_kode = mysqli_fetch_array($query_kode);
		
	$awal_kode = substr($data_urut_kode['buy_invoice'],0-4);
	$next_kode = (int)$awal_kode+(int)1;
	$jnim_kode = strlen($next_kode);
	if (!$data_urut_kode['buy_invoice']){
		$no_kode = "0001";
	}
	elseif($jnim_kode == 1){
		$no_kode = "000";
	} 
	elseif($jnim_kode == 2){
		$no_kode = "00";
	}
	elseif($jnim_kode == 3){
		$no_kode = "0";
	}
	if ($num_urut_kode == 0){
		$kode = "PEMBELIAN-".$no_kode;
	}
	else{
		$kode = "PEMBELIAN-".$no_kode.$next_kode;
	}
}
$sql= mysqli_query($inventory,"SELECT * FROM v_detail_buy WHERE buy_invoice = '$kode'");
$arr=array();
$no=0;
while($row = mysqli_fetch_array($sql)){
	$no++;
	$temp=array(
       "no"=>$no,
       "kode"=>$row['buy_invoice'],
       "id"=>$row['buy_detail_id'],
       "nama"=>$row['item_name'],
       "harga"=>"Rp. ".number_format($row['buy_price']),
       "jumlah"=>number_format($row['buy_quantity'])." Unit"
   );
   array_push($arr,$temp);
}
$data = json_encode($arr);

echo "{\"data\" : " . $data . "}";
?>