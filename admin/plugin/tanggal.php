<script type="text/javascript">
	$(document).ready(function(){
		$('#tanggal_pembelian').datepicker({
			todayBtn: "linked",
            clearBtn: true,
			todayHighlight: true,
			format: 'yyyy-mm-dd',
			autoclose: true,
			endDate: '0'
		});
		$('#tanggal_transaksi').datepicker({
			todayBtn: "linked",
            clearBtn: true,
			todayHighlight: true,
			format: 'yyyy-mm-dd',
			autoclose: true,
			endDate: '0'
		});
	});
</script>