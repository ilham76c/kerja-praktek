<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Form</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/dist/css/skins/_all-skins.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>DLH</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <!-- MENU 'Halaman Utama' -->
        <li>          
          <a href="<?php echo site_url('admin'); ?>"><i class="fa fa-dashboard"></i>Dashboard</a>            
        </li>
        <!-- MENU 'Kelola Konten' -->  
        <li>          
          <a href="<?php echo site_url('admin/kelola/konten'); ?>"><i class="fa fa-file-text-o"></i>Kelola Konten</a>
        </li>      
        <!-- MENU 'Kelola Berita' -->  
        <li class="active">          
          <a href="<?php echo site_url('admin/kelola/berita'); ?>"><i class="fa fa-newspaper-o"></i>Kelola Berita</a>
        </li>
        <!-- MENU 'Kelola Sosmed' -->        
        <li>          
          <a href="<?php echo site_url('admin/kelola/sosmed'); ?>"><i class="fa fa-link"></i>Kelola Sosmed</a>            
        </li>

        <li class="header">LABELS</li>
        <li><a href="<?php echo site_url('dlh/logout');?>"><i class="fa fa-sign-out text-red"></i><span>Log out</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">    
    <!-- Main content -->
    <section class="content">      
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Kelola Berita</h3>

          <!-- <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div> -->
        </div>
        <div class="box-body">
          <!-- Start creating your amazing application! -->
          <div class="row">
        <div class="col-md-12">
          <div class="box box-info">

            <!-- <div class="box-header">
              <h3 class="box-title">CK Editor
                <small>Advanced and full of features</small>
              </h3>                            
            </div>             -->
            <!-- /.box-header -->
            <!-- Isi Konten -->            
              <form id="form_berita" method="POST" enctype="multipart/form-data" action="<?php echo site_url($aksi);?>">
              
                <div class="pad pull-right box-tools">
                  <button type="submit" class="btn btn-primary btn-sm"><?php echo $tombol; ?></button>                
                </div>
                
                <div class="form-group pad">
                  <div class="form-group">
                    <!-- Judul Konten -->
                    <h4>Judul Berita</h4>
                    <input name="judul" class="form-control" placeholder="Judul" value="<?php echo (isset($data)) ? $data->judul : ''; ?>" required>
                    <!-- /.Judul Konten -->
                  </div>
                  <div class="form-group">
                    <!-- gambar header -->                
                    <h4>Gambar Header</h4>
                    <!-- <label for="exampleInputFile">File input</label> -->

                    <input name="file" type="file" accept="image/*" <?php echo (isset($data)) ? '' : 'required'; ?>>
                    <input name="old_file" type="hidden" value="<?php echo (isset($data)) ? $data->gambar : ''; ?>">
                    <?php echo form_error('file', '<p class="help-block error">', '</p>');?>
                    <!-- /.gambar header -->
                  </div>
                  <div class="form-group">
                    <h4>Isi Berita</h4>            
                    <textarea id="editor1" name="editor1">
                      <?php echo (isset($data)) ? $data->isi : ''; ?>
                    </textarea>                
                  </div>
                </div>
                
              </form>
            
            <!-- /.Isi Konten -->
          </div>
          <!-- /.box -->          
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <!-- Footer -->
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.13
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="#">ilham76c</a>.</strong> All rights
    reserved.
  </footer>


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>asset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>asset/dist/js/demo.js"></script>
<!-- CK Editor -->
<script src="<?php echo base_url(); ?>asset/bower_components/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url(); ?>asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()    
  });  
 /* document.getElementById("form_berita").onsubmit = function() {
    var value = document.getElementById('editor1').value;
    if(value.length < 100) {
      alert("Berita harus di isi dengan minimal 100 karakter!!");
      return false;     
    }
  }*/
</script>
</body>
</html>
