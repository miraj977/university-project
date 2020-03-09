<?php

require('connect.php');
//echo $conn ? 'conected' : 'not conected';
//register
if (isset($_POST['register'])) {
//print_r($_POST);exit();
    if (isset($_POST['user'])) {
        $user = mysqli_real_escape_string($conn, $_POST['user']);
    }
    if (isset($_POST['email'])) {
        $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
    }
    if (isset($_POST['pass'])) {
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    }
    if (isset($_POST['fname'])) {
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    }
    if (isset($_POST['jobtitle'])) {
        $jobtitle = mysqli_real_escape_string($conn, $_POST['jobtitle']);
    }
    if (isset($_POST['lname'])) {
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    }
    if (isset($_POST['gender'])) {
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    }
    if (isset($_POST['address'])) {
        $address = mysqli_real_escape_string($conn, $_POST['address']);
    }
    if (isset($_POST['phone'])) {
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    }
    $checkuser = "SELECT * FROM `EMPLOYEE` WHERE `empuname`='$user'";
    $checkmail = "SELECT * FROM `EMPLOYEE` WHERE `empemail`='$email'";
    $checkusermail = "SELECT * FROM `EMPLOYEE` WHERE `empuname`='$user' AND `empemail`='$email'";
    $queryu = mysqli_query($conn, $checkuser);
    $querym = mysqli_query($conn, $checkmail);
    $queryum = mysqli_query($conn, $checkusermail);

    if (mysqli_num_rows($queryum) > 0) {
        header("location:register.php?usermail");
        exit();
    }

    if (mysqli_num_rows($queryu) > 0) {
        header("location:register.php?user");
        exit();
    }
    if (mysqli_num_rows($querym) > 0) {
        header("location:register.php?email");
        exit();
    } else {
        $sql = "INSERT INTO `EMPLOYEE` (`EmpJobTitle`, `EmpUname`,`EmpFname`,`EmpLname`,`EmpEmail`,`EmpAddress`,`pass`,`EmpGender`,`EmpPhone`) VALUES 
		('" . $jobtitle . "','" . $user . "', '" . $fname . "', '" . $lname . "', '" . $email . "', '" . $address . "','" . $pass . "', '" . $gender . "','" . $phone . "');";
//echo $sql; exit;
        $query = mysqli_query($conn, $sql);
        if ($query > 0) {
            header("location:index.php?success");
        } else {
            header("location:register.php?fail");
        }
    }
}

//login to the members
if (isset($_POST['login'])) {

    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['pass'])) {
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    }
    $sql = "SELECT * FROM `EMPLOYEE` WHERE `EmpEmail`='" . $email . "'" . " AND `pass`='" . $pass . "';";
    $sql1 = "SELECT * FROM `EMPLOYEE`";
//echo $sql; exit;
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);
//print_r($result);exit;
    if ($email == $result['EmpEmail']) {

        $username = $result['EmpUname'];
//echo $username;exit;
        session_start();
        $_SESSION['sid'] = session_id();
        $_SESSION['username'] = $username;
        $_SESSION['type'] = $result['EmpType'];
        $_SESSION['empid'] = $result['EmpId'];
        //print_r($result);echo "<br>"; print_r($_SESSION);exit();
        header("location:admin/dashboard.php");
    } else {
        session_unset();
        session_destroy();
        header("location:index.php?error");
    }
}


if (isset($_POST['forgot'])) {
    $to = $_POST['email'];
    if($to=="")
    {
        header("location:forgot.php");
    }
    $sql = mysqli_query($conn, "SELECT * FROM `EMPLOYEE` WHERE `EmpEmail`='$to';");
    $result = mysqli_fetch_assoc($sql);
    if (!empty($result['EmpEmail'])) {
        ini_set("SMTP","aspmx.l.google.com");
        $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Additional headers
    $headers[] = 'To'.$_POST['email'];
    $headers[] = 'From: Property Management System <contactus@loyalpartners.com.au>';


        $subject = "Forgot Password";
        $message = 'Dear ' . $result['EmpFname'] . ' ' . $result['EmpLname'] . ' your password is: \r\n"' . $result['pass'] . '"';
        mail($to, $subject, $message, $headers);
        if (mail($to, $subject, $message, $headers)) {
            echo "Mail Sent Successfully";
        } else {
            echo "Mail Not Sent";
        }
        header("location:forgot.php?success");
    } else {
        header("location:forgot.php?error");
    }
}

if (isset($_POST['change']))
{
    $email= $_POST['email'];
    $old= $_POST['opass'];
    $new= $_POST['pass'];
    $sql = "SELECT * FROM `EMPLOYEE` WHERE `EmpEmail`='".$email."' AND `pass`='".$old."'";//echo $sql;exit;
    
    $query = mysqli_query($conn, $sql);
    if($query){
        $sql = "UPDATE `EMPLOYEE` SET `pass` ='".$new."'";
    $query = mysqli_query($conn, $sql);
        
             header("location:change.php?success=$email");
    } else {

        header("location:change.php?error");
    }
        
}
?>