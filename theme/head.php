<?
$sql_perusahaan = mysqli_query($uh_shop,"SELECT * FROM company");
$data_perusahaan = mysqli_fetch_array($sql_perusahaan);

$sql_setting = mysqli_query($uh_shop,"select * from setting");
$data_pengaturan_sistem = mysqli_fetch_array($sql_setting);
?>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Mr. Smith" />
	<meta name="description" content="<?=$data_pengaturan_sistem['nama']?>" />
	<meta name="keyword" content="<?=$data_pengaturan_sistem['nama']?>" />
	<!-- Stylesheets
	============================================= -->
	<link href="<?=$canvas_url?>font.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?=$canvas_url?>css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?=$canvas_url?>style.css" type="text/css" />
	<link rel="stylesheet" href="<?=$canvas_url?>css/swiper.css" type="text/css" />
	<link rel="stylesheet" href="<?=$canvas_url?>css/dark.css" type="text/css" />
	<link rel="stylesheet" href="<?=$canvas_url?>css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="<?=$canvas_url?>css/animate.css" type="text/css" />
	<link rel="stylesheet" href="<?=$canvas_url?>css/magnific-popup.css" type="text/css" />
	<link rel="stylesheet" href="<?=$canvas_url?>css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        .bounce {
            -moz-animation: bounce 2s;
            -webkit-animation: bounce 2s;
            animation: bounce 2s;
        }

        @keyframes bounce {
            0%, 20%, 80%, 100% {
                transform: translateX(0);
            }
            40% {
                transform: translateX(-45px);
            }
            60% {
                transform: translateX(45px);
            }

        }
        .connected {
            -moz-animation: movediv 1s;
            -webkit-animation: movediv 1s;
            animation: movediv 1s;
        }
        @keyframes movediv {
            0%{
                transform: translateY(0);
                opacity: 1;
            }
            100%{
                transform: translateY(-100%);
                opacity: 0;
            }
        }

    </style>
	<!-- Document Title
	============================================= -->
	<title><?=$data_pengaturan_sistem['nama']?></title>
</head>