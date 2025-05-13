<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Access Google Maps API in PHP</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
              <!--<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" ></script>

        <script type="text/javascript" src="js/googlemap.js"></script>
        <style type="text/css">
            .containr {
                height: 450px;
            }
            #map {
                width: 83%;
                height: 150%;
                border: 1px solid blue;
                // margin-left: 600px;
            }
            #data, #allData {
                display: none;
            }

            table {
                width: 100%;
            }

            td {
                height:50px;
            }
        </style>
    </head>
    <body>
        <div class="containr">
            <br><br><br>
            


            <?php
             $user_Id = $_SESSION['unique_id'];
            require 'CenterClass.php';
            $edu = new education;
            $coll = $edu->getCollegesBlankLatLng();
            $coll = json_encode($coll, true);
            echo '<div id="data">' . $coll . '</div>';
            
            $userdet = $edu->getUserlocation($user_Id);
            $userdet = json_encode($userdet, true);
            echo '<div style="display:none" id="userdet">' . $userdet . '</div>';
            
             $allData = $edu->getAllColleges();
             
            $allData = json_encode($allData, true);
             echo $allData;
            echo '<div id="allData">' . $allData . '</div>';

            ?>

            <div class="col-md-2">
                <center>
                    <table>
                        <th>
                        <h1>  <b>Centers</b></h1>
                        </th>
                        <?php
                        $get_centerval = "select * from centerdistance where user_id ='$user_Id' order by distance";
                        $run_centerval = mysqli_query($conn, $get_centerval);
                        while ($row_centerval = mysqli_fetch_array($run_centerval)) {
                            $name = $row_centerval['name'];
                            $ditance = $row_centerval['distance'];
                        
                        ?>
                        <tr>
                            <td>
                                <h4> <?php echo $name;?></h4>
                                
                                 Distance: <?php echo substr($ditance,0,4).'Km' ?>
                            </td>
                           
                            <td>
                                <a href="index.php?findDocId=<?php echo $row_centerval['id'];?>" >
                                    <i class="fa fa-location-arrow" ></i> Find 
                                </a>
                                <br>
                                
                            </td>
                        </tr>
                       <?php }?>



                    </table>
                </center>
            </div>

            <div id="map" class="col-md-10"></div>







        </div>


    </body>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDE7INPzgvuO4j_icWW7mj0F_300qgM6w&callback=loadMap">
    
    
    const dbParam = JSON.stringify({table:"customers",limit:20});
const xmlhttp = new XMLHttpRequest();
xmlhttp.onload = function() {
  const myObj = JSON.parse(this.responseText);
  let text = "<table border='1'>"
  for (let x in myObj) {
    text += "<tr><td>" + myObj[x].name + "</td></tr>";
  }
  text += "</table>"    
  document.getElementById("demo").innerHTML = text;
}
xmlhttp.open("POST", "json_demo_html_table.php");
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send("x=" + dbParam);
    
    
    
    
    
    </script>
    
    
</html>