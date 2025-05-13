<?php
//
//if(!isset($_SESSION['admin_email'])){
//
//echo "<script>window.open('login.php','_self')</script>";
//
//}
//
//else {

if(isset($_GET['send_user_Id'])){

$user_id = $_GET['send_user_Id'];


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
                                    <th>Doctor Name:</th>
                                    <th>Specialization:</th>
                                    <th>Date:</th>
                                    <th>Time Slot:</th>                                                           
                                                                                       
                                    <th>Delete Appointment:</th>


                                </tr>

                            </thead><!-- thead Ends -->


                            <tbody><!-- tbody Starts -->

                                <?php
                              
                                $i = 0;


                                $get_result = "select * from appointment_timeslots at inner join appointments a on at.appointment_Id = a.Appointment_Id inner join doctor d on d.user_id = a.doctor_id inner join users u on u.user_id = d.user_id where at.user_id = '$unique_id' order by time_slot_id desc";

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
                                                                          


                                        <td>


                                            <a href="index.php?delete_appointment=<?php echo $row_doc['time_slot_id']; ?>" >

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

