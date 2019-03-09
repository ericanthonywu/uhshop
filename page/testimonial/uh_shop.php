<div class="container clearfix">
	<h3 class="center">Testimoni</h3>

	<div id="oc-testi" class="owl-carousel testimonials-carousel carousel-widget" data-margin="20" data-items-sm="1" data-items-md="2" data-items-xl="3">

		<?
		$sql_about = mysqli_query($uh_shop,"SELECT * FROM testimonial");
		while($data_about = mysqli_fetch_array($sql_about)){
		?>
		<div class="oc-item">
			<div class="testimonial">
				<div class="testi-content">
					<p><?=$data_about['review']?></p>
					<div class="testi-meta">
						<?=$data_about['nama_customer']?>
					</div>
				</div>
			</div>
		</div>
		<?
		}
		?>

	</div>
</div>