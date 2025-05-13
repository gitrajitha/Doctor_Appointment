<?php

session_start();
include_once "php/config.php";

$q1 = "";
$q2 = "";
$q3 = "";
$q4 = "";
$q3_1 = "";
$closestDoc = "";
$user_Id = $_SESSION['unique_id'];



if (isset($_GET['q1'])) {
    $_SESSION['q1'] = $_GET['q1'];
    $q1 = $_GET['q1'];
}

if (isset($_GET['q2'])) {
    $_SESSION['q2'] = $_GET['q2'];
    $q2 = $_GET['q2'];
}

if (isset($_GET['q3'])) {
    $_SESSION['q3'] = $_GET['q3'];
    $q3 = $_GET['q3'];
}
if (isset($_GET['q4'])) {
    $_SESSION['q4'] = $_GET['q4'];
    $q4 = $_GET['q4'];
}

if (isset($_GET['q3_1'])) {
    $_SESSION['q3_1'] = $_GET['q3_1'];
    $q3_1 = $_GET['q3_1'];
}
$update = "update users set q1='$q1',q2 = '$q2',q3='$q3',q3_1='$q3_1',q4='$q4' where unique_id='$user_Id'";

$run_query = mysqli_query($conn, $update);


if ($q1 == "y" && $q2 == "y" && $q3 == "y" && $q4 == "y") {

    $get_date = "Select date(now()) as date from dual ";
    $run_date = mysqli_query($conn, $get_date);
    $row_date = mysqli_fetch_array($run_date);

    $dateToday = $row_date['date'];


    $stmt = $conn->prepare("select * from appointments where Appointment_date = ? and status = ?");
    $status = 'Already Booked';
    $date = $dateToday;
    $stmt->bind_param('ss', $date, $status);
    $bookings = array();
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $bookings[] = $row['doctor_id'];
            }
            //echo $bookings;
            $stmt->close();
        }
    }

    $get_result = "select * from doctor order by tot_rate desc ";

    $run_doc = mysqli_query($conn, $get_result);

    while ($row_doc = mysqli_fetch_array($run_doc)) {

        $doctorId = $row_doc['user_id'];

        if (in_array($doctorId, $bookings)) {
            //echo $doctorId;
        } else {
            $closestDoc = $doctorId;
            break;
        }
    }
    echo $closestDoc;
    echo "<script> window.open('user_area/index.php?date_booking=$date&doc_booking=$closestDoc ','_self')</script>";
} else {
    echo "<script> window.open('user_area/index.php?dashboard ','_self')</script>";
}
?>
