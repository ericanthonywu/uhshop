<?
// session_start();
require_once('../class/connection.php');
$sql= mysqli_query($inventory,"SELECT * FROM v_buy");
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
?>