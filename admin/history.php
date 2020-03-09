<?php
require 'header.php';
require '../connect.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Asset Management</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />

    </head>
    <body>

        <div class="container">
            <!--            <h3 align="center" style="padding: 6px;background-color: gold;font-family: futura;margin-top: 44px;border-bottom-right-radius: 30px;border-top-left-radius: 30px;">Asset Assignment</h3>-->
            <br /><br /><br>
            <div class="text">
                <span>ASSET</span><span style="width: 112px;">ASSIGNMENT</span><span style="border-radius: 0px 5px 5px 0px;">HISTORY</span>
            </div>
                   <?php
            if (isset($_GET['error'])) {
                echo '<div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Action could not be completed.</div>';
            }
            
             if (isset($_GET['e'])) {
                echo '<div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Please select atleast one record to delete.</div>';
            }

            if (isset($_GET['success'])) {
                echo '<center><div class="alert alert-success alert-dismissible" style="width:fit-content;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Record successfully deleted.</div></center>';
            }
            ?>
           
            <?php $i = 1; ?>
           
            <button style="float:right;margin-bottom: 10px;" class="btn btn-md btn-primary" onclick="window.print()">Print <i class="fa fa-print"></i></button>
            <form method="post" action="query.php">
            <table id="myTable" class="table table-bordered display">
                <thead>
                    <tr  style="background-color: black;color: white;">
                        <th>S.N</th>
                        <th>Employee Name</th>
                        <th class="hidden-xs ps">Asset code</th>
                        <th>Asset Name</th>
                        <th class="hidden-xs">Date Assigned</th>
                        <th class>Date Released</th>
                        <th class="hidden-xs">Notes</th>
                    </tr>
                </thead>
                <tbody>
                
                    <?php
                    $sql = mysqli_query($conn, "SELECT * FROM COMPLETE c,EMPLOYEE e WHERE c.empid=e.empid;");
                    while ($result = mysqli_fetch_array($sql)) {
                        extract($result);
                        $code = mysqli_query($conn, "SELECT `AssetCode` FROM ASSET WHERE `AssetName`='$assetid'");
                        $row = mysqli_fetch_assoc($code);
                        ?>
                        <tr>
                            <td>
                              <?php if($_SESSION['type']=="1") {?>
                                <input type="checkbox" class="ph" id="<?php echo $id;?>" value="<?php echo $id;?>" name="check[]" style="cursor:pointer;"> 
                              <?php } echo $i; ?></td>
                            <td><?php echo ucfirst($EmpFname) . ' ' . '' . ucfirst($EmpLname); ?></td>
                            <td class="hidden-xs"><?php echo strtoupper($row['AssetCode']); ?></td>
                            <td><?php echo ucfirst($assetid); ?></td>
                            <td class="hidden-xs"><?php $dater = new DateTime($Date);
                                echo $dater->format('d M Y h:i A');?></td>
                            <td><?php $datef = new DateTime($ReleaseDate);
                                echo $datef->format('d M Y h:i A'); ?></td>
                    <td class="hidden-xs"><?php if(!empty($description)){echo ucfirst($description);}else{ echo "N/A";} ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php }
                    ?>
                </tbody>
            </table><br>
            <?php if($_SESSION['type']=="1"){?>
            <button class="btn btn-danger" type="submit" name="checkdel" onClick="return confirm('Are you sure you want to delete the assignment history?')">Delete Checked</button> <button class="btn btn-danger" type="submit" name="delall" onClick="return confirm('Are you sure you want to delete all the assignment history?')">Delete All</button> <?php }?>
            </form>
            <br>
            <br>
            <br></div>
        <?php include "footer.php"; ?>
        


        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script>
            $(function () {
                $("#myTable").DataTable();
            });
  
</script>