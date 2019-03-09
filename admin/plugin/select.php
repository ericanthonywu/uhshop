<script>
$(document).ready(function() {
	$('#pilih_kategori_barang').select2({
		width: '100%',
		placeholder: 'Pilih Kategori Barang',
		language: {
			noResults: function() {
				return 'Data Tidak Tersedia';
			},
		},
		escapeMarkup: function(markup) {
			return markup;
		},
	});
	$('#pilih_barang').select2({
		width: '100%',
		placeholder: 'Pilih Barang',
		language: {
			noResults: function() {
				return 'Data Tidak Tersedia';
			},
		},
		escapeMarkup: function(markup) {
			return markup;
		},
	});
	$('#pilih_supplier').select2({
		width: '100%',
		placeholder: 'Pilih Supplier',
		language: {
			noResults: function() {
				return 'Data Tidak Tersedia';
			},
		},
		escapeMarkup: function(markup) {
			return markup;
		},
	});
	$('#pilih_pelanggan').select2({
		width: '100%',
		placeholder: 'Pilih Pelanggan',
		language: {
			noResults: function() {
				return 'Data Tidak Tersedia';
			},
		},
		escapeMarkup: function(markup) {
			return markup;
		},
	});
	$('#hak_akses').select2({
		width: '100%',
		placeholder: 'Pilih Hak Akses',
		language: {
			noResults: function() {
				return 'Data Tidak Tersedia';
			},
		},
		escapeMarkup: function(markup) {
			return markup;
		},
	});
});
</script>