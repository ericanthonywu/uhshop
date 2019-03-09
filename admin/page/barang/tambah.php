<?
if(isset($_SESSION['token_inventory'])){
$query_kode=mysqli_query($inventory,"SELECT item_code FROM item ORDER BY item_id DESC LIMIT 1");
$num_urut_kode = mysqli_num_rows($query_kode);
$data_urut_kode = mysqli_fetch_array($query_kode);
	
$awal_kode = substr($data_urut_kode['item_code'],0-4);
$next_kode = (int)$awal_kode+(int)1;
$jnim_kode = strlen($next_kode);
if (!$data_urut_kode['item_code']){
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
	$kode = "BARANG-".$no_kode;
}
else{
	$kode = "BARANG-".$no_kode.$next_kode;
}
?>
<div class="m-content">
	<!--Begin::Section-->
	<div class="m-portlet m-portlet--mobile">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Form Tambah Barang
					</h3>
				</div>
			</div>
			<div class="m-portlet__head-tools">
				<ul class="m-portlet__nav">
					<li class="m-portlet__nav-item">
						<button data-toggle="m-tooltip" title="Kembali" data-placement="top" onclick="window.location.href='<?=$base_url?>barang'" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
							<i class="flaticon-cancel"></i>
						</button>
					</li>
				</ul>
			</div>
		</div>
		<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="post" id="form_tambah_barang">
			<div class="m-portlet__body">
				<div class="form-group m-form__group row">
					<div class="col-lg-4">
						<label>Kode Barang:</label>
						<input type="text" name="kode_barang" id="kode_barang" class="form-control m-input" placeholder="" value="<?=$kode?>" readonly>
						<span class="m-form__help">Kode Barang Otomatis Terbuat Oleh Sistem</span>
					</div>
					<div class="col-lg-4">
						<label>Nama Barang:</label>
						<input type="text" name="nama_barang" id="nama_barang" class="form-control m-input" placeholder="Masukkan Nama Barang" autofocus>
						<span class="m-form__help">Masukkan Nama Barang</span>
					</div>
					<div class="col-lg-4">
						<label>Kategori Barang:</label>
						<select name="pilih_kategori_barang" id="pilih_kategori_barang" class="form-control m-input">
							<option value="">
								Pilih Kategori Barang
							</option>
							<?
							$getSpesialis = mysqli_query($inventory,"
							SELECT
								*
							FROM
								item_type
							");
							while($dtspesialis = mysqli_fetch_array($getSpesialis)){
								echo "<option value='$dtspesialis[item_type_id]'>$dtspesialis[item_type]</option>";
							}
							?>
						</select>
						<span class="m-form__help">Pilih Kategori Barang</span>
					</div>
                    <div class="col-lg-4">
                        <label>Harga Barang:</label>
                        <div class="input-group">
                            <div class="input-group-text">Rp.</div>
                            <input type="text" class="form-control m-input number ribuan" data-id-selector="hargabrg" placeholder="Masukkan Harga Barang" autofocus>
                            <input type="hidden" id="hargabrg" name="harga_brg">
                        </div>
                        <span class="m-form__help">Masukkan Harga Barang</span>
                    </div>
                    <div class="col-lg-4">
                        <label>Stok Barang:</label>
                        <div class="input-group">
                            <input type="text" class="form-control m-input number ribuan" data-id-selector="stokbrg" placeholder="Masukkan Stok Barang" autofocus>
                            <div class="input-group-text">Unit</div>
                            <input type="hidden" id="stokbrg" name="stok_brg">
                        </div>
                        <span class="m-form__help">Masukkan Stok Barang</span>
                    </div>
                    <div class="col-lg-4">
                        <label>Gambar Barang : </label>
                        <input type="file" name="gambar_produk" class="form-control-file">
                    </div>
				</div>
			</div>
			<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
				<div class="m-form__actions m-form__actions--solid">
					<div class="row">
						<div class="col-lg-4">
							<button name="simpan_barang" id="simpan_barang" class="btn btn-primary">Simpan</button>
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