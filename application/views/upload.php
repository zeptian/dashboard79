
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        LAPOR
        <small>SIM KIA</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Upload</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <form method="POST" action="<?php echo site_url();?>admin/upload" enctype="multipart/form-data">
        <div class="box-body">
          <h4>Upload laporan KIA</h4>
            <div class="form-group row">
              <label for="bulan" class="col-sm-1 control-label">Bulan</label>
              <div class="col-sm-3">
                <input class="form-control" id="bulan" type="text" name="bulan">
              </div>
              <label for="Tahun" class="col-sm-1 control-label">Tahun</label>
              <div class="col-sm-3">
                <input class="form-control" id="tahun" type="text" name="tahun">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">File Laporan</label>
              <input type="file" name="kia">
              <p class="help-block">file kia hasil import dari Simpus </p>
            </div>
        <!-- /.box-body -->
        </div>
        <div class="box-footer">
          <div>
            <input type="submit" class="btn btn-primary" name="kirim" value="Kirim">
          </div>
        </div>
        <!-- /.box-footer -->
        </form>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
    <?php if(isset($pesan)){ ?>
    <div class="modal modal-<?php if($pesan_level==3){echo 'success';}elseif($pesan_level==2){echo "warning";}else{echo "danger";}?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">
              INFORMASI UPLOAD
            </h4>
          </div>
          <div class="modal-body">
            <p><?php echo $pesan; ?></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <script type="text/javascript">$('.modal').modal('show')</script>
    <?php } ?>

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong>Copyright &copy; 2016 <a href="http://dinkes.semarangkota.go.id">Dinas Kesehatan Kota Semarang</a>.</strong> All rights
    reserved.
  </footer>
