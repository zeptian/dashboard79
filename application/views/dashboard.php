  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 916px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DASHBOARD
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">dashboard</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
      <div class="col-md-6">
        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">MONTHLY</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body" id="monthly">
            
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
          </div>
          <!-- /.box-footer-->
        </div><!-- /.box -->
      </div><!-- /.col-md-8 -->
      <div class="col-md-6">
        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">REGIONAL</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body" id="regional">
            
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
          </div>
          <!-- /.box-footer-->
        </div><!-- /.box -->
      </div><!-- /.col-md-4 -->
    </div><!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 0.1.0
    </div>
    <strong>Copyright &copy; 2016-2017</strong> All rights
    reserved.
  </footer>
<script type="text/javascript">
$(document).ready(function() {
  var tahun = <?php echo date('Y');?>;
  $.get('<?php echo site_url();?>ajax_graph/monthly', {tahun : tahun},
    function (data) {
      monthly('Jumlah kasus',tahun,data)
    });
  $.get('<?php echo site_url();?>ajax_graph/regional', {tahun : tahun},
    function (data) {
      var region = data.category;
      console.log(region);
      var dat = data.data;
      console.log(dat);
      regional('Jumlah kasus',tahun,region,dat)
    });

  function monthly(dtitle,year,data){
    $('#monthly').highcharts({
      chart: {type: 'line'},
      title: {text: dtitle},
      subtitle: {text: 'Year '+year},
      xAxis: {
        labels:{align:'right',rotation:-90},
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des']
      },
      yAxis: {
          title: {text: ''}
      },
      plotOptions: {
        line: {
          dataLabels: {
          enabled: true
        },
        enableMouseTracking: true
        }
      },
      legend: {
        labelFormatter: function() {
          var total = 0;
          for(var i=this.yData.length; i--;) { total += this.yData[i]; };
          return this.name + ' (Total: ' + total +')';
        }
      },
      tooltip: {
              shared: true,
              crosshairs: true
          },
      credits: {enabled: false},
      series: data
    });
  }
  function regional(dtitle,year,region,data){
    $('#regional').highcharts({
        chart: {type: 'column'},
        title: {text: 'dtitle'},
        subtitle: {text: 'Year '+year},
        xAxis: {
          categories:region,
          labels:{align:'right',rotation:-45}
        },
         plotOptions: {
            series: {cursor: 'pointer'}
        },
        legend: {
          enabled: false,
        labelFormatter: function() {
          var total = 0;
          for(var i=this.yData.length; i--;) { total += this.yData[i]; };
          return this.name + ' (Total: ' + total +')';
        }
    },
    credits: {
        enabled: false
      },
      series: data
      });
  }
})
</script>