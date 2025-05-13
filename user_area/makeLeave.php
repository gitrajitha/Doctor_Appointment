<?php
if (isset($_GET['make_leave'])) {
    $date = $_GET['make_leave'];
}

$doc_id = $_GET['doc_booking'];

$insert = "insert into appointments (doctor_id,Appointment_date,Total_count,booked_count,status)"
                . " values ('$doc_id','$date','0','0','On Leave')";
      $result_succ = mysqli_query($conn, $insert);
        echo "<script> swal('Successfull!', 'Made the Leave Successfully!', 'success')</script>";
   echo "<script> window.open('index.php?update_doc_appointment','_self')</script>";
