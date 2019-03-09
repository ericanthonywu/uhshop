<!--begin::Global Theme Bundle -->
<script src="<?=$metronic5_url?>1/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="<?=$metronic5_url?>1/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
<script src="<?=$metronic5_url?>1/snippets/custom/pages/user/login.js" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Scripts -->
<script>
$('document').ready(function(){
	$('img').prop("draggable",false);
	/* validation */
	$("#login-form").validate({
		rules:
		{
			username: {
				required: true,
			},
			password: {
				required: true,
			},
		},
		messages:
		{
			password:{
				required: "Harap masukkan kata sandi anda"
			},
			username: "Harap masukkan Username anda",
		},
		submitHandler: submitLogin
	});

	function submitLogin()
	{
		var data = $("#login-form").serialize();
		$.ajax({
			type : 'POST',
			url  : '<?=$base_url?>ajax/auth.php',
			data : data,
			beforeSend: function()
			{
				// alert(data);
				// $("#error").fadeOut();
				$("#btn-masuk").html('Mengirim Data <div class="m-loader m-loader--brand" id="loader" style="width: 30px; display: inline-block;"></div>');
			},
			success :  function(response)
			{
				// alert(response);
				if(response == "ceo"){
					toastr.options = {
					  "closeButton": true,
					  "debug": true,
					  "newestOnTop": true,
					  "progressBar": true,
					  "positionClass": "toast-top-right",
					  "preventDuplicates": true,
					  "onclick": null,
					  "showDuration": "300",
					  "hideDuration": "1000",
					  "timeOut": "5000",
					  "extendedTimeOut": "1000",
					  "showEasing": "swing",
					  "hideEasing": "linear",
					  "showMethod": "fadeIn",
					  "hideMethod": "fadeOut"
					};
					toastr.success("Selamat Datang ", "<?=$data_pengaturan_sistem['nama']?>");
					$("#btn-masuk").html('Proses Masuk');
					//setTimeout('$(".register-form").fadeOut(500, function(){ $(".beranda").load("<?=$base_url?>home"); }); ',5000);
					setTimeout(function(){ 
					location.href ="<?=$base_url?>dashboard";
					},5000);
				}
				else if(response == "pegawai"){
					toastr.options = {
					  "closeButton": true,
					  "debug": true,
					  "newestOnTop": true,
					  "progressBar": true,
					  "positionClass": "toast-top-right",
					  "preventDuplicates": true,
					  "onclick": null,
					  "showDuration": "300",
					  "hideDuration": "1000",
					  "timeOut": "5000",
					  "extendedTimeOut": "1000",
					  "showEasing": "swing",
					  "hideEasing": "linear",
					  "showMethod": "fadeIn",
					  "hideMethod": "fadeOut"
					};
					toastr.success("Selamat Datang ", "<?=$data_pengaturan_sistem['nama']?>");
					$("#btn-masuk").html('Proses Masuk');
					//setTimeout('$(".register-form").fadeOut(500, function(){ $(".beranda").load("<?=$base_url?>home"); }); ',5000);
					setTimeout(function(){ 
					location.href ="<?=$base_url?>welcome";
					},3000);
				}
				else if(response == "password"){		 
					toastr.options = {
					  "closeButton": true,
					  "debug": true,
					  "newestOnTop": true,
					  "progressBar": true,
					  "positionClass": "toast-top-right",
					  "preventDuplicates": true,
					  "onclick": null,
					  "showDuration": "300",
					  "hideDuration": "1000",
					  "timeOut": "5000",
					  "extendedTimeOut": "1000",
					  "showEasing": "swing",
					  "hideEasing": "linear",
					  "showMethod": "fadeIn",
					  "hideMethod": "fadeOut"
					};
					toastr.warning("Maaf, kata sandi yang anda masukkan salah", "<?=$data_pengaturan_sistem['nama']?>");
				}
				else if(response == "unregistered"){		 
					toastr.options = {
					  "closeButton": true,
					  "debug": true,
					  "newestOnTop": true,
					  "progressBar": true,
					  "positionClass": "toast-top-right",
					  "preventDuplicates": true,
					  "onclick": null,
					  "showDuration": "300",
					  "hideDuration": "1000",
					  "timeOut": "5000",
					  "extendedTimeOut": "1000",
					  "showEasing": "swing",
					  "hideEasing": "linear",
					  "showMethod": "fadeIn",
					  "hideMethod": "fadeOut"
					};
					toastr.error("Maaf, anda tidak terdaftar di sistem kami", "<?=$data_pengaturan_sistem['nama']?>");
				}
			}
		});
		return false;
	}
});
$('document').ready(function(){
	/* validation */
	$("#forgot-form").validate({
		rules:
		{
			email: {
				required: true,
				email: true,
			}
		},
		messages:
		{
			email:{
				required:"Masukkan email anda",
				email:"Masukkan email yang valid"
			}
		},
		submitHandler: submitForgot
	});

	function submitForgot()
	{
		var data = $("#forgot-form").serialize();
		$.ajax({
			type : 'POST',
			url  : '<?=$base_url?>ajax/forgot.php',
			data : data,
			beforeSend: function()
			{
				$("#btn-forgot").html('Proses Memulihkan <div class="m-loader m-loader--brand" id="loader" style="width: 30px; display: inline-block;"></div>');
			},
			success :  function(response)
			{
				// alert(response);
				if(response == "ok"){
					toastr.options = {
					  "closeButton": true,
					  "debug": true,
					  "newestOnTop": true,
					  "progressBar": true,
					  "positionClass": "toast-top-right",
					  "preventDuplicates": true,
					  "onclick": null,
					  "showDuration": "300",
					  "hideDuration": "1000",
					  "timeOut": "5000",
					  "extendedTimeOut": "1000",
					  "showEasing": "swing",
					  "hideEasing": "linear",
					  "showMethod": "fadeIn",
					  "hideMethod": "fadeOut"
					};
					toastr.success("Email anda berhasil di pulihkan", "<?=$data_pengaturan_sistem['nama']?>");
					$("#btn-masuk").html('Signing In');
					//setTimeout('$(".register-form").fadeOut(500, function(){ $(".beranda").load("<?=$base_url?>home"); }); ',5000);
					setTimeout(function(){ 
					location.href ="<?=$base_url?>dashboard";
					},5000);
				}
				else if(response == "unregistered"){		 
					toastr.options = {
					  "closeButton": true,
					  "debug": true,
					  "newestOnTop": true,
					  "progressBar": true,
					  "positionClass": "toast-top-right",
					  "preventDuplicates": true,
					  "onclick": null,
					  "showDuration": "300",
					  "hideDuration": "1000",
					  "timeOut": "5000",
					  "extendedTimeOut": "1000",
					  "showEasing": "swing",
					  "hideEasing": "linear",
					  "showMethod": "fadeIn",
					  "hideMethod": "fadeOut"
					};
					toastr.error("Maaf, anda tidak terdaftar di sistem kami", "<?=$data_pengaturan_sistem['nama']?>");
				}
			}
		});
		return false;
	}
});
</script>
<!--end::Page Scripts -->