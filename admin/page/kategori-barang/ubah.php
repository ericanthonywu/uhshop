<?
if(isset($_SESSION['token_inventory'])){
	$id=$_GET['kode'];
	$sql_kategori = mysqli_query($inventory,"SELECT * FROM item_type WHERE item_type_id = '$id'");
	while($data_kategori = mysqli_fetch_array($sql_kategori)){
?>
	<div class="m-content">
		<!--Begin::Section-->
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							Form Pembaruan <?=$data_kategori['item_type']?>
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item">
							<button data-toggle="m-tooltip" title="Kembali" data-placement="top" onclick="window.location.href='<?=$base_url?>kategori-barang'" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
									<i class="flaticon-cancel"></i>
							</button>
						</li>
					</ul>
				</div>
			</div>
			<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="post" id="form_ubah_kategori">
				<div class="m-portlet__body">
					<div class="form-group m-form__group row">
						<div class="col-lg-4">
							<label>Nama Kategori:</label>
							<input type="hidden" name="id_kategori" id="id_kategori" value="<?=$data_kategori['item_type_id']?>" class="form-control m-input" placeholder="Masukkan Nama Kategori">
							<input type="text" name="nama_kategori" id="nama_kategori" value="<?=$data_kategori['item_type']?>" class="form-control m-input" placeholder="Masukkan Nama Kategori">
							<span class="m-form__help">Masukkan Nama Kategori</span>
						</div>
					</div>
				</div>
				<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
					<div class="m-form__actions m-form__actions--solid">
						<div class="row">
							<div class="col-lg-4">
								<button name="perbarui_kategori" id="perbarui_kategori" class="btn btn-primary">Perbarui</button>
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