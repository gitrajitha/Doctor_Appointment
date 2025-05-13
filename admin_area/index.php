<?php

session_start();

include("includes/db.php");

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>
<?php


$admin_session = $_SESSION['admin_email'];

$get_admin = "select * from admin  where email='$admin_session'";

$run_admin = mysqli_query($Con,$get_admin);

$row_admin = mysqli_fetch_array($run_admin);

$admin_id = $row_admin['id'];

$admin_name = $row_admin['name'];

$admin_email = $row_admin['email'];

$admin_image = $row_admin['image'];

$admin_country = $row_admin['country'];

$admin_job = $row_admin['job'];

$admin_contact = $row_admin['contact'];

$admin_about = $row_admin['about'];



?>


<!DOCTYPE html>
<html>

<head>

<title>Admin Panel</title>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="css/bootstrap.min.css" rel="stylesheet">

<link href="css/style.css" rel="stylesheet">
<!--<link href="css/styleDonut.css" rel="stylesheet">-->

<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" >

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</head>

<body>

	   
<div id="wrapper"><!-- wrapper Starts -->

<?php include("includes/sidebar.php");  ?>

<div id="page-wrapper"><!-- page-wrapper Starts -->

<div class="container-fluid"><!-- container-fluid Starts -->

<?php

if(isset($_GET['dashboard'])){

include("dashboard.php");

}

if(isset($_GET['insert_user'])){

include("insert_user.php");

}

if(isset($_GET['view_users'])){

include("view_users.php");

}

if(isset($_GET['view_doctors'])){

include("view_doctors.php");

}

if(isset($_GET['view_appointments'])){

include("view_appointments.php");

}



if(isset($_GET['user_delete'])){

include("user_delete.php");

}



if(isset($_GET['user_profile'])){

include("user_profile.php");

}



if(isset($_GET['send_user_Id'])){

include("view_user_appointments.php");

}



if(isset($_GET['send_doc_id'])){

include("view_doctor_appointments.php");

}



if(isset($_GET['delete_appointment'])){

include("delete_appointment.php");

}

if(isset($_GET['user_delete'])){

include("delete_user.php");

}

if(isset($_GET['doctor_delete'])){

include("delete_doctor.php");

}



if(isset($_GET['view_admins'])){

include("viewAdmins.php");

}



if(isset($_GET['grant_approval'])){

include("grantDoctor_approval.php");

}
?>

</div><!-- container-fluid Ends -->

</div><!-- page-wrapper Ends -->

</div><!-- wrapper Ends -->

<script  src="js/jquery.easypiechart.js"></script> 
    
<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>

<script>
    $(function() {
        $('.chart').easyPieChart({
            //your options goes here
        });
    });
</script>

</body>


</html>

<?php } ?>