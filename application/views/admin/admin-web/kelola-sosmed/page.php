<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'libraries/SosmedLibrary.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kelola Sosmed</title>
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
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/select2/dist/css/select2.min.css">

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
        <li>          
          <a href="<?php echo site_url('admin/kelola/berita'); ?>"><i class="fa fa-newspaper-o"></i>Kelola Berita</a>            
        </li>      
        <!-- MENU 'Kelola Sosmed' -->        
        <li class="active">          
          <a href="#"><i class="fa fa-link"></i>Kelola Sosmed</a>            
        </li>
        <!-- MENU 'Ganti Password' -->        
        <li>          
          <a href="<?php echo site_url('admin/kelola/ganti_password'); ?>"><i class="fa fa-lock"></i>Ganti Password</a>            
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
            <h3 class="box-title">Kelola Sosial Media</h3>            
         </div>
         <div class="box box-info">
           <div class="box-body">
              <!-- Start creating your amazing application! -->
              <!-- form start -->
              <form name="form1" id="idForm" class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                 <div class="box-body">                  
                    <!-- FORM GROUP FACEBOOK -->
                 <?php
                    $no = 1;
                    foreach ($data as $row) :?>
                    <div class="form-group">   
                       <div class="col-sm-6">
                          <div class="input-group">                      
                           <!-- /btn-group -->
                             <span class="input-group-addon">
                                <i class="<?php echo $row->icon;?>"></i>
                             </span>
                             
                             <input id="<?php echo 'url'.$no;?>" type="url" class="form-control" placeholder="http://example.com/..." value="<?php echo $row->url ;?>" disabled> 
                              
                             <span class="input-group-addon">                           
                                <input id="<?php echo 'btn'.$no;?>" class="btn-link" type="button" name="btn" value="Edit" onclick="sosmedURL(<?php echo $no;?>,this.value)">
                             </span>                                       
                          </div>               
                       </div>           
                       
                       <div id="jos" class="jos col-sm-4">                        
                          <div class="btn-group">
                            <button id="<?php echo 'off'.$no;?>" type="button" class="btn btn-default <?php echo $row->sttus === '0' ? 'active' : '';?>" onclick="OnOff(<?php echo $no;?>,false)">Off</button>                      
                            <button id="<?php echo 'on'.$no;?>" type="button" class="btn btn-default <?php echo $row->sttus === '1' ? 'active' : '';?>" onclick="OnOff(<?php echo $no;?>,true)">On</button>
                          </div>
                       </div>
                    </div>
                 <?php
                    $no++;
                    endforeach;?>                
                 </div>              
              </form>
           </div>
       </div>
         <!-- /.box-body -->
         <div class="box-footer">
            Footer
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


<!-- Select2 -->
<script src="<?php echo base_url(); ?>asset/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>asset/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>assetplugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url(); ?>asset/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="<?php echo base_url(); ?>asset/plugins/iCheck/icheck.min.js"></script>

<!-- Page script -->
<script>   
   function ValidURL(str) {
      var regex = /(http|https):\/\/(\w+:{0,1}\w*)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%!\-\/]))?/;
      if(!regex .test(str)) {
         alert("Please enter valid URL.");
         return false;
      } else {
         return true;
      }
   }
   function postValueOnOff(id,value){
      $.ajax({
         data: {'onoff':value, 'id':id},
         url: '<?php echo $_SERVER["PHP_SELF"];?>',
         method: 'POST'
      });
   }
   function OnOff(id,value) {
      $.ajax({
         data: {'onoff':value, 'id':id},
         url: '<?php echo $_SERVER["PHP_SELF"];?>',
         method: 'POST'
      });
                              
      switch(value){
         case true:                        
            var btnOff = document.getElementById('off'.concat(id));
            btnOff.classList.remove('active');

            var btnOn = document.getElementById('on'.concat(id));
            btnOn.classList.add('active');            

            break;
         case false:            
            var btnOn = document.getElementById('on'.concat(id));
            btnOn.classList.remove('active');

            var btnOff = document.getElementById('off'.concat(id));
            btnOff.classList.add('active');

            break;
         default:
            break;
      }      
   }
   function sosmedURL(id,value) {
      var input = $('#url'.concat(id.toString()));  
      var button = $('#btn');               
      var url = input.val();
                                          
      switch(value) {
         case 'Ok':            
            if (url == null || url == "") {
               alert("Please Fill All Required Field");                  
            }
            else if (!ValidURL(url)) {                  
               return false;
            }
            else {
               $(input).prop('disabled',true);               
               document.getElementById("btn".concat(id.toString())).value = "Edit";

               $.ajax({
                   data: {'url':url,'id':id},
                   url: '<?php echo $_SERVER["PHP_SELF"];?>',
                   method: 'POST', // or GET
                   /*success: function(msg) {
                       alert(msg);
                   }*/
               });
            }               
            /*$.post('target_url', { key: 'value1', key2: 'value2' }).done(function(data) {
               alert(data);
            });*/
            break;
         case 'Edit':
            $(input).prop('disabled',false);
            document.getElementById("btn".concat(id.toString())).value = "Ok";
            break
         default:
            break;
      }
   }    
</script>
</body>
</html>
