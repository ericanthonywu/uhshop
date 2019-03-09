<button class="m-aside-left-close  m-aside-left-close--skin-light " id="m_aside_left_close_btn"><i class="la la-close"></i></button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-light ">
	<!-- BEGIN: Brand -->
	<div class="m-brand  m-brand--skin-light ">
		<a href="<?=$base_url?>" class="m-brand__logo">
			<?
			$sql_pengaturan_sistem = mysqli_query($inventory,"SELECT * FROM setting");
			while($data_pengaturan_sistem = mysqli_fetch_array($sql_pengaturan_sistem)){
			?>
			<img alt="" src="<?=$base_assets?>aplikasi/<?=$data_pengaturan_sistem['logo']?>" />
			<?
			}
			?>
		</a>
	</div>
	<!-- END: Brand -->
	<!-- BEGIN: Aside Menu -->
	<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-light m-aside-menu--submenu-skin-light " data-menu-vertical="true" m-menu-scrollable="true" m-menu-dropdown-timeout="500">
		<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
			<li class="m-menu__item <?= $halaman=='dashboard' ?'m-menu__item--active':'';  ?>">
				<a href="<?=$base_url?>dashboard" data-toggle="m-tooltip" title="Dashboard" data-placement="right" class="m-menu__link">
					<i class="m-menu__link-icon flaticon-home-1"></i>
					<span class="m-menu__link-text">Dashboard</span>
				</a>
			</li>
			<li class="m-menu__item <?= $barang ?'m-menu__item--active':'';  ?> m-menu__item--submenu m-menu__item--bottom" aria-haspopup="true" m-menu-submenu-toggle="click" m-menu-link-redirect="1"><a href="javascript:;" data-toggle="m-tooltip" title="Data Barang" data-placement="right" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-bag"></i><span class="m-menu__link-text">Barang</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
				<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item  m-menu__item--parent m-menu__item--bottom" aria-haspopup="true" m-menu-link-redirect="1"><span class="m-menu__link"><span class="m-menu__link-text">Barang</span></span></li>
						<li class="m-menu__item <?= $barang=='kategori-barang' ?'m-menu__item--active':'';  ?>" aria-haspopup="true" m-menu-link-redirect="1"><a href="<?=$base_url?>kategori-barang" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Kategori Barang</span></a></li>
						<li class="m-menu__item <?= $barang=='barang' ?'m-menu__item--active':'';  ?>" aria-haspopup="true" m-menu-link-redirect="1"><a href="<?=$base_url?>barang" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Data Barang</span></a></li>
					</ul>
				</div>
			</li>
			<li class="m-menu__item <?= $pelanggan=='pelanggan' ?'m-menu__item--active':'';  ?>">
				<a href="<?=$base_url?>pelanggan" data-toggle="m-tooltip" title="Data Pelanggan" data-placement="right" class="m-menu__link">
					<i class="m-menu__link-icon flaticon-avatar"></i>
					<span class="m-menu__link-text">Pelanggan</span>
				</a>
			</li>
			<li class="m-menu__item <?= $supplier=='supplier' ?'m-menu__item--active':'';  ?>">
				<a href="<?=$base_url?>supplier" data-toggle="m-tooltip" title="Data Supplier" data-placement="right" class="m-menu__link">
					<i class="m-menu__link-icon flaticon-truck"></i>
					<span class="m-menu__link-text">Supplier</span>
				</a>
			</li>
			<li class="m-menu__item <?= $transaksi ?'m-menu__item--active':'';  ?> m-menu__item--submenu m-menu__item--bottom" aria-haspopup="true" m-menu-submenu-toggle="click" m-menu-link-redirect="1"><a href="javascript:;" data-toggle="m-tooltip" title="Data Transaksi" data-placement="right" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fa fa-hand-holding-usd"></i><span class="m-menu__link-text">Transaksi</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
				<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item  m-menu__item--parent m-menu__item--bottom" aria-haspopup="true" m-menu-link-redirect="1"><span class="m-menu__link"><span class="m-menu__link-text">Transaksi</span></span></li>
						<li class="m-menu__item <?= $transaksi=='order' ?'m-menu__item--active':'';  ?>" aria-haspopup="true" m-menu-link-redirect="1"><a href="<?=$base_url?>order" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Order Baru</span></a></li>
						<li class="m-menu__item <?= $transaksi=='pembelian' ?'m-menu__item--active':'';  ?>" aria-haspopup="true" m-menu-link-redirect="1"><a href="<?=$base_url?>pembelian" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Pembelian</span></a></li>
						<li class="m-menu__item <?= $transaksi=='penjualan' ?'m-menu__item--active':'';  ?>" aria-haspopup="true" m-menu-link-redirect="1"><a href="<?=$base_url?>penjualan" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Penjualan</span></a></li>
					</ul>
				</div>
			</li>
			<?
			if($level==1){
			?>
			<li class="m-menu__item  m-menu__item--submenu m-menu__item--submenu-fullheight m-menu__item--bottom" aria-haspopup="true" m-menu-submenu-toggle="click" m-menu-dropdown-toggle-class="m-aside-menu-overlay--on">
				<a href="javascript:;" data-toggle="m-tooltip" title="Laporan" data-placement="right" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon flaticon-line-graph"></i>
					<span class="m-menu__link-text">Laporan</span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
				<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
					<div class="m-menu__wrapper">
						<ul class="m-menu__subnav">
							<li class="m-menu__item  m-menu__item--parent m-menu__item--submenu-fullheight" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">Laporan</span></span></li>
							<?
							/*
							<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="<?=$base_url?>laporan-barang" class="m-menu__link "><i class="m-menu__link-icon flaticon-bag"></i><span class="m-menu__link-text">Barang</span></a></li>
							*/
							?>
							<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="<?=$base_url?>laporan-pembelian" class="m-menu__link "><i class="m-menu__link-icon flaticon-cart"></i><span class="m-menu__link-text">Pembelian</span></a></li>
							<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="<?=$base_url?>laporan-penjualan" class="m-menu__link "><i class="m-menu__link-icon flaticon-price-tag"></i><span class="m-menu__link-text">Penjualan</span></a></li>
<!--							<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="--><?//=$base_url?><!--laporan-keuntungan" class="m-menu__link "><i class="m-menu__link-icon flaticon-diagram"></i><span class="m-menu__link-text">Keuntungan</span></a></li>-->
						</ul>
					</div>
				</div>
			</li>
			<li class="m-menu__item  m-menu__item--submenu m-menu__item--bottom-1" aria-haspopup="true" m-menu-submenu-toggle="click"><a href="javascript:;" data-toggle="m-tooltip" title="Pengaturan" data-placement="right" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-settings"></i><span
					 class="m-menu__link-text">Pengaturan</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
				<div class="m-menu__submenu m-menu__submenu--up"><span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item  m-menu__item--parent m-menu__item--bottom-1" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">Pengaturan</span></span></li>
						<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="<?=$base_url?>aplikasi" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--line"><span></span></i><span class="m-menu__link-text">Aplikasi</span></a></li>
						<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="<?=$base_url?>perusahaan" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--line"><span></span></i><span class="m-menu__link-text">Perusahaan</span></a></li>
						<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="<?=$base_url?>konten" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--line"><span></span></i><span class="m-menu__link-text">Konten</span></a></li>
						<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="<?=$base_url?>slider" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--line"><span></span></i><span class="m-menu__link-text">Slider</span></a></li>
						<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="<?=$base_url?>how-to-order" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--line"><span></span></i><span class="m-menu__link-text">How To Order</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="<?=$base_url?>testimonial" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--line"><span></span></i><span class="m-menu__link-text">Testimonial</span></a></li>
                        <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="<?=$base_url?>user" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--line"><span></span></i><span class="m-menu__link-text">Pengguna</span></a></li>

					</ul>
				</div>
			</li>
			<?
			}
			?>
		</ul>
	</div>

	<!-- END: Aside Menu -->
</div>
<div class="m-aside-menu-overlay"></div>