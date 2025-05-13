<?php

if(isset($_GET['doctor_delete'])){

$delete_id = $_GET['doctor_delete'];

$delete_user = "delete from users where user_id='$delete_id'";

$run_delete = mysqli_query($Con,$delete_user);


if($run_delete){

echo "<script>alert('User Has Been Deleted')</script>";

echo "<script>window.open('index.php?view_users','_self')</script>";


}

}


?>