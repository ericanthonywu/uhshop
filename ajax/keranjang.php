<?php
require_once ("../class/connection.php");
session_start();
if(isset($_SESSION['token_pelanggan'])){
    $date = date('Y-m-d');
    $pelanggan = $_SESSION['token_pelanggan'];
    $idproduk = $_POST['produk'];

    $sqlkeranjang = mysqli_query($uh_shop, "select distinct produk,created_by from keranjang where created_by = '$pelanggan' and produk = '$idproduk'");
    $data_keranjang = mysqli_fetch_array($sqlkeranjang);
    $produk = $data_keranjang['produk'];

    $sqljumlahproduk = mysqli_query($uh_shop,"select * from keranjang where produk = '$produk'");
    $jumlahproduk = mysqli_num_rows($sqljumlahproduk);

    $sqlstokproduk = mysqli_query($uh_shop,"select * from item where item_code = '$idproduk'")or die(mysqli_error($uh_shop));
    $data_stokproduk = mysqli_fetch_array($sqlstokproduk);
    $stokproduk = $data_stokproduk['item_stock'];

    if($jumlahproduk < $stokproduk) {
        mysqli_query($uh_shop, "
        insert into
            keranjang
        set
            produk = '$idproduk',
            st = '0',
            verify = '0',
            created_by = '$pelanggan',
            created_date = '$date'
        ");
    }else{
        echo "produk melebihi jumlah stok,$idproduk";
    }
}else{
    echo "Harap login terlebih dahulu";
}