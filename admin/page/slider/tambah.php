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
						Form Tambah Slider
					</h3>
				</div>
			</div>
			<div class="m-portlet__head-tools">
				<ul class="m-portlet__nav">
					<li class="m-portlet__nav-item">
						<button data-toggle="m-tooltip" title="Kembali" data-placement="top" onclick="window.location.href='<?=$base_url?>slider'" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
							<i class="flaticon-cancel"></i>
						</button>
					</li>
				</ul>
			</div>
		</div>
		<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="post" id="form_tambah_slider">
			<div class="m-portlet__body">
				<div class="form-group m-form__group row">
					<div class="col-lg-4">
						<label>Gambar slider:</label>
						<input type="file" name="gambar_slider" id="gambar_slider" class="form-control m-input" autofocus>
						<span class="m-form__help">Masukkan Halaman slider</span>
					</div>
					<div class="col-lg-4">
						<label>Judul :</label>
						<input type="text" name="judul" id="judul" class="form-control m-input" placeholder="Masukkan judul slider">
						<span class="m-form__help">Masukkan judul slider</span>
					</div>
                    <div class="col-lg-4">
                        <label>Konten :</label>
                        <input type="text" name="konten" id="konten" class="form-control m-input" placeholder="Masukkan Konten slider">
                        <span class="m-form__help">Masukkan Konten slider</span>
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