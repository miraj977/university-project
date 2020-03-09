<!DOCTYPE html>
<html lang="en">
      <head>
  	<title>Admin Panel</title>
  	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->	
  <link rel="icon" type="image/png" href="../images/ico.png"/>
  <!--===============================================================================================-->
  	
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
  <!--===============================================================================================-->	
  	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  	<link rel="stylesheet" type="text/css" href="../css/util.css">
  	<link rel="stylesheet" type="text/css" href="../css/main.css">
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
    require('../connect.php');
    ?>
    <body>
        <div class="limiter">
            <div class="container-login100" style="background: -webkit-linear-gradient(-135deg, #0c5460, #ffc107) !important;
                 background: -o-linear-gradient(-135deg, #0c5460, #ffc107) !important;
                 background: -moz-linear-gradient(-135deg, #0c5460, #ffc107) !important;
                 background: linear-gradient(-135deg, #0c5460, #ffc107) !important;">
                <div class="wrap-login100">

                    <div class="login100-pic js-tilt" data-tilt>
                        <a href="index.php"><img src="../images/img-01.png" alt="IMG"></a>
                    </div>

                    <form class="login100-form validate-form" method="POST" action="query.php">
                        <span class="login100-form-title">
                            Admin Login
                        </span>
                        <?php
                        if (isset($_GET['out'])) {
                            echo '<center><div class="alert alert-success alert-dismissible" style="width:fit-content;">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					Successfully logged out!!</div></center>';
                        }

                        if (isset($_GET['error'])) {
                            echo '<center><div class="alert alert-danger alert-dismissible" style="width:fit-content;">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					Invalid Username or password.</div></center>';
                        }
                        ?><br>

                        <div class="wrap-input100 validate-input" data-validate = "Username is required">
                            <input class="input100" id= "user" type="text" name="user" placeholder="Username">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Password is required">
                            <input class="input100" id="pass" type="password" name="pass" placeholder="Password" required>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>

                        <input type="hidden" name="login">
                        <div class="container-login100-form-btn">
                            <button type="submit" id="log" class="login100-form-btn">
                                Login
                            </button>
                        </div>

                        <div class="text-center p-t-12">
                            <span class="txt1">
                                Change
                            </span>
                            <a class="txt2" href="change.php">
                                Password?
                            </a>
                        </div>
                        <div class="text-center p-t-36">
                           <br><a class="admin" href="../index.php">Member Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>




        <!--===============================================================================================-->	
        <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="../vendor/bootstrap/js/popper.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="../vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="../vendor/tilt/tilt.jquery.min.js"></script>
        <script >
            $('.js-tilt').tilt({
                scale: 1.1
            })
        </script>
        <!--===============================================================================================-->
        <script src="../js/main.js"></script>
    </body>
</html>