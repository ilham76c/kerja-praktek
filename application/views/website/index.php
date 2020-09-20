<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<html>
<head>  
            
   <title>DLH | Home</title>
   
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="Dinas Lingkungan Hidup Kabupaten Bangkalan">
   <meta name="author" content="ILHAM 76C">
   <meta name="keywords" content="DINAS, DLH, Dinas Lingkungan Hidup, Kebersihan">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"> 
   
   <style type="text/css">
      body {
         background: #f6f3f7;
      }
      p {
         margin: 0;
         /*margin-right: 8px;*/
         text-align: justify;           
      }   
      .control-box h2 {
         font-family: 'Roboto', sans-serif;
         font-weight: 300;
      }
      .control-box {
         border: 1px solid #dddcd8;
         border-radius: 5px;
         background-color: #fff;
      }
      .control-box .links {
         list-style: none;
         padding: 0;
         margin: 0;
      }
      .control-box .links li {
         margin-bottom: 10px;
      }
      .control-box .links li a {
         color: #aa1212;
         text-decoration: underline;
      }
      .content {
         margin-top: 20px;
      }    
      .main-content h6 {
         font-family: 'Roboto', sans-serif;
         font-weight: 700;
         font-size: 27px;
         color: #000;
         margin-bottom: 20px;
      }
      .main-content p {
         font-size: 15px;
         color: #000;
         line-height: 29px;
         margin-bottom: 20px;
         margin-right: 8px;
         text-align: justify;           
      }
      .main-content img {
         max-width: 100%;
         height: auto;
         display: block;
         margin: auto;
      }
      .main-content h1 {
         margin-bottom: 20px;
      }   
      .carousel-item {
         height: 65vh;
         min-height: 350px;
         background: no-repeat center center scroll;
         -webkit-background-size: cover;
         -moz-background-size: cover;
         -o-background-size: cover;
         background-size: cover;
      }
      .fix-im {
          position: relative;
          bottom:11rem;
      }
      @media screen and (max-width:768px){
         .flex-100 {
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%;
         }
         .fix-im {bottom: 0rem;}
      }
      .ugali {
          background: black;
          padding: 6px;
      }
      hr.style-eight {
         overflow: visible; /* For IE */
         padding: 0;
         border: none;
         border-top: medium double #333;
         color: #333;
         text-align: center;
      }
      hr.style-eight:after {
          content: "§";
         display: inline-block;
         position: relative;
         top: -0.7em;
         font-size: 1.5em;
         padding: 0 0.25em;
         background: white;
   </style>
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
               <li class="nav-item active">
                  <a class="nav-link" href="<?php echo site_url('dlh'); ?>">Home
                     <span class="sr-only">(current)</span>
                  </a>
               </li>        
               <li class="nav-item">
                  <a class="nav-link" href="<?php echo site_url('dlh/berita'); ?>">Berita</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="<?php echo site_url('dlh/login'); ?>">Login</a>
               </li>        
            </ul>
         </div>
      </div>
   </nav>
   <header>
      <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
         <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
         </ol>
         <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div class="carousel-item active" style="background-image: url('<?php echo base_url(); ?>asset/img-header/suramadu.jpg')">
               <div class="carousel-caption d-none d-md-block">
                  <h3 class="display-4">Dinas Lingkungan Hidup</h3>
                  <!-- <p class="lead">This is a description for the first slide.</p> -->
               </div>
            </div>
            <!-- Slide Two - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('<?php echo base_url(); ?>asset/img-header/pemandangan.jpg')">
               <div class="carousel-caption d-none d-md-block">
                  <h3 class="display-4">Dinas Lingkungan Hidup</h3>
                  <!-- <p class="lead">This is a description for the second slide.</p> -->
               </div>
            </div>
            <!-- Slide Three - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('<?php echo base_url(); ?>asset/img-header/laut.jpg')">
               <div class="carousel-caption d-none d-md-block">
                  <h3 class="display-4">Dinas Lingkungan Hidup</h3>
                  <!-- <p class="lead">This is a description for the third slide.</p> -->
               </div>
            </div>
         </div>
         <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
         </a>
         <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
         </a>
      </div>
   </header>


   <!-- Page Content -->
   <!-- <section class="py-5">
      <div class="container text-center">
         <h1 class="font-weight-light">Dinas Lingkungan Hidup Bangkalan</h1>    
      </div>
   </section> -->

   <div class="container">
      <div class="col-lg-12">      
         <hr class="mt-2 mb-5">
         <div class="row control-box main-content p-5">                
            <?php            
               echo '<samp>'.$profil.'</samp>';
            ?>               
         </div>
      </div>
   </div>

   <header class="bg-info text-center py-1 mt-5">  
      <div class="container">   
         <h2 class="font-weight-light text-white">Berita Terbaru</h2>
      </div>
   </header>

   <!-- Page Content -->
   <div class="container py-3 mt-3">
      <div class="row mt-3">
         <?php foreach ($data as $row) :?>
            <div class="col-lg-3 col-sm-6 mb-4">
               <div class="card shadow border-0 h-100">
                  <a href="#" data-toggle="modal" data-target="#exampleModalLong"><img height="150" class="card-img-top" src="<?php echo base_url(); ?>upload/img-berita/thumbnail/small/<?php echo $row->gambar;?>" alt=""></a>
                  <div class="card-body">
                     <h5 class="card-title">
                        <a href="#" data-toggle="modal" data-target="<?php echo '.modal'.$row->id;?>"><?php echo $row->judul;?></a>
                     </h5>                     
                  </div>
               </div>
            </div>
            <!-- Modal -->
            <div class="<?php echo 'modal'.$row->id;?> modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
               <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLongTitle">
                           <?php 
                              setlocale (LC_TIME, 'id_ID');
                              echo date("l, d F Y  H:i", strtotime($row->tanggal));?>                              
                        </h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-body">                                  
                        <div class="control-box p-3 main-content">
                           <h2><?php echo $row->judul;?></h2>              
                           <img class="img-media media-object p-3" src="<?php echo base_url(); ?>upload/img-berita/thumbnail/large/<?php echo $row->gambar; ?>" class="img-fluid">
                           <?php 
                              echo $row->isi;?>                                                     
                        </div>                                               
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>            
                     </div>
                  </div>
               </div>
            </div>
         <?php endforeach; ?>  
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

<!-- JavaScript -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>
</html>