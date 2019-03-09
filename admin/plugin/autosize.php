<script type="text/javascript">
var Autosize = function () {
	var alamat_pelanggan = function () {
        var alamat_pelanggan = $('#alamat_pelanggan');
        autosize(alamat_pelanggan);
        autosize.update(alamat_pelanggan);
    }
	return {
        init: function() {
            alamat_pelanggan();
        }
    };
}();

jQuery(document).ready(function() {
    Autosize.init();
});
</script>