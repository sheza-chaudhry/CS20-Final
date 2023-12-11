<?php
    // establish connection info
    $server = "www.shahadahm.sgedu.site";
    $userid = "uduadwz9z9x4p";
    $pw = "gwua9kxwnrbh";
    $db = "db1uq7hhucgs27";
    // create connection
    $conn = new mysqli($server, $userid, $pw);
    // check connection 
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // select the database
    $conn->select_db($db);

    // carrying over responses
    // Info page
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
    // Destination page
    $destinationID = $_REQUEST['location'];
    $numDays = $_REQUEST['days'];
    $numPeople = $_REQUEST['people'];
    // Ticket page
    $ticketPrice = $_REQUEST['ticket_price'];
    // Hotel page
    $hotelPrice = $_REQUEST['hotel_price'];

    // getting destination
    $sqlDestination = "SELECT Location FROM Attractions WHERE Destination_ID = " . $destinationID . " LIMIT 1";
    $destination = $conn->query($sqlDestination);

    $destinationRow = $destination->fetch_assoc();
    $location = $destinationRow['Location'];
    $encodedLocation = urlencode($location);

    /* API CALL */
    $activityType = "";
    $APIUrl = 'https://api.weatherapi.com/v1/future.json?q={$encodedLocation}&dt={$startYear}-{$startMonth}-{$startDay}&key=6c3319941539419184a231048230912';
    // Make the API call
    $APIResponse = file_get_contents($APIUrl);

    //Check for errors
    if ($APIResponse === false) {
        echo 'Error fetching data from the API.';
    } else {
        // Decode the JSON response
        $data = json_decode($APIResponse, true);

        // Check if decoding was successful
        if ($data !== null) {
            $output = $data['forecast']['forecastday'][0]['day']['avgtemp_f'];
            $activityType = $output < 50 ? "Indoor" : "Outdoor";
        } else {
            echo 'Error decoding JSON response from the API.';
        }
    }

    // run a query
    $sql = "SELECT Name, Description, Image FROM Attractions WHERE Destination_ID = " . $destinationID . " AND Type = " . $activityType; 
    $result = $conn->query($sql);

    $attractions = [];
    // storing each attraction in an array
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $attractions[] = [
                'name' => $row['Name'],
                'description' => $row['Description'],
                'image' => $row['Image']
            ];
        }
    }
?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" type="text/css" href="itinerary.css">
    <title>TravelMate</title>
</head>
<body>
    <div class="sidebar">
        <div class="top">
            <div class="logo">
                <i class = "bx bx-world"> </i>
                <span>TravelMate</span>

            </div>
            <i class = "bx bx-menu" id = "btn"></i>
        </div>
        <ul>
            <li>
                <a>
                    <i class = "bx bxs-info-circle"></i>
                    <span class = "nav-item"> Info</span>
                </a>
                <span class="tooltip"> Info</span>
            </li>
            <li>
                <a>
                    <i class = "bx bx-map-pin"></i>
                    <span class = "nav-item"> Destination </span>
                </a>
                <span class="tooltip">Destination</span>
            </li>
            <li>
                <a>
                    <i class = "bx bxs-plane-alt"></i>
                    <span class = "nav-item"> Airfare</span>
                </a>
                <span class="tooltip">Airfare</span>
            </li>
            <li>
                <a>
                    <i class = "bx bx-hotel"></i>
                    <span class = "nav-item"> Hotels</span>
                </a>
                <span class="tooltip">Hotels</span>
            </li>
            <li>
                <a style="background-color: #fff; color: #023047">
                    <i class = "bx bx-trip"></i>
                    <span class = "nav-item"> Attractions</span>
                </a>
                <span class="tooltip">Attractions</span>
            </li>
            <li>
                <a>
                    <i class = "bx bx-receipt"></i>
                    <span class = "nav-item"> Receipt </span>
                </a>
                <span class="tooltip">Receipt</span>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <div class="container">
            <div id="navbar">
                <a href="index.html">
                    <img src="logo.png">
                </a>
            </div>
            <div id="main">
                <h3>ATTRACTIONS</h3>
                <p id="subheading">Based on the anticipated weather during your trip, choose a complimentary attraction to add to your itinerary (no, really—it's on us!).</p>

                <form action="receipt.php" method="post" id="appForm">
                    <label class="image-button">
                        <input type="radio" name="attractionSelection" value="<?php echo $attractions[0]['name']; ?>">
                        <img src="images/<?php echo $attractions[0]['image']; ?>" width="250">
                        <p class="img-title"><?php echo $attractions[0]['name']; ?></p>
                        <p class="img-descrip"><?php echo $attractions[0]['description']; ?></p>
                    </label>

                    <label class="image-button">
                        <input type="radio" name="attractionSelection" value="<?php echo $attractions[1]['name']; ?>">
                        <img src="images/<?php echo $attractions[1]['image']; ?>" width="250">
                        <p class="img-title"><?php echo $attractions[1]['name']; ?></p>
                        <p class="img-descrip"><?php echo $attractions[1]['description']; ?></p>
                    </label>

                    <label class="image-button">
                        <input type="radio" name="attractionSelection" value="<?php echo $attractions[2]['name']; ?>">
                        <img src="images/<?php echo $attractions[2]['image']; ?>" width="250">
                        <p class="img-title"><?php echo $attractions[2]['name']; ?></p>
                        <p class="img-descrip"><?php echo $attractions[2]['description']; ?></p>
                    </label>

                    <!-- Carrying over data -->
                    <input type ='hidden' name ='fname' value ="<?php echo $firstName; ?>">; 
                    <input type ='hidden' name ='lname' value ="<?php echo $lastName; ?> ">;
                    <input type ='hidden' name ='email' value ="<?php echo $email; ?>">;
                    <input type ='hidden' name ='phone' value ="<?php echo $phone; ?>">;
                    <input type ='hidden' name ='zip' value ="<?php echo $zip; ?>">;
                    <input type ='hidden' name ='city' value ="<?php echo $city; ?>">;
                    <input type ='hidden' name ='address' value ="<?php echo $address; ?>">;
                    <input type ='hidden' name ='startMonth' value ="<?php echo $startMonth; ?>">;
                    <input type ='hidden' name ='startDay' value ="<?php echo $startDay; ?>">;
                    <input type ='hidden' name ='startYear' value ="<?php echo $startYear; ?>">;
                    <input type ='hidden' name ='endMonth' value ="<?php echo $endMonth; ?>">;
                    <input type ='hidden' name ='endDay' value ="<?php echo $endDay; ?>">;
                    <input type ='hidden' name ='endYear' value ="<?php echo $endYear; ?>">;
                    <input type="hidden" name="location" value="<?php echo $destinationID; ?>">;
                    <input type="hiiden" name="days" value="<?php echo $numDays; ?>">;
                    <input type="hidden" name="people" value="<?php echo $numPeople; ?>">;
                    <input type="hidden" name="ticket_price" value="<?php echo $ticketPrice; ?>">;
                    <input type="hidden" name="hotel_price" value="<?php echo $hotelPrice; ?>">;
                </form>

                <button type="button" onclick="submitForm()">NEXT</button>
            </div>
        </div>
    </div>
  
    <!-- Sidebar functionality -->
    <script>
        let btn = document.querySelector('#btn')
        let sidebar = document.querySelector('.sidebar');
        btn.onclick = function(){
            sidebar.classList.toggle('active');
        };
    </script>

    <!-- Form validation -->
    <script>
        function submitForm() {
            var form = document.getElementById('appForm');
            var options = document.getElementsByName('attractionSelection');
            var isChecked = false;

            for (var i = 0; i < options.length; i++) {
                if (options[i].checked) {
                    isChecked = true;
                    break;
                }
            }

            if (!isChecked) {
                alert("Please select an option!");
            } else {
                form.submit();
            }
        }
    </script>
</body>
</html>
