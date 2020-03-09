<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Property Management System</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->
        <link rel="icon" type="image/png" href="images/ico.png"/>
        <!--===============================================================================================-->

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <!--===============================================================================================-->
       
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <!-- Latest compiled and minified CSS -->

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>

    <body><div class="limiter">

        
            <div class="container-login100">
                <div class="wrap-login100" style="width:auto;">
                    
                    <?php
                    if(isset($_GET['success']))
                    {
                        echo '<div class="jumbotron text-md-center" style="margin-top:-114px;">
  <center style="padding:25px;"><h1 class="display-3">Thank You!</h1>
  <p class="lead">Your password has been sent to your email address.</p>
 
  <p class="lead">
  <a class="btn btn-default btn-sm" href="index.php" role="button" style="color:black !important;border-radius:25px;">Continue to homepage</a>
  </p></center>
  </div>';
                    }
                    else{?>
                    <form method="post" action='query.php' style="margin-top: -60px;margin-bottom: 34px;">
                        
                        <span class="login100-form-title">Forgot Password</span>
                     <div class="wrap-input100 validate-input" data-validate="User email is required">
                         <input class="input100" style="width:350px !important;" id="email" type="email" name="email" placeholder="Please enter your email address">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>
                    <div class="text-center p-t-36">
                        <input class="btn btn-md btn-danger" style="width:200px;border-radius:25px;font-weight: bold;z-index: 999999999;position: relative;" name="forgot" type="submit" value="Send">
                       
                        
                    </div><br><br>
                    </form> <div class=" p-t-36" style="margin-top: 130px;margin-left: 98px !important; position: absolute;">
                     <a href="index.php"><button class="btn btn-warning btn-sm" style="color:black;border-radius:25px;font-weight: bold;">Continue to homepage</button></a>
                    </div><br>
                   
                    <?php }?>
                </div>
                <div style="clear: both;"></div>
                  
               
            </div>
        </div>




        <!--===============================================================================================-->
     
    </body>

</html>
