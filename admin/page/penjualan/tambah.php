<?
if(isset($_SESSION['token_inventory'])){
$query_kode=mysqli_query($inventory,"SELECT sale_invoice FROM sale ORDER BY sale_id DESC LIMIT 1");
$num_urut_kode = mysqli_num_rows($query_kode);
$data_urut_kode = mysqli_fetch_array($query_kode);
	
$awal_kode = substr($data_urut_kode['sale_invoice'],0-4);
$next_kode = (int)$awal_kode+(int)1;
$jnim_kode = strlen($next_kode);
if (!$data_urut_kode['sale_invoice']){
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
	$kode = "INV-".$no_kode;
}
else{
	$kode = "INV-".$no_kode.$next_kode;
}
?>
<div class="m-content">
	<!--Begin::Section-->
	<div class="m-portlet m-portlet--mobile">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Form Tambah Penjualan
					</h3>
				</div>
			</div>
			<div class="m-portlet__head-tools">
				<ul class="m-portlet__nav">
					<li class="m-portlet__nav-item">
						<button data-toggle="m-tooltip" title="Kembali" data-placement="top" onclick="window.location.href='<?=$base_url?>penjualan'" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
							<i class="flaticon-cancel"></i>
						</button>
					</li>
				</ul>
			</div>
		</div>
		<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="post" id="form_tambah_penjualan">
			<div class="m-portlet__body">
				<div class="form-group m-form__group row">
					<div class="col-lg-4" id="ajaxbarang">
						<label>Pilih Barang:</label>
						<select name="pilih_barang" id="pilih_barang" class="form-control m-input">
							<option value="">
								Pilih Barang
							</option>
							<?
							$getSpesialis = mysqli_query($inventory,"
							SELECT
								*
							FROM
								item
							");
							while($dtspesialis = mysqli_fetch_array($getSpesialis)){
								echo "<option value='$dtspesialis[item_code]'>$dtspesialis[item_name] - Rp.".number_format($dtspesialis['item_price'])." - ".number_format($dtspesialis['item_stock'])." Unit</option>";
							}
							?>
						</select>
						<span class="m-form__help">Pilih Barang</span>
					</div>
					<div class="col-lg-4">
						<label>Harga Jual:</label>
						<input type="hidden" name="kode_pem" id="kode_pem" class="form-control m-input" placeholder="Masukkan Kode Penjualan" value="<?=$kode?>" readonly>
						<input type="text" name="harga_jual" id="harga_jual" class="form-control m-input" placeholder="Masukkan Harga Jual" autofocus>
						<span class="m-form__help">Masukkan Harga Jual</span>
					</div>
					<div class="col-lg-3">
						<label>Jumlah Jual:</label>
						<input type="text" name="jumlah_jual" id="jumlah_jual" class="form-control m-input" placeholder="Masukkan Jumlah Jual">
						<span class="m-form__help">Masukkan Jumlah Jual</span>
					</div>
					<div class="col-lg-1">
						<label>&nbsp;</label>
						<button data-toggle="m-tooltip" title="Tambah Barang Penjualan" data-placement="top" name="tambah_barang_penjualan" id="tambah_barang_penjualan" class="btn btn-primary form-control m-input"><i class="flaticon-plus"></i></button>
					</div>
				</div>
			</div>
			<div class="m-portlet__body">
				<div class="row">
					<div class="col-1">
					</div>
					<div class="col-10">
						<table class="table table-striped- table-bordered table-hover table-checkable" id="data_barang_penjualan">
							<thead>
								<tr>
									<th> No </th>
									<th> Nama </th>
									<th> Harga Jual </th>
									<th> Jumlah </th>
									<th></th>
								</tr>
							</thead>
						</table>
					</div>
					<div class="col-1">
					</div>
				</div>
			</div>
			<div class="m-portlet__body">
				<div class="form-group m-form__group row">
					<div class="col-lg-3">
						<label>Kode Penjualan:</label>
						<input type="text" name="kode" id="kode" class="form-control m-input" placeholder="Masukkan Kode Penjualan" value="<?=$kode?>" readonly>
					</div>
					<div class="col-lg-3">
						<label>Pilih Pelanggan:</label>
						<select name="pilih_pelanggan" id="pilih_pelanggan" class="form-control m-input">
							<option value="">
								Pilih Pelanggan
							</option>
							<?
							$getSpesialis = mysqli_query($inventory,"
							SELECT
								*
							FROM
								customer
							");
							while($dtspesialis = mysqli_fetch_array($getSpesialis)){
								echo "<option value='$dtspesialis[customer_code]'>$dtspesialis[customer_name] | $dtspesialis[customer_address] | $dtspesialis[customer_phone]</option>";
							}
							?>
						</select>
						<span class="m-form__help">Pilih Customer</span>
					</div>
					<div class="col-lg-3">
						<label>Tanggal Transaksi:</label>
						<input type="text" name="tanggal_transaksi" id="tanggal_transaksi" class="form-control m-input" placeholder="Masukkan Tanggal Transaksi" readonly>
						<span class="m-form__help">Masukkan Tanggal Transaksi</span>
					</div>
					<div class="col-lg-3">
						<label>Jumlah Bayar:</label>
						<input type="text" name="jumlah_bayar" id="jumlah_bayar" class="form-control m-input" placeholder="Masukkan Jumlah Bayar">
						<span class="m-form__help">Masukkan Jumlah Bayar</span>
					</div>
				</div>
			</div>
			<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
				<div class="m-form__actions m-form__actions--solid">
					<div class="row">
						<div class="col-lg-4">
							<button name="tambah_penjualan" id="tambah_penjualan" class="btn btn-primary">Simpan</button>
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