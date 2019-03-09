<?
if(isset($_SESSION['token_inventory'])){
	$id=$_GET['kode'];
	$sql_user = mysqli_query($inventory,"SELECT * FROM session WHERE session_username = '$id'");
	$data_user = mysqli_fetch_array($sql_user);
?>
	<div class="m-content">
		<!--Begin::Section-->
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							Form Perbarui User
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item">
							<button data-toggle="m-tooltip" title="Kembali" data-placement="top" onclick="window.location.href='<?=$base_url?>user'" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
									<i class="flaticon-cancel"></i>
							</button>
						</li>
					</ul>
				</div>
			</div>
			<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="post" autocomplete="off" id="form_ubah_user">
				<div class="m-portlet__body">
					<div class="form-group m-form__group row">
						<div class="col-lg-6">
							<label>Nama Pengguna:</label>
							<input type="hidden" name="id" id="id" class="form-control m-input" value="<?=$data_user['session_id']?>" placeholder="Masukkan Nama Pengguna" autofocus>
							<input type="text" name="nama" id="nama" class="form-control m-input" value="<?=$data_user['session_name']?>" placeholder="Masukkan Nama Pengguna" autofocus>
							<span class="m-form__help">Masukkan Nama Pengguna</span>
						</div>
						<div class="col-lg-6">
							<label class="">Email:</label>
							<input type="email" name="email" id="email" class="form-control m-input" value="<?=$data_user['session_email']?>" placeholder="Masukkan Email">
							<span class="m-form__help">Masukkan Email</span>
						</div>
						<div class="col-lg-4">
							<label>Username:</label>
							<div class="input-group m-input-group m-input-group--square">
								<div class="input-group-prepend"><span class="input-group-text"><i class="la la-user"></i></span></div>
								<input type="text" name="username" id="username" value="<?=$data_user['session_username']?>" class="form-control m-input" placeholder="">
							</div>
							<span class="m-form__help">Masukkan username</span>
						</div>
						<div class="col-lg-4">
							<label>Kata Sandi:</label>
							<div class="input-group m-input-group m-input-group--square">
								<div class="input-group-prepend"><span class="input-group-text"><i class="flaticon-lock"></i></span></div>
								<input type="password" id="password" name="password" class="form-control m-input" placeholder="">
							</div>
							<span class="m-form__help">Masukkan Kata Sandi</span>
						</div>
						<div class="col-lg-4">
							<label>Hak Akses:</label>
							<select class="form-control m-input" id="hak_akses" name="hak_akses">
								<option value="">Pilih Hak Akses</option>
								<?
								$hak = $data_user['session_role'];
								$sql_akses = mysqli_query($inventory,"SELECT * FROM role");
								while($data_akses = mysqli_fetch_array($sql_akses)){
									$akses = $data_akses['role_id'];
									if($hak == $akses){
										echo "<option value='$data_akses[role_id]' SELECTED>$data_akses[role]</option>";
									}else{
										echo "<option value='$data_akses[role_id]'>$data_akses[role]</option>";
									}
								}
								?>
							</select>
							<span class="m-form__help">Harap Pilih Hak Akses</span>
						</div>
					</div>
				</div>
				<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
					<div class="m-form__actions m-form__actions--solid">
						<div class="row">
							<div class="col-lg-5"></div>
							<div class="col-lg-6">
								<button name="perbarui_user" id="perbarui_user" class="btn btn-primary">Simpan</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<!--End::Section-->
	</div>
<?
}else{
	echo "<script>window.location.href='http://".$_SERVER['SERVER_NAME']."/inventory/not-found'</script>";
}
?>