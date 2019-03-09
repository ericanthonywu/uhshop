<?
// session_start();
require_once('../class/connection.php');
$sql= mysqli_query($inventory,"SELECT * FROM testimonial");
$arr=array();
while($row = mysqli_fetch_array($sql)){
    $temp=array(
        "no"=>$row['id'],
        "nama_customer"=>$row['nama_customer'],
        "review"=>$row['review'],
    );
    array_push($arr,$temp);
}
$data = json_encode($arr);

echo "{\"data\" : " . $data . "}";
?>