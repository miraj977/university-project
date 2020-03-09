<?php
require 'header.php';
require '../connect.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Property Management System</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />

    </head>
    <body>
        <div class="container">
            <br /><br /><br>
            <div class="text">
                <span>A</span><span>S</span><span>S</span><span>E</span><span>T</span><span></span><span>M</span>
                <span>A</span>
                <span>N</span>
                <span>A</span>
                <span>G</span>
                <span>E</span>
                <span>M</span>
                <span>E</span>
                <span>N</span>
                <span style="border-radius: 0px 5px 5px 0px;">T</span>
            </div>
            <br /><br /><br>

            <?php
            if (isset($_GET['error'])) {
                echo '<div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Action could not be completed.</div>';
            }

            if (isset($_GET['success'])) {
                echo '<center><div class="alert alert-success alert-dismissible" style="width:fit-content;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Asset successfully assigned.</div></center>';
            }

            if (isset($_GET['release'])) {
                echo '<center><div class="alert alert-success alert-dismissible" style="width:fit-content;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Asset successfully released.</div></center>';
            }
            if (isset($_GET['added'])) {
                echo '<center><div class="alert alert-success alert-dismissible" style="width:fit-content;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Note successfully saved.</div></center>';
            }
            ?>
            <?php session_start();
            //print_r($_SESSION);
            if($_SESSION['type']=="1")
            {                ?>
            <form method="post" id="framework_form" action="query.php">
                <div class="form-group" style="max-width: 600px;margin:0 auto;">

                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM ASSET");
                    $sql = mysqli_query($conn, "SELECT * FROM EMPLOYEE");
                    ?>
                    <select id="framework1" name="emp">
                        <option selected>Choose Employee</option>
                        <?php while ($emp = mysqli_fetch_array($sql)) { ?>
                            <option value="<?php echo $emp['EmpId']; ?>"><?php echo ucfirst($emp['EmpFname']) . ' ' . '' . ucfirst($emp['EmpLname']); ?></option>
                        <?php } ?>

                    </select>
                    <br /><br />
                    <select id="framework" name="framework[]" multiple class="form-control" >
                        <?php
                        while ($result = mysqli_fetch_array($query)) {
                            $count = $result['AssetQuantity'] - $result['TempCount'];
                            if($count == 0) {
                                ?>
                                <option disabled value="<?php echo $result['AssetName']; ?>"><?php echo $result['AssetName'] . ' ' . '(' . $count . ')'; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $result['AssetName']; ?>"><?php echo $result['AssetName'] . ' ' . '(' . $count . ')'; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                    <br><br>
                    <span class="input-group-btn">
                        <div class="form-group">
                            <input type="submit" class="btn btn-info" name="assign" value="Submit" />
                        </div></span></div>
            </form><?php }?>
            <br><br>
            <?php $i = 1; ?>
            <button style="float:right;margin-bottom: 10px;" class="btn btn-md btn-primary" onclick="window.print()">Print <i class="fa fa-print"></i></button>
            <table id="myTable" class="table table-bordered display">
                <thead>
                    <tr style="background-color: black;color: white;">
                        <th class="hidden-xs">S.N</th>
                        <th>Employee Name</th>
                        <th class="hidden-xs ps">Asset code</th>
                        <th>Asset Name</th>
                        <th>Date Assigned</th>
                        <th class="ph hidden-xs">Notes</th>
                        <?php if($_SESSION['type']=="1"){ ?> 
                        <th class="ph">Action</th>
                       <?php }?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = mysqli_query($conn, "SELECT * FROM ASSIGN a,EMPLOYEE e WHERE a.empid=e.empid;");
                    while ($result = mysqli_fetch_array($sql)) {
                        extract($result);
                        $code = mysqli_query($conn, "SELECT `AssetCode` FROM ASSET WHERE `AssetName`='$assetid'");
                        $row = mysqli_fetch_assoc($code);
                        ?>
                        <tr>

                            <td class="hidden-xs"><?php echo $i; ?></td>
                            <td><?php echo ucfirst($EmpFname) . ' ' . '' . ucfirst($EmpLname); ?></td>
                            <td class="hidden-xs"><?php echo strtoupper($row['AssetCode']); ?></td>
                            <td><?php echo ucfirst($assetid); ?></td>
                            <td><?php
                                $datef = new DateTime($Date);
                                echo $datef->format('d M Y h:i A');
                                ?></td>
                            <td class="ph hidden-xs"><?php echo ucfirst($description); ?>
                                
                                <button type="button" name="edit" data-toggle="modal" data-target="#add_data_Modal" id="<?php echo $id; ?>" class="btn btn-primary btn-xs edit_data"><?php
                                    if (!empty($description)) {
                                        echo "Edit";
                                    } else {
                                        echo "Add";
                                    }
                               ?></button>
                               
                            </td>
                           <?php if($_SESSION['type']=="1"){  ?> 
                            <td style="text-align:center;"class="ph">
                           <a href="query.php?releaseid=<?php echo $id; ?>&item=<?php echo $assetid; ?>" onClick="return confirm('Are you sure you want to release the asset?')"><button class="btn btn-sm btn-danger">Release</button></a></td><?php }?>
                        </tr>
                        <?php $i++; ?>



                    <?php }
                    ?>
                </tbody>
            </table>
            <br />

            <div id="add_data_Modal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Asset</h4> <button type="button" class="close" data-dismiss="modal">&times;</button>

                        </div>
                        <div class="modal-body">
                            <form method="post" id="insert_form" action="query.php">
                                <label>Add/Edit Note</label>
                                <input id="anote" name="anote" class="form-control" placeholder="Notes">
                                <input type="hidden" name="id" id="id" />  <br>
                                <input type="submit" name="addnote" value="Save" class="btn btn-primary" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <br>
            <br>
            <br></div>
        <?php include "footer.php"; ?>
        <script>
            $(document).ready(function () {
                $('#framework1').multiselect({
                    nonSelectedText: 'Assign Asset',
                    enableFiltering: true,
                    enableCaseInsensitiveFiltering: true,
                    buttonWidth: '100%'
                });

                $('#framework').multiselect({
                    nonSelectedText: 'Assign Asset',
                    enableFiltering: true,
                    enableCaseInsensitiveFiltering: true,
                    buttonWidth: '100%'
                });
            });
        </script>


        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script>
            $(function () {
                $("#myTable").DataTable();
            });

            $(document).on('click', '.edit_data', function () {
                var aid = $(this).attr('id');
                //alert(aid);
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    data: "anote=" + aid,
                    url: "query.php",
                    success: function (response) {
                        console.log(response);

                        //json = $.parseJSON(response);
                        $('#anote').val(response.desc);
                        $('#id').val(response.id);
                    },
                    error: function (ts) {
                        alert(ts.responseText);
                    }
                });
            });
        </script>