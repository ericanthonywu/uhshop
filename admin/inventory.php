<?
$halaman=@$_GET['halaman'];
$barang=@$_GET['barang'];
$pelanggan=@$_GET['pelanggan'];
$supplier=@$_GET['supplier'];
$transaksi=@$_GET['transaksi'];
$laporan=@$_GET['laporan'];
$pengaturan=@$_GET['pengaturan'];
$session=@$_GET['session'];
session_start();
if(isset($session) and $session=='signout'){
	session_destroy();
	echo "<script>window.location.href='http://".$_SERVER['SERVER_NAME']."/uh_shop/admin/'</script>";
}else{
	require_once('class/connection.php');
	if(isset($_SESSION['token_inventory'])){
	?>
	<!DOCTYPE html>
	<html lang="en">
		<!-- begin::Head -->
		<?require_once("theme/head.php")?>
		<!-- end::Head -->
		<!-- begin::Body -->
		<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-light m-aside-left--fixed m-aside-left--offcanvas m-aside-left--minimize m-brand--minimize m-footer--push m-aside--offcanvas-default">
			<!-- begin:: Page -->
			<div class="m-grid m-grid--hor m-grid--root m-page">
				<!-- BEGIN: Header -->
				<?require_once("theme/header.php")?>
				<!-- END: Header -->
				<!-- begin::Body -->
				<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
					<!-- BEGIN: Left Aside -->
					<?require_once("theme/menu.php")?>
					<!-- END: Left Aside -->
					<div class="m-grid__item m-grid__item--fluid m-wrapper">
						<?require_once("theme/content.php")?>
					</div>
				</div>
				<!-- end:: Body -->
				<!-- begin::Footer -->
				<?require_once("theme/footer.php")?>
				<!-- end::Footer -->
			</div>
			<!-- end:: Page -->
			<!-- begin::Quick Sidebar -->
			<?require_once("theme/sidebar.php")?>
			<!-- end::Quick Sidebar -->
			<!-- begin::Scroll Top -->
			<div id="m_scroll_top" class="m-scroll-top">
				<i class="la la-arrow-up"></i>
			</div>
			<!-- end::Scroll Top -->
			<!-- begin::Quick Nav -->
			<?//require_once("theme/nav.php")?>
			<!-- end::Quick Nav -->
			<!--begin::Global Theme Bundle -->
			<?require_once("theme/script.php")?>
			<?require_once("ajax/crud.php")?>
			<?require_once("plugin/autosize.php")?>
			<?require_once("plugin/regex.php")?>
			<?require_once("plugin/select.php")?>
			<?require_once("plugin/table.php")?>
			<?
			if($laporan=="laporan-pembelian"){
				require_once("laporan/pembelian.php");
			}elseif($laporan=="laporan-penjualan"){
				require_once("laporan/penjualan.php");
			}elseif($laporan=="laporan-keuntungan"){
				require_once("laporan/keuntungan.php");
			}
			?>
			<?require_once("plugin/tanggal.php")?>
			<!--end::Page Scripts -->
		</body>
		<!-- end::Body -->
	</html>
	<?
	}elseif(!isset($_SESSION['token_inventory'])){
	?>
	<!DOCTYPE html>
	<html lang="en">
		<!-- begin::Head -->
		<?require_once("theme/head-login.php")?>
		<!-- end::Head -->
		<!-- begin::Body -->
		<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
			<!-- begin:: Page -->
			<div class="m-grid m-grid--hor m-grid--root m-page">
				<?require_once("theme/content.php")?>
			</div>
			<!-- end:: Page -->
			<!--begin::Global Theme Bundle -->
			<?require_once("theme/script-login.php")?>
			<!--end::Global Theme Bundle -->
		</body>

		<!-- end::Body -->
	</html>
	<?
	}elseif($halaman=="not-found"){
	?>
	<!DOCTYPE html>
	<html lang="en">
		<!-- begin::Head -->
		<?require_once("theme/head404.php")?>
		<!-- end::Head -->

		<!-- begin::Body -->
		<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

			<!-- begin:: Page -->
			<div class="m-grid m-grid--hor m-grid--root m-page">
				<?require_once("theme/content.php")?>
			</div>

			<!-- end:: Page -->

			<!--begin::Global Theme Bundle -->
			<?require_once("theme/script404.php")?>
			<!--end::Global Theme Bundle -->
		</body>
		<!-- end::Body -->
	</html>
	<?
	}
	mysqli_close($inventory);
}
?>