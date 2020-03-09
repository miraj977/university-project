<?php
require "../connect.php";
require "header.php";
$sql = mysqli_query($conn, "SELECT * FROM `ASSET`");
?>
<div class="container">  
<br /><br /><br>
<div class="text"> 
    <span>A</span>
    <span>S</span>
    <span>S</span>
    <span>E</span>
    <span>T</span>
    <span></span>
    <span>D</span>
    <span>E</span>
    <span>T</span>
    <span>A</span>
    <span>I</span>
    <span>L</span>
    <span style="border-radius: 0px 5px 5px 0px;">S</span>
</div>
        
        <?php $sql = mysqli_query($conn, "SELECT * FROM `ASSET`"); ?>
    <br />  
    <div class="table-responsive"> 
        <?php if($_SESSION['type']=="1"){ ?> 
        <div align="right">  
            <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_Modal" class="btn btn-warning">Add</button>  
        </div>  
        <?php
        }
        if (isset($_GET['error'])) {
            echo '<div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Update could not be completed.</div>';
        }
        ?>
        <?php
        if (isset($_GET['success'])) {
            echo '<center><div class="alert alert-success alert-dismissible" style="width:fit-content;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Asset successfully saved.</div></center>';
        }
        
         if (isset($_GET['rem'])) {
            echo '<center><div class="alert alert-success alert-dismissible" style="width:fit-content;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Asset successfully deleted.</div></center>';
        }
        ?><br>


        <?php
        if (isset($_GET['id'])) {
            $assetid = $_GET['id'];
            $results = "SELECT * FROM `ASSET` WHERE `assetid`='" . $assetid . "'";
            $result = $conn->query($results);
            $row = mysqli_fetch_assoc($result);
            ?>
        <br><h3 align="center" class="viewtable"><?php echo ucfirst($row["AssetName"]);?> Details</h3><br>
            <div class="table-responsive">  
                <table class="table table-bordered viewtable">
                    <?php
                    if ($row) {
                        ?>
                    <tr style="background-color:brown;">  
                            <td width="30%"><label>Asset Name</label></td>  
                            <td width="70%"><?php echo ucfirst($row["AssetName"]); ?></td>  
                        </tr> 
                        <tr>  
                            <td width="30%"><label>Asset Code</label></td>  
                            <td width="70%"><?php echo $row["AssetCode"]; ?></td>  
                        </tr> 
                        <tr>  
                            <td width="30%"><label>Asset Description</label></td>  
                            <td width="70%"><?php echo $row["AssetDescription"] ?></td>  
                        </tr>  
                        <tr>  
                            <td width="30%"><label>Asset Unit Price</label></td>  
                            <td width="70%"><?php if(!empty($row["AssetUnitPrice"]))
                                {echo "<b>AUD ".$row["AssetUnitPrice"]."</b>";} 
                                else 
                                    { 
                                    echo 'NA';
                                    } ?></td>  
                        </tr>
                        <tr>  
                            <td width="30%"><label>Asset Quantity</label></td>  
                            <?php $rem= $row["AssetQuantity"]-$row["TempCount"];?>
                            <td width="70%"><?php echo " ( Unassigned: ".$rem." | Total: ".$row["AssetQuantity"].")" ?></td>  
                        </tr> 
                        <?php if($row['TempCount']!=0){?>
                         <tr>  
                            <td width="30%"><label>No. of Asset used</label></td>  
                            <td width="70%"><?php echo $row["TempCount"] ?></td>  
                        </tr> 
                        <?php }?>
                        <tr>  
                            <td width="30%"><label>Asset Location</label></td>  
                            <td width="70%"><?php echo $row["AssetLocation"] ?></td>  
                        </tr> 
                        <tr>  
                            <td width="30%"><label>Asset Note</label></td>  
                            <td width="70%"><?php if(empty($row["AssetNote"]))
                            {
                                echo 'N/A';
                            }else{
                                echo $row["AssetNote"];
                                
                            } ?></td>  
                        </tr> 
                      <?php  } ?>  
                </table> 
                
            </div> <a class="btn btn-danger btn-md" href="asset.php" style="float: right;float: right;
               margin-bottom: 10px;">Close</a>  <div style="clear:both;"></div>
               <br>
        <?php } ?>

        <div id="employee_table">  
            <button style="float:right;margin-bottom: 10px;" class="btn btn-md btn-primary" onclick="window.print()">Print <i class="fa fa-print"></i></button>
            <table class="table table-bordered display" id="myTable"> 
                <thead>
                    <tr style="background-color: black;color: white;">  
                        <th width="35%">Asset Name</th> 
                        <th width="20%" class="hidden-xs">Asset Code</th> 
                        <th width="12%">Quantity</th> 
                        <?php if($_SESSION['type']=="1"){ ?> 
                        <th width="15%" class="hi">Edit</th> 
                        <?php }?>
                        <th width="15%" class="hi">View</th>  
                    </tr> 
                </thead>
                <tbody>
                    <?php
                    while ($result = mysqli_fetch_array($sql)) {
                        extract($result);
                        ?>  
                        <tr>
                            <td><?php echo ucfirst($AssetName); ?></td> 
                            <td class="hidden-xs"><?php echo strtoupper($AssetCode); ?></td> 
                            <td><i><?php echo $AssetQuantity; ?></i></td> 
                            <?php if($_SESSION['type']=="1"){ ?> 
                            <td class="hi">
                                <input type="button" name="edit" data-toggle="modal" data-target="#add_data_Modal"  value="Edit" id="<?php echo $AssetId; ?>" class="btn btn-info btn-xs edit_data" />
                            <?php
                             $look = mysqli_query($conn, "SELECT * FROM `ASSIGN` WHERE `assetid`='" . $AssetName."'");
                            //print_r($look);
                            if (($look->num_rows) == 0) {?>
                            <a href="query.php?rem=<?php echo $AssetId?>" onClick="return confirm('Are you sure you want to delete asset?')"><input type="button" name="delete" value="Delete" id="<?php echo $AssetId; ?>" class="btn btn-danger btn-xs" /></a></td>  <?php }else{
                                echo "<button class='btn btn-xs btn-danger' disabled  data-toggle='tooltip' title='Asset Assigned to user. Release first.'>Delete</button>";
                }
                            }
?>
                            <td class="hi"><a href="asset.php?id=<?php echo $AssetId; ?>"><input type="button" name="view" value="view" id="<?php echo $AssetId; ?>" class="btn btn-warning btn-xs view_data" /></a></td>  
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
                <h4 class="modal-title">Asset Details</h4>  
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
                <h4 class="modal-title">Edit Asset</h4> <button type="button" class="close" data-dismiss="modal">&times;</button>  

            </div>  
            <div class="modal-body">  
                <form method="post" id="insert_form" action="query.php">  
                    <label>Asset Name</label>  
                    <input type="text" name="aname" id="aname" class="form-control" placeholder="Asset Name" maxlength = "50"/>  
                    <br />  
                    <label>Asset Code</label>  
                    <input type="text" name="acode" id="acode" class="form-control" placeholder="Asset Code" maxlength = "20"/>  
                    <br />
                    <label>Asset Description</label>  
                    <textarea name="adescription" id="adescription" class="form-control"></textarea>  
                    <br />  
                    <label>Asset Unit Price</label>  
                    <input type="text" name="unitprice" id="unitprice" class="form-control" placeholder="Unit Price"  maxlength = "10"/>  
                    <br />  
                    <label>Asset Quantity</label>  
                    <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Asset Quantity" maxlength = "10" />  
                    <br />  
                    <label>Asset Location</label>  
                    <input type="text" name="location" id="location" class="form-control" placeholder="Asset Location"/>                    <br /> 
                    <label>Asset Note</label>  
                    <textarea name="assetnote" id="assetnote" class="form-control" placeholder="Asset Note"></textarea>                    <br /> 
                    <input type="hidden" name="assetid" id="assetid" />  
                    <input type="submit" name="saveasset" id="saveasset" value="Save" class="btn btn-success" />  
                </form>  
            </div>   
        </div>  
    </div>  
</div>  

<div id="add_Modal" class="modal fade">  
    <div class="modal-dialog">  
        <div class="modal-content">  
            <div class="modal-header">  
                <h4 class="modal-title">Add Asset</h4> <button type="button" class="close" data-dismiss="modal">&times;</button>  

            </div>  
            <div class="modal-body">  
                <form method="post" id="insert_form" action="query.php">  
                    <label>Asset Name</label>  
                    <input type="text" name="aname" id="aname" class="form-control" placeholder="Asset Name"/>  
                    <br />  
                    <label>Asset Code</label>  
                    <input type="text" name="acode" id="acode" class="form-control" placeholder="Asset Code"/>  
                    <br />
                    <label>Asset Description</label>  
                    <textarea name="adescription" id="adescription" class="form-control"></textarea>  
                    <br />  
                    <label>Asset Unit Price</label>  
                    <input type="text" name="unitprice" id="unitprice" class="form-control" placeholder="Unit Price" />  
                    <br />  
                    <label>Asset Quantity</label>  
                    <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Asset Quantity"/>  
                    <br />  
                    <label>Asset Location</label>  
                    <input type="text" name="location" id="location" class="form-control" placeholder="Asset Location"/>                    <br />
                    <label>Asset Note</label>  
                    <textarea name="assetnote" id="assetnote" class="form-control" placeholder="Asset Note"></textarea>                    <br /> 
                    <input type="submit" name="addasset" id="addasset" value="Save" class="btn btn-success" />  
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
                        })
</script>

<script>
    $(document).ready(function () {
        $('#add').click(function () {
            $('#insert').val("Insert");
            $('#insert_form')[0].reset();
        });
    });
    $(document).on('click', '.edit_data', function () {
        var aid = $(this).attr('id');
        //alert(aid);
        $.ajax({
            type: "POST",
            dataType: 'json',
            data: "aid=" + aid,
            url: "query.php",
            success: function (response) {
                console.log(response);

                json = $.parseJSON(response);
                $('#aname').val(response.AssetName);
                $("#acode").val(response.AssetCode);
                $("#adescription").val(response.AssetDescription);
                $("#unitprice").val(response.AssetUnitPrice);
                $("#quantity").val(response.AssetQuantity);
                $("#location").val(response.AssetLocation);
                $("#assetid").val(response.AssetId);
                $("#assetnote").val(response.AssetNote);
            },
            error: function (ts) {
                alert(ts.responseText)
            }
        })
    }); 
</script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>