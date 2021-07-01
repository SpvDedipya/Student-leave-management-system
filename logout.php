<?php
include('include/config.php');
session_start();
if(!isset($_SESSION["sess_user"])){
	echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
	echo session_status();
}
else{
    $active_user=$_SESSION["sess_user"];

$sql = "SELECT * FROM `tbl_student` WHERE `rollnum` ='$active_user' ";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
date_default_timezone_set("Asia/Calcutta");
if(!$row['logintype']=='student'){
    $sql2 = "UPDATE  `admin` SET lastlogindate='".date("d-m-Y H:i:s")."' WHERE username='$active_user' ";
    $query2=mysqli_query($conn,$sql2);
}
else{
    $sql2 = "UPDATE  `tbl_student` SET lastlogindate='".date("d-m-Y H:i:s")."' WHERE rollnum='$active_user' ";
    $query2=mysqli_query($conn,$sql2);

}
unset($_SESSION['sess_user']);
session_destroy();
echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}
?>