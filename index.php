<?php
session_start();
error_reporting(0);
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CPB</title>
		    <!--=== Favicon ===-->
    	<link rel="shortcut icon" href="loginAssets/cpb.ico" type="image/x-icon" />

		<link rel="stylesheet" href="loginAssets/css/bootstrap.min.css">
		<link href="assets/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="loginAssets/css/style.css">
		<!--*************** Font Awesome v.5. ****************-->
		<link href="assets/fontawesom/css/all.css" rel="stylesheet">

	</head>
	<body>
		<div id="loader"></div>
		<div class="loginBox" id="content">
			<img src="loginAssets/img/logo.png" class="user" >
			<h2 class="text-center">Log In Here</h2>

			

			<form action="loging_action.php" method="POST">

				<span style="color:red;"><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span> 

				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text bg-warning"><i class="fas fa-user"></i></span>
					</div>
					<input type="text" name="user_login" class="form-control text-center" placeholder="Enter your Login ID" >
				</div>
				<br> 
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text bg-warning"><i class="fas fa-key"></i> <!-- <i class="material-icons" style="">vpn_key</i> --></span>
					</div>
					<input type="password" name="password" class="form-control text-center" placeholder="Enter your password" >
				</div>
				<br><br>
				<div class="input-group">
					<input type="submit" name="submit" value="Sign In" class="btn btn-outline-light btn-block">
				</div>
			</form>
		</div>
	<script src="js/jquery-slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
	var loader;
	function load(opacity){
		if (opacity <= 0) {
			displayContent();
		}
		else{
			loader.style.opacity=opacity;
			window.setTimeout(function(){
				load(opacity - 0.05)
			},100);
		}
	} 
	function displayContent(){
		loader.style.display='none';
		document.getElementById('content').style.display='block';
	}
	document.addEventListener("DOMContentLoaded",function(){
		loader=document.getElementById('loader');
		load(1);
	})
</script>
	</body>
</html>
