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
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/bower_components/select2/dist/css/select2.min.css">
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
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <!-- MENU 'Halaman Utama' -->
        <li class="active">          
          <a href="<?php echo site_url('dinas/index'); ?>"><i class="fa fa-home"></i>Data Pegawai</a>            
        </li>
        <!-- MENU 'Ganti Password' -->        
        <li>          
          <a href="<?php echo site_url('dinas/ganti_password'); ?>"><i class="fa fa-lock"></i>Ganti Password</a>            
        </li>   
        <li class="header">LABELS</li>
        <li><a href="<?php echo site_url('dlh/logout');?>"><i class="fa fa-sign-out text-red"></i> <span>Log out</span></a></li>        
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
          <h3 class="box-title">Form Tambah Pegawai</h3>          
        </div>
        <div class="box-body">
          <!-- Start creating your amazing application! -->
         <div class="col-md-8">
          <!-- Horizontal Form -->
          <div class="box box-info">    
            <?php
              if ($this->session->flashdata('status') == 'sukses') {
                echo 
                  '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Alert!</h4>
                    Data berhasil ditambah.
                  </div>';
              }
              if ($this->session->flashdata('status') == 'gagal') {
                echo 
                  '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    Gagal, NIP is exist
                  </div>';
              }
              
            ?>   

            <!-- form start -->
            <form class="form-horizontal" action="<?php echo site_url($aksi);?>" method="post">
              <div class="box-body">
                <!-- NIP -->
                <div class="form-group">
                  <label for="nip" class="col-sm-3 control-label">NIP</label>

                  <div class="col-sm-4">                    
                    <input name="nip" type="text" class="form-control" id="nip" placeholder="NIP" value="<?php echo isset($data) ? $data->nip : ''; ?>" <?php echo $tombol == 'Simpan' ? 'readonly' : '';?> oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="18" pattern=".{18}" title="hanya mengandung angka dan panjang 18 digit" required>
                  </div>
                </div>
                <!-- NAMA -->
                <div class="form-group">
                  <label for="nama" class="col-sm-3 control-label">Nama</label>

                  <div class="col-sm-9">
                    <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama" value="<?php echo isset($data) ? $data->nama : ''; ?>" pattern="[a-zA-Z.,\s]{1,}" title="Nama hanya boleh mengandung huruf dan titik" required>
                  </div>
                </div>
                <!-- TEMPAT, TANGGAL LAHIR -->
                <div class="form-group">
                  <label for="tempat_lahir" class="col-sm-3 control-label">Tempat Lahir</label>

                  <div class="col-sm-4">
                    <select name="tempat_lahir" class="form-control select2" style="width: 100%;" required>
                      <option selected disabled>- Tempat Lahir -</option>
                      <?php
                        $list_tempat_lahir = array('Bangkalan','Pamekasan','Sampang','Sumenep');                        
                        foreach ($list_tempat_lahir as $key){
                          $selected = isset($data) ? $data->tempat_lahir == $key ? 'selected' : '' : '';
                          echo '<option '.$selected.'>'.$key.'</option>';
                        }
                      ?>
                      <!-- <option>Bangkalan</option>
                      <option>Sampang</option>
                      <option>Pamekasan</option>
                      <option>Sumenep</option>                       -->
                    </select>
                  </div>

                  <label class="col-sm-2 control-label">Tgl Lahir</label>

                  <div class="col-sm-3">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input name="tanggal_lahir" type="text" class="form-control pull-right" id="datepicker" value="<?php  echo isset($data) ? $data->tanggal_lahir : ''; ?>" data-date-format="dd/mm/yyyy" maxlength="10"  pattern="\d{1,2}/\d{1,2}/\d{4}" title="Masukkan tanggal sesuai format 'dd/mm/yyyy'" required>
                    </div>
                  </div>                                    
                </div>
                <!-- PENDIDIKAN -->
                <div class="form-group">
                  <label for="pendidikan" class="col-sm-3 control-label">Pendidikan</label>

                  <div class="col-sm-4">
                    <select name="pendidikan" id="pendidikan" class="form-control select2" style="width: 100%;" required>
                      <option selected disabled>- Pendidikan -</option>
                      <?php
                        $list_pendidikan = array('S3','S2','S1','SMA','SMP','SD');                        
                        foreach ($list_pendidikan as $key){
                          $selected = isset($data) ? $data->pendidikan == $key ? 'selected' : '' : '';
                          echo '<option '.$selected.'>'.$key.'</option>';
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <!-- PANGKAT -->
                <div class="form-group">
                  <label for="pangkat" class="col-sm-3 control-label">Pangkat</label>

                  <div class="col-sm-4">
                    <select name="pangkat" id="pangkat" class="form-control select2" style="width: 100%;" required>
                      <option selected disabled>- Pangkat -</option>
                      <?php
                        $list_pangkat = array('Pembina Utama Muda','Pembina Tk. I','Pembina','Penata Tk.I','Penata Muda','Penata','Pengatur Muda Tk.I','Pengatur Tk. I','Pengatur Muda','Pengatur','Juru Tk. I','Juru Muda Tk.I','Juru');                        
                        foreach ($list_pangkat as $key){
                          $selected = isset($data) ? $data->pangkat == $key ? 'selected' : '' : '';
                          echo '<option '.$selected.'>'.$key.'</option>';
                        }
                      ?>                      
                    </select>
                  </div>

                  <label for="golongan" class="col-sm-2 control-label">Golongan</label>

                  <div class="col-sm-3">
                    <select name="golongan" id="golongan" class="form-control select2" style="width: 100%;" required>
                      <option selected disabled>- Gol -</option>
                      <?php
                        $list_golongan = array('IV/a','IV/b','IV/c','IV/d','IV/e','III/a','III/b','III/c','III/d','II/a','II/b','II/c','II/d','I/a','I/b','I/c','I/d');                        
                        foreach ($list_golongan as $key){
                          $selected = isset($data) ? $data->golongan == $key ? 'selected' : '' : '';
                          echo '<option '.$selected.'>'.$key.'</option>';
                        }
                      ?>                      
                    </select>
                  </div>
                </div>
                <!-- TMT Pangkat -->
                <div class="form-group">
                  <label for="tmt_pangkat" class="col-sm-3 control-label">TMT Pangkat</label>                  

                  <div class="col-sm-3">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input name="tmt_pangkat" type="text" class="form-control pull-right" id="datepicker2" value="<?php echo (isset($data)) ? $data->tmt_pangkat: ''; ?>" data-date-format="dd/mm/yyyy" maxlength="10" pattern="\d{1,2}/\d{1,2}/\d{4}" title="Masukkan tanggal sesuai format 'dd/mm/yyyy'" required>
                    </div>
                  </div>  
                </div>               
                
                <!-- JABATAN -->
                <div class="form-group">
                  <label for="jabatan" class="col-sm-3 control-label">Jabatan</label>

                  <div class="col-sm-9">
                    <select name="jabatan" id="jabatan" class="form-control select2" style="width: 100%;" required>
                      <option selected disabled>- Jabatan -</option>
                      <?php
                        $list_jabatan = array(
                          'Kepala Dinas LH',
                          'KEPALA BIDANG PELAYANAN TATA LINGKUNGAN',
                          'KEPALA SEKSI PENGENDALIAN KERUSAKAN LINGKUNGAN HIDUP',
                          'KEPALA SEKSI PENGAWASAN LINGKUNGAN HIDUP',
                          'KEPALA SUB. BAGIAN PERENCANAAN DAN EVALUASI',                          
                          'Kabid Pengelolaan Sampah dan Limbah B3',
                          'KABID PENGENDALIAN PENCEMARAN DAN KERUSAKAN LINGKUNGAN',
                          'KASI KASJIAN DAMPAK LH',
                          'KASI PEMELIHARAAN LH DAN MANKAM',
                          'KASI PENANGANAN PENGADUAN DAN PENAATAN HUKUM',
                          'KASUBAG KEUANGAN',                          
                          'Pengawas Kebersihan Jlan dan Selokan',
                          'PENGAWAS LAPANGAN PETUGAS KEBERSIHAN JALAN, SALURAN DAN SELOKAN',
                          'PENGAWAS LAPANGAN PETUGAS PERTAMANAN',
                          'Pramu Kebersihan',
                          'Pramu Taman',
                          'PENGELOLA BAHAN PERENCANAAN',
                          'PENGELOLA SARANA DAN PRASARANA TAMAN',
                          'PENGADMINISTRASI SARANA DAN PRASARANA',
                          'Pengelolaa Laporan keuangan',
                          'Pengadminitrasi Penerimaan',
                          'Penyuluh Lingkungan',
                          'Pengemudi'
                        );                        
                        foreach ($list_jabatan as $key){
                          $selected = isset($data) ? $data->jabatan == $key ? 'selected' : '' : '';
                          echo '<option '.$selected.'>'.$key.'</option>';
                        }
                      ?>
                      <!-- <option>KEPALA BIDANG PELAYANAN TATA LINGKUNGAN</option> -->
                      <!-- <option>Pramu Kebersihan</option> -->
                      <!-- <option>PENGAWAS LAPANGAN PETUGAS PERTAMANAN</option> -->
                      <!-- <option>Pengawas Kebersihan Jlan dan Selokan</option> -->
                      <!-- <option>Kabid Pengelolaan Sampah dan Limbah B3</option> -->
                      <!-- <option>KASI KASJIAN DAMPAK LH</option> -->
                      <!-- <option>PENGELOLA BAHAN PERENCANAAN</option> -->
                      <!-- <option>PENGADMINISTRASI SARANA DAN PRASARANA</option> -->
                      <!-- <option>Penyuluh Lingkungan</option> -->
                      <!-- <option>Pengemudi</option> -->
                      <!-- <option>KABID PENGENDALIAN PENCEMARAN DAN KERUSAKAN LINGKUNGAN</option> -->
                      <!-- <option>Pramu Taman</option> -->
                      <!-- <option>KASI PEMELIHARAAN LH DAN MANKAM</option> -->
                      <!-- <option>KASUBAG KEUANGAN</option> -->
                      <!-- <option>KASI PENANGANAN PENGADUAN DAN PENAATAN HUKUM</option> -->
                      <!-- <option>Pengadminitrasi Penerimaan</option> -->
                      <!-- <option>PENGELOLA SARANA DAN PRASARANA TAMAN</option> -->
                      <!-- <option>PENGAWAS LAPANGAN PETUGAS KEBERSIHAN JALAN, SALURAN DAN SELOKAN</option> -->
                      <!-- <option>KEPALA SEKSI PENGENDALIAN KERUSAKAN LINGKUNGAN HIDUP</option> -->
                      <!-- <option>Pramu Kebersihan</option> -->
                      <!-- <option>KEPALA SUB. BAGIAN PERENCANAAN DAN EVALUASI</option> -->
                      <!-- <option>Pengelolaa Laporan keuangan</option> -->
                      <!-- <option>Pramu Taman</option> -->
                      <!-- <option>KEPALA SEKSI  PENGAWASAN LINGKUNGAN HIDUP</option> -->
                      <!-- <option>PENGAWAS LAPANGAN PETUGAS PERTAMANAN</option> -->
                      <!-- <option>PENGAWAS LAPANGAN PETUGAS PERTAMANAN</option> -->
                      <!-- <option>Kepala Dinas LH</option> -->
                    </select>
                  </div>
                </div>
                <!-- Tahun Pensiun -->
                <div class="form-group">
                  <label for="pensiun" class="col-sm-3 control-label">Tahun Pensiun</label>                  

                  <div class="col-sm-3">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input name="pensiun" type="text" class="form-control pull-right" id="datepicker3" value="<?php echo (isset($data)) ? $data->tahun_pensiun : ''; ?>" data-date-format="dd/mm/yyyy" maxlength="10" pattern="\d{1,2}/\d{1,2}/\d{4}" title="Masukkan tanggal sesuai format 'dd/mm/yyyy'" required>
                    </div>
                  </div>  
                </div>
                <!-- <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Remember me
                      </label>
                    </div>
                  </div>
                </div> -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="col-sm-9 pull-right">
                  <?php
                    if ($tombol == 'Tambah') {
                      echo '<button type="reset" class="btn btn-primary">Reset</button>';
                    }
                  ?>                  
                  <button type="submit" class="btn btn-primary pull-right"><?php echo $tombol;?></button>
                </div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
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
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
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
<!-- Select2 -->
<script src="<?php echo base_url(); ?>asset/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>asset/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>asset/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url(); ?>asset/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url(); ?>asset/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>asset/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url(); ?>asset/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url(); ?>asset/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url(); ?>asset/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>asset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>asset/dist/js/demo.js"></script>

<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
    //Date picker
    $('#datepicker2').datepicker({
      autoclose: true
    })
    //Date picker
    $('#datepicker3').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    /*$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })*/
    //Red color scheme for iCheck
    /*$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })*/
    //Flat red color scheme for iCheck
    /*$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })*/

    //Colorpicker
/*    $('.my-colorpicker1').colorpicker()*/
    //color picker with addon
/*    $('.my-colorpicker2').colorpicker()*/

    //Timepicker
/*    $('.timepicker').timepicker({
      showInputs: false
    })*/
  })
</script>
</body>
</html>
