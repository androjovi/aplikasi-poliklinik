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
        Pembayaran
        <?php foreach($query as $k): $psn = $k->kode_psn; ?>
        <small><?php echo $k->nomor_pdf; ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">pembayaran</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> Poliklinik
          <small class="pull-right"><?php echo date('r'); ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        Data pasien
        <address>
            <?php $kode_psn = $k->kode_psn; ?>
          <strong><?php echo $k->nama_psn; ?></strong><br>
          Gender : <?php echo $k->gender_psn; ?><br>
          Alamat: <?php echo $k->alamat_psn; ?><br>
          Umur : <?php echo $k->umur_psn; ?><br>
          No telp: <?php echo $k->telepon_psn; ?><br>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        Data dokter
        <address>
          <strong><?php echo $k->nama_dkt; ?></strong><br>
          Spesialis : <?php echo $k->spesialis; ?><br>
          <?php echo $k->alamat_dkt; ?><br>
          No telp: <?php echo $k->telepon_dkt; ?><br>
          K_Poli: <?php echo $k->kode_plk; ?>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>No pendaftaran : <?php echo $k->nomor_pdf; ?></b><br>
        <br>
        <b>Nomor bayar:</b> <br>
        <b>Tanggal daftar:</b> <?php echo $k->tanggal_pdf ?><br>
        <b>Petugas:</b> 968-34567
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Qty</th>
            <th>Product</th>
            <th>Serial #</th>
            <th>Description</th>
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
              <?php foreach ( $query2 as $k): $nmr = $k->nomor_resep; ?>
              <tr>
                <td><?php echo $k->qty; ?></td>
                <td></td>
                <td><?php echo $k->nomor_resep; ?></td>
                <td><?php echo $k->detail_resep; ?></td>
                <td><?php echo num_format($k->sub_total); ?></td>
              </tr>
              <?php $total = $k->total_harga; ?>
              <?php endforeach; ?>
          </tbody>
            
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">


        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            
            <input type="text" placeholder="Masukkan nomor kartu berobat"  onchange="alert('Anda mendapatkan diskon 30%')" style="width:100%" class="form-control">
        </p>
          
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
        <p class="lead" >Tanggal <?php echo date('D, d-m-Y'); ?></p>

        <div class="table-responsive">
          <table class="table"> 
            <tr>
              <th style="width:50%">Subtotal:</th>
                
              <td><?php echo num_format($totalharga); ?></td>
            </tr>
            <tr>
              <th>Diskon</th>
              <td></td>
            </tr>
            <tr>
              <th>Total bayar</th>
              <td><?php num_format($totalharga); ?></td>
            </tr>
              <script>
                  
                function hitung_kembali(){
                    var moneyFormat = wNumb({
                        mark: ',',
                        decimals: 0,
                        thousand: '.',
                        prefix: 'Rp. ',
                        suffix: ''
                    });
                    var total = <?php echo $totalharga; ?>;
                    var bayar = $("#bayar").val();
                    var kembali = bayar-total;
                    $("#kembalian").val(moneyFormat.to(kembali));  
                    $("#goback").val(kembali);
                    
                }
              </script>
              <form action="<?php echo site_url("pembayaran/struk/$psn/$nmr"); ?>" method="post">
                  <input type="text" name="kembalian_s" value="" id="goback">
            <tr>
              <th>Bayar : </th>
              <td><input type="text" name="jumlah_bayar" class="form-control" placeholder="Total bayar" id="bayar"> <span class="input-group-btn"><button type="button" class="btn btn-info btn-flat" onclick="hitung_kembali()">Hitung kembalian</button></span></td>
            </tr>
              <tr>
              <th>Kembali</th>
              <td><input type="text" name="jumlah_kembalian" class="form-control" placeholder="Total bayar" value="" id="kembalian"> <span class="input-group-btn"></td>
            </tr>
                  
          </table>
        </div>
            
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
      <div class="col-xs-12">
          <input style="display:none;" name="kode_psn009" type="text" value="<?php echo $kode_psn; ?>">
          <input style="display:none;" name="total009" type="text" value="<?php echo $total; ?>">
        <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
        <input type="submit" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
        <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
          <i class="fa fa-download"></i> Generate PDF
        </button>
      </div>
    </div>
  </section>
      </form>
  <!-- /.content -->
  <div class="clearfix"></div>
</div>
<!-- /.content-wrapper -->
<?php endforeach; ?>
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
