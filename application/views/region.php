
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        REGION
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Region</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
      <div class="col-md-6">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">REGION</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
            <div class="box-body">
              <table class="table">
                <tr>
                  <th>No</th>
                  <th>Region</th>
                  <th>Description</th>
                  <th>Name</th>
                </tr>
                <?php if(isset($region_item)){
                  $no=1;
                  $reg = '';
                  foreach ($region_item as $value) {
                    if ($reg != $value['region']) {
                      echo "<tr>";
                      echo "<td>".$no."</td>";
                      echo "<td>".$value['region']."</td>";
                      echo "<td>".$value['description']."</td>";
                      echo "<td> - ".$value['name']."<br>";
                      $reg = $value['region'];
                      $no++;
                    }else{
                      echo " - ".$value['name']."<br>";
                    }
                    //echo "</tr>";
                  }
                  }?>
              </table>
            <!-- /.box-body -->
            </div>
            <div class="box-footer">
              <div>
              </div>
            </div>
            <!-- /.box-footer -->
      </div>
      <!-- /.box -->
      </div>

      <div class="col-md-6">
        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">ADD REGION</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            </div>
          </div>
          <form method="POST" action="<?php echo site_url();?>admin/region/region" class="form-horizontal">
            <div class="box-body">
                <div class="form-group">
                  <label for="region" class="col-sm-4 control-label">Region</label>
                  <div class="col-sm-7">
                    <input class="form-control" id="region" type="text" name="region">
                  </div>
                </div>
                <div class="form-group">
                  <label for="region" class="col-sm-4 control-label">Description</label>
                  <div class="col-sm-7">
                    <textarea name="description" class="col-sm-12"></textarea>
                  </div>
                </div>
            <!-- /.box-body -->
            </div>
            <div class="box-footer">
              <div>
                <input type="submit" class="btn btn-primary" name="add_reg" value="Add Region">
              </div>
            </div>
            <!-- /.box-footer -->
          </form>

        </div>
        <!-- /.box -->

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">ADD ITEM</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
          <form method="POST" action="<?php echo site_url();?>admin/region/item" class="form-horizontal">
            <div class="box-body">
              <div class="form-group">
                <label for="item_region" class="col-sm-4 control-label">Region</label>
                <div class="col-sm-7">
                  <select name="region" class="col-sm-4 form-control">
                    <option></option>
                  <?php if(isset($region)){
                    $no=0;
                    foreach ($region as $value) {
                      $no++;
                      echo "<option>".$value['region']."</option>";
                    }
                  }?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="Name" class="col-sm-4 control-label">Name</label>
                <div class="col-sm-7">
                  <input class="form-control" id="name" type="text" name="name">
                </div>
              </div>
            <!-- /.box-body -->
            </div>
            <div class="box-footer">
              <div>
                <input type="submit" class="btn btn-primary" name="add_item" value="Add Item">
              </div>
            </div>
            <!-- /.box-footer -->
          </form>
      </div>
      <!-- /.box -->
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
              INPUT DATA
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
