
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        INPUT DATA
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Input</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
    <div class="col-md-12">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">INPUT DATA</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
          <form method="POST" action="<?php echo site_url();?>admin/input" class="form-horizontal">
            <div class="box-body">
              <table class="table" style="width: 70%">
                <tr>
                  <th>Year</th>
                  <th>:</th>
                  <th><input class="form-control" id="year" type="text" name="year"></th>
                </tr>
                <tr>
                  <th>Variable</th>
                  <th>:</th>
                  <th>
                    <select class="form-control" id="variable" name="variable">
                      <option value=""></option>
                      <?php
                        if(isset($variable)){
                          foreach ($variable as $var) {
                            echo "<option value='".$var['variable']."''>".$var['variable']."</option>";
                          }
                        }
                      ?>
                    </select>
                  </th>
                </tr>
                <tr>
                  <th>Region</th>
                  <th>:</th>
                  <th>
                    <select class="form-control" id="region" name="region">
                      <option value=""></option>
                      <?php
                        if(isset($reg)){
                          foreach ($reg as $var) {
                            echo "<option value='".$var['item']."''>".$var['item']."</option>";
                          }
                        }
                      ?>
                    </select>
                  </th>
                </tr>
                </table>
                <table class="table" id='main_form'>
                <tr>
                  <th>Parameter</th>
                  <th>Jan</th>
                  <th>Feb</th>
                  <th>Mar</th>
                  <th>Apr</th>
                  <th>Mei</th>
                  <th>Jun</th>
                  <th>Jul</th>
                  <th>Ags</th>
                  <th>Spt</th>
                  <th>Oct</th>
                  <th>Nov</th>
                  <th>Des</th>
                </tr>
                <tr>
                  
                </tr>
                </div>
              </table>
            <!-- /.box-body -->
            </div>
            <div class="box-footer">
              <div>
                <input type="hidden" name="action" value="insert">
                <input type="submit" class="btn btn-primary" name="save" value="Save">
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
  <script type="text/javascript">
  $('#variable').change(function() {
    var variable = document.getElementById('variable').value;
    $.get('<?php echo site_url();?>ajax/region_variable',
      {variable:variable},
      function(data){
        $('#region').html(data);
      })
    $.get('<?php echo site_url();?>ajax/item_variable',
      {variable:variable},
      function(data){
        $('#main_form').html(data);
      })
  })
  $('#region').change(function() {
    var variable = document.getElementById('variable').value;
    var region = document.getElementById('region').value;
    var year = document.getElementById('year').value;
    $.get('<?php echo site_url();?>ajax/region_data',
      {variable:variable,year:year,region:region},
      function(data){
        if (data!=null) {
          for (var i = 0; i <= data.length; i++) {
            for (var key in data[i]) {
                $("input[name='action']").val('update');
                $("input[name='"+key+"[]'][class='form-control month"+(i+1)+"']").val(data[(i)][key]);
             }
          }
        }else{
          $("input[name='action']").val('insert');
          for (var i = 1; i < 13; i++) {
            for (var j = 1; j < 7; j++) {
                $("input[name='param"+j+"[]'][class='form-control month"+i+"']").val('');
            }
          }
        }
      })
  })
  </script>