
<?php
if (isset($_GET['doctor_rate'])) {

    $id = $_GET['doctor_rate'];

    $get_doctor = "select * from doctor d inner join users u on d.user_id = u.user_id where u.user_id='$id'";

    $run_doctor = mysqli_query($conn, $get_doctor);

    $row_doctor = mysqli_fetch_array($run_doctor);

    $userid = $row_doctor['user_id'];

    $fname = $row_doctor['fname'];

    $lname = $row_doctor['lname'];

    $picture = $row_doctor['img'];

    $email = $row_doctor['email'];
    $description = $row_doctor['description'];

    $center = $row_doctor['Center'];
    $specifiedArea = $row_doctor['specialization'];
}
?>


<br><br>
<center><h1>DOCTOR INFORMATION </h1></center>
<hr>
<div id="content" ><!-- content Starts -->
    <BR><BR>
    <div class="container" ><!-- container Starts -->


        <div class="col-md-1"></div>

        <div class="col-md-10"><!-- col-md-9 Starts -->

            <div class="row" id="productMain"><!-- row Starts -->

                <div class="col-sm-7"><!-- col-sm-6 Starts -->

                    <div id="mainImage"><!-- mainImage Starts -->

                        <div id="myCarousel" class="carousel slide" data-ride="carousel">



                            <div class="item active">
                                <center>
                                    <img src="../php/images/<?php echo $picture; ?>" class="img-responsive" style="height: 30vw; width: 800px">
                                </center>
                            </div>



                        </div>

                    </div><!-- mainImage Ends -->

                    <br><br><br>

                    <div class="row" id="thumbs" ><!-- row Starts -->

                        <div class="col-xs-4" ><!-- col-xs-4 Starts -->



                        </div><!-- col-xs-4 Ends -->

                        <div class="col-xs-4" ><!-- col-xs-4 Starts -->



                        </div><!-- col-xs-4 Ends -->

                        <div class="col-xs-4" ><!-- col-xs-4 Starts -->



                        </div><!-- col-xs-4 Ends -->


                    </div><!-- row Ends -->



                </div><!-- col-sm-6 Ends -->


                <div class="col-sm-5" ><!-- col-sm-6 Starts -->

                    <div class="box" ><!-- box Starts -->

                        <h2 class="text-center" > <?php echo $fname . " " . $lname ?> </h2>



                        <hr>

                        <div class="form-group" ><!-- form-group Starts -->

                            <label class="col-md-5 control-label">  Specialization :</label>

                            <div class="col-md-7">

                                <p><?php echo $specifiedArea; ?></p>

                            </div>

                        </div><!-- form-group Ends -->

                        <div class="form-group" ><!-- form-group Starts -->

                            <label class="col-md-5 control-label"> Contact :</label>

                            <div class="col-md-7">

                                <p><?php echo $email; ?></p>

                            </div>

                        </div><!-- form-group Ends--> 

                        <div class="form-group" ><!-- form-group Starts -->

                            <label class="col-md-5 control-label"> Doctor Center :</label>

                            <div class="col-md-7">

                                <p><?php echo $center; ?></p>

                            </div>

                        </div><!-- form-group Ends--> 

                        <div class="form-group" ><!-- form-group Starts -->

                            <label class="col-md-5 control-label"> Short Description:</label>

                            <div class="col-md-7">

                                <p><?php echo substr($description, 0, 200) . "..."; ?></p>

                            </div>

                        </div><!-- form-group Ends--> 
                        <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off" >
                            <div class="form-group" ><!-- form-group Starts -->

                                <label class="col-md-5 control-label"> Rate the Doctor:</label>

                                <div class="col-md-7">

                                    <select name="rate" class="form-control">

                                        <option>5</option>
                                        <option>4</option>
                                        <option>3</option>
                                        <option>2</option>
                                        <option>1</option>

                                    </select>

                                </div>

                            </div><!-- form-group Ends--> 
                            <div class="form-group" style="color: white">sdfdfdf</div>

                            <center>
                                <div class="form-group">
                                    <input class="btn btn-success "type="submit" name="rateVal" value="Rate Doctor">
                                </div>
                            </center>
                        </form><!-- form-horizontal Ends -->


                    </div><!-- box Ends -->



                </div><!-- col-sm-6 Ends -->


            </div><!-- row Ends -->

            <div class="box" id="details"><!-- box Starts -->

                <p><!-- p Starts -->

                <h4>Full  Description</h4>

                <p>
                    <?php echo $description; ?>


                <hr>

            </div><!-- box Ends -->



        </div><!-- col-md-9 Ends -->


    </div><!-- container Ends -->
</div><!-- content Ends -->


<?php
if (isset($_POST['rateVal'])) {

    $rate = $_POST['rate'];


    $get_doc = "select * from doctor where user_id = '$id' ";

    $run_doc = mysqli_query($conn, $get_doc);

    $row_doc = mysqli_fetch_array($run_doc);
    
    
    $tot_rate = $row_doc['tot_rate'];
    $rate_count = $row_doc['rate_count'];
    
    if($tot_rate == " " && $rate_count == " "){
        $tot_rate = $rate;
        $rate_count = "1";
    }else{
        
        $tot_rate = $tot_rate + $rate;
        $rate_count = $rate_count + 1;
    }
    
    
    
     $update = "update doctor set tot_rate='$tot_rate',rate_count = '$rate_count' where user_id='$id'";

    $run_query = mysqli_query($conn, $update);
    if($run_query){
       echo "<script> swal('Successfull!', 'Rated Successfull!', 'success')</script>";

    }
}
    

?>






</body>
</html>