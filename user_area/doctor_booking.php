<?php

function build_calendar($month, $year) {
    $id = $_GET['doctor_booking'];
    $mysqli = new mysqli('localhost', 'root', '', 'chatapp', '3306');
    $stmt = $mysqli->prepare("select * from appointments where doctor_id = ? AND status = ?");
    $status = 'Already Booked';
    $stmt->bind_param('ss', $id, $status);
    $bookings = array();
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $bookings[] = $row['Appointment_date'];
            }

            $stmt->close();
        }
    }

    $stmt1 = $mysqli->prepare("select * from appointments where doctor_id = ? AND status = ?");
    $status1 = 'On Leave';
    $stmt1->bind_param('ss', $id, $status1);
    $bookings1 = array();
    if ($stmt1->execute()) {
        $result1 = $stmt1->get_result();
        if ($result1->num_rows > 0) {
            while ($row1 = $result1->fetch_assoc()) {
                $bookings1[] = $row1['Appointment_date'];
            }

            $stmt1->close();
        }
    }


    // Create array containing abbreviations of days of week.
    $daysOfWeek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

    // What is the first day of the month in question?
    $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);

    // How many days does this month contain?
    $numberDays = date('t', $firstDayOfMonth);

    // Retrieve some information about the first day of the
    // month in question.
    $dateComponents = getdate($firstDayOfMonth);

    // What is the name of the month in question?
    $monthName = $dateComponents['month'];

    // What is the index value (0-6) of the first day of the
    // month in question.
    $dayOfWeek = $dateComponents['wday'];

    // Create the table tag opener and day headers

    $datetoday = date('Y-m-d');

    $id = $_GET['doctor_booking'];

    $calendar = "<table class='table table-bordered'>";
    $calendar .= "<center><h2>$monthName $year</h2>";
    $calendar.= "<a class='btn btn-xs btn-primary' href='?doctor_booking=" . $id . "&month=" . date('m', mktime(0, 0, 0, $month - 1, 1, $year)) . "&year=" . date('Y', mktime(0, 0, 0, $month - 1, 1, $year)) . "'>Previous Month</a> ";

    $calendar.= " <a class='btn btn-xs btn-primary' href='?doctor_booking=" . $id . "&month=" . date('m') . "&year=" . date('Y') . "'>Current Month</a> ";

    $calendar.= "<a class='btn btn-xs btn-primary' href='?doctor_booking=" . $id . "&month=" . date('m', mktime(0, 0, 0, $month + 1, 1, $year)) . "&year=" . date('Y', mktime(0, 0, 0, $month + 1, 1, $year)) . "'>Next Month</a></center><br>";



    $calendar .= "<tr>";

    // Create the calendar headers

    foreach ($daysOfWeek as $day) {
        $calendar .= "<th  class='header'>$day</th>";
    }
    http://localhost/DoctorAppointment/user_area/index.php?doctor_booking=2
    // Create the rest of the calendar
    // Initiate the day counter, starting with the 1st.

    $currentDay = 1;

    $calendar .= "</tr><tr>";

    // The variable $dayOfWeek is used to
    // ensure that the calendar
    // display consists of exactly 7 columns.

    if ($dayOfWeek > 0) {
        for ($k = 0; $k < $dayOfWeek; $k++) {
            $calendar .= "<td  class='empty'></td>";
        }
    }


    $month = str_pad($month, 2, "0", STR_PAD_LEFT);

    while ($currentDay <= $numberDays) {

        // Seventh column (Saturday) reached. Start a new row.

        if ($dayOfWeek == 7) {

            $dayOfWeek = 0;
            $calendar .= "</tr><tr>";
        }

        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";

        $dayname = strtolower(date('l', strtotime($date)));
        $eventNum = 0;
        $today = $date == date('Y-m-d') ? "today" : "";
        if ($date < date('Y-m-d')) {
            $calendar.="<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>N/A</button>";
        } elseif (in_array($date, $bookings)) {
            $calendar.="<td class='$today'><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>Already Booked</button>";
        } elseif (in_array($date, $bookings1)) {
            $calendar.="<td class='$today'><h4>$currentDay</h4> <button class='btn btn-warning btn-xs'>On Leave</button>";
        } else {
            $calendar.="<td class='$today'><h4>$currentDay</h4> <a href='index.php?date_booking=" . $date . "&doc_booking=" . $id . "' class='btn btn-success btn-xs'>Book</a>";
        }




        $calendar .="</td>";
        // Increment counters

        $currentDay++;
        $dayOfWeek++;
    }



    // Complete the row of the last week in month, if necessary

    if ($dayOfWeek != 7) {

        $remainingDays = 7 - $dayOfWeek;
        for ($l = 0; $l < $remainingDays; $l++) {
            $calendar .= "<td class='empty'></td>";
        }
    }

    $calendar .= "</tr>";

    $calendar .= "</table>";

    echo $calendar;
}
?>

<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <style>
            @media only screen and (max-width: 760px),
            (min-device-width: 802px) and (max-device-width: 1020px) {

                /* Force table to not be like tables anymore */
                table, thead, tbody, th, td, tr {
                    display: block;

                }



                .empty {
                    display: none;
                }

                /* Hide table headers (but not display: none;, for accessibility) */
                th {
                    position: absolute;
                    top: -9999px;
                    left: -9999px;
                }

                tr {
                    border: 1px solid #ccc;
                }

                td {
                    /* Behave  like a "row" */
                    border: none;
                    border-bottom: 1px solid #eee;
                    position: relative;
                    padding-left: 50%;
                }



                /*
                    Label the data
                */
                td:nth-of-type(1):before {
                    content: "Sunday";
                }
                td:nth-of-type(2):before {
                    content: "Monday";
                }
                td:nth-of-type(3):before {
                    content: "Tuesday";
                }
                td:nth-of-type(4):before {
                    content: "Wednesday";
                }
                td:nth-of-type(5):before {
                    content: "Thursday";
                }
                td:nth-of-type(6):before {
                    content: "Friday";
                }
                td:nth-of-type(7):before {
                    content: "Saturday";
                }


            }

            /* Smartphones (portrait and landscape) ----------- */

            @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
                body {
                    padding: 0;
                    margin: 0;
                }
            }

            /* iPads (portrait and landscape) ----------- */

            @media only screen and (min-device-width: 802px) and (max-device-width: 1020px) {
                body {
                    width: 495px;
                }
            }

            @media (min-width:641px) {
                table {
                    table-layout: fixed;
                }
                td {
                    width: 33%;
                }
            }

            .row{
                margin-top: 20px;
            }

            .today{
                background:yellow;
            }



        </style>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
<?php
$dateComponents = getdate();
if (isset($_GET['month']) && isset($_GET['year'])) {
    $month = $_GET['month'];
    $year = $_GET['year'];
} else {
    $month = $dateComponents['mon'];
    $year = $dateComponents['year'];
}
echo build_calendar($month, $year);
?>
                </div>
            </div>
        </div>
    </body>

</html>
