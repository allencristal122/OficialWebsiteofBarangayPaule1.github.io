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
  <title>Activity</title>
  <link rel="icon" href="images/logo1.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Activity.css">
</head>
<body>
  <div>
    <div class="header">
      <i class="fas fa-bars hamburger" onclick="toggleNavigation()"></i>
      <div class="profile-icon" onclick="toggleProfileDetails()">
          <i class="fas fa-user"></i>
          <div class="profile-details-container" id="profileDetailsContainer">
              <div class="profile">
                <img src="images/brgyhall.jpg" alt="Profile" width="80px" height="80px">
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
      <a href="Admin.php" class="a1"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
      <a href="Barangay.php" class="a1"><i class="fas fa-users"></i> Barangay Officials</a>
      <a href="Blotter.php" class="a1"><i class="fas fa-book"></i> Blotter</a>
      <a href="Resident.php" class="a1"><i class="fas fa-users"></i> Residents</a>
      <a href="Users.php" class="a1"><i class="fas fa-users-cog"></i> Users</a>
      <a href="Document.php" class="a1"><i class="far fa-file-alt"></i> Document Request</a>
      <a href="Activity.php" class="a1" id="act"><i class="bi bi-activity"></i> Activity</a>
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
      <a href="Activity.php?logout=true.php" class="a1"><i class="fas fa-sign-out-alt"></i> Log Out</a>
    </div>
  </div>
  
  <div class="title-with-icon">
    <a href="Admin.html" title="Dashboard"><i class="bi bi-house"></i></a>
    <p>Activity</p>
  </div>

  <div class="overlay" id="overlay" onclick="hideForm()"></div>
  
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
<div class="activity" id="barangayOfficialsDashboard">
  <div class="title-with-icon1">
    <i class="fas fa-chart-line"></i>
    <h3>List Chart</h3>
    <button type="button" class="btn btn-success" onclick="showActivityForm()">Add Activity</button>
  </div>
<hr>
<div class="heading-and-buttons">
  <div class="show-entries">
    <label for="entries">Show Entries: </label>
    <input type="number" title="number" placeholder="0" value="<?php echo $countActivity; ?>">
  </div>    
  <div class="search-bar">
        <p>Search: </p>
        <input type="text" name="query" id="searchInput" onkeyup="searchActivity()" placeholder="Search for names...">
  </div>
</div><hr>
    <table class="table-no-border">
        <thead>
            <tr>
                <th>Photos</th>
                <th>Date of Activity</th>
                <th>Activity Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="activityTableBody">
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
                          echo "<td class='action-buttons'>";
                          echo "<a href='#' onclick='editActivity(" . $row['id'] . ")' class='btn btn-primary btnedit' style='margin-right:5px;'>Edit</a>";
                          echo "<button type='button' class='btn btn-danger' onclick='deleteActivity(" . $row['id'] . ")'>Delete</button>";
                          echo "</td>";
                          echo "</tr>";
                      }
                  } else {
                      echo "<tr>";
                      echo"<td><img src='activity_photos/".$row['photos']."' alt='Photo' style='max-width: 70px; max-height: 70px; border-radius:50%'></td>";
                      echo "<td>" . $row["date"] . "</td>";
                      echo "<td>".$row['activity']."</td>";
                      echo "<td>" . $row["description"] . "</td>";
                      echo "<td class='action-buttons'>";
                      echo "<a href='#' onclick='editActivity(" . $row['id'] . ")' class='btn btn-primary btnedit' style='margin-right:5px;'>Edit</a>";
                      echo "<button type='button' class='btn btn-danger' onclick='deleteActivity(" . $row['id'] . ")'>Delete</button>";
                      echo "</td>";
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

<div class="form-container" id="activityContainer">
  <div class="heading-with-icon"><i class="fas fa-running"></i><h2>Add Activity</h2>
    <button type="button" class="btn-close" aria-label="Close" onclick="hideActivityForm()"></button>
  </div>
  <form action="activity_insert.php" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6">
                <div class="form-group">
                  <label for="fullName" class="lab">Photos</label>
                  <div class="input-group">
                    <input type="file" class="form-control" id="description" name="photo" placeholder="Choose picture">
                  </div>
                </div>
                <div class="form-group">
                  <label for="contact" class="lab">Date</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                    <input type="date" class="form-control" id="StartofTerm" name="date" placeholder="Enter date">
                  </div>
                </div>
                <div class="form-group">
                  <label for="address" class="lab">Activity</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                    <input type="text" class="form-control" id="barangayResident" name="activity" placeholder="Enter address">
                  </div>
                </div>
                <div class="form-group">
                  <label for="description" class="lab">Description</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-pencil"></i></span>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description">
                  </div>
                </div>
        </div>
        <div class="form-group text-center">
        <div class="col">
          <button type="button" class="btn btn-secondary btn3" onclick="hideActivityForm()"> Close</button>
            <button type="submit" class="btn btn-primary btn4">Submit</button>
        </div>
    </div>
    </div>
  </form>
</div>

<?php
  include 'connection.php';

  function fetchActivityData($conn, $activityId) {
      $activityId = mysqli_real_escape_string($conn, $activityId);
      
      $sql = "SELECT * FROM Activity WHERE id = '$activityId'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          return $row;
      } else {
          return null;
      }
  }

  if (isset($_GET['id'])) {
      $activityData = fetchActivityData($conn, $_GET['id']);

      if ($activityData) {
          $activityId = $activityData["id"];
          $photo = $activityData["photos"];
          $date = $activityData["date"];
          $activity = $activityData["activity"];
          $description = $activityData["description"];
      } else {
          echo "Activity not found";
      }
  } else {
      echo "Activity ID not provided";
  }
?>

<div class="form-container" id="editActivityForm">
    <div class="heading-with-icon"><i class="fas fa-running"></i><h2>Edit Activity</h2>
        <button type="button" class="btn-close" aria-label="Close" onclick="hideEditForm()"></button>
    </div>
    <form action="activity_update.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="activity_id" value="<?php echo $activityId; ?>">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="editPhoto" class="lab">Photos</label>
                <div class="input-group">
                    <input type="file" class="form-control" id="editPhoto" name="photo" placeholder="Choose photo" value="<?php echo $photo; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="editDate" class="lab">Date</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                    <input type="date" class="form-control" id="editDate" name="date" placeholder="Enter date" value="<?php echo $date; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="editActivity" class="lab">Activity</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                    <input type="text" class="form-control" id="editActivity" name="activity" placeholder="Enter activity" value="<?php echo $activity; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="editDescription" class="lab">Description</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-pencil"></i></span>
                    <input type="text" class="form-control" id="editDescription" name="description" placeholder="Enter description" value="<?php echo $description; ?>">
                </div>
            </div>
        </div>
        <div class="form-group text-center">
            <div class="col">
                <button type="button" class="btn btn-secondary btn3" onclick="hideEditForm()"> Close</button>
                <button type="submit" class="btn btn-primary btn4">Update</button>
            </div>
        </div>
    </div>
</form>
</div>
<script>
  function deleteActivity(activityId) {
    if (confirm('Are you sure you want to delete this user?')) {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status ==200) {
        window.location.reload();
      }
    };
    xhttp.open("GET", "activity_delete.php?id=" + activityId, true);
    xhttp.send();
    }
  }

function editActivity(activityId) {
  if (activityId) {
    var editUrl = 'Activity.php?id=' + activityId;

    window.location.href = editUrl;
  } else {
    console.error("Invalid userId:", activityId);
  }
}

window.onload = function() {
  var urlParams = new URLSearchParams(window.location.search);
  var activityId = urlParams.get('id'); 
    
  if (activityId) {
    var editUrl = 'Activity.php?id=' + activityId;
    showEditForm(editUrl); 
  }
}

function showEditForm(editUrl) {
  var overlay = document.getElementById('overlay');
  var formContainer = document.getElementById('editActivityForm');
  var blurredBackground = document.createElement('div'); 
  blurredBackground.classList.add('blurred-background');

  document.body.appendChild(blurredBackground);

  overlay.style.display = 'block';
  formContainer.style.display = 'block';
}

function hideEditForm() {
  var overlay = document.getElementById('overlay');
  var formContainer = document.getElementById('editActivityForm');
  var blurredBackground = document.querySelector('.blurred-background'); 

  blurredBackground.parentNode.removeChild(blurredBackground);

  overlay.style.display = 'none';
  formContainer.style.display = 'none';

  window.location.href = 'Activity.php';
}

  function searchActivity() {
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