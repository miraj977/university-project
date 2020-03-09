<?php

require('../connect.php');
header('Content-type: application/json');


if (isset($_GET['del']))
{
    $del=$_GET['del'];
    $sql = "DELETE FROM `EMPLOYEE` WHERE `EmpId`=".$del;
    $query = mysqli_query($conn, $sql);
    if($query){
             header("location:user.php?del");
    } else {

        header("location:user.php?error");
    }
        
}

if (isset($_GET['rem']))
{
    $rem=$_GET['rem'];
    $sql = "DELETE FROM `ASSET` WHERE `Assetid`=".$rem;
    $query = mysqli_query($conn, $sql);
    if($query){
             header("location:asset.php?rem");
    } else {

        header("location:user.php?error");
    }
        
}

if (isset($_POST['change']))
{
    $old= $_POST['opass'];
    $new= $_POST['pass'];
    $sql = "SELECT * FROM `ADMIN` WHERE `password`='".$old."'";//echo $sql;exit;
    
    $query = mysqli_query($conn, $sql);
    if($query){
        $sql = "UPDATE `ADMIN` SET `password` ='".$new."'";
    $query = mysqli_query($conn, $sql);
        
             header("location:change.php?success");
    } else {

        header("location:change.php?error");
    }
        
}


if (isset($_POST['assign'])) {
    $empid= $_POST['emp'];
    $assetid= $_POST['framework'];
    //print_r($assetid);    exit();
    $desc=$_POST['desc'];
    $date=date("Y-m-d h:i A");
    for($i=0;$i< count($assetid);$i++)
    {
    $sql = "INSERT INTO `ASSIGN`(`empid`,`assetid`,`description`,`date`) VALUES (".$empid.",'".$assetid[$i]."','".$desc."','".$date."');";
    //echo $sql;exit;
    $query = mysqli_query($conn, $sql);
   
         $result = mysqli_query($conn,"SELECT COUNT(`assetid`) FROM `ASSIGN` WHERE `assetid`='$assetid[$i]'");
         $count= mysqli_fetch_row($result);
         $sq="UPDATE `ASSIGN` SET count=$count[0] WHERE `assetid`='$assetid[$i]'";
         $as="UPDATE `ASSET` SET TempCount=$count[0] WHERE `AssetName`='$assetid[$i]'";
         //echo $sq;exit;
         $assign = mysqli_query($conn, $sq);
         $asset = mysqli_query($conn, $as);
    }
    if($query)
    {
         $put = mysqli_query($conn, $sq);
        header("location:management.php?success");
    } else {
       header("location:management.php?error");
    }
}

if (isset($_POST['login'])) {

    $user = mysqli_real_escape_string($conn, strtolower($_POST['user']));
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    $sql = "SELECT * FROM `ADMIN` WHERE `username`='" . $user . "'" . " AND `password`='" . $pass . "';";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);

    if ($user == $result['username']) {

        $username = $result['username'];

        session_start();
        $_SESSION['sid'] = session_id();
        $_SESSION['username'] = $username;
        $_SESSION['type'] = 1;
        $_SESSION['empid'] = 'admin';
        //print_r($_SESSION);exit;
        header("location:dashboard.php");
    } else {
        session_unset();
        session_destroy();
        header("location:index.php?error");
    }
}

if (isset($_POST['Save'])) {

    $empid = $_POST['EmpId'];
    $update = "UPDATE `EMPLOYEE` SET `EmpJobTitle`='" . $_POST['jobtitle'] . "',`EmpUname`='" . $_POST['uname'] . "',`EmpType`='" . $_POST['type']. "',`EmpFname`='" . $_POST['fname'] . "',`EmpLname`='" . $_POST['lname'] . "',`EmpGender`='" . $_POST['gender'] . "',`EmpEmail`='" . $_POST['email'] . "',`EmpPhone`='" . $_POST['phone'] . "',`EmpAddress`='" . $_POST['address'] . "' WHERE `EmpId`=" . $empid;
    $result = $conn->query($update);


    if ($result) {

        header("location:user.php?success");
    } else {

        header("location:user.php?error");
    }
}

if (isset($_POST['add'])) {

    $insert = "INSERT INTO `EMPLOYEE`(`EmpJobTitle`, `EmpType`,`EmpUname`, `EmpFname`, `EmpLname`, `EmpGender`, `EmpEmail`, `EmpPhone`, `EmpAddress`, `pass`) VALUES ('" . $_POST['jobtitle'] . "','" . $_POST['type'] . "','" . $_POST['uname'] . "','" . $_POST['fname'] . "','" . $_POST['lname'] . "','" . $_POST['gender'] . "','" . $_POST['email'] . "','" . $_POST['phone'] . "','" . $_POST['address'] . "','" . $_POST['pass'] . "')";

    $result = $conn->query($insert);


    if ($result) {

        header("location:user.php?success");
    } else {

        header("location:user.php?error");
    }
}

if (!empty($_POST['EmpId'])) {
    $EmpId = $_POST['EmpId'];
    $results = "SELECT * FROM `EMPLOYEE` WHERE `EmpId`='" . $EmpId . "'";
    $result = $conn->query($results);
    $row = $result->fetch_assoc();

    // send the data encoded as JSON
    $json = array('EmpFname' => $row['EmpFname'],
        'EmpLname' => $row['EmpLname'],
        'EmpGender' => $row['EmpGender'],
        'EmpType' => $row['EmpType'],
        'EmpUname' => $row['EmpUname'],
        'EmpPhone' => $row['EmpPhone'],
        'EmpEmail' => $row['EmpEmail'],
        'EmpId' => $row['EmpId'],
        'EmpAddress' => $row['EmpAddress'],
        'EmpJobTitle' => $row['EmpJobTitle']);
    echo json_encode($json);

    exit;
}


if (!empty($_POST['aid'])) {
    $aid = $_POST['aid'];
    $results = "SELECT * FROM `ASSET` WHERE `AssetId`='" . $aid . "'";
    $result = $conn->query($results);
    $row = $result->fetch_assoc();

    // send the data encoded as JSON
    $json = array
        ('AssetName' => $row['AssetName'],
        'AssetCode' => $row['AssetCode'],
        'AssetDescription' => $row['AssetDescription'],
        'AssetUnitPrice' => $row['AssetUnitPrice'],
        'AssetQuantity' => $row['AssetQuantity'],
        'AssetLocation' => $row['AssetLocation'],
        'AssetId' => $row['AssetId']);
    echo json_encode($json);

    exit;
}

if (isset($_POST['saveasset'])) {

    $assetid = $_POST['assetid'];
    $update = "UPDATE `ASSET` SET `AssetName`='" . $_POST['aname'] . "',`AssetCode`='" . $_POST['acode'] . "',`AssetDescription`='" . $_POST['adescription'] . "',`AssetUnitPrice`='" . $_POST['unitprice'] . "',`AssetQuantity`='" . $_POST['quantity'] . "',`AssetLocation`='" . $_POST['location'] . "',`AssetNote`='" . $_POST['assetnote'] . "' WHERE `AssetId`=" . $assetid;
    $result = $conn->query($update);


    if ($result) {

        header("location:asset.php?success");
    } else {

        header("location:asset.php?error");
    }
}

if (isset($_POST['addasset'])) {

    $insert = "INSERT INTO `ASSET`(`AssetName`, `AssetCode`, `AssetDescription`, `AssetUnitPrice`, `AssetQuantity`, `AssetLocation`, `AssetNote`) VALUES ('" . $_POST['aname'] . "','" . $_POST['acode'] . "','" . $_POST['adescription'] . "','" . $_POST['unitprice'] . "','" . $_POST['quantity'] . "','" . $_POST['location'] . "','" . $_POST['assetnote'] . "')";

    $result = $conn->query($insert);
    //print_r($insert);exit;


    if ($result) {

        header("location:asset.php?success");
    } else {

        header("location:asset.php?error");
    }
}

if (isset($_GET['releaseid'])) {

    $id= $_GET['releaseid'];
    $item= $_GET['item'];
    $save= mysqli_query($conn, "INSERT INTO `COMPLETE`(`empid`, `assetid`, `description`, `Date`) SELECT `empid`, `assetid`, `description`, `Date` FROM `ASSIGN` WHERE id=$id");
    $date = new DateTime();
    $release= $date->format('d-m-Y H:i A');
    $rdate= mysqli_query($conn, "UPDATE `COMPLETE` SET `ReleaseDate`='".$release."' WHERE `id`='$id'");
    //print_r($save);exit;
    $sql="DELETE FROM `ASSIGN` WHERE id=$id";
    $minus=mysqli_query($conn,"SELECT `TempCount` FROM `ASSET` WHERE AssetName='$item'");
    $result= mysqli_fetch_assoc($minus);
    extract($result);
    $newTempCount= ($TempCount-1);
    //echo $newTempCount;exit;
    
    $delete=mysqli_query($conn, "UPDATE `ASSET` SET `TempCount`=$newTempCount WHERE `AssetName`='$item'");
   //echo "UPDATE `ASSET` SET `TempCount`=$newTempCount, `ReleaseDate`='".$release."' WHERE `AssetName`='$item'";exit;
    $result = $conn->query($sql);
    
    if ($result) {
        header("location:management.php?release");
    } else {

        header("location:management.php?error");
    }
}

if (isset($_POST['addnote'])) {
    $desc = mysqli_real_escape_string($conn,$_POST['anote']);
    $assetid = $_POST['id'];
    $update = "UPDATE `ASSIGN` SET `description`='" . $desc."' WHERE `id`=" . $assetid;
    
    $result = $conn->query($update);


    if ($result) {

        header("location:management.php?added");
    } else {

        header("location:management.php?error");
    }
}

if (!empty($_POST['anote'])) {
    $aid = $_POST['anote'];
    $results = "SELECT * FROM `ASSIGN` WHERE `id`='" . $aid . "'";
    //echo $results;exit;
    $result = $conn->query($results);
    $row = $result->fetch_assoc();

    // send the data encoded as JSON
    $json = array
        ('desc' => $row['description'],
        'id' => $row['id']);
    echo json_encode($json);

    exit;
}

if(isset($_POST['checkdel']))
{
    $check=$_POST['check'];
    if(empty($check))
    {
        header("location:history.php?e");
    }
    foreach ($check as $key => $value) {
        $checkdel= mysqli_query($conn, "DELETE FROM `COMPLETE` WHERE id=$value");
        
        if($checkdel){
            header("location:history.php?sucess");
        } else {
            header("location:history.php?error");
        }
    }
}

if(isset($_POST['delall']))
{
        $checkdel= mysqli_query($conn, "DELETE FROM `COMPLETE`");
        
        if($checkdel){
            header("location:history.php?sucess");
        } else {
            header("location:history.php?error");
        }
}

?>