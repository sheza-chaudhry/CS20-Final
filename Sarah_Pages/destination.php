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
                <span>CodeCommerce</span>

            </div>
            <i class = "bx bx-menu" id = "btn"></i>
        </div>
       
        <ul>
            <li>
                <a href = "#">
                    <i class = "bx bxs-grid-alt"></i>
                    <span class = "nav-item"> Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href = "#">
                    <i class = "bx bxs-shopping-bag"></i>
                    <span class = "nav-item"> Products</span>
                </a>
                <span class="tooltip">Products</span>
            </li>
            <li>
                <a href = "#">
                    <i class = "bx bx-list-check"></i>
                    <span class = "nav-item"> Categories</span>
                </a>
                <span class="tooltip">Categories</span>
            </li>
            <li>
                <a href = "#">
                    <i class = "bx bxs-food-menu"></i>
                    <span class = "nav-item"> Orders</span>
                </a>
                <span class="tooltip">Orders</span>
            </li>
            <li>
                <a href = "#">
                    <i class = "bx bx-body"></i>
                    <span class = "nav-item"> Customers</span>
                </a>
                <span class="tooltip">Customers</span>
            </li>
            <li>
                <a href = "#">
                    <i class = "bx bx-location-plus"></i>
                    <span class = "nav-item"> Shipping</span>
                </a>
                <span class="tooltip">Shipping</span>
            </li>
            <li>
                <a href = "#">
                    <i class = "bx bx-cog"></i>
                    <span class = "nav-item"> Settings</span>
                </a>
                <span class="tooltip">Settings</span>
            </li>
            <li>
                <a href = "#">
                    <i class = "bx bx-log-out"></i>
                    <span class = "nav-item"> Logout</span>
                </a>
                <span class="tooltip">Logout</span>
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
               <form id = "locationForm">
                <label for="locations">Choose a Location:</label>
                
                <select id="locations" name="locations">
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
                <input type="submit">
              </form>
              
            </div>
            <div id="location">
                Image Changes Based on Location Selected

            </div>
            
            <div id="content1">
                <!-- Need to get database info 
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
                    while($row = $result->fetch_assoc()){
                        echo $row["Name"]. "<br>";
                    }

                    $conn->close();
                
                ?>
                -->

                Information about places
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