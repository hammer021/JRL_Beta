

	<aside id="fh5co-hero" clsas="js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">
		   	<li style="background-image: url(<?php echo base_url().'theme/images/slide_3.jpg'?>);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<h2>Portfolio</h2>
		   					<p class="fh5co-lead"> Source code by <a href="https://www.instagram.com/exwp__/" target="_blank">Administrator</a></p>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside>



	<div id="fh5co-grid-products" class="animate-box">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>See our Portfolio</h2>
					<p></p>
				</div>
			</div>
		</div>
		<?php
			foreach ($porto as $i) :
				$port_id=$i['bookingId'];
				$port_judul=$i['roomName'];
				$port_deskripsi=$i['description'];
				$port_gambar=$i['gambar'];
				$port_created=$i['createdDtm'];

		?>
		<div class="col-md-4">
			<a href="#" ><img src="<?php echo base_url().'./assets/images/'.$port_gambar;?>" class="img-responsive"></a>
				<div class="v-align">
					<div class="v-align-middle"><br/>
						<h3 style="color:black;" class="title"><?php echo $port_judul;?></h3>
						<h5 style="color:black;" class="category"><?php echo $port_deskripsi;?></h5>
					</div>
				</div>
		</div>
		<?php endforeach;?>


	</div>
	<br/>
	<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<br/>
					
				</div>
			</div>
	</div>
