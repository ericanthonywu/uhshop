<?
if(isset($_SESSION['token_inventory'])){
$query_kode=mysqli_query($inventory,"SELECT customer_code FROM customer ORDER BY customer_id DESC LIMIT 1");
$num_urut_kode = mysqli_num_rows($query_kode);
$data_urut_kode = mysqli_fetch_array($query_kode);
	
$awal_kode = substr($data_urut_kode['customer_code'],0-4);
$next_kode = (int)$awal_kode+(int)1;
$jnim_kode = strlen($next_kode);
if (!$data_urut_kode['customer_code']){
	$no_kode = "0001";
}
elseif($jnim_kode == 1){
	$no_kode = "000";
} 
elseif($jnim_kode == 2){
	$no_kode = "00";
}
elseif($jnim_kode == 3){
	$no_kode = "0";
}
if ($num_urut_kode == 0){
	$kode = "PELANGGAN-".$no_kode;
}
else{
	$kode = "PELANGGAN-".$no_kode.$next_kode;
}
?>
<div class="m-content">
	<!--Begin::Section-->
	<div class="m-portlet m-portlet--mobile">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Form Tambah Pelanggan
					</h3>
				</div>
			</div>
			<div class="m-portlet__head-tools">
				<ul class="m-portlet__nav">
					<li class="m-portlet__nav-item">
						<button data-toggle="m-tooltip" title="Kembali" data-placement="top" onclick="window.location.href='<?=$base_url?>pelanggan'" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
							<i class="flaticon-cancel"></i>
						</button>
					</li>
				</ul>
			</div>
		</div>
		<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="post" id="form_tambah_pelanggan">
			<div class="m-portlet__body">
				<div class="form-group m-form__group row">
					<div class="col-lg-2">
						<label>Kode Pelanggan:</label>
						<input type="text" name="kode_pelanggan" id="kode_pelanggan" class="form-control m-input" placeholder="" value="<?=$kode?>" readonly>
						<span class="m-form__help">Kode Pelanggan Otomatis Terbuat Oleh Sistem</span>
					</div>
					<div class="col-lg-3">
						<label>Nama Pelanggan:</label>
						<input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control m-input" placeholder="Masukkan Nama Pelanggan" autofocus>
						<span class="m-form__help">Masukkan Nama Pelanggan</span>
					</div>
					<div class="col-lg-3">
						<label>Telpon Pelanggan:</label>
						<input type="text" name="telpon_pelanggan" id="telpon_pelanggan" class="form-control m-input" placeholder="Masukkan Telpon Pelanggan">
						<span class="m-form__help">Masukkan Telpon Pelanggan</span>
					</div>
					<div class="col-lg-4">
						<label>Alamat Pelanggan:</label>
						<textarea name="alamat_pelanggan" id="alamat_pelanggan" class="form-control m-input" placeholder="Masukkan Alamat Pelanggan"></textarea>
						<span class="m-form__help">Masukkan Alamat Pelanggan</span>
					</div>
				</div>
			</div>
			<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
				<div class="m-form__actions m-form__actions--solid">
					<div class="row">
						<div class="col-lg-4">
							<button name="simpan_pelanggan" id="simpan_pelanggan" class="btn btn-primary">Simpan</button>
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