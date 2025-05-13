<?php
session_start();
include("php/config.php");
?>

<?php
$lat = "";
$lng = "";
if (isset($_GET['lat'])) {

    $lat = $_GET['lat'];
}

if (isset($_GET['lon'])) {

    $lng = $_GET['lon'];
}
$user_Id = $_SESSION['unique_id'];
$update = "update users set lat='$lat',lon = '$lng' where unique_id='$user_Id'";

$run_query = mysqli_query($conn, $update);

$get_user = "select count(id) as count from centerdistance where user_id = $user_Id ";
$run_user = mysqli_query($conn, $get_user);
$row_user = mysqli_fetch_array($run_user);
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
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <br><br><br><br>
        <div class="container" style="width: 500px; border-style: solid" id="question1">
            <h2>Question 1</h2>
            <br><br>
            <center>
                <div class="form-group">
                    <label for="email">Are you over 18 years Old?</label>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-default" onclick="q1yes()">Yes</button>
                    <button type="submit" class="btn btn-default" onclick="q1no()">No</button>
                </div>
            </center>

        </div>

        <div class="container" style="width: 500px; border-style: solid" id="question1noAnswer">
            <h2>Question 1</h2>
            <br><br>
            <center>
                <div class="form-group">
                    <label for="email">you should be over than 18 years old to use this system.</label>
                </div>

                <div class="form-group">
                    <a href="php/logout.php?logout_id=<?php echo $_SESSION['unique_id']; ?>">Leave </a>
                </div>
            </center>

        </div>


        <div class="container" style="width: 500px; border-style: solid" id="questionyesAnswer">
            <h2>Question 2</h2>
            <br><br>
            <center>
                <div class="form-group">
                    <label for="email">in the this last period did you have a any kind of bad thigns happens a car crash ,someone died,trauma,body problem?</label>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-default" onclick="q2yes()">Yes</button>
                    <button type="submit" class="btn btn-default" onclick="q2no()">No</button>
                </div>
            </center>

        </div>

        <div class="container" style="width: 500px; border-style: solid" id="question2yesAnswer">
            <h2>Question 3</h2>
            <br><br>
            <center>
                <div class="form-group">
                    <label for="email"> did you have any kind of psychological changes fear,depression,volatile mental state,
                        suicidal thoughts,cant sleep(problem sleeping after accidnet),eating problems(not eating or eating too much), isolation etc  </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-default" onclick="q3yes()">Yes</button>
                    <button type="submit" class="btn btn-default" onclick="q3no()">No</button>
                </div>
            </center>

        </div>

        <div class="container" style="width: 500px; border-style: solid" id="question3yesAnswer">
            <h2>Question 4</h2>
            <br><br>
            <center>
                <div class="form-group">
                    <label for="email"> did it last for 2 weeks</label>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-default" onclick="q4yes()">Yes</button>
                    <button type="submit" class="btn btn-default" onclick="q4no()">No</button>
                </div>
            </center>

        </div>


        <div class="container" style="width: 500px; border-style: solid" id="question2no_Answer">
            <h2>Question 3-1</h2>
            <br><br>
            <center>
                <div class="form-group">
                    <label for="email">do you have a financial problem family problem body problem etc,or old man?</label>
                </div>
                <div class="form-group">              

                    <button type="submit" class="btn btn-default" onclick="q3_1yes()">Yes</button>
                    <button type="submit" class="btn btn-default" onclick="q3_1no()">No</button>
                </div>
            </center>

        </div>
        <script>

            document.getElementById('question1noAnswer').style.display = "none";
            document.getElementById('questionyesAnswer').style.display = "none";
            document.getElementById('question2yesAnswer').style.display = "none";
            document.getElementById('question3yesAnswer').style.display = "none";
            document.getElementById('question2no_Answer').style.display = "none";

            function q1no() {

                document.getElementById('question1').style.display = "none";
                document.getElementById('question1noAnswer').style.display = "block";

            }

            function q1yes() {
                document.getElementById('question1').style.display = "none";
                document.getElementById('questionyesAnswer').style.display = "block";
            }



            function q2yes() {
                document.getElementById('questionyesAnswer').style.display = "none";
                document.getElementById('question2yesAnswer').style.display = "block";
            }
            function q2no() {
                document.getElementById('questionyesAnswer').style.display = "none";
                document.getElementById('question2no_Answer').style.display = "block";
            }
            function q3yes() {
                document.getElementById('question2yesAnswer').style.display = "none";
                document.getElementById('question3yesAnswer').style.display = "block";
            }

            function q4yes() {
                window.open('resultQuestion.php?q1=y&q2=y&q3=y&q4=y ', '_self')

            }
            function q4no() {
                window.open('resultQuestion.php?q1=y&q2=y&q3=y&q4=n ', '_self')

            }
            function q3_1no() {
                window.open('resultQuestion.php?q1=y&q2=n&q3_1=n ', '_self')

            }
            function q3_1yes() {
                alert('You will be redirct to the Medical Center Website.');
                window.location.href = "https://www.gov.il/he/departments/molsa/govil-landing-page";

                //window.open('resultQuestion.php?q1=y&q2=n&q3_1=n ','_self')

            }
            function q3no() {
                window.open('resultQuestion.php?q1=y&q2=y&q3=n ', '_self')

            }
        </script>
    </body>
</html>
