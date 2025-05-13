<?php
$lat = "";
$lng = "";
if (isset($_GET['lat']) && isset($_GET['lon'])) {

    $lat = $_GET['lat'];
    $lng = $_GET['lon'];



    $user_Id = $_SESSION['unique_id'];
    $update = "update users set lat='$lat',lon = '$lng' where unique_id='$user_Id'";

    $run_query = mysqli_query($conn, $update);

    $get_user = "select count(id) as count from centerdistance where user_id = $user_Id ";
    $run_user = mysqli_query($conn, $get_user);
    $row_user = mysqli_fetch_array($run_user);

    $get_u = "select * from users where user_id = $user_Id ";
    $run_u = mysqli_query($conn, $get_u);
    $row_u = mysqli_fetch_array($run_u);

    $_SESSION['q1'] = $row_u['q1'];
    $_SESSION['q2'] = $row_u['q2'];
    $_SESSION['q3'] = $row_u['q3'];
    $_SESSION['q3_1'] = $row_u['q3_1'];
    $_SESSION['q4'] = $row_u['q4'];


    if ($row_user['count'] == 0) {

        $get_centerval = "select * from centers ";
        $run_centerval = mysqli_query($conn, $get_centerval);
        while ($row_centerval = mysqli_fetch_array($run_centerval)) {

            $name = $row_centerval['name'];
            $add = $row_centerval['address'];
            $latC = $row_centerval['lat'];
            $lngC = $row_centerval['lng'];


            $long1 = deg2rad($lng);
            $long2 = deg2rad($lngC);
            $lat1 = deg2rad($lat);
            $lat2 = deg2rad($latC);

            //Haversine Formula
            $dlong = $long2 - $long1;
            $dlati = $lat2 - $lat1;

            $val = pow(sin($dlati / 2), 2) + cos($lat1) * cos($lat2) * pow(sin($dlong / 2), 2);

            $res = 2 * asin(sqrt($val));

            $radius = 3958.756;
            $distance = ($res * $radius);

            $insert_center = "insert into centerdistance (name,address,lat,lng,user_id,distance) values ('$name','$add','$latC','$lngC','$user_Id','$distance')";

            $run_center = mysqli_query($conn, $insert_center);
        }
    } else {
        $get_q = "delete from centerdistance  where user_id = $user_Id ";
        $run_q = mysqli_query($conn, $get_q);

        $get_centerval = "select * from centers ";
        $run_centerval = mysqli_query($conn, $get_centerval);
        while ($row_centerval = mysqli_fetch_array($run_centerval)) {

            $name = $row_centerval['name'];
            $add = $row_centerval['address'];
            $latC = $row_centerval['lat'];
            $lngC = $row_centerval['lng'];


            $long1 = deg2rad($lng);
            $long2 = deg2rad($lngC);
            $lat1 = deg2rad($lat);
            $lat2 = deg2rad($latC);

            //Haversine Formula
            $dlong = $long2 - $long1;
            $dlati = $lat2 - $lat1;

            $val = pow(sin($dlati / 2), 2) + cos($lat1) * cos($lat2) * pow(sin($dlong / 2), 2);

            $res = 2 * asin(sqrt($val));

            $radius = 3958.756;
            $distance = ($res * $radius);

            $insert_center = "insert into centerdistance (name,address,lat,lng,user_id,distance) values ('$name','$add','$latC','$lngC','$user_Id','$distance')";

            $run_center = mysqli_query($conn, $insert_center);
        }
    }
}
?>


<?php
//if (!isset($_SESSION['seller_email'])) {
//
//    echo "<script>window.open('login.php','_self')</script>";
//} else {
//$user_Id = $_SESSION['unique_id'];
$get_type = "select * from users where unique_id='$user_Id'";
$run_user_type = mysqli_query($conn, $get_type);
$row_type = mysqli_fetch_array($run_user_type);

$user_type = $row_type['user_type'];
$userid = $row_type['user_id'];

$get_det = "select * from doctor where user_id='$userid'";
$run_det = mysqli_query($conn, $get_det);
$row_det = mysqli_fetch_array($run_det);

$tot_rate = $row_det['tot_rate'];
$rate_count = $row_det['rate_count'];
if ($tot_rate == 0 && $rate_count == 0) {
    $newRate = 0;
} else {
    $newRate = substr($tot_rate / $rate_count, 0, 4);
}

if ($user_type == "USER") {
    ?>

    <div class="row"><!-- 1 row Starts -->

        <div class="col-lg-6"><!-- col-lg-12 Starts -->

            <h1 class="page-header">List of Doctors</h1>


        </div><!-- col-lg-12 Ends -->
        <div class="col-lg-6">
            <form class="navbar-form navbar-right" method="GET" action="index.php">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search Here" name="user_query">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            search
                        </button>
                    </div>
                </div>
            </form>

        </div>

    </div><!-- 1 row Ends -->

    <div id="content" class="container-fluid"<!--container starts-->

         <div class="row"><!--row starts-->

    <?php
    $get_docs = "select * from doctor d inner join users u on d.user_id = u.user_id  order by u.user_id asc limit 0,8";

    $run_doc = mysqli_query($conn, $get_docs);

    while ($row_doc = mysqli_fetch_array($run_doc)) {

        $id = $row_doc['user_id'];

        $fname = $row_doc['fname'];

        $lname = $row_doc['lname'];

        $picture = $row_doc['img'];

        $email = $row_doc['email'];

        $description = $row_doc['description'];

        $center = $row_doc['Center'];
        $specifiedArea = $row_doc['specialization'];



        $description = substr($description, 0, 120);



        echo "
        

 <div class = 'col-md-3 col-sm-6 center-responsive' >

        <div class = 'product' >

        <a href = 'index.php?doctor_id=$id' >

        <img src = '../php/images/$picture' class = 'card-img-top img-fluid'>

        </a>

        <div class = 'text' >

        <h3><a href = 'details.php?id=$id' >Dr.$fname  $lname</a></h3>

        <p class = 'price' > <b>Center:</b> $center</p>
        <p class = 'price' > <b>Spcialization:</b> $specifiedArea</p>
        <p class = 'price' > $description...</p>

        <p class = 'buttons' >

        <a href = 'index.php?doctor_id=$id' class = 'btn btn-primary'>

        <i class = 'fa fa-info-circle'></i> More Details...

        </a>


                        </p>

                        </div>

                        </div>

                        </div>

                        ";
    }
    ?>

        </div><!--row Ends-->

    </div><!--container Ends-->


<?php } else { ?>

    <?php
    $get_tot_appointment = "select * from appointments a inner join appointment_timeslots at on a.Appointment_Id = at.appointment_Id inner join users u on u.user_id = a.doctor_id where u.unique_id = '$user_Id'";
    $run_appointment = mysqli_query($conn, $get_tot_appointment);
    $count_tot_appointment = mysqli_num_rows($run_appointment);

    $get_date = "Select date(now()) as date from dual ";
    $run_date = mysqli_query($conn, $get_date);
    $row_date = mysqli_fetch_array($run_date);

    $dateToday = $row_date['date'];


    $get_today_appointment = "select * from appointments a inner join appointment_timeslots at on a.Appointment_Id = at.appointment_Id inner join users u on u.user_id = a.doctor_id where  u.unique_id = '$user_Id' and a.appointment_date = '$dateToday'";
    $run_today_appointment = mysqli_query($conn, $get_today_appointment);
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



        <div class="col-lg-4 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

            <div class="panel panel-danger"><!-- panel panel-green Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <div class="row"><!-- panel-heading row Starts -->

                        <div class="col-xs-3"><!-- col-xs-3 Starts -->

                            <i class="fa fa-comments fa-5x"> </i>

                        </div><!-- col-xs-3 Ends -->

                        <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

                            <div class="huge"> <?php echo $count_today_appointment; ?>  </div>

                            <div>Today Appointments</div>

                        </div><!-- col-xs-9 text-right Ends -->

                    </div><!-- panel-heading row Ends -->

                </div><!-- panel-heading Ends -->

                <a href="index.php?view_appointment">

                    <div class="panel-footer"><!-- panel-footer Starts -->

                        <span class="pull-left"> View Details </span>

                        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                        <div class="clearfix"></div>

                    </div><!-- panel-footer Ends -->

                </a>

            </div><!-- panel panel-green Ends -->

        </div><!-- col-lg-3 col-md-6 Ends -->


        <div class="col-lg-4 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

            <div class="panel panel-yellow"><!-- panel panel-red Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <div class="row"><!-- panel-heading row Starts -->

                        <div class="col-xs-3"><!-- col-xs-3 Starts -->

                            <i class="fa fa-inbox fa-5x"> </i>

                        </div><!-- col-xs-3 Ends -->

                        <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

                            <div class="huge"> <?php echo $count_tot_appointment; ?>  </div>

                            <div>Total Appointments</div>

                        </div><!-- col-xs-9 text-right Ends -->

                    </div><!-- panel-heading row Ends -->

                </div><!-- panel-heading Ends -->

                <a href="index.php?view_appointment">

                    <div class="panel-footer"><!-- panel-footer Starts -->

                        <span class="pull-left"> View Details </span>

                        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                        <div class="clearfix"></div>

                    </div><!-- panel-footer Ends -->

                </a>

            </div><!-- panel panel-red Ends -->

        </div><!-- col-lg-3 col-md-6 Ends -->

        <div class="col-lg-4 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

            <div class="panel panel-green"><!-- panel panel-green Starts -->

                <div class="panel-heading"><!-- panel-heading Starts -->

                    <div class="row"><!-- panel-heading row Starts -->

                        <div class="col-xs-3"><!-- col-xs-3 Starts -->

                            <i class="fa fa-star fa-5x"> </i>

                        </div><!-- col-xs-3 Ends -->

                        <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

                            <div class="huge"> <?php echo $newRate; ?>  </div>

                            <div>My Rating</div>

                        </div><!-- col-xs-9 text-right Ends -->

                    </div><!-- panel-heading row Ends -->

                </div><!-- panel-heading Ends -->

                <a href="#">

                    <div class="panel-footer"><!-- panel-footer Starts -->

                        <span class="pull-left">  </span>

                        <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                        <div class="clearfix"></div>

                    </div><!-- panel-footer Ends -->

                </a>

            </div><!-- panel panel-green Ends -->

        </div><!-- col-lg-3 col-md-6 Ends -->






        <div class="row" ><!-- 3 row Starts -->

            <div class="col-lg-12" ><!-- col-lg-8 Starts -->

                <div class="panel panel-primary" ><!-- panel panel-primary Starts -->

                    <div class="panel-heading" ><!-- panel-heading Starts -->

                        <h3 class="panel-title" ><!-- panel-title Starts -->

                            <i class="fa fa-money fa-fw" ></i> New Appointments

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



                                    </tr>

                                </thead><!-- thead Ends -->

                                <tbody><!-- tbody Starts -->


    <?php
    $i = 0;
    $get_appointments = "select  a.Appointment_date,at.start_time, at.end_time,at.user_Id from appointments a inner join appointment_timeslots at on a.Appointment_Id = at.appointment_Id inner join users u on u.user_id = a.doctor_id where u.unique_id = '$user_Id' limit 0,5  ";
    $run_appointments = mysqli_query($conn, $get_appointments);

    while ($row_appoi = mysqli_fetch_array($run_appointments)) {
        ?>


                                        <tr>

                                            <td><?php echo ++$i; ?></td>



                                            <td><?php echo $row_appoi['Appointment_date'] ?></td>
                                            <td><?php echo $row_appoi['start_time'] . ".00H - " . $row_appoi['end_time'] . ".00H" ?></td>
        <?php
        $unique_user_id = $row_appoi['user_Id'];
        $get_user = "select * from users where unique_id = '$unique_user_id'";
        $run_user = mysqli_query($conn, $get_user);

        $row_user = mysqli_fetch_array($run_user);
        ?>
                                            <td><?php echo $row_user['fname'] . " " . $row_user['lname']; ?></td>


                                        </tr>

                                        <?php } ?>

                                </tbody><!-- tbody Ends -->


                            </table><!-- table table-bordered table-hover table-striped Ends -->

                        </div><!-- table-responsive Ends -->

                        <div class="text-right" ><!-- text-right Starts -->

                            <a href="index.php?view_appointment" >

                                View All Appointment <i class="fa fa-arrow-circle-right" ></i>

                            </a>

                        </div><!-- text-right Ends -->


                    </div><!-- panel-body Ends -->

                </div><!-- panel panel-primary Ends -->

            </div><!-- col-lg-8 Ends -->


        </div><!-- 3 row Ends -->
<?php } ?>