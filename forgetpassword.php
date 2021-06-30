
<?php
session_start();
include('include/config.php');
$msg='';
$error='';
if(isset($_POST['forget']))

{   
    $logintype=$_POST['logintype'];
    $username=$_POST['username'];
    $question= $_POST['question'];
    $answer= $_POST['answer'];
    
    
    if($logintype=='admin'){

    	$sql = "SELECT * FROM `admin` WHERE `username`='$username'";
    	$query = mysqli_query($conn,$sql);
       
        $row=mysqli_fetch_array($query);
        if($row['question']==$question && $row['answer']==$answer){
            $msg=$row['password'];
            
        }
        else{
            $error="Data Not found";
        }
    }
    elseif($logintype=='student'){
        $sql = "SELECT * FROM `tbl_student` WHERE `rollnum`='$username'";
    	$query = mysqli_query($conn,$sql);
       
        $row=mysqli_fetch_array($query);
        if($row['question']==$question && $row['answer']==$answer){
            $password=$row['password'];
            echo "<script>alert(' The Password is $password')</script>";
        }
        else{
            $error="Data Not found";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Forget Password|SLMS</title>
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
            padding:15px;
        }
    </style>
</head>
<style>
.navbar{
    padding-top: 20px;
    background-color: rgba(19, 35, 47, 0.9);
    height: auto;
    padding-bottom: -20px;
}
.navbar img{
  float: left;
  position: static;
  height: 70px;
  padding-top: 10px;
  margin-left: 10px;
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
.navbar a{
  position: relative;
  top: -45px;
  float: right;
  display: block;
  color: #f2f2f2;
  text-align: center;
  text-decoration: none;
  font-size: 17px;
  padding: 10px;
}
.navbar h2{
  text-align: center;
  color: #ffffff;
  font-weight: 300;
  font-size: 30px;
  justify-content: space-around;
}
.navbar a:hover {
  background: #ddd;
  color: black;
}
.bg2 *{
    margin-top:20px;
}

</style>

<body>

    
    <!-- WRAPPER -->
    <div id="wrapper">
        <!-- NAVBAR -->
        <nav class="navbar navbar-default navbar-fixed-top">
        <div class="logo">
            <img src="aitam.png"  alt="Aitam Logo">
        </div>
    
        <div ><h2>Student Leave Management System</h2></div>
            <a href="index.php">Log In</a>
        </nav>
        <!-- END NAVBAR -->
 
                <div class="main">
                    <!-- MAIN CONTENT -->
                    <div class="main-content">
                        <div class="container-fluid">
                            <h3 class="page-title"></h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- INPUTS -->
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"></h3>
                                        </div>
                                        

                                    <div class="panel-body">
                                    <form  method="POST">
                                    <div class="bg2">    
                                        <lable>Login Type: </lable>
                                        <select class="form-control" name="logintype" required aria-placeholder="Select from Below">
                                            <option value="admin">admin</option>
                                            <option value="student">student</option>
                                        </select>
                                        <lable>Username:</lable>
                                        <input class="form-control"  type="text" name="username" placeholder="Username/Roll Number" required><br>
                                        <lable>Recovery Question: </lable>
                                        <select class="form-control" name="question" required aria-placeholder="Select from Below">
                                            <option value="Your pet name?">Your pet name?</option>
                                            <option value="Your native place?">Your native place?</option>
                                            <option value="Your school friend?">Your school friend?</option>
                                            <option value="Your grandmother's native place?">Your grandmother's native place?</option>
                                            <option value="Your favourite town?">Your favourite town?</option>
                                        </select>

                                        <input class="form-control"  type="text" name="answer" placeholder="answer" required><br>

                                        <input type="submit" value="Submit" name="forget" class="button1" required>
                                       
                                        <?php if($error){?><div class="errorWrap" style="color: red; padding: 10px; border: 1px;"><strong>ERROR </strong>:<?php echo htmlentities($error); ?> </div><?php } 
                				    	else if($msg){?><div class="succWrap" style="color: greenyellow;"><strong>SUCCESS : The Password is </strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

                                    </div>
                                    </form>
                                    </div>

                   
        <!-- END WRAPPER -->
            <!-- Javascript -->
            <script src="assets/vendor/jquery/jquery.min.js"></script>
            <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
            <script src="assets/scripts/klorofil-common.js"></script>
</body>
</html>