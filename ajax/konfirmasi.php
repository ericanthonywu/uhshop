<?php
require_once("../class/connection.php");
session_start();
$pelanggan = $_SESSION['token_pelanggan'];
$date = date('Y-m-d');
$query_kode = mysqli_query($uh_shop, "SELECT sale_invoice FROM sale ORDER BY sale_id DESC LIMIT 1");
$num_urut_kode = mysqli_num_rows($query_kode);
$data_urut_kode = mysqli_fetch_array($query_kode);
$thn = date('y');
$bln = date('m');
$awal_kode = substr($data_urut_kode['sale_invoice'], 0 - 4);
$next_kode = (int)$awal_kode + 1;
$jnim_kode = strlen($next_kode);
if (!$data_urut_kode['sale_invoice']) {
    $no_kode = "0001";
} elseif ($jnim_kode == 1) {
    $no_kode = "000";
} elseif ($jnim_kode == 2) {
    $no_kode = "00";
} elseif ($jnim_kode == 3) {
    $no_kode = "00";
} elseif ($jnim_kode == 4) {
    $no_kode = "0";
}
if ($num_urut_kode == 0) {
    $kode = "PO-" . $thn . $bln . $no_kode;
} else {
    $kode = "PO-" . $thn . $bln . $no_kode . $next_kode;
}
if ($query_kode == FALSE) {
    die(mysqli_error($uh_shop)); // TODO: better error handling
}
if (isset($_FILES["foto"]["name"]) && isset($_SESSION['token_pelanggan'])) {
    $file = $_FILES['foto']['name'];
    $target_dir = "../assets/konfirmasipembayaran/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $extensions_arr = array("jpg", "jpeg", "png", "gif");
    $sqlkeranjang = mysqli_query($uh_shop, "select distinct produk from keranjang where created_by = '$pelanggan'") or die(mysqli_error($uh_shop));;

    $total = 0;
    if (in_array($imageFileType, $extensions_arr)) {
        move_uploaded_file($_FILES['foto']['tmp_name'], $target_dir . $file);
        while ($datakeranjang = mysqli_fetch_array($sqlkeranjang)) {
            $getproduk = $datakeranjang['produk'];

            $sqljumlahproduk = mysqli_query($uh_shop, "select * from keranjang where produk = '$getproduk'");
            $jumlahproduk = mysqli_num_rows($sqljumlahproduk);

            $sqlproduk = mysqli_query($uh_shop, "select * from item where item_code = '$getproduk'");
            $dataproduk = mysqli_fetch_array($sqlproduk);
            $namaproduk = $dataproduk['item_code'];
            $harga_produk = $dataproduk['item_price'];
            $total += (int)$harga_produk * (int)$jumlahproduk;
            mysqli_query($uh_shop, "
            insert into 
                sale_detail
            set
                sale_invoice = '$kode',
                sale_item = '$namaproduk',
                sale_price = '$harga_produk',
                buy_price = '$harga_produk',
                sale_quantity = '$jumlahproduk'
            ") or die(mysqli_error($uh_shop));
        }
        mysqli_query($uh_shop,"
        delete from
            keranjang
        where 
            created_by = '$pelanggan'
        ") or die(mysqli_error($uh_shop));
        mysqli_query($uh_shop, "
        insert into
            sale
        set
            sale_invoice = '$kode',
            sale_date = '$date',
            sale_customer = '$pelanggan',
            sale_total_price = '$total',
            sale_paid = '$total',
            sale_status = '2',
            sale_image_status = '$file'
        ") or die(mysqli_error($uh_shop));
    } else {
        echo "Hanya menerima ekstensi " . implode(",", $extensions_arr) . ", ekstensi anda = " . $imageFileType;
    }
}else{
    echo "Mohon masukkan foto";
}