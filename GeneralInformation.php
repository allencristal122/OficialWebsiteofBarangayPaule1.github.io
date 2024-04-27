<!DOCTYPE html>
<html lang="en"> 
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>General Information</title>
    <link rel="icon" href="images/logo1.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="GeneralInformation.css">
    <style>
         @media only screen and (max-width: 768px) {
            .header {
                padding: 20px 30px;
            }

            .header .logo{
                margin-left: -40px;
                color: #000;
                width: 160%;
            }

            .header .logo h2{
                margin-left: 10px;
                margin-top: 5px;
            }

            .navigation {
                background-color: white;
                top: 0;
                display: block;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                transition: left 0.5s ease, opacity 0.5s ease; 
                backdrop-filter: blur(5px);
                color: black;
                opacity: 0; 
                position: absolute; 
                width: 60%; 
                text-align: center;
                left: 0;
                height: 900px;
                padding-top: 110px;
            }

            .navigation.active {
                opacity: 1; 
                z-index: 1; 
            }

            .navigation a {
                margin: 10px 0;
                display: block;
                margin: 0 auto;
                color: black;
                font-size: 28px;
                margin-bottom: 25px;
                transition: width 0.5s ease; 
            }

            .navigation a:hover {
                width: 50%;
            }

            .navigation button {
                margin: 10px 0;
                margin: 0 auto;
                font-size: 25px;
                margin-bottom: 20px;
            }

            .hamburger {
                margin-right: 5px;
                top: 30px;
                left: 20px;
                z-index: 101;
                cursor: pointer;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                width: 30px;
                height: 20px;
                background-color: transparent;
                border: none;
            }

            .hamburger .bar {
                width: 140%;
                height: 3px;
                background-color: #00aaff;
                transition: all 0.3s ease;
            }

            .hamburger.active .bar:nth-child(2) {
                opacity: 0; 
            }

            .hamburger.active .bar:first-child {
                transform: translateY(8px) rotate(45deg);
            }

            .hamburger.active .bar:last-child {
                transform: translateY(-8px) rotate(-45deg); 
            }

            .dropdown-content {
                margin: 0 auto;
                width: 100%;
                height: 270px;
                padding-top: 20px;
            }

            .dropdown-content a {
                color: white;
                font-size: 19px;
            }
        
            .GenInfo {
            height: 80vh;
            padding: 100px 30px;
            display: block;
            }
        
            .GenInfo .hc {
            margin: 0 auto;
            width: 100%;
            }
        
            .hc .before-line{
            margin: 0 auto;
            font-size: 20px;
            text-align: center;
            margin-right: 200px;
            display: block;
            padding-left: 0;
            }
        
            .hc .before-line:before {
            display: none;
            width: 0;
            left: 0;
            }
        
            .GenInfo .hc h1{
            font-size: 35px;
            margin: 0 auto;
            text-align: center;
            }
        
            .hc p{
            margin: 0 auto !important;
            text-align: center;
            }
        
            .GenInfo .picture {
            display: none;
            }
        
            .GenInfo .picture img {
            width: 100%;
            height: auto;
            margin: 0 auto;
        
            border: 7.5px solid white;
            }
        
            .GenInfo .button_box {
            display: flex;
            width: 80%;
            max-width: 100%;
            margin: 0 auto;
            font-size: 20px;
            background-color: #00aaff;
            color: white;
            font-weight: none;
            }
        
            .GenInfo .button_box p{
            font-weight: 400;
            margin-top: -10px
            }
        
            .introduction {
                display: block;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                padding: 50px 0;
                margin: 0 auto;
                margin-top: -20px
            }
        
            .introduction .hc1 {
            margin-top: 50px;
            }
        
            .introduction .picture1 {
            width: 100%;
            margin: 0 auto;
            margin-top: 10px;
            background-color: aqua;
            }
        
            .introduction .picture1 img {
            width: 100%;
            height: auto;
            margin: 0 auto;
            margin-left: 10px;
            }
        
            .introduction .hc1 p, h4{
            margin: 0 auto;
            text-align: justify;
            }
        
            .introduction .hc1 .before-line{
            text-align: center;
            font-size: 20px;
            }
        
            .introduction .hc1 h3{
            text-align: center;
            font-size: 36px;
            }
        
            .introduction .hc1 .before-line{
            font-size: 35px;
            font-weight: 500;
            margin-left: -80px;
            }
        
            .introduction .hc1{
            background-color: skyblue;
            width: 100%;
            margin: 0 auto;
            margin-top: 20px;
            }
        
            .introduction .hc1 h4{
            text-align: center;
            font-size: 20px;
            margin: 0 auto;
            }
        
            .misvis{
            height: 100% !important;
            padding: 100px 30px;
            margin: 0 auto;
            margin-top: 420px; 
            }
        
            .misvis .hc1{
            margin: 0 auto;
            right: 0;
            margin-top: -60px;
            }
        
            .misvis .p1{
            margin: 0 auto;
            margin-top: 20px;
            font-size: 21px;
            }
        
            .misvis hr{
            width: 75%;
            margin: 0 auto;
            margin-top: 240px;
            left: 0;
            right: 0;
            }
        
            .misvis .hc3{
            margin: 0 auto;
            margin-top: 50px;
            }
        
            .misvis .p2{
            margin: 0 auto;
            margin-top: 20px;
            font-size: 21px;
            }
        
            .population{
            padding: 100px 30px;
            margin: 0 auto;
            margin-top: -30px
            }
        
            .population .hc1{
            margin: 0 auto;
            }
        
            .population .p2{
            margin: 0 auto !important;
            left: 0 !important;
            width: 80%;
            }
        
            .population hr{
            width: 75%;
            margin: 0 auto;
            left: 0;
            right: 0;
            margin-top: 20px;
            }
        
            .population .hc3{
            margin: 0 auto;
            }
        
            .population .container{
            display: block;
            margin: 0 auto;
            margin-top: -15px;
            background-color: #F4B400;
            }
        
            .population .container table{
            margin: 0 auto;
            margin-bottom: 20px;
            border: 1px solid black;
            }
        
            .economy{
            padding: 100px 30px;
            margin: 0 auto;
            margin-top: 1260px;
            margin-bottom: 30px;
            height: 60vh
            }
        
            .economy .p2{
            margin: 0 auto !important;
            left: 0 !important;
            width: 80%;
            right: 0;
            }
        
            .economy hr{
            width: 75%;
            margin: 0 auto;
            left: 0;
            right: 0;
            margin-top: 20px
            }

            .eco4 {
                overflow-x: auto;
                max-width: 100%;
            }
        
            .eco4 table {
                width: auto;
                min-width: 100%;
                margin-top: 20px
            }

            .eco4 table tr th{
                font-size: 22px;
            }

            .eco4 table tr th i{
                font-size: 50px;
            }
        
            .eco4 table tr td{
                font-size: 18px;
            }
        
            footer{
                margin-top: -1000px;
                font-size: 18px;
            }
        }
    </style>
</head> 
<body>
    <header class="header"> 
        <a href="#" class="logo"> 
            <img src="images/logo1.png" alt="Error Image" height="60px" width="60px"/>
            <h2>Barangay Paule 1</h2> 
        </a>
        <button class="hamburger" onclick="toggleMenu()"> 
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </button>
        <nav class="navigation">
            <a href="index.php" style="--i:1">Home</a>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="--i:2">
                    Our Barangay</button>
                <div class="dropdown-content">
                  <a href="GeneralInformation.php" style="background-color: #F4B400; color: #000; padding: 12px; border-radius: 30px;">General Information</a>
                  <a href="History.php">History</a>
                  <a href="Maps.php">Maps</a>
                  <a href="Photos.php">Photo Album</a>
                </div>
            </div>
            <a href="Certificate.php" style="--i:3">Services</a>
            <a href="FAQ.php" style="--i:4">FAQ</a>
            <a href="Contact.php" style="--i:5">Contacts</a>
        </nav> 
    </header> 
    <section id="GenInfo" class="GenInfo"> 
        <div class="hc">
            <p class="before-line">Access and Introduction to</p><br> 
            <h1>General Information of<br>Barangay Paule 1</h1>
            <br>
            <br>
            <p>
                Welcome to the comprehensive repository of information about Barangay Paule 1.
                We're delighted to provide you with valuable insights and details regarding Barangay Paule 1.
            </p><br><br>
            <a href="#misvis" class="button_box"><p>Mission & Vision</p><i class="bi bi-arrow-right"></i></a>
        </div> 
        <div class="picture">
            <img src="images/logo1.png" alt="Your Picture"> 
        </div> 
    </section>
    <section id="introduction" class="introduction">
        <div class="picture1"> 
            <img src="images/download.jpg" alt="Your Picture"> 
        </div> 
        <div class="hc1"> 
            <?php
                include 'connection.php';
        
                $sql = "SELECT * FROM introduction";
                $result = $conn->query($sql);
        
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $context  = $row["paragraph"];
                } else {
                    $context  = "";
                }
        
                $conn->close();
            ?>
            <h3>Introduction</h3><br>
            <p><?php echo $context; ?></p>
        </div>
    </section>
    <section id="misvis" class="misvis" style="height: 95vh;">
        <?php
            include 'connection.php';
        
            $sql = "SELECT * FROM vision";
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $paragraph  = $row["paragraph"];
            } else {
                $paragraph  = "";
            }
        
            $conn->close();
        ?>
        <h3 class="hc1">Vision</h3>
        <p class="p1"><?php echo $paragraph; ?></p>
        <hr style="top:280px;">
        <?php
            include 'connection.php';
        
            $sql = "SELECT * FROM mission";
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $mission  = $row["paragraph"];
            } else {
                $mission  = "";
            }
        
            $conn->close();
        ?>
        <h3 class="hc3">Mission</h3>
        <p class="p2"><?php echo $mission; ?></p>
      </section>
      <section id="population" class="population">
        <h3>Population</h3>
        <p class="p2" style="margin: 0 auto; left: 0; right: 0;">Here is the population of Barangay Paule 1.</p>
        <hr>
        <p class="p1">The population of Rizal, Laguna, reflects a dynamic blend of cultural diversity and 
            historical heritage. With a population steadily growing over the years, Rizal contributes 
            significantly to the demographic landscape of Laguna province. Residents of Rizal encompass a 
            wide spectrum of backgrounds, occupations, and age groups, fostering a vibrant and inclusive 
            community atmosphere. As a hub for commerce, agriculture, and tourism, Rizal's population is 
            not only diverse but also economically active and socially engaged. With its strategic 
            location and burgeoning opportunities, Rizal continues to attract new residents seeking a 
            balanced lifestyle amidst the scenic beauty of Laguna.
        </p><br>
        <div class="container">
            <table>
                <thead>
                    <tr>
                        <th>No. of Population</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include 'connection.php';
                    
                        $sql = "SELECT * FROM population";
                        $result = $conn->query($sql);
                    
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $number_of_population  = $row["number_of_population"];
                        } else {
                            $number_of_population  = "";
                        }
                    
                        $conn->close();
                    ?>
                    <tr class="tr1">
                        <td><?php echo $number_of_population; ?></td>
                    </tr>
                    <tr class="tr2">
                        <td>Population (<a>PhilAtlas Survey as of 2020</a>)</td>
                    </tr>
                </tbody>
            </table>
            <table>
                <thead>
                    <tr>
                        <th>Average Household Size</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include 'connection.php';
                    
                        $sql = "SELECT * FROM population";
                        $result = $conn->query($sql);
                    
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $average_household_size  = $row["average_household_size"];
                        } else {
                            $average_household_size  = "";
                        }
                    
                        $conn->close();
                    ?>
                    <tr class="tr1">
                        <td><?php echo $average_household_size; ?></td>
                    </tr>
                    <tr class="tr2">
                        <td>per Households</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>    
    <section id="economy" class="economy" style="height: 120vh; top:30px;">
        <h3>Economy</h3>
        <p class="p2">Here is the economy status of Barangay Paule 1.</p>
        <hr>
        <div class="eco4">
            <table class="table table-bordered border-0">
                <tr>
                    <th scope="col" class="text-center">
                        <div class="icon-circle"><i class="bi bi-basket"></i></div>
                        <br>Predominant Economic Activities
                      </th>
                      <th scope="col" class="text-center">
                        <div class="icon-circle"><i class="bi bi-building"></i></div>
                        <br>Major Business Establishments
                      </th>
                      <th scope="col" class="text-center">
                        <div class="icon-circle"><i class="bi bi-wallet2"></i></div>
                        <br>Major Source of Household Income
                    </th>
                </tr>
                <tr>
                <?php
                    include 'connection.php';

                    $sql = "SELECT * FROM economics";
                    $result = $conn->query($sql);

                    $all_messages = '';

                    if ($result->num_rows > 0) {
                        $all_messages .= '<ul>';

                        $first = true;
                        while ($row = $result->fetch_assoc()) {
                            if ($first) {
                                $all_messages .= '<li>' . $row["message"] . '</li>';
                                $first = false;
                            } else {
                                $all_messages .= '<li>' . $row["message"] . '</li>';
                            }
                        }

                        $all_messages .= '</ul>';
                    } else {
                        $all_messages = "No messages found.";
                    }

                    $conn->close();
                ?>
                <td>
                    <?php echo $all_messages; ?>
                </td>
                <?php
                    include 'connection.php';

                    $sql = "SELECT * FROM major_business";
                    $result = $conn->query($sql);

                    $all_business = '';

                    if ($result->num_rows > 0) {
                        $all_business .= '<ul>';

                        $first = true;
                        while ($row = $result->fetch_assoc()) {
                            if ($first) {
                                $all_business .= '<li>' . $row["business_text"] . '</li>';
                                $first = false;
                            } else {
                                $all_business .= '<li>' . $row["business_text"] . '</li>';
                            }
                        }

                        $all_business .= '</ul>';
                    } else {
                        $all_business = "No messages found.";
                    }

                    $conn->close();
                ?>
                <td>
                    <?php echo $all_business; ?>
                </td>
                <?php
                    include 'connection.php';

                    $sql = "SELECT * FROM major_income";
                    $result = $conn->query($sql);

                    $all_income = '';

                    if ($result->num_rows > 0) {
                        $all_income .= '<ul>';

                        $first = true;
                        while ($row = $result->fetch_assoc()) {
                            if ($first) {
                                $all_income .= '<li>' . $row["income_text"] . '</li>';
                                $first = false;
                            } else {
                                $all_income .= '<li>' . $row["income_text"] . '</li>';
                            }
                        }

                        $all_income .= '</ul>';
                    } else {
                        $all_income = "No messages found.";
                    }

                    $conn->close();
                ?>
                <td>
                    <?php echo $all_income; ?>
                </td>
                </tr>
                </tr>
              </table>
        </div>
    </section>
    <footer style="margin-top: 70px;"> 
        <p>&copy; 2024 Barangay Paule 1. All rights reserved.</p> 
    </footer>
    <script src="index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleMenu() {
            var navigation = document.querySelector('.navigation');
            var hamburger = document.querySelector('.hamburger');

            navigation.classList.toggle('active');

            hamburger.classList.toggle('active');
        }
    </script>
</body> 
</html> 