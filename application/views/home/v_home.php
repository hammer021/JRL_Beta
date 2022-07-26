
	<div id="fh5co-page"> 
    <!-- Page -->
<?php 
//masukkan link reff disini

if ($reff== null) {
	$linkref="AdminJRL";
}
else{
$linkref = $reff; 
}
?>
	<aside id="fh5co-hero" class="js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">
				<?php foreach($head as $h){?>

		   	<li style="background-image: url(<?php echo base_url().'./assets/images/konten/'.$h['gambar'];?>);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<h2 style="color: black;"><?php echo $h['taskTitle'];?></h2>
		   					<h3 style="color: black;"><?php echo $h['description'];?></h3>
		   					<p><a href="<?php echo base_url().'addNew/'.$linkref; ?>" class="btn btn-primary btn-lg">Join Us</a></p>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
			   <?php }?>

			<!-- Disini Kalo mau nambahh slides -->

		   	</ul>
	  	</div>
	</aside>

	<div id="fh5co-why-us" class="animate-box">
		<div class="container">
			<div class="row">
				<?php 
				$i=0;
				foreach($konten as $k){
				if($i < 6){	
				?> 
				<div class="col-md-4 text-center item-block">
					<span class="icon"><img height="700" width="40%" src="<?php echo base_url().'./assets/images/konten/'.$k['gambar'];?>" class="img-responsive"></span>
					<h3><?php echo $k['taskTitle'];?></h3>
					<p><?php echo $k['description'];?></p>
					<!-- <p><a href="<?php echo base_url().'portfolio'?>" class="btn btn-primary btn-outline with-arrow">Learn more <i class="icon-arrow-right"></i></a></p> -->
				</div>
				<?php }
					$i++;}?>
			</div>
		</div>
	</div>


	<div class="fh5co-section-with-image">
	<?php foreach ($foot as $f) {?>	

		<img src="<?php echo base_url().'./assets/images/konten/'.$f['gambar'];?>" alt="" class="img-responsive">
		<div class="fh5co-box animate-box">
		<iframe width="450" height="315" src="<?php echo $f['link'];?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

			<h2><?php echo $f['taskTitle'];?></h2>
			<p><?php echo $f['description'];?></p>
			<!-- <p><a href="<?php echo base_url().'portfolio'?>" 
			class="btn btn-primary btn-outline with-arrow">Get started 
			<i class="icon-arrow-right"></i></a></p> -->
			<?php }?>

		</div>

	</div>



	<div id="fh5co-blog" class="animate-box">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>ARTIKEL TERBARU</h2>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
			<?php
				// foreach ($post->result_array() as $j) :
				// 	$post_id=$j['tulisan_id'];
				// 	$post_judul=$j['tulisan_judul'];
				// 	$post_isi=$j['tulisan_isi'];
				// 	$post_author=$j['tulisan_author'];
				// 	$post_image=$j['tulisan_gambar'];
				// 	$post_tglpost=$j['tanggal'];
				// 	$post_slug=$j['tulisan_slug'];
			?>
				<!-- <div class="col-md-4">
					<a class="fh5co-entry" href="<?php echo base_url().'artikel/'.$post_slug;?>">
						<figure>
						<img src="<?php echo base_url().'./assets/images/'.$post_image;?>" alt="" class="img-responsive">
						</figure>
						<div class="fh5co-copy">
							<h3><?php echo $post_judul;?></h3>
							<span class="fh5co-date"><?php echo $post_tglpost.' | '.$post_author;?></span>
							<?php echo limit_words($post_isi,20).'...';?>
						</div>
					</a>
				</div> -->
				<?php //endforeach;?>

				<div class="col-md-12 text-center">
					<p><a href="<?php echo base_url().'artikel'?>" class="btn btn-primary btn-outline with-arrow">View More <i class="icon-arrow-right"></i></a></p>
				</div>
			</div>
		</div>
	</div>	



<!-- Tutup Page -->
</div>


