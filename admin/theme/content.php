<?
	if(isset($_GET['halaman'])){
		$modul=$_GET['halaman'];
		switch($modul){
			case 'welcome':
				require_once('page/dashboard/welcome.php');
			break;
			case 'dashboard':
				require_once('page/dashboard/inventory.php');
			break;
			case 'not-found':
				require_once('page/not-found.php');
			break;
		}
	}elseif(isset($_GET['barang'])){
		$modul=$_GET['barang'];
		switch($modul){
			case 'barang':
				require_once('page/barang/inventory.php');
			break;
			case 'kategori-barang':
				require_once('page/kategori-barang/inventory.php');
			break;
		}
	}elseif(isset($_GET['pelanggan'])){
		$modul=$_GET['pelanggan'];
		switch($modul){
			case 'pelanggan':
				require_once('page/pelanggan/inventory.php');
			break;
		}
	}elseif(isset($_GET['supplier'])){
		$modul=$_GET['supplier'];
		switch($modul){
			case 'supplier':
				require_once('page/supplier/inventory.php');
			break;
		}
	}elseif(isset($_GET['transaksi'])){
		$modul=$_GET['transaksi'];
		switch($modul){
			case 'order':
				require_once('page/order/inventory.php');
			break;
			case 'pembelian':
				require_once('page/pembelian/inventory.php');
			break;
			case 'penjualan':
				require_once('page/penjualan/inventory.php');
			break;
		}
	}elseif(isset($_GET['laporan'])){
		$modul=$_GET['laporan'];
		switch($modul){
			case 'laporan-barang':
				require_once('page/laporan/barang.php');
			break;
			case 'laporan-pembelian':
				require_once('page/laporan/pembelian.php');
			break;
			case 'laporan-penjualan':
				require_once('page/laporan/penjualan.php');
			break;
			case 'laporan-keuntungan':
				require_once('page/laporan/keuntungan.php');
			break;
		}
	}elseif(isset($_GET['session'])){
		$modul=$_GET['session'];
		switch($modul){
			case 'auth':
				require_once('page/user/auth.php');
			break;
			case 'profile':
				require_once('page/user/profile.php');
			break;
			case 'user':
				require_once('page/user/inventory.php');
			break;
		}
	}elseif(isset($_GET['pengaturan'])){
		$modul=$_GET['pengaturan'];
		switch($modul){
			case 'slider':
				require_once('page/slider/inventory.php');
			break;
			case 'konten':
				require_once('page/konten/inventory.php');
			break;
			case 'contact':
				require_once('page/contact/inventory.php');
			break;
			case 'sosial-media':
				require_once('page/social media/inventory.php');
			break;
			case 'aplikasi':
				require_once('page/aplikasi/inventory.php');
			break;
			case 'perusahaan':
				require_once('page/perusahaan/inventory.php');
			break;
            case 'how-to-order':
                require_once('page/how-to-order/inventory.php');
                break;
            case 'testimonial':
                require_once('page/testimonial/inventory.php');
                break;
		}
	}
?>