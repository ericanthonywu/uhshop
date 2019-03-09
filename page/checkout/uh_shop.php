<?php
if (isset($_SESSION['token_pelanggan'])) {
    $pelanggan = $_SESSION['token_pelanggan'];
    ?>
    <section id="content bottommargin" xmlns="http://www.w3.org/1999/html">
        <div class="content-wrap">
            <div class="container clearfix">
                <div id="processTabs">
                    <div>
                        <div>

                            <p>Harap Teliti Sebelum Membeli.</p>

                            <div class="table-responsive">
                                <table class="table cart">
                                    <thead>
                                    <tr>
                                        <th class="cart-product-remove">&nbsp;</th>
                                        <th class="cart-product-name">Produk</th>
                                        <th class="cart-product-price">Harga</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sqlkeranjang = mysqli_query($uh_shop, "select distinct produk from keranjang where created_by = '$pelanggan'");

                                    $total = 0;
                                    while ($datakeranjang = mysqli_fetch_array($sqlkeranjang)) {
                                        $getproduk = $datakeranjang['produk'];

                                        $sqljumlahproduk = mysqli_query($uh_shop, "select * from keranjang where produk = '$getproduk'");
                                        $jumlahproduk = mysqli_num_rows($sqljumlahproduk);

                                        $sqlproduk = mysqli_query($uh_shop, "select * from item where item_code = '$getproduk'");
                                        $dataproduk = mysqli_fetch_array($sqlproduk);
                                        $namaproduk = $dataproduk['item_name'];
                                        $harga_produk = $dataproduk['item_price'];
                                        $total += (int)$harga_produk * (int)$jumlahproduk;
                                        ?>
                                        <tr class="cart_item">
                                            <td class="cart-product-remove">
                                                <a title="Hapus Produk <?= $namaproduk ?> dari keranjang"
                                                   data-placement="top"
                                                   class="remove"><i class="icon-trash2"></i></a>
                                            </td>
                                            <td class="cart-product-name">
                                                <img src="<?= $base_assets ?>produk/<?= $dataproduk['item_image'] ?>"
                                                     width="10%">
                                                <a href="javascript:;"><?= $namaproduk ?></a>
                                                <span> X <?= $jumlahproduk ?></span>
                                            </td>

                                            <td class="cart-product-price">
                                                <span class="amount" id="amount"><ins>Rp. <?= number_format((int)$dataproduk['item_price'] * (int)$jumlahproduk) ?></ins></span><br>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <tr class="cart_item">
                                        <td colspan="2" class="cart-product-name" style="font-size: xx-large">
                                            Total:
                                        </td>
                                        <td class="cart-product-price" style="font-size: xx-large">
                                            <span class="amount" id="amount">Rp. <?= number_format($total) ?></span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div>
                            <div class="col_full">
                                <label for="">Bukti Pembayaran:</label>
                                <img id="muncul_gambar" alt="Foto bukti struk">
                                <input required id="foto" name="foto" type="file" accept="image/png,image/jpeg"
                                       class="file-loading" data-allowed-file-extensions='[]'
                                       data-show-preview="true">
                            </div>
                            <div class="line"></div>
                            <a href="<?= $base_url ?>product"
                               class="button button-border button-rounded button-blue tab-linker"
                               rel="2">Kembali</a>
                            <button id="payment"
                                    class="button button-border button-rounded button-fill fill-from-bottom button-teal nomargin fright">
                                <span>Lengkapi Order</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="clear"></div>

            </div>

        </div>

    </section>
    <?php
}
