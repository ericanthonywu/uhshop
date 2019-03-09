<?
$sql_pengaturan_sistem = mysqli_query($inventory,"SELECT * FROM setting");
$data_pengaturan_sistem = mysqli_fetch_array($sql_pengaturan_sistem);
?>
<head>
	<meta charset="utf-8" />
	<title><?=$data_pengaturan_sistem['nama']?></title>
	<meta name="description" content="<?=$data_pengaturan_sistem['description']?>">
	<meta name="keyword" content="<?=$data_pengaturan_sistem['keyword']?>">
	<meta name="author" content="<?=$data_pengaturan_sistem['author']?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

	<!--begin::Web font -->
	<script src="<?=$metronic5_url?>webfont.js"></script>
	<script>
		WebFont.load({
		google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
		active: function() {
			sessionStorage.fonts = true;
		}
	  });
	</script>

	<!--end::Web font -->

	<!--begin::Global Theme Styles -->
	<link href="<?=$metronic5_url?>7/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?=$metronic5_url?>7/demo/demo7/base/style.bundle.css" rel="stylesheet" type="text/css" />

	<!--end::Global Theme Styles -->

	<!--begin::Page Vendors Styles -->
	<link href="<?=$metronic5_url?>7/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?=$base_assets?>confirm/jquery-confirm.min.css" rel="stylesheet" type="text/css" />
	<!--end::Page Vendors Styles -->
	<link rel="shortcut icon" href="<?=$base_assets?>aplikasi/<?=$data_pengaturan_sistem['logo']?>" />
</head>