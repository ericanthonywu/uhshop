<?
// session_start();
require_once('../class/connection.php');
$sql= mysqli_query($inventory,"SELECT * FROM v_sale where sale_status = '2'");
$arr=array();
$no=0;
while($row = mysqli_fetch_array($sql)){
    $tgl = TanggalIndo($row['sale_date']);
    $no++;
    $temp=array(
        "no"=>"$no",
        "invoice"=>$row['sale_invoice'],
        "date"=>$tgl,
        "customer"=>$row['customer_name'],
        "total_price"=>"Rp. ".number_format($row['sale_total_price']),
        "paid"=>"Rp. ".number_format($row['sale_paid']),
        "status"=>$row['sale_status'],
        "image"=>$row['sale_image_status']
    );
    array_push($arr,$temp);
}
$data = json_encode($arr);

echo "{\"data\" : " . $data . "}";
?>