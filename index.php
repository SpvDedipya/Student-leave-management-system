<?php
session_start();
include('include/config.php');
$error='';
$msg='';
if(isset($_POST['asignin']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `admin` WHERE `username` = '$username' ";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);

    if($row['password'] == $password )
    {
            $_SESSION['sess_user'] = $row['username'];
            echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
            
    }
    else
    {
      $error="UserName Or Password Incorrect";
      // echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    }
}

if(isset($_POST['ssignin']))
{
    $rollnum = $_POST['rollnum'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `tbl_student` WHERE `rollnum` = '$rollnum' ";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);

    if($row['password'] == $password )
    {
            $_SESSION['sess_user'] = $row['rollnum'];
            echo "<script type='text/javascript'> document.location = 'profile.php'; </script>";
            
    }
    else
    {
      $error="Roll Number Or Password Incorrect";
      // echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="css/logstyle.css">
</head>
<body>

  <div class="navbar">
    <div class="logo">
      <img src="aitam.png" alt="Aitam Logo">
    </div>
    <div ><h2>Student Leave Management System</h2></div>
    <a href="register.php">New Student?</a>
  </div>


<!-- partial:index.partial.html -->
<div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Student</a></li>
        <li class="tab"><a href="#login">Faculty</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Student Login</h1>
          
          <form  method="post">
          
          <div class="field-wrap">
            <div class="field-wrap">
              <label>
                Roll Number<span class="req">*</span>
              </label>
              <input type="text" name="rollnum" required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <label>
                Password<span class="req">*</span>
              </label>
              <input type="password" name="password" required autocomplete="off"/>
            </div>
          </div>
          <?php if($error){?><div class="errorWrap" style="color: red; padding: 10px; border: 1px;"><strong>ERROR </strong>:<?php echo htmlentities($error); ?> </div><?php } 
                					else if($msg){?><div class="succWrap" style="color: greenyellow;"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div> <?php }?>
          <p class="forgot"><a href="forgetpassword.php">Forgot Password?</a></p>
          <button type="submit" name="ssignin" class="button button-block">Log In</button>
          
          </form>

        </div>
        
        <div id="login">   
          <h1>Admin Login</h1>
          
          <form method="POST">
          
            <div class="field-wrap">
            <label>
              UserName<span class="req">*</span>
            </label>
            <input type="text" name="username" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password"name="password" required autocomplete="off"/>
          </div>
          <?php if($error){?><div class="errorWrap" style="color: red; padding: 10px; border: 1px;"><strong>ERROR </strong>:<?php echo htmlentities($error); ?> </div><?php } 
                					else if($msg){?><div class="succWrap" style="color: greenyellow;"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div> <?php }?>
          <p class="forgot"><a href="forgetpassword.php">Forgot Password?</a></p>
          
          <button class="button button-block" type="submit" name="asignin">Log In</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="script/logscript.js"></script>

</body>
</html>
