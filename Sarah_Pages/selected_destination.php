

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
                <i class = "bx bxl-codepen"> </i>
                <span> Travel Mate</span>

            </div>
            <i class = "bx bx-menu" id = "btn"></i>
        </div>
       
        <ul>
            <li>
                <a href = "#">
                    <i class = "bx bxs-grid-alt"></i>
                    <span class = "nav-item"> Info</span>
                </a>
                <span class="tooltip"> Info</span>
            </li>
            <li>
                <a href = "#">
                    <i class = "bx bxs-shopping-bag"></i>
                    <span class = "nav-item"> Destination </span>
                </a>
                <span class="tooltip">Destination</span>
            </li>
            <li>
                <a href = "#">
                    <i class = "bx bx-list-check"></i>
                    <span class = "nav-item"> Airfare</span>
                </a>
                <span class="tooltip">Airfare</span>
            </li>
            <li>
                <a href = "#">
                    <i class = "bx bxs-food-menu"></i>
                    <span class = "nav-item"> Hotels</span>
                </a>
                <span class="tooltip">Hotels</span>
            </li>
            <li>
                <a href = "#">
                    <i class = "bx bx-body"></i>
                    <span class = "nav-item"> Attractions</span>
                </a>
                <span class="tooltip">Attractions</span>
            </li>
            <li>
                <a href = "#">
                    <i class = "bx bx-location-plus"></i>
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

               Drop Down to Select Location
                <?php
                    $item1 = $_REQUEST['locations'];
                    echo "<p> ". $item1. "</p>";
                    $firstName = $_REQUEST['fname'];
                    $lastName = $_REQUEST['lname'];
                    $email = $_REQUEST['email'];
                    $phone = $_REQUEST['phone'];
                    $zip = $_REQUEST['zip'];
                    $city = $_REQUEST['city'];
                    $address = $_REQUEST['address'];
                    echo $firstName. "<br>";
                    echo $lastName. "<br>";
                    echo $email. "<br>";
                    echo $phone. "<br>";
                    echo $zip. "<br>";
                    echo $city. "<br>";
                    echo $address. "<br>";
                    // Connect to the database show that the selected location is from the requested ID
                    // Ask how many people on trip
                    // Ask how many nights on trip
                ?> 
               
              
              
            </div>
            <div id="location">
                Image Changes Based on Location Selected
                <?php
                    $item1 = $_REQUEST['locations'];
                    echo "<p> ". $item1. "</p>";
                    // Connect to the database show that the selected location is from the requested ID
                    // Ask how many people on trip
                    // Ask how many nights on trip
                ?> 
            <form action = "TODO: ADD SHEZA's PAGE NAME"id = "trip-info" name = "trip-info" method = "post">
                 <label for="people"> How many people will be joining you on your journey?</label>
                <select id="people_select" name ='people' form = "trip-info">
                    <option value = "1"> 1 </option>
                    <option value = "2"> 2 </option>
                    <option value = "3"> 3 </option>
                    <option value = "4"> 4 </option>
                    <option value = "5"> 5 </option>
                </select>
                <br>
                <label for="length"> How many days would you like your journey to be?</label>
                <select id="length_select" name ='length' form = "trip-info">
                    <option value = "1"> 1 </option>
                    <option value = "2"> 2 </option>
                    <option value = "3"> 3 </option>
                    <option value = "4"> 4 </option>
                    <option value = "5"> 5 </option>
                </select>
                <br>
                <label for="Airport"> Select an Airport to Depart from:</label>
                <select id="airport_select" name ='airport' form = "trip-info">
                    <option value = "1"> John F. Kennedy International </option>
                    <option value = "2"> O'hare International Airport </option>
                    <option value = "3"> LAX </option>
                    <option value = "4"> Dallas-Fort Worth International</option>
                </select>

                <input type= "submit">
                <?php
                    $location = $_REQUEST['locations'];
                    echo "<input type = 'hidden' name = 'location' value =".$location. ">";
                ?> 
                

            </form>

            </div>
            
            <div id="content1">
               
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
            </div>
            <div id="footer">
                Buttons Placed Within
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