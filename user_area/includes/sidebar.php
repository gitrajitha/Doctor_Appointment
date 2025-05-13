<?php
$user_Id = $_SESSION['unique_id'];
$get_type = "select * from users where unique_id='$user_Id'";
$run_user_type = mysqli_query($conn, $get_type);
$row_type = mysqli_fetch_array($run_user_type);

$user_type = $row_type['user_type'];
?>


<nav class="navbar navbar-inverse navbar-fixed-top" ><!-- navbar navbar-inverse navbar-fixed-top Starts -->

    <div class="navbar-header" ><!-- navbar-header Starts -->

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" ><!-- navbar-ex1-collapse Starts -->


            <span class="sr-only" >Toggle Navigation</span>

            <span class="icon-bar" ></span>

            <span class="icon-bar" ></span>

            <span class="icon-bar" ></span>


        </button><!-- navbar-ex1-collapse Ends -->

     <a class="navbar-brand" href="index.php?dashboard" >Calm Support</a>


    </div><!-- navbar-header Ends -->

    <ul class="nav navbar-right top-nav" ><!-- nav navbar-right top-nav Starts -->

        <li class="dropdown" ><!-- dropdown Starts -->

            <a href="#" class="dropdown-toggle" data-toggle="dropdown" ><!-- dropdown-toggle Starts -->

                <i class="fa fa-user" ></i>


                <?php echo $user_name; ?> <b class="caret"></b>

            </a><!-- dropdown-toggle Ends -->






        </li><!-- dropdown Ends -->


    </ul><!-- nav navbar-right top-nav Ends -->

    <div class="collapse navbar-collapse navbar-ex1-collapse"><!-- collapse navbar-collapse navbar-ex1-collapse Starts -->

        <ul class="nav navbar-nav side-nav"><!-- nav navbar-nav side-nav Starts -->

            <li><!-- li Starts -->

                <a href="index.php?dashboard">

                    <i class="fa fa-fw fa-dashboard"></i> Dashboard

                </a>

            </li><!-- li Ends -->
            <?php if ($user_type == 'USER') { ?>
                <li>

                    <a href="index.php?findDoc">

                        <i class="fa fa-fw fa-money"></i> Find Doctor

                    </a>

                </li>

            <?Php } ?>




            <li>

                <a href="../../DoctorAppointment/users.php">

                    <i class="fa fa-fw fa-edit"></i> Chat

                </a>

            </li>

            <?php if ($user_type == 'USER') { ?>
                <li><!-- li Starts -->

                    <a href="#" data-toggle="collapse" data-target="#users">

                        <i class="fa fa-fw fa-gear"></i> User Stories

                        <i class="fa fa-fw fa-caret-down"></i>


                    </a>

                    <ul id="users" class="collapse">

                        <li>
                            <a href="index.php?insert_story"> Insert your Story </a>
                        </li>

                        <li>
                            <a href="index.php?view_story"> View Stories </a>
                        </li>


                    </ul>

                </li><!-- li Ends -->
            <?Php } ?>

            <li>

                <a href="index.php?view_appointment">

                    <i class="fa fa-fw fa-list"></i> My Appointments

                </a>

            </li>
           <?php if ($user_type == 'DOCTOR') { ?> 
                <li>

                <a href="index.php?update_doc_appointment">

                    <i class="fa fa-fw fa-gear"></i> Update Doctor Appointment

                </a>

            </li>
           <?php } ?>



            <li><!-- li Starts -->

                <a href="../../../DoctorAppointment/php/logout.php?logout_id=<?php echo $_SESSION['unique_id']; ?>">

                    <i class="fa fa-fw fa-power-off"></i> Log Out

                </a>

            </li><!-- li Ends -->

        </ul><!-- nav navbar-nav side-nav Ends -->

    </div><!-- collapse navbar-collapse navbar-ex1-collapse Ends -->

</nav><!-- navbar navbar-inverse navbar-fixed-top Ends -->

<?php
//} ?>