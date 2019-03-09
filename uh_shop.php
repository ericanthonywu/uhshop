<?
session_start();
$session=@$_GET['session'];
$halaman=@$_GET['halaman'];
if(isset($session) and $session=='signout'){
	session_destroy();
	echo "<script>window.location.href='http://".$_SERVER['SERVER_NAME']."/uh_shop/'</script>";
}else{
	require_once("class/connection.php");
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<?require_once("theme/head.php");?>
<body class="stretched">
	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">
		<!-- Header
		============================================= -->
		<?require_once("theme/header.php");?>
		<!-- #header end -->
		<!-- Slider
		============================================= -->
		<?if($halaman=="home"){?>
		<?require_once("theme/slider.php");?>
		<?}?>
		<!-- #slider end -->
		<!-- Content
		============================================= -->
		<?if($halaman!="home"){?>
		<section id="content">
			<div class="content-wrap">
				<?require_once("theme/content.php");?>
			</div>
		</section>
		<!-- #content end -->
		<!-- Footer
		============================================= -->
		<?require_once("theme/footer.php");?>
		<!-- #footer end -->
		<?
		}
		?>
	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<?require_once("theme/script.php");?>
</body>
</html>
<?
}
mysqli_close($uh_shop);
?>