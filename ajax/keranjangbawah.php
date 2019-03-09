<?php
require_once('../class/connection.php');
session_start();
if (isset($_SESSION['token_pelanggan'])) {
?>
<div class="top-cart-title">
    <h4>Shopping Cart</h4>
</div>
<div class="top-cart-items">
    <?php
    $pelanggan = $_SESSION['token_pelanggan'];
    $total = 0;
    $sqlkeranjang = mysqli_query($uh_shop,"select distinct produk from keranjang where created_by = '$pelanggan'");
    while ($data_keranjang = mysqli_fetch_array($sqlkeranjang)) {
        $produk = $data_keranjang['produk'];

        $sqljumlahproduk = mysqli_query($uh_shop, "select * from keranjang where produk = '$produk'");
        $jumlahproduk = mysqli_num_rows($sqljumlahproduk);

        $sql_produk = mysqli_query($uh_shop, "select * from item where item_code = '$produk' ");
        $data_produk = mysqli_fetch_array($sql_produk);
        $total += (int)$data_produk['item_price'] * (int)$jumlahproduk;
        ?>
        <div class="top-cart-item clearfix" id="produk<?= $produk ?>">
            <div class="top-cart-item-image">
                <a href="#"><img src="<?= $base_assets ?>produk/<?= $data_produk['item_image'] ?>"
                                 alt="<?= $data_produk['item_name'] ?>"/></a>
            </div>
            <div class="top-cart-item-desc">
                <a href="#"><?= $data_produk['item_name'] ?></a>
                <span class="top-cart-item-price">Rp. <?= number_format($data_produk['item_price']) ?></span>
                <span class="top-cart-item-quantity">x <?= number_format($jumlahproduk) ?></span>
            </div>
        </div>
        <?php
    }
    ?>
</div>
<div class="top-cart-action clearfix">
    <span class="fleft top-checkout-price" id="totalharga">Rp. <?= number_format($total) ?></span>
    <a href="<?=$base_url?>checkout" class="button button-3d button-small nomargin fright">Checkout</a>
</div>
<?php
}
?>