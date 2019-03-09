<?
// session_start();
require_once('../class/connection.php');
$sql= mysqli_query($inventory,"SELECT * FROM session");
$arr=array();
while($row = mysqli_fetch_array($sql)){
	$level = $row['session_role'];
	if($level == 1){
		$level = "CEO";
	}elseif($level == 2){
		$level = "Admin";
	}
	
	$temp=array(
       "kode"=>$row['session_username'],
       "nama"=>$row['session_name'],
       "email"=>$row['session_email'],
       "level"=>$level
   );
   array_push($arr,$temp);
}
$data = json_encode($arr);

echo "{\"data\" : " . $data . "}";
?>