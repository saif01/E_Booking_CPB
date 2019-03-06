<?php
session_start();
error_reporting(0);
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CPB-IT</title>
		    <!--=== Favicon ===-->
    	<link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon" />

		<link rel="stylesheet" href="login/css/bootstrap.min.css">
		<link href="assets/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="login/css/style.css">
		<!--*************** Font Awesome v.5. ****************-->
		<link href="assets/fontawesom/css/all.css" rel="stylesheet">
<!-- PreLoader Js -->
		<script type="text/javascript">
			window.addEventListener("load", function () {
		    const loader = document.querySelector(".loader");
		    loader.className += " hidden"; // class "loader hidden"
		});
		</script>

		

	</head>
	<body>
		<!-- Preloader -->
		<div class="loader">
		    <img src="login/img/preloader.gif" alt="Loading..." />
		</div>
		
		<div style="background-color: black;">

		<div class="loginBox" id="content">
			<img src="assets/img/logo.png" class="user" >
			<h2 class="text-center">CPB-IT Portal Login</h2>

			

			<form  action="loging_action.php" method="POST">

				<span style="color:red;"><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span> 

				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text bg-warning"><i class="fas fa-user"></i></span>
					</div>
					<input type="text" name="user_login" class="form-control text-center" placeholder="Enter your Login ID" required="required" />

					
				</div>
				<br> 
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text bg-warning"><i class="fas fa-key"></i> <!-- <i class="material-icons" style="">vpn_key</i> --></span>
					</div>
					<input type="password" name="password" class="form-control text-center" placeholder="Enter Your AD Password" required="required" />

					
				</div>
				<br><br>
				<div class="input-group">
					<input type="submit" name="submit" value="Sign In" class="btn btn-outline-light btn-block">
				</div>
			</form>
		</div>

	</div>
	<script src="login/js/jquery-slim.min.js"></script>
	<script src="login/js/popper.min.js"></script>
	<script src="login/js/bootstrap.min.js"></script>


	</body>
</html>
