<?
session_start();
require_once('../class/connection.php');
error_reporting(0);
$token = $_SESSION['token_inventory'];
$date = date('Y-m-d');
//KATEGORI BARANG
if(isset($_POST['simpan_kategori'])){
	$nama_kategori = $_POST['nama_kategori'];
	$query_cek = mysqli_query($inventory,"SELECT * FROM item_type WHERE item_type = '$nama_kategori'")or die(mysqli_error($inventory));
	$data_cek = mysqli_num_rows($query_cek);
	if($data_cek>0){
		echo "exist";
	}else{
		$insert = mysqli_query($inventory,"INSERT INTO item_type SET item_type = '$nama_kategori'")or die(mysqli_error($inventory));
		echo "success";
	}
}
if(isset($_POST['perbarui_kategori'])){
	$id_kategori = $_POST['id_kategori'];
	$nama_kategori = $_POST['nama_kategori'];
	$query_cek = mysqli_query($inventory,"SELECT * FROM item_type WHERE item_type = '$nama_kategori'")or die(mysqli_error($inventory));
	$data_cek = mysqli_num_rows($query_cek);
	if($data_cek>0){
		echo "exist";
	}else{
		$update = mysqli_query($inventory,"UPDATE item_type SET item_type = '$nama_kategori' WHERE item_type_id = '$id_kategori'")or die(mysqli_error($inventory));
		echo "success";
	}
}
if(isset($_POST['detailKategori'])){
    $id=$_POST['kode'];
	$details = mysqli_query($inventory,"SELECT * FROM item_type WHERE item_type_id = '$id'") or die(mysqli_error($inventory));
	$datanya = mysqli_fetch_array($details);
    ?>
    <div class="modal-header">
        <h4 class="modal-title">List Barang Kategori <?=$datanya['item_type']?></h4>
    </div>
    <div class="modal-body">
        <table class="table borderless">
            <thead>
				<tr>
                    <td><b>Kode Barang</b></td>
                    <td><b>Nama Barang</b></td>
                    <td><b>Harga Barang</b></td>
                    <td><b>Stok Barang</b></td>
                </tr>
            </thead>
			<tbody>
				<?
				$detail = mysqli_query($inventory,"SELECT * FROM v_item WHERE item_category = '$id'") or die(mysqli_error($inventory));
				while($data = mysqli_fetch_array($detail)){
				?>
				<tr>
                    <td><?=$data['item_code'];  ?></td>
                    <td><?=$data['item_name'];  ?></td>
                    <td>Rp. <?=number_format($data['item_price']);?></td>
                    <td><?=number_format($data['item_stock']);?> Unit</td>
                </tr>
				<?
				}
				?>
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
<?
}
if(isset($_POST['hapusKategoriBarang'])){
	$id_kategori = $_POST['kodeRow'];
	$delete = mysqli_query($inventory,"DELETE FROM item_type WHERE item_type_id = '$id_kategori'")or die(mysqli_error($inventory));
}

//BARANG
if(isset($_POST['simpan_barang'])){
	$kode_barang = $_POST['kode_barang'];
	$nama_barang = $_POST['nama_barang'];
	$pilih_kategori_barang = $_POST['pilih_kategori_barang'];
	$harga_barang = $_POST['harga_brg'];
	$stok_brg = $_POST['stok_brg'];
	$query_cek = mysqli_query($inventory,"SELECT * FROM item WHERE item_name = '$nama_barang'")or die(mysqli_error($inventory));
	$data_cek = mysqli_num_rows($query_cek);
	if($data_cek>0){
		echo "Data Barang Telah Tersedia";
	}else{
        $logo = $_FILES['gambar_produk']['name'];
        $target_dir = "../../assets/produk/";
        $target_file = $target_dir . basename($_FILES["gambar_produk"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $extensions_arr = array("jpg", "jpeg", "png", "gif");
        if (in_array($imageFileType, $extensions_arr)) {
            move_uploaded_file($_FILES['gambar_produk']['tmp_name'], $target_dir . $logo);
            mysqli_query($inventory, "
            INSERT INTO 
                item 
            SET 
                item_code = '$kode_barang', 
                item_name = '$nama_barang', 
                item_category = '$pilih_kategori_barang', 
                item_price = '$harga_barang', 
                item_stock = '$stok_brg',
                item_image = '$logo'
                ") or die(mysqli_error($inventory));
        }else{
            echo "Hanya menerima ekstensi ". implode(",",$extensions_arr)." ekstensi anda : ".$imageFileType;
        }
	}
}
if(isset($_POST['perbarui_barang'])){
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $pilih_kategori_barang = $_POST['pilih_kategori_barang'];
    $harga_barang = $_POST['harga_brg'];
    $stok_brg = $_POST['stok_brg'];
    $logo = $_FILES['gambar_produk']['name'];
    if(empty($logo)){
        mysqli_query($inventory, "
            update
                item 
            SET  
                item_name = '$nama_barang', 
                item_category = '$pilih_kategori_barang', 
                item_price = '$harga_barang', 
                item_stock = '$stok_brg'
            where
                item_code = '$kode_barang'
        ") or die(mysqli_error($inventory));
    }else {
        $target_dir = "../../assets/produk/";
        $target_file = $target_dir . basename($_FILES["gambar_produk"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $extensions_arr = array("jpg", "jpeg", "png", "gif");
        if (in_array($imageFileType, $extensions_arr)) {
            move_uploaded_file($_FILES['gambar_produk']['tmp_name'], $target_dir . $logo);
            mysqli_query($inventory, "
            update
                item 
            SET  
                item_name = '$nama_barang', 
                item_category = '$pilih_kategori_barang', 
                item_price = '$harga_barang', 
                item_stock = '$stok_brg',
                item_image = '$logo'
            where
                item_code = '$kode_barang'
            ") or die(mysqli_error($inventory));
        } else {
            echo "Hanya menerima ekstensi " . implode(",", $extensions_arr) . " ekstensi anda : " . $imageFileType;
        }
    }
}
if(isset($_POST['detailBarang'])){
    $id=$_POST['kode'];
	$details = mysqli_query($inventory,"SELECT * FROM item_type WHERE item_type_id = '$id'") or die(mysqli_error($inventory));
	$datanya = mysqli_fetch_array($details);
	$detail = mysqli_query($inventory,"SELECT * FROM v_item WHERE item_category = '$id'") or die(mysqli_error($inventory));
    ?>
    <div class="modal-header">
        <h4 class="modal-title">List Barang Kategori <?=$datanya['item_type']?></h4>
    </div>
    <div class="modal-body">
        <table class="table borderless">
            <tbody>
				<tr>
                    <td><b>Kode Barang</b></td>
                    <td><b>Nama Barang</b></td>
                    <td><b>Harga Barang</b></td>
                    <td><b>Stok Barang</b></td>
                </tr>
				<?
				while($data = mysqli_fetch_array($detail)){
				?>
				<tr>
                    <td><?=$data['item_code'];  ?></td>
                    <td><?=$data['item_name'];  ?></td>
                    <td><?=$data['item_price'];  ?></td>
                    <td><?=$data['item_stock'];  ?></td>
                </tr>
				<?
				}
				?>
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
<?
}
if(isset($_POST['hapusBarang'])){
	$id_barang = $_POST['kodeRow'];
	$delete = mysqli_query($inventory,"DELETE FROM item WHERE item_code = '$id_barang'")or die(mysqli_error($inventory));
}
//PELANGGAN
if(isset($_POST['simpan_pelanggan'])){
	$kode_pelanggan = $_POST['kode_pelanggan'];
	$nama_pelanggan = $_POST['nama_pelanggan'];
	$telpon_pelanggan = $_POST['telpon_pelanggan'];
	$alamat_pelanggan = $_POST['alamat_pelanggan'];
	$query_cek = mysqli_query($inventory,"SELECT * FROM customer WHERE customer_name = '$nama_pelanggan'")or die(mysqli_error($inventory));
	$data_cek = mysqli_num_rows($query_cek);
	if($data_cek>0){
		echo "exist";
	}else{
		$insert = mysqli_query($inventory,"INSERT INTO customer SET customer_code = '$kode_pelanggan', customer_name = '$nama_pelanggan', customer_address = '$alamat_pelanggan', customer_phone = '$telpon_pelanggan'")or die(mysqli_error($inventory));
		echo "success";
	}
}
if(isset($_POST['perbarui_pelanggan'])){
	$kode_pelanggan = $_POST['kode_pelanggan'];
	$nama_pelanggan = $_POST['nama_pelanggan'];
	$telpon_pelanggan = $_POST['telpon_pelanggan'];
	$alamat_pelanggan = $_POST['alamat_pelanggan'];
	$query_cek = mysqli_query($inventory,"SELECT * FROM customer WHERE customer_name = '$nama_pelanggan'")or die(mysqli_error($inventory));
	$data_cek = mysqli_num_rows($query_cek);
	if($data_cek>0){
		echo "exist";
	}else{
		$update = mysqli_query($inventory,"UPDATE customer SET customer_name = '$nama_pelanggan', customer_address = '$alamat_pelanggan', customer_phone = '$telpon_pelanggan' WHERE customer_code = '$kode_pelanggan'")or die(mysqli_error($inventory));
		echo "success";
	}
}
if(isset($_POST['detailTransaksiPelanggan'])){
    $id=$_POST['kode'];
    ?>
    <div class="modal-header">
        <h4 class="modal-title">List Transaksi</h4>
    </div>
    <div class="modal-body">
		<table class="table borderless">
            <tbody>
				<tr>
                    <td><b>Nama Barang</b></td>
                    <td><b>Harga Jual</b></td>
                    <td><b>Jumlah Barang</b></td>
                    <td><b>Sub Total</b></td>
                </tr>
				<?
				$detil = mysqli_query($inventory,"SELECT * FROM v_sale WHERE sale_customer = '$id' GROUP BY sale_invoice") or die(mysqli_error($inventory));
				$total = 0;
				while($data_details = mysqli_fetch_array($detil)){
					$ids = $data_details['sale_invoice'];
					$detail = mysqli_query($inventory,"SELECT * FROM v_sale_detail WHERE sale_invoice = '$ids'") or die(mysqli_error($inventory));
					while($data = mysqli_fetch_array($detail)){
					$sub_total = $data['sale_price'] * $data['sale_quantity'];
					$total = $total + $sub_total;
				?>
				<tr>
                    <td><?=$data['item_name'];  ?></td>
                    <td>Rp. <?=number_format($data['sale_price']);?></td>
                    <td><?=number_format($data['sale_quantity']);?> Unit</td>
                    <td>Rp. <?=number_format($sub_total);?></td>
                </tr>
				<?
					}
				}
				?>
				<tr>
                    <td>Total</td>
                    <td></td>
                    <td></td>
                    <td>Rp. <?=number_format($total);?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
<?
}
if(isset($_POST['hapusPelanggan'])){
	$id_barang = $_POST['kodeRow'];
	$delete = mysqli_query($inventory,"DELETE FROM customer WHERE customer_code = '$id_barang'")or die(mysqli_error($inventory));
}
//SUPPLIER
if(isset($_POST['simpan_supplier'])){
	$kode_supplier = $_POST['kode_supplier'];
	$nama_supplier = $_POST['nama_supplier'];
	$telpon_supplier = $_POST['telpon_supplier'];
	$alamat_supplier = $_POST['alamat_supplier'];
	$query_cek = mysqli_query($inventory,"SELECT * FROM supplier WHERE supplier_name = '$nama_supplier'")or die(mysqli_error($inventory));
	$data_cek = mysqli_num_rows($query_cek);
	if($data_cek>0){
		echo "exist";
	}else{
		$insert = mysqli_query($inventory,"INSERT INTO supplier SET supplier_code = '$kode_supplier', supplier_name = '$nama_supplier', supplier_address = '$alamat_supplier', supplier_phone = '$telpon_supplier'")or die(mysqli_error($inventory));
		echo "success";
	}
}
if(isset($_POST['perbarui_supplier'])){
	$kode_supplier = $_POST['kode_supplier'];
	$nama_supplier = $_POST['nama_supplier'];
	$telpon_supplier = $_POST['telpon_supplier'];
	$alamat_supplier = $_POST['alamat_supplier'];
	$query_cek = mysqli_query($inventory,"SELECT * FROM supplier WHERE supplier_name = '$nama_supplier'")or die(mysqli_error($inventory));
	$data_cek = mysqli_num_rows($query_cek);
	if($data_cek>0){
		echo "exist";
	}else{
		$update = mysqli_query($inventory,"UPDATE supplier SET supplier_name = '$nama_supplier', supplier_address = '$alamat_supplier', supplier_phone = '$telpon_supplier' WHERE supplier_code = '$kode_supplier'")or die(mysqli_error($inventory));
		echo "success";
	}
}
if(isset($_POST['detailTransaksiSupplier'])){
    $id=$_POST['kode'];
    ?>
    <div class="modal-header">
        <h4 class="modal-title">List Transaksi</h4>
    </div>
    <div class="modal-body">
		<table class="table borderless">
            <tbody>
				<tr>
                    <td><b>Nama Barang</b></td>
                    <td><b>Harga Beli</b></td>
                    <td><b>Jumlah Barang</b></td>
                    <td><b>Sub Total</b></td>
                </tr>
				<?
				$detil = mysqli_query($inventory,"SELECT * FROM v_buy WHERE buy_supplier = '$id' GROUP BY buy_invoice") or die(mysqli_error($inventory));
				$total = 0;
				while($data_details = mysqli_fetch_array($detil)){
					$ids = $data_details['buy_invoice'];
					$detail = mysqli_query($inventory,"SELECT * FROM v_detail_buy WHERE buy_invoice = '$ids'") or die(mysqli_error($inventory));
					while($data = mysqli_fetch_array($detail)){
					$sub_total = $data['buy_price'] * $data['buy_quantity'];
					$total = $total + $sub_total;
				?>
				<tr>
                    <td><?=$data['item_name'];  ?></td>
                    <td>Rp. <?=number_format($data['buy_price']);?></td>
                    <td><?=number_format($data['buy_quantity']);?> Unit</td>
                    <td>Rp. <?=number_format($sub_total);?></td>
                </tr>
				<?
					}
				}
				?>
				<tr>
                    <td>Total</td>
                    <td></td>
                    <td></td>
                    <td>Rp. <?=number_format($total);?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
<?
}
if(isset($_POST['hapusSupplier'])){
	$id_barang = $_POST['kodeRow'];
	$delete = mysqli_query($inventory,"DELETE FROM supplier WHERE supplier_code = '$id_barang'")or die(mysqli_error($inventory));
}
//PEMBELIAN
if(isset($_POST['tambah_barang_pembelian'])){
	$kode_pem = $_POST['kode_pem'];
	$pilih_barang = $_POST['pilih_barang'];
	$harga_beli = $_POST['harga_beli'];
	$jumlah_beli = $_POST['jumlah_beli'];
	$query_cek = mysqli_query($inventory,"SELECT * FROM buy_detail WHERE buy_invoice = '$kode_pem' AND buy_item = '$pilih_barang'")or die(mysqli_error($inventory));
	$data_cek = mysqli_num_rows($query_cek);
	if($data_cek>0){
		echo "exist";
		$updates = mysqli_query($inventory,"UPDATE item SET item_price='$harga_beli', item_stock = item_stock+$jumlah_beli WHERE item_code = '$pilih_barang'")or die(mysqli_error($inventory));
		$update = mysqli_query($inventory,"UPDATE buy_detail SET buy_price='$harga_beli', buy_quantity = buy_quantity+$jumlah_beli WHERE buy_invoice = '$kode_pem' AND buy_item = '$pilih_barang'")or die(mysqli_error($inventory));
	}else{
		echo "success";
		$updates = mysqli_query($inventory,"UPDATE item SET item_price='$harga_beli', item_stock = item_stock+$jumlah_beli WHERE item_code = '$pilih_barang'")or die(mysqli_error($inventory));
		$insert = mysqli_query($inventory,"INSERT INTO buy_detail SET buy_invoice = '$kode_pem', buy_item = '$pilih_barang', buy_price = '$harga_beli', buy_quantity = '$jumlah_beli'")or die(mysqli_error($inventory));
	}
}
if(isset($_POST['hapusBarangPembelian'])){
	$id_barang = $_POST['kodeRow'];
	$sql = mysqli_query($inventory,"SELECT * FROM buy_detail WHERE buy_detail_id = '$id_barang'");
	$data = mysqli_fetch_array($sql);
	$barang = $data['buy_item'];
	$jumlah = $data['buy_quantity'];
	$updates = mysqli_query($inventory,"UPDATE item SET item_stock = item_stock-$jumlah WHERE item_code = '$barang'")or die(mysqli_error($inventory));
	$delete = mysqli_query($inventory,"DELETE FROM buy_detail WHERE buy_detail_id = '$id_barang'")or die(mysqli_error($inventory));
}
if(isset($_POST['tambah_pembelian'])){
	$kode = $_POST['kode'];
	$pilih_supplier = $_POST['pilih_supplier'];
	$tanggal_pembelian = $_POST['tanggal_pembelian'];
	$query_cek = mysqli_query($inventory,"SELECT * FROM buy WHERE buy_invoice = '$kode'")or die(mysqli_error($inventory));
	$data_cek = mysqli_num_rows($query_cek);
	
	$query_detail_pembelian = mysqli_query($inventory,"SELECT * FROM buy_detail WHERE buy_invoice = '$kode'");
	$total = 0;
	while($data_detail_pembelian = mysqli_fetch_array($query_detail_pembelian)){
		$kode_item = $data_detail_pembelian['buy_item'];
		$harga_item = $data_detail_pembelian['buy_price'];
		$jumlah_item = $data_detail_pembelian['buy_quantity'];
		$sub_total = $harga_item * $jumlah_item;
		$total = $total + $sub_total;
	}
	if($data_cek>0){
		echo "exist";
		$insert = mysqli_query($inventory,"UPDATE buy SET buy_supplier = '$pilih_supplier', buy_date = '$tanggal_pembelian', buy_total_price = '$total' WHERE buy_invoice = '$kode'")or die(mysqli_error($inventory));
		$inserts = mysqli_query($inventory,"UPDATE report SET supplier = '$pilih_supplier', tanggal = '$tanggal_pembelian', pengeluaran = '$total' WHERE invoice = '$kode'")or die(mysqli_error($inventory));
	}else{
		echo "success";
		$insert = mysqli_query($inventory,"INSERT INTO buy SET buy_invoice = '$kode', buy_supplier = '$pilih_supplier', buy_date = '$tanggal_pembelian', buy_total_price = '$total'")or die(mysqli_error($inventory));
		$inserts = mysqli_query($inventory,"INSERT INTO report SET invoice = '$kode', supplier = '$pilih_supplier', tanggal = '$tanggal_pembelian', pengeluaran = '$total'")or die(mysqli_error($inventory));
	}
}
if(isset($_POST['detailTransaksiPembelian'])){
    $id=$_POST['kode'];
	$details = mysqli_query($inventory,"SELECT * FROM v_detail_buy WHERE buy_invoice = '$id'") or die(mysqli_error($inventory));
	$datanya = mysqli_fetch_array($details);
	$detail = mysqli_query($inventory,"SELECT * FROM v_detail_buy WHERE buy_invoice = '$id'") or die(mysqli_error($inventory));
    ?>
    <div class="modal-header">
        <h4 class="modal-title">List Transaksi <?=$datanya['buy_invoice']?></h4>
    </div>
    <div class="modal-body">
        <table class="table borderless">
            <tbody>
				<tr>
                    <td><b>Nama Barang</b></td>
                    <td><b>Harga Beli</b></td>
                    <td><b>Jumlah Barang</b></td>
                    <td><b>Sub Total</b></td>
                </tr>
				<?
				$total = 0;
				while($data = mysqli_fetch_array($detail)){
					$sub_total = $data['buy_price'] * $data['buy_quantity'];
					$total = $total + $sub_total;
				?>
				<tr>
                    <td><?=$data['item_name'];  ?></td>
                    <td>Rp. <?=number_format($data['buy_price']);?></td>
                    <td><?=number_format($data['buy_quantity']);?> Unit</td>
                    <td>Rp. <?=number_format($sub_total);?></td>
                </tr>
				<?
				}
				?>
				<tr>
                    <td>Total</td>
                    <td></td>
                    <td></td>
                    <td>Rp. <?=number_format($total);?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
<?
}
if(isset($_POST['hapusPembelian'])){
	$id_barang = $_POST['kodeRow'];
	$sql = mysqli_query($inventory,"SELECT * FROM buy_detail WHERE buy_invoice = '$id_barang'")or die(mysqli_error($inventory));
	while($data = mysqli_fetch_array($sql)){
		$barang = $data['buy_item'];
		$jumlah = $data['buy_quantity'];
	}
	$query_updatep=mysqli_query($inventory,"UPDATE item SET item_stock=item_stock-$jumlah WHERE item_code = '$barang'")or die(mysqli_error($inventory));
	$deletes = mysqli_query($inventory,"DELETE FROM buy_detail WHERE buy_invoice = '$id_barang'")or die(mysqli_error($inventory));
	$delete = mysqli_query($inventory,"DELETE FROM buy WHERE buy_invoice = '$id_barang'")or die(mysqli_error($inventory));
	$delet = mysqli_query($inventory,"DELETE FROM report WHERE invoice = '$id_barang'")or die(mysqli_error($inventory));
}
//PENJUALAN
if(isset($_POST['tambah_barang_penjualan'])){
	$kode_pem = $_POST['kode_pem'];
	$pilih_barang = $_POST['pilih_barang'];
	// $explode = explode("-",$pilih_barangs);
	// $pilih_barang = $explode[0];
	// $harga_barang = $explode[1];
	$harga_jual = $_POST['harga_jual'];
	$jumlah_jual = $_POST['jumlah_jual'];
	$sql_barang = mysqli_query($inventory,"SELECT * FROM item WHERE item_code = '$pilih_barang'");
	$data_barang = mysqli_fetch_array($sql_barang);
	$harga = $data_barang['item_price'];
	$stok = $data_barang['item_stock'];
	if($stok >= $jumlah_jual){
		$query_cek = mysqli_query($inventory,"SELECT * FROM sale_detail WHERE sale_invoice = '$kode_pem' AND sale_item = '$pilih_barang'")or die(mysqli_error($inventory));
		$data_cek = mysqli_num_rows($query_cek);
		if($data_cek>0){
			echo "exist";
			$updates = mysqli_query($inventory,"UPDATE item SET item_stock = item_stock-$jumlah_jual WHERE item_code = '$pilih_barang'")or die(mysqli_error($inventory));
			$update = mysqli_query($inventory,"UPDATE sale_detail SET buy_price = '$harga', sale_price='$harga_jual', sale_quantity = sale_quantity+$jumlah_jual WHERE sale_invoice = '$kode_pem' AND sale_item = '$pilih_barang'")or die(mysqli_error($inventory));
		}else{
			echo "success";
			$updates = mysqli_query($inventory,"UPDATE item SET item_stock = item_stock-$jumlah_jual WHERE item_code = '$pilih_barang'")or die(mysqli_error($inventory));
			$insert = mysqli_query($inventory,"INSERT INTO sale_detail SET buy_price = '$harga', sale_invoice = '$kode_pem', sale_item = '$pilih_barang', sale_price = '$harga_jual', sale_quantity = '$jumlah_jual'")or die(mysqli_error($inventory));
		}
	}else{
		echo "stok";
	}
}
if(isset($_POST['hapusBarangPenjualan'])){
	$id_barang = $_POST['kodeRow'];
	$sql = mysqli_query($inventory,"SELECT * FROM sale_detail WHERE sale_detail_id = '$id_barang'");
	$data = mysqli_fetch_array($sql);
	$barang = $data['sale_item'];
	$jumlah = $data['sale_quantity'];
	$updates = mysqli_query($inventory,"UPDATE item SET item_stock = item_stock+$jumlah WHERE item_code = '$barang'")or die(mysqli_error($inventory));
	$delete = mysqli_query($inventory,"DELETE FROM sale_detail WHERE sale_detail_id = '$id_barang'")or die(mysqli_error($inventory));
}
if(isset($_POST['tambah_penjualan'])){
	$kode = $_POST['kode'];
	$pilih_pelanggan = $_POST['pilih_pelanggan'];
	$tanggal_transaksi = $_POST['tanggal_transaksi'];
	$jumlah_bayar = $_POST['jumlah_bayar'];
	$query_cek = mysqli_query($inventory,"SELECT * FROM sale WHERE sale_invoice = '$kode'")or die(mysqli_error($inventory));
	$data_cek = mysqli_num_rows($query_cek);
	
	$query_detail_pembelian = mysqli_query($inventory,"SELECT * FROM sale_detail WHERE sale_invoice = '$kode'");
	$total = 0;
	$totalp = 0;
	while($data_detail_pembelian = mysqli_fetch_array($query_detail_pembelian)){
		$kode_item = $data_detail_pembelian['sale_item'];
		$harga_asli = $data_detail_pembelian['buy_price'];
		$harga_item = $data_detail_pembelian['sale_price'];
		$jumlah_item = $data_detail_pembelian['sale_quantity'];
		$sub_total = $harga_item * $jumlah_item;
		$sub_totalp = $harga_asli * $jumlah_item;
		$total = $total + $sub_total;
		$total_p = $totalp + $sub_totalp;
		$profit =$total-$total_p;
	}
	if($jumlah_bayar==0){
		$status = 1;
	}elseif($jumlah_bayar<$total){
		$status = 2;
	}elseif($jumlah_bayar==$total){
		$status = 3;
	}
	if($data_cek>0){
		echo "exist";
		$insert = mysqli_query($inventory,"UPDATE sale SET sale_customer = '$pilih_pelanggan', sale_date = '$tanggal_transaksi', sale_total_price = '$total', sale_paid = '$jumlah_bayar', sale_status = '$status' WHERE sale_invoice = '$kode'")or die(mysqli_error($inventory));
		$inserts = mysqli_query($inventory,"UPDATE report SET customer = '$pilih_pelanggan', tanggal = '$tanggal_transaksi', pemasukan = '$total' , keuntungan = '$profit' WHERE invoice = '$kode'")or die(mysqli_error($inventory));
	}else{
		echo "success";
		$insert = mysqli_query($inventory,"INSERT INTO sale SET sale_invoice = '$kode', sale_customer = '$pilih_pelanggan', sale_date = '$tanggal_transaksi', sale_total_price = '$total', sale_paid = '$jumlah_bayar', sale_status = '$status'")or die(mysqli_error($inventory));
		$inserts = mysqli_query($inventory,"INSERT INTO report SET invoice = '$kode', customer = '$pilih_pelanggan', tanggal = '$tanggal_transaksi', pemasukan = '$total' , keuntungan = '$profit'")or die(mysqli_error($inventory));
	}
}
if(isset($_POST['detailTransaksiPenjualan'])){
    $id=$_POST['kode'];
	$details = mysqli_query($inventory,"SELECT * FROM v_sale_detail WHERE sale_invoice = '$id'") or die(mysqli_error($inventory));
	$datanya = mysqli_fetch_array($details);
	$detail = mysqli_query($inventory,"SELECT * FROM v_sale_detail WHERE sale_invoice = '$id'") or die(mysqli_error($inventory));
    ?>
    <div class="modal-header">
        <h4 class="modal-title">List Transaksi <?=$datanya['sale_invoice']?></h4>
    </div>
    <div class="modal-body">
        <table class="table borderless">
            <tbody>
				<tr>
                    <td><b>Nama Barang</b></td>
                    <td><b>Harga Jual</b></td>
                    <td><b>Jumlah Barang</b></td>
                    <td><b>Sub Total</b></td>
                </tr>
				<?
				$total = 0;
				while($data = mysqli_fetch_array($detail)){
					$sub_total = $data['sale_price'] * $data['sale_quantity'];
					$total = $total + $sub_total;
				?>
				<tr>
                    <td><?=$data['item_name'];  ?></td>
                    <td>Rp. <?=number_format($data['sale_price']);?></td>
                    <td><?=number_format($data['sale_quantity']);?> Unit</td>
                    <td>Rp. <?=number_format($sub_total);?></td>
                </tr>
				<?
				}
				?>
				<tr>
                    <td>Total</td>
                    <td></td>
                    <td></td>
                    <td>Rp. <?=number_format($total);?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
<?
}
if(isset($_POST['hapusPenjualan'])){
	$id_barang = $_POST['kodeRow'];
	$sql = mysqli_query($inventory,"SELECT * FROM sale_detail WHERE sale_invoice = '$id_barang'")or die(mysqli_error($inventory));
	while($data = mysqli_fetch_array($sql)){
		$barang = $data['sale_item'];
		$jumlah = $data['sale_quantity'];
	}
	$query_updatep=mysqli_query($inventory,"UPDATE item SET item_stock=item_stock+$jumlah WHERE item_code = '$barang'")or die(mysqli_error($inventory));
	$deletes = mysqli_query($inventory,"DELETE FROM sale_detail WHERE sale_invoice = '$id_barang'")or die(mysqli_error($inventory));
	$delete = mysqli_query($inventory,"DELETE FROM sale WHERE sale_invoice = '$id_barang'")or die(mysqli_error($inventory));
	$delet = mysqli_query($inventory,"DELETE FROM report WHERE invoice = '$id_barang'")or die(mysqli_error($inventory));
}
if(isset($_POST['simpan_user'])){
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$hak_akses = $_POST['hak_akses'];
	$pass = encrypt_decrypt("encrypt",$password);
	$query_cek = mysqli_query($inventory,"SELECT * FROM session WHERE session_username = '$username'")or die(mysqli_error($inventory));
	$data_cek = mysqli_num_rows($query_cek);
	if($data_cek>0){
		echo "exist";
	}else{
		$insert = mysqli_query($inventory,"INSERT INTO session SET session_username = '$username',session_name = '$nama',session_password = '$pass',session_email = '$email',session_role = '$hak_akses', session_image='ekyjoesmith.jpg'")or die(mysqli_error($inventory));
		echo "success";
	}
}
if(isset($_POST['perbarui_user'])){
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$hak_akses = $_POST['hak_akses'];
	$pass = encrypt_decrypt("encrypt",$password);
	$query_cek = mysqli_query($inventory,"SELECT * FROM session WHERE session_username = '$username'")or die(mysqli_error($inventory));
	$data_cek = mysqli_num_rows($query_cek);
	if($data_cek>0){
		echo "exist";
	}else{
		if(!empty($password)){
			$insert = mysqli_query($inventory,"UPDATE session SET session_username = '$username',session_name = '$nama',session_password = '$pass',session_email = '$email',session_role = '$hak_akses' WHERE session_id ='$id'")or die(mysqli_error($inventory));
		}else{
			$insert = mysqli_query($inventory,"UPDATE session SET session_username = '$username',session_name = '$nama',session_email = '$email',session_role = '$hak_akses' WHERE session_id ='$id'")or die(mysqli_error($inventory));
		}
		echo "success";
	}
}
if(isset($_POST['hapusUser'])){
	$id_barang = $_POST['kodeRow'];
	$delet = mysqli_query($inventory,"DELETE FROM session WHERE session_username = '$id_barang'")or die(mysqli_error($inventory));
}
if(isset($_POST['update_aplikasi'])){
    $nama = $_POST['nama'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $keyword = $_POST['keyword'];
    $logo = $_FILES['logo']['name'];
    $target_dir = "../../assets/aplikasi/";
    $target_file = $target_dir . basename($_FILES["logo"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $extensions_arr = array("jpg", "jpeg", "png", "gif");
    if(empty($logo)){
        mysqli_query($inventory,"
            update setting
        set
            nama = '$nama',
            author = '$author',
            description = '$description,',
            keyword = '$keyword'
        where
            id = 1
        ") or die(mysqli_error($inventory));
    }else {
        if (in_array($imageFileType, $extensions_arr)) {
            move_uploaded_file($_FILES['logo']['tmp_name'], $target_dir . $logo);
            mysqli_query($inventory,"
                update setting
            set
                nama = '$nama',
                author = '$author',
                description = '$description,',
                keyword = '$keyword',
                logo = '$logo'
            where
                id = 1
            ") or die(mysqli_error($inventory));
        } else {
            echo "hanya menerima ekstensi " . implode(",", $extensions_arr) . " ekstensi anda : " . $imageFileType;
        }
    }
}
if(isset($_POST['simpan_konten'])){
    $halaman = $_POST['halaman_konten'];
    $konten = $_POST['konten'];
    mysqli_query($inventory,"
    insert into
        konten
    set
        halaman = '$halaman',
        konten = '$konten',
        created_by = '$token',
        created_date = '$date'
    ")or die(mysqli_error($inventory));
}
if(isset($_POST['ubah_konten'])){
    $id = $_POST['id'];
    $halaman = $_POST['halaman_konten'];
    $konten = $_POST['konten'];
    mysqli_query($inventory,"
    update
        konten
    set
        halaman = '$halaman',
        konten = '$konten'
    where 
        id = $id
    ")or die(mysqli_error($inventory));
}
if(isset($_POST['hapuskonten'])){
    $data = $_POST['id'];
    mysqli_query($inventory,"
    delete from
        konten
    where
        id = '$data'
    ")or die(mysqli_error($inventory));
}
if(isset($_POST['hapus_slider'])){
    $data = $_POST['id'];
    mysqli_query($inventory,"
    delete from
        konten
    where
        id = '$data'
    ")or die(mysqli_error($inventory));
}
if(isset($_POST['order'])){
    $data = $_POST['data'];
    $buat = $_POST['buat'];
    $status = '';
    switch ($buat){
        case "terima":
            $status = "3";
            break;
        case "tolak":
            $status = "4";
            break;
    }
    mysqli_query($inventory,"
    update
        sale
    set
        sale_status = '$status'
    where
        sale_id = '$data'
    ")or die(mysqli_error($inventory));
}
if(isset($_POST['perusahaan'])){
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $notelp = $_POST['notelp'];
    $email = $_POST['email'];
    $logo = $_FILES['logoperusahaan']['name'];
    $target_dir = "../../assets/logo/";
    $target_file = $target_dir . basename($_FILES["logoperusahaan"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $extensions_arr = array("jpg", "jpeg", "png", "gif");
    if (empty($logo)) {
        mysqli_query($inventory, "
            update company
        set
            company_name = '$nama',
            company_address = '$alamat',
            company_phone = '$notelp',
            company_email = '$email'
        where
            company_id = 1
        ") or die(mysqli_error($inventory));
    } else {
        if (in_array($imageFileType, $extensions_arr)) {
            move_uploaded_file($_FILES['logoperusahaan']['tmp_name'], $target_dir . $logo);
            mysqli_query($inventory, "
            update company
        set
            company_name = '$nama',
            company_address = '$alamat',
            company_phone = '$notelp',
            company_email = '$email',
            company_logo = '$logo'
        where
            company_id = 1
        ") or die(mysqli_error($inventory));
        } else {
            echo "hanya menerima ekstensi " . implode(", ", $extensions_arr) . "\nekstensi anda : " . $imageFileType;
        }
    }
}
if(isset($_POST['tambah_sosmed'])){
    $sosmed = $_POST['sosial_media'];
    $nama = $_POST['nama'];
    $link_sm = $_POST['link_sm'];
    $akun_sm = $_POST['akun_sm'];
    $available = true;
    foreach ($_POST as $input){
        if(empty($input) || !isset($input)){
            $available = false;
        }
    }
    if($available) {
        mysqli_query($inventory, "
    insert into
        sosial_media
    set
        sosial_media = '$sosmed',
        nama = '$nama',
        link_sm = '$link_sm',
        akun_sm = '$akun_sm'
    ") or die(mysqli_error($inventory));
    }else{echo "ada field yang kosong";}
}
if(isset($_POST['ubah_sosmed'])){
    $id = $_POST['id'];
    $sosmed = $_POST['sosial_media'];
    $nama = $_POST['nama'];
    $link_sm = $_POST['link_sm'];
    $akun_sm = $_POST['akun_sm'];
    mysqli_query($inventory,"
    update
        sosial_media
    set
        sosial_media = '$sosmed',
        nama = '$nama',
        link_sm = '$link_sm',
        akun_sm = '$akun_sm'
    where
        id = $id
    ") or die(mysqli_error($inventory));
}
if(isset($_POST['hapus_sosmed'])){
    $id = $_POST['id'];
    mysqli_query($inventory,"delete from sosial_media where id = '$id'")or die(mysqli_error($inventory));
}
if(isset($_POST['tambah_slider'])){
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];
    $gmbrslider = $_FILES['gambar_slider']['name'];
    $available = true;
    foreach ($_POST as $input){
        if(empty($input) || !isset($input)){
            $available = false;
        }
    }
    if($available){
        $target_dir = "../../assets/slider/";
        $target_file = $target_dir . basename($_FILES["gambar_slider"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $extensions_arr = array("jpg", "jpeg", "png", "gif");
        if (in_array($imageFileType, $extensions_arr)) {
           move_uploaded_file($_FILES['gambar_slider']['tmp_name'], $target_dir . $gmbrslider);
               mysqli_query($inventory,"
            insert into
                slider
            set
                gambar = '$gmbrslider',
                judul = '$judul',
                konten = '$konten',
                created_by = '$token',
                created_date = '$date'
            ")or die(mysqli_error($inventory));
        } else {
            echo "hanya menerima ekstensi " . implode(",", $extensions_arr) . " ekstensi anda" . $imageFileType;
        }
    }else{
        echo "ada field yang kosong";
    }
}
if(isset($_POST['ubah_slider'])){
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];
    $gmbrslider = $_FILES['gambar_slider']['name'];
    $target_dir = "../../assets/slider";
    $target_file = $target_dir . basename($_FILES["gambar_slider"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $extensions_arr = array("jpg", "jpeg", "png", "gif");
    if(empty($gmbrslider)){
        mysqli_query($inventory, "
            update
                slider
            set
                judul = '$judul',
                konten = '$konten'
            where
                id = id;
            ") or die(mysqli_error($inventory));
    }else {
        if (in_array($imageFileType, $extensions_arr)) {
            if(move_uploaded_file($_FILES['gambar_slider']['tmp_name'], $target_dir . $gmbrslider)) {
                mysqli_query($inventory, "
                update
                    slider
                set
                    gambar = '$gmbrslider',
                    judul = '$judul',
                    konten = '$konten'
                where
                    id = id;
                ") or die(mysqli_error($inventory));
            }
        } else {
            echo "hanya menerima ekstensi " . implode(",", $extensions_arr) . " ekstensi anda $imageFileType ";
        }
    }
}
if(isset($_POST['hapus_slider'])) {
    $id = $_POST['id'];
    mysqli_query($inventory,"
    delete from
        slider
    where 
        id = $id
    ")or die(mysqli_error($inventory));
}
if(isset($_POST['tambah_testimonial'])){
    $nama = $_POST['nama_testimonial'];
    $review = $_POST['review'];
    if(empty($nama) && empty($review)){
        echo "ada field yang kosong";
    }else{
        mysqli_query($inventory,"
        insert into
            testimonial
        set
            nama_customer = '$nama',
            review = '$review'
        ")or die(mysqli_error($inventory));
    }
}
if(isset($_POST['perbarui_testimonial'])){
    $id = $_POST['id'];
    $nama = $_POST['nama_testimonial'];
    $review = $_POST['review'];
    mysqli_query($inventory,"
    update
        testimonial
    set
        nama_customer = '$nama',
        review = '$review'
    where
        id = $id
    ")or die(mysqli_error($inventory));
}
if(isset($_POST['hapus_testimonial'])){
    $id = $_POST['id'];
    mysqli_query($inventory,"delete from testimonial where id = $id")or die(mysqli_error($inventory));
}
if(isset($_POST['tambah_howtoorder'])){
    $content = $_POST['content'];
    if(empty($content)){
        echo "ada field yang kosong";
    }else{
        mysqli_query($inventory,"
        insert into
            how_to_order
        set
            content = '$content'
        ")or die(mysqli_error($inventory));
    }
}
if(isset($_POST['perbarui_howtoorder'])){
    $id = $_POST['id'];
    $content = $_POST['content'];
    mysqli_query($inventory,"
    update
        how_to_order
    set
        content = '$content'
    where
        id = $id
    ")or die(mysqli_error($inventory));
}
if(isset($_POST['hapus_howtoorder'])){
    $id = $_POST['id'];
    mysqli_query($inventory,"delete from how_to_order where id = $id")or die(mysqli_error($inventory));
}
//foreach ($_POST as $value){
//    echo $value."\n";
//}
?>