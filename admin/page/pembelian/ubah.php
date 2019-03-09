<?
if(isset($_SESSION['token_inventory'])){
	$kode = $_GET['kode'];
	$sql_kategori = mysqli_query($inventory,"SELECT * FROM buy WHERE buy_invoice = '$kode'");
	while($data_kategori = mysqli_fetch_array($sql_kategori)){
?>
	<div class="m-content">
		<!--Begin::Section-->
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							Form Perbarui Pembelian <?=$kode?>
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item">
							<button data-toggle="m-tooltip" title="Kembali" data-placement="top" onclick="window.location.href='<?=$base_url?>pembelian'" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
								<i class="flaticon-cancel"></i>
							</button>
						</li>
					</ul>
				</div>
			</div>
			<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="post" id="form_tambah_pembelian">
				<div class="m-portlet__body">
					<div class="form-group m-form__group row">
						<div class="col-lg-4">
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
									echo "<option value='$dtspesialis[item_code]'>$dtspesialis[item_name]</option>";
								}
								?>
							</select>
							<span class="m-form__help">Pilih Barang</span>
						</div>
						<div class="col-lg-4">
							<label>Harga Beli:</label>
							<input type="hidden" name="kode_pem" id="kode_pem" class="form-control m-input" placeholder="Masukkan Kode Pembelian" value="<?=$kode?>" readonly>
							<input type="text" name="harga_beli" id="harga_beli" class="form-control m-input" placeholder="Masukkan Harga Beli" autofocus>
							<span class="m-form__help">Masukkan Harga Beli</span>
						</div>
						<div class="col-lg-3">
							<label>Jumlah Beli:</label>
							<input type="text" name="jumlah_beli" id="jumlah_beli" class="form-control m-input" placeholder="Masukkan Jumlah Beli">
							<span class="m-form__help">Masukkan Jumlah Beli</span>
						</div>
						<div class="col-lg-1">
							<label>&nbsp;</label>
							<button data-toggle="m-tooltip" title="Tambah Barang Pembelian" data-placement="top" name="tambah_barang_pembelian" id="tambah_barang_pembelian" class="btn btn-primary form-control m-input"><i class="flaticon-plus"></i></button>
						</div>
					</div>
				</div>
				<div class="m-portlet__body">
					<div class="row">
						<div class="col-1">
						</div>
						<div class="col-10">
							<table class="table table-striped- table-bordered table-hover table-checkable" id="data_barang_pembelian">
								<thead>
									<tr>
										<th> No </th>
										<th> Nama </th>
										<th> Harga Beli </th>
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
						<div class="col-lg-4">
							<label>Kode Pembelian:</label>
							<input type="text" name="kode" id="kode" class="form-control m-input" placeholder="Masukkan Kode Pembelian" value="<?=$kode?>" readonly>
							<span class="m-form__help">Kode Pembelian Otomatis Terbuat Oleh Sistem</span>
						</div>
						<div class="col-lg-4">
							<label>Pilih Supplier:</label>
							<select name="pilih_supplier" id="pilih_supplier" class="form-control m-input">
								<option value="">
									Pilih Supplier
								</option>
								<?
								$supplier = $data_kategori['buy_supplier'];
								$getSpesialis = mysqli_query($inventory,"
								SELECT
									*
								FROM
									supplier
								");
								while($dtspesialis = mysqli_fetch_array($getSpesialis)){
									$suppliernya = $dtspesialis['supplier_code'];
									if($supplier == $suppliernya){
										echo "<option value='$dtspesialis[supplier_code]' SELECTED>$dtspesialis[supplier_name] | $dtspesialis[supplier_address] | $dtspesialis[supplier_phone]</option>";
									}else{
										echo "<option value='$dtspesialis[supplier_code]'>$dtspesialis[supplier_name] | $dtspesialis[supplier_address] | $dtspesialis[supplier_phone]</option>";
									}
								}
								?>
							</select>
							<span class="m-form__help">Pilih Supplier</span>
						</div>
						<div class="col-lg-4">
							<label>Tanggal Beli:</label>
							<input type="text" name="tanggal_pembelian" id="tanggal_pembelian" class="form-control m-input" placeholder="Masukkan Tanggal Pembelian" value="<?=$data_kategori['buy_date']?>" readonly>
							<span class="m-form__help">Masukkan Tanggal Beli</span>
						</div>
					</div>
				</div>
				<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
					<div class="m-form__actions m-form__actions--solid">
						<div class="row">
							<div class="col-lg-4">
								<button name="tambah_pembelian" id="tambah_pembelian" class="btn btn-primary">Simpan</button>
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