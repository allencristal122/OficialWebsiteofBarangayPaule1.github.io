<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="icon" href="images/logo1.png" type="image/x-icon">
    <link rel="stylesheet" href="Contact.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
    .my-loading-button {
      color: white;
      background-color: #333;
      border-radius: 5px;
      padding: 10px 20px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .my-loading-button:hover {
      background-color: #555;
    }

    .my-confirm-button {
      color: white;
      background-color: #00ff99;
      border-radius: 5px;
      padding: 10px 20px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .my-confirm-button:hover {
      background-color: #00ff70;
    }

    .my-cancel-button {
      color: white;
      background-color: #ff3333;
      border-radius: 5px;
      padding: 10px 20px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .my-cancel-button:hover {
      background-color: #ff1a1a;
    }

    .my-warning-button {
      color: white;
      background-color: #ffb300;
      border-radius: 5px;
      padding: 10px 20px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .my-warning-button:hover {
      background-color: #ffa000;
    }

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

            .contact {
                padding: 50px 20px;
                margin-top: 130px;
            }

            .h31 {
                font-size: 24px;
                margin-top: -60px;
            }

            #cont{
                width: 50%;
            }

            .contact p {
                font-size: 16px;
                margin-top: -85px;
            }

            .contact hr {
                width: 95%;
                margin-top: -90px;
            }

            .container {
                flex-direction: column;
                margin-top: 720px;
            }
            
            .contact-info{
                width: 100%;
            }
            
            .contact-info .box{
                width: 100%;
                margin-bottom: 15px;
            }
            
            .box a h3{
                margin-left: 80px;
            }
            
            .box a p{
                margin-top: -40px;
                margin-left: -65px;
                font-size: 14px;
            }

            .form-container {
                width: 100%;
                margin: 0;
                height: 68vh;
            }

            .form-container h3 {
                font-size: 20px;
            }

            .form-group {
                flex-direction: column;
                margin-top: 20px;
            }
            
            .form-group #name{
                width: 100% !important;
            }
            .form-group #age{
                width: 100% !important;
            }
            
            #email{
                margin-top:2px;
            }
            
            #email input{
                margin-top: -1px;
            }

            .input-group {
                margin-bottom: 10px;
                width: 100%;
            }

            #textarea{
                margin-top: -20px;
            }

            #textarea label{
                margin-left: -70px;
                text-align: left;
                font-size: 14px;
            }
            
            .form-group textarea {
                width: 100%;
                margin-left: 0;
                margin-top: -2px;
            }

            .input-group label {
                font-size: 14px;
            }

            .input-group input {
                width: 200%;
            }

            .form-container button {
                margin: 20px 0;
                margin-top: -10px;
                width: 200px;
            }

            #name input{
                width: 2000px;
            }

            .contact-info {
                flex-direction: column;
                margin-top: 50px;
            }

            .box h3 {
                margin-left: 0;
            }

            .form-group label{
                text-align: left;
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
                <button class="btn btn-primary dropdown-toggle" style="--i:2" title="dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
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
            <a id="cont" href="Contact.php" id="cont" style="--i:5; color: white; background-color: #00aaff;
            padding: 12px; border-radius: 30px;">Contacts</a>
        </nav>
    </header>
    <section class="contact">
        <h3 class="h31">Contacts</h3>
        <p>Here are the contacts within the barangay</p>
        <hr>
        <div class="container">
            <div class="contact-info">
                <div class="box">
                    <?php
                    include 'connection.php';

                    $sql = "SELECT * FROM contacts where id=1";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $label  = $row["label"];
                        $contact  = $row["contacts"];
                    } else {
                        $label  = "";
                        $contact  = "";
                    }

                    $conn->close();
                   ?>
                    <a href="<?php echo $contact;?>" target="_blank">
                        <h3><i class='bi bi-telephone'></i><?php echo $label;?></h3>
                        <p><?php echo $contact;?></p>
                    </a>                    
                </div>
                <div class="box">
                    <?php
                    include 'connection.php';

                    $sql = "SELECT * FROM contacts where id=2";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $labels  = $row["label"];
                        $contacts  = $row["contacts"];
                    } else {
                        $labels  = "";
                        $contacts  = "";
                    }

                    $conn->close();
                   ?>
                    <a href="<?php echo $contacts;?>">
                        <h3><i class='bi bi-envelope'></i><?php echo $labels;?></h3>
                        <p><?php echo $contacts;?></p>
                    </a>
                </div>
                <div class="box">
                    <?php
                    include 'connection.php';

                    $sql = "SELECT * FROM contacts where id=3";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $fblabels  = $row["label"];
                        $fbcontacts  = $row["contacts"];
                    } else {
                        $fblabels  = "";
                        $fbcontacts  = "";
                    }

                    $conn->close();
                   ?>
                    <a href="<?php echo $fbcontacts;?>" target="_blank">
                        <h3><i class='bi bi-facebook'></i><?php echo $fblabels;?></h3>
                        <p><?php echo $fbcontacts;?></p>
                    </a>
                </div>
                <div class="box">
                    <a href="https://www.google.com/maps/place/Paule+1,+Rizal,+Laguna/@14.109326,121.4010232,16z/data=!3m1!4b1!4m6!3m5!1s0x33bd5a4cc34d11a3:0x15f01b4eabdbeee8!8m2!3d14.1073484!4d121.4013285!16s%2Fg%2F1tgn74f0?entry=ttu" target="_blank">
                        <h3><i class='bi bi-geo-alt'></i> Location</h3>
                        <p>Barangay Paule 1, Rizal, Laguna</p>
                    </a>
                </div>
            </div>  
            <div class="form-container">
                <form id="message-form" action="contact_insert.php" method="POST">
                    <h3>Send Message</h3>
                    <div class="form-group">
                        <div class="input-group" style="width: 48%; border-radius:8px;" id="name-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" placeholder="Name">
                        </div>
                        <div class="input-group" style="width: 48%;" id="age-group">
                            <label for="age">Age:</label>
                            <input type="number" id="age" name="age" placeholder="Age">
                        </div>
                    </div>
                    <div class="form-group" id="email-group">
                        <div class="input-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" placeholder="Email Address">
                        </div>
                    </div>
                    <div class="form-group" id="message-group">
                        <label for="message-text">Message:</label>
                        <textarea id="message-text" name="message" rows="5" placeholder="Type any message"></textarea>
                    </div>
                    <button type="submit" class="my-loading-button">
                        Send Message <i class="bi bi-envelope-fill"></i>
                    </button>
                </form>
            </div>
        </div>
    </section>
    <footer>
        <p>&copy; 2024 Barangay Paule 1. All rights reserved.</p>
    </footer>
    <script src="index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    document.getElementById('message-form').addEventListener('submit', function(event) {
        event.preventDefault(); 

        // Retrieve form input values
        var name = document.getElementById('name').value;
        var age = document.getElementById('age').value;
        var email = document.getElementById('email').value;
        var message = document.getElementById('message-text').value;

        // Check if any required field is empty
        if (!name.trim() || !age.trim() || !email.trim() || !message.trim()) {
            // Display warning animation
            Swal.fire({
                title: 'Warning!',
                text: 'Please fill all required fields before submitting.',
                icon: 'warning',
                confirmButtonText: 'OK',
                animation: true,
                customClass: {
                    confirmButton: 'my-warning-button wrong'
                }
            });
            return;
        }

        // Send AJAX request to PHP script for form submission
        var formData = new FormData();
        formData.append('name', name);
        formData.append('age', age);
        formData.append('email', email);
        formData.append('message', message);

        fetch('contact_insert.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            // Display success message
            Swal.fire({
                title: 'Success!',
                text: 'Message sent successfully!',
                icon: 'success',
                confirmButtonText: 'OK',
                animation: true,
                customClass: {
                    confirmButton: 'my-confirm-button success'
                }
            }).then(() => {
                window.location.href = 'Contact.php';
            });
        })
        .catch(error => {
            console.error('Error:', error);
            // Display error message
            Swal.fire({
                title: 'Error!',
                text: 'An error occurred while processing your request. Please try again later.',
                icon: 'error',
                confirmButtonText: 'OK',
                animation: true,
                customClass: {
                    confirmButton: 'my-confirm-button wrong'
                }
            });
        });
    });

        function toggleMenu() {
            var navigation = document.querySelector('.navigation');
            var hamburger = document.querySelector('.hamburger');

            navigation.classList.toggle('active');

            hamburger.classList.toggle('active');
        }
    </script>
</body>
</html>