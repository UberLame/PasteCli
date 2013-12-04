<?php include('config.php') ?>
<?php
$config = new config();
@$data= $_REQUEST['code'];
if(isset($data)&&!empty($data)){

$config->paste($data , $_SERVER['REMOTE_ADDR']);

}


?>
<!doctype html>
<html>
<head>
<title>Website under construction....</title>
<script type='text/javascript' src='../jquery.js'></script>
<link rel='stylesheet' type='text/css' href='main.css'/>
</head>
<body>
<center>
<div id='links'>
<a href='javascript:void(0)'>Testlink</a>
<a href='javascript:void(0)'>Testlink</a>
<a href='javascript:void(0)'>Testlink</a>
</div>
<br/><br/><br/>
<div id='container'>
<?php 
if(isset($_GET['view_id'])){

$row = $config->view($_GET['view_id']);
echo 'Date posted: <b>',$row['date'],'</b><br/>'.'<div id=\'code\'><code>'.$row['paste'].'</code></div>';
}else{?>
<form action="<?=$_SERVER['PHP_SELF'];?>" method='POST'>
<textarea name='code'></textarea><br/>
<input type='submit' value='paste'/>
</form>
<?}?>
</div>
</center>
</body>
</html>
