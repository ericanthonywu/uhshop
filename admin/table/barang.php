<?
// session_start();
require_once('../class/connection.php');
$sql= mysqli_query($inventory,"SELECT * FROM item");
$arr=array();
$no=0;
while($row = mysqli_fetch_array($sql)){
	$no++;
	$temp=array(
        "no"=>$no,
        "kode"=>$row['item_code'],
        "nama"=>$row['item_name'],
        "kategori"=>$row['item_category'],
        "harga"=>"Rp. ".number_format($row['item_price']),
        "stok"=>number_format($row['item_stock'])." Unit",
        "gambar"=>$row['item_image']
   );
   array_push($arr,$temp);
}
$data = json_encode($arr);

echo "{\"data\" : " . $data . "}";
?>