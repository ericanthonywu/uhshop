<?
if(isset($_SESSION['token_inventory'])){
?>
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
	<div class="d-flex align-items-center">
		<div class="mr-auto">
			<h3 class="m-subheader__title m-subheader__title--separator">Selamat Datang <?=$data_profile['session_name']?></h3>
		</div>
	</div>
</div>
<?
}else{
	echo "<script>window.location.href='http://".$_SERVER['SERVER_NAME']."/store/admin/not-found'</script>";
}
?>