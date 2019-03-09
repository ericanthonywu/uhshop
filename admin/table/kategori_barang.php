<?
// session_start();
require_once('../class/connection.php');
$sql= mysqli_query($inventory,"SELECT * FROM item_type");
$arr=array();
$no=0;
while($row = mysqli_fetch_array($sql)){
	$no++;
	$temp=array(
       "no"=>$no,
       "item_type_id"=>$row['item_type_id'],
       "item_type"=>$row['item_type']
   );
   array_push($arr,$temp);
}
$data = json_encode($arr);

echo "{\"data\" : " . $data . "}";
?>