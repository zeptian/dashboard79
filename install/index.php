<?php
if (!file_exists('application/config/database.php')){ ?>
<!DOCTYPE html>
<html lang="en">
  
 <head>
    <meta charset="utf-8">
    <title>DASHBOARD 79</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="asset/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="asset/css/skins/_all-skins.min.css">


    <!-- jQuery 2.2.3 -->
    <script src="asset/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="asset/js/bootstrap.min.js"></script>
    <!-- highcharts -->
    <script src="asset/plugins/highcharts/highcharts.js"></script>
    <!-- AdminLTE App -->
    <script src="asset/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="asset/js/demo.js"></script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page" onload="countDown()">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>DASHBOARD</b>79</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">APPLICATION NOT CONFIGURED YET <br></p>
    <p class="text-center">Please wait while instalation</p>
    <h1 class="text-center" id="timer"></h1>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
</body>
</html>
<script type="text/javascript">
    var counter = 10;
    function countDown()
    {
        if(counter>=0)
        {
            document.getElementById("timer").innerHTML = counter;
        }else{
            window.location.replace("install/install.php");
        }
        counter -= 1; 

        var counter2 = setTimeout("countDown()",1000);
        return;
    }
    
</script>

<?php
die();
}
?>