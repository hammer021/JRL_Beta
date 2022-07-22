<!DOCTYPE html>
<html class="no-js">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>BT</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.png'?>">

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="<?php echo base_url().'theme/favicon.ico'?>">

	<!-- Animate.css -->
	<link rel="stylesheet" href="<?php echo base_url().'theme/css/animate.css'?>">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="<?php echo base_url().'theme/css/icomoon.css'?>">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?php echo base_url().'theme/css/bootstrap.css'?>">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="<?php echo base_url().'theme/css/flexslider.css'?>">
	<!-- Theme style  -->
	<link rel="stylesheet" href="<?php echo base_url().'theme/css/style.css'?>">

	<!-- Modernizr JS -->
	<script src="<?php echo base_url().'theme/js/modernizr-2.6.2.min.js'?>"></script>
	<?php
            error_reporting(0);
            function limit_words($string, $word_limit){
                $words = explode(" ",$string);
                return implode(" ",array_splice($words,0,$word_limit));
            }

        ?>

	</head>
	<body>
    

	<header id="fh5co-header">
   
		<div class="container">

			<div class="header-inner">
            <?php 
					//masukkan link reff disini

					if ($reff== null) {
						$linkref="AdminJRL";
					}
					else{
					$linkref = $reff; 
					}
					?>
				<h1><a href="<?php echo base_url().''?>">BetaVersion<span>.</span></a></h1>
				<nav role="navigation">
					<ul>
						<li><a href="<?php echo base_url().''?>">Home</a></li>
						<li><a href="<?php echo base_url().'About'?>">About</a></li>
						<li><a href="<?php echo base_url().'Portfolio'?>">Portfolio</a></li>
						<!-- <li><a href="<?php echo base_url().'artikel'?>">Blog</a></li>
						<li><a href="<?php echo base_url().'gallery'?>">Gallery</a></li> -->
						<!-- <li><a href="<?php echo base_url().'kontak'?>">Contact</a></li> -->
						<li class="cta"><a href="<?php echo base_url().'addNew/'.$linkref; ?>">Join Us!</a></li>
						<li class="cta"><a href="<?php echo base_url().'dashboard'; ?>">Login!</a></li>
					</ul>
				</nav>
            
			</div>
        
		</div>
	<nav class="navbar navbar navbar-fixed-bottom">
		<div class="container">
		<!-- <div class="header-inner"> -->


	<nav role="navigation">

					<!-- <ul>						
						<li> -->
						<a href="<?php echo base_url().'addNew/'.$linkref; ?>">
						<img src="<?php echo base_url().'./assets/images/joinus.png';?>" 
						alt="google logo" width="80" border=0> 
						</a>
						<!-- </li>
					</ul> -->
				</nav>
		<!-- </div> -->
		</div>
    </nav>
	</header>


