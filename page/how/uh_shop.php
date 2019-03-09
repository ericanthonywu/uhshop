<div class="container clearfix">
	<div class="container clearfix">

		<?
		$sql_about = mysqli_query($uh_shop,"SELECT * FROM how_to_order");
		while($data_about = mysqli_fetch_array($sql_about)){
		?>
		<div class="col-12">

			<div class="heading-block fancy-title nobottomborder title-bottom-border">
				<h4>How To<span> Order</span>.</h4>
			</div>

			<p><?=$data_about['content']?></p>

		</div>
		<?
		}
		?>
	</div>
</div>