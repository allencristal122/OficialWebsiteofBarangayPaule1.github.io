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
  <title>Document Request</title>
  <link rel="icon" href="images/logo1.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="Documents.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
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
                  <a href="Document.php?logout=true.php"><i class="bi bi-box-arrow-right"></i> Log Out</a>
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
            <a href="Admin.php" class="a1"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="BarangayOfficial.php" class="a1"><i class="fas fa-users"></i> Barangay Officials</a>
            <a href="Blotter.php" class="a1"><i class="fas fa-book"></i> Blotter</a>
            <a href="Resident.php" class="a1"><i class="fas fa-users"></i> Residents</a>
            <a href="Users.php" class="a1"><i class="fas fa-users-cog"></i> Users</a>
            <a href="Document.php" class="a1" id="docu"><i class="far fa-file-alt"></i> Document Request</a>
            <a href="Activity.php" class="a1"><i class="bi bi-activity"></i> Activity</a>
            <div class="dropdown" onclick="toggleDropdown()">
              <button class="btn btn-primary plus-toggle" type="button" id="dropdownMenuButton" >
                <i class="fas fa-cog"></i>Page <i class="bi bi-plus"></i>
              </button>
              <div class="dropdown-content" id="dropdownContent">
                <a href="Information.php"><i class="fas fa-chevron-right"></i>Information</a>
                <a href="Forms.php"><i class="fas fa-chevron-right"></i>Forms</a>
                <a href="FAQ1.php"><i class="fas fa-chevron-right"></i>FAQ</a>
                <a href="BarangayContact&Message.php" class="contact1"><i class="fas fa-chevron-right"></i>Contact</a>
              </div>
            </div>            
            <a href="Logs.php" class="a1"><i class="fas fa-history"></i> Log</a>
            <a href="Document.php?logout=true.php" class="a1"><i class="fas fa-sign-out-alt"></i> Log Out</a>
        </div>
    </div>
    
    <div class="title-with-icon">
        <a href="Admin.html" title="Dashboard"><i class="bi bi-house"></i></a>
        <p>Barangay Document Request</p>
    </div>
   
    <div class="overlay" id="overlay" onclick="hideResidentForm()"></div>

    <div class="resident" id="barangayOfficialsDashboard">
        <div class="title-with-icon1">
            <i class="fas fa-chart-line"></i>
            <h3>List Chart</h3>
        </div>
        <hr>
        <div class="heading-and-buttons">
            <div class="show-entries">
            <label for="entries">Show Entries: </label>
            <input type="number" title="number" placeholder="0">
            </div>    
            <div class="search-bar">
                <p>Search: </p><input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for names...">
            </div>
        </div><hr>
        <table class="table-no-border">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Resident Number</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Occupation</th>
                    <th>Documents</th>
                </tr>
            </thead>
            <tbody>
              <?php
                include 'connection.php';

                $query = "SELECT * FROM residents";
                $result = $conn->query($query); 

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td style='width: 19%;'><img src='resident_photo/" . ($row["photo"] ?? '') . "' alt='Photo' style='max-width: 70px; max-height: 70px; border-radius:50%'></td>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td style='width: 15%;'>".$row['full_name']."</td>";
                        echo "<td  style='width: 5%;'>".$row['gender']."</td>";
                        echo "<td>".$row['occupation']."</td>";
                        echo "<td>";
                        echo "<button class='btn btn-primary' style='margin-right: 5px;' onclick='requestDocument({$row['id']})'>Document</button>";
                        echo "<button class='btn btn-warning'>View</button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No Data Available</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="navigation-buttons">
            <p>Showing 0 of 0 entries.</p>
                <button type="button" class="btn btn-secondary btn2">Previous</button>
                <button type="button" class="btn btn-primary btn1">Next</button>
        </div>
    </div>
    <footer class="footer">
    <div class="container">
        <p>&copy; 2024 Your Website Name. All rights reserved.</p>
    </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-euKpLsYQJz5jE0EEOxnTPI1a2ybp4QA9QfsB1LD73pI95/02djN3eVkD5bZlNumj" crossorigin="anonymous"></script>
    <script src="Admin.js"></script>
</body>
</html>