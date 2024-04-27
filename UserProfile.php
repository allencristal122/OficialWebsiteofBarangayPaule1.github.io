<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>
  <link rel="icon" href="images/logo1.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="UserProfile.css">
</head>
<body>
    <div>
        <div class="header">
          <i class="fas fa-bars hamburger" onclick="toggleNavigation()"></i>
          <div class="profile-icon" onclick="toggleProfileDetails()">
              <i class="fas fa-user"></i>
              <div class="profile-details-container" id="profileDetailsContainer">
                  <div class="profile">
                    <img src="images/brgyhall.jpg" alt="Barangay Hall of Paule 1" width="80px" height="80px">
                    <div class="adminname">
                      <p class="p1">Vince Allen Cristal</p>
                      <p class="p2">Admin</p>
                    </div>
                  </div>
                  <hr>
                  <a href="UserProfile.php"><i class="bi bi-person"></i> Profile</a>
                  <a href="ForgotPassword.php"><i class="bi bi-key"></i> Reset Password</a>
                  <hr>
                  <a href="Login.php"><i class="bi bi-box-arrow-right"></i> Log Out</a>
              </div>
          </div>
        </div>
        <div class="navigation" id="navigation">
          <div class="logo">
            <img src="images/logo1.png" alt="Barangay Logo" height="40px" width="40px">
            <p>Barangay Records</p>
          </div>
          <div class="administrators">
            <p><em> Administrator</em></p>
          </div>
          <a href="Admin.php" class="a1" id="dashb"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
          <a href="Barangay.php" class="a1"><i class="fas fa-users"></i> Barangay Officials</a>
          <a href="Blotter.php" class="a1"><i class="fas fa-book"></i> Blotter</a>
          <a href="Resident.php" class="a1"><i class="fas fa-users"></i> Residents</a>
          <a href="Users.php" class="a1"><i class="fas fa-users-cog"></i> Users</a>
          <a href="Document.php" class="a1"><i class="far fa-file-alt"></i> Document Request</a>
          <a href="Activity.php" class="a1"><i class="bi bi-activity"></i> Activity</a>
          <div class="dropdown" onclick="toggleDropdown()">
            <button class="btn btn-primary plus-toggle" type="button" id="dropdownMenuButton" >
              <i class="fas fa-cog"></i>Page <i class="bi bi-plus"></i>
            </button>
            <div class="dropdown-content" id="dropdownContent">
              <a href="Information.php"><i class="fas fa-chevron-right"></i>Information</a>
              <a href="Forms.php"><i class="fas fa-chevron-right"></i>Forms</a>
              <a href="FAQ1.php"><i class="fas fa-chevron-right"></i>FAQ</a>
              <a href="Contact1.php" class="contact1"><i class="fas fa-chevron-right"></i>Contact</a>
            </div>
          </div>
          <a href="Login.php" class="a1"><i class="fas fa-sign-out-alt"></i> Log Out</a>
        </div>
      </div>
      
      <div class="title-with-icon" style="z-index: 500;">
        <a href="Admin.php" title="Dashboard"><i class="bi bi-house"></i></a>
        <p>User Profile</p>
      </div>

      <div class="dashboard-box-container1">
        <div class="dashboard-box1" id="db1">
          <div class="div">
          <?php
                    include 'connection.php';
            
                    $sql = "SELECT * FROM proof_of_identity where id=5";
                    $result = $conn->query($sql);
            
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $profilepicture = $row["picture"];
                    } else {
                        $profilepicture = "";
                    }
            
                    $conn->close();
                ?>
            <div class="img">
            <img src="<?php echo $profilepicture; ?>">
          </div>
          </div>
          <div class="info">
            <form class="form1">
                <?php
                    include 'connection.php';
            
                    $sql = "SELECT * FROM ProfileData";
                    $result = $conn->query($sql);
            
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $profilefirstname = $row["firstname"];
                        $profilemiddlename = $row["middlename"];
                        $profilelastname = $row["lastname"];
                        $profilebirthdate = $row["birthdate"];
                        $profileemail = $row["email"];
                        $profilecontact  = $row["contact"];
                    } else {
                        $profilefirstname = "";
                        $profilemiddlename = "";
                        $profilelastname = "";
                        $profilebirthdate = "";
                        $profileemail  = "";
                        $profilecontact  = "";
                    }
                    
                    $sql = "SELECT * FROM ImportantInfo";
                    $result = $conn->query($sql);
            
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $profileaddress = $row["address"];
                        $profilebarangay = $row["barangay"];
                        $profilecity = $row["city"];
                        $profileprovince = $row["province"];
                    } else {
                        $profileaddress = "";
                        $profilebarangay = "";
                        $profilecity = "";
                        $profileprovince = "";
                    }
            
                    $conn->close();
                ?>
              <div class="form-group1">
                  <div class="input-group">
                      <input type="text" id="name" name="name" placeholder="First Name" value="<?php echo $profilefirstname . ' ' . $profilemiddlename . ' ' . $profilelastname; ?>">
                  </div>
              </div>
              <div class="form-group1">
                <div class="input-group">
                    <i class="bi bi-calendar-fill"></i>
                    <input type="date" id="birthdate" name="birthdate" value="<?php echo $profilebirthdate; ?>" readonly>
                </div>
            </div>
            <div class="form-group1">
                <div class="input-group">
                    <i class="bi bi-envelope-fill"></i>
                    <input type="email" id="email" name="email" placeholder="Email Address" value="<?php echo $profileemail; ?>" readonly>
                </div>
            </div>
            <div class="form-group1">
                <div class="input-group">
                    <i class="bi bi-telephone-fill"></i>
                    <input type="tel" id="contact" name="contact" placeholder="Contact Number" value="<?php echo $profilecontact; ?>" readonly>
                </div>
            </div>
            <div class="form-group1">
                <div class="input-group">
                    <i class="bi bi-house-fill"></i>
                    <input type="text" id="address" name="address" placeholder="Address" value="<?php echo '#'. $profileaddress . ' ' . $profilebarangay . ', ' . $profilecity . ', ' . $profileprovince; ?>" readonly>
                </div>
            </div>
  </div>
        </div>
      </div>
      <div class="dashboard-box-container2">
        <div class="dashboard-box2">
          <div class="basic"><p>Basic Details</p></div>
          <div class="personaldata1">
            <i class="bi bi-person-fill"></i>
            <p>Personal Data</p><hr>
          </div>          
            <form class="form2" action="update_password.php" method="post">
                <?php
                    include 'connection.php';

                    $sql = "SELECT * FROM ProfileData";
                    $result = $conn->query($sql);
            
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $profilefirstname = $row["firstname"];
                        $profilemiddlename = $row["middlename"];
                        $profilelastname = $row["lastname"];
                        $profilebirthdate = $row["birthdate"];
                        $profileemail = $row["email"];
                        $profilecontact  = $row["contact"];
                        $profilegender = $row["gender"];
                        $profilereligion = $row["religion"];
                        $profilestatus  = $row["status"];
                    } else {
                        $profilefirstname = "";
                        $profilemiddlename = "";
                        $profilelastname = "";
                        $profilebirthdate = "";
                        $profileemail  = "";
                        $profilecontact  = "";
                        $profilegender = "";
                        $profilereligion  = "";
                        $profilestatus  = "";
                    }
                    
            
                    $conn->close();
                ?>
            <div class="form-group2">
                <div class="input-group">
                  <label for="gender">First Name</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" value="<?php echo $profilefirstname; ?>">
                  </div>
                </div>
                <div class="input-group">
                  <label for="gender">Middle Name</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Middle Name" value="<?php echo $profilemiddlename; ?>">
                  </div>
                </div>
                <div class="input-group">
                  <label for="gender">Last Name</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" value="<?php echo $profilelastname; ?>">
                  </div>
                </div>
                <div class="input-group">
                  <label for="gender">Birth Date</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                    <input type="text" class="form-control" id="birthdate" name="birthdate" placeholder="Birth Date" value="<?php echo $profilebirthdate; ?>">
                  </div>
                </div>
                <div class="input-group">
                  <label for="gender">Email</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $profileemail; ?>">
                  </div>
                </div>
                <div class="input-group">
                  <label for="gender">Contact</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="contact1" name="contact1" placeholder="Contact" value="<?php echo $profilecontact; ?>">
                  </div>
                </div>
                <div class="input-group">
                    <label for="gender">Gender</label>
                    <div class="input-group">
                      <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                      <input type="text" class="form-control" id="gender" name="gender" placeholder="Gender" value="<?php echo $profilegender; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group2">
                <div class="input-group">
                    <label for="religion">Religion</label>
                    <div class="input-group">
                      <span class="input-group-text"><i class="bi bi-star"></i></span>
                      <input type="text" class="form-control" id="religion" name="religion" placeholder="Religion" value="<?php echo $profilereligion; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group2">
              <div class="input-group">
                  <label for="status">Status</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-info-circle"></i></span>
                    <input type="text" class="form-control"  id="status" name="status" placeholder="Status" value="<?php echo $profilestatus; ?>">
                  </div>
              </div>
            </div>       
          </form>
          <div id="otherinfo">
            <i class="bi bi-info-circle-fill"></i>
            <p>Other Information</p>
            <hr>
          </div>
          <form class="form3" action="update_password.php" method="post">
              <?php
                    include 'connection.php';
                    
                    $sql = "SELECT * FROM ProfileData";
                    $result = $conn->query($sql);
            
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $profileemergency_person = $row["emergency_person"];
                        $profileemergency_contact = $row["emergency_contact"];
                    } else {
                        $profileemergency_person = "";
                        $profileemergency_contact = "";
                    }
                    
                    $sql = "SELECT * FROM ImportantInfo";
                    $result = $conn->query($sql);
            
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $profileoccupation = $row["occupation"];
                        $profilemonthly_income = $row["monthly_income"];
                        $profileallergies_conditions = $row["allergies_conditions"];
                        $profileeducation = $row["education"];
                    } else {
                        $profileoccupation = "";
                        $profilemonthly_income = "";
                        $profileallergies_conditions = $row["allergies_conditions"];
                        $profileeducation = "";
                    }
            
                    $conn->close();
                ?>
            <div class="form-group3">
              <div class="input-group">
                <label for="occupation">Occupation</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-briefcase"></i></span>
                  <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Occupation" value="<?php echo $profileoccupation; ?>">
                </div>
              </div>
            </div>
          <div class="form-group3">
              <div class="input-group">
                  <label for="monthly_income">Monthly Income</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-cash"></i></span>
                    <input type="text" class="form-control" id="monthly_income" placeholder="Monthly Income" value="<?php echo $profilemonthly_income; ?>">
                  </div>
              </div>
          </div>
          <div class="form-group3">
              <div class="input-group">
                  <label for="allergies_conditions">Allergies or Medical Conditions</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-file-medical"></i></span>
                    <input type="text" class="form-control" id="allergies_conditions" placeholder="Allergies or Medical Conditions" value="<?php echo $profileallergies_conditions; ?>">
                  </div>
              </div>
          </div>
          <div class="form-group3">
              <div class="input-group">
                  <label for="education">Educational Attainment</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-book"></i></span>
                    <input type="text" class="form-control" id="education" placeholder="Education Attainment" value="<?php echo $profileeducation; ?>">
                  </div>
              </div>
          </div>
          <div class="form-group3">
            <div class="input-group">
                <label for="name">Emergency Contact Person</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-person"></i></span>
                  <input type="text" class="form-control"  id="name1" name="name" placeholder="Emergency Contact Person" value="<?php echo $profileemergency_person; ?>">
                </div> 
            </div>
        </div>
        <div class="form-group3">
            <div class="input-group">
                <label for="contact">Emergency Contact</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                  <input type="text" class="form-control"  id="contact" name="contact" placeholder="Contact Number" value="<?php echo $profileemergency_contact; ?>">
                </div>
            </div>
        </div> 
          </form>
          <button type="button" class="btn btn-primary" onclick="updateProfile()">Update</button>
        </div>
      </div>
      <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Your Website Name. All rights reserved.</p>
        </div>
      </footer>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-euKpLsYQJz5jE0EEOxnTPI1a2ybp4QA9QfsB1LD73pI95/02djN3eVkD5bZlNumj" crossorigin="anonymous"></script>
      <script src="Admin.js"></script>
      <script>
    function updateProfile() {
        // Get updated profile data
        var firstname = document.getElementById('firstname').value;
        var middlename = document.getElementById('middlename').value;
        var lastname = document.getElementById('lastname').value;
        var birthdate = document.getElementById('birthdate').value;
        var email = document.getElementById('email').value;
        var contact = document.getElementById('contact1').value;
        var gender = document.getElementById('gender').value;
        var religion = document.getElementById('religion').value;
        var status = document.getElementById('status').value;
        var occupation = document.getElementById('occupation').value;
        var monthly_income = document.getElementById('monthly_income').value;
        var allergies_conditions = document.getElementById('allergies_conditions').value;
        var education = document.getElementById('education').value;
        var emergency_person = document.getElementById('name1').value;
        var emergency_contact = document.getElementById('contact').value;
        var address = document.getElementById('address').value;
        var barangay = document.getElementById('barangay').value;
        var city = document.getElementById('city').value;
        var province = document.getElementById('province').value;

        // Send AJAX request to update profile
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update_profile.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Handle response
                var response = xhr.responseText;
                if (response === "success") {
                    // Display success message or redirect to another page
                    alert("Profile updated successfully!");
                    // You can redirect to another page here if needed
                    window.location.href = "UserProfile.php"; // Redirect to the profile page
                } else if (response === "error") {
                    // Display error message
                    alert("Error updating profile. Please try again.");
                } else if (response === "nochange") {
                    // If no fields are updated
                    alert("No changes were made.");
                }
            }
        };
        xhr.send("firstname=" + encodeURIComponent(firstname) + "&middlename=" + encodeURIComponent(middlename) +
            "&lastname=" + encodeURIComponent(lastname) + "&birthdate=" + encodeURIComponent(birthdate) +
            "&email=" + encodeURIComponent(email) + "&contact=" + encodeURIComponent(contact) +
            "&gender=" + encodeURIComponent(gender) + "&religion=" + encodeURIComponent(religion) +
            "&status=" + encodeURIComponent(status) + "&occupation=" + encodeURIComponent(occupation) +
            "&monthly_income=" + encodeURIComponent(monthly_income) +
            "&allergies_conditions=" + encodeURIComponent(allergies_conditions) +
            "&education=" + encodeURIComponent(education) +
            "&emergency_person=" + encodeURIComponent(emergency_person) +
            "&emergency_contact=" + encodeURIComponent(emergency_contact) +
            "&address=" + encodeURIComponent(address) +
            "&barangay=" + encodeURIComponent(barangay) +
            "&city=" + encodeURIComponent(city) +
            "&province=" + encodeURIComponent(province));
    }
</script>
  </body>
</html>