<!DOCTYPE html> 
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <link rel="icon" href="images/logo1.png" type="image/x-icon">
    <link rel="stylesheet" href="FAQ.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
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

            #faq1{
                width: 50%;
            }

            .FAQ p{
                margin: 0 auto;
                margin-top: 50px;
            }

            .FAQ hr{
            width: 80%;
            margin: 0 auto;
            left: 0;
            right: 0;
            margin-top: 50px;
            }
            .FAQ .container{
                margin-top: 80px;
            }

            footer{
                margin-top: 190px;
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
            <a href="index.php" style="--i:1">Home</a>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Our Barangay</button>
                <div class="dropdown-content">
                  <a href="GeneralInformation.php">General Information</a>
                  <a href="History.php">History</a>
                  <a href="Maps.php">Maps</a>
                  <a href="Photos.php">Photo Album</a>
                </div>
            </div>
            <a href="Certificate.php" style="--i:3">Services</a>
            <a id="faq1" href="FAQ.php" style="--i:4;color: white; background-color: #00aaff;
            padding: 12px; border-radius: 30px;">FAQ</a>
            <a href="Contact.php" style="--i:5">Contacts</a>
        </nav> 
    </header>
    <section class="FAQ">
        <h3 class="h31">Frequently Asked Questions</h3>
        <p>Here are the FAQ within the barangay</p>
        <hr>
        <section class="container">
      <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search">
        <?php
          include 'connection.php';

          $sql = "SELECT * FROM faq";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  $id = $row["id"];
                  $question = $row["question"];
                  $answer = $row["answer"];
                  ?>
                  <div class="faq-item">
                  <div class="question"><?php echo $id . ". " . $question; ?></div>
                  <div class="answer"><?php echo $answer; ?></div>
                  </div>
                  <?php
              }
          } else {
              echo "No FAQs found";
          }

          $conn->close();
        ?>
    </section>
    </section>
    <footer> 
      <p>&copy; 2024 Barangay Paule 1. All rights reserved.</p> 
    </footer>
    <script src="index.js"></script>    
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
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