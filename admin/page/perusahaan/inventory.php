<?
if(isset($_SESSION['token_inventory'])){
    $sql = mysqli_query($inventory,"select * from company");
    $re = mysqli_fetch_array($sql);
    ?>
    <div class="m-content">
        <!--Begin::Section-->
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Perusahaan
                        </h3>
                    </div>
                </div>
            </div>
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="form_perusahaan">
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <div class="col-lg-6">
                            <label>Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control m-input" placeholder="Masukkan Nama perusahaan" value="<?=$re['company_name']?>">
                            <span class="m-form__help">Nama Perusahaan</span>
                        </div>
                        <div class="col-lg-6">
                            <label>Alamat</label>
                            <input type="text" name="alamat" id="alamat" class="form-control m-input" value="<?=$re['company_address']?>" placeholder="Masukkan alamat perusahaan">
                            <span class="m-form__help">Alamat Perusahaan</span>
                        </div>
                        <div class="col-lg-6">
                            <label>No Telp</label>
                            <input type="text" name="notelp" id="notelp" placeholder="Masukkan No Telp Perusahaan" class="form-control m-input number lengthvalidate " data-max-length="13" value="<?=$re['company_phone']?>">
                            <span class="m-form__help">No telp Perusahaan</span>
                        </div>
                        <div class="col-lg-6">
                            <label>Email</label>
                            <input type="text" name="email" id="email" placeholder="Masukkan Email Perusahaan" class="form-control m-input" value="<?=$re['company_email']?>">
                            <span class="m-form__help">Email Perusahaan</span>
                        </div>
                        <div class="col-lg-6">
                            <label>Logo</label>
                            <img src="<?=$base_assets?>logo/<?=$re['company_logo']?>" class="card-img-bottom" draggable="false"/>
                            <input type="file" name="logoperusahaan" id="logo" class="form-control custom-file-control">
                            <span class="m-form__help">Logo Perusahaan</span>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions--solid">
                        <div class="row">
                            <div class="col-lg-4">
                                <button name="update_perusahaan" id="update_perusahaan" class="btn btn-primary">Update</button>
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
    echo "<script>window.location.href='http://".$_SERVER['SERVER_NAME']."/inventory/not-found'</script>";
}
?>