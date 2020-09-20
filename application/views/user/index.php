<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Profil</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
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
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">          
          <a href="#"><i class="fa fa-user"></i>Profil</a> 
        </li>
        <li>
          <a href="<?php echo site_url('user/ganti_password'); ?>"><i class="fa fa-lock"></i>Ganti Password</a>            
        </li>
        <li class="header">LABELS</li>
        <li><a href="<?php echo site_url('dlh/logout');?>"><i class="fa fa-sign-out text-red"></i> <span>Log out</span></a></li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">    
    <!-- Main content -->
    <section class="content">

      <div class="row">      
        <!-- /.col -->
        <div class="col-md-5">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#profil" data-toggle="tab">Profil</a></li>
              <li><a href="#golongan" data-toggle="tab">Golongan</a></li>
              <li><a href="#jabatan" data-toggle="tab">Jabatan</a></li>
              <li><a href="#pensiun" data-toggle="tab">Pensiun</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="profil">
              <!-- Isi Activity -->
                <table>
                  <tr>
                    <td><p><strong>Nama</strong></p></td>
                    <td><p>&emsp;:&emsp;</p></td>
                    <td><p><?php echo $data->nama;?></p></td>
                  </tr>
                  <tr>
                    <td><p><strong>Tempat, Tanggal lahir</strong></p></td>
                    <td><p>&emsp;:&emsp;</p></td>
                    <td><p><?php echo $data->ttl;?></p></td>                  
                  </tr>
                  <tr>
                    <td><p><strong>Pendidikan</strong></p></td>
                    <td><p>&emsp;:&emsp;</p></td>
                    <td><p><?php echo $data->pendidikan;?></p></td>                  
                  </tr>
                </table>                              
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="golongan">
                <table>
                  <tr>
                    <td><p><strong>Golongan</strong></p></td>
                    <td><p>&emsp;:&emsp;</p></td>
                    <td><p><?php echo $data->golongan;?></p></td>
                  </tr>
                  <tr>
                    <td><p><strong>Pangkat</strong></p></td>
                    <td><p>&emsp;:&emsp;</p></td>
                    <td><p><?php echo $data->pangkat;?></p></td>                  
                  </tr>
                  <tr>
                    <td><p><strong>TMT Pangkat</strong></p></td>
                    <td><p>&emsp;:&emsp;</p></td>
                    <td><p><?php echo $data->tmt_pangkat;?></p></td>                  
                  </tr>
                </table>       
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="jabatan">
                <table>
                  <tr>
                    <td><p><strong>Jabatan</strong></p></td>
                    <td><p>&emsp;:&emsp;</p></td>
                    <td><p><?php echo $data->jabatan;?></p></td>
                  </tr>                
                </table>       
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="pensiun">
                <table>
                  <tr>
                    <td><p><strong>Tahun Pensiun</strong></p></td>
                    <td><p>&emsp;:&emsp;</p></td>
                    <td><p><?php echo $data->pensiun;?></p></td>
                  </tr>                
                </table>       
              </div>
              <!-- /.tab-pane -->              
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

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
  <!-- <div class="control-sidebar-bg"></div> -->
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>asset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>asset/dist/js/demo.js"></script>
</body>
</html>
