<?
if(isset($_SESSION['token_inventory'])){
	$kode = $_GET['kode'];
	$sql_kategori = mysqli_query($inventory,"SELECT * FROM sale WHERE sale_invoice = '$kode'");
	while($data_kategori = mysqli_fetch_array($sql_kategori)){
	    $tgl = $data_kategori['sale_date'];
        $tgl = TanggalIndo($tgl);

        $cust = $data_kategori['sale_customer'];

        $sqlcust = mysqli_query($inventory,"select * from customer where customer_code = '$cust'");
        $recust = mysqli_fetch_array($sqlcust);
        $alamat = $recust['customer_address'];
        $customer = $recust['customer_name'];
        $telpcust = $recust['customer_phone'];

        $invoiceno = substr($kode,4);

        $status = $data_kategori['sale_status'];
        $color = '';
        if($status == 1){
            $status = "Belum Bayar";
            $color = "danger";
        }elseif($status == 2){
            $status = "Belum Lunas";
            $color = "warning";
        }elseif($status == 3){
            $status = "Sudah Lunas";
            $color = "success";
        }

        $dibayar = $data_kategori['sale_paid'];
        $hargaakhir = $data_kategori['sale_total_price'];
        $totalharga = (int)$hargaakhir - (int)$dibayar;
?>
	<div class="m-content" id="divprint">
		<!--Begin::Section-->
		<div class="m-portlet">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							Cetak Penjualan <?=$kode?>
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item">
							<button data-toggle="m-tooltip" title="Kembali" data-placement="top" onclick="window.location.href='<?=$base_url?>penjualan'" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
								<i class="flaticon-cancel"></i>
							</button>
						</li>
					</ul>
				</div>
			</div>
			<div class="m-portlet__body m-portlet__body--no-padding">
				<div class="m-invoice-1" id="print">
					<div class="m-invoice__wrapper">
						<div class="m-invoice__head" style="background-image: url(<?=$metronic5_url?>1/app/media/img/bg/bg-6.jpg);">
							<div class="m-invoice__container m-invoice__container--centered">
								<div class="m-invoice__logo">
									<a href="javascript:;">
										<h1>INVOICE</h1>
									</a>
									<a href="javascript:;">
										<img src="<?=$metronic5_url?>1/app/media/img/logos/logo_client_white.png">
									</a>
								</div>
								<span class="m-invoice__desc">
									<span><?=$alamat?></span>
								</span>
								<div class="m-invoice__items">
									<div class="m-invoice__item">
										<span class="m-invoice__subtitle">DATA</span>
										<span class="m-invoice__text"><?=$tgl?></span>
									</div>
									<div class="m-invoice__item">
										<span class="m-invoice__subtitle">INVOICE NO.</span>
										<span class="m-invoice__text"><?=$invoiceno?></span>
									</div>
									<div class="m-invoice__item">
										<span class="m-invoice__subtitle">INVOICE TO.</span>
										<span class="m-invoice__text"><?=$alamat?></span>
									</div>
								</div>
							</div>
						</div>
<!--						<div class="m-invoice__body m-invoice__body--centered">-->
<!--							<div class="table-responsive">-->
<!--								<table class="table">-->
<!--									<thead>-->
<!--										<tr>-->
<!--											<th>DESCRIPTION</th>-->
<!--											<th>HOURS</th>-->
<!--											<th>RATE</th>-->
<!--											<th>AMOUNT</th>-->
<!--										</tr>-->
<!--									</thead>-->
<!--									<tbody>-->
<!--										<tr>-->
<!--											<td>Creative Design</td>-->
<!--											<td>80</td>-->
<!--											<td>$40.00</td>-->
<!--											<td>$3200.00</td>-->
<!--										</tr>-->
<!--										<tr>-->
<!--											<td>Front-End Development</td>-->
<!--											<td>120</td>-->
<!--											<td>$40.00</td>-->
<!--											<td>$4800.00</td>-->
<!--										</tr>-->
<!--										<tr>-->
<!--											<td>Back-End Development</td>-->
<!--											<td>210</td>-->
<!--											<td>$60.00</td>-->
<!--											<td>$12600.00</td>-->
<!--										</tr>-->
<!--									</tbody>-->
<!--								</table>-->
<!--							</div>-->
<!--						</div>-->
						<div class="m-invoice__footer">
							<div class="m-invoice__container m-invoice__container--centered">
								<div class="m-invoice__content">
									<span>Total Pembayaran</span>
									<span>
                                        <span>Customer:</span>
                                        <span><?=$customer?></span>
                                    </span>
									<span>
                                        <span>Total Dibayar:</span>
                                        <span>Rp. <?=number_format($data_kategori['sale_paid'])?></span>
                                    </span>
                                    <span>
                                        <span>Total Tagihan (Sebelum Bayar):</span>
                                        <span>Rp. <?=number_format($data_kategori['sale_total_price'])?></span>
                                    </span>
                                    <span>
                                        <span>Status:</span>
                                        <span><?=$status?></span>
                                    </span>
								</div>
								<div class="m-invoice__content">
									<span>Total Tagihan</span>
									<span class="m-invoice__price">Rp. <?=$totalharga?></span>
                                    <span class="m--font-<?=$color?>"> <?=$status?> </span>
								</div>
							</div>
						</div>
					</div>
                    <div class="m-invoice__wrapper noprint">
                        <div class="m-invoice__body m-invoice__body--centered">
                            <div class="m-invoice__wrapper">
                                <button class="btn btn-lg btn-outline-success pull-right btn-success" id="btn_print">Print</button>
                            </div>
                        </div>
                        <div class="m-invoice__body m-invoice__body--centered">
                            <div class="m-invoice__wrapper">
                                &nbsp;
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
		<!--End::Section-->
	</div>
<?
	}
}else{
	echo "<script>window.location.href='http://".$_SERVER['SERVER_NAME']."/inventory/not-found'</script>";
}
?>

