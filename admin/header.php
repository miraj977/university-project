<head>
    <title>Property Management System</title>
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
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <!-- Latest compiled and minified CSS -->

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:logout.php');
}
?>

<body>
    <div class="topnav" id="myTopnav">
        <a href="javascript:void(0);" style="text-decoration: none;padding: 0px;" class="btnnav"></a>
        <a href="dashboard.php" class="btnnav" style="padding:13px 18px">HOME</a>
        <a href="management.php" class="btnnav" style="padding:13px 18px">ASSET MANAGEMENT</a>
        <a href="asset.php" class="btnnav" style="padding:13px 18px">ASSETS</a>
        <a href="user.php" class="btnnav" style="padding:13px 18px">USERS</a>
        <a href="history.php" class="btnnav" style="padding:13px 18px">ASSIGNMENT HISTORY</a>

        <div style="float:right;">
            <?php
            if ($_SESSION['empid'] != 'admin') {
                echo '<strong style="color:white;float:left;padding: 9px 2px;"><a href="user.php?id=' . $_SESSION['empid'] . '" style="float: right; padding: 0px;"><button class="btn btn-sm btn-primary" style="border-radius:16px;">' . ucfirst($_SESSION['username']) . '</button></a></strong>';
            } else {
                echo '<strong style="color:white;float:left;padding: 9px 2px;"><button class="btn btn-sm btn-primary" style="border-radius:16px;margin-left:4px;">' . ucfirst($_SESSION['username']) . '</button></strong>';
            }
            ?>
            <?php if ($_SESSION['type'] == "1") { ?>
                <a href="logout.php" class="l" style="float: right;"><button class="logout"><i class="fa fa-sign-out"></i>Logout</button></a>
            <?php } else { ?><a href="../logout.php" class="l" style="float: right;"><button class="logout"><i class="fa fa-sign-out"></i>Logout</button></a><?php }?>
        </div>

        <a href="javascript:void(0);" class="icon" onclick="myFunction()" style="padding:16px">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <!-- Menu Toggle Script -->
    <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>
