<?
if(isset($_SESSION['token_inventory'])){
?>
<div class="m-content">
	<!--Begin::Section-->
	<div class="m-portlet m-portlet--mobile">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Form Tambah Sosial Media
					</h3>
				</div>
			</div>
			<div class="m-portlet__head-tools">
				<ul class="m-portlet__nav">
					<li class="m-portlet__nav-item">
						<button data-toggle="m-tooltip" title="Kembali" data-placement="top" onclick="window.location.href='<?=$base_url?>sosial-media'" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
							<i class="flaticon-cancel"></i>
						</button>
					</li>
				</ul>
			</div>
		</div>
		<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="post" id="form_tambah_sosmed">
			<div class="m-portlet__body">
				<div class="form-group m-form__group row">
					<div class="col-lg-3">
						<label>Sosial Media:</label>
                        <select title="" type="text" name="sosial_media" id="sosial_media" class="form-control m-input">
                            <option value="">-Pilih Sosial Media-</option>
                            <option value="1">Facebook</option>
                            <option value="2">Line</option>
                            <option value="3">KakaoTalk</option>
                            <option value="4">Instagram</option>
                            <option value="5">Twitter</option>
                        </select>
						<span class="m-form__help">Masukkan Sosial Media</span>
					</div>
					<div class="col-lg-3">
						<label>Nama :</label>
						<input type="text" name="nama" id="nama" class="form-control m-input" placeholder="Masukkan Nama Sosial Media" autofocus>
						<span class="m-form__help">Masukkan Nama Sosial Media</span>
					</div>
					<div class="col-lg-3">
						<label>Link Sosial Media :</label>
                        <input type="url" name="link_sm" id="link_sm" class="form-control m-input" placeholder="Masukkan link Sosial Media" autofocus>
						<span class="m-form__help">Masukkan Link Sosial Media</span>
					</div>
                    <div class="col-lg-3">
                        <label>Akun Sosial Media :</label>
                        <input type="text" name="akun_sm" id="akun_sm" class="form-control m-input" placeholder="Masukkan link Sosial Media" autofocus>
                        <span class="m-form__help">Masukkan Akun Sosial Media</span>
                    </div>
				</div>
			</div>
			<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
				<div class="m-form__actions m-form__actions--solid">
					<div class="row">
						<div class="col-lg-4">
							<button name="simpan_sosmed" id="simpan_sosmed" class="btn btn-primary">Simpan</button>
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