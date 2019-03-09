<?
// session_start();
require_once('../class/connection.php');
$sql= mysqli_query($inventory,"SELECT * FROM konten");
$arr=array();
$no=0;
while($row = mysqli_fetch_array($sql)){
    $no++;
    $temp=array(
        "no"=>$row['id'],
        "kode"=>$row['kode'],
        "halaman"=>$row['halaman'],
        "konten"=>$row['konten']
    );
    array_push($arr,$temp);
}
$data = json_encode($arr);

echo "{\"data\" : " . $data . "}";
?>