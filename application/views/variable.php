
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        VARIABLE
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Variable</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
      <div class="col-md-6">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">VARIABLE</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
            <div class="box-body">
              <table class="table">
                <tr>
                  <th>No</th>
                  <th>Variable</th>
                  <th>Region</th>
                  <th>Parameter</th>
                  <th>Label</th>
                  <th>Description</th>
                </tr>
                <?php if(isset($variable)){
                  $no=0;
                  foreach ($variable as $value) {
                    $no++;
                    echo "<tr>";
                    echo "<td>".$no."</td>";
                    echo "<td>".$value['variable']."</td>";
                    echo "<td>".$value['region']."</td>";
                    echo "<td>".$value['parameter']."</td>";
                    echo "<td>".$value['label']."</td>";
                    echo "<td>".$value['description']."</td>";
                    echo "</tr>";
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
          <h3 class="box-title">ADD VARIABLE</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
          <form method="POST" action="<?php echo site_url();?>admin/variable" class="form-horizontal">
            <div class="box-body">
                <div class="form-group">
                  <label for="variable" class="col-sm-4 control-label">Variable</label>
                  <div class="col-sm-7">
                    <input class="form-control" id="variable" type="text" name="variable">
                  </div>
                </div>
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
                  <label for="param" class="col-sm-4 control-label" id="labelparam1">Parameter 1</label>
                  <div class="col-sm-7"> 
                    <input class="form-control" id="param1" type="text" name="param1">
                  </div>
                </div>
                <div class="form-group">
                  <label for="desc" class="col-sm-4 control-label" id="descparam1">Description 1</label>
                  <div class="col-sm-7"> 
                    <textarea class="form-control" id="desc1" type="text" name="desc1"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="param" class="col-sm-4 control-label" id="labelparam2">Parameter 2</label>
                  <div class="col-sm-7">
                    <input class="form-control" id="param2" type="text" name="param2">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="desc" class="col-sm-4 control-label" id="descparam2">Description 2</label>
                  <div class="col-sm-7"> 
                    <textarea class="form-control" id="desc2" type="text" name="desc2"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="param" class="col-sm-4 control-label" id="labelparam3">Parameter 3</label>
                  <div class="col-sm-7">
                    <input class="form-control" id="param3" type="text" name="param3">
                  </div>
                </div>                
                 <div class="form-group">
                  <label for="desc" class="col-sm-4 control-label" id="descparam3">Description 3</label>
                  <div class="col-sm-7"> 
                    <textarea class="form-control" id="desc3" type="text" name="desc3"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="param" class="col-sm-4 control-label" id="labelparam4">Parameter 4</label>
                  <div class="col-sm-7">
                    <input class="form-control" id="param4" type="text" name="param4">
                  </div>
                </div>
                <div class="form-group">
                  <label for="desc" class="col-sm-4 control-label" id="descparam4">Description 4</label>
                  <div class="col-sm-7"> 
                    <textarea class="form-control" id="desc4" type="text" name="desc4"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="param" class="col-sm-4 control-label" id="labelparam5">Parameter 5</label>
                  <div class="col-sm-7">
                    <input class="form-control" id="param5" type="text" name="param5">
                  </div>
                </div>
                <div class="form-group">
                  <label for="desc" class="col-sm-4 control-label" id="descparam5">Description 5</label>
                  <div class="col-sm-7"> 
                    <textarea class="form-control" id="desc5" type="text" name="desc5"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="param" class="col-sm-4 control-label" id="labelparam6">Parameter 6</label>
                  <div class="col-sm-7">
                    <input class="form-control" id="param6" type="text" name="param6">
                  </div>
                </div>
                <div class="form-group">
                  <label for="desc" class="col-sm-4 control-label" id="descparam6">Description 6</label>
                  <div class="col-sm-7"> 
                    <textarea class="form-control" id="desc6" type="text" name="desc6"></textarea>
                  </div>
                </div>

            <!-- /.box-body -->
            </div>
            <div class="box-footer">
              <div>
                <input type="submit" class="btn btn-primary" name="add_var" value="Add Variable">
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
