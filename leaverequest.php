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
	$sql = "SELECT * FROM `tbl_student` WHERE `rollnum` ='$active_user' ";
	$query = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($query);
	$msg='';
	$error='';


	if(isset($_POST['apply']))
	{
		$fname=$_POST['fname'];
		$rollnum=$_POST['rollnum'];
		$todate= $_POST['todate'];
		$fromdate= $_POST['fromdate'];
		$leavetype =$_POST['leavetype'];
		$reason=$_POST['reason'];

    if($password==$cnfrmpassword){

    	$sql1 = "INSERT INTO `tbl_leave` (`fname`,`rollnum`,`todate`,`fromdate`,`leavetype`,`reason`) VALUES ('$fname','$rollnum','$todate','$fromdate','$leavetype','$reason')";
    	$query1 = mysqli_query($conn,$sql1);

			if(isset($query1))
			{
					echo '<script>alert("Success");</script>';
					// echo "<script type='text/javascript'> document.getElementById('msg').innerHTML = 'LEAVE APPLIED SUCCESSFULLY'; </script>";
					$msg='LEAVE APPLIED SUCCESSFULLY';
			}
			else
			{
					echo '<script>alert("Fail");</script>';
					// echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
					$error='Failed';
			}
    }
    else{
    			echo '<script>alert("Confirmation Failed Please Verifiy");</script>';
				// echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
	<title>Leave Request|SLMS</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>
<style>
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
		
	</style>
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
						<div class="col-md-6">
							<!-- INPUTS -->
							<div class="panel">
								<div class="panel-heading">
									<h2 class="container-fluid text-center">REQUEST FORM</h2>
									
									<?php if($error){?><div class="errorWrap" style="color: red; padding: 10px; border: 1px;"><strong>ERROR </strong>:<?php echo htmlentities($error); ?> </div><?php } 
                					else if($msg){?><div class="succWrap" style="color: greenyellow;"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div> <?php }?>
									
								</div>
								<div class="panel-body">
									<div class="div">
										<form class="form" method="POST">
											<h2 id="msg"></h2>
											<label class="">Full Name</label><br>
											<input type="text" class="form-control" name="fname" placeholder="Name" value="<?php echo htmlentities($row['fname']) ?>" readonly><br>
											<label class="">Roll Number</label><br>
											<input type="text" class="form-control" name="rollnum" readonly placeholder="Roll Number" value="<?php echo htmlentities($row['rollnum']) ?>"><br>
											<!-- <input type="text" class="form-control" name="fname" placeholder="Father Name"><br> -->
											<label class="">Leaving Date</label><br>
											<input class="form-control" type="date" name="fromdate" required><br>
											<label class="">Returning Date</label><br>
											<input class="form-control" type="date" name="todate" required><br>
											<select class="form-control" name="leavetype" required>
												<option>---SELECT PERMISSION TYPE---</option>
												<option>SICK LEAVE</option>
												<option>CASUAL LEAVE</option>
											</select><br>
											<input class="form-control" type="text" name="reason" placeholder="Reason" required><br>
											<!-- <input class="form-control" type="tel" name="phone" placeholder="Contact Number"><br> -->
											<input class="button1" type="submit" name="apply" value="APPLY">
										</form>
									</div>
								</div>
							</div>
							<!-- END INPUTS -->
							
						</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
</body>

</html>
<?php } ?>