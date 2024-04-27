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
  <title>FAQ</title>
  <link rel="icon" href="images/logo1.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="FAQ1.css">
</head>
<body>
  <div>
    <div class="header">
      <i class="fas fa-bars hamburger" onclick="toggleNavigation()"></i>
      <div class="profile-icon" onclick="toggleProfileDetails()">
          <i class="fas fa-user"></i>
          <div class="profile-details-container" id="profileDetailsContainer">
              <div class="profile">
                <img src="images/brgyhall.jpg" alt="Barangay Hall" width="80px" height="80px">
                <div class="adminname">
                  <p class="p1">Vince Allen Cristal</p>
                  <p class="p2">Admin</p>
                </div>
              </div>
              <hr>
              <a href="Profile.php"><i class="bi bi-person"></i> Profile</a>
              <a href="Password.php"><i class="bi bi-key"></i> Reset Password</a>
              <hr>
              <a href="FAQ1.php?logout=true.php"><i class="bi bi-box-arrow-right"></i> Log Out</a>
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
      <a href="Document.php" class="a1"><i class="far fa-file-alt"></i> Document Request</a>
      <a href="Activity.php" class="a1"><i class="bi bi-activity"></i> Activity</a>
      <div class="dropdown" onclick="toggleDropdown()">
        <button class="btn btn-primary plus-toggle" type="button" id="dropdownMenuButton" >
          <i class="fas fa-cog"></i>Page <i class="bi bi-plus"></i>
        </button>
        <div class="dropdown-content" id="dropdownContent">
          <a href="Information.php"><i class="fas fa-chevron-right"></i>Information</a>
          <a href="Forms.php"><i class="fas fa-chevron-right"></i>Forms</a>
          <a href="FAQ1.php" id="php"><i class="fas fa-chevron-right"></i>FAQ</a>
          <a href="BarangayContact&Message.php" class="contact1"><i class="fas fa-chevron-right"></i>Contact</a>
        </div>
      </div>
      <a href="FAQ1.php?logout=true.php" class="a1"><i class="fas fa-sign-out-alt"></i> Log Out</a>
    </div>
  </div>
  
  <div class="title-with-icon">
    <a href="Admin.php" title="Dashboard"><i class="bi bi-house"></i></a>
    <p>Frequently Asked Question</p>
  </div>

  <div class="overlay" id="overlay" onclick="hideForm()"></div>

  <?php
    include 'connection.php';
            
    $sql = "SELECT COUNT(*) AS totalfaq FROM faq";
    $result = $conn->query($sql);
            
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $countfaq = $row['totalfaq'];
    } else {
      $countfaq = 0;
    }

    $conn->close();
  ?>

<div class="activity" id="barangayOfficialsDashboard">
  <div class="title-with-icon1">
    <i class="fas fa-chart-line"></i>
    <h3>List Chart</h3>
    <button type="button" class="btn btn-success" onclick="showActivityForm()">Add FAQ</button>
  </div>
<hr>
<div class="heading-and-buttons">
  <div class="show-entries">
    <label for="entries">Show Entries: </label>
    <input type="number" title="number" placeholder="0" value="<?php echo $countfaq; ?>">
  </div>    
  <div class="search-bar">
        <p>Search: </p>
        <input type="text" id="searchInput" onkeyup="searchFAQ()" placeholder="Search for names...">
  </div>
</div><hr>
    <table class="table-no-border">
        <thead>
            <tr>
                <th>Number</th>
                <th>Date</th>
                <th>Question</th>
                <th>Answer</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
          include 'connection.php';

          $searchQuery = ''; 

          if(isset($_POST['search'])) {
              $searchQuery = $_POST['search']; 
          }

          $sql = "SELECT * FROM faq WHERE question LIKE '%$searchQuery%'";

          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td style='width: 20%'>" . $row["id"] . "</td>";
                  echo "<td>" . $row["date"] . "</td>";
                  echo "<td style='width: 20%'>" . $row["question"] . "</td>";
                  echo "<td style='width: 25%'>" . $row["answer"] . "</td>";
                  echo "<td>";
                  echo "<a href='#' onclick='editFAQ(" . $row['id'] . ")' class='btn btn-primary btnedit' style='margin-right:5px;'>Edit</a>";
                  echo "<button class='btn btn-danger' onclick='deleteFAQ(" . ($row['id'] ?? '') . ")'>Delete</button>";
                  echo "</td>";
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='5'>No FAQs found.</td></tr>";
          }

          $conn->close();
        ?>
    </tbody>
    </table>
    <div class="navigation-buttons">
      <p>Showing <?php echo $countfaq; ?> of <?php echo $countfaq; ?> entries.</p>
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
  <div class="heading-with-icon"></h2><i class="fas fa-question-circle"></i><h2>Add FAQ</h2>
    <button type="button" class="btn-close" aria-label="Close" onclick="hideActivityForm()"></button>
  </div>
<form action="faq1_insert.php" method="POST">
    <div class="row">
        <div class="col-md-6">
                <div class="form-group">
                  <label for="fullName" class="lab">Question</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-pencil"></i></span>
                    <input type="text" class="form-control" id="Question" name="Question" placeholder="Enter question">
                  </div>
                </div>
                <div class="form-group">
                  <label for="contact" class="lab">Answer</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-pencil"></i></span>
                    <input type="text" class="form-control" id="StartofTerm" name="StartofTerm" placeholder="Enter answer">
                  </div>
                </div>
                <div class="form-group">
                  <label for="address" class="lab">Date</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                    <input type="date" class="form-control" id="date" name="date" placeholder="Enter date">
                  </div>
                </div>
        </div>
        <div class="form-group text-center">
        <div class="col">
          <button type="button" class="btn btn-secondary btn3" onclick="hideActivityForm()">Close</button>
          <button type="submit" class="btn btn-primary btn4"> Submit</button>
        </div>
    </div>
    </div>
</form>
</div>

<div class="form-container" id="editactivityContainer">
    <div class="heading-with-icon">
        <i class="fas fa-question-circle"></i>
        <h2>Edit FAQ</h2>
        <button type="button" class="btn-close" aria-label="Close" onclick="hideEditActivityForm()"></button>
    </div>
    <form action="faq1_update.php" method="POST">
        <?php
        include 'connection.php';
        function fetchFaqData($conn, $faqId) {
            $faqId = mysqli_real_escape_string($conn, $faqId);
            $sql = "SELECT * FROM faq WHERE id = '$faqId'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row;
            } else {
                return null;
            }
        }

        if (isset($_GET['id'])) {
            $faqData = fetchFaqData($conn, $_GET['id']);
            if ($faqData) {
                $faqid = $faqData["id"];
                $faqdate = $faqData["date"];
                $faqquestion = $faqData["question"];
                $faqanswer = $faqData["answer"];
            } else {
                echo "FAQ not found";
            }
        } else {
            echo "FAQ ID not provided";
        }
        ?>
        <input type="hidden" name="faq_id" value="<?php echo $faqid; ?>">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fullName" class="lab">Question</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-pencil"></i></span>
                        <input type="text" class="form-control" id="Question" name="question" placeholder="Enter question" value="<?php echo $faqquestion; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact" class="lab">Answer</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-pencil"></i></span>
                        <input type="text" class="form-control" id="StartofTerm" name="answer" placeholder="Enter answer" value="<?php echo $faqanswer; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="lab">Date</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                        <input type="date" class="form-control" id="date" name="date" placeholder="Enter date" value="<?php echo $faqdate; ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group text-center">
            <div class="col">
                <button type="button" class="btn btn-secondary btn3" onclick="hideEditActivityForm()">Close</button>
                <button type="submit" class="btn btn-primary btn4">Submit</button>
            </div>
        </div>
    </form>
</div>

<script>
function deleteFAQ(faqId) {
    if (confirm("Are you sure you want to delete this FAQ entry?")) {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        location.reload();
      }
    };
    xhttp.open("POST", "faq1_delete.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("delete_id=" + faqId);
  }
}

function editFAQ(faqId) {
    if (faqId) {
        var editUrl = 'FAQ1.php?id=' + faqId;
        window.location.href = editUrl;
    } else {
        console.error("Invalid userId:", faqId);
    }
}

window.onload = function() {
    var urlParams = new URLSearchParams(window.location.search);
    var faqId = urlParams.get('id'); 
    
    if (faqId) {
        var editUrl = 'FAQ1.php?id=' + faqId;
        showEditActivityForm(editUrl);
    }
}

function hideEditActivityForm() {
  var overlay = document.getElementById('overlay');
  var formContainer = document.getElementById('editactivityContainer');
  var blurredBackground = document.querySelector('.blurred-background'); 

  blurredBackground.parentNode.removeChild(blurredBackground);

  overlay.style.display = 'none';
  formContainer.style.display = 'none';

  window.location.href = 'FAQ1.php';
}

function showEditActivityForm(editUrl) {
  var overlay = document.getElementById('overlay');
  var formContainer = document.getElementById('editactivityContainer');
  var blurredBackground = document.createElement('div'); 
  blurredBackground.classList.add('blurred-background'); 

  document.body.appendChild(blurredBackground);

  overlay.style.display = 'block';
  formContainer.style.display = 'block';
}

function searchFAQ() {
    var input = document.getElementById("searchInput").value.toLowerCase();
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

</script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-euKpLsYQJz5jE0EEOxnTPI1a2ybp4QA9QfsB1LD73pI95/02djN3eVkD5bZlNumj" crossorigin="anonymous"></script>
  <script src="Admin.js"></script>
</body>
</html>