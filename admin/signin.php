<?php include 'signinscript.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Panel|Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="signin/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="signin/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="signin/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="signin/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="signin/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="signin/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="signin/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="signin/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="signin/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="signin/css/util.css">
	<link rel="stylesheet" type="text/css" href="signin/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post">
					
					<span class="login100-form-title p-b-48">
						<?php
						$query = "SELECT * FROM `company` ";
						$result = mysqli_query($connect, $query);
						while($row = mysqli_fetch_array($result))
						{
							echo '<img src="data:image/jpeg;base64,'.base64_encode($row['logo'] ).'" width="100%" height="auto" />';
							
						   }
						?>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn btn-info" type="submit"  name="btn-login" formaction="signinscript.php">
								Login
							</button>
						</div>
						
						</div>
						<br>
						<p style="color:red;">All Right Reserved by <a href="https://www.bluehat-techno.com">Bluehat-Techno</a></p>
					
<?php
if(isset($msg)){
    echo $msg;
}
?>
					
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="signin/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="signin/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="signin/vendor/bootstrap/js/popper.js"></script>
	<script src="signin/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="signin/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="signin/vendor/daterangepicker/moment.min.js"></script>
	<script src="signin/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="signin/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="signin/js/main.js"></script>

</body>
</html>