<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<div class="row"><!--1 row starts-->
    
    <div class="col-lg-12"><!-- col-lg-12 starts-->
        
        <ol class="breadcrumb" ><!-- breadcrumb starts-->
            
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Admins
            </li>
            
        </ol><!-- breadcrumb Ends-->
        
    </div><!-- col-lg-12 Ends-->    
    
</div><!--1 row Ends-->

<div class="row"><!--2 row starts-->
    
    <div class="col-lg-12"><!-- col-lg-12 starts-->
        
        <div class="panel panel-default"><!--panel panel-default starts-->
            
            <div class="panel-heading"><!--panel-heading starts-->
                
                <h3 class="panel-title"><!--panel-title starts--> 
                    
                    <i class="fa fa-money fa-fw"></i> View Admins
                    
                </h3><!--panel-title Ends-->
                
            </div><!--panel-heading Ends-->
            
            <div class="panel-body"><!--panel-body starts-->
                
                <div class="table-responsive"><!--table-responsive starts-->
                    
                    <table class="table table-bordered table-hover table-striped"><!--table table-bordered table-hover table-striped starts-->
                        
                        <thead><!-- thead starts-->
                            
                            <tr>
                                <th>User Name:</th>
                                <th>User Email:</th>
                                <th>User Image:</th>
                                <th>User Country:</th>
                                <th>User Job:</th>
                               
                            </tr>
                            
                        </thead><!-- thead Ends-->
                        
                        <tbody><!--tbody starts-->
                            
                            <?php
                            
                            $get_admin = "select * from admin";
                            
                            $run_admin = mysqli_query($Con, $get_admin);
                            
                            while($row_admin = mysqli_fetch_array($run_admin)){
                                
                                $admin_id =$row_admin['id'];
                                
                                $admin_name =$row_admin['name'];
                                
                                $admin_email =$row_admin['email'];
                                
                                $admin_image =$row_admin['image'];
                                
                                $admin_country =$row_admin['country'];
                                
                                $admin_job =$row_admin['job'];
                                
                                
                                
                            
                            
                            ?>
                            
                            <tr>
                                <td><?php echo $admin_name; ?></td>
                                
                                <td><?php echo $admin_email; ?></td>
                                
                                <td><img src="admin_images/<?php echo $admin_image; ?>" width="60" height="60"</td>
                                
                                <td><?php echo $admin_country; ?></td>
                                
                                <td><?php echo $admin_job; ?></td>
                                
                                
                            </tr>
                            <?php } ?>
                            
                        </tbody><!--tbody Ends-->
                        
                    </table><!--table table-bordered table-hover table-striped Ends-->
                    
                </div><!--table-responsive Ends-->
                
            </div><!--panel-body Ends-->
            
        </div><!--panel panel-default Ends-->
        
    </div><!-- col-lg-12 Ends-->
    
</div><!--2 row Ends-->
<?php } ?>
