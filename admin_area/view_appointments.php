<?php
if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>

    <div class="row"><!--1 row starts-->

        <div class="col-lg-12"><!-- col-lg-12 starts-->

            <ol class="breadcrumb" ><!-- breadcrumb starts-->

                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / View Appointments
                </li>

            </ol><!-- breadcrumb Ends-->

        </div><!-- col-lg-12 Ends-->    

    </div><!--1 row Ends-->

    <div class="row"><!--2 row starts-->

        <div class="col-lg-12"><!-- col-lg-12 starts-->

            <div class="panel panel-default"><!--panel panel-default starts-->

                <div class="panel-heading"><!--panel-heading starts-->

                    <h3 class="panel-title"><!--panel-title starts--> 

                        <i class="fa fa-money fa-fw"></i> View Appointments

                    </h3><!--panel-title Ends-->

                </div><!--panel-heading Ends-->

                <div class="panel-body"><!--panel-body starts-->

                    <div class="table-responsive"><!--table-responsive starts-->




                        <table class="table table-bordered table-hover table-striped"><!-- table table-bordered table-hover table-striped Starts -->

                            <thead><!-- thead Starts -->

                                <tr>

                                    <th> No:</th>
                                    <th>Doctor Name:</th>
                                    <th>Specialization:</th>
                                    <th>Date:</th>
                                    <th>Time Slot:</th>     
                                    <th>User</th>                                                                                              
                                    <th>Delete Appointment:</th>


                                </tr>

                            </thead><!-- thead Ends -->


                            <tbody><!-- tbody Starts -->

    <?php
    $i = 0;


    $get_result = "select * from appointment_timeslots at inner join appointments a on at.appointment_Id = a.Appointment_Id inner join doctor d on d.user_id = a.doctor_id inner join users u on u.user_id = d.user_id order by time_slot_id desc";

    $run_doc = mysqli_query($Con, $get_result);

    while ($row_doc = mysqli_fetch_array($run_doc)) {
        $doc_unique_id = $row_doc['unique_id'];
        ?>
                                    <tr>

                                        <td><?php echo ++$i ?></td>
                                        <td><?php echo "Dr." . $row_doc['fname'] . " " . $row_doc['lname']; ?></td>
                                        <td><?php echo $row_doc['specialization'] ?></td>
                                        <td><?php echo $row_doc['Appointment_date'] ?></td>
                                        <td><?php echo $row_doc['start_time'] . ".00h - " . $row_doc['end_time'] . ".00h" ?></td>
                                    <?php
                                    $unique_user_id = $row_doc['user_Id'];
                                    $get_user = "select * from users where unique_id = '$unique_user_id'";
                                    $run_user = mysqli_query($Con, $get_user);

                                    $row_user = mysqli_fetch_array($run_user);
                                    ?>
                                        <td><?php echo $row_user['fname'] . " " . $row_user['lname']; ?></td>


                                        <td>


                                            <a href="index.php?delete_appointment=<?php echo $row_doc['time_slot_id'] ?>" >

                                                <i class="fa fa-trash-o" ></i> Delete

                                            </a>

                                        </td>


                                    </tr>

    <?php } ?>

                            </tbody><!-- tbody Ends -->

                        </table><!-- table table-bordered table-hover table-striped Ends -->
                    </div><!--table-responsive Ends-->

                </div><!--panel-body Ends-->

            </div><!--panel panel-default Ends-->

        </div><!-- col-lg-12 Ends-->

    </div><!--2 row Ends-->
<?php } ?>
