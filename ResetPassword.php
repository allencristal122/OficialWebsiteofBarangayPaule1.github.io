<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="icon" href="images/logo1.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="ResetPassword.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
    @media (max-width: 768px) {
    .imgBx{
        display: none;
    }

    section {
        width: 90%;
        height: auto;
        margin: 0 auto;
        margin-top: 120px !important;
    }

    .contentBx {
        width: 100%;
    }

    .formBx {
        width: 100%;
        padding: 40px 20px; 
        background: rgba(255, 255, 255, 0.9);
        margin: 20px; 
    }

    .formBx h2 {
        font-size: 23px;
    }

    .inputBx {
        margin-bottom: 15px; 
    }
    
    .input-group input {
        padding: 10px; 
    }

    .password-toggle i {
        margin-left: 10px;
    }

    .remember {
        margin-bottom: 15px; 
    }

    .remember a {
        margin-left: 20px;
    }

    .inputBx input[type="submit"] {
        margin: 0 auto;
        margin-top: 20px;
    }

    .back{
      margin: auto;
    }

    .back a{
      margin: 0 auto;
    }
}
    </style>
</head>
<body>
    <?php
    // Check if email is set in the URL query parameters
    if(isset($_GET['userName'])) {
        // Store the email from the query parameters
        $email = $_GET['userName'];
    }
    ?>
    <div class="background-box"></div>
    <div class="background-box"></div>
    <section>
      <div class="imgBx">
        <img class="logo-image" src="images/logo1.png" alt="Barangay Logo">
        <div class="overlay-text">
          <h3>Barangay Paule 1</h3>
          <p class="welcome">Welcome!</p>
          <p class="message">Your gateway to staying connected to Barangay Community</p>
      </div>
      </div>
      <div class="contentBx">
        <div class="formBx">
          <img src="images/logo1.png" alt="Barangay Logo">
          <h2>Create New Password</h2>
          <p>Your new password must be different from previous used password</p>
          <form method="post" action="update_password.php">
            <div class="inputBx">
              <label>Password</label>
              <div class="input-group">
                <span><i class="bi bi-lock"></i></span>
                <input type="password" id="password" name="password">
                <span class="password-toggle"><i class="bi bi-eye-slash"></i></span>
              </div>
            </div>
            <div class="inputBx">
              <label>Confirm Password</label>
              <div class="input-group">
                <span><i class="bi bi-lock"></i></span>
                <input type="password" id="confirmpassword" name="confirmPassword">
                <span class="confirm-password-toggle"><i class="bi bi-eye-slash"></i></span>
              </div>
            </div>
            <div class="inputBx">
              <input type="hidden" name="email" value="<?php echo $email; ?>"> <!-- Pass email as hidden input field -->
              <input type="submit" value="Reset Password" name="resetButton">
              <div class="back">
                <a href="Login.php"><span><i class="bi bi-arrow-left"></i></span><p>Back to Login</p></a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const passwordInput = document.getElementById('password');
        const passwordToggle = document.querySelector('.password-toggle');
        const confirmPasswordInput = document.getElementById('confirmpassword'); // Added
        const confirmPasswordToggle = document.querySelector('.confirm-password-toggle'); // Added
    
        passwordInput.addEventListener('input', function() {
            if (passwordInput.value.trim() !== '') {
                passwordToggle.style.display = 'block'; 
            } else {
                passwordToggle.style.display = 'none'; 
            }
        });
    
        confirmPasswordInput.addEventListener('input', function() { // Changed
            if (confirmPasswordInput.value.trim() !== '') { // Changed
                confirmPasswordToggle.style.display = 'block';  
            } else { 
                confirmPasswordToggle.style.display = 'none';  
            } 
        }); 
    
        passwordToggle.addEventListener('click', function() {
            togglePasswordVisibility(passwordInput, passwordToggle);
        });
    
        confirmPasswordToggle.addEventListener('click', function() { // Added
            togglePasswordVisibility(confirmPasswordInput, confirmPasswordToggle); 
        }); // Added
    
        // Initially hide the eye icon if the password field is empty
        if (passwordInput.value.trim() === '') {
            passwordToggle.style.display = 'none';
        }
    
        // Initially hide the eye icon if the confirm password field is empty
        if (confirmPasswordInput.value.trim() === '') { 
            confirmPasswordToggle.style.display = 'none'; 
        } 
       
        function togglePasswordVisibility(inputField, toggleButton) {
            const type = inputField.getAttribute('type') === 'password' ? 'text' : 'password';
            inputField.setAttribute('type', type);
            if (type === 'text') {
                toggleButton.querySelector('i').classList.remove('bi-eye');
                toggleButton.querySelector('i').classList.add('bi-eye-slash');
            } else {
                toggleButton.querySelector('i').classList.remove('bi-eye-slash');
                toggleButton.querySelector('i').classList.add('bi-eye');
            }
        }
    });
    </script>
</body>
</html>
