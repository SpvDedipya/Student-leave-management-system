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

	$sql = "SELECT * FROM `tbl_student` WHERE `rollnum` ='$activeuser' ";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);
?>
<!doctype html>
<html lang="en">

<head>
	<title>Profile|SLMS</title>
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
		.dis *{
			display:block;
			margin-top:20px;
			padding-top:0px;
			text-align:center;
		}
		
		.bgcol{
			background-color: white;
			border:2px solid #179b77;
		}
		.icon *{
			margin-top:15px;
		}
		.main{
			margin-top:-20px;
		}
		.nav{
			margin-top:-41.5px;
		}
		body {
    margin: 0;
    padding-top: 0px;
    color: #2e323c;
    background: #f5f6fa;
    position: relative;
    height: 100%;
}
.account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
}
.account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
}
.account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
}
.account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
}
.account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 24px;
    font-weight: 400;
    color: #9fa8b9;
}
.account-settings .about {
    margin: 2rem 0 0 0;
    text-align: center;
}
.account-settings .about h5 {
    margin: 0 0 15px 0;
    color: #007ae1;
}
.account-settings .about p {
    font-size: 16px;
}
.form-control {
    border: 1px solid #cfd1d8;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: 16px;
    background: #ffffff;
    color: #2e323c;
}

.card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
	padding: 30px;
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
<div class="container">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body height">
		<div class="account-settings">
			<div class="user-profile">
				<div class="user-avatar">
					<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
				</div>
				<h5 class="user-name"><?php echo htmlentities($row['fname']) ?></h5>
				<h6 class="user-email"><?php echo htmlentities($row['rollnum']) ?></h6>
				<!-- <h6 class="user-email">CSE</h6> -->
			</div>
			<!-- <div class="about">
				<h5>About</h5>
				<p>I'm Yuki. Full Stack Designer I enjoy creating user-centric, delightful and human experiences.</p>
			</div> -->
		</div>
	</div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mb-2 text-primary" style="font-size: 20px; color:#179b77">Personal Details</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="fullName">Full Name</label>
					<input type="text" class="form-control" id="fullName" placeholder="Enter full name" name="fname" readonly value="<?php echo htmlentities($row['fname']) ?>">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="website">Roll Number</label>
					<input type="text" class="form-control" id="website" placeholder="Roll Number" name="rollnum" value="<?php echo htmlentities($row['rollnum']) ?>" readonly>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="eMail">Branch</label>
					<input type="text" class="form-control" id="eMail" placeholder="Branch" name="branch" value="<?php echo htmlentities($row['branch']) ?>" readonly>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="phone">Section</label>
					<input type="text" class="form-control" id="phone" placeholder="Section" name="section" value="<?php echo htmlentities($row['section']) ?>" readonly>
				</div>
			</div>
			
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="website">Gender</label>
					<input type="text" class="form-control" id="website" placeholder="Gender" name="gender" value="<?php echo htmlentities($row['gender']) ?>" readonly>
				</div>
			</div>
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mt-3 mb-2 text-primary"  style="font-size: 20px; color:#179b77">Contact Details</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="ciTy">Email Id</label>
					<input type="name" class="form-control" id="ciTy" placeholder="Enter City" value="<?php echo htmlentities($row['email']) ?>" readonly>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="mobile">Mobile</label>
					<input type="name" class="form-control" id="Street" placeholder="mobile" value="<?php echo htmlentities($row['phonenumber']) ?>" readonly>
				</div>
			</div>
			
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="sTate">Parent|guardian Name</label>
					<input type="text" class="form-control" id="sTate" placeholder="Enter Name" value="<?php echo htmlentities($row['parent|guardian_name']) ?>" readonly>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="zIp">Parent|Guardian Mobile</label>
					<input type="text" class="form-control" id="zIp" placeholder="Mobile" value="<?php echo htmlentities($row['parent|guardian_num']) ?>" readonly>
				</div>
			</div>
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<!-- <div class="text-right">
					<button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button>
					<button type="button" id="submit" name="submit" class="btn btn-primary">Update</button>
				</div> -->
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
			<!-- END MAIN CONTENT -->
</div>
		
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
<?php } ?>