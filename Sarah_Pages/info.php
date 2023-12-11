<!-- Notes:
Author: Sarah Simmons 
Tutorial Credit: https://www.youtube.com/watch?v=uy1tgKOnPB0
Note: Text/Icons are filler text from tutorial, not related to project  -->

<!-- Page Specific Notes:
- Need to update Sidebar contents - Want to highlight partb of journey currently on -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="info.css">
    <title>User Information</title>
</head>
<body>

    <!-- Three Main Containers - Sidebar, Top Div, User Div, List, Main  -->
    <!-- TODO: -> Update contents, highlight current section -->
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
    
    <!-- Main Page Content  -->
    <div class="main-content">
        <!-- Contains CSS Grid -->
        <div class="container">

            <div id="navbar">
                <img src = "TravelMate_white.png">
            </div>
            <!-- Info about the user form -->
            <div id="main">
                <span class = "header"> <p> Let's start by grabbing the <span class = "bolder"> Key Info </span> We need for your trip</p> </span>
            </div>
           
            <!-- User Form -->
            <div id="user-form">
                <div id="form" style="position: relative; top:30px;">
                    <form method="post" action="destination.php" name ="info_form" id = "info_form">
                        <input style = "margin-top:30px"type="text" id="fname" placeholder = "First Name"name="fname">
                        <input type="text" id="lname" placeholder = "Last Name" name="lname"><br>
                        <input type="text" id="email" placeholder = "Email Address"name="email">
                        <input type="text" id="phone" placeholder = "Phone Number" name="phone"><br>
                         <input type="text" id="city" placeholder = "State" name="state">
                        <input type="text" id="zip" placeholder = "Zip Code" name="zip"><br>

                        <input type="text" id="address" placeholder = "City" name="city">
                        <input type="text" id="address" placeholder = "Street Address" name="address"><br>
                        <div class = "month">
                        <label for="address"> Vacation Start Date:</label>
                         <select id="month_select" name ='startMonth'form = "info_form">
                            <option value = "Month"> Month </option>
                            <option value = "1"> 1 </option>
                            <option value = "2"> 2 </option>
                            <option value = "3"> 3 </option>
                            <option value = "4"> 4 </option>
                            <option value = "5"> 5 </option>
                            <option value = "6"> 6 </option>
                            <option value = "7"> 7 </option>
                            <option value = "8"> 8 </option>
                            <option value = "9"> 9 </option>
                            <option value = "10"> 10 </option>
                            <option value = "11"> 11</option>
                            <option value = "12"> 12 </option>

                        </select>
                         <select id="day_select" name ='startDay'form = "info_form">
                            <option value = "Day"> Day </option>
                            <option value = "1"> 1 </option>
                            <option value = "2"> 2 </option>
                            <option value = "3"> 3 </option>
                            <option value = "4"> 4 </option>
                            <option value = "5"> 5 </option>
                            <option value = "6"> 6 </option>
                            <option value = "7"> 7 </option>
                            <option value = "8"> 8 </option>
                            <option value = "9"> 9 </option>
                            <option value = "10"> 10 </option>
                            <option value = "11"> 11</option>
                            <option value = "12"> 12</option>
                            <option value = "13"> 13</option>
                            <option value = "14"> 14</option>
                            <option value = "15"> 15</option>
                            <option value = "16"> 16</option>
                            <option value = "17"> 17</option>
                            <option value = "18"> 18</option>
                            <option value = "19"> 19</option>
                            <option value = "20"> 20</option>
                            <option value = "21"> 21</option>
                            <option value = "22"> 22</option>
                            <option value = "23"> 23</option>
                            <option value = "24"> 24</option>
                            <option value = "25"> 25</option>
                            <option value = "26"> 26</option>
                            <option value = "27"> 27</option>
                            <option value = "28"> 28</option>
                            <option value = "29"> 29</option>
                            <option value = "30"> 30</option>
                            <option value = "31"> 31</option>

                        </select>
                        <select id="year_select" name ='startYear'form = "info_form">
                            <option value = "Day"> Year </option>
                            <option value = "2023"> 2023 </option>
                            <option value = "2024"> 2024 </option>
                        </select> <br>
                        </div>
                        <br>

                        <!-- <input type="submit" value="Submit"> -->
                    </form>
                </div>

                <button type="button" onclick="submitForm()">Next</button>


            </div>

        </div>
    </div>

    <script> 
        let btn = document.querySelector('#btn')
        let sidebar = document.querySelector('.sidebar');
    
        btn.onclick = function(){
            sidebar.classList.toggle('active');
        };
    </script>

    <script>
  function submitForm() {
    // Get the form element
    var form = document.getElementById("info_form");

    // Submit the form
    form.submit();
  }
</script>
</body>

</html>