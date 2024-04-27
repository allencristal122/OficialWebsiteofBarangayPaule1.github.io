<!DOCTYPE html> 
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photos</title>
    <link rel="icon" href="images/logo1.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Photos.css">
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
                z-index: -1; 
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
            
        .photos {
            height: auto;
            padding: 100px 30px;
            margin: 0 auto;
            margin-top: 140px;
            margin-bottom: 60px;
        }

        .photos h3{
            margin: 0 auto;
            margin-top: -30px;
        }

        .photos .p1{
            margin: 0 auto;
            text-align: center;
            margin-top: -20px;
            left: 0;
            right: 0;
            width: 90%;
            font-size: 17px;
        }

        .photos hr{
            width: 75%;
            margin: 0 auto;
            margin-top: -20px;
        }

        .photos .gallery {
            flex-direction: column;
            margin: 0 auto;
            margin-top: 1000px;
        }

        .gallery .container{
            margin: 0 auto;
            margin-top: 1000px;
        }

        .gallery .card {
            width: 100%;
            max-width: 300px;
            margin: 0px auto;
            margin-bottom: 30px;
        }

        footer {
            margin-top: 20px;
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
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Our Barangay</button>
                <div class="dropdown-content">
                  <a href="GeneralInformation.php">General Information</a>
                  <a href="History.php">History</a>
                  <a href="Maps.php">Maps</a>
                  <a href="Photos.php" style="background-color: #F4B400; color: #000; padding: 12px; border-radius: 30px;">Photo Album</a>
                </div>
            </div>
            <a href="Certificate.php" style="--i:3">Services</a>
            <a href="FAQ.php" style="--i:4">FAQ</a>
            <a href="Contact.php" style="--i:5">Contacts</a>
        </nav> 
    </header> 
    <section id="photos" class="photos">
        <h3>Photo Albums</h3> 
        <p class="p1">Here are the photos of barangay.</p>
        <hr>
        <section class="gallery" style="margin-top: -960px;">
            <div class="container">
              <div class="row">
                <?php
                  include 'connection.php';

                  $sql = "SELECT * FROM activity"; 
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                      $count = 0; 
                      while ($row = $result->fetch_assoc()) {
                          $photo  = $row["photos"];
                          $date  = $row["date"];
                          $activity  = $row["activity"];
                          ?>
                          <?php if ($count % 3 == 0 && $count != 0) { ?>
                              </div><div class="row">
                          <?php } ?>
                          <div class="col-md-4 gallery-column">
                              <div class="card">
                                  <img src="activity_photos/<?php echo $photo; ?>" class="card-img-top" alt="Photo">
                                  <div class="card-body">
                                      <h5 class="card-title"><?php echo $activity; ?></h5>
                                      <p class="card-text"><?php echo $date; ?></p>
                                  </div>
                              </div>
                          </div>
                          <?php
                          $count++;
                      }
                  } else {
                      echo "No activity found";
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