<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type = "text/css" href="style.css">
    </head>

    <body>
        <div class='sidebar'>
            <div class='top'>
                <div class='logo'>
                    <i class = 'bx bxl-codepen'> </i>
                    <span>CodeCommerce</span>
                </div>
                <i class = 'bx bx-menu' id = 'btn'></i>
            </div>
            <div class='user'>
                <img src='user-img.png' alt='avacado toast' class = 'user-img'>
                <div>
                    <p class='bold'> Username </p>
                    <p> Admin</p>
                </div>
            </div>
            <ul>
                <li>
                    <a href = '#'>
                        <i class = 'bx bxs-grid-alt'></i>
                        <span class = 'nav-item'> Destinations</span>
                    </a>
                    <span class='tooltip'>Destinations</span>
                </li>
                <li>
                    <a href = '#'>
                        <i class = 'bx bxs-shopping-bag'></i>
                        <span class = 'nav-item'> Tickets</span>
                    </a>
                    <span class='tooltip'>Tickets</span>
                </li>
                <li>
                    <a href = '#'>
                        <i class = 'bx bx-list-check'></i>
                        <span class = 'nav-item'> Hotels</span>
                    </a>
                    <span class='tooltip'>Hotels</span>
                </li>
                <li>
                    <a href = '#'>
                        <i class = 'bx bxs-food-menu'></i>
                        <span class = 'nav-item'> Itinerary</span>
                    </a>
                    <span class='tooltip'>Itinerary</span>
                </li>
                <li>
                    <a href = '#'>
                        <i class = 'bx bx-body'></i>
                        <span class = 'nav-item'> Receipt</span>
                    </a>
                    <span class='tooltip'>Receipt</span>
                </li>
            </ul>
        </div>

        <?php
            // Connection info
            $server = "www.sarahs.sgedu.site";
            $userid = "uao61g5w2cwj8";
            $pw = "631g,_5`@%##";
            $db = "dbqkcbe0i0659m";

            // Create connection
            $conn = new mysqli($server, $userid, $pw);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            # echo "Connected successfully<br>";

            //select the database
            $conn->select_db($db);

            // get destination and number of days
            // $destination_ID = $_REQUEST['Destination_ID'];
            // $departure_ID = $REQUEST['Departure_ID'];
            //$destination_ID = $_REQUEST['location']; // Sydney
            $destination_ID = 5;
            $departure_ID = 1; // JFK
            $num_people = $_REQUEST['people'];

            //run a query
            $sql = "SELECT * FROM Flights WHERE Destination_ID = " . $destination_ID . " AND Airport_ID = " .  $departure_ID;
            $dep_info = "SELECT * FROM Airports WHERE ID = " . $departure_ID;
            $result = $conn->query($sql);
            $result_dep = $conn->query($dep_info);

            if ($result_dep->num_rows > 0) 
            {
                $row = $result_dep->fetch_assoc();
                $dep_name = $row["Name"];
                $dep_description = $row["Description"];
                $dep_image = $row["Image"];
            } else {
                echo "no result";
            }
        ?>

        <div class='main-content-hotels-tickets'>
            <h1>Tickets</h1>
            <h4>TravelMate has partnered up with Delta Airlines to give you the best offer possible! Note: Please pay attention to all travel restrictions!</h4>
               
        <?php
            echo"<h5>Departure Airport: " . $dep_name . "</h5>";
            echo "<p>Descripton: " . $dep_description . "</p>";
            // TODO: Format this better!
            echo "<img src='" . $dep_image . "'>";
        ?>
                
        <form onsubmit='return storeChoice()' method='post' action='hotels.php'>
        <div class="grid-hotels-tickets" id="grid">

        <?php
            //get results
            $prices = array(); // 0 - first, 1 - business, 2 - economy
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                    $prices[0] = $row["First_Class"];
                    $prices[1] = $row["Business_Class"];
                    $prices[2] = $row["Economy_Class"];
                }
            } 
            else 
            {
                echo "no results";
            }
    
            for($i=0; $i<3; $i++) {
                echo "<div class='box-hotels-tickets' onclick='changeColor(" . $i . ")' id='box" . $i. "'>";
                // echo "<img src='" . $image_array[$i] . "'";
                if($i == 0) {
                    echo "<p>First Class</p>";   
                } else if ($i == 1) {
                    echo "<p>Business Class</p>"; 
                } else if ($i == 2) {
                    echo "<p>Economy Class</p>"; 
                }
                  
                echo "<div class='info-container-hotels-tickets'>";
                echo "<p>Price per ticket: $" . $prices[$i] . "</p>";
                echo "<p>Price for " . $num_people . " travelers: $" . ($prices[$i] * $num_people) . "</p>";
                echo "<h4>Roundtrip price: $" . (($prices[$i] * $num_people) * 2) . "</h4>";
                echo "</div></div>";
            }

            $num_days = $_REQUEST['length'];
            echo "<input type = 'hidden' name = 'days' value =" .$num_days. ">";
            echo "<input type = 'hidden' name = 'location' value =" .$destination_ID. ">";
        ?>

            <p>Travel Restrictions: For travel outside of the United States, make sure you have all required travel documents, 
            including a valid passport. Baggage size must not exceed 62 inches (158 cm) when you total LENGTH + WIDTH + HEIGHT. 
            Each passenger flying with Delta can bring 1 carry-on bag and 1 personal item free of charge (such as a purse, laptop bag 
            or item of similar size that will fit underneath the seat in front of you).</p> 

            <input type='hidden' id='class' name='class'>
            
            </div>
        </div>
        
        <input class='button-hotels-tickets' type='submit' value='Next'></input>
        </form>
        
        <div id="footer">
            <p>Copyright &copy; 2023 TravelMate</p>
        </div>

        <script>
            let btn = document.querySelector('#btn')
            let sidebar = document.querySelector('.sidebar');
        
            btn.onclick = function(){
                // document.write("hello"); Test is working 
                sidebar.classList.toggle('active');
            };

            function changeColor(index) {
                var grid = document.getElementById("grid");
                var box = grid.children[index];
                box.style.backgroundColor = "#219EBC";


                for (i = 0; i < 3; i++) {
                    if (index != i) {
                        if(grid.children[i].style.backgroundColor != "#8ECAE6") {
                            grid.children[i].style.backgroundColor = "#8ECAE6"; 
                        }
                    }
                }
            }

            function storeChoice() {
                found = false;
                for (i = 0; i < 3; i++) {
                    var id = "box" + i;
                    if(document.getElementById(id).style.backgroundColor == "rgb(33, 158, 188)") {
                        found = true;
                        document.getElementById("class").innerHTML = i;
                    }
                }

                if (!found) {
                    alert("Please select an option!");
                    return false;
                } else {
                    return true;
                }
            }
        </script>
    </body>
</html>
