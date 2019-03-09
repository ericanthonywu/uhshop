<div class="container clearfix">
    <div class="postcontent nobottommargin col_last">
	<!-- Shop
	============================================= -->
        <div id="shop" class="shop grid-container clearfix" data-layout="fitRows">
        <?php
        $x=0;
        $sql_produk = mysqli_query($uh_shop,"select * from item");
        while($data_produk = mysqli_fetch_array($sql_produk)) {
            $x++;
            $getcat = $data_produk['item_category'];
            $sql_cat = mysqli_query($uh_shop,"select * from item_type where item_type_id = $getcat");
            $data_cat = mysqli_fetch_array($sql_cat);
            $cat = $data_cat['item_type'];
            ?>
            <div class="product sf-<?=$getcat?> clearfix">
                <div class="product-image">
                    <a href="#"><img src="<?=$base_assets?>produk/<?=$data_produk['item_image']?>" alt="<?=$data_produk['item_name']?>" id="produk<?=$x?>"></a>
<!--                    <div class="sale-flash">50% Off*</div>-->
                    <div class="product-overlay">
                        <a href="#" data-produk="<?=$data_produk['item_code']?>" data-animation="produk<?=$x?>" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                        <a href="<?=$base_assets?>/produk/<?=$data_produk['item_image']?>" class="item-quick-view" data-lightbox="ajax"><i
                                    class="icon-zoom-in2"></i><span> Quick View</span></a>
                    </div>
                </div>
                <div class="product-desc">
                    <div class="product-title"><h3><a href="#"><?=$data_produk['item_name']?></a></h3></div>
                    <div class="product-price">
<!--                        <del>$24.99</del>-->
                        <ins>Rp. <?=number_format($data_produk['item_price'])?></ins>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
	</div><!-- #shop end -->
    </div>
    <div class="sidebar nobottommargin">
        <div class="sidebar-widgets-wrap">

            <div class="widget widget-filter-links clearfix">

                <h4>Select Category</h4>
                <ul class="custom-filter" data-container="#shop" data-active-class="active-filter">
                    <li class="widget-filter-reset active-filter"><a href="#" data-filter="*">Clear</a></li>
                    <?php
                    $sql_type = mysqli_query($uh_shop,'select * from item_type');
                    while($data_type = mysqli_fetch_array($sql_type)){
                        $getid_tipe = $data_type['item_type_id'];
                        $sql_num_tipe = mysqli_query($uh_shop,"select * from item where item_category = $getid_tipe");
                        $num_tipe = mysqli_num_rows($sql_num_tipe);
                        ?>
                        <li><a href="#" data-filter=".sf-<?=$data_type['item_type_id']?>"><?=$data_type['item_type']?></a><span><?=$num_tipe?></span></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>

</div>