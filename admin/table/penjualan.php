<?
// session_start();
require_once('../class/connection.php');
$sql= mysqli_query($inventory,"SELECT * FROM v_sale");
$arr=array();
$no=0;
while($row = mysqli_fetch_array($sql)){
	if($row['sale_status']==1){
		$status = "Belum Bayar";
	}elseif($row['sale_status']==2){
		$status = "Belum Lunas";
	}elseif($row['sale_status']==3){
		$status = "Sudah Lunas";
	}
	$no++;
	$temp=array(
       "no"=>$no,
       "kode"=>$row['sale_invoice'],
       "pelanggan"=>$row['customer_name'],
       "status"=>$status,
       "tanggal"=>TanggalIndo($row['sale_date']),
       "total"=>"Rp. ".number_format($row['sale_total_price']),
       "bayar"=>"Rp. ".number_format($row['sale_paid'])
   );
   array_push($arr,$temp);
}
$data = json_encode($arr);

echo "{\"data\" : " . $data . "}";
?>