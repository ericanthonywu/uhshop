<script type='text/javascript'>
	var htmlobjek;
	$(document).ready(function() {
		$("#pilih_barang").change(function(){
			var pilih_barang = $("#pilih_barang").val();
			$.ajax({
				url: "<?=$base_url;?>ajax/barang.php",
				data: "pilih_barang="+pilih_barang,
				cache: false,
				success: function(msg){
					$("#pilih_barang").html(msg);
				}
			});
		});
	});
</script>