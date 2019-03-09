<script>
    //TAMBAH DATA KATEGORI BARANG
    $(document).on('click', "#simpan_kategori", function () {
        $("#form_tambah_kategori").submit(function (e) {
            return false;
        });
        var nama_kategori = $('#nama_kategori').val();

        var data = {simpan_kategori: '', nama_kategori: nama_kategori};
        if (nama_kategori.length > 0) {
            $.ajax({
                type: "POST",
                url: "<?=$base_url?>function/crud.php",
                data: data,
                success: function (response) {
                    if (response == "success") {
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
                        toastr.success("Data Kategori " + nama_kategori + " Telah Berhasil Tersimpan", "<?=$data_pengaturan_sistem['nama']?>");
                        setTimeout(function () {
                            location.href = "<?=$base_url?>kategori-barang";
                        }, 2000);
                    } else if (response == "exist") {
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
                        toastr.error("Data Kategori " + nama_kategori + " Sudah Tersedia", "<?=$data_pengaturan_sistem['nama']?>");
                    }
                },
            });
        }

    });

    //UBAH DATA KATEGORI BARANG
    $(document).on('click', "#perbarui_kategori", function () {
        $("#form_ubah_kategori").submit(function (e) {
            return false;
        });
        var id_kategori = $('#id_kategori').val();
        var nama_kategori = $('#nama_kategori').val();

        var data = {perbarui_kategori: '', id_kategori: id_kategori, nama_kategori: nama_kategori};
        if (nama_kategori.length > 0) {
            $.ajax({
                type: "POST",
                url: "<?=$base_url?>function/crud.php",
                data: data,
                success: function (response) {
                    if (response == "success") {
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
                        toastr.success("Data Kategori " + nama_kategori + " Telah Berhasil Tersimpan", "<?=$data_pengaturan_sistem['nama']?>");
                        setTimeout(function () {
                            location.href = "<?=$base_url?>kategori-barang";
                        }, 2000);
                    } else if (response == "exist") {
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
                        toastr.error("Data Kategori " + nama_kategori + " Sudah Tersedia", "<?=$data_pengaturan_sistem['nama']?>");
                    }
                },
            });
        }

    });

    //DETAIL KATEGORI BARANG
    $(document).on('click', ".btn-detailKategoriBarang", function () {
        var kdRow = $(this).attr('data-val');
        $.ajax({
            type: "POST",
            url: '<?=$base_url?>function/crud.php',
            data: {detailKategori: '', kode: kdRow},
            success: function (html) {
                // alert(kdRow);
                $(".modal-content").html(html);
                $("#modalKategori").modal('show');
            },
            error: function () {
                $('.modal-content').html('<h3>Ajax Bermasalah !!!</h3>')
            },
        });
    });
    //HAPUS KATEGORI BARANG
    $(document).on('click', ".btn-hapusKategoriBarang", function () {
        var kdRow = $(this).data('val');
        $.confirm({
            title: 'Konfirmasi Hapus Data',
            content: 'Apakah Anda Yakin Ingin Menghapus Data ini ?',
            confirmButton: 'Iya',
            cancelButton: 'Batal',
            confirmButtonClass: 'btn-info',
            cancelButtonClass: 'btn-danger',
            theme: 'black',
            autoClose: 'cancel|6000',
            keyboardEnabled: true,
            confirm: function () {
                $.ajax({
                    type: "POST",
                    url: '<?=$base_url?>function/crud.php',
                    data: {hapusKategoriBarang: '', kodeRow: kdRow},
                    //dataType: "json",
                    success: function (html) {
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
                        toastr.success("Data Kategori Berhasil Terhapus", "<?=$data_pengaturan_sistem['nama']?>");
                        $('#kategori_barang').DataTable().ajax.reload();
                    },
                });
            },
        });
    });
    //DETAIL BARANG
    $(document).on('click', ".btn-detailBarang", function () {
        var kdRow = $(this).attr('data-val');
        $.ajax({
            type: "POST",
            url: '<?=$base_url?>function/crud.php',
            data: {detailBarang: '', kode: kdRow},
            success: function (html) {
                // alert(kdRow);
                $(".modal-content").html(html);
                $("#modalBarang").modal('show');
            },
            error: function () {
                $('.modal-content').html('<h3>Ajax Bermasalah !!!</h3>')
            },
        });
    });
    //HAPUS BARANG
    $(document).on('click', ".btn-hapusBarang", function () {
        var kdRow = $(this).data('val');
        $.confirm({
            title: 'Konfirmasi Hapus Data',
            content: 'Apakah Anda Yakin Ingin Menghapus Data ini ?',
            confirmButton: 'Iya',
            cancelButton: 'Batal',
            confirmButtonClass: 'btn-info',
            cancelButtonClass: 'btn-danger',
            theme: 'black',
            autoClose: 'cancel|6000',
            keyboardEnabled: true,
            confirm: function () {
                $.ajax({
                    type: "POST",
                    url: '<?=$base_url?>function/crud.php',
                    data: {hapusBarang: '', kodeRow: kdRow},
                    //dataType: "json",
                    success: function (html) {
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
                        toastr.success("Data Barang Berhasil Dihapus", "<?=$data_pengaturan_sistem['nama']?>");
                        $('#data_barang').DataTable().ajax.reload();
                    },
                });
            },
        });
    });
    //TAMBAH DATA PELANGGAN
    $(document).on('click', "#simpan_pelanggan", function () {
        $("#form_tambah_pelanggan").submit(function (e) {
            return false;
        });
        var kode_pelanggan = $('#kode_pelanggan').val();
        var nama_pelanggan = $('#nama_pelanggan').val();
        var telpon_pelanggan = $('#telpon_pelanggan').val();
        var alamat_pelanggan = $('#alamat_pelanggan').val();

        var data = {
            simpan_pelanggan: '',
            kode_pelanggan: kode_pelanggan,
            nama_pelanggan: nama_pelanggan,
            telpon_pelanggan: telpon_pelanggan,
            alamat_pelanggan: alamat_pelanggan
        };
        if (kode_pelanggan.length > 0 && nama_pelanggan.length > 0 && telpon_pelanggan.length > 0 && alamat_pelanggan.length > 0) {
            $.ajax({
                type: "POST",
                url: "<?=$base_url?>function/crud.php",
                data: data,
                success: function (response) {
                    if (response == "success") {
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
                        toastr.success("Data Pelanggan " + nama_pelanggan + " Telah Berhasil Tersimpan", "<?=$data_pengaturan_sistem['nama']?>");
                        setTimeout(function () {
                            location.href = "<?=$base_url?>pelanggan";
                        }, 2000);
                    } else if (response == "exist") {
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
                        toastr.error("Data Pelanggan " + nama_pelanggan + " Sudah Tersedia", "<?=$data_pengaturan_sistem['nama']?>");
                    }
                },
            });
        }

    });

    //UBAH DATA PELANGGAN
    $(document).on('click', "#perbarui_pelanggan", function () {
        $("#form_ubah_pelanggan").submit(function (e) {
            return false;
        });
        var kode_pelanggan = $('#kode_pelanggan').val();
        var nama_pelanggan = $('#nama_pelanggan').val();
        var telpon_pelanggan = $('#telpon_pelanggan').val();
        var alamat_pelanggan = $('#alamat_pelanggan').val();

        var data = {
            perbarui_pelanggan: '',
            kode_pelanggan: kode_pelanggan,
            nama_pelanggan: nama_pelanggan,
            telpon_pelanggan: telpon_pelanggan,
            alamat_pelanggan: alamat_pelanggan
        };
        if (kode_pelanggan.length > 0 && nama_pelanggan.length > 0 && telpon_pelanggan.length > 0 && alamat_pelanggan.length > 0) {
            $.ajax({
                type: "POST",
                url: "<?=$base_url?>function/crud.php",
                data: data,
                success: function (response) {
                    if (response == "success") {
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
                        toastr.success("Data Pelanggan " + nama_pelanggan + " Telah Berhasil Dirubah", "<?=$data_pengaturan_sistem['nama']?>");
                        setTimeout(function () {
                            location.href = "<?=$base_url?>pelanggan";
                        }, 2000);
                    } else if (response == "exist") {
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
                        toastr.error("Data Pelanggan " + nama_pelanggan + " Sudah Tersedia", "<?=$data_pengaturan_sistem['nama']?>");
                    }
                },
            });
        }

    });

    //DETAIL PELANGGAN
    $(document).on('click', ".btn-detailTransaksiPelanggan", function () {
        var kdRow = $(this).attr('data-val');
        $.ajax({
            type: "POST",
            url: '<?=$base_url?>function/crud.php',
            data: {detailTransaksiPelanggan: '', kode: kdRow},
            success: function (html) {
                // alert(kdRow);
                $(".modal-content").html(html);
                $("#modalPelanggan").modal('show');
            },
            error: function () {
                $('.modal-content').html('<h3>Ajax Bermasalah !!!</h3>')
            },
        });
    });
    //HAPUS PELANGGAN
    $(document).on('click', ".btn-hapusPelanggan", function () {
        var kdRow = $(this).data('val');
        $.confirm({
            title: 'Konfirmasi Hapus Data',
            content: 'Apakah Anda Yakin Ingin Menghapus Data ini ?',
            confirmButton: 'Iya',
            cancelButton: 'Batal',
            confirmButtonClass: 'btn-info',
            cancelButtonClass: 'btn-danger',
            theme: 'black',
            autoClose: 'cancel|6000',
            keyboardEnabled: true,
            confirm: function () {
                $.ajax({
                    type: "POST",
                    url: '<?=$base_url?>function/crud.php',
                    data: {hapusPelanggan: '', kodeRow: kdRow},
                    //dataType: "json",
                    success: function (html) {
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
                        toastr.success("Data Pelanggan Berhasil Dihapus", "<?=$data_pengaturan_sistem['nama']?>");
                        $('#data_pelanggan').DataTable().ajax.reload();
                    },
                });
            },
        });
    });
    //TAMBAH DATA SUPPLIER
    $(document).on('click', "#simpan_supplier", function () {
        $("#form_tambah_supplier").submit(function (e) {
            return false;
        });
        var kode_supplier = $('#kode_supplier').val();
        var nama_supplier = $('#nama_supplier').val();
        var telpon_supplier = $('#telpon_supplier').val();
        var alamat_supplier = $('#alamat_supplier').val();

        var data = {
            simpan_supplier: '',
            kode_supplier: kode_supplier,
            nama_supplier: nama_supplier,
            telpon_supplier: telpon_supplier,
            alamat_supplier: alamat_supplier
        };
        if (kode_supplier.length > 0 && nama_supplier.length > 0 && telpon_supplier.length > 0 && alamat_supplier.length > 0) {
            $.ajax({
                type: "POST",
                url: "<?=$base_url?>function/crud.php",
                data: data,
                success: function (response) {
                    if (response == "success") {
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
                        toastr.success("Data Supplier " + nama_supplier + " Telah Berhasil Tersimpan", "<?=$data_pengaturan_sistem['nama']?>");
                        setTimeout(function () {
                            location.href = "<?=$base_url?>supplier";
                        }, 2000);
                    } else if (response == "exist") {
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
                        toastr.error("Data Supplier " + nama_supplier + " Sudah Tersedia", "<?=$data_pengaturan_sistem['nama']?>");
                    }
                },
            });
        }

    });

    //UBAH DATA SUPPLIER
    $(document).on('click', "#perbarui_supplier", function () {
        $("#form_ubah_supplier").submit(function (e) {
            return false;
        });
        var kode_supplier = $('#kode_supplier').val();
        var nama_supplier = $('#nama_supplier').val();
        var telpon_supplier = $('#telpon_supplier').val();
        var alamat_supplier = $('#alamat_supplier').val();

        var data = {
            perbarui_supplier: '',
            kode_supplier: kode_supplier,
            nama_supplier: nama_supplier,
            telpon_supplier: telpon_supplier,
            alamat_supplier: alamat_supplier
        };
        if (kode_supplier.length > 0 && nama_supplier.length > 0 && telpon_supplier.length > 0 && alamat_supplier.length > 0) {
            $.ajax({
                type: "POST",
                url: "<?=$base_url?>function/crud.php",
                data: data,
                success: function (response) {
                    if (response == "success") {
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
                        toastr.success("Data Supplier " + nama_supplier + " Telah Berhasil Dirubah", "<?=$data_pengaturan_sistem['nama']?>");
                        setTimeout(function () {
                            location.href = "<?=$base_url?>supplier";
                        }, 2000);
                    } else if (response == "exist") {
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
                        toastr.error("Data Supplier " + nama_supplier + " Sudah Tersedia", "<?=$data_pengaturan_sistem['nama']?>");
                    }
                },
            });
        }

    });

    //DETAIL SUPPLIER
    $(document).on('click', ".btn-detailTransaksiSupplier", function () {
        var kdRow = $(this).attr('data-val');
        $.ajax({
            type: "POST",
            url: '<?=$base_url?>function/crud.php',
            data: {detailTransaksiSupplier: '', kode: kdRow},
            success: function (html) {
                // alert(kdRow);
                $(".modal-content").html(html);
                $("#modalSupplier").modal('show');
            },
            error: function () {
                $('.modal-content').html('<h3>Ajax Bermasalah !!!</h3>')
            },
        });
    });
    //HAPUS SUPPLIER
    $(document).on('click', ".btn-hapusSupplier", function () {
        var kdRow = $(this).data('val');
        $.confirm({
            title: 'Konfirmasi Hapus Data',
            content: 'Apakah Anda Yakin Ingin Menghapus Data ini ?',
            confirmButton: 'Iya',
            cancelButton: 'Batal',
            confirmButtonClass: 'btn-info',
            cancelButtonClass: 'btn-danger',
            theme: 'black',
            autoClose: 'cancel|6000',
            keyboardEnabled: true,
            confirm: function () {
                $.ajax({
                    type: "POST",
                    url: '<?=$base_url?>function/crud.php',
                    data: {hapusSupplier: '', kodeRow: kdRow},
                    //dataType: "json",
                    success: function (html) {
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
                        toastr.success("Data supplier Berhasil Dihapus", "<?=$data_pengaturan_sistem['nama']?>");
                        $('#data_supplier').DataTable().ajax.reload();
                    },
                });
            },
        });
    });
    //TAMBAH DATA BARANG PEMBELIAN
    $(document).on('click', "#tambah_barang_pembelian", function () {
        $("#form_tambah_pembelian").submit(function (e) {
            return false;
        });
        var kode_pem = $('#kode_pem').val();
        var pilih_barang = $('#pilih_barang').val();
        var harga_beli = $('#harga_beli').val();
        var jumlah_beli = $('#jumlah_beli').val();

        var data = {
            tambah_barang_pembelian: '',
            kode_pem: kode_pem,
            pilih_barang: pilih_barang,
            harga_beli: harga_beli,
            jumlah_beli: jumlah_beli
        };
        if (kode_pem.length > 0 && pilih_barang.length > 0 && harga_beli.length > 0 && jumlah_beli.length > 0) {
            $.ajax({
                type: "POST",
                url: "<?=$base_url?>function/crud.php",
                data: data,
                success: function (response) {
                    if (response == "success") {
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
                        toastr.success("Data Barang Berhasil Disimpan", "<?=$data_pengaturan_sistem['nama']?>");
                    } else if (response == "exist") {
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
                        toastr.success("Data Barang Berhasil Ditambah", "<?=$data_pengaturan_sistem['nama']?>");
                    }
                    $('#data_barang_pembelian').DataTable().ajax.reload();
                },
            });
        }
    });
    //HAPUS BARANG PEMBELIAN
    $(document).on('click', ".btn-hapusBarangPembelian", function () {
        var kdRow = $(this).data('val');
        $.confirm({
            title: 'Konfirmasi Hapus Data',
            content: 'Apakah Anda Yakin Ingin Menghapus Data ini ?',
            confirmButton: 'Iya',
            cancelButton: 'Batal',
            confirmButtonClass: 'btn-info',
            cancelButtonClass: 'btn-danger',
            theme: 'black',
            autoClose: 'cancel|6000',
            keyboardEnabled: true,
            confirm: function () {
                $.ajax({
                    type: "POST",
                    url: '<?=$base_url?>function/crud.php',
                    data: {hapusBarangPembelian: '', kodeRow: kdRow},
                    //dataType: "json",
                    success: function (html) {
                        $('#data_barang_pembelian').DataTable().ajax.reload();
                    },
                });
            },
        });
    });
    //TAMBAH DATA PEMBELIAN
    $(document).on('click', "#tambah_pembelian", function () {
        $("#form_tambah_pembelian").submit(function (e) {
            return false;
        });
        var kode = $('#kode').val();
        var pilih_supplier = $('#pilih_supplier').val();
        var tanggal_pembelian = $('#tanggal_pembelian').val();

        var data = {
            tambah_pembelian: '',
            kode: kode,
            pilih_supplier: pilih_supplier,
            tanggal_pembelian: tanggal_pembelian
        };
        if (kode.length > 0 && pilih_supplier.length > 0 && tanggal_pembelian.length > 0) {
            $.ajax({
                type: "POST",
                url: "<?=$base_url?>function/crud.php",
                data: data,
                success: function (response) {
                    if (response == "success") {
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
                        toastr.success("Data Pembelian " + kode + " Telah Berhasil Tersimpan", "<?=$data_pengaturan_sistem['nama']?>");
                    } else if (response == "exist") {
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
                        toastr.success("Data Pembelian " + kode + " Telah Berhasil Dirubah", "<?=$data_pengaturan_sistem['nama']?>");
                    }
                    window.setTimeout(function () {
                        window.location = "<?=$base_url?>pembelian";
                    }, 500);
                },
            });
        }

    });
    //DETAIL TRANSAKSI PEMBELIAN
    $(document).on('click', ".btn-detailTransaksiPembelian", function () {
        var kdRow = $(this).attr('data-val');
        $.ajax({
            type: "POST",
            url: '<?=$base_url?>function/crud.php',
            data: {detailTransaksiPembelian: '', kode: kdRow},
            success: function (html) {
                $(".modal-content").html(html);
                $("#modalTransaksiPembelian").modal('show');
            },
            error: function () {
                $('.modal-content').html('<h3>Ajax Bermasalah !!!</h3>')
            },
        });
    });
    //HAPUS PEMBELIAN
    $(document).on('click', ".btn-hapusPembelian", function () {
        var kdRow = $(this).data('val');
        $.confirm({
            title: 'Konfirmasi Hapus Data',
            content: 'Apakah Anda Yakin Ingin Menghapus Data ini ?',
            confirmButton: 'Iya',
            cancelButton: 'Batal',
            confirmButtonClass: 'btn-info',
            cancelButtonClass: 'btn-danger',
            theme: 'black',
            autoClose: 'cancel|6000',
            keyboardEnabled: true,
            confirm: function () {
                $.ajax({
                    type: "POST",
                    url: '<?=$base_url?>function/crud.php',
                    data: {hapusPembelian: '', kodeRow: kdRow},
                    //dataType: "json",
                    success: function (html) {
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
                        toastr.success("Data Pembelian " + kdRow + " Telah Berhasil Dihapus", "<?=$data_pengaturan_sistem['nama']?>");
                        $('#data_pembelian').DataTable().ajax.reload();
                    },
                });
            },
        });
    });
    //TAMBAH DATA BARANG PENJUALAN
    $(document).on('click', "#tambah_barang_penjualan", function () {
        $("#form_tambah_penjualan").submit(function (e) {
            return false;
        });
        var kode_pem = $('#kode_pem').val();
        var pilih_barang = $('#pilih_barang').val();
        var harga_jual = $('#harga_jual').val();
        var jumlah_jual = $('#jumlah_jual').val();

        var data = {
            tambah_barang_penjualan: '',
            kode_pem: kode_pem,
            pilih_barang: pilih_barang,
            harga_jual: harga_jual,
            jumlah_jual: jumlah_jual
        };
        if (kode_pem.length > 0 && pilih_barang.length > 0 && harga_jual.length > 0 && jumlah_jual.length > 0) {
            $.ajax({
                type: "POST",
                url: "<?=$base_url?>function/crud.php",
                data: data,
                success: function (response) {
                    if (response == "success") {
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
                        toastr.success("Data Barang Berhasil Disimpan", "<?=$data_pengaturan_sistem['nama']?>");
                    } else if (response == "exist") {
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
                        toastr.success("Data Barang Berhasil Ditambah", "<?=$data_pengaturan_sistem['nama']?>");
                    } else if (response == "stok") {
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
                        toastr.error("Stok Barang Tidak Cukup", "<?=$data_pengaturan_sistem['nama']?>");
                    }
                    $('#data_barang_penjualan').DataTable().ajax.reload();
                    $('#pilih_barang option:gt(0)').remove();
                    $.ajax({
                        type: "POST",
                        cache: false,
                        data: "select=" + pilih_barang,
                        url: "<?=$base_url?>ajax/barang.php",
                        success: function (result) {
                            $('#pilih_barang').append(result);
                        }
                    });
                },
            });
        }
    });
    //HAPUS BARANG PENJUALAN
    $(document).on('click', ".btn-hapusBarangPenjualan", function () {
        var kdRow = $(this).data('val');
        var barang = $('#pilih_barang').val();
        $.confirm({
            title: 'Konfirmasi Hapus Data',
            content: 'Apakah Anda Yakin Ingin Menghapus Data ini ?',
            confirmButton: 'Iya',
            cancelButton: 'Batal',
            confirmButtonClass: 'btn-info',
            cancelButtonClass: 'btn-danger',
            theme: 'black',
            autoClose: 'cancel|6000',
            keyboardEnabled: true,
            confirm: function () {
                $.ajax({
                    type: "POST",
                    url: '<?=$base_url?>function/crud.php',
                    data: {hapusBarangPenjualan: '', kodeRow: kdRow},
                    //dataType: "json",
                    success: function (html) {
                        $('#data_barang_penjualan').DataTable().ajax.reload();
                        $('#pilih_barang option:gt(0)').remove();
                        $.ajax({
                            type: "POST",
                            cache: false,
                            data: "select=" + barang,
                            url: "<?=$base_url?>ajax/barang.php",
                            success: function (result) {
                                $('#pilih_barang').append(result);
                            }
                        });
                    },
                });
            },
        });
    });
    //TAMBAH DATA PENJUALAN
    $(document).on('click', "#tambah_penjualan", function () {
        $("#form_tambah_penjualan").submit(function (e) {
            return false;
        });
        var kode = $('#kode').val();
        var pilih_pelanggan = $('#pilih_pelanggan').val();
        var tanggal_transaksi = $('#tanggal_transaksi').val();
        var jumlah_bayar = $('#jumlah_bayar').val();

        var data = {
            tambah_penjualan: '',
            kode: kode,
            pilih_pelanggan: pilih_pelanggan,
            tanggal_transaksi: tanggal_transaksi,
            jumlah_bayar: jumlah_bayar
        };
        if (kode.length > 0 && pilih_pelanggan.length > 0 && tanggal_transaksi.length > 0 && jumlah_bayar.length > 0) {
            $.ajax({
                type: "POST",
                url: "<?=$base_url?>function/crud.php",
                data: data,
                success: function (response) {
                    if (response == "success") {
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
                        toastr.success("Data Penjualan " + kode + " Telah Berhasil Tersimpan", "<?=$data_pengaturan_sistem['nama']?>");
                        window.setTimeout(function () {
                            window.location = "<?=$base_url?>penjualan";
                        }, 500);
                    } else if (response == "exist") {
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
                        toastr.success("Data Penjualan " + kode + " Telah Berhasil Dirubah", "<?=$data_pengaturan_sistem['nama']?>");
                        window.setTimeout(function () {
                            window.location = "<?=$base_url?>penjualan";
                        }, 500);
                    }
                },
            });
        }

    });
    //DETAIL TRANSAKSI PENJUALAN
    $(document).on('click', ".btn-detailTransaksiPenjualan", function () {
        var kdRow = $(this).attr('data-val');
        $.ajax({
            type: "POST",
            url: '<?=$base_url?>function/crud.php',
            data: {detailTransaksiPenjualan: '', kode: kdRow},
            success: function (html) {
                $(".modal-content").html(html);
                $("#modalTransaksiPenjualan").modal('show');
            },
            error: function () {
                $('.modal-content').html('<h3>Ajax Bermasalah !!!</h3>')
            },
        });
    });
    //HAPUS PENJUALAN
    $(document).on('click', ".btn-hapusPenjualan", function () {
        var kdRow = $(this).data('val');
        $.confirm({
            title: 'Konfirmasi Hapus Data',
            content: 'Apakah Anda Yakin Ingin Menghapus Data ini ?',
            confirmButton: 'Iya',
            cancelButton: 'Batal',
            confirmButtonClass: 'btn-info',
            cancelButtonClass: 'btn-danger',
            theme: 'black',
            autoClose: 'cancel|6000',
            keyboardEnabled: true,
            confirm: function () {
                $.ajax({
                    type: "POST",
                    url: '<?=$base_url?>function/crud.php',
                    data: {hapusPenjualan: '', kodeRow: kdRow},
                    //dataType: "json",
                    success: function (html) {
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
                        toastr.success("Data Penjualan " + kdRow + " Telah Berhasil Dihapus", "<?=$data_pengaturan_sistem['nama']?>");
                        $('#data_penjualan').DataTable().ajax.reload();
                    },
                });
            },
        });
    });
    $(document).on('click', "#btn-hapuskonten", function () {
        var data = $(this).data("val");
        $.ajax({
            type: 'POST',
            url: "<?=$base_url?>function/crud.php",
            data: {
                id: data,
                hapuskonten: "asd"
            },
            success: function (res) {
                if (res) {
                    alert(res);
                } else {
                    $('#data_konten').DataTable().ajax.reload();
                }
            }
        })
    })
    $(document).on('click', "#btn-hapussosmed", function () {
        var data = $(this).data("val");
        $.ajax({
            type: 'POST',
            url: "<?=$base_url?>function/crud.php",
            data: {
                id: data,
                hapus_sosmed: "asd"
            },
            success: function (res) {
                if (res) {
                    alert(res);
                } else {
                    $('#data_sosmed').DataTable().ajax.reload();
                }
            }
        })
    });
    $(document).on('click', "#btn-hapusslider", function () {
        var data = $(this).data("val");
        $.ajax({
            type: 'POST',
            url: "<?=$base_url?>function/crud.php",
            data: {
                id: data,
                hapus_slider: "asd"
            },
            success: function (res) {
                if (res) {
                    alert(res);
                } else {
                    $('#data_sosmed').DataTable().ajax.reload();
                }
            }
        })
    });
    $(document).on('click', "#simpan_user", function () {
        $("#form_tambah_user").submit(function (e) {
            return false;
        });
        var nama = $('#nama').val();
        var email = $('#email').val();
        var username = $('#username').val();
        var password = $('#password').val();
        var hak_akses = $('#hak_akses').val();

        var data = {
            simpan_user: '',
            nama: nama,
            email: email,
            username: username,
            password: password,
            hak_akses: hak_akses
        };
        if (nama.length > 0) {
            $.ajax({
                type: "POST",
                url: "<?=$base_url?>function/crud.php",
                data: data,
                success: function (response) {
                    if (response == "success") {
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
                        toastr.success("Data Pengguna " + nama + " Telah Berhasil Tersimpan", "<?=$data_pengaturan_sistem['nama']?>");
                        setTimeout(function () {
                            location.href = "<?=$base_url?>user";
                        }, 2000);
                    } else if (response == "exist") {
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
                        toastr.error("Data Pengguna " + nama + " Sudah Tersedia", "<?=$data_pengaturan_sistem['nama']?>");
                    }
                },
            });
        }
    });
	$(document).on('click', "#perbarui_user", function () {
        $("#form_ubah_user").submit(function (e) {
            return false;
        });
        var id = $('#id').val();
        var nama = $('#nama').val();
        var email = $('#email').val();
        var username = $('#username').val();
        var password = $('#password').val();
        var hak_akses = $('#hak_akses').val();

        var data = {
            perbarui_user: '',
            id: id,
            nama: nama,
            email: email,
            username: username,
            password: password,
            hak_akses: hak_akses
        };
        if (nama.length > 0) {
            $.ajax({
                type: "POST",
                url: "<?=$base_url?>function/crud.php",
                data: data,
                success: function (response) {
                    if (response == "success") {
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
                        toastr.success("Data Pengguna " + nama + " Telah Berhasil Tersimpan", "<?=$data_pengaturan_sistem['nama']?>");
                        setTimeout(function () {
                            location.href = "<?=$base_url?>user";
                        }, 2000);
                    } else if (response == "exist") {
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
                        toastr.error("Data Pengguna " + nama + " Sudah Tersedia", "<?=$data_pengaturan_sistem['nama']?>");
                    }
                },
            });
        }
    });
	$(document).on('click', ".btn-hapusUser", function () {
        var kdRow = $(this).data('val');
        $.confirm({
            title: 'Konfirmasi Hapus Data',
            content: 'Apakah Anda Yakin Ingin Menghapus Data ini ?',
            confirmButton: 'Iya',
            cancelButton: 'Batal',
            confirmButtonClass: 'btn-info',
            cancelButtonClass: 'btn-danger',
            theme: 'black',
            autoClose: 'cancel|6000',
            keyboardEnabled: true,
            confirm: function () {
                $.ajax({
                    type: "POST",
                    url: '<?=$base_url?>function/crud.php',
                    data: {hapusUser: '', kodeRow: kdRow},
                    //dataType: "json",
                    success: function (html) {
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
                        toastr.success("Data Pengguna Berhasil Terhapus", "<?=$data_pengaturan_sistem['nama']?>");
                        $('#table_user').DataTable().ajax.reload();
                    },
                });
            },
        });
    });

    $(document).on('click', ".btn-hapusslider", function () {
        var data = $(this).data('val');
        $.ajax({
            type: 'POST',
            data: {
                id: data,
                hapus_slider: 'asd'
            },
            url: "<?=$base_url?>function/crud.php",
            success: function (res) {
                if (res) {
                    alert(res);
                } else {
                    $('#data_slider').DataTable().ajax.reload();
                }
            }
        })
    });
    $(document).on('click', "#btn-hapustestimonial", function () {
        var data = $(this).data('val');
        $.ajax({
            type: 'POST',
            data: {
                id: data,
                hapus_testimonial: 'asd'
            },
            url: "<?=$base_url?>function/crud.php",
            success: function (res) {
                if (res) {
                    alert(res);
                } else {
                    $('#data_testimonial').DataTable().ajax.reload();
                }
            }
        })
    });
    $(document).on('click', "#btn-howtoorder", function () {
        var data = $(this).data('val');
        $.ajax({
            type: 'POST',
            data: {
                id: data,
                hapus_howtoorder: 'asd'
            },
            url: "<?=$base_url?>function/crud.php",
            success: function (res) {
                if (res) {
                    alert(res);
                } else {
                    $('#data_how-to-order').DataTable().ajax.reload();
                }
            }
        })
    });
    $(document).on('click', ".order", function () {
        var status = $(this).data("status");
        var data = $(this).data("val");
        var buat;
        switch (status) {
            case "ok":
                buat = "terima";
                break;
            case "cancel":
                buat = "tolak";
                break;
        }
        $.ajax({
            type: 'POST',
            url: "<?=$base_url?>function/crud.php",
            data: {
                data: data,
                buat: buat,
                order: "asd"
            },
            success: function (res) {
                if (res) {
                    alert(res);
                } else {
                    $("#data_order").DataTable().ajax.reload();
                }
            }
        });
    });
    $(document).ready(function () {
        $('#form_aplikasi').submit(function (e) {
            e.preventDefault();
            var data = new FormData(this);
            data.append("update_aplikasi", "asd");
            $.ajax({
                type: 'POST',
                url: "<?=$base_url?>function/crud.php",
                data: data,
                enctype: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                success: function (res) {
                    if (res) {
                        alert(res);
                    } else {
                        location.reload();
                    }
                }
            });
        });
        $('#form_tambah_konten').submit(function (e) {
            $(this).validate();
            e.preventDefault();
            var data = $(this).serialize();
            if ($("input:empty").length === 0) {
                $.ajax({
                    type: 'POST',
                    url: "<?=$base_url?>function/crud.php",
                    data: data + "&simpan_konten=asd",
                    success: function (res) {
                        if (res) {
                            alert(res);
                        } else {
                            location.href = "<?=$base_url?>konten";
                        }
                    }
                })
            }
        });
        $("#form_ubah_slider").submit(function (e) {
            e.preventDefault();
            var data = new FormData(this);
            data.append("ubah_slider", "as");
            $.ajax({
                type: 'POST',
                url: "<?=$base_url?>function/crud.php",
                data: data,
                enctype: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                success: function (res) {
                    if (res) {
                        alert(res);
                    } else {
                        location.href = "<?=$base_url?>slider";
                    }
                }
            });
        });
        $('#form_ubah_konten').submit(function (e) {
            e.preventDefault();
            var data = $(this).serialize();
            if ($("input:empty").length === 0) {
                $.ajax({
                    type: 'POST',
                    url: "<?=$base_url?>function/crud.php",
                    data: data + "&ubah_konten=asd",
                    success: function (res) {
                        if (res) {
                            alert(res);
                        } else {
                            location.href = "<?=$base_url?>konten";
                        }
                    }
                })
            }
        });
        $("#form_perusahaan").submit(function (e) {
            e.preventDefault();
            var data = new FormData(this);
            data.append("perusahaan", "as");
            $.ajax({
                type: 'POST',
                url: "<?=$base_url?>function/crud.php",
                data: data,
                enctype: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                success: function (res) {
                    if (res) {
                        alert(res);
                    } else {
                        location.reload();
                    }
                }
            });
        });
        $("#form_tambah_sosmed").submit(function (e) {
            e.preventDefault();
            var data = $(this).serialize() + "&tambah_sosmed=asd";
            $.ajax({
                type: 'POST',
                url: "<?=$base_url?>function/crud.php",
                data: data,
                success: function (res) {
                    if (res) {
                        alert(res);
                    } else {
                        location.href = "<?=$base_url?>sosial-media";
                    }
                }
            })
        });
        $("#form_ubah_sosmed").submit(function (e) {
            e.preventDefault();
            var data = $(this).serialize() + "&ubah_sosmed=asd";
            $.ajax({
                type: 'POST',
                url: "<?=$base_url?>function/crud.php",
                data: data,
                success: function (res) {
                    if (res) {
                        alert(res);
                    } else {
                        location.href = "<?=$base_url?>sosial-media";
                    }
                }
            })
        });
        $("#form_tambah_slider").submit(function (e) {
            e.preventDefault();
            var data = new FormData(this);
            data.append("tambah_slider", "as");
            $.ajax({
                type: 'POST',
                url: "<?=$base_url?>function/crud.php",
                data: data,
                enctype: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                success: function (res) {
                    if (res) {
                        alert(res);
                    } else {
                        location.href = "<?=$base_url?>slider";
                    }
                }
            });
        });
        $('#form_tambah_barang').submit(function (e) {
            e.preventDefault();
            var data = new FormData(this);
            data.append("simpan_barang", "");
            $.ajax({
                type: "POST",
                url: "<?=$base_url?>function/crud.php",
                data: data,
                enctype: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response) {
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
                        toastr.error(response, "<?=$data_pengaturan_sistem['nama']?>");
                    } else {
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
                        toastr.success("Data Barang Telah Berhasil Tersimpan", "<?=$data_pengaturan_sistem['nama']?>");
                        setTimeout(function () {
                            location.href = "<?=$base_url?>barang";
                        }, 2000);
                    }
                },
            });
        });
        $('#form_ubah_barang').submit(function (e) {
                e.preventDefault();
                var data = new FormData(this);
                data.append("perbarui_barang","");
                $.ajax({
                    type: "POST",
                    url: "<?=$base_url?>function/crud.php",
                    data: data,
                    enctype: 'multipart/form-data',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response) {
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
                            toastr.error(response, "<?=$data_pengaturan_sistem['nama']?>");
                        } else {
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
                            toastr.success("Data Barang Telah Berhasil Diubah", "<?=$data_pengaturan_sistem['nama']?>");
                            setTimeout(function () {
                                location.href = "<?=$base_url?>barang";
                            }, 2000);
                        }
                    },
                });
            });
        $('#form_tambah_testimonial').submit(function (e) {
            e.preventDefault();
            var data = $(this).serialize() + "&tambah_testimonial=asd";
            $.ajax({
                type: 'POST',
                url: "<?=$base_url?>function/crud.php",
                data: data,
                success: function(res){
                    if(res){
                        alert(res);
                    }else{
                        location.href = "<?=$base_url?>testimonial";
                    }
                }
            })
        });
        $('#form_ubah_testimonial').submit(function (e) {
            e.preventDefault();
            var data = $(this).serialize() + "&perbarui_testimonial=asd";
            $.ajax({
                type: 'POST',
                url: "<?=$base_url?>function/crud.php",
                data: data,
                success: function(res){
                    if(res){
                        alert(res);
                    }else{
                        location.href = "<?=$base_url?>testimonial";
                    }
                }
            })
        });
        $('#form_tambah_howtoorder').submit(function (e) {
            e.preventDefault();
            var data = $(this).serialize() + "&tambah_howtoorder=asd";
            $.ajax({
                type: 'POST',
                url: "<?=$base_url?>function/crud.php",
                data: data,
                success: function(res){
                    if(res){
                        alert(res);
                    }else{
                        location.href = "<?=$base_url?>how-to-order";
                    }
                }
            })
        });
        $('#form_ubah_howtoorder').submit(function (e) {
            e.preventDefault();
            var data = $(this).serialize() + "&perbarui_howtoorder=asd";
            $.ajax({
                type: 'POST',
                url: "<?=$base_url?>function/crud.php",
                data: data,
                success: function(res){
                    if(res){
                        alert(res);
                    }else{
                        location.href = "<?=$base_url?>how-to-order";
                    }
                }
            })
        });
    });
</script>