
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SETTING 
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Setting</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
      <div class="col-md-6">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">GENERAL</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
          <form method="POST" action="<?php echo site_url();?>admin/setting" class="form-horizontal">
            <div class="box-body">
                <div class="form-group">
                  <label for="tittle" class="col-sm-2 control-label">Tittle</label>
                  <div class="col-sm-7">
                    <input class="form-control" id="tittle" type="text" name="tittle" value="<?php echo $data[0]['val'];?>">
                  </div>
                </div>
            <!-- /.box-body -->
            </div>
            <div class="box-footer">
              <div>
                <input type="submit" class="btn btn-primary" name="save" value="save">
              </div>
            </div>
            <!-- /.box-footer -->
          </form>
      </div>
      <!-- /.box -->
      </div>
      <div class="col-md-6">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">ACCOUNT</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
          <div class="box-body">
              <table class="table">
                <tr>
                  <th>No</th>
                  <th>User</th>
                  <th>Status</th>
                </tr>
                <?php 
                  if ($user) {
                    $no = 1;
                    foreach ($user as $user) {
                      echo "<tr><td>".$no."</td><td>".$user['username']."</td><td>".$user['status']."</td></tr>";
                      $no++;
                    }
                  }
                ?>
              </table>
          <!-- /.box-body -->
          </div>
          <div class="box-footer">
            <div>
              <a href="#" class="btn btn-primary add_account">Add Account</a>
            </div>
          </div>
          <!-- /.box-footer -->
      </div>
      </div><!-- /.box -->
      </div> <!-- row -->
      <div class="row">
        <div class="col-md-6">
        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">DASHBOARD</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            </div>
          </div>
            <div class="box-body">
              <form>
                <div class="form-group">
                  <label for="sructure" class="col-sm-2 control-label">Structure</label>
                  <div class="col-sm-7">
                    <select>
                    </select>
                  </div>
                </div>
              </form>
            </div> <!-- /.box-body -->
            <div class="box-footer">
              <div>
                <a href="#" class="btn btn-primary add_account">Save</a>
              </div>
            </div><!-- /.box-footer -->
        </div><!-- /.box -->
        </div>
      </div>
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
              SETTING
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
