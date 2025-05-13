


<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Our Team Section</title>
        <style>

            @import url('https://fonts.googleapis.com/css?family=Allura|Josefin+Sans');

            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body{

                font-family: 'Josefin Sans', sans-serif;
            }

            .wrapper{
                //margin-top: 10%;
            }

            .wrapper h1{
                font-family: 'Allura', cursive;
                font-size: 52px;
                margin-bottom: 60px;
                text-align: center;
            }

            .team{
                display: flex;
                /*justify-content: center;*/
                width: auto;
                text-align: center;
                flex-wrap: wrap;
            }

            .team .team_member{
                background: #fff;
                margin: 5px;
                margin-bottom: 50px;
                width: 300px;
                padding: 20px;
                line-height: 20px;
                color: #8e8b8b;  
                position: relative;
            }

            .team .team_member h3{
                color: #81c644;
                font-size: 26px;
                margin-top: 50px;
            }

            .team .team_member p.role{
                color: #ccc;
                margin: 12px 0;
                font-size: 12px;
                text-transform: uppercase;
            }

            .team .team_member .team_img{
                position: absolute;
                top: -50px;
                left: 50%;
                transform: translateX(-50%);
                width: 100px;
                height: 100px;
                border-radius: 50%;
                background: #fff;
            }

            .team .team_member .team_img img{
                width: 100px;
                height: 100px;
                padding: 5px;
            }


        </style>
    </head>
    <body>



    <center>
        <div class="wrapper">
            <h1>User Stories</h1>
            <div class="team">
                <?php
                $get_user = "select * from userStory us inner join users u on us.user_id = u.unique_id order by id desc";

                $run_user = mysqli_query($conn, $get_user);

                while ($row_story = mysqli_fetch_array($run_user)) {
                    ?>
                    <div class="team_member">
                        <div class="team_img">
                            <img src="../php/images/user.png" alt="Team_image">
                        </div>
                        <h3><?php echo $row_story['fname'] . " " . $row_story['lname'] ?></h3>

                        <p><?php echo $row_story['story']; ?></p>
                    
                    </div>
                <?php } ?>

            </div>	
        </div>
        
        <br>
<!--           <div class="wrapper">
            
            <div class="team">
                <?php
                $get_user = "select * from userStory us inner join users u on us.user_id = u.unique_id  limit 4,8";

                $run_user = mysqli_query($conn, $get_user);

                while ($row_story = mysqli_fetch_array($run_user)) {
                    ?>
                    <div class="team_member">
                        <div class="team_img">
                            <img src="../php/images/user.png" alt="Team_image">
                        </div>
                        <h3><?php echo $row_story['fname'] . " " . $row_story['lname'] ?></h3>

                        <p><?php echo $row_story['story']; ?></p>
                    
                    </div>
                <?php } ?>

            </div>	
        </div>
        
        <br>

          <div class="wrapper">
            
            <div class="team">
                <?php
                $get_user = "select * from userStory us inner join users u on us.user_id = u.unique_id  limit 8,12";

                $run_user = mysqli_query($conn, $get_user);

                while ($row_story = mysqli_fetch_array($run_user)) {
                    ?>
                    <div class="team_member">
                        <div class="team_img">
                            <img src="../php/images/user.png" alt="Team_image">
                        </div>
                        <h3><?php echo $row_story['fname'] . " " . $row_story['lname'] ?></h3>

                        <p><?php echo $row_story['story']; ?></p>
                    
                    </div>
                <?php } ?>

            </div>	
        </div>
        
         <br>

          <div class="wrapper">
           
            <div class="team">
                <?php
                $get_user = "select * from userStory us inner join users u on us.user_id = u.unique_id  limit 12,16";

                $run_user = mysqli_query($conn, $get_user);

                while ($row_story = mysqli_fetch_array($run_user)) {
                    ?>
                    <div class="team_member">
                        <div class="team_img">
                            <img src="../php/images/user.png" alt="Team_image">
                        </div>
                        <h3><?php echo $row_story['fname'] . " " . $row_story['lname'] ?></h3>

                        <p><?php echo $row_story['story']; ?></p>
                    
                    </div>
                <?php } ?>

            </div>	
        </div>-->
         
    </center>
    </body>
</html>