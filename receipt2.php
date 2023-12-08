<!-- Notes:
Author: Sarah Simmons 
Tutorial Credit: https://www.youtube.com/watch?v=uy1tgKOnPB0
Note: Text/Icons are filler text from tutorial, not related to project  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style1.css">
    <title>Receipt</title>
</head>
<body>
    <!-- Three Main Containers - Sidebar, Top Div, User Div, List, Main  -->
    <div class="sidebar">
        <div class="top">
            <div class="logo">
                <i class = "bx bxl-codepen"> </i>
                <span>TravelMate</span>

            </div>
            <i class = "bx bx-menu" id = "btn"></i>
        </div>
        <div class="user">
            <img src="user-img.png" alt="avacado toast" class = "user-img">
            <div>
                <p class="bold"> Username </p>
                <p> Admin</p>
            </div>
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
            <h1> RECEIPT </h1>
            <div class="final">
                <p id="name"> Name: </p>
                <p id="destination"> Destination: </p>
                <p id="date"> Date: </p>
    
                <div class="hotel_info">
                    <p id="hotel_name"> Hotel: </p>
                    <p id="hotel_price"> Hotel Price: </p> 
                </div>
    
                <div class="ticket_info">
                    <p id="ticket_num"> # of tickets: </p>
                    <p id="ticket_price"> Ticket Price: </p> 
                </div>
                
                <p id="Tax"> Tax Amount: $ </p>
                <p id="Total"> Total: $ </p>
    
                <br>
            </div>
        </div>

        <div class="container">
            <img id='IMAGE' src='plane.jpg' width=100% height=100%>
        </div>
        <!-- Previous and Next buttons -->
        <a href="#" class="previous">&laquo; Previous</a>
        <a href="thanks2.html" class="next">Next &raquo;</a>
    </div>

    <script> 
        let btn = document.querySelector('#btn')
        let sidebar = document.querySelector('.sidebar');
    
        btn.onclick = function(){
            // document.write("hello"); Test is working 
            sidebar.classList.toggle('active');
        };
    </script>

<?php
        
        $fname = $_GET[''];
        $lname = $_GET['last'];
        $spec = $_GET['special'];

        echo "<div id=summary>";
        echo "<h3> Customer: </h3>" . $fname . " " . $lname . "<br>";
        echo "<h3> Special Instructions: </h3>" . $spec . "<br>";
        echo "</div><br>";

        $subTotal = 0;
        echo "<center>";
        echo "<table id='my_table'>";
        echo "<tr> <td> Item: </td> <td> Quanity: </td><td> Price: </td><td> Costs: </td>";
        // display necessary items on screen
        for ($i = 0; $i < 9; $i++) {
            $quant = $_GET["quantity$i"];
            if ($quant != 0) {
            echo "<tr>";
                $n = $menuNames[$i];
                $p = $menuPrice[$i];
                $tc = $quant * $p;
                //echo "<td> " . $n . "</td>";
                //echo "<td> " . $quant . "</td>";
                //echo "<td>  $" . $p . "</td>";
                //echo "<td> $" . $tc . "</td>";
                //echo "</tr>";
                $subTotal = $subTotal + $tc;
            }
        }
        echo "</table>";

        // calculate totals
        $subTax = $subTotal * .0625;
        $total = $subTotal + $subTax;

        //echo "<h4> Order Summary </h4>";
        //echo "Subtotal: $" . number_format($subTotal, 2) . "<br>";
        //echo "Tax: $" . number_format($subTax, 2) . "<br>";
        //echo "Total: $" . number_format($total, 2) . "<br>";

        echo "</center>";

    ?>


</body>

</html>