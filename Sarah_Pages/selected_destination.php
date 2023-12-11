

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
    <link rel="stylesheet" href="selected_destination.css">
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
                <a>
                    <i class='bx bxs-info-circle' ></i>
                    <span class = "nav-item"> Info</span>
                </a>
                <span class="tooltip"> Info</span>
            </li>
            <li>
                <a style ="background-color: #fff;  color: #023047"class = "focus">
                    <i class='bx bx-map-pin' ></i>
                    <span class = "nav-item"> Destination </span>
                </a>
                <span class="tooltip">Destination</span>
            </li>
            <li>
                <a>
                    <i class='bx bxs-plane-alt'></i>
                    <span class = "nav-item"> Airfare</span>
                </a>
                <span class="tooltip">Airfare</span>
            </li>
            <li>
                <a>
                    <i class='bx bx-hotel'></i>
                    <span class = "nav-item"> Hotels</span>
                </a>
                <span class="tooltip">Hotels</span>
            </li>
            <li>
                <a>
                    <i class='bx bx-trip'></i>
                    <span class = "nav-item"> Attractions</span>
                </a>
                <span class="tooltip">Attractions</span>
            </li>
            <li>
                <a>
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
                <p class = "header"> Excellent Choice! </p>
               <p style = "font-size: 18px; margin-top: 40px"class = "small">  Now let's fill out a bit more info about your trip. </p>

            </div>
            <div id="location">
                <?php
                    // Connect to the database show that the selected location is from the requested ID
                    // Ask how many people on trip
                    // Ask how many nights on trip
                ?> 
            <div id="form" style="position: relative; top:30px;">
            <form action = "TODO: ADD SHEZA's PAGE NAME"id = "trip-info" name = "trip-info" method = "post">
                 <label style = "margin-top: 40px"for="people"> How many people will be joining you on your journey?</label>
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
                    // DELETE
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
            

            </form>
            </div>
             <button type="button" onclick="submitForm()">Next</button>

            </div>
            
            <div id="content1">
                <p style = "font-size: 18px"> <span style = "font-weight: bolder; font-size: 18px;"> Congrats! </span> You're going to: </p>
                
                
               
               <?php
                    $location = $_REQUEST['locations'];
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
                        //echo "Success!";
                    }

                    // select the database
                    $conn->select_db($db);
                    //run a query
                    $sql = "SELECT * FROM Destinations WHERE ID = '". $location. "'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $desc = $row["Description"];
                    $name = $row["Name"];
                    $image = $row["Image"];
                   
                    echo "<p class = 'header'>". $name. "</p><br>";
                    echo "<p style = 'font-size:18px'>". $desc. "</p><br>";
                    echo "<img src='". $image."'><br>";

                    
                    


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
        
    </script>

     <script>
  function submitForm() {
    // Get the form element
    var form = document.getElementById("trip-info");

    // Submit the form
    form.submit();
  }
</script>



</body>

</html>