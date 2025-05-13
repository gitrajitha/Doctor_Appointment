
<?php
if (isset($_GET['view_more'])) {

    $id = $_GET['view_more'];

    $get_doctor = "select * from appointment_timeslots where time_slot_id ='$id'";

    $run_doctor = mysqli_query($conn, $get_doctor);

    $row_doctor = mysqli_fetch_array($run_doctor);

    $starttime = $row_doctor['start_time'];

    $endtime = $row_doctor['end_time'];

 

    $q1 = $row_doctor['q1'];
    $q2 = $row_doctor['q2'];
    $q3 = $row_doctor['q3'];
    $q3_1 = $row_doctor['q3_1'];
    $q4 = $row_doctor['q4'];


}
?>


<br><br>
<center><h1>APPOINTMENT INFORMATION </h1></center>
<hr>
<div id="content" ><!-- content Starts -->

    <div class="container" ><!-- container Starts -->


        <div class="col-md-4"></div>

        <div class="col-md-6"><!-- col-md-9 Starts -->

            <div class="row" id="productMain"><!-- row Starts -->




                <div class="col-sm-10" ><!-- col-sm-6 Starts -->

                    <div class="box" ><!-- box Starts -->   
                        <hr>

                        <div class="form-group" ><!-- form-group Starts -->

                            <label class="col-md-5 control-label">  Time Slot :</label>

                            <div class="col-md-7">

                                <p><?php echo $starttime . ".00h - " . $endtime . ".00h"; ?></p>

                            </div>

                        </div><!-- form-group Ends -->
                        <?php if ($q1 != "") { ?>
                            <div class="form-group" ><!-- form-group Starts -->

                                <label class="col-md-5 control-label"> Question 1 :</label>

                                <div class="col-md-7">

                                    <p>Are you Over 18 years old?</p>

                                </div>

                                <label class="col-md-5 control-label"> Answer 1 :</label>

                                <div class="col-md-7">

                                    <?php
                                    if ($q1 == "y") {
                                        $q1 = "Yes";
                                    } else {
                                        $q1 = "No";
                                    }
                                    ?>

                                    <p><?php echo $q1; ?></p>

                                </div>

                            </div><!-- form-group Ends--> 
                        <?php } ?>




                        <?php if ($q2 != "") { ?>
                            <div class="form-group" ><!-- form-group Starts -->

                                <label class="col-md-5 control-label"> Question 2 :</label>

                                <div class="col-md-7">

                                    <p>Did you have a any kind of bad thigns happens a car crash ,someone died,trauma,body problem?</p>

                                </div>

                                <label class="col-md-5 control-label"> Answer 2 :</label>

                                <div class="col-md-7">
                                    <?php
                                    if ($q2 == "y") {
                                        $q2 = "Yes";
                                    } else {
                                        $q2 = "No";
                                    }
                                    ?>

                                    <p><?php echo $q2; ?></p>

                                </div>

                            </div><!-- form-group Ends--> 
                        <?php } ?>

                        <?php if ($q3_1 != "") { ?>
                            <div class="form-group" ><!-- form-group Starts -->

                                <label class="col-md-5 control-label"> Question 3-1 :</label>

                                <div class="col-md-7">

                                    <p> do you have a financal problem famlily problem body problem etc,or old man?</p>

                                </div>

                                <label class="col-md-5 control-label"> Answer 3-1 :</label>

                                <div class="col-md-7">
                                    <?php
                                    if ($q3_1 == "y") {
                                        $q3_1 = "Yes";
                                    } else {
                                        $q3_1 = "No";
                                    }
                                    ?>

                                    <p><?php echo $q3_1; ?></p>

                                </div>

                            </div><!-- form-group Ends--> 
                        <?php } ?>

                        <?php if ($q3 != "") { ?>
                            <div class="form-group" ><!-- form-group Starts -->

                                <label class="col-md-5 control-label"> Question 3 :</label>

                                <div class="col-md-7">

                                    <p>Do you have any kind of psychological changes fear,depression,volatile mental state,
                                        suicidal thoughts,cant sleep(problem sleeping after accidnet),eating problems(not eating or eating too much), isolation etc?</p>

                                </div>

                                <label class="col-md-5 control-label"> Answer 3 :</label>

                                <div class="col-md-7">
                                     <?php
                                    if ($q3 == "y") {
                                        $q3 = "Yes";
                                    } else {
                                        $q3 = "No";
                                    }
                                    ?>

                                    <p><?php echo $q3; ?></p>

                                </div>

                            </div><!-- form-group Ends--> 
                        <?php } ?>


                        <?php if ($q4 != "") { ?>
                            <div class="form-group" ><!-- form-group Starts -->

                                <label class="col-md-5 control-label"> Question 4 :</label>

                                <div class="col-md-7">

                                    <p>Did it last for 2 weeks?</p>

                                </div>

                                <label class="col-md-5 control-label"> Answer 4 :</label>

                                <div class="col-md-7">
                                     <?php
                                    if ($q4 == "y") {
                                        $q4 = "Yes";
                                    } else {
                                        $q4 = "No";
                                    }
                                    ?>

                                    <p><?php echo $q4; ?></p>

                                </div>

                            </div><!-- form-group Ends--> 
                        <?php } ?>

                    </div><!-- box Ends -->



                </div><!-- col-sm-6 Ends -->


            </div><!-- row Ends -->





        </div><!-- col-md-9 Ends -->


    </div><!-- container Ends -->
</div><!-- content Ends -->









</body>
</html>