<?php
require_once ('../class/connection.php');
session_start();
if(isset($_SESSION['token_pelanggan'])) {
    $pelanggan = $_SESSION['token_pelanggan'];
    $sqlkeranjang = mysqli_query($uh_shop, "select distinct produk from keranjang where created_by = '$pelanggan'");
    $numkeranjang = mysqli_num_rows($sqlkeranjang);
    ?>
    <i class="icon-shopping-cart"></i>
    <?php
    if ($numkeranjang > 0) {
        echo "<span>$numkeranjang</span>";
    }
}
?>