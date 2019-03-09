<script>
if (0 != $("#laporan_penjualan_date").length) {
	var e = $("#laporan_penjualan_date"), t = moment(), a = moment();
	e.daterangepicker({
		direction: mUtil.isRTL(),
		startDate: t,
		endDate: a,
		opens: "left",
		ranges: {
			"Hari ini": [moment(), moment()],
			"Kemarin": [moment().subtract(1, "days"), moment().subtract(1, "days")],
			"7 Hari Terakhir": [moment().subtract(6, "days"), moment()],
			"30 Hari Terakhir": [moment().subtract(29, "days"), moment()],
			"Bulan ini": [moment().startOf("month"), moment().endOf("month")],
			"Bulan lalu": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
		}
	}, r), r(t, a, "")
}

function r(t, a, r) {
	var o = "", n = "";
	a - t < 100 || "Hari ini" == r ? (o = "Hari ini:", n = t.format("MMM D")) : "Kemarin" == r ? (o = "Kemarin:", n = t.format("MMM D")) : n = t.format("MMM D") + " - " + a.format("MMM D"), e.find(".m-subheader__daterange-date").html(n), e.find(".m-subheader__daterange-title").html(o)
}
$(document).ready(function () {
    $('.ranges ul li').click(function () {
        var data = $(this).data("range-key");
        $.ajax({
            type: "POST",
            cache: false,
            url: "<?=$base_url?>ajax/penjualan.php",
            data: {
                data: data
            },
            success: function (result) {
                $('#laporan_penjualan').DataTable().ajax.url("<?=$base_url?>table/laporan_penjualan.php?data=" + result).load();
            }
        });
    });
    $('.range_inputs button').click(function () {
        var dateawal =  $(".left .daterangepicker_input input[name='daterangepicker_start']").val();
        var dateakhir = $(".right .daterangepicker_input input[name='daterangepicker_end']").val();
        $.ajax({
            type: "POST",
            cache: false,
            url: "<?=$base_url?>ajax/penjualan.php",
            data: {
                data:"Custom",
                tglawal:dateawal,
                tglakhir:dateakhir
            },
            success: function (result) {
                // alert(result);
                $('#laporan_penjualan').DataTable().ajax.url("<?=$base_url?>table/laporan_penjualan.php?data="+result).load();
            }
		})

	});
});
</script>
