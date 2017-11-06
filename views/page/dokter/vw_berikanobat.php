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
      <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table Obat <small>Cari berdasarkan kode obat, nama obat, jenis obat atau kategori obat</small></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <script>
              function find_obat(){
                var obat = $("#val_search").val();

                $.ajax({
                  type : "post",
                  dataType : "json",
                  url : "<?php echo site_url('dokter/cari_dataobat') ?>",
                  data : {search_obat : obat},
                  success:function(data){
                    $.each(data,function(i,n){
                    $("#vw_obat").append(
                      '<tr><td>'+n.kode_obat+'</td> <td>'+n.nama_obat+'</td> <td>'+n.jenis_obat+'</td> <td>'+n.kategori+'</td> <td>'+n.harga_obat+'</td> <td>'+n.jumlah_obat+'</td> <td><a id="cek_stok" data-value = '+n.kode_obat+' onClick="cek_stokobat()" href="javascript:void(0)">Cek stok</a></td></tr>'
                    );
                  });
                  }
                })
                $("#vw_obat").empty();

              }
              function cek_stokobat(){
                var cek_stok = $("#cek_stok").attr("data-value");
              $.ajax({
                type : "post",
                dataType : "json",
                url : "<?php echo site_url('dokter/cek_stokobat') ?>",
                data : {kode_obat : cek_stok},
                success:function(data){
                  $.each(data,function(i,n){
                    if (n.jumlah_obat === 0){
                      $("#cek_stok").text(
                        "<p class='text-red'>Stok sedang habis</p>"
                      )
                    }else{
                      $("#cek_stok").html(
                        "<a href='<?php echo site_url(); ?>dokter/add_obat/"+n.kode_obat+"' class='btn btn-primary' role='button'>Tersedia</a>"
                      )
                    }
                });
                }
              })

              }

              </script>
    <div class="input-group">

      <input id="val_search" type="text" class="form-control" placeholder="Cari berdasarkan kode obat, nama obat, jenis obat dan kategori obat" required>
      <span class="input-group-btn">
        <button id="search" class="btn btn-default" type="button" onClick="find_obat()" >Find..</button>

      </span>
    </div><!-- /input-group -->

</div><!-- /.row -->

              <table id="example1" class="table table-bordered table-striped">
                <thead>

                <tr>
                  <th>Kode obat</th>
                  <th>Nama obat</th>
                  <th>Jenis obat</th>
                  <th>Kategori</th>
                  <th>Harga obat</th>
                  <th>Jumlah obat</th>
                  <th>Action</th>
                </tr>

                </thead>
                <tbody id="vw_obat" >

              </tbody>

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
