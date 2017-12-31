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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-3.2.1/dt-1.10.16/r-2.2.1/datatables.min.css"/>
 
<script>
function hapus_confirm(){
  var msg;
  msg= "Apakah Anda Kemed Yakin Akan Menghapus Data ? " ;
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
                    <h3><?php echo $total_dataobat; ?></h3>
                    <p>Total obat</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>

            </div>

        </div><!-- ./col -->
              <a id="add_obat" class="btn btn-app">
                <i class="fa fa-plus-square"></i> Tambah obat
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
          <form class="form-horizontal" action="<?php echo  site_url('datamaster/submit_dataobat'); ?>" method="post">
            <div class="box-body">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Nama obat</label>

                <div class="col-sm-10">
                  <input type="text" class="form-control"  placeholder="Nama obat" name="nam_obat" required="true">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Jenis obat</label>

                <div class="col-sm-10">
                  <input type="Jenis obat" class="form-control"  placeholder="Jenis obat" name="jeni_obat" required="true">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Kategori</label>

                <div class="col-sm-10">
                  <input type="Kategori" class="form-control"  placeholder="Kategori" name="kategor" required="true">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Harga obat</label>

                <div class="col-sm-10">
                  <input type="number" class="form-control"  placeholder="Harga (dalam Rupiah)" name="harg_obat">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Jumlah obat</label>

                <div class="col-sm-10">
                  <input type="number" class="form-control"  placeholder="Jumlah obat" name="jumla_obat" required="true">
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
<script>
function search_data(){
  var data = $("#val_search").val();
  $.ajax({
    type : "POST",
    dataType: "JSON",
    url : "<?php echo site_url('datamaster/search_dataobat'); ?>",
    data : {val_search : data},
    success : function(data){
      console.log(data);
      $.each(data, function(i,n){
        $("#test").append(
          '<td>'+n.kode_obat+'</td><td>'+n.nama_obat+'</td>'
        );
      });
    }
  })
$("#test").empty();
  
}
</script> 

    <div class="row">
      <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table Obat</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
</div><!-- /.row -->

              <table class="table table-bordered table-striped" id="table">
                <thead>

                <tr>
                  <th>Kode obat</th>
                  <th>Nama obat</th>
                  <th>Jenis obat</th>
                  <th>Kategori</th>
                  <th>Harga</th>
                  <th>Jumlah obat</th>
                  <th>Action</th>
                </tr>

                </thead>
                <tbody>
                  <?php foreach($query as $k): ?>
                <tr id="test">
                  <td><?php echo $k->kode_obat; ?></td>
                  <td><?php echo $k->nama_obat; ?></td>
                  <td><?php echo $k->jenis_obat; ?></td>
                  <td><?php echo $k->kategori; ?></td>
                  <td><?php num_format($k->harga_obat); ?></td>
                  <td><?php echo $k->jumlah_obat; ?></td>
                  <td><a class="btn btn-primary" href="<?php echo site_url('datamaster/edit_obat/'. ency($k->kode_obat)); ?>" role="button"><i class="fa fa-edit"></i>Edit</a> <a id="hapus_obat" href="<?php echo site_url ("datamaster/hapus_obat/".ency($k->kode_obat)); ?>" onClick="return hapus_confirm()" href="javascript::void(0)" class="btn btn-danger" role="button"><i class="fa fa-remove"></i> Hapus</a></td>
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
	$("#table").DataTable();
})
</script>
<!-- <script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>" type="text/javascript"></script> -->
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
