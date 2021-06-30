<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						
						<?php
						$sql = "SELECT * FROM `tbl_student` WHERE `rollnum` ='$active_user' ";
						$query = mysqli_query($conn,$sql);
						$row = mysqli_fetch_array($query);
						?>
						<?php
						if(!$row['logintype']=='student'){
						?>
							<?php 
							$sql1="SELECT * FROM `admin` where username='$active_user'";
							$query1=mysqli_query($conn,$sql1);
							$row1=mysqli_fetch_array($query1);

							?>
							<li><center><div class="log">
							<i class='fa fa-user-o'></i>
							<label>Login-type  :  <?php echo htmlentities($row1['logintype']) ?><label>
							<label>Name  :   <?php echo htmlentities($row1['username']) ?><label>
							<label>Last Login  :  <?php echo htmlentities($row1['lastlogindate']) ?><label>
						</div></center></li>

						<?php } ?>
						<?php 
						if($row['logintype']=='student'){
						?>
						<li><center><div class="log">
							<i class='fa fa-user-o'></i>
							<label>Login-type  : <?php echo htmlentities($row['logintype']) ?><label>
							<label>Name  :  <?php echo htmlentities($row['fname']) ?><label>
							<label>Last Login  :  <?php echo htmlentities($row['lastlogindate']) ?><label>

						</div></center></li>
						<?php } ?>
						<?php
						if(!$row['logintype']=='student'){
						?>
						<li><a href="dashboard.php" <?php if(header("dashboard.php")==1) {?>class="active"<?php } ?>><i class='fa fa-dashboard'></i> <span>Dashboard</span></a></li>
						<?php } ?>
						<?php
						if($row['logintype']=='student'){
						?>
						<li><a href="leaverequest.php" class=""><i class='fa fa-wpforms'></i> <span>Leave request</span></a></li>
						<?php
						}
						?>
						<?php
						if($row['logintype']=='student'){
						?>
						<li><a href="leavehistroy.php" class=""><i class='fa fa-wpforms'></i> <span>Leave Histroy</span></a></li>
                        <?php
						}
						?>
                        <?php
						if($row['logintype']=='student'){
						?>
						<li><a href="profile.php" class=""><i class='fa fa-user-circle'></i> <span>Profile</span></a></li>
                        <?php
						}
						?>
						<?php
						if(!$row['logintype']=='student'){
						?>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class='fa fa-file-o'></i> <span>Leave management</span>  <i class="icon-submenu fa fa-angle-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
								<li><a href="leaves.php" class="">Leaves</a></li>
								<li><a href="pending.php" class="">Pending</a></li>
								<li><a href="accepted.php" class="">Accepted</a></li>
								<li><a href="rejected.php" class="">Rejected</a></li>
								</ul>
							</div>
						</li>
						<?php } ?>
						<!-- <li><a href="register.php" class=""><i class='fa fa-user-circle'></i><span>Register Student</span></a></li> -->
						<li><a href="changepassword.php" class=""><i class='fa fa-pencil-square-o'></i><span>Change password</span></a></li>
						<li><a href="logout.php" class=""><i class='fa fa-arrow-right'></i> <span>Logout</span></a></li>
                       
					</ul>
				</nav>
			</div>
		</div>