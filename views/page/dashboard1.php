
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
                    <i class="fa fa-heart"></i>
                </div>

            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo $total_poliklinik; ?></h3>
                    <p>Total poliklinik</p>
                </div>
                <div class="icon">
                    <i class="fa fa-hospital-o"></i>
                </div>

            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo $total_dokter; ?></h3>
                    <p>Total dokter</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user-md"></i>
                </div>

            </div>
        </div><!-- ./col -->

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo $total_obat; ?></h3>
                    <p>Total obat</p>
                </div>
                <div class="icon">
                    <i class="fa fa-medkit"></i>
                </div>

            </div>
        </div><!-- ./col -->
      </div>

    <!-- Main row -->

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-danger" >
            <div class="box-header with-border">
              <h3 class="box-title">Pendaftaran</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <script>

               function get_dokter() {
                var dokter= $("#kode_dokter").val();
                $.ajax({
                  type : "POST",
                  dataType: "JSON",
                  url : "<?php echo site_url('dashboard/find_dokter'); ?>",
                  data : {get_dokter : dokter},
                  success:function(data){
                    $.each(data, function(i,n){
                      $("#view_dokter").append(
                        '<option value="'+n.kode_dkt+'">'+n.nama_dkt+'</option>'
                      );
                    });
                  }
                })
                $("#view_dokter").empty();
              }

              function cek_pasien(){
                var pasien = $("#kode_pasien").val();
                $.ajax({
                  type: "POST",
                  url : "<?php echo site_url('dashboard/cek_pasien'); ?>",
                  data :  {get_pasien : pasien},
                  success :function(data){
                    if (data == 0){
                      $("#pesan").html("Pasien tidak terdaftar harap daftar dahulu");
                      $("#submit").attr("disabled","true");
                      $("#pesan").addClass("alert alert-danger");
                      $("#pesan").removeClass("alert-success");
                    }else{
                      $("#pesan").html("Pasien telah terdaftar");
                      $("#submit").removeAttr("disabled");
                      $("#pesan").addClass("alert alert-success");
                    }
                  }
                })
              }



            function random_all() {
        var campur = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
        var panjang = 4;
        var prefix = 'P';
        var random_all = '';
        for (var i=0; i<panjang; i++) {
            var hasil = Math.floor(Math.random() * campur.length);
            random_all += campur.substring(hasil,hasil+1);
        }
        document.form_pendaftar.nom_pendaftar.value = "P_"+random_all;
    }
</script>
<div id="tes"><div>
            <form class="form-horizontal" name="form_pendaftar" action="<?php echo  site_url('dashboard/submit_pendaftar'); ?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nomor pendaftar</label>

                  <div class="col-sm-10">
                    <input type="text"  class="form-control" value=""  placeholder="Nomor pendaftar" name="nom_pendaftar" required="true"></span>

                    <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-flat" onClick="random_all()">Generate!</button>
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tanggal pendaftar</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" readonly  placeholder="Tanggal pendaftar" value="<?php echo date('d-m-Y, D'); ?>" name="tangga_pendaftar" required="true">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kode poliklinik</label>

                  <div class="col-sm-10">
                    <select onclick="get_dokter()" id="kode_dokter" name="kode_plk" class="form-control">
                    <?php foreach($kode_poliklinik as $k): ?>
                      <option value="<?php echo $k->kode_plk; ?>"><?php echo $k->kode_plk." -- ".$k->nama_plk; ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kode dokter</label>

                  <div class="col-sm-10">
                    <select name="kod_dokter" class="form-control" id="view_dokter">
                      <option>--Pilih dokter--</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kode pasien</label>

                  <div class="col-sm-10">

                    <input type="text" class="form-control" id="kode_pasien" onClick="cek_pasien()"  placeholder="Kode pasien" name="kod_pasien" required="true">
                    <br>
                    <div id="pesan" role="alert" >

                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Keterangan</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control"  placeholder="Keterangan (Optional)" name="keteranga">
                  </div>
                </div>

              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Biaya admin</label>

                <div class="col-sm-10">
                  <input type="number" class="form-control" value="5000"  placeholder="Dalam rupiah" name="biay" required="true">
                </div>
              </div>
            </div>

              <div class="box-footer">
                <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-default">Reset</button>

              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        </div>



</section><!-- /.content -->


<?php
$this->load->view('page/template/js');
?>

<!--tambahkan custom js disini-->
<!-- jQuery UI 1.11.2 -->

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
