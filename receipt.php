<!-- Notes:
Author: Shahadah Manzer 
Tutorial Credit: https://www.youtube.com/watch?v=uy1tgKOnPB0
Note: Text/Icons are filler text from tutorial, not related to project  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="receipt.css">
    <style>
        
    </style>
    <title> Receipt </title>
</head>
<body>
    <!-- Three Main Containers - Sidebar, Top Div, User Div, List, Main  -->
    <div class="sidebar">
        <div class="top">
            <div class="logo">
                <i class='bx bx-world' ></i>
                <span> TravelMate</span>

            </div>
            <i class = "bx bx-menu" id = "btn"></i>
        </div>
       
        <ul>
            <li>
                <a href = "#">
                    <i class='bx bxs-info-circle' ></i>
                    <span class = "nav-item"> Info</span>
                </a>
                <span class="tooltip"> Info</span>
            </li>
            <li>
                <a href = "#">
                    <i class='bx bx-map-pin' ></i>
                    <span class = "nav-item"> Destination </span>
                </a>
                <span class="tooltip">Destination</span>
            </li>
            <li>
                <a href = "#">
                    <i class='bx bxs-plane-alt'></i>
                    <span class = "nav-item"> Airfare</span>
                </a>
                <span class="tooltip">Airfare</span>
            </li>
            <li>
                <a href = "#">
                    <i class='bx bx-hotel'></i>
                    <span class = "nav-item"> Hotels</span>
                </a>
                <span class="tooltip">Hotels</span>
            </li>
            <li>
                <a href = "#">
                    <i class='bx bx-trip'></i>
                    <span class = "nav-item"> Attractions</span>
                </a>
                <span class="tooltip">Attractions</span>
            </li>
            <li>
            <a style ="background-color: #fff; color: #023047" class = "focus" href = "#">
                    <i class='bx bx-receipt'></i>
                    <span style ="background-color: #fff;  color: #023047" class = "nav-item"> Receipt </span>
                </a>
                <span class="tooltip">Receipt</span>
            </li>
        </ul>
    </div>

    <div id="navbar">
        <img src = "TravelMate_white.png">
    </div>

    
    <div class="main-content">
       <center> <h1> Receipt </h1> </center>
        <div class="container">
            <div class="summary">
            <?php 


                //establish connection info
                $server = "localhost";// your server
                $userid = "uduadwz9z9x4p"; // your user id
                $pw = "gwua9kxwnrbh"; // your pw
                $db= "db1uq7hhucgs27"; // your database
                        
                // Create connection
                $conn = new mysqli($server, $userid, $pw);

                // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }
                //echo "Connected successfully<br>";
                    
                //select the database
                $x = $conn->select_db($db);
                if ($x == false) {
                    echo "Could not selcet database!";
                }

                $firstName = $_REQUEST['fname'];
                $lastName = $_REQUEST['lname'];
                $email = $_REQUEST['email'];
                $phone = $_REQUEST['phone'];
                $zip = $_REQUEST['zip'];
                $city = $_REQUEST['city'];
                $address = $_REQUEST['address'];
                $startMonth = $_REQUEST['startMonth'];
                $startDay = $_REQUEST['startDay'];
                $startYear = $_REQUEST['startYear'];
                $endMonth = $_REQUEST['endMonth'];
                $endDay = $_REQUEST['endDay'];
                $endYear = $_REQUEST['endYear'];

                $destinationID = $_REQUEST['location'];
                $numDays = $_REQUEST['days'];
                $numPeople = $_REQUEST['people'];

                $hotelPrice = $_REQUEST['hotel_price'];
                $ticketPrice = $_REQUEST["ticket_price"];

                $attraction = $_REQUEST["attractionSelection"];
            
                //run a query
                $sqlDestination = "SELECT Location FROM Attractions WHERE DescriptionID = " . $descriptionID . " LIMIT 1";
                $destination = $conn->query($sqlDestination);

                echo "<div class='table-container'>";
                echo "<table id='my_table'>";
                //echo "<p> Order Summary </p>";
                // display necessary items on screen
                echo "<tr> <td> Name: " . $firstName . " " . $lastName . "</td> </tr>";
                echo "<tr> <td> Dates: " . $startMonth . "/" . $startDay . "/" . $startYear. " to " . 
                    $endMonth . "/" . $endDay . "/" . $endYear . "</td> </tr>";

                echo "<tr> <td> Ticket Price: " . $ticketPrice . "</td> </tr>";
                echo "<tr> <td> Destination: " . $destination . "</td> </tr>";
                echo "<tr> <td> Hotel Price: " . $hotelPrice . "</td> </tr>";
                echo "<tr> <td> Attraction: " . $attraction . "</td> </tr>";
                $total = $hotelPrice + $ticketPrice;
                echo "<tr> <td> Total: " . $total . "</td> </tr>";
                echo "</table>";

                echo "<table id='my_table'>";
                // display necessary items on screen
                //echo "<p> Info </p>";
                echo "<tr> <td> Phone: " . $phone . "</td> </tr>";
                echo "<tr> <td> Email: " . $email . "</td> </tr>";
                echo "<tr> <td> Address: " . $address . " " . $city . ", " . $zip . "</td> </tr>";
                echo "</table>";
                echo "</div>";
            ?>
    
            </div>
        </div>

        <div class="container">
            <div class="endMessage">
                Please reveiw the information, press next when it is to your liking.
            </div>
        </div>
        <a href="thanks.html" class="next"> Next &raquo;</a>

    </div>


    <script> 
        let btn = document.querySelector('#btn')
        let sidebar = document.querySelector('.sidebar');
    
        btn.onclick = function(){
            // document.write("hello"); Test is working 
            sidebar.classList.toggle('active');
        };
    </script>




</body>

</html>