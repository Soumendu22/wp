<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Digital Marketing Workshop Registration</title>
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
  input[type="date"],
  input[type="number"] {
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
    var workshopDate = document.getElementById("workshopDate").value;
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var currentDate = new Date();
    var selectedDate = new Date(workshopDate);

    if (!emailPattern.test(email)) {
      document.getElementById("emailError").innerHTML = "Invalid email format";
      return false;
    }
    else {
      document.getElementById("emailError").innerHTML = "";
    }

    if (selectedDate < currentDate) {
      document.getElementById("dateError").innerHTML = "Workshop date cannot be in the past";
      return false;
    }
    else {
      document.getElementById("dateError").innerHTML = "";
    }

    return true;
  }
</script>
</head>
<body>
<h2>Digital Marketing Workshop Registration</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()">
  <label for="fullName">Full Name:</label>
  <input type="text" id="fullName" name="fullName" required>

  <label for="email">Email Address:</label>
  <input type="email" id="email" name="email" required>
  <span class="error" id="emailError"></span>

  <label for="companyName">Company Name:</label>
  <input type="text" id="companyName" name="companyName" required>

  <label for="jobTitle">Job Title:</label>
  <input type="text" id="jobTitle" name="jobTitle" required>

  <label for="phoneNumber">Phone Number:</label>
  <input type="text" id="phoneNumber" name="phoneNumber" required>

  <label for="workshopDate">Workshop Date:</label>
  <input type="date" id="workshopDate" name="workshopDate" required>
  <span class="error" id="dateError"></span>

  <label for="numAttendees">Number of Attendees:</label>
  <input type="number" id="numAttendees" name="numAttendees" min="1" required>

  <label for="specialRequests">Special Requests:</label>
  <textarea id="specialRequests" name="specialRequests"></textarea>

  <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fullName = $_POST['fullName'];
  $email = $_POST['email'];
  $companyName = $_POST['companyName'];
  $jobTitle = $_POST['jobTitle'];
  $phoneNumber = $_POST['phoneNumber'];
  $workshopDate = $_POST['workshopDate'];
  $numAttendees = $_POST['numAttendees'];
  $specialRequests = $_POST['specialRequests'];

  // Display submitted data
  echo "<h2>Registration Details:</h2>";
  echo "<p><strong>Full Name:</strong> $fullName</p>";
  echo "<p><strong>Email:</strong> $email</p>";
  echo "<p><strong>Company Name:</strong> $companyName</p>";
  echo "<p><strong>Job Title:</strong> $jobTitle</p>";
  echo "<p><strong>Phone Number:</strong> $phoneNumber</p>";
  echo "<p><strong>Workshop Date:</strong> $workshopDate</p>";
  echo "<p><strong>Number of Attendees:</strong> $numAttendees</p>";
  echo "<p><strong>Special Requests:</strong> $specialRequests</p>";
  echo "<p>Thank you for registering for the workshop!</p>";
}
?>

</body>
</html>
