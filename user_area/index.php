<?php

session_start();

include("../php/config.php");

//if(!isset($_SESSION['seller_email'])){
//
////echo "<script>window.open('login.php','_self')</script>";
//
//}
//
//else {

$user_Id = $_SESSION['unique_id'];
$get_type = "select * from users where unique_id='$user_Id'";
$run_user_type = mysqli_query($conn, $get_type);
$row_type = mysqli_fetch_array($run_user_type);

$user_name = $row_type['fname'];



?>


<!DOCTYPE html>
<html>

<head>

<title>Doctor Appointment</title>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="css/bootstrap.min.css" rel="stylesheet">

<link href="css/style.css" rel="stylesheet">
<link href="style2.css" rel="stylesheet">

<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" >

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="../javascript/sweetalert.js"></script>


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


if(isset($_GET['doctor_id'])){

include("details.php");

}

if(isset($_GET['doctor_booking'])){

include("doctor_booking.php");

}

if(isset($_GET['date_booking'])){

include("book.php");

}
if(isset($_GET['view_chat'])){

include("users.php");

}
if(isset($_GET['user_query'])){

include("result.php");

}

if(isset($_GET['view_appointment'])){

include("myAppointments.php");

}

if(isset($_GET['view_more'])){

include("viewMoreAppointment.php");

}

if(isset($_GET['delete_appointment'])){

include("delete_appointment.php");

}

if(isset($_GET['doctor_rate'])){

include("rate_doctor.php");

}

if(isset($_GET['findDoc'])){

include("findDoctor.php");

}

if(isset($_GET['findDocId'])){

include("findDocbyId.php");

}

if(isset($_GET['insert_story'])){

include("insert_story.php");

}

if(isset($_GET['view_story'])){

include("view_story.php");

}


if(isset($_GET['update_doc_appointment'])){

include("DoctorDateUpdate.php");

}

if(isset($_GET['make_leave'])){

include("makeLeave.php");

}
?>

</div><!-- container-fluid Ends -->

</div><!-- page-wrapper Ends -->

</div><!-- wrapper Ends -->
    
<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>


</body>


</html>

<?php //} ?>