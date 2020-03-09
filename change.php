<!DOCTYPE html>
<html lang="en">
      <head>
  	<title>Property Management System</title>
  	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->	
  <link rel="icon" type="image/png" href="images/ico.png"/>
  <!--===============================================================================================-->
  	
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="onts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
  <!--===============================================================================================-->	
  	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  	<link rel="stylesheet" type="text/css" href="css/util.css">
  	<link rel="stylesheet" type="text/css" href="css/main.css">
  <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <!-- Latest compiled and minified CSS -->
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

  <!-- jQuery library -->
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>
    <?php
    $string = __DIR__;
    $addr = substr($string, 0, strrpos($string, '/') + 1);
    require('connect.php');
    ?>
    <body>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100" style="width: auto;">

                    

                    <form class="login100-form validate-form" method="POST" action="query.php">
                        <span class="login100-form-title">
                            Change Password
                        </span>
                        <?php

                        if (isset($_GET['error'])) {
                            echo '<center><div class="alert alert-danger alert-dismissible" style="width:fit-content;">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					Please check your old password.</div></center>';
                        }
                        if (isset($_GET['success'])) {
                            echo '<center><div class="alert alert-success alert-dismissible" style="width:fit-content;">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					Success!! Please check your email <b>'.$_GET["success"].'</b></div></center>';
                        }
                        ?><br>
                        
                        <div class="wrap-input100 validate-input" data-validate = "Your email is required">
                            <input class="input100" id= "email" type="email" name="email" placeholder="Your Email Address">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-email" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Old Password is required">
                            <input class="input100" id= "opass" type="password" name="opass" placeholder="Old Password">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-key" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "New Password is required">
                            <input class="input100" id="pass" type="password" name="pass" placeholder="New Password" required minlength="8">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                        
                        <div class="wrap-input100 validate-input" data-validate = "New Password confirmation required">
                            <input class="input100" id="pass2" type="password" name="pass2" placeholder="Confirm New Password" required minlength="8"  onChange="isPasswordMatch();">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                        
                        <div id="divCheckPassword" style="color:white;"></div>
                        <input type="hidden" name="change">
                        <div class="container-login100-form-btn">
                            <button type="submit" id="change" class="login100-form-btn">
                                Change password
                            </button>
                        </div>

                        
                        <div class="text-center p-t-36">
                           <br><a class="admin" href="index.php">Memeber Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>




        <!--===============================================================================================-->	
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
      
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script type="text/javascript">
		function isPasswordMatch() {
			var password = $("#pass").val();
			var confirmPassword = $("#pass2").val();

			if (password != confirmPassword) $("#divCheckPassword").html("Passwords do not match!");
			else $("#divCheckPassword").html("Passwords match.");
		}

		$(document).ready(function () {
			$("#pass2").keyup(isPasswordMatch);
		});
	</script>

    </body>
</html>