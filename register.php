<!DOCTYPE html><html lang="en">    <head>        <title>Property Management System</title>        <meta charset="UTF-8">        <meta name="viewport" content="width=device-width, initial-scale=1">        <!--===============================================================================================-->        <link rel="icon" type="image/png" href="images/ico.png"/>        <!--===============================================================================================-->        <!--===============================================================================================-->        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">        <!--===============================================================================================-->        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">        <!--===============================================================================================-->        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">        <!--===============================================================================================-->        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">        <!--===============================================================================================-->        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">        <link rel="stylesheet" type="text/css" href="css/util.css">        <link rel="stylesheet" type="text/css" href="css/main.css">        <!--===============================================================================================-->        <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">                <!-- Latest compiled and minified CSS -->        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">        <!-- jQuery library -->        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>        <!-- Latest compiled JavaScript -->        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>    </head><body>		<div class="limiter">		<div class="container-login100">			<div class="wrap-login100">				<div class="login100-pic js-tilt" data-tilt>					<a href="index.php"><img src="images/img-01.png" alt="IMG"></a>				</div>				<form class="login100-form validate-form" method="POST" action="query.php">					<span class="login100-form-title">						Member Registration					</span>					<?php 										if(isset($_GET['usermail'])){						echo '<center><div class="alert alert-danger alert-dismissible" style="width:fit-content;">					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Email and Username duplication</div></center>';					}					if(isset($_GET['user'])){						echo '<center><div class="alert alert-danger alert-dismissible" style="width:fit-content;">					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Username duplication</div></center>';					}					if (isset($_GET['email'])){						echo '<center><div class="alert alert-danger alert-dismissible" style="width:fit-content;">					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Email duplication</div></center>';					}					if(isset($_GET['tryagain'])){						echo '<center><div class="alert alert-danger alert-dismissible" style="width:fit-content;">					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Please try again.</div></center>';					}															?><br>					<div class="wrap-input100 validate-input">						<input class="input100" required type="text" name="fname" placeholder="Your First Name">						<span class="focus-input100"></span>						<span class="symbol-input100">							<i class="fa fa-gratipay" aria-hidden="true"></i>						</span>					</div>					<div class="wrap-input100 validate-input">						<input class="input100" required type="text" name="lname" placeholder="Your Last Name">						<span class="focus-input100"></span>						<span class="symbol-input100">							<i class="fa fa-gratipay" aria-hidden="true"></i>						</span>					</div>					<div class="wrap-input100 validate-input">						<input class="input100" required type="text" name="jobtitle" placeholder="Designation">						<span class="focus-input100"></span>						<span class="symbol-input100">							<i class="fa fa-user" aria-hidden="true"></i>						</span>					</div>					<div class="wrap-input100 validate-input">						<input class="input100" required type="text" name="user" placeholder="Username">						<span class="focus-input100"></span>						<span class="symbol-input100">							<i class="fa fa-user" aria-hidden="true"></i>						</span>					</div>					<div class="wrap-input100 validate-input">												<select class="browser-default custom-select input100" name="gender" id="gender" required="">							<option selected>Please choose Gender</option>							<option class="input100" value="male">Male</option>							<option class="input100" value="female">Female</option>							<option class="input100" value="other">Other</option>						</select>                                            					</div>					<div class="wrap-input100 validate-input">						<input class="input100" required type="number" name="phone" placeholder="Phone">						<span class="focus-input100"></span>						<span class="symbol-input100">							<i class="fa fa-phone" aria-hidden="true"></i>						</span>					</div>					<div class="wrap-input100 validate-input">												<span class="symbol-input100">							<i class="fa fa-home" aria-hidden="true"></i>                                                </span><span class="focus-input100"></span><textarea style="padding-top: 16px;" class="input100" name="address" placeholder="Address"></textarea>					</div>					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">						<input class="input100" type="email" name="email" placeholder="Email" required>						<span class="focus-input100"></span>						<span class="symbol-input100">							<i class="fa fa-envelope" aria-hidden="true"></i>						</span>					</div>					<div class="wrap-input100 validate-input" data-validate = "Password is required">						<input class="input100" type="password" name="pass" placeholder="Password" required minlength="8" id="pass">						<span class="focus-input100"></span>						<span class="symbol-input100">							<i class="fa fa-lock" aria-hidden="true"></i>						</span>					</div>										<div class="wrap-input100 validate-input" data-validate = "Confirmation of Password is required">						<input class="input100" type="password" name="passconfirm" placeholder="Confirm Password" required minlength="8" id="passconfirm" onChange="isPasswordMatch();">						<span class="focus-input100"></span>						<span class="symbol-input100">							<i class="fa fa-lock" aria-hidden="true"></i>						</span>					</div>					<div id="divCheckPassword" style="color:white;"></div>					<div class="container-login100-form-btn">						<input type="hidden" name="register">						<button type="submit" class="login100-form-btn">							Signup						</button>					</div>					<div class="text-center p-t-36">						<a class="txt2" href="index.php">							Already have Account? Login							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>						</a>					</div>				</form>			</div>		</div>	</div>				<!--===============================================================================================-->		<script src="vendor/jquery/jquery-3.2.1.min.js"></script>	<!--===============================================================================================-->	<script src="vendor/bootstrap/js/popper.js"></script>	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>	<!--===============================================================================================-->	<script src="vendor/select2/select2.min.js"></script>	<!--===============================================================================================-->	<script src="vendor/tilt/tilt.jquery.min.js"></script>	<script >		$('.js-tilt').tilt({			scale: 1.1		})	</script>	<!--===============================================================================================-->	<script src="js/main.js"></script>	<script type="text/javascript">		function isPasswordMatch() {			var password = $("#pass").val();			var confirmPassword = $("#passconfirm").val();			if (password != confirmPassword) $("#divCheckPassword").html("Passwords do not match!");			else $("#divCheckPassword").html("Passwords match.");		}		$(document).ready(function () {			$("#passconfirm").keyup(isPasswordMatch);		});	</script></body></html>