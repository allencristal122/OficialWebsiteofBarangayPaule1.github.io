<!DOCTYPE html> 
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Important Information</title>
    <link rel="icon" href="images/logo1.png" type="image/x-icon">
    <link rel="stylesheet" href="Important Info.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head> 
<body>
    <section class="contact">
        <h3 class="h31">Profile Data</h3>
        <div class="container">
            <div class="numbers">
                <span class="number first-child">
                    1
                    <p>Personal Data</p>
                </span>
                <span class="number">2<p>Other Information
                </p></span>
                <span class="number">3<p>Proof of Identity</p></span>
            </div>
            <form id="personalDataForm" action="important_info_insert.php" method="POST">
                <div class="form-group">
                    <div class="input-group">
                        <label for="address">House Number/Street</label>
                        <input type="text" id="address" name="address" placeholder="House/Unit Number, Street" required>
                    </div>
                    <div class="input-group">
                        <label for="barangay">Barangay</label>
                        <input type="text" id="barangay" name="barangay" placeholder="Barangay" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <label for="city">City/Municipality</label>
                        <input type="text" id="city" name="city" placeholder="City/Municipality" required>
                    </div>
                    <div class="input-group">
                        <label for="province">Province</label>
                        <input type="text" id="province" name="province" placeholder="Province" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <label for="occupation">Occupation</label>
                        <input type="text" id="occupation" name="occupation" placeholder="Occupation" required>
                    </div>
                    <div class="input-group">
                        <label for="monthly_income">Monthly Income</label>
                        <input type="number" id="monthly_income" name="monthly_income" placeholder="Monthly Income" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <label for="number_of_years">Length of Stay</label>
                        <input type="number" id="number_of_years" name="number_of_years" placeholder="Relationship to Resident" required>
                    </div>
                    <div class="input-group">
                        <label for="number_household">Number per Household</label>
                        <input type="number" id="number_household" name="number_household" placeholder="Number per Household" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <label for="allergies_conditions">Allergies or Medical Conditions</label>
                        <input type="text" id="allergies_conditions" name="allergies_conditions" placeholder="Allergies or Medical Conditions">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <label for="education">Educational Attainment</label>
                        <input type="text" id="education" name="education" placeholder="Educational Attainment" required>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" onclick="redirectToPreviousPage()">
                        <i class="bi bi-arrow-left"></i> Back
                    </button>
                    <button type="button" class="btn btn-primary" onclick="submitFormData()">
                        Next <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
            </form>            
        </div>          
    </section>
    <footer> 
        <p>&copy; 2024 Barangay Paule 1. All rights reserved.</p> 
    </footer>
    <script>
        document.getElementById('personalDataForm').addEventListener('submit', function(event) {
            event.preventDefault(); 
            submitFormData();
        });

        function submitFormData() {
            const formData = new FormData(document.getElementById('personalDataForm'));

            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'important_info_insert.php', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    console.log(xhr.responseText); 
                    window.location.href = "Proof of Identity.php";
                } else {
                    console.error('Error:', xhr.statusText); 
                }
            };
            xhr.onerror = function() {
                console.error('Request failed'); 
            };
            xhr.send(formData); 
        }
        
        function redirectToPreviousPage() {
            window.location.href = "Personal Data.php";
        }           
    </script>
    <script src="index.js"></script> 
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body> 
</html>