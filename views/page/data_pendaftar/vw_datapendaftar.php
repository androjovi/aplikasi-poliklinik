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
<script>
function hapus_confirm(){
  var msg;
  msg= "Apakah Anda Yakin Akan Menghapus Data ? " ;
  var agree=confirm(msg);
  if (agree)
  return true ;
  else
  return false ;
}
</script>
<?php
$this->load->view('page/template/topbar');
$this->load->view('page/template/sidebar');
?>

<!-- Content Header (Page header) -->

<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php echo $total_pendaftar; ?></h3>
                    <p>Total pendaftar</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>

            </div>

        </div><!-- ./col -->
              <a id="add_obat" href="<?php echo site_url('dashboard'); ?>" class="btn btn-app">
                <i class="fa fa-plus-square"></i> Pendaftar
              </a>
      </div>

    <div class="row">
      <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table Obat</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
    <div class="input-group">
      <form action="<?php echo site_url('datamaster/cari_dataobat'); ?>" method="post" id="form">
      <input id="val_search" type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button id="search" class="btn btn-default" type="button">Go!</button>
      </form>
      </span>
    </div><!-- /input-group -->

</div><!-- /.row -->

              <table id="example1" class="table table-bordered table-striped">
                <thead>

                <tr>
                  <th>No pendaftaran</th>
                  <th>Tanggal daftar</th>
                  <th>Kode dokter</th>
                  <th>Kode pasien</th>
                  <th>Kode poliklinik</th>
                  <th>Biaya</th>
                  <th>Keterangan</th>
                </tr>

                </thead>
                <tbody>
                  <?php foreach($query as $k): ?>
                <tr id="test">
                  <td><?php echo $k->nomor_pdf; ?></td>
                  <td><?php echo $k->tanggal_pdf; ?></td>
                  <td><?php echo $k->kode_dkt." -- ".$k->nama_dkt; ?></td>
                  <td><?php echo $k->kode_psn." -- ".$k->nama_psn; ?></td>
                  <td><?php echo $k->kode_plk; ?></td>
                  <td><?php echo num_format($k->biaya); ?></td>
                  <td><?php echo $k->alamat_psn; ?></td>
                  <td><a class="btn btn-primary" href="<?php echo site_url('datamaster/info_pendaftar/'. ency($k->nomor_pdf)); ?>" role="button"><i class="fa fa-edit"></i>More info</a> <a class="btn btn-danger" onClick="return hapus_confirm()" href="<?php echo site_url('datamaster/delete_pendaftar/'. ency($k->nomor_pdf)); ?>" role="button"><i class="fa fa-remove"></i>Hapus</a>  </td>
                </tr>
                <?php endforeach; ?>

              </tbody>
              <?php echo $halaman; ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

</section><!-- /.content -->



<?php
$this->load->view('page/template/js');
?>

<!--tambahkan custom js disini-->
<!-- jQuery UI 1.11.2 -->
<script>
$(document).ready(function(){
  $("#add_obat").click(function(){
    $("#tampil_addobat").toggle();
  })


})
</script>
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
