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
?>
<!doctype html>
<html lang="en">

<head>
	<title>Accepted Leaves|SLMS</title>
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
			padding:27px;
		}
		.acc{
			padding:10px;
			background-color:green;
			color:white;
			border:solid white 2px;
			border-radius:5px;
		}
		.rjj{
			padding:10px;
			background-color:red;
			color:white;
			border:solid white 2px;
			border-radius:5px;
		}
		/* table search */
.search {
    position: relative;
    box-shadow: 0 0 40px rgba(51, 51, 51, .1)
}
.search input {
    height: 60px;
    text-indent: 25px;
    border: 2px solid #d6d4d4;
	border-radius:5px;
}

.search input:focus {
    border: 2px solid green;
}

.search .fa-search {
    position: absolute;
    top: 20px;
    left: 16px;
}

.search button {
    position: absolute;
    top: 5px;
    right: 5px;
    height: 50px;
    width: 110px;
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
					<h3 class="page-title">Accepted Leaves</h3>
					<!-- search bar start -->
					<div class="container">
						<div class="row height d-flex justify-content-center align-items-center">
							<div class="col-md">
								<div class="search"> <i class="fa fa-search"></i> <input type="text" class="form-control" placeholder="search in table By Name" id="myinput" onkeyup="filterfun()"></div>
							</div>
						</div>
					</div>
					<br>
					<!-- saerch bar end -->
					<div class="row">
						<div class="col">
							<!-- TABLE STRIPED -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"></h3>
								</div>
								<div class="panel-body">
									<table class="table table-striped" id="mytable">
										<thead>
											<tr>
												<th>Sno</th>
												<th>Name</th>
												<!-- <th>branch</th> -->
												<th>rollno</th>
												<!-- <th>section</th> -->
												<th>leave type</th>
												<th>From Date</th>
												<th>TO Date</th>
												<th>Reason</th>
												<th>Status</th>
												<TH>Action</TH>
												<!-- <th>leave reason</th>
												<th>Accepted</th> -->
											</tr>
										</thead>
										<tbody>
											<?php
											$sql1="SELECT * FROM `tbl_leave` WHERE status='Accepted'";
											$query1=mysqli_query($conn,$sql1);
										
											while($row1 = mysqli_fetch_array($query1))
											{
												echo '<tr><td>'.$row1["slno"].'</td>
														<td>'.$row1["fname"].'</td>
														
														<td>'.$row1["rollnum"].'</td>
														
														<td>'.$row1["leavetype"].'</td>
														<td>'.$row1["fromdate"].'</td>
														<td>'.$row1["todate"].'</td>
														<td>'.$row1["reason"].'</td>
														<td>'.$row1["status"].'</td>
														<td><button class="acc"><a class="coll" href="requestdetails.php?rollnum='.$row1['rollnum'].'&slno='.$row1['slno'].'">Details</a></button></td>		
														</tr>';
											}?>
				
										</tbody>
									</table>
								</div>
							</div>
							<!-- END TABLE STRIPED -->
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
	<script>
		function filterfun(){
			let filter=document.getElementById('myinput').value.toUpperCase();
			let mytable=document.getElementById('mytable');
			let tr=mytable.getElementsByTagName('tr');
			for(var i=0;i<tr.length;i++){
				let td=tr[i].getElementsByTagName('td')[1];
				if(td){
					let textvalue=td.textContent || td.innerHTML;
					if(textvalue.toUpperCase().indexOf(filter) > -1){
						tr[i].style.display="";
					}else{
						tr[i].style.display="none";
					}

				}
			}
		}
	</script>
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
</body>

</html>

<?php } ?>