<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
	    <style type="text/css">
	      	.footer-basic {
	  			padding:40px 0;
			  	background-color:#ffffff;
			  	color:#F5FFFA;
			}
			.footer-basic ul {
			  	padding:0;
			  	list-style:none;
			  	text-align:center;
			  	font-size:18px;
			  	line-height:1.6;
			  	margin-bottom:0;
			}
			.footer-basic li {
			  	padding:0 10px;
			}	
			.footer-basic ul a {
			  	color:inherit;
			  	text-decoration:none;
			  	opacity:0.8;
			}
			.footer-basic ul a:hover {
			  	opacity:1;
			}
			.footer-basic .social {
			  	text-align:center;
			  	padding-bottom:25px;
			}	
			.footer-basic .social > a {
			  	font-size:24px;
			  	width:40px;
			  	height:40px;
			  	line-height:40px;
			  	display:inline-block;
			  	text-align:center;
			  	border-radius:50%;
			  	border:1px solid #ccc;
			  	margin:0 8px;
			  	color:inherit;
			  	opacity:0.75;
			}
			.footer-basic .social > a:hover {
				opacity:0.9;
			}
			.footer-basic .copyright {
			  	margin-top:15px;
			  	text-align:center;
			  	font-size:13px;
			  	color:#FDF5E6;
			  	margin-bottom:0;
			}
	    </style>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top">
		  	<div class="container">
		    	<a class="navbar-brand" href="#">Dinas Lingkungan Hidup</a>
		    	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
		      	<span class="navbar-toggler-icon"></span>
		      </button>
		   	<div class="collapse navbar-collapse" id="navbarResponsive">
		      	<ul class="navbar-nav ml-auto">
		        		<li class="nav-item">
		          		<a class="nav-link" href="<?php echo site_url('dlh/index'); ?>">Beranda</a>
		        		</li>		        	
		        		<li class="nav-item active">
		          		<a class="nav-link" href="<?php echo site_url('dlh/berita'); ?>">Berita
		          			<span class="sr-only">(current)</span>
		          		</a>
		        		</li>
		        		<li class="nav-item">
		          		<a class="nav-link" href="<?php echo site_url('dlh/login'); ?>">Login</a>
		        		</li>        
		      	</ul>
		    	</div>
		  	</div>
		</nav>
		<div class="container py-5">
		  	<div class="col-lg-12">
		    	<h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Berita</h1>
		    	<hr class="mt-2 mb-2">
		    	<div class="row text-center text-lg-left">
		    		<?php include 'content-berita.php';?>
		  		</div>
		  	</div>
		</div>
		<div class="footer-basic bg-info">
		   <footer>
		      <div class="social">
		         <?php foreach ($sosmed as $key):?>
		            <a href="<?php echo $key->url;?>"><i class="<?php echo $key->ion_icon;?>"></i></a>
		         <?php endforeach; ?>		         
		      </div>
		       	<!-- <ul class="list-inline">
		          	<li class="list-inline-item"><a href="#">Home</a></li>
		          	<li class="list-inline-item"><a href="#">Services</a></li>
		          	<li class="list-inline-item"><a href="#">About</a></li>
		          	<li class="list-inline-item"><a href="#">Terms</a></li>
		          	<li class="list-inline-item"><a href="#">Privacy Policy</a></li>
		       	</ul> -->
		      <p class="copyright">Copyright ilham76c © 2019</p>
		   </footer>
		</div>
	</body>
</html>