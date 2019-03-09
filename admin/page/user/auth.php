<?
if(!isset($_SESSION['token_inventory'])){
?>
<div class="m-login m-login--signin  m-login--5" id="m_login" style="background-image: url(<?=$metronic5_url?>1/app/media/img/bg/bg-3.jpg);">
	<div class="m-login__wrapper-1 m-portlet-full-height">
		<div class="m-login__wrapper-1-1">
			<div class="m-login__contanier">
				<div class="m-login__content">
					<div class="m-login__logo">
						<?
						$sql_pengaturan_sistem = mysqli_query($inventory,"SELECT * FROM setting");
						$data_pengaturan_sistem = mysqli_fetch_array($sql_pengaturan_sistem);
						?>
						<img alt="" src="<?=$base_assets?>aplikasi/<?=$data_pengaturan_sistem['logo']?>" width="300px"/>
					</div>
					<div class="m-login__title">
						<h3><?=$data_pengaturan_sistem['nama']?></h3>
					</div>
					<div class="m-login__desc">
					
					</div>
					
					<div class="m-login__form-action">
						<?
						/*
						<button type="button" id="m_login_signup" class="btn btn-outline-focus m-btn--pill">Daftarkan Perumahan Anda</button>
						*/
						?>
					</div>
				</div>
			</div>
			<div class="m-login__border">
				<div></div>
			</div>
		</div>
	</div>
	<div class="m-login__wrapper-2 m-portlet-full-height">
		<div class="m-login__contanier">
			<div class="m-login__signin">
				<div class="m-login__head">
					<h3 class="m-login__title">Masuk ke Akun Anda</h3>
				</div>
				<form class="m-login__form m-form" id="login-form" method="post" autocomplete="off">
					<div class="form-group m-form__group">
						<input class="form-control m-input" type="text" placeholder="Username" name="username" autocomplete="off" autofocus>
					</div>
					<div class="form-group m-form__group">
						<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Kata Sandi" name="password">
					</div>
					<div class="row m-login__form-sub">
						<?
						// <div class="col m--align-left">
							// <label class="m-checkbox m-checkbox--focus">
								// <input type="checkbox" name="remember"> Remember me
								// <span></span>
							// </label>
						// </div>
						?>
					</div>
					<div class="m-login__form-action">
						<button id="btn-masuk" name="btn-masuk" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">Masuk</button>
					</div>
				</form>
			</div>
			<div class="m-login__signup">
				<div class="m-login__head">
					<h3 class="m-login__title">Form Pendaftaran</h3>
					<div class="m-login__desc">Masukkan data anda untuk membuat akun</div>
				</div>
				<form class="m-login__form m-form" id="register-form" method="post" autocomplete="off">
					<div class="form-group m-form__group">
						<input class="form-control m-input" type="hidden" id="kode" value="<?=$kode?>" placeholder="Nama Lengkap" name="kode" />
						<input class="form-control m-input" type="hidden" id="kode_warga" value="<?=$kode1?>" placeholder="Nama Lengkap" name="kode_warga" />
						<input class="form-control m-input" type="text" id="nama" placeholder="Nama Lengkap" name="nama" />
					</div>
					<div class="form-group m-form__group">
						<input class="form-control m-input" type="text" id="username" placeholder="Username" name="username" autocomplete="off">
					</div>
					<div class="form-group m-form__group">
						<input class="form-control m-input" type="text" id="email" placeholder="Email" name="email" autocomplete="off">
					</div>
					<div class="form-group m-form__group">
						<input class="form-control m-input" type="password" id="password" placeholder="Kata Sandi" name="password">
					</div>
					<div class="form-group m-form__group">
						<input class="form-control m-input m-login__form-input--last" id="repassword" type="password" placeholder="Konfirmasi Kata Sandi" name="repassword">
					</div>
					<div class="m-login__form-sub">
						<label class="m-checkbox m-checkbox--focus">
							<input type="checkbox" name="agree"> Saya setuju dengan <a href="#" class="m-link m-link--focus">peraturan dan kondisi</a>.
							<span></span>
						</label>
						<span class="m-form__help"></span>
					</div>
					<div class="m-login__form-action">
						<button id="btn-register" name="btn-register" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">Daftar</button>
						<button id="m_login_signup_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom">Batal</button>
					</div>
				</form>
			</div>
			<div class="m-login__forget-password">
				<div class="m-login__head">
					<h3 class="m-login__title">Lupa Kata Sandi ?</h3>
					<div class="m-login__desc">Masukkan email anda untuk memulihkan kata sandi anda</div>
				</div>
				<form class="m-login__form m-form" method="post" id="forgot-form" autocomplete="off">
					<div class="form-group m-form__group">
						<input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email">
					</div>
					<div class="m-login__form-action">
						<button id="btn-forgot" name="btn-forgot" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">Kirim</button>
						<button id="m_login_forget_password_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom ">Batal</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?
}else{
	echo "<script>window.location.href='http://".$_SERVER['SERVER_NAME']."/uh_shop/admin/not-found'</script>";
}
?>