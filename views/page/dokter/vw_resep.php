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
<script>
    
        function select_obat(){
        var kategori = $("#kategori_obat").val();
        console.log(kategori);
        $.ajax({
            type : "POST"  ,
            dataType : "JSON",
            url : "<?php echo site_url('dokter/pilih_obat'); ?>",
            data : {cat_obat : kategori},
            success:function(data){
                $.each(data, function(i,n){
                    $("#view_obat").append(
                        '<option value="'+n.kode_obat+'">'+n.nama_obat+'</option>'
                    );
                });
            }
        });
        $("#view_obat").empty();
        
    }
</script>

<!-- Content Header (Page header) -->
<section class="content-header">
<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <!-- left column -->
         <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">General Elements</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                  <!--<label>Pilih kategori obat</label>
                    
                  <select class="form-control" id="kategori_obat" onclick="select_obat()" >
                      <?php foreach ($query_obat as $k): ?>
                    <option value="<?php echo $k->kategori; ?>"><?php echo $k->kategori; ?></option>
                      <?php endforeach; ?>
                  </select>
                    <?php foreach($query as $k): ?>
                    
                    <div class="form-group">
                        
                  <label>Pilih obat</label>
                    <select class="form-control" id="view_obat" name="pilih_pilih_obat">
                    <!-- generated otomatis 
                  </select>
                        -->
                    <form role="form" action="<?php echo site_url('dokter/proses_resep/'.$k->kode_psn); ?>" method="post">
                    <div class="form-group">
                  <label>Diagnosa</label>
                  <textarea name="diagnosa" class="form-control" rows="5" placeholder="Enter ..."></textarea>
                </div>
                    
                </div>    
                <!-- text input -->
                  <p>Kode pasien : <?php echo $k->kode_psn; ?></p>
                  <p>Nama pasien : <?php echo $k->nama_psn; ?></p>
                <div class="form-group">
                  <label>Masukkan resep</label>
                  <textarea name="ket" class="form-control" rows="5" placeholder="Enter ..."></textarea>
                </div>
          <!-- /.box -->
                  <?php endforeach; ?>
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
        </form>        
             </div>
             </div>
        </div>
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
