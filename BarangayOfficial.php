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
  <title>Barangay Officials</title>
  <link rel="icon" href="images/logo1.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Barangay.css">
  <style>
    @media (max-width: 768px) {
      .header{
        margin-left: 0;
        width: 31%;
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
        margin-left: -1000px;
      }
      .profile-details-container {
        margin-right: 180px;
        width: 45%;
      }
      .barangay {
        margin-left: 10px;
        max-width: 100%;
        width: 95.5%;
        margin-top: 170px;
      }

      .title-with-icon1{
        width: 100%;
      }
      .barangay .title-with-icon1 i{
      font-size: 30px;
      }
      .barangay .title-with-icon1 h3 {
        font-size: 28px;
        width: 200000000000px;
        margin-left: -150px;
      }
      .show-entries{
        display: none;
      }
      .search-bar{
        margin: 0 auto;
        width: 90%;
      }
      .barangay table {
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
        margin-bottom: 0;
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
              <a href="BarangayOfficial.php?logout=true.php"><i class="bi bi-box-arrow-right"></i> Log Out</a>
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
      <a href="BarangayOfficial.php" class="a1" id="official"><i class="fas fa-users"></i> Barangay Officials</a>
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
          <a href="BarangayContact&Message.php" class="contact1"><i class="fas fa-chevron-right"></i>Contact</a>
        </div>
      </div>
      <a href="BarangayOfficial.php?logout=true.php" class="a1"><i class="fas fa-sign-out-alt"></i> Log Out</a>
    </div>
  </div>

  <div class="title-with-icon">
    <a href="Admin.html" title="Dashboard"><i class="bi bi-house"></i></a>
    <p>Barangay Officials Records</p>
  </div>

  <div class="overlay" id="overlay" onclick="hideForm()"></div>
  
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

  <div class="barangay" id="barangayOfficialsDashboard">
    <div class="title-with-icon1">
      <i class="fas fa-chart-line"></i>
      <h3>List Chart</h3>
      <button type="button" class="btn btn-success" onclick="showForm()">Add Barangay Official</button>
    </div>
    <hr>
    <div class="heading-and-buttons">
      <div class="show-entries">
        <label for="entries">Show Entries: </label>
        <input type="number" title="number" placeholder="0" value="<?php echo $countOfficial; ?>">
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
                <th>Full Name</th>
                <th>Contact </th>
                <th>Address </th>
                <th>Start of Term </th>
                <th>End of Term</th>
                <th>Action</th>
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
                  echo "<td class='action-buttons'>";
                  echo "<a href='#' onclick='editOfficial(" . $row['id'] . ")' class='btn btn-primary btnedit' style='margin-right:5px;'>Edit</a>";
                  echo "<button type='button' class='btn btn-danger' onclick='deleteOfficial(" . $row['id'] . ")'>Delete</button>";
                  echo "</td>";
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
  <footer class="footer">
    <div class="container">
      <p>&copy; 2024 Your Website Name. All rights reserved.</p>
    </div>
  </footer>

  <div class="form-container" id="formContainer" style="height: 550px">
    <div class="heading-with-icon"></h2><i class="fas fa-user-plus"></i><h3>Add Barangay Officials</h3>
      <button type="button" class="btn-close" aria-label="Close" onclick="hideForm()"></button>
    </div>
    <form action="barangay_official_insert.php" method="POST" id="officialForm" enctype="multipart/form-data">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="position" class="lab">Position</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-building"></i></span>
          <select class="form-control" id="position" name="position">
            <option value="" disabled selected>Select Position</option>
            <option value="Barangay Captain">Barangay Captain</option>
            <option value="Kagawad">Kagawad</option>
            <option value="SK Chairman">SK Chairman</option>
            <option value="Secretary">Secretary</option>
          </select>        
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="barangayPhoto" class="lab">Photo</label>
        <div class="input-group">
          <input type="file" class="form-control" id="barangayPhoto" name="barangayPhoto">
        </div>
      </div>
    </div>
  </div>
  <div class="row">
  <div class="col-md-6">
      <div class="form-group">
        <label for="fullName" class="lab">Full Name</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-person"></i></span>
          <input type="text" class="form-control" id="barangayFullName" name="barangayFullName" placeholder="Enter full name">
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="contact" class="lab">Contact</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
          <input type="text" class="form-control" id="barangayContact" name="barangayContact" placeholder="Enter contact">
        </div>
      </div>
    </div>
  </div>
  <div class="row">
  <div class="col-md-6">
      <div class="form-group">
        <label for="address" class="lab">Address</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
          <input type="text" class="form-control" id="barangayResident" name="barangayResident" placeholder="Enter address">
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="startOfTerm" class="lab">Start of Term</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-calendar"></i></span>
          <input type="date" class="form-control" id="StartofTerm" name="StartofTerm" placeholder="Enter start date">
        </div>
      </div>
    </div>
  </div>
  <div class="row">
  <div class="col-md-6">
      <div class="form-group">
        <label for="endOfTerm" class="lab">End of Term</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-calendar"></i></span>
          <input type="date" class="form-control" id="EndofTerm" name="EndofTerm" placeholder="Enter end date">
        </div>
      </div>
    </div>
  </div>
  <button type="button" class="btn btn-secondary btn3" onclick="hideForm()" style="margin-top:10px;">Close</button>
  <button type="submit" class="btn btn-primary btn4" id="addOfficialButton" style="margin-top:10px;">Add Official</button>
</form>
  </div>
  
<?php
include 'connection.php';

function fetchOfficialData($conn, $officialId) {
    $officialId = mysqli_real_escape_string($conn, $officialId);
    
    $sql = "SELECT * FROM barangay_officials WHERE id = '$officialId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return null;
    }
}

if (isset($_GET['id'])) {
    $officialData = fetchOfficialData($conn, $_GET['id']);

    if ($officialData) {
        $officialId = $officialData["id"];
        $officialPosition = $officialData["position"];
        $officialPhoto = $officialData["photo"];
        $officialFullName = $officialData["fullName"];
        $officialContact = $officialData["contact"];
        $officialAddress = $officialData["address"];
        $officialStartOfTerm = $officialData["startOfTerm"];
        $officialEndOfTerm = $officialData["endOfTerm"];
    } else {
        echo "Official not found";
    }
} else {
    echo "";
}
?>

<div class="form-container" id="editformContainer" style="height: 550px; display: none;">
    <div class="heading-with-icon">
        <h2><i class="fas fa-user-plus"></i>Edit Barangay Officials</h2>
        <button type="button" class="btn-close" aria-label="Close" onclick="hideeditForm()"></button>
    </div>
    <form action="barangay_official_update.php" method="POST" id="officialForm" enctype="multipart/form-data">
        <input type="hidden" name="official_id" value="<?php echo $officialId; ?>">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="position" class="lab">Position</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-building"></i></span>
                        <select class="form-control" id="position" name="position">
                            <option value="" disabled selected><?php echo $officialPosition; ?></option>
                            <option value="Barangay Captain">Barangay Captain</option>
                            <option value="Kagawad">Kagawad</option>
                            <option value="SK Chairman">SK Chairman</option>
                            <option value="Secretary">Secretary</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="barangayPhoto" class="lab">Photo</label>
                    <div class="input-group">
                        <input type="file" class="form-control" id="barangayPhoto" name="barangayPhoto" onchange="updateFileName(this)" placeholder="Select a file..." value="<?php echo $officialPhoto; ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fullName" class="lab">Full Name</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" class="form-control" id="barangayFullName" name="barangayFullName" placeholder="Enter full name" value="<?php echo $officialFullName; ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="contact" class="lab">Contact</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                        <input type="text" class="form-control" id="barangayContact" name="barangayContact" placeholder="Enter contact" value="<?php echo $officialContact; ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="address" class="lab">Address</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                        <input type="text" class="form-control" id="barangayResident" name="barangayResident" placeholder="Enter address" value="<?php echo $officialAddress; ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="startOfTerm" class="lab">Start of Term</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                        <input type="date" class="form-control" id="StartofTerm" name="StartofTerm" placeholder="Enter start date" value="<?php echo $officialStartOfTerm; ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="endOfTerm" class="lab">End of Term</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                        <input type="date" class="form-control" id="EndofTerm" name="EndofTerm" placeholder="Enter end date" value="<?php echo $officialEndOfTerm; ?>">
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-secondary btn3" onclick="hideeditForm()" style="margin-top:10px;">Close</button>
        <button type="submit" class="btn btn-primary btn4" id="addOfficialButton" style="margin-top:10px;">Update</button>
    </form>
</div>
<script>
function deleteOfficial(officialId) {
    if (confirm('Are you sure you want to delete this user?')) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                window.location.reload();
            }
        };
        xhttp.open("GET", "barangay_official_delete.php?id=" + officialId, true);
        xhttp.send();
    }
}

function editOfficial(officialId) {
    if (officialId) {
        var editUrl = 'BarangayOfficial.php?id=' + officialId;
        window.location.href = editUrl;
    } else {
        console.error("Invalid userId:", officialId);
    }
}

window.onload = function() {
    var urlParams = new URLSearchParams(window.location.search);
    var officialId = urlParams.get('id'); 
    
    if (officialId) {
        var editUrl = 'BarangayOfficial.php?id=' + officialId;
        showeditForm(editUrl);
    }
}

function showeditForm(editUrl) {
    var overlay = document.getElementById('overlay');
    var formContainer = document.getElementById('editformContainer');
    var blurredBackground = document.createElement('div'); 
    blurredBackground.classList.add('blurred-background');

    document.body.appendChild(blurredBackground);

    overlay.style.display = 'block';
    formContainer.style.display = 'block';
}

function hideeditForm() {
    var overlay = document.getElementById('overlay');
    var formContainer = document.getElementById('editformContainer');
    var blurredBackground = document.querySelector('.blurred-background'); 

    blurredBackground.parentNode.removeChild(blurredBackground);

    overlay.style.display = 'none';
    formContainer.style.display = 'none';

    window.location.href = 'BarangayOfficial.php';
}

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

</script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-euKpLsYQJz5jE0EEOxnTPI1a2ybp4QA9QfsB1LD73pI95/02djN3eVkD5bZlNumj" crossorigin="anonymous"></script>
  <script src="Admin.js"></script>
</body>
</html>