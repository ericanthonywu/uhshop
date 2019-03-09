<?
if (isset($_SESSION['token_inventory'])) {
    $id = $_GET['kode'];
    $sql_konten = mysqli_query($inventory, "SELECT * FROM konten WHERE kode = '$id'");
    $data_konten = mysqli_fetch_array($sql_konten);
    ?>
    <div class="m-content">
        <!--Begin::Section-->
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Form Ubah Konten
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <button data-toggle="m-tooltip" title="Kembali" data-placement="top"
                                    onclick="window.location.href='<?= $base_url ?>konten'"
                                    class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
                                <i class="flaticon-cancel"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="post"
                  id="form_ubah_konten">
                <input type="hidden" name="id" value="<?= $data_konten['id'] ?>">
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <div class="col-lg-6">
                            <label>Halaman konten:</label>
                            <input type="text" name="halaman_konten" id="halaman_konten" class="form-control m-input"
                                   placeholder="Masukkan halaman konten" value="<?= $data_konten['halaman'] ?>" autofocus>
                            <span class="m-form__help">Masukkan Halaman konten</span>
                        </div>
                        <div class="col-lg-6">
                            <label>Konten:</label>
                            <input type="text" name="konten" id="konten" value="<?= $data_konten['konten'] ?>" class="form-control m-input"
                                   placeholder="Masukkan konten">
                            <span class="m-form__help">Masukkan konten</span>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions--solid">
                        <div class="row">
                            <div class="col-lg-4">
                                <button name="ubah_konten" id="ubah_konten" class="btn btn-primary">Ubah</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!--End::Section-->
    </div>
    <?
} else {
    echo "<script>window.location.href='http://" . $_SERVER['SERVER_NAME'] . "/uh_shop/admin/not-found'</script>";
}
?>