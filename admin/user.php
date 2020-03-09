<?php
require "../connect.php";
require "header.php";
$sql = mysqli_query($conn, "SELECT * FROM `EMPLOYEE`");
?>
<div class="container">  
    <br /><br /><br>
    <?php $sql = mysqli_query($conn, "SELECT * FROM `EMPLOYEE`"); ?>
    <div class="text">
        <span>U</span>
        <span>S</span>
        <span>E</span>
        <span>R</span>
        <span></span>
        <span>D</span>
        <span>E</span>
        <span>T</span>
        <span>A</span>
        <span>I</span>
        <span>L</span>
        <span style="border-radius: 0px 5px 5px 0px;">S</span>
    </div>

    <div class="table-responsive">  
        <?php if ($_SESSION['type'] == "1") { ?> 
            <div align="right">  
                <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_Modal" class="btn btn-warning">Add</button>  
            </div>  
            <?php
        }
        if (isset($_GET['error'])) {
            echo '<div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Action could not be completed.</div>';
        }
        ?>
        <?php
        if (isset($_GET['success'])) {
            echo '<center><div class="alert alert-success alert-dismissible" style="width:fit-content;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    User details successfully saved.</div></center>';
        }
        if (isset($_GET['del'])) {
            echo '<center><div class="alert alert-success alert-dismissible" style="width:fit-content;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    User successfully deleted.</div></center>';
        }
        ?><br>


        <?php
        if (isset($_GET['id'])) {
            $EmpId = $_GET['id'];
            $results = "SELECT * FROM `EMPLOYEE` WHERE `EmpId`='" . $EmpId . "'";
            $result = $conn->query($results);
            $row = mysqli_fetch_assoc($result);
            ?>
            <br><h3 align="center" class="viewtable" contenteditable="true">
                <?php
                if ($row['EmpGender'] == "male") {
                    echo "Mr. " . ucfirst($row["EmpFname"]) . ' ' . ucfirst($row["EmpLname"]) . "'s";
                } elseif ($row['EmpGender'] == "female") {
                    echo "Ms/Mrs. " . ucfirst($row["EmpFname"]) . ' ' . ucfirst($row["EmpLname"]) . "'s";
                } else {
                    echo ucfirst($row["EmpFname"]) . ' ' . ucfirst($row["EmpLname"]) . "'s";
                }
                ?> Details</h3><br>

            <div class="table-responsive">  

                <table class="table table-bordered viewtable">

    <?php
    if ($row) {
        ?>
                        <tr style="background-color:brown;">  
                            <td width="30%"><label>Name</label></td>  
                            <td width="70%"><?php
                if ($row['EmpGender'] == "male") {
                    echo "Mr. " . ucfirst($row["EmpFname"]) . ' ' . ucfirst($row["EmpLname"]);
                } elseif ($row['EmpGender'] == "female") {
                    echo "Ms/Mrs. " . ucfirst($row["EmpFname"]) . ' ' . ucfirst($row["EmpLname"]);
                } else {
                    echo ucfirst($row["EmpFname"]) . ' ' . ucfirst($row["EmpLname"]);
                }
        ?></td>  
                        </tr> 
                        <tr>  
                            <td width="30%"><label>Username</label></td>  
                            <td width="70%" style="text-transform: lowercase;"><?php echo $row["EmpUname"] ?></td>  
                        </tr>  
                        <tr>  
                            <td width="30%"><label>Designation</label></td>  
                            <td width="70%" style="text-transform: capitalize;"><?php echo ucfirst($row["EmpJobTitle"]); ?></td>  
                        </tr>
                        <tr>  
                            <td width="30%"><label>Member Type</label></td>  
                            <td width="70%"><?php
                        if ($EmpType ==0) {
                            echo '<button class="btn-xs btn-primary">Member</button>';
                        } elseif ($EmpType ==1) {
                            echo '<button class="btn-xs btn-success">Admin</button>';
                        }
                        ?></td>  
                        </tr>  
                        <tr>  
                            <td width="30%"><label>Gender</label></td>  
                            <td width="70%"><?php echo ucfirst($row["EmpGender"]) ?></td>  
                        </tr> 
                        <tr>  
                            <td width="30%"><label>Email</label></td>  
                            <td width="70%"><?php echo strtolower($row["EmpEmail"]); ?></td>  
                        </tr> 
                        <tr>  
                            <td width="30%"><label>Phone</label></td>  
                            <td width="70%"><?php echo $row["EmpPhone"] ?></td>  
                        </tr> 
                        <tr>  
                            <td width="30%"><label>Address</label></td>  
                            <td width="70%"><?php echo $row["EmpAddress"] ?></td>  
                        </tr> 
                        <tr>  
                            <td width="30%"><label>Asset Assigned</label></td>  
                            <td width="70%"><?php
                                $res = "SELECT * FROM `ASSIGN` WHERE `empid`='" . $EmpId . "'";
                                $resu = $conn->query($res);
                                while ($assign = mysqli_fetch_array($resu)) {
                                    extract($assign);
                                    if ($assetid != '') {

                                        echo ucfirst($assetid) . ' | ';
                                    } else {
                                        echo "N/A";
                                    }
                                }
                                ?></td>  
                        </tr> 
    <?php } ?>  
                </table> 
                <a class="btn btn-danger btn-md " href="user.php" style="float: right;
                   margin-bottom: 10px;">Close</a> <div style="clear:both;"></div>
            </div>  
            <br>
<?php } ?>

        <div id="employee_table">  
            <button style="float:right;margin-bottom: 10px;" class="btn btn-md btn-primary" onclick="window.print()">Print <i class="fa fa-print"></i></button><br>
            <table class="table table-bordered display" id="myTable"> 
                <thead>
                    <tr style="background-color: black;color: white;">  
                        <th>Employee Name</th> 
                        <th style="width:15%">Email</th> 
                        <th class="hidden-xs">Username</th>
                        <th class="hidden-xs">Member Type</th>
                    <?php if ($_SESSION['type'] == "1") { ?> 
                            <th class="hi">Edit</th>  
                    <?php } ?>
                        <th class="hi">View</th>  
                    </tr> 
                </thead>
                <tbody>
<?php
while ($result = mysqli_fetch_array($sql)) {
    extract($result);
    ?>  
                        <tr>
                            <td <?php if ($EmpType == 1) { ?>style="color:green;"<?php } ?>>
                            <?php echo ucfirst($EmpFname) . " " . ucfirst($EmpLname); ?>
                            </td>
                            <td style="width:15%"><?php echo strtolower($EmpEmail); ?></td>
                            <td class="hidden-xs"><?php echo ucfirst($EmpUname); ?></td>
                            <td class="hidden-xs"><?php
                                if ($EmpType == 0) {
                                    echo '<button class="btn-xs btn-primary">Member</button>';
                                } elseif ($EmpType == 1) {
                                    echo '<button class="btn-xs btn-success">Admin</button>';
                                }
                                ?>
                            </td>
                            <?php if ($_SESSION['type'] == "1") { ?> 
                                <td class="hi"><input type="button" name="edit" data-toggle="modal" data-target="#add_data_Modal"  value="Edit" id="<?php echo $EmpId; ?>" class="btn btn-info btn-xs edit_data" />     
                            <?php
                            $look = mysqli_query($conn, "SELECT * FROM `ASSIGN` WHERE `empid`=" . $EmpId);
                            //print_r($look);
                            if (($look->num_rows) == 0) {
                                ?>
                            <a href="query.php?del=<?php echo $EmpId ?>" onClick="return confirm('Are you sure you want to delete user?')"><input type="button" name="delete" value="Delete" id="<?php echo $EmpId; ?>" class="btn btn-danger btn-xs" /></a></td>  <?php
                } else {
                    echo "<button class='btn btn-xs btn-danger' disabled  data-toggle='tooltip' title='Asset Assigned to user. Release first.'>Delete</button>";
                }
            }
            ?>
                            <td class="hi"><a href="user.php?id=<?php echo $EmpId; ?>"><input type="button" name="view" value="view" id="<?php echo $EmpId; ?>" class="btn btn-warning btn-xs view_data" /></a></td>  
                        </tr>  
    <?php
}
?>
                </tbody>   
            </table>  
        </div>  
    </div>  
    <br>
    <br>
    <br>
    <br>
</div>


<div id="dataModal" class="modal fade">  
    <div class="modal-dialog">  
        <div class="modal-content">  
            <div class="modal-header">  
                <button type="button" class="close" data-dismiss="modal">&times;</button>  
                <h4 class="modal-title">Employee Details</h4>  
            </div>  
            <div class="modal-body" id="employee_detail">  
            </div>  
            <div class="modal-footer">  
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
            </div>  
        </div>  
    </div>  
</div>  



<div id="add_data_Modal" class="modal fade">  
    <div class="modal-dialog">  
        <div class="modal-content">  
            <div class="modal-header">  
                <h4 class="modal-title">Edit User</h4> <button type="button" class="close" data-dismiss="modal">&times;</button>  

            </div>  
            <div class="modal-body">  
                <form method="post" id="insert_form" action="query.php">  
                    <label>First Name</label>  
                    <input type="text" name="fname" id="fname" class="form-control" placeholder="Your First Name"/>  
                    <br />  
                    <label>Last Name</label>  
                    <input type="text" name="lname" id="lname" class="form-control" placeholder="Your Last Name"/>  
                    <br /> 
                    <label>Username</label>  
                    <input type="text" name="uname" id="uname" class="form-control" placeholder="Your  Username" style="text-transform: lowercase;"/>  
                    <br /> 
                    <label>Select Member Type</label>  
                    <select name="type" id="type" class="form-control">  
                        <option value="0">Member</option>  
                        <option value="1">Admin</option> 
                    </select>  
                    <br />  
                    <label>Employee Address</label>  
                    <textarea name="address" id="address" class="form-control"></textarea>  
                    <br />  
                    <label>Select Gender</label>  
                    <select name="gender" id="gender" class="form-control">  
                        <option value="male">Male</option>  
                        <option value="female">Female</option> 
                        <option value="other">Other</option> 
                    </select>  
                    <br />  
                    <label>Enter Designation</label>  
                    <input type="text" name="jobtitle" id="jobtitle" class="form-control" placeholder="Your Designation" style="text-transform: capitalize;"/>  
                    <br />  
                    <label>Enter Email</label>  
                    <input type="email" name="email" id="email" class="form-control" placeholder="Your Email"/>  
                    <br />  
                    <label>Enter Phone</label>  
                    <input type="number" name="phone" id="phone" class="form-control" placeholder="Your Phone"/>  
                    <br />  
                    <input type="hidden" name="EmpId" id="EmpId" />  
                    <input type="submit" name="Save" id="Save" value="Save" class="btn btn-success" />  
                </form>  
            </div>   
        </div>  
    </div>  
</div>  

<div id="add_Modal" class="modal fade">  
    <div class="modal-dialog">  
        <div class="modal-content">  
            <div class="modal-header">  
                <h4 class="modal-title">Add User</h4> <button type="button" class="close" data-dismiss="modal">&times;</button>  

            </div>  
            <div class="modal-body">  
                <form method="post" id="insert_form" action="query.php">  
                    <label>First Name</label>  
                    <input type="text" name="fname" required style="text-transform:capitalize;" id="fname" class="form-control" />  
                    <br />  
                    <label>Last Name</label>  
                    <input type="text" name="lname" id="lname" required style="text-transform: capitalize;" class="form-control" />  
                    <br /> 
                    <label>Username</label>  
                    <input type="text" name="uname" id="uname" style="text-transform: lowercase;" class="form-control" />                    <br /> 
                    <label>Select Member Type</label>  
                    <select name="type" id="type" class="form-control">  
                        <option value="0">Member</option>  
                        <option value="1">Admin</option> 
                        <option value="other">Other</option> 
                    </select>  
                    <br />
                    <label>Enter Designation</label>  
                    <input type="text" name="jobtitle" id="jobtitle" style="text-transform: capitalize;" required class="form-control" />  
                    <br /> 
                    <label>Enter Email</label>  
                    <input type="email" name="email" id="email" required class="form-control" />  
                    <br />  
                    <label>Select Gender</label>  
                    <select name="gender" id="gender" class="form-control">  
                        <option value="male">Male</option>  
                        <option value="female">Female</option> 
                        <option value="other">Other</option> 
                    </select>  
                    <br /> 
                    <label>Employee Address</label>  
                    <textarea name="address" id="address" class="form-control"></textarea>  
                    <br />  
                    <label>Enter Password</label>  
                    <input type="password" required name="pass" id="pass" class="form-control" />  
                    <br />
                    <label>Confirm Password</label>  
                    <input type="password" required name="passconfirm" class="form-control" required minlength="8" id="passconfirm" onChange="isPasswordMatch();"/>  
                    <div id="divCheckPassword"></div>
                    <br />  
                    <input type="submit" name="add" id="add" value="Save" class="btn btn-success" />  
                </form>  
            </div>   
        </div>  
    </div>  
</div> 
<?php include "footer.php"; ?> 
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
                        $(function () {
                            $("#myTable").DataTable();
                        });
</script>

<script>
    $(document).ready(function () {
        $('#add').click(function () {
            $('#insert').val("Insert");
            $('#insert_form')[0].reset();
        });
    });
    $(document).on('click', '.edit_data', function () {
        var EmpId = $(this).attr('id');
        //alert(EmpId);
        $.ajax({
            type: "POST",
            dataType: 'json',
            data: "EmpId=" + EmpId,
            url: "query.php",
            success: function (response) {
                console.log(response);

                json = $.parseJSON(response);
                $('#fname').val(response.EmpFname);
                $("#lname").val(response.EmpLname);
                $("#uname").val(response.EmpUname);
                $('select#gender').val(response.EmpGender).attr("selected", "selected");
                $('select#type').val(response.EmpType).attr("selected", "selected");
                $("#address").val(response.EmpAddress);
                $("#phone").val(response.EmpPhone);
                $("#email").val(response.EmpEmail);
                $("#jobtitle").val(response.EmpJobTitle);
                $("#EmpId").val(response.EmpId);
            },
            error: function (ts) {
                alert(ts.responseText);
            }
        });
    });

    // $(document).on('click', '.view_data', function(){  
    //           var id = $(this).attr("id");  
    //           //alert(id);
    //                $.ajax({    
    //                     type:"POST",  
    //                     data:"id="+ id, 
    //                     url:"query.php", 
    //                     success:function(data){  
    //                      console.log(data);
    //                          $('#employee_detail').html(data);  
    //                          $('#dataModal').modal('show');  
    //                     }  
    //                     ,
    //        error: function() {
    //            alert('Error occured');
    //        }
    //                });  

    //      });   
</script>

<script type="text/javascript">
    function isPasswordMatch() {
        var password = $("#pass").val();
        var confirmPassword = $("#passconfirm").val();

        if (password != confirmPassword)
            $("#divCheckPassword").html("Passwords do not match!");
        else
            $("#divCheckPassword").html("Passwords match.");
    }

    $(document).ready(function () {
        $("#passconfirm").keyup(isPasswordMatch);
    });
</script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>

