<?
if(isset($_SESSION['token_inventory'])){
	$id=$_GET['kode'];
	$sql_kategori = mysqli_query($inventory,"SELECT * FROM supplier WHERE supplier_code = '$id'");
	while($data_kategori = mysqli_fetch_array($sql_kategori)){
?>
	<div class="m-content">
		<!--Begin::Section-->
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							Form Pembaruan <?=$data_kategori['supplier_name']?>
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item">
							<button data-toggle="m-tooltip" title="Kembali" data-placement="top" onclick="window.location.href='<?=$base_url?>supplier'" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
								<i class="flaticon-cancel"></i>
							</button>
						</li>
					</ul>
				</div>
			</div>
			<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="post" id="form_ubah_supplier">
				<div class="m-portlet__body">
					<div class="form-group m-form__group row">
						<div class="col-lg-2">
							<label>Kode Supplier:</label>
							<input type="text" name="kode_supplier" id="kode_supplier" class="form-control m-input" placeholder="" value="<?=$data_kategori['supplier_code']?>" readonly>
							<span class="m-form__help">Kode Supplier Otomatis Terbuat Oleh Sistem</span>
						</div>
						<div class="col-lg-3">
							<label>Nama Supplier:</label>
							<input type="text" name="nama_supplier" id="nama_supplier" class="form-control m-input" placeholder="Masukkan Nama Supplier" value="<?=$data_kategori['supplier_name']?>" autofocus>
							<span class="m-form__help">Masukkan Nama Supplier</span>
						</div>
						<div class="col-lg-3">
							<label>Telpon Supplier:</label>
							<input type="text" name="telpon_supplier" id="telpon_supplier" class="form-control m-input" value="<?=$data_kategori['supplier_phone']?>" placeholder="Masukkan Telpon Supplier">
							<span class="m-form__help">Masukkan Telpon Supplier</span>
						</div>
						<div class="col-lg-4">
							<label>Alamat Supplier:</label>
							<textarea name="alamat_supplier" id="alamat_supplier" class="form-control m-input" placeholder="Masukkan Alamat Supplier"><?=$data_kategori['supplier_address']?></textarea>
							<span class="m-form__help">Masukkan Alamat Supplier</span>
						</div>
					</div>
				</div>
				<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
					<div class="m-form__actions m-form__actions--solid">
						<div class="row">
							<div class="col-lg-4">
								<button name="perbarui_supplier" id="perbarui_supplier" class="btn btn-primary">Perbarui</button>
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
}else{
	echo "<script>window.location.href='http://".$_SERVER['SERVER_NAME']."/uh_shop/admin/not-found'</script>";
}
?>