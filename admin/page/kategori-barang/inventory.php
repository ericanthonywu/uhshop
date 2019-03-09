<?
if(isset($_SESSION['token_inventory'])){
	if(isset($_GET['hal'])){
	  $aksi=@$_GET['hal'];
	  switch($aksi){
		  case 'tambah':
			require_once('page/kategori-barang/tambah.php');
		  break;
		  case 'perbarui':
			require_once('page/kategori-barang/ubah.php');
		  break;
		  default:
		  // echo "<script>window.location.href='../error/error.html'</script>";
	  }
	}else{
?>
<div class="m-content">
	<!--Begin::Section-->
	<div class="m-portlet m-portlet--mobile">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Data Kategori Barang
					</h3>
				</div>
			</div>
			<div class="m-portlet__head-tools">
				<ul class="m-portlet__nav">
					<li class="m-portlet__nav-item">
						<button data-toggle="m-tooltip" title="Tambah Kategori Barang" data-placement="top" onclick="window.location.href='<?=$base_url?>kategori-barang/tambah'" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
							<span>
								<i class="flaticon-add-circular-button"></i>
								<span>Tambah Kategori Barang</span>
							</span>
						</button>
					</li>
				</ul>
			</div>
		</div>
		<div class="m-portlet__body">
			<!--begin: Datatable -->
			<table class="table table-striped- table-bordered table-hover table-checkable" id="kategori_barang">
				<thead>
					<tr>
						<th> No </th>
						<th> Kategori </th>
                        <th></th>
					</tr>
				</thead>
			</table>
		</div>
		<div id="modalKategori" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
				</div>
			</div>
		</div>
	</div>
	<!--End::Section-->
</div>
<?
	}
}else{
	echo "<script>window.location.href='http://".$_SERVER['SERVER_NAME']."/uh_shop/admin/not-found'</script>";
}
?>