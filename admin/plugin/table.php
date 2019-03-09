<script type="text/javascript">
$(document).ready(function() {
	var kategori_barang = $('#kategori_barang').DataTable( {
		dom: "<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>", // horizobtal scrollable datatable
		responsive: true,
		ajax: "<?=$base_url?>table/kategori_barang.php",
		columns: [
			{
				"data": "no",
				"sClass":"text-center",
			},
			{
				"data": "item_type",
				"sClass":"text-center",
			},
			{
				"data": "item_type_id",
				"width": "150px",
				"sClass": "text-center",
				"orderable": false,
				"mRender": function (data) {
					$('.btn-data').tooltip();
					return '<a href="<?=$base_url?>kategori-barang/perbarui/'+data+'" class="btn btn-circle btn-warning btn-xs btn-data btn-perbaruiKategoriBarang"  data-toggle="tooltip" data-placement="top" title="Perbarui Data"><i class="flaticon-notes"></i></a>&nbsp;<button type="button" class="btn btn-circle btn-info btn-xs btn-data btn-detailKategoriBarang" data-val='+ data +' data-toggle="tooltip" data-placement="top" title="Detail Data"><i class="flaticon-search"></i></button>&nbsp;<button type="button" class="btn btn-circle btn-danger btn-xs btn-data btn-hapusKategoriBarang" data-val='+ data +' data-toggle="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></button>';
				}
			}
		],
		language: {
			"aria": {
				"sortAscending": ": activate to sort column ascending",
				"sortDescending": ": activate to sort column descending"
			},
			"emptyTable": "Data Kategori Barang tidak tersedia",
			"info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
			"infoEmpty": "Data tidak ditemukan",
			"infoFiltered": "(Terfilter _TOTAL_ data dari _MAX_ total data)",
			"lengthMenu": "_MENU_ data",
			"search": "Cari:",
			"zeroRecords": "Tidak ada data yang cocok"
		},
		colReorder: {
			realtime: false
		},
	} );
	// table_user.on('order.dt search.dt', function(){
		// table_user.column(0,{search:'applied', order:'applied'}).nodes().each(function(cell,i){
			// cell.innerHTML=i+1;
		// });
	// }).draw();
	
	var data_barang= $('#data_barang').DataTable( {
		dom: "<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>", // horizobtal scrollable datatable
		responsive: true,
		ajax: "<?=$base_url?>table/barang.php",
		columns: [
			{ 
				"data": "no",
				"sClass":"text-center",
			},
			{ 
				"data": "kode",
				"sClass":"text-center",
			},
			{
				"data": "nama",
				"sClass":"text-center",
			},
			{
				"data": "kategori",
				"sClass":"text-center",
			},
			{
				"data": "harga",
				"sClass":"text-center",
			},
			{
				"data": "stok",
				"sClass":"text-center",
			},
            {
				"data": "gambar",
				"mRender": function (data){
					return '<img width="100px" src="<?=$base_assets?>produk/'+data+'"/>';
				},
				"sClass":"text-center",
			},
			{
				"data": "kode",
				"width": "150px",
				"sClass": "text-center",
				"orderable": false,
				"mRender": function (data) {
					$('.btn-data').tooltip();
					return '<a href="<?=$base_url?>barang/perbarui/'+data+'" class="btn btn-circle btn-warning btn-xs btn-data btn-perbaruiBarang"  data-toggle="tooltip" data-placement="top" title="Perbarui Data '+data+'"><i class="flaticon-notes"></i></a>&nbsp;<button type="button" class="btn btn-circle btn-danger btn-xs btn-data btn-hapusBarang" data-val='+ data +' data-toggle="tooltip" data-placement="top" title="Hapus Data '+ data +'"><i class="fa fa-trash"></i></button>';
				}
			}
		],
		language: {
			"aria": {
				"sortAscending": ": activate to sort column ascending",
				"sortDescending": ": activate to sort column descending"
			},
			"emptyTable": "Data Barang tidak tersedia",
			"info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
			"infoEmpty": "Data tidak ditemukan",
			"infoFiltered": "(Terfilter _TOTAL_ data dari _MAX_ total data)",
			"lengthMenu": "_MENU_ data",
			"search": "Cari:",
			"zeroRecords": "Tidak ada data yang cocok"
		},
		colReorder: {
			realtime: false
		},
	} );
	var data_pelanggan= $('#data_pelanggan').DataTable( {
		dom: "<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>", // horizobtal scrollable datatable
		responsive: true,
		ajax: "<?=$base_url?>table/pelanggan.php",
		columns: [
			{ 
				"data": "no",
				"sClass":"text-center",
			},
			{ 
				"data": "kode",
				"sClass":"text-center",
			},
			{
				"data": "nama",
				"sClass":"text-center",
			},
			{
				"data": "alamat",
				"sClass":"text-center",
			},
			{
				"data": "telpon",
				"sClass":"text-center",
			},
			{
				"data": "kode",
				"width": "150px",
				"sClass": "text-center",
				"orderable": false,
				"mRender": function (data) {
					$('.btn-data').tooltip();
					return '<a href="<?=$base_url?>pelanggan/perbarui/'+data+'" class="btn btn-circle btn-warning btn-xs btn-data btn-perbaruiBarang"  data-toggle="tooltip" data-placement="top" title="Perbarui Data '+data+'"><i class="flaticon-notes"></i></a>&nbsp;<button type="button" class="btn btn-circle btn-info btn-xs btn-data btn-detailTransaksiPelanggan" data-val='+ data +' data-toggle="tooltip" data-placement="top" title="Detail Transaksi ' + data + '"><i class="flaticon-search"></i></button>&nbsp;<button type="button" class="btn btn-circle btn-danger btn-xs btn-data btn-hapusPelanggan" data-val='+ data +' data-toggle="tooltip" data-placement="top" title="Hapus Data '+ data +'"><i class="fa fa-trash"></i></button>';
				}
			}
		],
		language: {
			"aria": {
				"sortAscending": ": activate to sort column ascending",
				"sortDescending": ": activate to sort column descending"
			},
			"emptyTable": "Data Pelanggan tidak tersedia",
			"info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
			"infoEmpty": "Data tidak ditemukan",
			"infoFiltered": "(Terfilter _TOTAL_ data dari _MAX_ total data)",
			"lengthMenu": "_MENU_ data",
			"search": "Cari:",
			"zeroRecords": "Tidak ada data yang cocok"
		},
		colReorder: {
			realtime: false
		},
	} );
	var data_supplier= $('#data_supplier').DataTable( {
		dom: "<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>", // horizobtal scrollable datatable
		responsive: true,
		ajax: "<?=$base_url?>table/supplier.php",
		columns: [
			{ 
				"data": "no",
				"sClass":"text-center",
			},
			{ 
				"data": "kode",
				"sClass":"text-center",
			},
			{
				"data": "nama",
				"sClass":"text-center",
			},
			{
				"data": "alamat",
				"sClass":"text-center",
			},
			{
				"data": "telpon",
				"sClass":"text-center",
			},
			{
				"data": "kode",
				"width": "150px",
				"sClass": "text-center",
				"orderable": false,
				"mRender": function (data) {
					$('.btn-data').tooltip();
					return '<a href="<?=$base_url?>supplier/perbarui/'+data+'" class="btn btn-circle btn-warning btn-xs btn-data btn-perbaruiBarang"  data-toggle="tooltip" data-placement="top" title="Perbarui Data '+data+'"><i class="flaticon-notes"></i></a>&nbsp;<button type="button" class="btn btn-circle btn-info btn-xs btn-data btn-detailTransaksiSupplier" data-val='+ data +' data-toggle="tooltip" data-placement="top" title="Detail Transaksi ' + data + '"><i class="flaticon-search"></i></button>&nbsp;<button type="button" class="btn btn-circle btn-danger btn-xs btn-data btn-hapusSupplier" data-val='+ data +' data-toggle="tooltip" data-placement="top" title="Hapus Data '+ data +'"><i class="fa fa-trash"></i></button>';
				}
			}
		],
		language: {
			"aria": {
				"sortAscending": ": activate to sort column ascending",
				"sortDescending": ": activate to sort column descending"
			},
			"emptyTable": "Data Supplier tidak tersedia",
			"info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
			"infoEmpty": "Data tidak ditemukan",
			"infoFiltered": "(Terfilter _TOTAL_ data dari _MAX_ total data)",
			"lengthMenu": "_MENU_ data",
			"search": "Cari:",
			"zeroRecords": "Tidak ada data yang cocok"
		},
		colReorder: {
			realtime: false
		},
	} );
	var data_barang_pembelian= $('#data_barang_pembelian').DataTable( {
		dom: "<'row'<'col-sm-6 text-left'><'col-sm-6 text-right'>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'><'col-sm-12 col-md-7 dataTables_pager'lp>>", // horizobtal scrollable datatable
		responsive: true,
		ajax: "<?=$base_url?>table/barang_pembelian.php<?if(isset($_GET['kode'])){?>?kode=<?=$_GET['kode']?><?}?>",
		columns: [
			{ 
				"data": "no",
				"sClass":"text-center",
			},
			{
				"data": "nama",
				"sClass":"text-center",
			},
			{
				"data": "harga",
				"sClass":"text-center",
			},
			{
				"data": "jumlah",
				"sClass":"text-center",
			},
			{
				"data": "id",
				"width": "150px",
				"sClass": "text-center",
				"orderable": false,
				"mRender": function (data) {
					$('.btn-data').tooltip();
					return '<button type="button" class="btn btn-circle btn-danger btn-xs btn-data btn-hapusBarangPembelian" data-val='+ data +' data-toggle="tooltip" data-placement="top" title="Hapus Data '+ data +'"><i class="fa fa-trash"></i></button>';
				}
			}
		],
		language: {
			"aria": {
				"sortAscending": ": activate to sort column ascending",
				"sortDescending": ": activate to sort column descending"
			},
			"emptyTable": "Data Barang Pembelian tidak tersedia",
			"info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
			"infoEmpty": "Data tidak ditemukan",
			"infoFiltered": "(Terfilter _TOTAL_ data dari _MAX_ total data)",
			"lengthMenu": "_MENU_ data",
			"search": "Cari:",
			"zeroRecords": "Tidak ada data yang cocok"
		},
		colReorder: {
			realtime: true
		},
	} );
	var data_pembelian= $('#data_pembelian').DataTable( {
		dom: "<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>", // horizobtal scrollable datatable
		responsive: true,
		ajax: "<?=$base_url?>table/pembelian.php",
		columns: [
			{ 
				"data": "no",
				"sClass":"text-center",
			},
			{ 
				"data": "kode",
				"sClass":"text-center",
			},
			{
				"data": "tanggal",
				"sClass":"text-center",
			},
			{
				"data": "supplier",
				"sClass":"text-center",
			},
			{
				"data": "total",
				"sClass":"text-center",
			},
			{
				"data": "kode",
				"width": "150px",
				"sClass": "text-center",
				"orderable": false,
				"mRender": function (data) {
					$('.btn-data').tooltip();
					return '<a href="<?=$base_url?>pembelian/perbarui/'+data+'" class="btn btn-circle btn-warning btn-xs btn-data btn-perbaruiPembelian" data-toggle="tooltip" data-placement="top" title="Perbarui Data '+data+'"><i class="flaticon-notes"></i></a>&nbsp;<button type="button" class="btn btn-circle btn-info btn-xs btn-data btn-detailTransaksiPembelian" data-val='+ data +' data-toggle="tooltip" data-placement="top" title="Detail Transaksi ' + data + '"><i class="flaticon-search"></i></button>&nbsp;<button type="button" class="btn btn-circle btn-danger btn-xs btn-data btn-hapusPembelian" data-val='+ data +' data-toggle="tooltip" data-placement="top" title="Hapus Data '+ data +'"><i class="fa fa-trash"></i></button>';
				}
			}
		],
		language: {
			"aria": {
				"sortAscending": ": activate to sort column ascending",
				"sortDescending": ": activate to sort column descending"
			},
			"emptyTable": "Data Pembelian tidak tersedia",
			"info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
			"infoEmpty": "Data tidak ditemukan",
			"infoFiltered": "(Terfilter _TOTAL_ data dari _MAX_ total data)",
			"lengthMenu": "_MENU_ data",
			"search": "Cari:",
			"zeroRecords": "Tidak ada data yang cocok"
		},
		colReorder: {
			realtime: false
		},
	} );
	var data_barang_penjualan= $('#data_barang_penjualan').DataTable( {
		dom: "<'row'<'col-sm-6 text-left'><'col-sm-6 text-right'>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'><'col-sm-12 col-md-7 dataTables_pager'lp>>", // horizobtal scrollable datatable
		responsive: true,
		ajax: "<?=$base_url?>table/barang_penjualan.php<?if(isset($_GET['kode'])){?>?kode=<?=$_GET['kode']?><?}?>",
		columns: [
			{ 
				"data": "no",
				"sClass":"text-center",
			},
			{
				"data": "nama",
				"sClass":"text-center",
			},
			{
				"data": "harga",
				"sClass":"text-center",
			},
			{
				"data": "jumlah",
				"sClass":"text-center",
			},
			{
				"data": "id",
				"width": "150px",
				"sClass": "text-center",
				"orderable": false,
				"mRender": function (data) {
					$('.btn-data').tooltip();
					return '<button type="button" class="btn btn-circle btn-danger btn-xs btn-data btn-hapusBarangPenjualan" data-val='+ data +' data-toggle="tooltip" data-placement="top" title="Hapus Data '+ data +'"><i class="fa fa-trash"></i></button>';
				}
			}
		],
		language: {
			"aria": {
				"sortAscending": ": activate to sort column ascending",
				"sortDescending": ": activate to sort column descending"
			},
			"emptyTable": "Data Barang Penjualan tidak tersedia",
			"info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
			"infoEmpty": "Data tidak ditemukan",
			"infoFiltered": "(Terfilter _TOTAL_ data dari _MAX_ total data)",
			"lengthMenu": "_MENU_ data",
			"search": "Cari:",
			"zeroRecords": "Tidak ada data yang cocok"
		},
		colReorder: {
			realtime: true
		},
	} );
	var data_penjualan= $('#data_penjualan').DataTable( {
		dom: "<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>", // horizobtal scrollable datatable
		responsive: true,
		ajax: "<?=$base_url?>table/penjualan.php",
		columns: [
			{ 
				"data": "no",
				"sClass":"text-center",
			},
			{ 
				"data": "kode",
				"sClass":"text-center",
			},
			{
				"data": "tanggal",
				"sClass":"text-center",
			},
			{
				"data": "pelanggan",
				"sClass":"text-center",
			},
			{
				"data": "bayar",
				"sClass":"text-center",
			},
			{
				"data": "total",
				"sClass":"text-center",
			},
			{
				"data": "status",
				"sClass":"text-center",
			},
			{
				"data": "kode",
				"width": "150px",
				"sClass": "text-center",
				"orderable": false,
				"mRender": function (data) {
					$('.btn-data').tooltip();
					return '<a href="<?=$base_url?>penjualan/perbarui/'+data+'" class="btn btn-circle btn-warning btn-xs btn-data btn-perbaruiPenjualan" data-toggle="tooltip" data-placement="top" title="Perbarui Data '+data+'"><i class="flaticon-notes"></i></a>&nbsp;<a href="<?=$base_url?>penjualan/cetak/'+data+'" class="btn btn-circle btn-success btn-xs btn-data btn-printPenjualan" data-toggle="tooltip" data-placement="top" title="Print '+data+'"><i class="flaticon-download"></i></a>&nbsp;<button type="button" class="btn btn-circle btn-info btn-xs btn-data btn-detailTransaksiPenjualan" data-val='+ data +' data-toggle="tooltip" data-placement="top" title="Detail Transaksi ' + data + '"><i class="flaticon-search"></i></button>&nbsp;<button type="button" class="btn btn-circle btn-danger btn-xs btn-data btn-hapusPenjualan" data-val='+ data +' data-toggle="tooltip" data-placement="top" title="Hapus Data '+ data +'"><i class="fa fa-trash"></i></button>';
				}
			}
		],
		language: {
			"aria": {
				"sortAscending": ": activate to sort column ascending",
				"sortDescending": ": activate to sort column descending"
			},
			"emptyTable": "Data Penjualan tidak tersedia",
			"info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
			"infoEmpty": "Data tidak ditemukan",
			"infoFiltered": "(Terfilter _TOTAL_ data dari _MAX_ total data)",
			"lengthMenu": "_MENU_ data",
			"search": "Cari:",
			"zeroRecords": "Tidak ada data yang cocok"
		},
		colReorder: {
			realtime: false
		},
	} );
	var laporan_pembelian= $('#laporan_pembelian').DataTable( {
		dom: "<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>", // horizobtal scrollable datatable
		responsive: true,
		ajax: "<?=$base_url?>table/laporan_pembelian.php<?if(isset($_POST['data'])){?>?data=<?=$_POST['data']?><?}?>",
		columns: [
			{ 
				"data": "no",
				"sClass":"text-center",
			},
			{ 
				"data": "kode",
				"sClass":"text-center",
			},
			{
				"data": "tanggal",
				"sClass":"text-center",
			},
			{
				"data": "supplier",
				"sClass":"text-center",
			},
			{
				"data": "total",
				"sClass":"text-center",
			},
			{
				"data": "kode",
				"width": "150px",
				"sClass": "text-center",
				"orderable": false,
				"mRender": function (data) {
					$('.btn-data').tooltip();
					return '<button type="button" class="btn btn-circle btn-info btn-xs btn-data btn-detailTransaksiPembelian" data-val='+ data +' data-toggle="tooltip" data-placement="top" title="Detail Transaksi ' + data + '"><i class="flaticon-search"></i></button>';
				}
			}
		],
		language: {
			"aria": {
				"sortAscending": ": activate to sort column ascending",
				"sortDescending": ": activate to sort column descending"
			},
			"emptyTable": "Laporan Pembelian tidak tersedia",
			"info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
			"infoEmpty": "Data tidak ditemukan",
			"infoFiltered": "(Terfilter _TOTAL_ data dari _MAX_ total data)",
			"lengthMenu": "_MENU_ data",
			"search": "Cari:",
			"zeroRecords": "Tidak ada data yang cocok"
		},
		colReorder: {
			realtime: false
		},
		buttons:[
		{ extend: 'print', className: 'btn m-btn--square  m-btn m-btn--gradient-from-primary m-btn--gradient-to-info' },
		{ extend: 'copyHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-success m-btn--gradient-to-accent' },
		{ extend: 'excelHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-danger m-btn--gradient-to-warning' },
		{ extend: 'csvHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-warning m-btn--gradient-to-danger' },
		{ extend: 'pdfHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-info m-btn--gradient-to-accent' }
		],
		// "order": [
			// [0, 'asc']
		// ],
		// "lengthMenu": [
			// [10, 25, 50, -1],
			// [10, 25, 50, "All"] // change per page values here
		// ],
		// "pageLength": 10
	} );
	laporan_pembelian.on('order.dt search.dt', function(){
		laporan_pembelian.column(0,{search:'applied', order:'applied'}).nodes().each(function(cell,i){
			cell.innerHTML=i+1;
		});
	}).draw();
	var laporan_penjualan= $('#laporan_penjualan').DataTable( {
		dom: "<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>", // horizobtal scrollable datatable
		responsive: true,
		ajax: "<?=$base_url?>table/laporan_penjualan.php<?if(isset($_POST['data'])){?>?data=<?=$_POST['data']?><?}?>",
		columns: [
			{ 
				"data": "no",
				"sClass":"text-center",
			},
			{ 
				"data": "kode",
				"sClass":"text-center",
			},
			{
				"data": "tanggal",
				"sClass":"text-center",
			},
			{
				"data": "pelanggan",
				"sClass":"text-center",
			},
			{
				"data": "bayar",
				"sClass":"text-center",
			},
			{
				"data": "total",
				"sClass":"text-center",
			},
			{
				"data": "status",
				"sClass":"text-center",
			},
			{
				"data": "kode",
				"width": "150px",
				"sClass": "text-center",
				"orderable": false,
				"mRender": function (data) {
					$('.btn-data').tooltip();
					return '<button type="button" class="btn btn-circle btn-info btn-xs btn-data btn-detailTransaksiPenjualan" data-val='+ data +' data-toggle="tooltip" data-placement="top" title="Detail Transaksi ' + data + '"><i class="flaticon-search"></i></button>';
				}
			}
		],
		language: {
			"aria": {
				"sortAscending": ": activate to sort column ascending",
				"sortDescending": ": activate to sort column descending"
			},
			"emptyTable": "Laporan Penjualan tidak tersedia",
			"info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
			"infoEmpty": "Data tidak ditemukan",
			"infoFiltered": "(Terfilter _TOTAL_ data dari _MAX_ total data)",
			"lengthMenu": "_MENU_ data",
			"search": "Cari:",
			"zeroRecords": "Tidak ada data yang cocok"
		},
		colReorder: {
			realtime: false
		},
		buttons:[
		{ extend: 'print', className: 'btn m-btn--square  m-btn m-btn--gradient-from-primary m-btn--gradient-to-info' },
		{ extend: 'copyHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-success m-btn--gradient-to-accent' },
		{ extend: 'excelHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-danger m-btn--gradient-to-warning' },
		{ extend: 'csvHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-warning m-btn--gradient-to-danger' },
		{ extend: 'pdfHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-info m-btn--gradient-to-accent' }
		],
		// "order": [
			// [0, 'asc']
		// ],
		// "lengthMenu": [
			// [10, 25, 50, -1],
			// [10, 25, 50, "All"] // change per page values here
		// ],
		// "pageLength": 10
	} );
	laporan_penjualan.on('order.dt search.dt', function(){
		laporan_penjualan.column(0,{search:'applied', order:'applied'}).nodes().each(function(cell,i){
			cell.innerHTML=i+1;
		});
	}).draw();
	var laporan_keuntungan= $('#laporan_keuntungan').DataTable( {
		dom: "<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>", // horizobtal scrollable datatable
		responsive: true,
		ajax: "<?=$base_url?>table/laporan_keuntungan.php<?if(isset($_POST['data'])){?>?data=<?=$_POST['data']?><?}?>",
		columns: [
			{ 
				"data": "no",
				"sClass":"text-center",
			},
			{ 
				"data": "kode",
				"sClass":"text-center",
			},
			{
				"data": "tanggal",
				"sClass":"text-center",
			},
			{
				"data": "pelanggan",
				"sClass":"text-center",
			},
			{
				"data": "bayar",
				"sClass":"text-center",
			},
			{
				"data": "total",
				"sClass":"text-center",
			},
			{
				"data": "status",
				"sClass":"text-center",
			}
		],
		language: {
			"aria": {
				"sortAscending": ": activate to sort column ascending",
				"sortDescending": ": activate to sort column descending"
			},
			"emptyTable": "Laporan Keuntungan tidak tersedia",
			"info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
			"infoEmpty": "Data tidak ditemukan",
			"infoFiltered": "(Terfilter _TOTAL_ data dari _MAX_ total data)",
			"lengthMenu": "_MENU_ data",
			"search": "Cari:",
			"zeroRecords": "Tidak ada data yang cocok"
		},
		colReorder: {
			realtime: false
		},
		buttons:[
		{ extend: 'print', className: 'btn m-btn--square  m-btn m-btn--gradient-from-primary m-btn--gradient-to-info' },
		{ extend: 'copyHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-success m-btn--gradient-to-accent' },
		{ extend: 'excelHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-danger m-btn--gradient-to-warning' },
		{ extend: 'csvHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-warning m-btn--gradient-to-danger' },
		{ extend: 'pdfHtml5', className: 'btn m-btn--square  m-btn m-btn--gradient-from-info m-btn--gradient-to-accent' }
		],
		// "order": [
			// [0, 'asc']
		// ],
		// "lengthMenu": [
			// [10, 25, 50, -1],
			// [10, 25, 50, "All"] // change per page values here
		// ],
		// "pageLength": 10
	} );
	laporan_keuntungan.on('order.dt search.dt', function(){
		laporan_keuntungan.column(0,{search:'applied', order:'applied'}).nodes().each(function(cell,i){
			cell.innerHTML=i+1;
		});
	}).draw();
	var table_user = $('#table_user').DataTable( {
		dom: "<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>", // horizobtal scrollable datatable
		responsive: true,
		ajax: "<?=$base_url?>table/user.php",
		columns: [
			{
				"data": "kode",
				"sClass":"text-center",
			},
			{
				"data": "nama",
				"sClass":"text-center",
			},
			{
				"data": "email",
				"sClass":"text-center",
			},
			{
				"data": "level",
				"sClass":"text-center",
			},
			{
				"data": "kode",
				"width": "150px",
				"sClass": "text-center",
				"orderable": false,
				"mRender": function (data) {
					$('.btn-data').tooltip();
					return '<a href="<?=$base_url?>user/perbarui/'+data+'" class="btn btn-circle btn-warning btn-xs btn-data btn-perbaruiUser"  data-toggle="tooltip" data-placement="top" title="Perbarui Data"><i class="flaticon-notes"></i></a>&nbsp;<button type="button" class="btn btn-circle btn-danger btn-xs btn-data btn-hapusUser" data-val='+ data +' data-toggle="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></button>';
				}
			}
		],
		language: {
			"aria": {
				"sortAscending": ": activate to sort column ascending",
				"sortDescending": ": activate to sort column descending"
			},
			"emptyTable": "Data User tidak tersedia",
			"info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
			"infoEmpty": "Data tidak ditemukan",
			"infoFiltered": "(Terfilter _TOTAL_ data dari _MAX_ total data)",
			"lengthMenu": "_MENU_ data",
			"search": "Cari:",
			"zeroRecords": "Tidak ada data yang cocok"
		},
		colReorder: {
			realtime: false
		},
	} );
    $('#data_konten').DataTable( {
        dom: "<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>", // horizobtal scrollable datatable
        responsive: true,
        ajax: "<?=$base_url?>table/konten.php",
        columns: [
            {
                "data": "no",
                "sClass":"text-center",
            },
            {
                "data": "kode",
                "sClass":"text-center",
            },
            {
                "data": "halaman",
                "sClass":"text-center",
            },
            {
                "data": "konten",
                "sClass":"text-center",
            },
            {
                "data": "no",
                "width": "150px",
                "sClass": "text-center",
                "orderable": false,
                "mRender": function (data) {
                    $('.btn-data').tooltip();
                    return '<a href="<?=$base_url?>konten/perbarui/'+data+'" class="btn btn-circle btn-warning btn-xs btn-data btn-perbaruiUser"  data-toggle="tooltip" data-placement="top" title="Perbarui Data"><i class="flaticon-notes"></i></a>&nbsp;<button type="button" class="btn btn-circle btn-danger btn-xs btn-data" id="btn-hapuskonten" data-val='+ data +' data-toggle="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></button>';
                }
            }
        ],
        language: {
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            },
            "emptyTable": "Data User tidak tersedia",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            "infoEmpty": "Data tidak ditemukan",
            "infoFiltered": "(Terfilter _TOTAL_ data dari _MAX_ total data)",
            "lengthMenu": "_MENU_ data",
            "search": "Cari:",
            "zeroRecords": "Tidak ada data yang cocok"
        },
        colReorder: {
            realtime: false
        },
    } );
    $('#data_order').DataTable({
        dom: "<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>", // horizobtal scrollable datatable
        responsive: true,
        ajax: "<?=$base_url?>table/order.php",
        columns: [
            {
                "data": "no",
                "sClass":"text-center",
            },
            {
                "data": "invoice",
                "sClass":"text-center",
            },
            {
                "data": "date",
                "sClass":"text-center",
            },
            {
                "data": "customer",
                "sClass":"text-center",
            },
            {
                "data": "total_price",
                "sClass":"text-center",
            },
            {
                "data": "paid",
                "sClass":"text-center",
            },
            {
				"data": "image",
				"mRender": function (data){
					return '<img width="100px" src="<?=$base_assets?>konfirmasipembayaran/'+data+'"/>';
				},
				"sClass":"text-center",
			},
            {
                "data": "no",
                "width": "150px",
                "sClass": "text-center",
                "orderable": false,
                "mRender": function (data) {
                    $('.btn-data').tooltip();
                    return '<button data-status="ok" class="btn btn-circle btn-warning btn-xs btn-data order"  data-toggle="tooltip" data-val='+ data +' data-placement="top" title="Konfirmasi order"><i class="fas fa-check-circle"></i></button>' +
                        '&nbsp;' +
                        '<button data-status="cancel" type="button" class="btn btn-circle btn-danger btn-xs btn-data order" data-val='+ data +' data-toggle="tooltip" data-placement="top" title="Tolak order"><i class="fas fa-times-circle"></i></button>';
                }
            }
        ],
        language: {
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            },
            "emptyTable": "Data order tidak tersedia",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            "infoEmpty": "Data tidak ditemukan",
            "infoFiltered": "(Terfilter _TOTAL_ data dari _MAX_ total data)",
            "lengthMenu": "_MENU_ data",
            "search": "Cari:",
            "zeroRecords": "Tidak ada data yang cocok"
        },
        colReorder: {
            realtime: false
        },
    } );
    $('#data_slider').DataTable({
        dom: "<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>", // horizobtal scrollable datatable
        responsive: true,
        ajax: "<?=$base_url?>table/slider.php",
        columns: [
            {
                "data": "no",
                "sClass":"text-center",
            },
            {
                "data": "gambar",
                "sClass":"text-center",
            },
            {
                "data": "judul",
                "sClass":"text-center",
            },
            {
                "data": "konten",
                "sClass":"text-center",
            },
            {
                "data": "no",
                "width": "150px",
                "sClass": "text-center",
                "orderable": false,
                "mRender": function (data) {
                    $('.btn-data').tooltip();
                    return '<a href="<?=$base_url?>slider/perbarui/'+data+'" class="btn btn-circle btn-warning btn-xs btn-data btn-perbaruiUser"  data-toggle="tooltip" data-placement="top" title="Perbarui Data"><i class="flaticon-notes"></i></a>&nbsp;<button type="button" class="btn btn-circle btn-danger btn-xs btn-data btn-hapusslider" data-val='+ data +' data-toggle="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></button>';
                }
            }
        ],
        language: {
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            },
            "emptyTable": "Data order tidak tersedia",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            "infoEmpty": "Data tidak ditemukan",
            "infoFiltered": "(Terfilter _TOTAL_ data dari _MAX_ total data)",
            "lengthMenu": "_MENU_ data",
            "search": "Cari:",
            "zeroRecords": "Tidak ada data yang cocok"
        },
        colReorder: {
            realtime: false
        },
    } );
    $('#data_sosmed').DataTable({
        dom: "<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>", // horizobtal scrollable datatable
        responsive: true,
        ajax: "<?=$base_url?>table/sosialmedia.php",
        columns: [
            {
                "data": "no",
                "sClass":"text-center",
            },
            {
                "data": "sosial_media",
                "sClass":"text-center",
            },
            {
                "data": "nama",
                "sClass":"text-center",
            },
            {
                "data": "link_sm",
                "sClass":"text-center",
            },
            {
                "data": "akun_sm",
                "sClass":"text-center",
            },
            {
                "data": "no",
                "width": "150px",
                "sClass": "text-center",
                "orderable": false,
                "mRender": function (data) {
                    $('.btn-data').tooltip();
                    return '<a href="<?=$base_url?>sosial-media/perbarui/'+data+'" class="btn btn-circle btn-warning btn-xs btn-data"  data-toggle="tooltip" data-placement="top" title="Perbarui Data"><i class="flaticon-notes"></i></a>&nbsp;<button type="button" class="btn btn-circle btn-danger btn-xs btn-data" id="btn-hapussosmed" data-val='+ data +' data-toggle="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></button>';
                }
            }
        ],
        language: {
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            },
            "emptyTable": "Data sosial media tidak tersedia",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            "infoEmpty": "Data tidak ditemukan",
            "infoFiltered": "(Terfilter _TOTAL_ data dari _MAX_ total data)",
            "lengthMenu": "_MENU_ data",
            "search": "Cari:",
            "zeroRecords": "Tidak ada data yang cocok"
        },
        colReorder: {
            realtime: false
        },
    } );
    $('#data_testimonial').DataTable({
        dom: "<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>", // horizobtal scrollable datatable
        responsive: true,
        ajax: "<?=$base_url?>table/tesimonial.php",
        columns: [
            {
                "data": "no",
                "sClass":"text-center",
            },
            {
                "data": "nama_customer",
                "sClass":"text-center",
            },
            {
                "data": "review",
                "sClass":"text-center",
            },
            {
                "data": "no",
                "width": "150px",
                "sClass": "text-center",
                "orderable": false,
                "mRender": function (data) {
                    $('.btn-data').tooltip();
                    return '<a href="<?=$base_url?>testimonial/perbarui/'+data+'" class="btn btn-circle btn-warning btn-xs btn-data"  data-toggle="tooltip" data-placement="top" title="Perbarui Data"><i class="flaticon-notes"></i></a>&nbsp;<button type="button" class="btn btn-circle btn-danger btn-xs btn-data" id="btn-hapustestimonial" data-val='+ data +' data-toggle="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></button>';
                }
            }
        ],
        language: {
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            },
            "emptyTable": "Data Testimonial tidak tersedia",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            "infoEmpty": "Data tidak ditemukan",
            "infoFiltered": "(Terfilter _TOTAL_ data dari _MAX_ total data)",
            "lengthMenu": "_MENU_ data",
            "search": "Cari:",
            "zeroRecords": "Tidak ada data yang cocok"
        },
        colReorder: {
            realtime: false
        },
    } );
    $('#data_how-to-order').DataTable({
        dom: "<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>", // horizobtal scrollable datatable
        responsive: true,
        ajax: "<?=$base_url?>table/how_to_order.php",
        columns: [
            {
                "data": "no",
                "sClass":"text-center",
            },
            {
                "data": "content",
                "sClass":"text-center",
            },
            {
                "data": "no",
                "width": "150px",
                "sClass": "text-center",
                "orderable": false,
                "mRender": function (data) {
                    $('.btn-data').tooltip();
                    return '<a href="<?=$base_url?>how-to-order/perbarui/'+data+'" class="btn btn-circle btn-warning btn-xs btn-data"  data-toggle="tooltip" data-placement="top" title="Perbarui Data"><i class="flaticon-notes"></i></a>&nbsp;<button type="button" class="btn btn-circle btn-danger btn-xs btn-data" id="btn-howtoorder" data-val='+ data +' data-toggle="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></button>';
                }
            }
        ],
        language: {
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            },
            "emptyTable": "Data Testimonial tidak tersedia",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            "infoEmpty": "Data tidak ditemukan",
            "infoFiltered": "(Terfilter _TOTAL_ data dari _MAX_ total data)",
            "lengthMenu": "_MENU_ data",
            "search": "Cari:",
            "zeroRecords": "Tidak ada data yang cocok"
        },
        colReorder: {
            realtime: false
        },
    } );
	// table_user.on('order.dt search.dt', function(){
		// table_user.column(0,{search:'applied', order:'applied'}).nodes().each(function(cell,i){
			// cell.innerHTML=i+1;
		// });
	// }).draw();
});
</script>