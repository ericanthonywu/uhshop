<?
require_once('../class/connection.php');
$select = $_POST['select'];
$getSpesialis = mysqli_query($inventory,"
SELECT
	*
FROM
	item
");
while($dtspesialis = mysqli_fetch_array($getSpesialis)){
	$barang = $dtspesialis['item_code'];
	if($select == $barang){
		echo "<option value='$dtspesialis[item_code]' SELECTED>$dtspesialis[item_name] - Rp.".number_format($dtspesialis['item_price'])." - ".number_format($dtspesialis['item_stock'])." Unit</option>";
	}else{
		echo "<option value='$dtspesialis[item_code]'>$dtspesialis[item_name] - Rp.".number_format($dtspesialis['item_price'])." - ".number_format($dtspesialis['item_stock'])." Unit</option>";
	}
}
?>