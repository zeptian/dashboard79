<!DOCTYPE html>
<html lang="en">
  
 <head>
    <meta charset="utf-8">
    <title>DASHBOARD 79</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../asset/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../asset/css/skins/_all-skins.min.css">


    <!-- jQuery 2.2.3 -->
    <script src="../asset/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="../asset/js/bootstrap.min.js"></script>
    <!-- highcharts -->
    <script src="../asset/plugins/highcharts/highcharts.js"></script>
    <!-- AdminLTE App -->
    <script src="../asset/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../asset/js/demo.js"></script>

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

<?php

if (isset($_POST['step1'])) {

//STEP 1 CREATING DATABASE

ini_set('display_errors', 0);
$connect=mysqli_connect($_POST['hostname'],$_POST['username'],$_POST['password']);
$db=mysqli_query($connect,"CREATE DATABASE ".$_POST['database']."");
$connect=mysqli_connect($_POST['hostname'],$_POST['username'],$_POST['password'],$_POST['database']);
if ($db) {
$admin = "CREATE TABLE admin (id_admin int(11) NOT NULL AUTO_INCREMENT, username varchar(255) NOT NULL, password varchar(255) NOT NULL, status varchar(255) NOT NULL, PRIMARY KEY (id_admin),
  UNIQUE KEY username (username));";
$admin_tbl = mysqli_query($connect,$admin);
$data = "CREATE TABLE data (id_data int(11) NOT NULL AUTO_INCREMENT,variable varchar(255) NOT NULL,region varchar(255) NOT NULL,date date NOT NULL,param1 int(11) DEFAULT NULL,param2 int(11) DEFAULT NULL,param3 int(11) DEFAULT NULL,param4 int(11) DEFAULT NULL,param5 int(11) DEFAULT NULL,
  param6 int(11) DEFAULT NULL,PRIMARY KEY (id_data));";
$data_tbl = mysqli_query($connect,$data);
$region = "CREATE TABLE region (id_region int(11) NOT NULL AUTO_INCREMENT,region varchar(255) NOT NULL,description varchar(255) NOT NULL,name varchar(255) NOT NULL,PRIMARY KEY (id_region));";
$region_tbl = mysqli_query($connect,$region);
$setting = "CREATE TABLE setting (id_setting int(11) NOT NULL AUTO_INCREMENT, setting varchar(255) NOT NULL, description varchar(255) NOT NULL, val varchar(255) NOT NULL, PRIMARY KEY (id_setting));";
$setting_tbl = mysqli_query($connect,$setting);
$setting_value = "INSERT INTO setting (id_setting, setting, description, val) VALUES(1,	'tittle',	'Judul Kepala Dashboard',	'Dinas Kesehatan Kota Semarang');";
mysqli_query($connect,$setting_value);
$variable = "CREATE TABLE variable (id_variable int(11) NOT NULL AUTO_INCREMENT,variable varchar(255) NOT NULL,region varchar(255) NOT NULL,parameter varchar(255) NOT NULL,label varchar(255) NOT NULL,description varchar(255) NOT NULL,PRIMARY KEY (id_variable));";
$variable_tbl = mysqli_query($connect,$variable);
}
if ($connect) {
?>
  <div style="background-color: white; padding: 5px; border-bottom: 3px solid #666;">
  	<strong style="padding: 15px; text-align: left;">STEP 2</strong>
  </div>
  <div class="login-box-body">
    <h4 class="text-success">CONNECTED TO MYSQL SERVER</h4>
    <?php if($db){
    	echo "<h4 class='text-success'>DATABASE CREATED </h4>";
    	echo $admin_tbl?"<h4 class='text-success'>TABLE admin CREATED </h4>":"<h4 class='text-danger'> FAILED TO CREATE TABLE admin </h4>";
    	echo $data_tbl?"<h4 class='text-success'>TABLE data CREATED </h4>":"<h4 class='text-danger'> FAILED TO CREATE TABLE data </h4>";
    	echo $region_tbl?"<h4 class='text-success'>TABLE region CREATED </h4>":"<h4 class='text-danger'> FAILED TO CREATE TABLE region </h4>";
    	echo $variable_tbl?"<h4 class='text-success'>TABLE variable CREATED </h4>":"<h4 class='text-danger'> FAILED TO CREATE TABLE variable </h4>";
    	echo $setting_tbl?"<h4 class='text-success'>TABLE setting CREATED </h4>":"<h4 class='text-danger'> FAILED TO CREATE TABLE setting </h4>";
    	echo "<form action='' method='post'> <div class='row'>
        <div class='col-xs-4'>
        	<input type='hidden' name='hostname' value='".$_POST['hostname']."'>
        	<input type='hidden' name='username' value='".$_POST['username']."'>
        	<input type='hidden' name='password' value='".$_POST['password']."'>
        	<input type='hidden' name='database' value='".$_POST['database']."'>
        	<button type='submit' name='step2' class='btn btn-primary btn-block btn-flat'>NEXT</button>
        </div><!-- /.col --></div></form>";
    }else{
    	echo "<h4 class='text-danger'>FAILED CREATE DATABASE </h4>";
    	echo "<div class='row'>
    		<div class='col-xs-4'>
    			<button class='btn btn-primary btn-block btn-flat' onclick='refresh()'>BACK</button>
	    	</div>
	    </div>";
    	}?>
  </div>
  <!-- /.login-box-body -->

<?php }else{ ?>
  <div style="background-color: white; padding: 5px; border-bottom: 3px solid #666;">
  	<strong style="padding: 15px; text-align: left;">STEP 2</strong>
  </div>
  <div class="login-box-body">
    <h3 class="login-box-msg">FAILED TO CONNECT MYSQL SERVER</h3>
    <p class="login-box-msg text-danger">Setting provided is wrong</p>
    <div class='row'>
    	<div class='col-xs-4'>
    		<button class='btn btn-primary btn-block btn-flat' onclick='refresh()'>BACK</button>
    	</div>
    </div>
  </div>
  <!-- /.login-box-body -->
<?php
} ?>
</div>
<!-- /.login-box -->
</body>
<script type="text/javascript">
    var counter = 3;
    function countDown()
    {
        if(counter>=0)
        {
            document.getElementById("timer").innerHTML = counter;
        }else{
        	var result = "<?php echo $connect?'CONNECTED':"ERROR NOT CONNECTED <br><div class='row'><div class='col-xs-4'> <button class='btn btn-primary btn-block btn-flat' onclick='refresh()'>BACK</button></div></div> "?>"
            document.getElementById("timer").innerHTML = result;
        }
        counter -= 1; 

        var counter2 = setTimeout("countDown()",1000);
        return;
    }
    function refresh() {
    	window.location.replace("install.php");
    }
    
</script>

</html>
<?php
exit();

}elseif(isset($_POST['step2'])) {
	
// STEP 2 Create file config/database.php
$file_config = fopen('../application/config/database.php', 'w+');
fwrite($file_config, "<?php \r\n");
fwrite($file_config, "defined('BASEPATH') OR exit('No direct script access allowed'); \r\n");
fwrite($file_config, "\$active_group = 'default'; \r\n");
fwrite($file_config, "\$query_builder = TRUE; \r\n");
fwrite($file_config, "\$db['default'] = array( \r\n");
fwrite($file_config, "	'dsn'	=> '', \r\n");
fwrite($file_config, "	'hostname' => '".$_POST['hostname']."', \r\n");
fwrite($file_config, "	'username' => '".$_POST['username']."', \r\n");
fwrite($file_config, "	'password' => '".$_POST['password']."', \r\n");
fwrite($file_config, "	'database' => '".$_POST['database']."', \r\n");
fwrite($file_config, "	'dbdriver' => 'mysqli', \r\n");
fwrite($file_config, "	'dbprefix' => '', \r\n");
fwrite($file_config, "	'pconnect' => FALSE, \r\n");
fwrite($file_config, "	'db_debug' => (ENVIRONMENT !== 'production'), \r\n");
fwrite($file_config, "	'cache_on' => FALSE, \r\n");
fwrite($file_config, "	'cachedir' => '', \r\n");
fwrite($file_config, "	'char_set' => 'utf8', \r\n");
fwrite($file_config, "	'dbcollat' => 'utf8_general_ci', \r\n");
fwrite($file_config, "	'swap_pre' => '', \r\n");
fwrite($file_config, "	'encrypt' => FALSE, \r\n");
fwrite($file_config, "	'compress' => FALSE, \r\n");
fwrite($file_config, "	'stricton' => FALSE, \r\n");
fwrite($file_config, "	'failover' => array(), \r\n");
fwrite($file_config, "	'save_queries' => TRUE \r\n");
fwrite($file_config, "); \r\n");
fclose($file_config);
?>
  <div style="background-color: white; padding: 5px; border-bottom: 3px solid #666;">
  	<strong style="padding: 15px; text-align: left;">STEP 3</strong>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">CREATE ACCOUNT</p>
    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="username_acc" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-home form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password_acc" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
        	<input type='hidden' name='hostname' value='<?php echo $_POST['hostname']; ?>'>
        	<input type='hidden' name='username' value='<?php echo $_POST['username']; ?>'>
        	<input type='hidden' name='password' value='<?php echo $_POST['password']; ?>'>
        	<input type='hidden' name='database' value='<?php echo $_POST['database']; ?>'>
          <button type='submit' name='step3' class='btn btn-primary btn-block btn-flat'>NEXT</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
<?php
exit();
}elseif(isset($_POST['step3'])) {
	$connect=mysqli_connect($_POST['hostname'],$_POST['username'],$_POST['password'],$_POST['database']);
	$account = "INSERT INTO admin(username,password,status) VALUES ('".$_POST['username_acc']."','".md5($_POST['password_acc'])."','ACTIVE')";
	mysqli_query($connect, $account);
?>

  <div class="login-box-body">
    <p class="login-box-msg">INSTALATION FINISH</p>
      <div class="row">
        <div class="col-xs-4">
          <a href="../index.php" class='btn btn-primary btn-block btn-flat'>FINISH</a>
        </div>
        <!-- /.col -->
      </div>
  </div>
  <!-- /.login-box-body -->
<?php

}else{
?>
  <div style="background-color: white; padding: 5px; border-bottom: 3px solid #666;">
  	<strong style="padding: 15px; text-align: left;">STEP 1</strong>
  </div>
  <div class="login-box-body">
    <h3 class="login-box-msg">SETTING</h3>
    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="hostname" class="form-control" placeholder="hostname">
        <span class="glyphicon glyphicon-home form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="database" class="form-control" placeholder="Database">
        <span class="glyphicon glyphicon-hdd form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" name="step1" class="btn btn-primary btn-block btn-flat">NEXT</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
</body>
</html>
<?php } ?>