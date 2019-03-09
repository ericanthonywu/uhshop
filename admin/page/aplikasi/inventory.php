<?
if(isset($_SESSION['token_inventory'])){
    $sql = mysqli_query($inventory,"select * from setting");
    $re = mysqli_fetch_array($sql);
    ?>
    <div class="m-content">
        <!--Begin::Section-->
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Aplikasi
                        </h3>
                    </div>
                </div>
            </div>
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="form_aplikasi">
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <div class="col-lg-6">
                            <label>Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control m-input" placeholder="Masukkan Nama Aplikasi" value="<?=$re['nama']?>">
                            <span class="m-form__help">Nama Aplikasi</span>
                        </div>
                        <div class="col-lg-6">
                            <label>Author</label>
                            <input type="text" name="author" id="author" class="form-control m-input" value="<?=$re['author']?>" placeholder="Masukkan Author Aplikasi">
                            <span class="m-form__help">Author Aplikasi</span>
                        </div>
                        <div class="col-lg-6">
                            <label>Description</label>
                            <textarea name="description" id="description" placeholder="Masukkan Deskripsi Aplikasi" class="form-control m-input"><?=$re['description']?></textarea>
                            <span class="m-form__help">Deskripsi Aplikasi</span>
                        </div>
                        <div class="col-lg-6">
                            <label>Keyword</label>
                            <input type="text" name="keyword" id="keyword" placeholder="Masukkan Keyword Aplikasi" class="form-control m-input" value="<?=$re['keyword']?>">
                            <span class="m-form__help">Keyword Aplikasi</span>
                        </div>
                        <div class="col-lg-6">
                            <label>Logo</label>
                            <img src="<?=$base_assets?>aplikasi/<?=$re['logo']?>" class="card-img-bottom" draggable="false"/>
                            <input type="file" name="logo" id="logo" class="form-control custom-file-control">
                            <span class="m-form__help">Logo Aplikasi</span>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions--solid">
                        <div class="row">
                            <div class="col-lg-4">
                                <button name="update_aplikasi" id="update_aplikasi" class="btn btn-primary">Update</button>
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