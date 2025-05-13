<?php

session_start();
include_once "config.php";
$outgoing_id = $_SESSION['unique_id'];




//$user_Id = $_SESSION['unique_id'];
$get_type = "select * from users where unique_id='$outgoing_id'";
$run_user_type = mysqli_query($conn, $get_type);
$row_type = mysqli_fetch_array($run_user_type);

$user_type = $row_type['user_type'];

$sql = "";
if ($user_type == "USER") {
    $sql = "select distinct user_id,unique_id,fname,lname,email,password,img,status from messages m inner join users u on m.outgoing_msg_id = u.unique_id where m.incoming_msg_id='$outgoing_id' order by date desc";
} else if ($user_type == "DOCTOR") {
    $sql = "select  distinct user_id,unique_id,fname,lname,email,password,img,status from messages m inner join users u on m.incoming_msg_id = u.unique_id where m.outgoing_msg_id='$outgoing_id' order by date desc";
}



//$sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} ORDER BY user_id DESC";
$query = mysqli_query($conn, $sql);
$output = "";
if (mysqli_num_rows($query) == 0) {
    $output .= "No users are available to chat";
} elseif (mysqli_num_rows($query) > 0) {
    include_once "data.php";
}
echo $output;
?>