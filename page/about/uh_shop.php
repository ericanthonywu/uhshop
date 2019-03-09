<div class="container clearfix">
	<div class="container clearfix">

		<?
		$sql_about = mysqli_query($uh_shop,"SELECT * FROM konten WHERE kode ='us' AND halaman='about'");
		while($data_about = mysqli_fetch_array($sql_about)){
		?>
		<div class="col_one_third">

			<div class="heading-block fancy-title nobottomborder title-bottom-border">
				<h4>Why choose <span>Us</span>.</h4>
			</div>

			<p><?=$data_about['konten']?></p>

		</div>
		<?
		}
		$sql_about1 = mysqli_query($uh_shop,"SELECT * FROM konten WHERE kode ='mission' AND halaman='about'");
		while($data_about1 = mysqli_fetch_array($sql_about1)){
		?>
		<div class="col_one_third">

			<div class="heading-block fancy-title nobottomborder title-bottom-border">
				<h4>Our <span>Mission</span>.</h4>
			</div>

			<p><?=$data_about1['konten']?></p>

		</div>
		<?
		}
		$sql_about2 = mysqli_query($uh_shop,"SELECT * FROM konten WHERE kode ='do' AND halaman='about'");
		while($data_about2 = mysqli_fetch_array($sql_about2)){
		?>
		<div class="col_one_third col_last">

			<div class="heading-block fancy-title nobottomborder title-bottom-border">
				<h4>What we <span>Do</span>.</h4>
			</div>

			<p><?=$data_about2['konten']?></p>

		</div>
		<?
		}
		?>

	</div>
</div>