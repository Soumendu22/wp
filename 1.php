<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dance Competition Registration</title>
<style>
  body {
    font-family: Arial, sans-serif;
  }
  form {
    max-width: 400px;
    margin: 0 auto;
  }
  input[type="text"],
  input[type="password"],
  textarea {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }
  input[type="radio"] {
    margin: 5px;
  }
  input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 10px;
  }
  input[type="submit"]:hover {
    background-color: #45a049;
  }
  .error {
    color: red;
  }
</style>
<script>
  function validateForm() {
    var email = document.getElementById("email").value;
    var mobile = document.getElementById("mobile").value;
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var mobilePattern = /^\d{10}$/;

    if (!emailPattern.test(email)) {
      document.getElementById("emailError").innerHTML = "Invalid email format";
      return false;
    }
    else {
      document.getElementById("emailError").innerHTML = "";
    }

    if (!mobilePattern.test(mobile)) {
      document.getElementById("mobileError").innerHTML = "Mobile number must be 10 digits";
      return false;
    }
    else {
      document.getElementById("mobileError").innerHTML = "";
    }

    return true;
  }
</script>
</head>
<body>
<h2>Dance Competition Registration</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()">
  <label for="username">Username:</label>
  <input type="text" id="username" name="username" required>

  <label for="password">Password:</label>
  <input type="password" id="password" name="password" required>

  <label for="confirmPassword">Confirm Password:</label>
  <input type="password" id="confirmPassword" name="confirmPassword" required>

  <label for="email">Email Address:</label>
  <input type="text" id="email" name="email" required>
  <span class="error" id="emailError"></span>

  <label for="mobile">Mobile Number:</label>
  <input type="text" id="mobile" name="mobile" required>
  <span class="error" id="mobileError"></span>

  <label>Gender:</label>
  <input type="radio" id="male" name="gender" value="Male" required>
  <label for="male">Male</label>
  <input type="radio" id="female" name="gender" value="Female">
  <label for="female">Female</label>
  <input type="radio" id="other" name="gender" value="Other">
  <label for="other">Other</label>

  <label for="dob">Date of Birth:</label>
  <input type="date" id="dob" name="dob" required>

  <label for="address">Address:</label>
  <textarea id="address" name="address" required></textarea>

  <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $gender = $_POST['gender'];
  $dob = $_POST['dob'];
  $address = $_POST['address'];

  // Validate email format
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo '<div class="error">Invalid email format</div>';
  }

  // Display submitted data
  echo "<h2>Registration Details:</h2>";
  echo "<p><strong>Username:</strong> $username</p>";
  echo "<p><strong>Email:</strong> $email</p>";
  echo "<p><strong>Mobile:</strong> $mobile</p>";
  echo "<p><strong>Gender:</strong> $gender</p>";
  echo "<p><strong>Date of Birth:</strong> $dob</p>";
  echo "<p><strong>Address:</strong> $address</p>";
}
?>

</body>
</html>
