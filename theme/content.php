<?
	if(isset($_GET['halaman'])){
		$modul=$_GET['halaman'];
		switch($modul){
			case 'home':
				require_once('page/home/uh_shop.php');
			break;
			case 'about':
				require_once('page/about/uh_shop.php');
			break;
			case 'testimonial':
				require_once('page/testimonial/uh_shop.php');
			break;
			case 'product':
				require_once('page/product/uh_shop.php');
			break;
			case 'how-to-order':
				require_once('page/how/uh_shop.php');
			break;
			case 'not-found':
				require_once('page/not-found.php');
			break;
		}
	}elseif(isset($_GET['session'])){
		$modul=$_GET['session'];
		switch($modul){
			case 'auth':
				require_once('page/auth/uh_shop.php');
			break;
			case 'cart':
				require_once('page/checkout/uh_shop.php');
			break;
			case 'profile':
				require_once('page/profile/file.php');
			break;
		}
	}
?>