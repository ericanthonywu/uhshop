<section id="slider" class="slider-element slider-parallax full-screen with-header force-full-screen clearfix">

	<div class="slider-parallax-inner">

		<?
		$sql_slider = mysqli_query($uh_shop,"SELECT * FROM slider");
		while($data_slider = mysqli_fetch_array($sql_slider)){
		?>
		<div class="full-screen force-full-screen" style="background: url('<?=$base_assets?>slider/<?=$data_slider['gambar']?>') center center no-repeat; background-size: cover;">

			<div class="container clearfix">
				<div class="emphasis-title vertical-middle center">
					<h1 data-animate="fadeInUp"><?=$data_slider['judul']?> <br> <strong><?=$data_slider['konten']?></strong></h1>
				</div>
			</div>

		</div>
		<?
		}
		?>
	</div>

</section>