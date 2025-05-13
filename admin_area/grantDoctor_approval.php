
<?php

if (isset($_GET['grant_approval'])) {

    $doc_id = $_GET['grant_approval'];

   

    $update = "update users set admin_approval='1' where user_id='$doc_id'";

    $run_query = mysqli_query($Con, $update);

   

    if ($run_query) {

        echo "<script>alert('Doctor Has been Approved')</script>";

        echo "<script>window.open('index.php?view_doctors','_self')</script>";
    }
}
?>
