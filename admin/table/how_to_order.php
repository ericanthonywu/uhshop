<?
require_once('../class/connection.php');
$sql= mysqli_query($inventory,"SELECT * FROM how_to_order");
$arr=array();
$no=0;
while($row = mysqli_fetch_array($sql)){
    $no++;
    $temp=array(
        "no"=>$row['id'],
        "content"=>$row['content']
    );
    array_push($arr,$temp);
}
$data = json_encode($arr);

echo "{\"data\" : " . $data . "}";
?>