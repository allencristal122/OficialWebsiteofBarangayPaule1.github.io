<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Official Website of Barangay Paule 1</title>
    <link rel="icon" href="images/logo1.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
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
                margin-left: 320px;
                top: 45px;
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
                position: fixed;
            }

            .hamburger .bar {
                width: 100%;
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

            .before-line:before {
                display: none;
                width: 0;
                left: 0;
            }

            #index{
                width: 50%;
            }

            .home {
                height: auto;
                padding: 100px 30px;
                display: block;
            }

            .home .hc {
                margin: 0 auto;
                margin-top: 50px;
                width: 100%;
            }

            .home .hc .before-line{
                margin: 0 auto;
                font-size: 20px;
                text-align: center;
                margin-right: 200px;
                display: block;
                padding-left: 0;
            }

            .home .hc h1{
                font-size: 35px;
                margin: 0 auto;
                text-align: center;
            }

            .hc p{
                margin: 0 auto !important;
                text-align: center;
            }

            .home .picture {
                width: 100%;
                max-width: 100%;
                margin: 0 auto;
                margin-top: 30px;
            }

            .home .picture img {
                width: 100%;
                height: auto;
                z-index: 500;
            }

            .home .button_box {
                width: 70%;
                max-width: 100%;
                margin: 0 auto;
                margin-top: 30px;
                font-size: 20px;
            }

            .home .picture {
                margin-top: 50px;
            }

            .about {
                display: block;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                padding: 50px 0;
                margin: 0 auto;
            }

            .about .hc1 {
                margin-top: 50px;
            }

            .about .picture1 {
                width: 100%;
                margin: 0 auto;
                margin-top: 10px;
                background-color: aqua;
            }

            .about .picture1 img {
                width: 100%;
                height: auto;
                margin: 0 auto;
                margin-left: 10px;
            }

            .about .hc1 p, h2, h4{
                margin: 0 auto;
                text-align: center;
            }

            .about .hc1 .before-line{
                text-align: center;
                font-size: 20px;
            }

            .about .hc1 h2{
                text-align: center;
                font-size: 20px;
            }

            .about .hc1 .before-line{
                font-size: 35px;
                font-weight: 500;
                padding-left: 0;
            }

            .about .hc1{
                background-color: skyblue;
                width: 100%;
                margin: 0 auto;
                margin-top: 20px;
            }

            .about .hc1 h4{
                text-align: justify;
                font-size: 20px;
                margin: 0 auto;
            }

            .statistics {
                height: auto;
                padding: 100px 30px;
                margin-top: -70px;        
            }

            .statistics h3{
                margin-top: -30px;
                margin-bottom: 20px;
            }

            .statistics .p1{
                margin-top: 20px !important;
                font-size: 17px;
            }

            .statistics hr{
                width: 75%;
                margin: 0 auto;
                margin-top: 10px;
            }

            .statistics .container {
                flex-direction: column;
            }

            .statistics .card {
                width: 100%;
                max-width: 300px;
                margin: 20px auto;
            }

            .officials {
                height: auto;
                padding: 100px 30px;
                margin: 0 auto;
                margin-top: 20px;
            }

            .officials h3{
                margin: 0 auto;
                margin-top: -30px;
            }

            .officials .p1{
                margin: 0 auto;
                text-align: center;
                margin-top: 10px;
                left: 0;
                right: 0;
                width: 90%;
                font-size: 17px;
            }

            .officials hr{
                width: 75%;
                margin: 0 auto;
                margin-top: 25px;
            }

            .officials .gallery {
                flex-direction: column;
                margin: 0 auto;
                margin-top: 600px;
            }

            .gallery .container{
                margin: 0 auto;
                margin-top: 550px;
            }

            .gallery .card {
                width: 100%;
                max-width: 300px;
                margin: 0px auto;
                margin-bottom: 30px;
            }

            .navigation.active {
                left: 0;
            }

            footer{
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
        <button class="hamburger" title="hamburger" onclick="toggleMenu()"> 
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </button>
        <nav class="navigation">
            <a id="index" href="index.php" style="--i:1; color: white; background-color: #00aaff;
            padding: 12px; border-radius: 30px;">Home</a>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" title="dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Our Barangay</button>
                <div class="dropdown-content">
                  <a href="GeneralInformation.php">General Information</a>
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
    <section id="home" class="home"> 
        <div class="hc"> 
            <p class="before-line">Welcome and Discover</p><br> 
            <h1>Barangay Paule of <br>Rizal, Laguna</h1> 
            <br>
            <br>
            <p>
                Located in the vibrant city of Rizal, Laguna, our barangay invites you 
                to join us in embracing progress and unity as we move forward together towards 
                a brighter future.
            </p><br><br>
            <a href="GeneralInformation.html" class="button_box"><p>Learn More</p><i class="bi bi-arrow-right"></i></a> 
        </div> 
        <div class="picture"> 
            <img src="images/logo1.png" alt="Your Picture"> 
        </div> 
    </section> 
    <section id="about" class="about">
        <div class="picture1"> 
            <img src="images/download.jpg" alt="Your Picture"> 
        </div> 
        <div class="hc1"> 
            <p class="before-line">About Us</p> 
            <h2>By reshaping our city, we transform the world.</h2><br>
            <h4>Barangay Paule 1 is committed to overcoming every obstacle on its path to excellence.</h4>
        </div> 
    </section>
    <section id="statistics" class="statistics">
        <h3>Foundational Statistics</h3>
        <p class=".p1">Statistics in Barangay Paule 1.</p>
        <hr>
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <i class="bi bi-calendar icon"></i>
                      <div class="text-right">
                        <?php
                            include 'connection.php';
        
                            $sql = "SELECT * FROM statistics";
                            $result = $conn->query($sql);
        
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $foundingyears  = $row["founding_years"];
                            } else {
                                $foundingyears  = "";
                            }
        
                            $conn->close();
                        ?>
                        <p class="value"><?php echo $foundingyears; ?></p>
                        <h5 class="label">Foundating Years</h5>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <i class="bi bi-geo-alt icon"></i>
                      <div class="text-right">
                        <?php
                            include 'connection.php';
        
                            $sql = "SELECT * FROM statistics";
                            $result = $conn->query($sql);
        
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $environmental_health_status  = $row["environmental_health_status"];
                            } else {
                                $environmental_health_status  = "";
                            }
        
                            $conn->close();
                        ?>
                        <p class="value"><?php echo $environmental_health_status . '%'; ?></p>
                        <h5 class="label"> Environmental Health Status</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <i class="bi bi-people icon"></i>
                      <div class="text-right">
                        <?php
                            include 'connection.php';
        
                            $sql = "SELECT * FROM statistics";
                            $result = $conn->query($sql);
        
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $partnerships_organization  = $row["partnerships_organization"];
                            } else {
                                $partnerships_organization  = "";
                            }
        
                            $conn->close();
                        ?>
                        <p class="value"><?php echo $partnerships_organization; ?></p>
                        <h5 class="label">Partnerships Organization</h5>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <i class="bi bi-list-task icon"></i>
                      <div class="text-right">
                          <?php
                            include 'connection.php';
        
                            $sql = "SELECT * FROM statistics";
                            $result = $conn->query($sql);
        
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $projects_made  = $row["projects_made"];
                            } else {
                                $projects_made  = "";
                            }
        
                            $conn->close();
                        ?>
                        <p class="value"><?php echo $projects_made; ?></p>
                        <h5 class="label">Projects Made</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    <section id="officials" class="officials">
        <h3>Meet Our Barangay Officials</h3>
        <p class="p1">Here are the barangay captain and councilors of barangay.</p>
        <hr>
        <section class="gallery" style="margin-top: -490px;">
          <div class="container">
            <div class="row">
                <?php
                  include 'connection.php';

                  $sql = "SELECT * FROM barangay_officials LIMIT 1"; 
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                      $row = $result->fetch_assoc();
                      $photo  = $row["photo"];
                      $fullName  = $row["fullName"];
                      $position  = $row["position"];
                  } else {
                      $photo  = "";
                      $fullName  = "";
                      $position  = "";
                  }
                ?>
                <div class="col-md-12 d-flex justify-content-center">
                    <div class="card">
                        <img src="photos/<?php echo $photo; ?>" class="card-img-top" alt="Photo">
                        <div class="card-body">
                          <h5 class="card-title"><?php echo $fullName; ?></h5>
                          <p class="card-text"><?php echo $position; ?></p>
                        </div>
                    </div>
                </div>
              </div>
              <div class="row">
                <?php
                  include 'connection.php';

                  $sql = "SELECT * FROM barangay_officials LIMIT 1, 12"; 
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                      $count = 0; 
                      while ($row = $result->fetch_assoc()) {
                          $photo  = $row["photo"];
                          $fullName  = $row["fullName"];
                          $position  = $row["position"];
                          ?>
                          <?php if ($count % 3 == 0 && $count != 0) { ?>
                              </div><div class="row"> 
                          <?php } ?>
                          <div class="col-md-4 gallery-column">
                              <div class="card">
                                  <img src="photos/<?php echo $photo; ?>" class="card-img-top" alt="Photo">
                                  <div class="card-body">
                                      <h5 class="card-title"><?php echo $fullName; ?></h5>
                                      <p class="card-text"><?php echo $position; ?></p>
                                  </div>
                              </div>
                          </div>
                          <?php
                          $count++;
                      }
                  } else {
                      echo "No officials found";
                  }
                  $conn->close();
                ?>
              </div>
            </div>
          </section>
    </section>
    <footer> 
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