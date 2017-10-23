

<!-- Content Header (Page header) -->
<section class="content-header" id="tambah_obat">
<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo  site_url('datamaster/submit_dataobat'); ?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama obat</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control"  placeholder="Nama obat" name="nam_obat">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Jenis obat</label>

                  <div class="col-sm-10">
                    <input type="Jenis obat" class="form-control"  placeholder="Jenis obat" name="jeni_obat">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kategori</label>

                  <div class="col-sm-10">
                    <input type="Kategori" class="form-control"  placeholder="Kategori" name="kategor">
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
                    <input type="number" class="form-control"  placeholder="Jumlah obat" name="jumla_obat">
                  </div>
                </div>
              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-default">Reset</button>
                <button id="hide" type="submit" class="btn btn-warning">Sembunyikan</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <script>
      $().ready(function({
        $("#hide").click(function(){
          $("#tambah_obat").hide();
        });
      });
    });
      </script>


</section><!-- /.content -->
