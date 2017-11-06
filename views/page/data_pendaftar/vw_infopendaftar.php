<?php
$this->load->view('page/template/head');
?>

<!--tambahkan custom css disini-->
<!-- iCheck -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/flat/blue.css') ?>" rel="stylesheet" type="text/css" />
<!-- Morris chart -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/morris/morris.css') ?>" rel="stylesheet" type="text/css" />
<!-- jvectormap -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-1.2.2.css') ?>" rel="stylesheet" type="text/css" />
<!-- Date Picker -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datepicker/datepicker3.css') ?>" rel="stylesheet" type="text/css" />
<!-- Daterange picker -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/daterangepicker/daterangepicker-bs3.css') ?>" rel="stylesheet" type="text/css" />
<!-- bootstrap wysihtml5 - text editor -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>" rel="stylesheet" type="text/css" />

<?php
$this->load->view('page/template/topbar');
$this->load->view('page/template/sidebar');
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php foreach($query as $k): ?>
      Info
      <small><?php echo $k->nomor_pdf; ?></small>
  </h1>
  <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">info</li>
  </ol>

</section>
<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-mouse-pointer"></i>

              <h3 class="box-title">Info pendaftaran</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <dl class="dl-horizontal">
                <dt>Nomor pendaftaran</dt>
                <dd><?php echo $k->nomor_pdf; ?></dd>
                <dt>Tanggal pendaftaran</dt>
                <dd><?php echo $k->tanggal_pdf; ?></dd>
                <dt>Dokter yang menangani</dt>
                <dd><?php echo $k->nama_dkt; ?></dd>
                <dt>Poliklinik terdaftar</dt>
                <dd><?php echo $k->kode_plk; ?></dd>
              </dl>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-heart"></i>

              <h3 class="box-title">Tentang pasien yang satu ini</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <dl class="dl-horizontal">
                <dt>Kode pasien</dt>
                <dd><?php echo $k->kode_psn; ?></dd>
                <dt>Nama pasien</dt>
                <dd><?php echo $k->nama_psn; ?></dd>
                <dt>Alamat pasien</dt>
                <dd><?php echo $k->alamat_psn; ?></dd>
                <dt>Gender</dt>
                <dd><?php echo $k->gender_psn; ?></dd>
                <dt>Umur</dt>
                <dd><?php echo $k->umur_psn; ?></dd>
                <dt>No telp</dt>
                <dd><?php echo $k->telepon_psn; ?></dd>
              </dl>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-user-md"></i>

              <h3 class="box-title">Tentang dokter yang satu ini</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <dl class="dl-horizontal">
                <dt>Kode dokter</dt>
                <dd><?php echo $k->kode_dkt; ?></dd>
                <dt>Nama dokter</dt>
                <dd><?php echo $k->nama_dkt; ?></dd>
                <dt>Spesialis</dt>
                <dd><?php echo $k->spesialis; ?></dd>
                <dt>Alamat dokter</dt>
                <dd><?php echo $k->alamat_dkt; ?></dd>
                <dt>Telepon dokter</dt>
                <dd><?php echo $k->telepon_dkt; ?></dd>
                <dt>Kode poliklinik</dt>
                <dd><?php echo $k->kode_plk; ?></dd>
                <dt>Tarif</dt>
                <dd><?php echo num_format($k->tarif); ?>, Belum termasuk Ppn</dd>
              </dl>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->

        </div>
      </div>
<?php endforeach; ?>


</section><!-- /.content -->

<script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>" type="text/javascript"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Morris.js charts -->
<script src="<?php echo base_url('assets/js/raphael-min.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/morris/morris.min.js') ?>" type="text/javascript"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/sparkline/jquery.sparkline.min.js') ?>" type="text/javascript"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/knob/jquery.knob.js') ?>" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/daterangepicker/daterangepicker.js') ?>" type="text/javascript"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datepicker/bootstrap-datepicker.js') ?>" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/icheck.min.js') ?>" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/pages/dashboard.js') ?>" type="text/javascript"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/demo.js') ?>" type="text/javascript"></script>

<?php
$this->load->view('page/template/foot');
?>
