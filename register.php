<?php
session_start();
include('include/config.php');
if(isset($_POST['register']))
{
    $fname = $_POST['fname'];
    $rollno= $_POST['rollnum'];
    $branch= $_POST['branch'];
    $section= $_POST['section'];
    $gender= $_POST['gender'];
    $phonenumber= $_POST['phonenumber'];
    $email= $_POST['email'];
    $parent_name= $_POST['parent|guardian_name'];
    $parent_num= $_POST['parent|guardian_num'];
    $password= $_POST['password'];
    $cnfrmpassword= $_POST['cnfrmpassword'];
    $question= $_POST['question'];
    $answer= $_POST['answer'];
    if($password==$cnfrmpassword){

    	$sql = "INSERT INTO `tbl_student` (`fname`,`rollnum`,`branch`,`section`,`gender`,`phonenumber`,`email`,`parent|guardian_name`,`parent|guardian_num`,`password`,`question`,`answer`) VALUES ('$fname','$rollno','$branch','$section','$gender','$phonenumber','$email','$parent_name','$parent_num','$password','$question','$answer')";
    	$query = mysqli_query($conn,$sql);

			if(isset($query))
			{
					echo '<script>alert("Success");</script>';
					echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
			}
			else
			{
					echo '<script>alert("Fail");</script>';
					echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
			}
    }
    else{
    			echo '<script>alert("Confirmation Failed Please Verifiy");</script>';
				// echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register|SLMS</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendor/linearicons/style.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <style>
        .radin *{
            display:inline;
            padding:13px;
        }
        .navbar *{
            display:inline;
        }
        .navbar{
            padding-top: 5px;
            background-color:black;
            height: auto;
        }
        .navbar img{
        float: left;
        position: static;
        height: 60px;
        padding-top: 5px;
        }
        .navbar a{
        margin:0.4%;
        padding-left:30%;
        position: relative;
        float: right;
        border:solid #ddd 2px;
        color: white;
        border-radius:3px;
        text-align: center;
        text-decoration: none;
        font-size: 17px;
        padding:7px;
        }
        .navbar h2{
        text-align: center;
        color: white;
        padding-left:30%;
        font-weight: 300;
        font-size: 30px;
        justify-content: space-around;
        }
        .navbar a:hover {
        background: #ddd;
        color: black;
        }
         @media screen and (max-width: 767px)
            {
                nav div{
                    display: flex;
                    height:230px;
                    flex-direction: column;
                    text-align: center;
                }
            }
        /*button*/
         .button1{
            background-color: #179b77;
            padding:10px 80px;
            color:white;
            border:solid white 2px;
            border-radius: 10px;
        }
        h1{
            color:#1ab188
        }
    </style>
</head>

<body>

    
        <!-- WRAPPER -->
        <div id="wrapper">
                <!-- NAVBAR -->
                <nav class="navbar navbar-default navbar-fixed-top">
                <div class="logo">
                    <img src="aitam.png"  alt="Aitam Logo">
                </div>
            
                <div class="d1"><h2>Student Leave Management System</h2></div>
                <a href="index.php">Log In &nbsp;<span class="lnr lnr-enter"></span></a>
                </nav>
                <!-- END NAVBAR -->
                <div class="main">
                    <!-- MAIN CONTENT -->
                    <div class="main-content">
                        <div class="container-fluid">
                            <h3 class="page-title"></h3>
                            <div class="row">
                                <div class="col-md-10">
                                    <!-- INPUTS -->
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"></h3>
                                        </div>
                                        <div class="panel-body">
                                            <form  method="POST">
                                                    <h1 class="task"><center>REGISTRATION FORM</marquee></font> <center></h1><br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <lable> FULL NAME  :</lable><input class="form-control" type="text" name="fname" placeholder="name" required >
                                                        </div>
                                                        <div class="col-md-6">
                                                            <lable>PHONE NUMBER  :</lable>
                                                            <input class="form-control" type="text" name="phonenumber" placeholder="phone number" required><br>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        <lable>ROLL NO  :</lable>
                                                            <input class="form-control" type="text" name="rollnum" placeholder="roll number" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <lable>EMAIL ID  :</lable>
                                                            <input class="form-control" type="email" name="email" placeholder="email id" required>
                                                        </div>
                                                    </div><br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <lable >BRANCH  :</lable>
                                                                <select name="branch" class ="form-control" required>
                                                                <option>select your option</option>
                                                                <option>CSE</option>
                                                                <option>ECE</option>
                                                                <option>IT</option>
                                                                <option>EEE</option>
                                                                <option>MECH</option>
                                                                <option>CIVIL</option>
                                                                </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <lable>PARENT/GUARDIAN NAME  :</lable>
                                                            <input class="form-control" type="text" name="parent|guardian_name" placeholder="name" required><br>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <lable>SECTION  :</lable>
                                                            <input class="form-control" type="text" name="section" placeholder="section" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <lable>PARENT/GAURDIAN PHONE NUMBER :</lable>
                                                            <input class="form-control" type="text" name="parent|guardian_num" placeholder="phonenumber" required>
                                                        </div>
                                                    </div><br>
                                                    <div class="row">
                                                        <div class="col-md">
                                                            <div class="radin">
                                                                <lable>GENDER  :</lable>
                                                                <input type="radio" name="gender" value="male" class="fancy-radio" required><label><font color="navy">  Male</font></label>
                                                                <input type="radio" name="gender" value="female" class="fancy-radio"><label><font color="navy">Female</font></label>
                                                            </div>
                                                        </div>
                                                    </div><br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <lable>PASSWORD :</lable>
                                                            <input type="password" class="form-control" name="password" required><br>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <lable>CONFIRM PASSWORD :</lable>
                                                            <input type="password" class="form-control" name="cnfrmpassword" required><br>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <lable>RECOVERY QUESTION? :</lable>
                                                                        <select class="form-control" name="question" required aria-placeholder="Select from Below">
                                                                            <option value="Your pet name?">Your pet name?</option>
                                                                            <option value="Your native place?">Your native place?</option>
                                                                            <option value="Your school friend?">Your school friend?</option>
                                                                            <option value="Your grandmother's native place?">Your grandmother's native place?</option>
                                                                            <option value="Your favourite town?">Your favourite town?</option>
                                                                        </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <lable>ANSWER :</lable>
                                                            <input class="form-control"  type="text" name="answer" placeholder="answer" required>
                                                        </div>
                                                    </div><br>
                                                    <input type="submit" value="Submit" name="register" class="button1" required>
                                               </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
                    
                        
         <!-- END WRAPPER -->
            <!-- Javascript -->
            <script src="assets/vendor/jquery/jquery.min.js"></script>
            <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
            <script src="assets/scripts/klorofil-common.js"></script>
</body>

</html>