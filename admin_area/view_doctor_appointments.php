<?php
//
//if(!isset($_SESSION['admin_email'])){
//
//echo "<script>window.open('login.php','_self')</script>";
//
//}
//
//else {

if (isset($_GET['send_doc_id'])) {

    $user_id = $_GET['send_doc_id'];


    $get_type = "select * from users where user_id='$user_id'";
    $run_user_type = mysqli_query($Con, $get_type);
    $row_type = mysqli_fetch_array($run_user_type);

    $unique_id = $row_type['unique_id'];
}
?>

<div class="row"><!-- 1 row Starts -->

    <div class="col-lg-12"><!-- col-lg-12 Starts -->

        <ol class="breadcrumb"><!-- breadcrumb Starts  --->

            <li class="active">

                <i class="fa fa-dashboard"></i> Dashboard / View Appointments

            </li>

        </ol><!-- breadcrumb Ends  --->

    </div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

    <div class="col-lg-12"><!-- col-lg-12 Starts -->

        <div class="panel panel-default"><!-- panel panel-default Starts -->

            <div class="panel-heading"><!-- panel-heading Starts -->

                <h3 class="panel-title"><!-- panel-title Starts -->

                    <i class="fa fa-money fa-fw"></i> View Appointments

                </h3><!-- panel-title Ends -->

            </div><!-- panel-heading Ends -->

            <div class="panel-body"><!-- panel-body Starts -->

                <div class="table-responsive"><!-- table-responsive Starts -->





                    <table class="table table-bordered table-hover table-striped"><!-- table table-bordered table-hover table-striped Starts -->

                        <thead><!-- thead Starts -->

                            <tr>

                                <th> No:</th>
                                <th>Date:</th>
                                <th>Time Slot:</th>
                                <th>User Name:</th>                                                               
                                <th>Delete Appointment:</th>


                            </tr>

                        </thead><!-- thead Ends -->


                        <tbody><!-- tbody Starts -->

                            <?php
                            $i = 0;


                            $get_appointments = "select    at.time_slot_id,a.Appointment_date,at.start_time, at.end_time,at.user_Id from appointments a inner join appointment_timeslots at on a.Appointment_Id = at.appointment_Id inner join users u on u.user_id = a.doctor_id where u.unique_id = '$unique_id' order by at.time_slot_id desc  ";
                            $run_appointments = mysqli_query($Con, $get_appointments);

                            while ($row_appoi = mysqli_fetch_array($run_appointments)) {
                                ?>
                                <tr>

                                    <td><?php echo ++$i ?></td>
                                    <td><?php echo $row_appoi['Appointment_date'] ?></td>
                                    <td><?php echo $row_appoi['start_time'] . ".00H - " . $row_appoi['end_time'] . ".00H" ?></td>
                                    <?php
                                    $unique_user_id = $row_appoi['user_Id'];
                                    $get_user = "select * from users where unique_id = '$unique_user_id'";
                                    $run_user = mysqli_query($Con, $get_user);

                                    $row_user = mysqli_fetch_array($run_user);
                                    ?>
                                    <td><?php echo $row_user['fname'] . " " . $row_user['lname']; ?></td>



                                    <td>


                                        <a href="index.php?delete_appointment=<?php echo $row_appoi['time_slot_id']; ?>" >

                                            <i class="fa fa-trash-o" ></i> Delete

                                        </a>

                                    </td>


                                </tr>

                            <?php } ?>

                        </tbody><!-- tbody Ends -->

                    </table><!-- table table-bordered table-hover table-striped Ends -->


                </div><!-- table-responsive Ends -->

            </div><!-- panel-body Ends -->

        </div><!-- panel panel-default Ends -->

    </div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->


<?php
//} ?>