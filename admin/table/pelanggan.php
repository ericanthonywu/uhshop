<?
// session_start();
require_once('../class/connection.php');
$sql= mysqli_query($inventory,"SELECT * FROM customer");
$arr=array();
$no=0;
while($row = mysqli_fetch_array($sql)){
	$no++;
	$temp=array(
       "no"=>$no,
       "kode"=>$row['customer_code'],
       "nama"=>$row['customer_name'],
       "alamat"=>$row['customer_address'],
       "telpon"=>$row['customer_phone']
   );
   array_push($arr,$temp);
}
$data = json_encode($arr);

echo "{\"data\" : " . $data . "}";
?>