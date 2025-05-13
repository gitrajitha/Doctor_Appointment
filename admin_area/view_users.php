<?php
if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {
    ?>

    <div class="row"><!--1 row starts-->

        <div class="col-lg-12"><!-- col-lg-12 starts-->

            <ol class="breadcrumb" ><!-- breadcrumb starts-->

                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / View Users
                </li>

            </ol><!-- breadcrumb Ends-->

        </div><!-- col-lg-12 Ends-->    

    </div><!--1 row Ends-->

    <div class="row"><!--2 row starts-->

        <div class="col-lg-12"><!-- col-lg-12 starts-->

            <div class="panel panel-default"><!--panel panel-default starts-->

                <div class="panel-heading"><!--panel-heading starts-->

                    <h3 class="panel-title"><!--panel-title starts--> 

                        <i class="fa fa-money fa-fw"></i> View Users

                    </h3><!--panel-title Ends-->

                </div><!--panel-heading Ends-->

                <div class="panel-body"><!--panel-body starts-->

                    <div class="table-responsive"><!--table-responsive starts-->

                        <table class="table table-bordered table-hover table-striped"><!--table table-bordered table-hover table-striped starts-->

                            <thead><!-- thead starts-->

                                <tr>
                                    <th>No:</th>
                                    <th>Image:</th>
                                    <th>First Name:</th>
                                    <th>Last Name:</th>
                                    <th>Email:</th>
                                    <th>View Appointments:</th>     
<!--                                    <th>Delete User:</th>-->
                                </tr>

                            </thead><!-- thead Ends-->

                            <tbody><!--tbody starts-->

    <?php
    $i = 0;
    $get_user = "select * from users where user_type='USER'";

    $run_user = mysqli_query($Con, $get_user);

    while ($row_admin = mysqli_fetch_array($run_user)) {

        $id = $row_admin['user_id'];

        $fname = $row_admin['fname'];
        $lname = $row_admin['lname'];

        $email = $row_admin['email'];

        $image = $row_admin['img'];
        ?>

                                    <tr>
                                        <td><?php echo ++$i ?></td>


                                        <td><img src="../php/images/<?php echo $image; ?>" width="60" height="60"</td>

                                        <td><?php echo $fname ?></td>

                                        <td><?php echo $lname; ?></td>
                                        <td><?php echo $email; ?></td>

                                        <td>
                                            <a href="index.php?send_user_Id=<?php echo $id; ?>">

                                                <i class="fa fa-eye"></i> View Appointments

                                            </a>

                                        </td>

<!--                                        <td>
                                            <a href="index.php?user_delete=<?php echo $id; ?>">

                                                <i class="fa fa-trash-o"></i> Delete

                                            </a>

                                        </td>-->
                                    </tr>
    <?php } ?>

                            </tbody><!--tbody Ends-->

                        </table><!--table table-bordered table-hover table-striped Ends-->

                    </div><!--table-responsive Ends-->

                </div><!--panel-body Ends-->

            </div><!--panel panel-default Ends-->

        </div><!-- col-lg-12 Ends-->

    </div><!--2 row Ends-->
<?php } ?>
