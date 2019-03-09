<div class="container clearfix">

	<div class="accordion accordion-lg divcenter nobottommargin clearfix" style="max-width: 550px;">

		<div class="acctitle" id="divlogin"><i class="acc-closed icon-lock3"></i><i class="acc-open icon-unlock"></i>Masuk ke Akun Anda</div>
		<div class="acc_content clearfix">
			<form id="login-form" name="login-form" class="nobottommargin" method="post">
				<div class="col_full">
					<label for="login-form-username">Username <small>atau</small> Email:</label>
					<input type="text" id="luser" name="user" autocomplete="off" class="form-control" />
				</div>

				<div class="col_full">
					<label for="login-form-password">Password:</label>
					<input type="password" id="lpassword" name="password" class="form-control" />
				</div>

				<div class="col_full nobottommargin">
					<button name="masuk" class="button button-border button-reveal button-rounded button-fill button-aqua nomargin tright"><i class="icon-angle-right"></i><span>Masuk</span></button>
					<a href="<?=$base_url?>auth/forgot" class="fright">Lupa Akun Anda ?</a>
				</div>
			</form>
		</div>

		<div class="acctitle" id="divregis"><i class="acc-closed icon-user4"></i><i class="acc-open icon-ok-sign"></i>Daftarkan Akun Anda</div>
		<div class="acc_content clearfix">
			<form id="register-form" name="register-form" class="nobottommargin" method="post" enctype="multipart/form-data">
				<div class="col_full">
					<label for="register-form-name">Nama:</label>
					<input type="text" id="nama" name="nama" value="<?if(isset($_POST['daftar'])){?><?=$_REQUEST['nama']?><?}?>" class="form-control validate-input" autocomplete="off" />
                    <span class="text-danger"></span>
				</div>

				<div class="col_full">
					<label for="register-form-email">Alamat Email:</label>
					<input type="email" id="emailregis" data-regex="email" name="email" value="<?if(isset($_POST['daftar'])){?><?=$_REQUEST['email']?><?}?>" class="form-control validate-input" autocomplete="off" />
<!--					<div id="email_check"></div>-->
                    <span class="text-danger"></span>
				</div>

				<div class="col_full">
					<label for="register-form-username">Pilih Username:</label>
					<input type="text" id="username" name="username" value="<?if(isset($_POST['daftar'])){?><?=$_REQUEST['username']?><?}?>" class="form-control validate-input alphanumeric lengthvalidate" data-max-length="20" autocomplete="off" />
					<span class="text-danger"></span>
				</div>
				
				<div class="col_full">
					<label for="register-form-phone">No. HP:</label>
					<input type="text" id="hp" data-regex="nohp" maxlength="14" name="hp" value="<?if(isset($_POST['daftar'])){?><?=$_REQUEST['hp']?><?}?>" class="form-control number validate-input" autocomplete="off" />
                    <span class="text-danger"></span>
				</div>

				<div class="col_full">
					<label for="register-form-password">Sandi:</label>
                    <input type="password" id="password" name="password" class="form-control validate-input lengthvalidate" data-max-length="20" />
                    <span class="text-danger"></span>
				</div>

				<div class="col_full">
					<label for="register-form-repassword">Masukkan kembali sandi:</label>
					<input type="password" id="repassword" name="repassword" class="form-control validate-input lengthvalidate" data-max-length="20" />
                    <span class="text-danger"></span>
				</div>
				
				<div class="col_full">
					<label for="">Foto Profil:</label>
					<img id="muncul_gambar" width="100%">
					<input id="foto" name="foto" type="file" accept="image/png,image/jpeg" class="file-loading validate-input" data-allowed-file-extensions='[]' data-show-preview="true">
                    <span class="text-danger"></span>
				</div>

				<div class="col_full nobottommargin">
					<button name="daftar" id="daftar" class="button button-border button-rounded button-fill fill-from-bottom button-green nomargin"><span>Daftar Sekarang</span></button>
				</div>
			</form>
		</div>

	</div>

</div>