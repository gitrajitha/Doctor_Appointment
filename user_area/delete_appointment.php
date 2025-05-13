
<?php

if (isset($_GET['delete_appointment'])) {

    $delete_id = $_GET['delete_appointment'];

    $select_book_status = "select * from appointments a inner join appointment_timeslots at on at.appointment_Id = a.Appointment_Id  where at.time_slot_id='$delete_id'";

    $run_delete = mysqli_query($conn, $select_book_status);

    $row_doc = mysqli_fetch_array($run_delete);

    $appointment_id = $row_doc['appointment_Id'];
    $book_count = $row_doc['booked_count'];

    $new_booked_count = $book_count - 1;

    $bookStatus = "Can Book";

    $update = "update appointments set booked_count='$new_booked_count',status = '$bookStatus' where Appointment_Id='$appointment_id'";

    $run_query = mysqli_query($conn, $update);

    $delete_appointment = "delete from appointment_timeslots where time_slot_id='$delete_id'";

    $run_delete = mysqli_query($conn, $delete_appointment);

    if ($run_delete) {

        echo "<script>alert('Appointment Has Been Deleted')</script>";

        echo "<script>window.open('index.php?view_appointment','_self')</script>";
    }
}
?>
