<?php
session_start();
if (isset($_SESSION['unique_id'])) {
//    header("location: users.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sign Up Form</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="javascript/sweetalert.js"></script>
    </head>

    <body>
        <div class="wrapper">
            <section class="form xlogin">
                <header>Login</header>
                <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="error-text"></div>
                    <div class="field input">
                        <label>Email Address</label>
                        <input type="text" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="field input">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Enter your password" required>
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field button">
                        <input type="submit" name="submit" value="Login" >
                    </div>
                </form>
                <div class="link">Not yet signed up? <a href="signupForm.php">Signup now</a></div>
            </section>
        </div>

        <script src="javascript/pass-show-hide.js"></script>
        <script src="javascript/login.js"></script>

    </body>
</html>

<?php
include_once "php/config.php";
if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if (!empty($email) && !empty($password)) {
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
        if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
            $user_pass = md5($password);
            $enc_pass = $row['password'];
            $user_type = $row['user_type'];
            $admin_approval = $row['admin_approval'];
            if ($user_pass === $enc_pass) {
                $status = "Active now";
                $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                if ($sql2) {
                    $_SESSION['unique_id'] = $row['unique_id'];
                    if ($user_type == 'DOCTOR') {
                        if ($admin_approval == '1') {
                            echo "<script> swal('Successfull!', 'Login Successfull!', 'success')</script>";
                            echo "<script> window.open('user_area/index.php?dashboard ','_self')</script>";
                        } else {
                            echo "<script> swal('Attention!', 'Please Wait for the Admin Approval!!', 'warning')</script>";
                        }
                    } else {
                        echo "<script> swal('Successfull!', 'Login Successfull!', 'success')</script>";
//                        echo "<script> window.open('Questions.php','_self')</script>";
                        echo "<script> if (navigator.geolocation) {
                                             navigator.geolocation.getCurrentPosition(showPosition);
  
                                       } else { }

                                       function showPosition(position) {
                                          var x = position.coords.latitude ;
                                          var y = position.coords.longitude ;
                                          window.open('user_area/index.php?dashboard&lat='+x+'&lon='+y,'_self')
                                       }
                              </script>";
                    }
                } else {
                    echo "Something went wrong. Please try again!";
                    echo "<script> swal('Attention!', 'Something went wrong. Please try again!', 'warning')</script>";
                }
            } else {
                //echo "Email or Password is Incorrect!";
                echo "<script> swal('Attention!', 'Email or Password is Incorrect', 'warning')</script>";
            }
        } else {
            //echo "$email - This email not Exist!";
            echo "<script> swal('Attention!', '$email - This email not Exist!', 'warning')</script>";
        }
    } else {
        //echo "All input fields are required!";
        echo "<script> swal('Attention!', 'All input fields are required!!', 'warning')</script>";
    }
}
?>

<script>
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
            // console.log( navigator.geolocation.getCurrentPosition(showPosition));
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {

        getlat(position.coords.latitude);


    }
    function getlat(n) {
        window.open('index.php?q1=' + n + '&q2=' + n, '_self')
    }
</script>
