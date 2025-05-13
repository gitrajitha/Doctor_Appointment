<?php

session_start();

include("includes/db.php");

?>
<!DOCTYPE HTML>
<html>

<head>

<title>Admin Login</title>

<link rel="stylesheet" href="css/bootstrap.min.css" >

<link rel="stylesheet" href="css/login.css" >

 <script src="../javascript/sweetalert.js"></script>

</head>

<body>

<div class="container" ><!-- container Starts -->

<form class="form-login" action="" method="post" ><!-- form-login Starts -->

<h2 class="form-login-heading" >Admin Login</h2>

<input type="text" class="form-control" name="admin_email" placeholder="Email Address" required >

<input type="password" class="form-control" name="admin_pass" placeholder="Password" required >

<button class="btn btn-lg btn-primary btn-block" type="submit" name="admin_login" >

Log in

</button>


</form><!-- form-login Ends -->

</div><!-- container Ends -->



</body>

</html>

<?php

if(isset($_POST['admin_login'])){

$admin_email = mysqli_real_escape_string($Con,$_POST['admin_email']);

$admin_pass = mysqli_real_escape_string($Con,$_POST['admin_pass']);

$get_admin = "select * from admin where email='$admin_email' AND pass='$admin_pass'";

$run_admin = mysqli_query($Con,$get_admin);

$count = mysqli_num_rows($run_admin);

if($count==1){

$_SESSION['admin_email']=$admin_email;

//echo "<script>alert('You are Logged in into admin panel')</script>";
                        echo "<script> swal('Successfull!', 'You are Logged in into admin panel', 'success')</script>";

echo "<script>window.open('index.php?dashboard','_self')</script>";

}
else {

                echo "<script> swal('Attention!', 'Email or Password is Incorrect', 'warning')</script>";

}

}

?>