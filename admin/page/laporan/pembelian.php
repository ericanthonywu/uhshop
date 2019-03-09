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
						Laporan Pembelian
					</h3>
				</div>
			</div>
			<div class="m-portlet__head-tools">
				<ul class="m-portlet__nav">
					<li class="m-portlet__nav-item">
						<span class="m-subheader__daterange" id="laporan_pembelian_date">
							<span class="m-subheader__daterange-label">
								<span class="m-subheader__daterange-title"></span>
								<span class="m-subheader__daterange-date m--font-brand"></span>
							</span>
							<a href="javascript:;" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
								<i class="la la-angle-down"></i>
							</a>
						</span>
					</li>
				</ul>
			</div>
		</div>
		<div class="m-portlet__body">
			<!--begin: Datatable -->
			<table class="table table-striped- table-bordered table-hover table-checkable" id="laporan_pembelian">
				<thead>
					<tr>
						<th> No </th>
						<th> Kode </th>
						<th> Tanggal </th>
						<th> Supplier </th>
						<th> Total </th>
						<th>  </th>
					</tr>
				</thead>
			</table>
		</div>
		<div id="modalTransaksiPembelian" class="modal fade" role="dialog">
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
}else{
	echo "<script>window.location.href='http://".$_SERVER['SERVER_NAME']."/uh_shop/admin/not-found'</script>";
}
?>