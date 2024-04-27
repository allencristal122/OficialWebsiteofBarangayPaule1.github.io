<?php
  session_start();

  if (!isset($_SESSION['username'])) {
      header("Location: Login.php");
      exit;
  }

  if (isset($_GET['logout'])) {
      session_destroy();

      header("Location: Login.php");
      exit;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="icon" href="images/logo1.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Admin.css">
  <style>
    @media (max-width: 768px) {
      .header{
        margin-left: 0;
        width: 100%;
      }
      .hamburger {
        display: block;
      }
      .close-icon {
        display: none; 
        position: absolute;
        top: 15px;
        right: 15px;
        cursor: pointer;
      }
      .navigation {
        margin-top: 0px;
        height: 105vh;
        z-index: 500;
        width: 60%;
        display: none;
      }
      .navigation.show-navigation {
        display: block; /* Change display to block when shown */
      }
      .title-with-icon{
        margin-left: 0;
        width: 100%;
      }
      .title-with-icon p{
        margin-left: -180px;
      }
      .profile-details-container {
        margin-right: 180px;
        width: 45%;
      }
      .dashboard-box-container1, .dashboard-box-container2{
        margin-left: 0;
        width: 95.5%;
      }
      .dashboard-box-container1{
        margin-top: 170px;
      }
      .dashboard-box-container2{
        margin-top: 0px;
      }
      .dashboard-box1,.dashboard-box2{
        width: 100%;
      }
      .box-title7 p{
        font-size: 30px;
        margin-top: 10px;
        margin-bottom: 18px;
      }
      .box-title7 h3{
        font-size: 25px;
        width: 50%;
      }
      .dashboard-box1 i, .dashboard-box2 i{
        margin-right: 10px;
        font-size: 110px;
        margin-top: 50px;
      }
      .dashboard {
        margin-left: 10px;
        max-width: 100%;
        width: 95.5%;
        margin-top: 10px;
      }

      .title-with-icon1{
        width: 100%;
      }
      .dashboard .title-with-icon1 i{
      font-size: 30px;
      }
      .dashboard .title-with-icon1 h3 {
        font-size: 28px;
        width: 200000000000px;
        margin-left: -50px;
      }
      .show-entries{
        display: none;
      }
      .search-bar{
        margin: 0 auto;
        width: 90%;
      }
      .dashboard table {
        width: 100%; 
        display: block; 
        overflow-x: auto; 
      }
      .navigation-buttons{
        margin: 0 auto;
        width: 90%;
      }
      .navigation-buttons p{
        display: none;
      }
      .navigation-buttons button{
        margin: 0 auto;
        margin-top: 10px;
      }
      .footer{
        margin-left: 0;
        width: 100%;
        text-align: center;
      }
      .footer .container{
        padding-left: 100px;
        font-size: 14px;
        margin: 0 auto;
      }
    }
  </style>
</head>
<body>
    <div>
        <div class="header">
          <i class="fas fa-bars hamburger" onclick="toggleNavigation()"></i>
          <i class="fas fa-times close-icon" id="closeIcon" style="display: none;"></i>
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
                  <a href="Admin.php?logout=true.php"><i class="bi bi-box-arrow-right"></i> Log Out</a>
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
          <a href="BarangayOfficial.php" class="a1"><i class="fas fa-users"></i> Barangay Officials</a>
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
          <a href="Admin.php?logout=true.php" class="a1"><i class="fas fa-sign-out-alt"></i> Log Out</a>
        </div>
      </div>

      <div class="title-with-icon">
        <a href="Admin.php" title="Dashboard"><i class="bi bi-house"></i></a>
        <p>Welcome, Admin.</p>
      </div>

      <div class="dashboard-box-container1">
        <div class="dashboard-box1" id="db1">
            <?php
            include 'connection.php';
            
            $sql = "SELECT COUNT(*) AS totalOfficials FROM barangay_officials";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $countOfficial = $row['totalOfficials'];
            } else {
                $countOfficial = 0;
            }
            $conn->close();
            ?>
          <div class="i"><i class="fas fa-landmark"></i></div>
          <div class="box-title7"><p><?php echo $countOfficial; ?></p><h3>TOTAL BRGY. OFFICIALS</h3></div>
          <div class="info"><a href="Barangay.php">More Info</a></div>
      </div>
        <div class="dashboard-box1" id="db2">
            <?php
            include 'connection.php';
            
            $sql = "SELECT COUNT(*) AS totalResidents FROM residents";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $rowCount = $row['totalResidents'];
            } else {
                $rowCount = 0;
            }
            
            $conn->close();
            ?>
            <div class="i"><i class="fas fa-map-marker-alt"></i></div>
            <div class="box-title7"><p><?php echo $rowCount; ?></p><h3>TOTAL RESIDENTS</h3></div>
            <div class="info"><a href="Residents.html">More Info</a></div>
        </div>
        <div class="dashboard-box1" id="db3">
            <?php
              include 'connection.php';
                      
              $sql = "SELECT COUNT(*) AS totalmessages FROM receivemessages ";
              $result = $conn->query($sql);
                      
              if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $countreceivemessages = $row['totalmessages'];
              } else {
                $countreceivemessages = 0;
              }

              $conn->close();
            ?>
            <div class="i"><i class="fas fa-file"></i></div>
            <div class="box-title7"><p><?php echo $countreceivemessages; ?></p><h3>TOTAL MESSAGES</h3></div>
            <div class="info"><a href="BarangayContact&Message.html">More Info</a></div>
        </div>
      </div>
      <div class="dashboard-box-container2">
        <div class="dashboard-box2" id="db4">
            <?php
            include 'connection.php';
            
            $sql = "SELECT COUNT(*) AS totalBlotter FROM blotterrecords";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $countBlotter = $row['totalBlotter'];
            } else {
                $countBlotter = 0;
            }
            
            $conn->close();
            ?>
            <div class="i"><i class="fas fa-gavel"></i></div>
            <div class="box-title7"><p><?php echo $countBlotter; ?></p><h3>TOTAL BLOTTER</h3></div>
            <div class="info"><a href="Barangay.html">More Info</a></div>
        </div>
        <div class="dashboard-box2" id="db5">
            <?php
            include 'connection.php';
            
            $sql = "SELECT COUNT(*) AS totalUsers FROM users";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $countUsers = $row['totalUsers'];
            } else {
                $countUsers = 0;
            }
            
            $conn->close();
            ?>
            <div class="i"><i class="fas fa-user-tie"></i></div>
            <div class="box-title7"><p><?php echo $countUsers; ?></p><h3>TOTAL USERS</h3></div>
            <div class="info"><a href="Barangay.html">More Info</a></div>
        </div>
        <div class="dashboard-box2" id="db6">
            <?php
            include 'connection.php';
            $sql = "SELECT COUNT(*) AS totalActivity FROM Activity";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $countActivity = $row['totalActivity'];
            } else {
                $countActivity = 0;
            }
            
            $conn->close();
            ?>
            <div class="i"><i class="fas fa-running"></i></div>
            <div class="box-title7"><p><?php echo $countActivity; ?></p><h3>TOTAL ACTIVITY</h3></div>
            <div class="info"><a href="Barangay.html">More Info</a></div>
        </div>
      </div>

      <?php
        include 'connection.php';
            
        $sql = "SELECT COUNT(*) AS totalOfficials FROM barangay_officials";
        $result = $conn->query($sql);
            
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $countOfficial = $row['totalOfficials'];
        } else {
            $countOfficial = 0;
        }
            
        $conn->close();
      ?>

      <div class="dashboard" id="barangayOfficialsDashboard">
        <div class="title-with-icon1">
          <i class="fas fa-chart-line"></i>
          <h3>Barangay List Chart</h3>
        </div>
        <hr>
        <div class="heading-and-buttons">
          <div class="show-entries">
            <label for="entries">Show Entries: </label>
            <input type="number" title="number" placeholder="0" value="<?php echo $countOfficial; ?>" readonly>
          </div>    
          <div class="search-bar">
          <p>Search: </p><input type="text" id="searchInput" onkeyup="searchOfficial()" placeholder="Search for names...">
          </div>
        </div><hr>
        <table class="table-no-border">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Position</th>
                    <th>Full Name </th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Start of Term</th>
                    <th>End of Term </th>
                </tr>
            </thead>
            <tbody>
              <?php
                  include 'connection.php';

                  if(isset($_GET['query'])) {
                      $search_query = $_GET['query'];
                      $sql = "SELECT * FROM barangay_officials WHERE fullName LIKE '%$search_query%'";
                  } else {
                      $sql = "SELECT * FROM barangay_officials";
                  }

                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                          echo "<tr>";
                          echo"<td><img src='photos/".$row['photo']."' alt='Photo' style='max-width: 70px; max-height: 70px; border-radius:50%'></td>";
                          echo "<td>".$row['position']."</td>";
                          echo "<td>".$row['fullName']."</td>";
                          echo "<td>".$row['contact']."</td>";
                          echo "<td>".$row['address']."</td>";
                          echo "<td>".$row['startOfTerm']."</td>";
                          echo "<td>".$row['endOfTerm']."</td>";
                          echo "</tr>";
                      }
                  } else {
                      echo "<tr><td colspan='8'>No records found</td></tr>";
                  }

                $conn->close();
              ?>
            </tbody>
        </table>
        <div class="navigation-buttons">
          <p>Showing <?php echo $countOfficial; ?> of <?php echo $countOfficial; ?> entries.</p>
          <button type="button" class="btn btn-secondary btn2">Previous</button>
          <button type="button" class="btn btn-primary btn1">Next</button>
        </div>
      </div>
      
      <?php
        include 'connection.php';
            
        $sql = "SELECT COUNT(*) AS totalResidents FROM residents";
        $result = $conn->query($sql);
            
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $rowCount = $row['totalResidents'];
        } else {
            $rowCount = 0;
        }

        $conn->close();
      ?>

      <div class="dashboard" id="residentDashboard">
        <div class="title-with-icon1">
          <i class="fas fa-chart-line"></i>
          <h3>Resident List Chart</h3>
        </div>
        <hr>
        <div class="heading-and-buttons">
          <div class="show-entries">
            <label for="entries">Show Entries: </label>
            <input type="number" title="number" placeholder="0" value="<?php echo $rowCount; ?>" readonly>
          </div>    
          <div class="search-bar">
          <p>Search: </p><input type="text" id="searchInput1" onkeyup="searchResident()" placeholder="Search for names...">
          </div>
        </div><hr>
        <table class="table-no-border">
            <thead>
                <tr>
                  <th>Photo</th>
                  <th>Name</th>
                  <th>Age</th>
                  <th>Occupation</th>
                  <th>Address</th>
                  <th>Contact</th>
                </tr>
            </thead>
            <tbody>
              <?php
                  include 'connection.php';

                  $searchInput = ""; 

                  $sql = "SELECT * FROM residents WHERE full_name LIKE '%$searchInput%'";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                          echo "<tr>";
                          echo "<td><img src='resident_photo/" . ($row["photo"] ?? '') . "' alt='Photo' style='max-width: 70px; max-height: 70px; border-radius:50%'></td>";
                          echo "<td>".$row['full_name']."</td>";
                          echo "<td>".$row['age']."</td>";
                          echo "<td>".$row['occupation']."</td>";
                          echo "<td>".$row['birth_place']."</td>";
                          echo "<td>".$row['contact']."</td>";
                          echo "</tr>";
                      }
                  } else {
                      echo "<tr><td colspan='7'>No matching records found</td></tr>";
                  }

                  $conn->close();
              ?>
            </tbody>
        </table>
        <div class="navigation-buttons">
          <p>Showing <?php echo $rowCount; ?> of <?php echo $rowCount; ?> entries.</p>
          <button type="button" class="btn btn-secondary btn2">Previous</button>
          <button type="button" class="btn btn-primary btn1">Next</button>
        </div>
      </div>

      <?php
       include 'connection.php';

        $sql = "SELECT COUNT(*) AS totalBlotter FROM blotterrecords";
        $result = $conn->query($sql);
            
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $countBlotter = $row['totalBlotter'];
        } else {
            $countBlotter = 0;
        }
            
        $conn->close();
      ?>
      
      <div class="dashboard" id="blotterDashboard">
        <div class="title-with-icon1">
          <i class="fas fa-chart-line"></i>
          <h3>Blotter List Chart</h3>
        </div>
        <hr>
        <div class="heading-and-buttons">
          <div class="show-entries">
            <label for="entries">Show Entries: </label>
            <input type="number" title="number" placeholder="0" value="<?php echo $countBlotter; ?>" readonly>
          </div>    
          <div class="search-bar">
          <p>Search: </p><input type="text" id="searchInput2" onkeyup="searchBlotter()" placeholder="Search for names...">
          </div>
        </div><hr>
        <table class="table-no-border">
            <thead>
                <tr>
                  <th>Status</th>
                  <th>Complainant</th>
                  <th>Age</th>
                  <th>Contact</th>
                  <th>Person to Complaint</th>
                  <th>Age</th>
                  <th>Contact</th>
                  <th>Action Taken</th>
                </tr>
            </thead>
            <tbody>
            <?php
                include 'connection.php';

                $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

                $sql = "SELECT * FROM blotterrecords WHERE 
                            status LIKE '%$searchTerm%' OR 
                            complainant LIKE '%$searchTerm%' OR 
                            personToComplaint LIKE '%$searchTerm%' OR 
                            actionTaken LIKE '%$searchTerm%'";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["status"] . "</td>";
                        echo "<td>" . $row["complainant"] . "</td>";
                        echo "<td>" . $row["age1"] . "</td>";
                        echo "<td>" . $row["contact1"] . "</td>";
                        echo "<td>" . $row["personToComplaint"] . "</td>";
                        echo "<td>" . $row["age2"] . "</td>";
                        echo "<td>" . $row["contact2"] . "</td>";
                        echo "<td>" . $row["actionTaken"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No Data Available</td></tr>";
                }

                $conn->close();
            ?>
            </tbody>
        </table>
        <div class="navigation-buttons">
          <p>Showing <?php echo $countBlotter; ?> of <?php echo $countBlotter; ?> entries.</p>
          <button type="button" class="btn btn-secondary btn2">Previous</button>
          <button type="button" class="btn btn-primary btn1">Next</button>
        </div>
      </div>
      
      <?php
        include 'connection.php';

        $sql = "SELECT COUNT(*) AS totalUsers FROM users";
        $result = $conn->query($sql);
                
        if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $countUsers = $row['totalUsers'];
        } else {
          $countUsers = 0;
        }
        
        $conn->close();
      ?>

      <div class="dashboard" id="usersDashboard">
        <div class="title-with-icon1">
          <i class="fas fa-chart-line"></i>
          <h3>Users List Chart</h3>
        </div>
        <hr>
        <div class="heading-and-buttons">
          <div class="show-entries">
            <label for="entries">Show Entries: </label>
            <input type="number" title="number" placeholder="0" value="<?php echo $countUsers; ?>" readonly>
          </div>    
          <div class="search-bar">
                <p>Search: </p><input type="text" id="searchInput3" onkeyup="searchUsers()" placeholder="Search for names...">
          </div>
        </div><hr>
        <table class="table-no-border">
            <thead>
                <tr>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Type</th>
                </tr>
            </thead>
            <tbody>
              <?php
                include 'connection.php';

                $searchInput = ""; 

                $sql = "SELECT * FROM users WHERE fullName LIKE '%$searchInput%'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td style='display: none;'>" . $row['id'] . "</td>"; 
                        echo "<td style='width: 25%;'>" . $row["fullName"] . "</td>";
                        echo "<td>" . $row["userName"] . "</td>";
                        echo "<td>" . $row["password"] . "</td>";
                        echo "<td>" . $row["userType"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No matching records found</td></tr>";
                }

                $conn->close();
              ?>
            </tbody>
        </table>
        <div class="navigation-buttons">
          <p>Showing <?php echo $countUsers; ?> of <?php echo $countUsers; ?> entries.</p>
          <button type="button" class="btn btn-secondary btn2">Previous</button>
          <button type="button" class="btn btn-primary btn1">Next</button>
        </div>
      </div>

      <?php
        include 'connection.php';
                
        $sql = "SELECT COUNT(*) AS totalActivity FROM Activity";
        $result = $conn->query($sql);
                
        if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $countActivity = $row['totalActivity'];
        } else {
          $countActivity = 0;
        }
                
        $conn->close();
      ?>
      
      <div class="dashboard" id="activityDashboard">
        <div class="title-with-icon1">
          <i class="fas fa-chart-line"></i>
          <h3>Activity List Chart</h3>
        </div>
        <hr>
        <div class="heading-and-buttons">
          <div class="show-entries">
            <label for="entries">Show Entries: </label>
            <input type="number" title="number" placeholder="0" value="<?php echo $countActivity; ?>" readonly>
          </div>    
          <div class="search-bar">
            <input type="text" name="query" id="searchInput4" onkeyup="searchActivity()" placeholder="Search for names...">
          </div>
        </div><hr>
        <table class="table-no-border">
            <thead>
                <tr>
                  <th>Photos</th>
                  <th>Date of Activity</th>
                  <th>Activity Name</th>
                  <th>Description</th>
                </tr>
            </thead>
            <tbody>
            <?php
          include 'connection.php';

          $sql = "SELECT * FROM activity";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  if(isset($_GET['query'])) {
                      $search_query = $_GET['query'];
                      if (stripos($row['activity'], $search_query) !== false) {
                          echo "<tr>";
                          echo"<td><img src='activity_photos/".$row['photos']."' alt='Photo' style='max-width: 70px; max-height: 70px; border-radius:50%'></td>";
                          echo "<td>" . $row["date"] . "</td>";
                          echo "<td>".$row['activity']."</td>";
                          echo "<td>" . $row["description"] . "</td>";
                          echo "</tr>";
                      }
                  } else {
                      echo "<tr>";
                      echo"<td><img src='activity_photos/".$row['photos']."' alt='Photo' style='max-width: 70px; max-height: 70px; border-radius:50%'></td>";
                      echo "<td>" . $row["date"] . "</td>";
                      echo "<td>".$row['activity']."</td>";
                      echo "<td>" . $row["description"] . "</td>";
                      echo "</tr>";
                  }
              }
          } else {
              echo "<tr><td colspan='5'>No Data Available</td></tr>";
          }

          $conn->close();
        ?>
            </tbody>
        </table>
        <div class="navigation-buttons">
          <p>Showing <?php echo $countActivity; ?> of <?php echo $countActivity; ?> entries.</p>
          <button type="button" class="btn btn-secondary btn2">Previous</button>
          <button type="button" class="btn btn-primary btn1">Next</button>
        </div>
      </div>
      <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Barangay Paule 1. All rights reserved.</p>
        </div>
      </footer>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-euKpLsYQJz5jE0EEOxnTPI1a2ybp4QA9QfsB1LD73pI95/02djN3eVkD5bZlNumj" crossorigin="anonymous"></script>
      <script src="Admin.js"></script>
      <script>
        const hamburgerIcon = document.getElementById('hamburger');
        const closeIcon = document.getElementById('closeIcon');
        const navigation = document.getElementById('navigation');

        hamburgerIcon.addEventListener('click', function() {
          navigation.classList.toggle('show-navigation');
          hamburgerIcon.style.display = 'none';
          closeIcon.style.display = 'block';
        });

        closeIcon.addEventListener('click', function() {
          navigation.classList.toggle('show-navigation');
          closeIcon.style.display = 'none';
          hamburgerIcon.style.display = 'block';
        });

        function searchOfficial() {
          var input = document.getElementById("searchInput").value.toLowerCase();
          var tableRows = document.getElementsByTagName("tr");
          var filteredRows = 0;

          for (var i = 1; i < tableRows.length; i++) {
            var cells = tableRows[i].getElementsByTagName("td");
            var activityName = cells[2].innerText.toLowerCase();

            if (activityName.indexOf(input) > -1) {
              tableRows[i].style.display = "";
              filteredRows++;
            } else {
              tableRows[i].style.display = "none";
            }
          }
        }

        function searchResident() {
            var input = document.getElementById("searchInput1").value.toLowerCase();
            var tableRows = document.querySelectorAll("tbody tr"); 
            var filteredRows = 0;

            tableRows.forEach(function(row) {
            var cells = row.getElementsByTagName("td");
            var found = false;

            Array.from(cells).forEach(function(cell) {
                var cellText = cell.innerText.toLowerCase();
                if (cellText.includes(input)) {
                    found = true;
                }
            });

            if (found) {
                row.style.display = "";
                filteredRows++;
            } else {
                row.style.display = "none";
            }
        });
      }

      function searchBlotter() {
          var input = document.getElementById("searchInput2").value.toLowerCase();
          var tableRows = document.querySelectorAll("tbody tr"); 
          var filteredRows = 0;

          tableRows.forEach(function(row) {
              var cells = row.getElementsByTagName("td");
              var found = false;

              Array.from(cells).forEach(function(cell) {
                  var cellText = cell.innerText.toLowerCase();
                  if (cellText.includes(input)) {
                      found = true;
                  }
              });

              if (found) {
                  row.style.display = "";
                  filteredRows++;
              } else {
                  row.style.display = "none";
              }
          });
      }

      function searchUsers() {
          var input = document.getElementById("searchInput3").value.toLowerCase();
          var tableRows = document.querySelectorAll("tbody tr"); 
          var filteredRows = 0;

          tableRows.forEach(function(row) {
          var cells = row.getElementsByTagName("td");
          var found = false;

          Array.from(cells).forEach(function(cell) {
              var cellText = cell.innerText.toLowerCase();
              if (cellText.includes(input)) {
                  found = true;
              }
          });

          if (found) {
              row.style.display = "";
              filteredRows++;
          } else {
              row.style.display = "none";
          }
        });
      }

      function searchActivity() {
        var input = document.getElementById("searchInput4").value.toLowerCase();
        var tableRows = document.getElementsByTagName("tr");
        var filteredRows = 0;

        for (var i = 1; i < tableRows.length; i++) {
          var cells = tableRows[i].getElementsByTagName("td");
          var activityName = cells[2].innerText.toLowerCase();

          if (activityName.indexOf(input) > -1) {
            tableRows[i].style.display = "";
            filteredRows++;
          } else {
            tableRows[i].style.display = "none";
          }
        }
      }
      </script>
</body>
</html>