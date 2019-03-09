<?
// session_start();
require_once('../class/connection.php');
$sql= mysqli_query($inventory,"SELECT * FROM slider");
$arr=array();
$no=0;
while($row = mysqli_fetch_array($sql)){
    $no++;
    $temp=array(
        "no"=>$row['id'],
        "gambar"=>$row['gambar'],
        "judul"=>$row['judul'],
        "konten"=>$row['konten']
    );
    array_push($arr,$temp);
}
$data = json_encode($arr);

echo "{\"data\" : " . $data . "}";
?><?php
/**
 * Created by PhpStorm.
 * User: asd
 * Date: 07/01/2019
 * Time: 12:17
 */