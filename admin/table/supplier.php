<?
// session_start();
require_once('../class/connection.php');
$sql= mysqli_query($inventory,"SELECT * FROM supplier");
$arr=array();
$no=0;
while($row = mysqli_fetch_array($sql)){
	$no++;
	$temp=array(
       "no"=>$no,
       "kode"=>$row['supplier_code'],
       "nama"=>$row['supplier_name'],
       "alamat"=>$row['supplier_address'],
       "telpon"=>$row['supplier_phone']
   );
   array_push($arr,$temp);
}
$data = json_encode($arr);

echo "{\"data\" : " . $data . "}";
?>