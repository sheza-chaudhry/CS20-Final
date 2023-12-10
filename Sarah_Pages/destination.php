<!-- Notes:
Author: Sarah Simmons 
Tutorial Credit: https://www.youtube.com/watch?v=uy1tgKOnPB0
Note: Text/Icons are filler text from tutorial, not related to project  -->

<!-- Page Specific Notes:
- Need to update Sidebar contents 




-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="destination.css">
    <title> Destination Selection</title>
</head>
<body>

    <!-- Three Main Containers - Sidebar, Top Div, User Div, List, Main  -->
    <div class="sidebar">
        <div class="top">
            <div class="logo">
                <i class='bx bx-world' ></i>
                <span> Travel Mate</span>

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
                <a style ="background-color: #fff; color: #023047" class = "focus" href = "#">
                    <i class='bx bx-map-pin' ></i>
                    <span style ="background-color: #fff;  color: #023047"class = "nav-item"> Destination </span>
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
                <a href = "#">
                    <i class='bx bx-receipt'></i>
                    <span class = "nav-item"> Receipt </span>
                </a>
                <span class="tooltip">Receipt</span>
            </li>
        </ul>
    </div>
    
    <div class="main-content">
        <div class="container">
            <div id="navbar">
                <img src = "TravelMate_white.png">
            </div>

            <div id="main">

               <p class = "header" >Destination Selection <p>
               <p> Select a destination from the drop down below to learn more, click <span class = 'stand-out'> submit </span> when you've made your decision</p>
               <form action = "selected_destination.php"id = "locationForm" name = "locationForm" method = "post">
                <label for="locations" class = "stand-out">Choose a Location:</label>
                
                <select id="locations" name ='locations' form = "locationForm">
                    <option value = "0"> --- </option>
                    <?php 
                    // establish connection info 
                    $server = "localhost";
                    $userid = "uao61g5w2cwj8";
                    $pw = "631g,_5`@%##";
                    $db = "dbqkcbe0i0659m";

                    // Create connection
                    $conn = new mysqli($server, $userid, $pw);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    } else{
                        echo "Success!";
                    }

                    // select the database
                    $conn->select_db($db);
                    //run a query
                    $sql = "SELECT * FROM Destinations";
                    $result = $conn->query($sql);
                    // $holder = array();
                    $counter = 1;
                    while($row = $result->fetch_assoc()){
                        echo "<option value=". $counter ." >".$row["Name"]."</option>";
                        // $holder[0] = $row["Image"];
                        $counter = $counter + 1;
                    }
                    //Script
                    // echo <<< EOT 
                    // <script>
                    //     document.getElementById("locations").onchange = function(){
                    //     obj = document.getElementById("locations");
                    //     value = obj.value;
                    //     document.write(hello);
                    //     }
                    // </script>
                    // EOT;
                    // console.log("0");
                    // // $hello = 1;
                    // // echo $hello;
                    // $result2 = $conn->query($sql);
                    // $jsonArray = array();
                    // $hello2;
                    // // $i = 0;
                    // while ($row = $result2->fetch_object()) {
                    //     $hello2 = $row;
                    // }
                    
                    // // $result = $result->fetch_assoc();

                    // echo <<< EOT
                    // <script>
                    //     // console.log("1");
                    //     // var x = $jsonArray;
                    //     // var y = JSON.parse(x);
                    //     var x = $hello2->Name;

                    //     document.getElementById("locations").onchange = function(){
                    //     obj = document.getElementById("locations");
                    //     value = obj.value;
                    //     // console.log("1");
                    //     document.write(x);
                    //     // console.log("2");
                    //     }
                    // </script>

                    // EOT;


                    $conn->close();
                
                ?>
                
                </select>
                 <?php
                    // PHP to send forward variables
                    // Copy this section on each page
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
                    // test when return on sd.php

                    echo "<input type = 'hidden' name = 'fname' value =".$firstName.">"; 
                    echo "<input type = 'hidden' name = 'lname' value =".$lastName.">";
                    echo "<input type = 'hidden' name = 'email' value =".$email.">";
                    echo "<input type = 'hidden' name = 'phone' value =".$phone.">";
                    echo "<input type = 'hidden' name = 'zip' value =".$zip.">";
                    echo "<input type = 'hidden' name = 'city' value =".$city.">";
                    echo "<input type = 'hidden' name = 'address' value =".$address.">";
                    
                    echo "<input type = 'hidden' name = 'startMonth' value =".$startMonth.">";
                    echo "<input type = 'hidden' name = 'startDay' value =".$startDay.">";
                    echo "<input type = 'hidden' name = 'startYear' value =".$startYear.">";
                    echo "<input type = 'hidden' name = 'endMonth' value =".$endMonth.">";
                    echo "<input type = 'hidden' name = 'endDay' value =".$endDay.">";
                    echo "<input type = 'hidden' name = 'endYear' value =".$endYear.">";



                ?> 
                <input class="button-hotels-tickets" type="submit" value="Submit">

              </form>
              
            </div>
            <div id="location">
                <?php
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


                    echo $firstName. "<br>";
                    echo $lastName. "<br>";
                    echo $email. "<br>";
                    echo $phone. "<br>";
                    echo $zip. "<br>";
                    echo $city. "<br>";
                    echo $address. "<br>";
                    echo $startMonth. "<br>";
                    echo $startDay. "<br>";
                    echo $startYear. "<br>";
                    echo $endMonth. "<br>";
                    echo $endDay. "<br>";
                    echo $endYear. "<br>";


                ?>
                 <!-- Images for locations are populated into this div-->

            </div>
            
            <div id="content1">
            <!-- Information about locations are populated into this div-->
            </div>
        </div>
    </div>

    <!-- Script for Sidebar -->
    <script> 
        let btn = document.querySelector('#btn')
        let sidebar = document.querySelector('.sidebar');
        var hello = "hello";
    
        btn.onclick = function(){
            // document.write("hello"); Test is working 
            sidebar.classList.toggle('active');
        };
    </script>

    <script> 
        document.getElementById("locations").onchange = function(){
            obj = document.getElementById("locations");
            value = obj.value;
            // document.write(hello);
            var myVariable = value;

            $.ajax({
                type: "POST",
                url: "get_description.php",
                data: { myVariable: myVariable },
                success: function(response) {
                console.log(response); // Output from PHP
                $("#content1").html(response);
                }
            });

            $.ajax({
                type: "POST",
                url: "get_image.php",
                data: { myVariable: myVariable },
                success: function(response) {
                console.log(response); // Output from PHP
                $("#location").html(response);
                }
            });
        }

        // Reopen Database
        // 
        //     $server = "localhost";
        //     $userid = "uao61g5w2cwj8";
        //     $pw = "631g,_5`@%##";
        //     $db = "dbqkcbe0i0659m";

        //     // Create connection
        //     $conn = new mysqli($server, $userid, $pw);

        //     // Check connection
        //     if ($conn->connect_error) {
        //         die("Connection failed: " . $conn->connect_error);
        //     } else{
        //         echo "Success!";
        //     }

        //     // select the database
        //     $conn->select_db($db);
        //     //run a query
        //     $sql = "SELECT * FROM Destinations";
        //     $result = $conn->query($sql);
        //     while($row = $result->fetch_assoc()){
        //         echo $row["Name"]. "<br>";
        //     }

        //     $conn->close();



        // 
        
    </script>



</body>

</html>