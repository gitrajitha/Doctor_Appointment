<?php

session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    if (!empty($message)) {
//            $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg,date,time)
//                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}','NOW()', 'NOW()' )") or die();
//        

        $insert_chat = "insert into messages (incoming_msg_id, outgoing_msg_id, msg,date,time)"
                . " values ('$incoming_id','$outgoing_id','$message',date(NOW()),time(NOW()))";



        $run_product = mysqli_query($conn, $insert_chat);
    }
} else {
    header("location: ../login.php");
}
?>