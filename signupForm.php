<?php
session_start();
$error_text = "";
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

        <div class="container">
            <center>
                <h2>Register Here</h2>
                <br><br>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home" style="color: black; font-size: 25px;">Regular Sign Up</a></li>
                    <li><a data-toggle="tab" href="#menu1" style="color: black; font-size: 25px;">Anonymous Sign Up</a></li>
                    <li><a data-toggle="tab" href="#menu2" style="color: black; font-size: 25px;">Doctor Sign Up</a></li>   
                </ul>

            </center>

            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <br>
                    <div style="padding-left: 380px">
                        <div class="wrapper">
                            <section class="form xsignup" >
                                <header>Regular User Registration</header>
                                <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off" >
                                    <div class="error-text"><?php echo $error_text; ?></div>
                                    <div class="name-details">
                                        <div class="field input">
                                            <label>First Name</label>
                                            <input type="text" name="fname" placeholder="First name" required>
                                        </div>
                                        <div class="field input">
                                            <label>Last Name</label>
                                            <input type="text" name="lname" placeholder="Last name" required>
                                        </div>
                                    </div>
                                    <div class="field input">
                                        <label>Email Address</label>
                                        <input type="text" name="email" placeholder="Enter your email" required>
                                    </div>
                                    <div class="field input">
                                        <label>Password</label>
                                        <input type="password" name="password" placeholder="Enter new password" required>
                                        <i class="fas fa-eye"></i>
                                    </div>

                                    <div class="field button">
                                        <input type="submit" name="regular_register" value="Register">
                                    </div>
                                </form>
                                <div class="link">Already signed up? <a href="login.php">Login now</a></div>
                            </section>
                        </div>


                    </div>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <br>
                    <div style="padding-left: 380px">
                        <div class="wrapper">
                            <section class="form xsignup">
                                <header>Anonymous Registration</header>
                                <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
                                    <div class="error-text"><?php echo $error_text; ?></div>

                                    <div class="field input">
                                        <label>Email Address</label>
                                        <input type="text" name="email" placeholder="Enter your email" required>
                                    </div>
                                    <div class="field input">
                                        <label>Password</label>
                                        <input type="password" name="password" placeholder="Enter new password" required>
                                        <i class="fas fa-eye"></i>
                                    </div>

                                    <div class="field button">
                                        <input type="submit" name="annonymous_user" value="Register">
                                    </div>
                                </form>
                                <div class="link">Already signed up? <a href="login.php">Login now</a></div>
                            </section>
                        </div>
                    </div>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <br>
                    <div style="padding-left: 380px;">
                        <div class="wrapper">
                            <section class="form xsignup">
                                <header>Doctor Registration</header>
                                <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
                                    <div class="error-text"><?php echo $error_text; ?></div>
                                    <div class="name-details">
                                        <div class="field input">
                                            <label>First Name</label>
                                            <input type="text" name="fname" placeholder="First name" required>
                                        </div>
                                        <div class="field input">
                                            <label>Last Name</label>
                                            <input type="text" name="lname" placeholder="Last name" required>
                                        </div>
                                    </div>
                                    <div class="field input">
                                        <label>Email Address</label>
                                        <input type="text" name="email" placeholder="Enter your email" required>
                                    </div>
                                    <div class="field input">
                                        <label>Password</label>
                                        <input type="password" name="password" placeholder="Enter new password" required>
                                        <i class="fas fa-eye"></i>
                                    </div>

                                    <div class="field input">
                                        <label>Specified Area</label>
                                        <input type="text" name="specifyarea" placeholder="Enter Speciliation" required>
                                    </div>

                                    <div class="field input">
                                        <label>Description</label>
                                        <textarea name="description" placeholder="Enter Description" required></textarea>
                                    </div>
                                    <div class="field input">
                                        <label>Center</label>
                                        <select name="center" class="form-control">

                                            <option>Select a Center</option>
                                            <option>Nazareth</option>
                                            <option>Haifa</option>
                                            <option>Haresh</option>
                                            <option>Mesgav</option>
                                            <option>Nesher</option>
                                            <option>Tlv</option>
                                            <option>Jursalem</option>
                                            <option>Beer Shevaa</option>
                                            <option>Elat</option>
                                            <option>Raineh</option> 
                                        </select>

                                    </div>

                                    <div class="name-details">
                                        <div class="field input">
                                            <label>Appointments Starting Time</label>
                                            <select name="startTime" class="form-control">

                                                <option>Select in 24hrs</option>
                                                <option>0.00</option>
                                                <option>1.00</option>
                                                <option>2.00</option>
                                                <option>3.00</option>
                                                <option>4.00</option>
                                                <option>5.00</option>
                                                <option>6.00</option>
                                                <option>7.00</option>
                                                <option>8.00</option>
                                                <option>9.00</option> 
                                                <option>10.00</option>
                                                <option>11.00</option>
                                                <option>12.00</option>
                                                <option>13.00</option>
                                                <option>14.00</option>
                                                <option>15.00</option>
                                                <option>16.00</option>
                                                <option>17.00</option>
                                                <option>18.00</option>
                                                <option>19.00</option> 
                                                <option>19.00</option> 
                                                <option>20.00</option> 
                                                <option>21.00</option> 
                                                <option>22.00</option> 
                                                <option>23.00</option> 

                                            </select>

                                        </div>
                                        <div class="field input">
                                            <label>Appointments End Time</label>
                                            <select name="EndTime" class="form-control">

                                                <option>Select in 24 hours</option>
                                                <option>0.00</option>
                                                <option>1.00</option>
                                                <option>2.00</option>
                                                <option>3.00</option>
                                                <option>4.00</option>
                                                <option>5.00</option>
                                                <option>6.00</option>
                                                <option>7.00</option>
                                                <option>8.00</option>
                                                <option>9.00</option> 
                                                <option>10.00</option>
                                                <option>11.00</option>
                                                <option>12.00</option>
                                                <option>13.00</option>
                                                <option>14.00</option>
                                                <option>15.00</option>
                                                <option>16.00</option>
                                                <option>17.00</option>
                                                <option>18.00</option>
                                                <option>19.00</option> 
                                                <option>19.00</option> 
                                                <option>20.00</option> 
                                                <option>21.00</option> 
                                                <option>22.00</option> 
                                                <option>23.00</option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="field image">
                                        <label>Select Image</label>
                                        <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" >
                                    </div>

                                    <div class="field image">
                                        <label>Select CV</label>
                                        <!--input type="file" name="cv" accept="image/x-png,image/gif,image/jpeg,image/jpg" >-->
                                        <input type="file" name="cv" class="form-control" required >
                                    </div>
                                    <div class="field button">
                                        <input type="submit" name="doc_register" value="Register" >
                                    </div>
                                </form>
                                <div class="link">Already signed up? <a href="login.php">Login now</a></div>
                            </section>
                        </div>  
                    </div>
                </div>

            </div>

        </div>



        <script src="javascript/pass-show-hide.js"></script>
        <script src="javascript/signup.js"></script>
    </body>
</html>


<?php
include_once "php/config.php";

if (isset($_POST['regular_register'])) {
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            if (mysqli_num_rows($sql) > 0) {
                //$error_text = "$email - This email already exist!";
                echo "<script> swal('Attention!', '$email - This email already exist!', 'warning')</script>";
            } else {
                $new_img_name = "user.png";
                $ran_id = rand(time(), 100000000);
                $status = "Active now";
                $encrypt_pass = md5($password);
                $user_type = "USER";
                $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status,user_type)
                                VALUES ({$ran_id}, '{$fname}','{$lname}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}', '{$user_type}' )");

//                $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
//                                VALUES ({$ran_id}, '{$fname}','{$lname}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}')");
                if ($insert_query) {
                    $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                    if (mysqli_num_rows($select_sql2) > 0) {
                        $result = mysqli_fetch_assoc($select_sql2);
                        $_SESSION['unique_id'] = $result['unique_id'];
                        echo "<script> swal('Successfull!', 'Registration Successfull!', 'success')</script>";
                        echo "<script> if (navigator.geolocation) {
                                             navigator.geolocation.getCurrentPosition(showPosition);
  
                                       } else { }

                                       function showPosition(position) {
                                          var x = position.coords.latitude ;
                                          var y = position.coords.longitude ;
                                          window.open('Questions.php?lat='+x+'&lon='+y,'_self')
                                       }
                              </script>";
                    } else {
                        echo "<script> swal('Attention!', '$email - This email not Exist!', 'warning')</script>";
                    }
                } else {
                    echo "<script> swal('Attention!', 'Something went wrong. Please try again!', 'warning')</script>";
                }
            }
        } else {
            echo "<script> swal('Attention!', '$email - email is not a valid email!', 'warning')</script>";
        }
    } else {
        echo "<script> swal('Attention!', 'All input fields are required!!', 'warning')</script>";
    }
}
if (isset($_POST['annonymous_user'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if (!empty($email) && !empty($password)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            if (mysqli_num_rows($sql) > 0) {
                echo "<script> swal('Attention!', '$email - This email already exist!', 'warning')</script>";
            } else {
                $fname = "Anonymous";
                $lname = "User";
                $new_img_name = "user.png";
                $ran_id = rand(time(), 100000000);
                $status = "Active now";
                $encrypt_pass = md5($password);
                $user_type = "USER";
                $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status,user_type)
                                VALUES ({$ran_id}, '{$fname}','{$lname}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}', '{$user_type}' )");

//                $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
//                                VALUES ({$ran_id}, '{$fname}','{$lname}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}')");
                if ($insert_query) {
                    $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                    if (mysqli_num_rows($select_sql2) > 0) {
                        $result = mysqli_fetch_assoc($select_sql2);
                        $_SESSION['unique_id'] = $result['unique_id'];
                        $error_text = "success";
                        echo "<script> if (navigator.geolocation) {
                                             navigator.geolocation.getCurrentPosition(showPosition);
  
                                       } else { }

                                       function showPosition(position) {
                                          var x = position.coords.latitude ;
                                          var y = position.coords.longitude ;
                                          window.open('Questions.php?lat='+x+'&lon='+y,'_self')
                                       }
                              </script>";
                    } else {
                        echo "<script> swal('Attention!', '$email - This email not Exist!', 'warning')</script>";
                    }
                } else {
                    echo "<script> swal('Attention!', 'Something went wrong. Please try again!', 'warning')</script>";
                }
            }
        } else {
            echo "<script> swal('Attention!', '$email - email is not a valid email!', 'warning')</script>";
        }
    } else {
        echo "<script> swal('Attention!', 'All input fields are required!!', 'warning')</script>";
    }
}
if (isset($_POST['doc_register'])) {

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $specifiedArea = mysqli_real_escape_string($conn, $_POST['specifyarea']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $center = mysqli_real_escape_string($conn, $_POST['center']);
    $startTime = mysqli_real_escape_string($conn, $_POST['startTime']);
    $endTime = mysqli_real_escape_string($conn, $_POST['EndTime']);
    if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password) && !empty($specifiedArea) && !empty($description) && !empty($center) && !empty($startTime) && !empty($endTime)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            if (mysqli_num_rows($sql) > 0) {
                echo "<script> swal('Attention!', '$email - This email already exist!', 'warning')</script>";
            } else {
                if (isset($_FILES['image'])) {
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];

                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode);

                    $extensions = ["jpeg", "png", "jpg"];
                    if (in_array($img_ext, $extensions) === true) {
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if (in_array($img_type, $types) === true) {
                            $time = time();
                            $new_img_name = $time . $img_name;
                            if (move_uploaded_file($tmp_name, "php/images/" . $new_img_name)) {
                                $ran_id = rand(time(), 100000000);
                                $status = "Active now";
                                $encrypt_pass = md5($password);
                                $user_type = "DOCTOR";
                                $admin_approval = "0";
                                $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status,user_type,admin_approval)
                                VALUES ({$ran_id}, '{$fname}','{$lname}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}', '{$user_type}', '{$admin_approval}')");
                                if ($insert_query) {
                                    $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                    if (mysqli_num_rows($select_sql2) > 0) {
                                        $result = mysqli_fetch_assoc($select_sql2);
                                        $_SESSION['unique_id'] = $result['unique_id'];
                                        $doctor_id = $result['user_id'];

                                        $lat = '10.0';
                                        $lon = '11.0';
//                                        $cv="";
                                    
                                            $cv = $_FILES['cv']['name'];
                                            $temp_cv = $_FILES['cv']['tmp_name'];
                                            move_uploaded_file($temp_cv, "php/cv/" . $cv);
                                        
                                      

                                        
                                        $insert = "insert into doctor (user_id,description,Center,lat,lon,time_start_time,time_finish_time,specialization,doctor_cv)"
                                                . " values ('$doctor_id','$description','$center','$lat','$lon','$startTime','$endTime','$specifiedArea','$cv')";

                                        $result_succ = mysqli_query($conn, $insert);

                                        if ($result_succ) {
                                            echo "<script> swal('Successfull!', 'Registration Successfull Please wait for the Admin Aprroval!', 'success')</script>";
                                            // echo "<script> window.open('user_area/index.php?dashboard ','_self')</script>";
                                        }
                                    } else {
                                        echo "<script> swal('Attention!', '$email - This email not Exist!', 'warning')</script>";
                                    }
                                } else {
                                    echo "<script> swal('Attention!', 'Something went wrong. Please try again!', 'warning')</script>";
                                }
                            }
                        } else {
                            //$error_text = "Please upload an image file - jpeg, png, jpg";
                            echo "<script> swal('Attention!', 'Please upload an image file - jpeg, png, jpg', 'warning')</script>";
                        }
                    } else {
                        echo "<script> swal('Attention!', 'Please upload an image file - jpeg, png, jpg', 'warning')</script>";
                    }
                }
            }
        } else {
            echo "<script> swal('Attention!', '$email - email is not a valid email!', 'warning')</script>";
        }
    } else {
        echo "<script> swal('Attention!', 'All input fields are required!!', 'warning')</script>";
    }
}
?>