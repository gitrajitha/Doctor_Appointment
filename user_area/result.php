<?php
//if (!isset($_SESSION['seller_email'])) {
//
//    echo "<script>window.open('login.php','_self')</script>";
//} else {
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
        if (isset($_GET['user_query'])) {

        $u_query = $_GET['user_query'];

        $get_result = "select * from doctor d inner join users u on d.user_id = u.user_id where fname like '%".$u_query."%' or lname like '%".$u_query."%' or specialization like '%".$u_query."%' or Center like '%".$u_query."%' ";

$run_doc = mysqli_query($conn, $get_result);

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

        <h3><a href = 'details.php?id=$id' >$fname  $lname</a></h3>

        <p class = 'price' > Center: $center</p>
        <p class = 'price' > Spcialization: $specifiedArea</p>
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
        }
?>

            </div><!--row Ends-->

        </div><!--container Ends-->


<?php //} ?>
