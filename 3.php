<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Volunteer Registration</title>
<style>
  body {
    font-family: Arial, sans-serif;
  }
  form {
    max-width: 400px;
    margin: 0 auto;
  }
  input[type="text"],
  input[type="email"],
  textarea {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }
  input[type="checkbox"] {
    margin: 5px;
  }
  select {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
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
    var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');

    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailPattern.test(email)) {
      document.getElementById("emailError").innerHTML = "Invalid email format";
      return false;
    }
    else {
      document.getElementById("emailError").innerHTML = "";
    }

    if (checkboxes.length === 0) {
      document.getElementById("availabilityError").innerHTML = "Please select at least one availability option";
      return false;
    }
    else {
      document.getElementById("availabilityError").innerHTML = "";
    }

    return true;
  }
</script>
</head>
<body>
<h2>Volunteer Registration</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()">
  <label for="fullName">Full Name:</label>
  <input type="text" id="fullName" name="fullName" required>

  <label for="email">Email Address:</label>
  <input type="email" id="email" name="email" required>
  <span class="error" id="emailError"></span>

  <label for="phoneNumber">Phone Number:</label>
  <input type="text" id="phoneNumber" name="phoneNumber" required>

  <label for="availability">Availability:</label><br>
  <input type="checkbox" id="morning" name="availability[]" value="Morning">
  <label for="morning">Morning</label><br>
  <input type="checkbox" id="afternoon" name="availability[]" value="Afternoon">
  <label for="afternoon">Afternoon</label><br>
  <input type="checkbox" id="evening" name="availability[]" value="Evening">
  <label for="evening">Evening</label><br>
  <input type="checkbox" id="weekend" name="availability[]" value="Weekend">
  <label for="weekend">Weekend</label><br>
  <span class="error" id="availabilityError"></span>

  <label for="areaOfInterest">Area of Interest:</label>
  <select id="areaOfInterest" name="areaOfInterest" required>
    <option value="" disabled selected>Select an option</option>
    <option value="Event Setup">Event Setup</option>
    <option value="Registration">Registration</option>
    <option value="Clean-up">Clean-up</option>
    <option value="Others">Others</option>
  </select>

  <label for="additionalComments">Additional Comments:</label>
  <textarea id="additionalComments" name="additionalComments"></textarea>

  <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fullName = $_POST['fullName'];
  $email = $_POST['email'];
  $phoneNumber = $_POST['phoneNumber'];
  $availability = implode(', ', $_POST['availability']);
  $areaOfInterest = $_POST['areaOfInterest'];
  $additionalComments = $_POST['additionalComments'];

  // Display submitted data
  echo "<h2>Registration Details:</h2>";
  echo "<p><strong>Full Name:</strong> $fullName</p>";
  echo "<p><strong>Email:</strong> $email</p>";
  echo "<p><strong>Phone Number:</strong> $phoneNumber</p>";
  echo "<p><strong>Availability:</strong> $availability</p>";
  echo "<p><strong>Area of Interest:</strong> $areaOfInterest</p>";
  echo "<p><strong>Additional Comments:</strong> $additionalComments</p>";
  echo "<p>Thank you for volunteering!</p>";
}
?>

</body>
</html>
