<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <!-- <div id='navbar'>
            <a href='index.html'>
                <img src='images/TravelMate.png' alt ='TravelMate Logo' width='125'>
            </a>
            <ul id='navbar-menu'>
                <li><a href='#'>ABOUT US</a></li>
                <li><a href='#'>CONTACT</a></li>
                <li><a href='#'>REVIEWS</a></li>
            </ul>
            <button id='menu-button' class='menu-button'>&#9776;</button>
            <ul class='mobile-menu'>
                <li><a href='#'>ABOUT US</a></li>
                <li><a href='#'>CONTACT</a></li>
                <li><a href='#'>REVIEWS</a></li>
            </ul>
        </div> -->

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
            // $num_days = $_REQUEST['number_days'];
            $destination_ID = 5; // Sydney
            $num_days = 3;

            // run a query
            $sql = "SELECT * FROM Hotels WHERE Destination_ID = " . $destination_ID;
            $result = $conn->query($sql);

            // get results and place into appropriate arrays
            $name_array = array();
            $description_array = array();
            $price_array = array();
            $image_array = array();
            $perks_array = array();
            $item = 0;
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                    $name_array[$item] = $row["Name"];
                    $description_array[$item] = $row["Description"];
                    $price_array[$item] = $row["Price"];
                    $image_array[$item] = $row["Image"];
                    $perks_array[$item] = $row["Perks"];
                    $item = $item + 1;
                }
            } 
            else 
            {
                echo "no results";
            }
        ?>

        <div class='main-content-hotels-tickets'>
            <h1>Hotels</h1>
            <h4>Pick from one of our beautiful hotels at low, discounted prices! Add comfort and unlimited perks to make your trip even more memorable</h4>
            <form onsubmit='return storeChoice()' method='post' action='#'>

            <div class='grid-hotels-tickets' id='grid'>
        
        <?php
            for($i=0; $i<3; $i++) {
                echo "<div class='box-hotels-tickets' onclick='changeColor(" . $i . ")'>";
                echo "<div class='image-container-hotels-tickets'>";
                echo "<img src='" . $image_array[$i] . "';>";
                echo "<p>" . $name_array[$i] . "</p></div>";
                echo "<div class='info-container-hotels-tickets'>";
                echo "<p>Price per night: $" . $price_array[$i] . "</p>";
                echo "<p><strong>Price for " . $num_days . " nights: $" . ($price_array[$i] * $num_days) . "</strong></p>";
                echo "<p>Perks: " . $perks_array[$i] . "</p></div>";
                echo "</div>";
            }
        ?>
            </div>
        </div>

        <input class='button-hotels-tickets' type='submit' value='Next'></input>
        <input type='hidden' id='hidden_name'></form>
        
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
                    if(grid.children[i].style.backgroundColor == "#FFFFFF") {
                        found = true;
                        document.getElementById("hidden_name").innerHTML = grid.children[i].innerHTML;
                        document.write(document.getElementById("hidden_name").innerHTML);
                        return true;
                    }
                }

                if (!found) {
                    return false;
                }
            }
        </script>
    </body>
</html>
