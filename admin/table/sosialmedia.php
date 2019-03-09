<?
// session_start();
require_once('../class/connection.php');
$sql= mysqli_query($inventory,"SELECT * FROM sosial_media");
$arr=array();
$no=0;
while($row = mysqli_fetch_array($sql)){
    $sosmed = $row['sosial_media'];
    switch ($sosmed){
        case 1:
            $sosmed = "Facebook";
            break;
        case 2:
            $sosmed = "Line";
            break;
        case 3:
            $sosmed = "Kakao Talk";
            break;
        case 4:
            $sosmed = "Instagram";
            break;
        case 5:
            $sosmed = "Twitter";
            break;
    }
    $no++;
    $temp=array(
        "no"=>$row['id'],
        "sosial_media"=>$sosmed,
        "nama"=>$row['nama'],
        "link_sm"=>$row['link_sm'],
        "akun_sm"=>$row['akun_sm']
    );
    array_push($arr,$temp);
}
$data = json_encode($arr);

echo "{\"data\" : " . $data . "}";
?>