<?php 
require('header.php');
require('connect.php');
if(isset($_GET['error'])){header("location:index.php?error");}
?>
<body>
	
	<div class="limiter">
		<div class="container-login100">
      <?php
      session_start();
      ob_start();
      if($_SESSION['username']){
        echo '<br><div class="alert alert-success">
        <strong>Success! Hello '.$_SESSION['username'].'</strong><br> Welcome to the homepage of Loyal Partners property management system.
        </div><br/>';
        $sql=mysqli_query($conn,"SELECT * FROM `employee`");

      }?>


      <a href="logout.php" class="btn btn-danger" role="button" style="float: right;">Logout</a>
    </div>
  </div>
</body>