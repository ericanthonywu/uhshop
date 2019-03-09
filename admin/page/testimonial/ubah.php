<?
if(isset($_SESSION['token_inventory'])){
    $id = $_GET['kode'];
    $sql = mysqli_query($inventory,"select * from testimonial where id = $id");
    $data = mysqli_fetch_array($sql);
    ?>
    <div class="m-content">
        <!--Begin::Section-->
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Form Ubah Testimonial
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <button data-toggle="m-tooltip" title="Kembali" data-placement="top" onclick="window.location.href='<?=$base_url?>testimonial'" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
                                <i class="flaticon-cancel"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="post" id="form_ubah_testimonial">
                <input type="hidden" name="id" value="<?=$id?>">
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <div class="col-lg-4">
                            <label>Nama Testimonial:</label>
                            <input type="text" name="nama_testimonial" id="nama_testimonial" class="form-control m-input" placeholder="Masukkan nama testimonial" value="<?=$data['nama_customer']?>">
                            <span class="m-form__help">Masukkan Testimonial</span>
                        </div>
                        <div class="col-lg-8">
                            <label>Review :</label>
                            <textarea type="text" name="review" id="Review" class="form-control m-input--air" placeholder="Masukkan Review">
                                <?=$data['review']?>
                            </textarea>
                            <span class="m-form__help">Masukkan Review</span>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions--solid">
                        <div class="row">
                            <div class="col-lg-4">
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!--End::Section-->
    </div>
    <?
}else{
    echo "<script>window.location.href='http://".$_SERVER['SERVER_NAME']."/uh_shop/admin/not-found'</script>";
}
?>