<?php
//
//if(!isset($_SESSION['admin_email'])){
//
//echo "<script>window.open('login.php','_self')</script>";
//
//}
//
//else {
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

                    <?php
                    $user_Id = $_SESSION['unique_id'];
                    $get_type = "select * from users where unique_id='$user_Id'";
                    $run_user_type = mysqli_query($conn, $get_type);
                    $row_type = mysqli_fetch_array($run_user_type);

                    $user_type = $row_type['user_type'];
                    if ($user_type == "USER") {
                        ?>

                        <table class="table table-bordered table-hover table-striped"><!-- table table-bordered table-hover table-striped Starts -->

                            <thead><!-- thead Starts -->

                                <tr>

                                    <th> No:</th>
                                    <th>Doctor Name:</th>
                                    <th>Specialization:</th>
                                    <th>Date:</th>
                                    <th>Time Slot:</th>
                                    <th>Go to Chat</th>                                
                                    <th>Rate Doctor</th>                                
                                    <th>Delete Appointment:</th>


                                </tr>

                            </thead><!-- thead Ends -->


                            <tbody><!-- tbody Starts -->

                                <?php
                                $userid = $_SESSION['unique_id'];
                                $i = 0;


                                $get_result = "select * from appointment_timeslots at inner join appointments a on at.appointment_Id = a.Appointment_Id inner join doctor d on d.user_id = a.doctor_id inner join users u on u.user_id = d.user_id where at.user_id = '$userid' order by time_slot_id desc";

                                $run_doc = mysqli_query($conn, $get_result);

                                while ($row_doc = mysqli_fetch_array($run_doc)) {
                                    $doc_unique_id = $row_doc['unique_id'];
                                    ?>
                                    <tr>

                                        <td><?php echo ++$i ?></td>
                                        <td><?php echo "Dr." . $row_doc['fname'] . " " . $row_doc['lname']; ?></td>
                                        <td><?php echo $row_doc['specialization'] ?></td>
                                        <td><?php echo $row_doc['Appointment_date'] ?></td>
                                        <td><?php echo $row_doc['start_time'] . ".00h - " . $row_doc['end_time'] . ".00h" ?></td>
                                        <td> <a href="../chat.php?user_id=<?php echo $doc_unique_id; ?>" >

                                                <i class="fa fa-comment-o" ></i> Chat

                                            </a>


                                        </td>    
                                        
                                         <td> <a href="index.php?doctor_rate=<?php echo $row_doc['user_id']; ?>" >

                                                <i class="fa fa-magnet" ></i> Rate Doctor

                                            </a>


                                        </td>


                                        <td>


                                            <a href="index.php?delete_appointment=<?php echo $row_doc['time_slot_id']; ?>" >

                                                <i class="fa fa-trash-o" ></i> Delete

                                            </a>

                                        </td>


                                    </tr>

                                <?php } ?>

                            </tbody><!-- tbody Ends -->

                        </table><!-- table table-bordered table-hover table-striped Ends -->
                    <?php } else { ?>

                        <table class="table table-bordered table-hover table-striped"><!-- table table-bordered table-hover table-striped Starts -->

                            <thead><!-- thead Starts -->

                                <tr>

                                    <th> No:</th>
                                    <th>Date:</th>
                                    <th>Time Slot:</th>
                                    <th>User Name:</th>
                                    <th>View More:</th>
                                    <th>Go to Chat</th>                                
                                    <th>Delete Appointment:</th>


                                </tr>

                            </thead><!-- thead Ends -->


                            <tbody><!-- tbody Starts -->

                                <?php
                                $userid = $_SESSION['unique_id'];
                                $i = 0;


                                $get_appointments = "select    at.time_slot_id,a.Appointment_date,at.start_time, at.end_time,at.user_Id from appointments a inner join appointment_timeslots at on a.Appointment_Id = at.appointment_Id inner join users u on u.user_id = a.doctor_id where u.unique_id = '$user_Id' order by at.time_slot_id desc  ";
                                    $run_appointments = mysqli_query($conn, $get_appointments);

                                    while ($row_appoi = mysqli_fetch_array($run_appointments)) {
                                  
                                    ?>
                                    <tr>

                                        <td><?php echo ++$i ?></td>
                                          <td><?php echo $row_appoi['Appointment_date'] ?></td>
                                            <td><?php echo $row_appoi['start_time'] . ".00H - " . $row_appoi['end_time'] . ".00H" ?></td>
                                            <?php
                                            $unique_user_id = $row_appoi['user_Id'];
                                            $get_user = "select * from users where unique_id = '$unique_user_id'";
                                            $run_user = mysqli_query($conn, $get_user);

                                            $row_user = mysqli_fetch_array($run_user);
                                            ?>
                                            <td><?php echo $row_user['fname']." ".$row_user['lname']; ?></td>
                                            
                                                                         <td> <a href="index.php?view_more=<?php echo $row_appoi['time_slot_id']; ?>" >

                                                <i class="fa fa-eye" ></i> view more

                                            </a>

                                         <td> <a href="../chat.php?user_id=<?php echo $row_user['unique_id']; ?>" >

                                                <i class="fa fa-comment-o" ></i> Chat

                                            </a>


                                        </td>                                    


                                        <td>


                                            <a href="index.php?delete_appointment=<?php echo $row_appoi['time_slot_id']; ?>" >

                                                <i class="fa fa-trash-o" ></i> Delete

                                            </a>

                                        </td>


                                    </tr>

                                <?php } ?>

                            </tbody><!-- tbody Ends -->

                        </table><!-- table table-bordered table-hover table-striped Ends -->


                    <?php } ?>
                </div><!-- table-responsive Ends -->

            </div><!-- panel-body Ends -->

        </div><!-- panel panel-default Ends -->

    </div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->


<?php
//} ?>