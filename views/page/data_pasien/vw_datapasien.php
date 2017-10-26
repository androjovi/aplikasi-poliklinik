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
                    <h3><?php echo $total_pasien; ?></h3>
                    <p>Total pasien</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>

            </div>

        </div><!-- ./col -->
              <a id="add_obat" class="btn btn-app">
                <i class="fa fa-plus-square"></i> Tambah pasien
              </a>
      </div>

      <div id="tampil_addobat" style="display:none;">

        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-danger" >
                <div class="box-header with-border">
                  <h3 class="box-title">Tambah data</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="<?php echo  site_url('datamaster/submit_datapasien'); ?>" method="post">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama pasien</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control"  placeholder="Nama pasien" name="nam_psn" required="true">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Alamat pasien</label>

                      <div class="col-sm-10">
                        <textarea name="alamat" placeholder="Alamat..." class="form-control" required="true"></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Jenis kelamin</label>

                      <div class="col-sm-10">
                        <select name="jenis_kelamin" class="form-control" required="true">
                          <option disabled="true">--Pilih--</option>
                          <option value="laki-laki">Laki - laki</option>
                          <option value="perempuan">Perempuan</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Umur</label>

                      <div class="col-sm-10">
                        <input type="number" class="form-control"  placeholder="Umur" name="umu" required="true">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">No telp</label>

                      <div class="col-sm-10">
                        <input type="number" class="form-control"  placeholder="Nomor telepon" name="n_telp" required="true">
                      </div>
                    </div>
                  </div>

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>

                  </div>
                </form>
              </div>
              <!-- /.box -->
            </div>
            </div>

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
                  <th>Kode pasien</th>
                  <th>Nama pasien</th>
                  <th>Alamat pasien</th>
                  <th>Jenis kelamin</th>
                  <th>Umur</th>
                  <th>Telepon</th>
                  <th>Action</th>
                </tr>

                </thead>
                <tbody>
                  <?php foreach($query as $k): ?>
                <tr id="test">
                  <td><?php echo $k->kode_psn; ?></td>
                  <td><?php echo $k->nama_psn; ?></td>
                  <td><?php echo $k->alamat_psn; ?></td>
                  <td><?php echo $k->gender_psn; ?></td>
                  <td><?php echo $k->umur_psn; ?></td>
                  <td><?php echo $k->telepon_psn; ?></td>
                  <td><a class="btn btn-primary" href="<?php echo site_url('datamaster/edit_pasien/'. ency($k->kode_psn)); ?>" role="button"><i class="fa fa-edit"></i>Edit</a> <a class="btn btn-danger" onClick="return hapus_confirm()" href="<?php echo site_url('datamaster/delete_pasien/'. ency($k->kode_psn)); ?>" role="button"><i class="fa fa-remove"></i>Hapus</a>  </td>
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
