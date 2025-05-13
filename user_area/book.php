<?php
if (isset($_GET['date_booking'])) {
    $date = $_GET['date_booking'];
}

$doc_id = $_GET['doc_booking'];

$get_doc = "select * from doctor where user_id = '$doc_id' ";

$run_doc = mysqli_query($conn, $get_doc);

$row_doc = mysqli_fetch_array($run_doc);

$startTime = $row_doc['time_start_time'];
$endTime = $row_doc['time_finish_time'];
$b = 0;
for ($a = $startTime; $a < $endTime; $a++) {
    $b++;
}


if (isset($_GET['start_time'])) {
    $starttime = $_GET['start_time'];


    $get_appointment = "select * from appointments where doctor_id='$doc_id' and Appointment_date='$date'";

    $run_appointment = mysqli_query($conn, $get_appointment);

    if (mysqli_num_rows($run_appointment) > 0) {
        $row_appointment = mysqli_fetch_array($run_appointment);
        $appointment_id = $row_appointment['Appointment_Id'];
        $booked_count = $row_appointment['booked_count'];
        $tot_count = $row_appointment['Total_count'];
        $new_booked_count = $booked_count + 1;
        if ($tot_count == $new_booked_count) {
            $status = "Already Booked";
        } else {
            $status = "Can Book";
        }
        $update = "update appointments set booked_count='$new_booked_count',status = '$status' where Appointment_Id='$appointment_id'";

        $run_query = mysqli_query($conn, $update);

        $endtime = $starttime + 1;
        $userid = $_SESSION['unique_id'];
        $q1 = $_SESSION['q1'];
        $q2 = $_SESSION['q2'];
        $q3 = $_SESSION['q3'];
        $q3_1 = $_SESSION['q3_1'];
        $q4 = $_SESSION['q4'];
        $insert = "insert into appointment_timeslots (appointment_Id,start_time,end_time,user_Id,q1,q2,q3,q3_1,q4)"
                . " values ('$appointment_id','$starttime','$endtime','$userid','$q1','$q2','$q3','$q3_1','$q4')";


        $result_succ = mysqli_query($conn, $insert);
          $get_doc_unique_id = "select * from users where user_id='$doc_id'";
        $run_unique_id = mysqli_query($conn, $get_doc_unique_id);
        $row_id = mysqli_fetch_array($run_unique_id);
        
        $user_unique_id = $_SESSION['unique_id'];
        $doc_unique_id = $row_id['unique_id'];
        $doc_name =$row_id['fname']." ".$row_id['lname'];
        
        
        $msg = "You have a appointment with Dr.".$doc_name." @ ".$starttime.".00h";
        $insert_q = "insert into messages (incoming_msg_id,outgoing_msg_id,msg,date,time)"
                . " values ('$user_unique_id','$doc_unique_id','$msg',date(NOW()),time(NOW()))";
         $result_success = mysqli_query($conn, $insert_q);
         
                        echo "<script> swal('Successfull!', 'Booking Successfull!', 'success')</script>";
            echo "<script> window.open('index.php?view_appointment','_self')</script>";
    } else {

        $insert = "insert into appointments (doctor_id,Appointment_date,Total_count,booked_count,status)"
                . " values ('$doc_id','$date','$b','1','Can Book')";

        $result_succ = mysqli_query($conn, $insert);

        $get_appointment = "select * from appointments where doctor_id='$doc_id' and Appointment_date='$date'";

        $run_appointment = mysqli_query($conn, $get_appointment);


        $row_appointment = mysqli_fetch_array($run_appointment);

        $appointment_id = $row_appointment['Appointment_Id'];
        $endtime = $starttime + 1;
        $userid = $_SESSION['unique_id'];
        $q1 = $_SESSION['q1'];
        $q2 = $_SESSION['q2'];
        $q3 = $_SESSION['q3'];
        $q3_1 = $_SESSION['q3_1'];
        $q4 = $_SESSION['q4'];
        $insert = "insert into appointment_timeslots (appointment_Id,start_time,end_time,user_Id,q1,q2,q3,q3_1,q4)"
                . " values ('$appointment_id','$starttime','$endtime','$userid','$q1','$q2','$q3','$q3_1','$q4')";

        $result_succ = mysqli_query($conn, $insert);
        $get_doc_unique_id = "select * from users where user_id='$doc_id'";
        $run_unique_id = mysqli_query($conn, $get_doc_unique_id);
        $row_id = mysqli_fetch_array($run_unique_id);
        
        $user_unique_id = $_SESSION['unique_id'];
        $doc_unique_id = $row_id['unique_id'];
        $doc_name =$row_id['fname']." ".$row_id['lname'];
        
        
        $msg = "You have a appointment with Dr.".$doc_name." @ ".$starttime.".00h";
        $insert_q = "insert into messages (incoming_msg_id,outgoing_msg_id,msg,date,time)"
                . " values ('$user_unique_id','$doc_unique_id','$msg',date(NOW()),time(NOW()))";
        $result_success = mysqli_query($conn, $insert_q);
           echo "<script> alert('Booking Successfull ')</script>";
            echo "<script> window.open('index.php?view_appointment','_self')</script>";
    }

//    $stmt = $mysqli->prepare("INSERT INTO bookings (name, email, date) VALUES (?,?,?)");
//    $stmt->bind_param('sss', $name, $email, $date);
//    $stmt->execute();
//    $msg = "<div class='alert alert-success'>Booking Successfull</div>";
//    $stmt->close();
//    $mysqli->close();
}
?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title></title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/main.css">
    </head>

    <body>

        <br><br>
        <div class="container">
            <h1 class="text-center">Book for Date: <?php echo date('m/d/Y', strtotime($date)); ?></h1><hr>

        </div>


        <div class="panel-body" ><!-- panel-body Starts -->

            <div class="table-responsive" ><!-- table-responsive Starts -->

                <table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

                    <thead>

                        <tr>
                            <th>No</th>    
                            <th>Starting Time Slot</th>
                            <th>Ending Time Slot</th>
                            <th>Booking Status</th>

                        </tr>

                    </thead>

                    <tbody>





<?php
$stmt = $conn->prepare("select * from appointments a inner join appointment_timeslots at on a.Appointment_Id = at.appointment_Id where a.Appointment_date = ? AND a.doctor_id = ?");
$stmt->bind_param('ss', $date, $doc_id);
$bookings = array();
if ($stmt->execute()) {
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $bookings[] = $row['start_time'];
        }

        $stmt->close();
    }
}

$i = 0;
for ($x = $startTime; $x < $endTime; $x++) {
    $booking = $y = $x - 1 + 1;
    $i++;
    ?>
                            <tr>
                                <td><?php echo $i ?></td>    
                                <td><?php echo $y . ".00" ?></td>
                                <td><?php echo ++$y . ".00" ?></td>

                                <td> 
    <?php if (in_array($booking, $bookings)) { ?>
                                        <button class='btn btn-danger btn-xs'>Already Booked</button>
    <?php } else { ?>
                                        <a href="index.php?date_booking=<?php echo $date; ?>&doc_booking=<?php echo $doc_id ?>&start_time=<?php echo $y - 1 ?>" class='btn btn-success btn-xs'> Book</a>
                                    <?php } ?>
                                </td>


                            </tr>

    <?php
}
?>


                    </tbody>


                </table><!-- table table-bordered table-hover table-striped Ends -->

            </div><!-- table-responsive Ends -->

        </div><!-- panel-body Ends -->

    </div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>
