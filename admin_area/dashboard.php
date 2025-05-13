<?php
if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

    $get_usercount = "select * from users  where user_type='USER'";
    $run_usercount = mysqli_query($Con, $get_usercount);
    $count_tot_users = mysqli_num_rows($run_usercount);

    $get_doccount = "select * from users  where user_type='DOCTOR'";
    $run_doccount = mysqli_query($Con, $get_doccount);
    $count_tot_doctors = mysqli_num_rows($run_doccount);

    $get_tot_appointment = "select * from appointments a inner join appointment_timeslots at on a.Appointment_Id = at.appointment_Id inner join users u on u.user_id = a.doctor_id ";
    $run_appointment = mysqli_query($Con, $get_tot_appointment);
    $count_tot_appointment = mysqli_num_rows($run_appointment);

    $get_date = "Select date(now()) as date from dual ";
    $run_date = mysqli_query($Con, $get_date);
    $row_date = mysqli_fetch_array($run_date);

    $dateToday = $row_date['date'];


    $get_today_appointment = "select * from appointments a inner join appointment_timeslots at on a.Appointment_Id = at.appointment_Id inner join users u on u.user_id = a.doctor_id where a.appointment_date = '$dateToday'";
    $run_today_appointment = mysqli_query($Con, $get_today_appointment);
    $count_today_appointment = mysqli_num_rows($run_today_appointment);
    ?>

    <div class="row"><!-- 1 row Starts -->

        <div class="col-lg-12"><!-- col-lg-12 Starts -->

            <h1 class="page-header">Dashboard</h1>

            <ol class="breadcrumb"><!-- breadcrumb Starts -->

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard

                </li>

            </ol><!-- breadcrumb Ends -->

        </div><!-- col-lg-12 Ends -->

    </div><!-- 1 row Ends -->


    <div class="row"><!-- 2 row Starts -->

        <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

            <div class="panel panel-primary"><!-- panel panel-primary Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <div class="row"><!-- panel-heading row Starts -->

                        <div class="col-xs-3"><!-- col-xs-3 Starts -->

                            <i class="fa fa-tasks fa-5x"> </i>

                        </div><!-- col-xs-3 Ends -->

                        <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

                            <div class="huge"> <?php echo $count_tot_users; ?>  </div>

                            <div>Total Users</div>

                        </div><!-- col-xs-9 text-right Ends -->

                    </div><!-- panel-heading row Ends -->

                </div><!-- panel-heading Ends -->

                <a href="index.php?view_users">

                    <div class="panel-footer"><!-- panel-footer Starts -->

                        <span class="pull-left"> View Details </span>

                        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                        <div class="clearfix"></div>

                    </div><!-- panel-footer Ends -->

                </a>

            </div><!-- panel panel-primary Ends -->

        </div><!-- col-lg-3 col-md-6 Ends -->


        <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

            <div class="panel panel-green"><!-- panel panel-green Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <div class="row"><!-- panel-heading row Starts -->

                        <div class="col-xs-3"><!-- col-xs-3 Starts -->

                            <i class="fa fa-comments fa-5x"> </i>

                        </div><!-- col-xs-3 Ends -->

                        <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

                            <div class="huge"> <?php echo $count_tot_doctors; ?>  </div>

                            <div>Total Doctors</div>

                        </div><!-- col-xs-9 text-right Ends -->

                    </div><!-- panel-heading row Ends -->

                </div><!-- panel-heading Ends -->

                <a href="index.php?view_doctors">

                    <div class="panel-footer"><!-- panel-footer Starts -->

                        <span class="pull-left"> View Details </span>

                        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                        <div class="clearfix"></div>

                    </div><!-- panel-footer Ends -->

                </a>

            </div><!-- panel panel-green Ends -->

        </div><!-- col-lg-3 col-md-6 Ends -->


        <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

            <div class="panel panel-yellow"><!-- panel panel-yellow Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <div class="row"><!-- panel-heading row Starts -->

                        <div class="col-xs-3"><!-- col-xs-3 Starts -->

                            <i class="fa fa-shopping-cart fa-5x"> </i>

                        </div><!-- col-xs-3 Ends -->

                        <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

                            <div class="huge"> <?php echo $count_tot_appointment; ?>  </div>

                            <div>Total Appointments</div>

                        </div><!-- col-xs-9 text-right Ends -->

                    </div><!-- panel-heading row Ends -->

                </div><!-- panel-heading Ends -->

                <a href="index.php?view_appointments">

                    <div class="panel-footer"><!-- panel-footer Starts -->

                        <span class="pull-left"> View Details </span>

                        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                        <div class="clearfix"></div>

                    </div><!-- panel-footer Ends -->

                </a>

            </div><!-- panel panel-yellow Ends -->

        </div><!-- col-lg-3 col-md-6 Ends -->


        <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

            <div class="panel panel-red"><!-- panel panel-red Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <div class="row"><!-- panel-heading row Starts -->

                        <div class="col-xs-3"><!-- col-xs-3 Starts -->

                            <i class="fa fa-inbox fa-5x"> </i>

                        </div><!-- col-xs-3 Ends -->

                        <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

                            <div class="huge"> <?php echo $count_today_appointment; ?>  </div>

                            <div>Today Appointments</div>

                        </div><!-- col-xs-9 text-right Ends -->

                    </div><!-- panel-heading row Ends -->

                </div><!-- panel-heading Ends -->

                <a href="index.php?view_appointments">

                    <div class="panel-footer"><!-- panel-footer Starts -->

                        <span class="pull-left"> View Details </span>

                        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                        <div class="clearfix"></div>

                    </div><!-- panel-footer Ends -->

                </a>

            </div><!-- panel panel-red Ends -->

        </div><!-- col-lg-3 col-md-6 Ends -->


    </div><!-- 2 row Ends -->

    <div class="row" ><!-- 3 row Starts -->

        <div class="col-lg-8" ><!-- col-lg-8 Starts -->

            <div class="panel panel-primary" ><!-- panel panel-primary Starts -->

                <div class="panel-heading" ><!-- panel-heading Starts -->

                    <h3 class="panel-title" ><!-- panel-title Starts -->

                        <i class="fa fa-money fa-fw" ></i> Recent Appointments

                    </h3><!-- panel-title Ends -->

                </div><!-- panel-heading Ends -->

                <div class="panel-body" ><!-- panel-body Starts -->

                    <div class="table-responsive" ><!-- table-responsive Starts -->

                                                    <table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

                                <thead><!-- thead Starts -->

                                    <tr>
                                        <th> No:</th>
                                        <th>Date:</th>
                                        <th>Time Slot:</th>
                                        <th>User:</th>                                   
                                        <th>Doctor</th>



                                    </tr>

                                </thead><!-- thead Ends -->

                                <tbody><!-- tbody Starts -->


                                    <?php
                                    $i = 0;
                                    $get_appointments = "select  a.doctor_id,at.user_id,a.Appointment_date,at.start_time, at.end_time,at.user_Id from appointments a inner join appointment_timeslots at on a.Appointment_Id = at.appointment_Id inner join users u on u.user_id = a.doctor_id limit 0,5  ";
                                    $run_appointments = mysqli_query($Con, $get_appointments);

                                    while ($row_appoi = mysqli_fetch_array($run_appointments)) {
                                        ?>


                                        <tr>

                                            <td><?php echo ++$i; ?></td>



                                            <td><?php echo $row_appoi['Appointment_date'] ?></td>
                                            <td><?php echo $row_appoi['start_time'] . ".00H - " . $row_appoi['end_time'] . ".00H" ?></td>
                                            <?php
                                            $unique_user_id = $row_appoi['user_Id'];
                                            $get_user = "select * from users where unique_id = '$unique_user_id'";
                                            $run_user = mysqli_query($Con, $get_user);

                                            $row_user = mysqli_fetch_array($run_user);
                                            ?>
                                            <td><?php echo $row_user['fname']." ".$row_user['lname']; ?></td>
                                            <?php
                                            $doc_id = $row_appoi['doctor_id'];
                                            $get_doc = "select * from users where user_id = '$doc_id'";
                                            $run_doc = mysqli_query($Con, $get_doc);

                                            $row_doc = mysqli_fetch_array($run_doc);
                                            ?>
                                            <td><?php echo "Dr.".$row_doc['fname']." ".$row_doc['lname']; ?></td>

                                        </tr>

                                    <?php } ?>

                                </tbody><!-- tbody Ends -->


                            </table><!-- table table-bordered table-hover table-striped Ends -->
                    </div><!-- table-responsive Ends -->

                    <div class="text-right" ><!-- text-right Starts -->

                        <a href="index.php?view_appointments" >

                            View All Appointments <i class="fa fa-arrow-circle-right" ></i>

                        </a>

                    </div><!-- text-right Ends -->


                </div><!-- panel-body Ends -->

            </div><!-- panel panel-primary Ends -->

        </div><!-- col-lg-8 Ends -->

        <div class="col-md-4"><!-- col-md-4 Starts -->

            <div class="panel"><!-- panel Starts -->

                <div class="panel-body"><!-- panel-body Starts -->

                    <div class="thumb-info mb-md"><!-- thumb-info mb-md Starts -->

                        <img src="admin_images/<?php echo $admin_image; ?>" class="rounded img-responsive">

                        <div class="thumb-info-title"><!-- thumb-info-title Starts -->

                            <span class="thumb-info-inner"> <?php echo $admin_name; ?></span>

                            <span class="thumb-info-type"><?php echo $admin_job; ?></span>

                        </div><!-- thumb-info-title Ends -->

                    </div><!-- thumb-info mb-md Ends -->

                    <div class="mb-md"><!-- mb-md Starts -->

                        <div class="widget-content-expanded"><!-- widget-content-expanded Starts -->

                            <i class="fa fa-user"></i> <span>Email: </span> <?php echo $admin_email; ?> <br>
                            <i class="fa fa-user"></i> <span>Country: </span><?php echo $admin_country; ?>  <br>
                            <i class="fa fa-user"></i> <span>Contact: </span> <?php echo $admin_contact; ?>   <br>

                        </div><!-- widget-content-expanded Ends -->

                        <hr class="dotted short">

                        <h5 class="text-muted">About</h5>

                        <p>
    <?php echo $admin_about; ?>
                        </p>

                    </div><!-- mb-md Ends -->

                </div><!-- panel-body Ends -->

            </div><!-- panel Ends -->

        </div><!-- col-md-4 Ends -->

    </div><!-- 3 row Ends -->

                        <?php } ?>
