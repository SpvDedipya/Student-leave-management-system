<?php
include('include/config.php');
session_start();
if(!isset($_SESSION["sess_user"])){
	echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
	echo session_status();
}
else
{
	$active_user=$_SESSION["sess_user"];
	$error='';
	$msg='';
	
	if(isset($_POST['update']))
	{
		$currentpassword=$_POST['currentpassword'];
		$newpassword=$_POST['newpassword'];
		$confirmpassword=$_POST['confirmpassword'];
			$sql = "SELECT * FROM `tbl_student` WHERE `rollnum` ='$active_user' ";
			$query = mysqli_query($conn,$sql);
			$row = mysqli_fetch_array($query);
		
			if($row['logintype']=='student'){
				if($newpassword==$confirmpassword){
					if($row['password']==$currentpassword){
						$sql2 = " UPDATE  `tbl_student` SET password='$newpassword'  WHERE rollnum= '$active_user' ";
						$query2=mysqli_query($conn,$sql2);
						if($query2){
							$msg="Updated Successfully";
						}
						else{
							$error="Failed";
						}

					}
					else{
						$error="Current Password Doesn't Match";
					}
				}
				else{
					echo '<script> alert("Confirm Password Doesnot Match"); </script>';
				}
				
			}
			else{
				if($newpassword==$confirmpassword){
					$sql = "SELECT * FROM `admin` WHERE `username` ='$active_user' ";
					$query = mysqli_query($conn,$sql);
					$row = mysqli_fetch_array($query);

					if($row['password']==$currentpassword){
						$sql2 = " UPDATE  `admin` SET password='$newpassword'  WHERE username= '$active_user' ";
						$query2=mysqli_query($conn,$sql2);
						if($query2){
							$msg="Updated Successfully";
						}
						else{
							$error="Failed admin";
						}

					}
					else{
						$error="Current Password Doesn't Match";
					}
				}
				else{
					echo "<script type='text/javascript'> alert('Password Doesn't Match'); </script>";
				}
			}
	}
?>
<!doctype html>
<html lang="en">

<head>
	<title>ChangePassword|SLMS</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<style>
	.fpadding *{
			padding:25px;
		}
	.fpadding button{
		padding:10px 20px;
	}
	.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
	</style>
</head>

<body>
<!-- WRAPPER -->
<div id="wrapper">
	<!-- NAVBAR -->
	<div id="wrapper">
	<?php
		include('include/header.php');
	?>
	<!-- END NAVBAR -->
	<!-- LEFT SIDEBAR -->
	<?php
		include('include/sidebar.php');
	?>
 	<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title"></h3>
                    <div class="row">
						<div class="col-md-3"></div>
                        <div class="col-md-6 fpadding">
					    <div class="panel panel-headline">
						<?php if($error){?><div class="errorWrap" style="color: red; padding: 10px; border: 1px;"><strong>ERROR </strong>:<?php echo htmlentities($error); ?> </div><?php } 
                					else if($msg){?><div class="succWrap" style="color: greenyellow;"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div> <?php }?>
                            <h2>CHANGE PASSWORD</h2>
							<form method="POST">
							<lable>Current Password:</lable>
							<input type="text" class="form-control" placeholder="current password" name="currentpassword" required><br>
							<lable>New Password:</lable>
                            <input type="password" class="form-control" placeholder="new password" name="newpassword" required><br>
							<lable>Confirm Password:</lable>
                            <input type="text" class="form-control" placeholder="confirm password" name="confirmpassword" required><br>
                            <button class="button1" type="submit" name="update">UPDATE</button>
							
							</form>
                        </div>
                        </div>
					</div>
				</div>
			</div>
			
			
				
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
</body>

</html>
<?php }?>