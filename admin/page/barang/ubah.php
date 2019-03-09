<?
if (isset($_SESSION['token_inventory'])) {
    $id = $_GET['kode'];
    $sql_kategori = mysqli_query($inventory, "SELECT * FROM item WHERE item_code = '$id'");
    while ($data_kategori = mysqli_fetch_array($sql_kategori)) {
        ?>
        <div class="m-content">
            <!--Begin::Section-->
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Form Ubah <?=$data_kategori['item_name']?>
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <button data-toggle="m-tooltip" title="Kembali" data-placement="top" onclick="window.location.href='<?=$base_url?>barang'" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
                                    <i class="flaticon-cancel"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="post" id="form_ubah_barang">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <div class="col-lg-4">
                                <label>Kode Barang:</label>
                                <input type="text" name="kode_barang" id="kode_barang" class="form-control m-input" placeholder="" value="<?=$data_kategori['item_code']?>" readonly>
                                <span class="m-form__help">Kode Barang Otomatis Terbuat Oleh Sistem</span>
                            </div>
                            <div class="col-lg-4">
                                <label>Nama Barang:</label>
                                <input type="text" name="nama_barang" id="nama_barang" class="form-control m-input" value="<?=$data_kategori['item_name']?>" placeholder="Masukkan Nama Barang" autofocus>
                                <span class="m-form__help">Masukkan Nama Barang</span>
                            </div>
                            <div class="col-lg-4">
                                <label>Kategori Barang:</label>
                                <select name="pilih_kategori_barang" id="pilih_kategori_barang" class="form-control m-input">
                                    <option value="">
                                        Pilih Kategori Barang
                                    </option>
                                    <?
                                    $getSpesialis = mysqli_query($inventory,"
                                    SELECT
                                        *
                                    FROM
                                        item_type
                                    ");
                                    while($dtspesialis = mysqli_fetch_array($getSpesialis)){
                                        if($dtspesialis['item_type_id'] == $data_kategori['item_category']){
                                            echo "<option value='$dtspesialis[item_type_id]' selected>$dtspesialis[item_type]</option>";
                                        }else{
                                            echo "<option value='$dtspesialis[item_type_id]'>$dtspesialis[item_type]</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                <span class="m-form__help">Pilih Kategori Barang</span>
                            </div>
                            <div class="col-lg-4">
                                <label>Harga Barang:</label>
                                <div class="input-group">
                                    <div class="input-group-text">Rp.</div>
                                    <input type="text" class="form-control m-input number ribuan" value="<?=number_format($data_kategori['item_price'])?>" data-id-selector="hargabrg" placeholder="Masukkan Harga Barang" autofocus>
                                    <input type="hidden" id="hargabrg" name="harga_brg" value="<?=$data_kategori['item_price']?>">
                                </div>
                                <span class="m-form__help">Masukkan Harga Barang</span>
                            </div>
                            <div class="col-lg-4">
                                <label>Stok Barang:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control m-input number ribuan" data-id-selector="stokbrg" value="<?=number_format($data_kategori['item_stock'])?>" placeholder="Masukkan Stok Barang" autofocus>
                                    <div class="input-group-text">Unit</div>
                                    <input type="hidden" id="stokbrg" name="stok_brg" value="<?=$data_kategori['item_stock']?>">
                                </div>
                                <span class="m-form__help">Masukkan Stok Barang</span>
                            </div>
                            <div class="col-lg-4">
                                <label>Gambar Barang : </label>
                                <input type="file" name="gambar_produk" class="form-control-file">
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions--solid">
                            <div class="row">
                                <div class="col-lg-4">
                                    <button name="simpan_barang" id="simpan_barang" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!--End::Section-->
        </div>
        <?
    }
} else {
    echo "<script>window.location.href='http://" . $_SERVER['SERVER_NAME'] . "/uh_shop/admin/not-found'</script>";
}
?>