<header id="header">
    <div id="header-wrap">
        <div class="container clearfix">
            <div class="" id="primary-menu-trigger"><i class="icon-reorder"></i></div>
            <!-- Logo
            ============================================= -->
            <div id="logo">
                <a href="<?= $base_assets ?>logo/<?= $data_perusahaan['company_logo'] ?>" class="standard-logo"
                   data-dark-logo="<?= $base_assets ?>"><img
                            src="<?= $base_assets ?>logo/<?= $data_perusahaan['company_logo'] ?>"
                            alt="<?= $data_perusahaan['company_name'] ?>"></a>
                <a href="<?= $base_assets ?>logo/<?= $data_perusahaan['company_logo'] ?>" class="retina-logo"
                   data-dark-logo="<?= $base_assets ?>"><img
                            src="<?= $base_assets ?>logo/<?= $data_perusahaan['company_logo'] ?>"
                            alt="<?= $data_perusahaan['company_logo'] ?>"></a>
            </div><!-- #logo end -->
            <!-- Primary Navigation
            ============================================= -->
            <nav id="primary-menu" class="style-2">
                <ul>
                    <li><a href="<?= $base_url ?>home">
                            <div>Home</div>
                        </a></li>
                    <li><a href="<?= $base_url ?>about">
                            <div>About</div>
                        </a></li>
                    <li><a href="#kontak_form" data-toggle="modal">Contact</a></li>
                    <li><a href="<?= $base_url ?>testimonial">
                            <div>Testimonial</div>
                        </a></li>
                    <?
                    if (!isset($_SESSION['token_pelanggan'])) {
                        ?>
                        <li><a href="<?= $base_url ?>auth">
                                <div>Sign In</div>
                            </a></li>
                        <?
                    } else {
                        $nama_pelanggan = $_SESSION['token_pelanggan'];
                        $sqlpelanggan = mysqli_query($uh_shop, "select * from customer where customer_code = '$nama_pelanggan'");
                        $datapelanggan = mysqli_fetch_array($sqlpelanggan);
                        $pelanggan = $datapelanggan['customer_name'];
                        ?>
                        <li class="current">
                            <a href="<?= $base_url ?>product">
                                <div>Product</div>
                            </a>
                        </li>

                        <li><a href="<?= $base_url ?>how-to-order">
                                <div>How to Order</div>
                            </a></li>
                        <li>
                            <a id="preventdef">
                                <div><?= $pelanggan ?></div>
                            </a>
                            <ul>
                                <?
                                /*
                                <li><a href="<?= $base_url ?>profile">
                                        <div>Profile</div>
                                    </a></li>
                                */
                                ?>
                                <li><a href="<?= $base_url ?>signout">
                                        <div>Sign Out</div>
                                    </a></li>
                            </ul>
                        </li>
                        <?
                    }
                    ?>
                </ul>

                <!-- Top Cart
                ============================================= -->
                <?
                if (isset($_SESSION['token_pelanggan'])) {
                    ?>
                    <div id="top-cart">
                        <?
                        $pelanggan = $_SESSION['token_pelanggan'];
                        $sqlkeranjang = mysqli_query($uh_shop, "select distinct produk from keranjang where created_by = '$pelanggan'");
                        $numkeranjang = mysqli_num_rows($sqlkeranjang);
                        ?>
                        <a href="#" id="top-cart-trigger"><i class="icon-shopping-cart" id="logo-keranjang"></i>
                            <?php
                            if ($numkeranjang > 0) {
                                echo "<span>$numkeranjang</span>";
                            }
                            ?>
                        </a>
                        <div class="top-cart-content">
                            <div class="top-cart-title">
                                <h4>Shopping Cart</h4>
                            </div>
                            <div class="top-cart-items">
                                <?php
                                $total = 0;
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
                                            <a href="#"><img
                                                        src="<?= $base_assets ?>produk/<?= $data_produk['item_image'] ?>"
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
                                <span class="fleft top-checkout-price"
                                      id="totalharga">Rp. <?= number_format($total) ?></span>
                                <a id="checkout" href="<?= $base_url ?>checkout"
                                   class="button button-3d button-small nomargin fright">Checkout</a>
                            </div>
                        </div>
                    </div>
                <? } ?>
                <!-- #top-cart end -->
                <style>
                    .menumobile {
                        bottom: 0;
                        left: 0;
                        right: 0;
                        position: fixed;
                        background-color: #06086B;
                        color: #fff;
                        width: 100%;
                    }

                    .row-mobile {
                        margin: 0px;
                        text-align: center;
                    }

                    .row-mobile:before,
                    .row-mobile:after {
                        display: table;
                    }

                    .row-mobile:after {
                        clear: both;
                    }

                    .container-mobile {
                        padding-right: 15px;
                        padding-left: 15px;
                        margin-right: auto;
                        margin-left: auto;
                    }

                    .col-mobile {
                        width: 25%;
                        float: left;
                        position: relative;
                        min-height: 1px;
                        padding-right: 15px;
                        padding-left: 15px;
                        box-sizing: border-box;
                        align-items: center;
                        cursor: pointer;
                        transition: .5s;
                    }

                    .col-mobile:hover {
                        background-color: #23258D;
                    }

                    .col-mobile .icon-mobile-menu {
                        width: 100%;
                        font-size: xx-large;
                    }

                    .col-mobile .text-mobile-menu {
                        width: 100%;
                        font-size: xx-small;
                    }
                </style>
                <div class="d-block d-md-none d-lg-none d-xl-none menumobile">
                    <div class="container-mobile">
                        <div class="row-mobile">
                            <div class="col-mobile">
							<span class="icon-mobile-menu">
							<i class="icon-home text-center"></i>
							</span>
                                <span class="text-mobile-menu">
							Home
							</span>
                            </div>
                            <div class="col-mobile">
							<span class="icon-mobile-menu">
							<i class="icon-photo text-center"></i>
							</span>
                                <span class="text-mobile-menu">
							Product
							</span>
                            </div>
                            <?
                            if (isset($_SESSION['token_pelanggan'])) {
                                ?>
                                <div class="col-mobile">
							<span class="icon-mobile-menu">
							<i class="icon-shopping-cart text-center"></i>
							</span>
                                    <span class="text-mobile-menu">
							How to Order
							</span>
                                </div>
                                <div class="col-mobile">
							<span class="icon-mobile-menu">
							<i class="icon-user text-center"></i>
							</span>
                                    <span class="text-mobile-menu">
							My Profile
							</span>
                                </div>
                                <?
                            } else {
                                ?>
                                <div class="col-mobile">
							<span class="icon-mobile-menu">
							<i class="icon-shopping-cart text-center"></i>
							</span>
                                    <span class="text-mobile-menu">
							Testimonial
							</span>
                                </div>
                                <div class="col-mobile">
							<span class="icon-mobile-menu">
							<i class="icon-user text-center"></i>
							</span>
                                    <span class="text-mobile-menu">
							Sign In
							</span>
                                </div>
                            <? } ?>
                        </div>
                    </div>
                </div>

                <!-- Top Search
                ============================================= -->
                <?
                /*
                <div id="top-search">
                    <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                    <form action="search.html" method="get">
                        <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
                    </form>
                </div>
                */
                ?>
                <!-- #top-search end -->

            </nav>
            <!-- #primary-menu end -->

        </div>

    </div>
</header>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="kontak_form"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-body">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Contact Us</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="post" class="form" id="form_contact">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label>Nama :</label>
                                    <input class="form-control validate-input" id="nama" type="text" name=""
                                           placeholder="Nama">
                                    <span class="m-form__help text-danger"></span>
                                </div>
                                <div class="col-lg-4">
                                    <label>Email : </label>
                                    <input class="form-control validate-input" data-regex="email" id="email"
                                           type="email" name="" data-id-error="erroremail" placeholder="Email">
                                    <span class="m-form__help text-danger"></span>
                                </div>
                                <div class="col-lg-4">
                                    <label>No HP :</label>
                                    <input class="form-control validate-input number lengthvalidate" data-regex="nohp"
                                           data-max-length="13" id="nohp" type="text" name="" placeholder="No HP">
                                    <span class="m-form__help text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>Pesan : </label>
                                    <textarea class="form-control validate-input" id="pesan" name=""
                                              placeholder="Pesan"></textarea>
                                    <span class="m-form__help text-danger"></span>
                                </div>
                            </div>
                        </div>


                        <div class="modal-footer">
                            <button class="btn secondary btn-primary btn-outline-primary" id="submit_contact">Kirim
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>