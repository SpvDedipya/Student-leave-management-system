<?php
include('include/config.php');
session_start();
if(!isset($_SESSION["sess_user"])){
	echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
	echo session_status();
}
else
{
   
	echo session_status();
    $active_user=$_SESSION["sess_user"];
    
    
    
    
    
                                     
                                

?>
<!doctype html>
<html lang="en">

<head>
	<title>Leave Details|SLMS</title>
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
        th{
            color:#00796B;
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
					<h3 class="page-title">Leave details</h3>
					<div class="row">
						<div class="col">
							<!-- TABLE STRIPED -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"></h3>
								</div>
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>

												<th colspan="6"><h2>Leave Details :</h2></th>
												
											</tr>
                                            
										</thead>
                                        
										<tbody>
                                            <?php
                                            $rollnum=$_GET["rollnum"];
                                            $slno=$_GET["slno"];
                                            $sql = "SELECT * FROM `tbl_student` WHERE `rollnum` ='$rollnum' ";
                                            $query = mysqli_query($conn,$sql);
                                            $row = mysqli_fetch_array($query); 
                                            
                                            ?>
                                            <tr>
                                                <th>Name :</th>
                                                <td><?php echo htmlentities($row['fname']);?></td>
                                                <th>Roll No:</th>
                                                <td><?php echo htmlentities($row['rollnum']);?></td>
                                                <th>Branch:</th>
                                                <td><?php echo htmlentities($row['branch']);?></td>
												
                                            </tr>
                                            <tr>
                                                <th>Section :</th>
                                                <td><?php echo htmlentities($row['section']);?></td>
                                                <th>Gender:</th>
                                                <td><?php echo htmlentities($row['gender']);?></td>
                                                <th>Phone Number :</th>
                                                <td><?php echo htmlentities($row['phonenumber']);?></td>
												
                                            </tr>
                                            <tr>
                                                <th>Email:</th>
                                                <td><?php echo htmlentities($row['email']);?></td>
                                                <th>Parent|GAURDIAN Name :</th>
                                                <td><?php echo htmlentities($row['parent|guardian_name']);?></td>
                                                <th>Parent|GAURDIAN Number :</th>
                                                <td><?php echo htmlentities($row['parent|guardian_num']);?></td>
												
                                            </tr>
                                            <?php 
                                            $sql1 = "SELECT * FROM `tbl_leave` WHERE `slno`='$slno' ";
                                            $query1 = mysqli_query($conn,$sql1);
                                            $row1=mysqli_fetch_array($query1);
                                           
                                            ?>
                                            <tr>
                                                <th>Leave Type:</th>
                                                <td><?php echo htmlentities($row1['leavetype']);?></td>
                                                <th>Leave Date:</th>
                                                <td><?php echo htmlentities($row1['fromdate']);?> to <?php echo htmlentities($row1['todate']);?></td>
                                                <th>Posting Date:</th>
                                                <td><?php echo htmlentities($row1['postingdate']);?></td>
												
                                            </tr>
                                            <tr>
                                                <th>Student Leave Discription :</th>
                                                <td colspan="5"><?php echo htmlentities($row1['reason']);?></td>
                                            </tr>
                                            <tr>
                                                <th>Leave status:</th>
                                                <td colspan="5"><?php echo htmlentities($row1['status']);?></td>
                                            </tr>
                                            <tr>
                                                <th colspan="">Admin Remark:</th>
                                                <td colspan="5"><?php echo htmlentities($row1['adminremark']);?></td>
                                            </tr>
                                            <tr>
                                                <th colspan="">Admin Action Taken Date:</th>
                                                <td colspan="5"><?php echo htmlentities($row1['adminremarkdate']);?></td>
                                            </tr>
											<tr> 
                                            <?php
                                            $sql = "SELECT * FROM `tbl_student` WHERE `rollnum` ='$active_user' ";
                                            $query = mysqli_query($conn,$sql);
                                            $row = mysqli_fetch_array($query);
                                            if(!$row['logintype']=='student')
                                            { 
                                                if($row1['status']=='Pending')
                                                {
                                            ?>
                                                <td colspan="6"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Take Action</button></td>
                                            <?php 
                                                }
                                            }
                                            ?>
                                            </tr>
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
    <!-- MODAL BEGIN-->



            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST">
                <div class="modal-body">
                    
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Action:</label>
                        <select class="form-control" name="status" required>
												<option>Accepted</option>
												<option>Rejected</option>
						</select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Admin Remark:</label>
                        <textarea class="form-control" name="adminremark" id="message-text"></textarea>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
                </div>
                </form>
                <?php 
                if(isset($_POST['submit']))
                {
                    $status = $_POST['status'];
                    $adminremark = $_POST['adminremark'];
                    $time=
                    $sql2 = "UPDATE  `tbl_leave` SET status='$status' , adminremark='$adminremark',adminremarkdate='".date("d-m-Y H:i:s")."' WHERE slno='$slno' ";
                    $query2 = mysqli_query($conn,$sql2);
                    if(!$query2){
                        echo "<script type='text/javascript'> alert('failed'); </script>";
                    }
                    else{
                        echo "<script type='text/javascript'> window.onload = function() {
                            if(!window.location.hash) {
                                window.location = window.location + '#loaded';
                                window.location.reload();
                            }
                        } </script>";
                    }
                    
                }
                ?>
            </div>
            </div>
    <!-- MODAL END -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
</body>

</html>
<?php } ?>