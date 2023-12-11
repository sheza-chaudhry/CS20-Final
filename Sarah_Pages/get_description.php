<?php
if (isset($_POST['myVariable'])) {
  $receivedVariable = $_POST['myVariable'];
  //echo "Received from JavaScript: " . $receivedVariable;

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
    $conn->select_db($db);
    // Run the query
    $sql = "SELECT * FROM Destinations WHERE id = ".$receivedVariable;
    $result = $conn->query($sql);
    // $row = $result->fetch_assoc();
    //echo $result;

    if ($result) {
    // Query executed successfully
        while ($row = $result->fetch_assoc()) {
            // Process each row
            echo "<p class = 'header'>".$row['Name'] . "</p><br>";
            echo "<p class = 'desc'>".$row['Description'] . "</p><br>";
            echo "<p class = 'lang'> <span class = 'stand-out'>Language:</span> ".$row['Language'] . "</p><br>";
            echo "<p class = 'curr'> <span class = 'stand-out'>Currency:</span> ".$row['Currency'] . "</p><br>";
            echo "<p class = 'customs'><span class = 'stand-out'>Customs:</span> ".$row['Customs'] . "</p><br>";
        }
    // $result->free(); // Free the result set
        // echo "worked";  
    } else {
    // Query failed
        echo "Error: " . $conn->error;
    }   

    // while($row = $result->fetch_assoc()){
    //     echo $row["Name"]. "<br>";
    // }

    $conn->close();





}
?>