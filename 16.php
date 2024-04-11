<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Vehicle Rental Reservation</title>
<style>
  body {
    font-family: Arial, sans-serif;
  }
  form {
    max-width: 400px;
    margin: 0 auto;
  }
  input[type="text"],
  input[type="date"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
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
    var vehicleType = document.getElementById('vehicleType').value;
    var pickupDate = document.getElementById('pickupDate').value.trim();
    var returnDate = document.getElementById('returnDate').value.trim();
    var customerName = document.getElementById('customerName').value.trim();
    var contactNumber = document.getElementById('contactNumber').value.trim();
    var isValid = true;

    if (vehicleType === '' || pickupDate === '' || returnDate === '' || customerName === '' || contactNumber === '') {
      alert('Please fill in all fields.');
      isValid = false;
    }

    if (returnDate <= pickupDate) {
      alert('Return date must be after pickup date.');
      isValid = false;
    }

    return isValid;
  }
</script>
</head>
<body>
<h2>Vehicle Rental Reservation</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()">
  <label for="vehicleType">Vehicle Type:</label>
  <select id="vehicleType" name="vehicleType">
    <option value="">Select</option>
    <option value="Sedan">Sedan</option>
    <option value="SUV">SUV</option>
    <option value="Truck">Truck</option>
    <option value="Van">Van</option>
  </select><br>

  <label for="pickupDate">Pickup Date:</label>
  <input type="date" id="pickupDate" name="pickupDate" required><br>

  <label for="returnDate">Return Date:</label>
  <input type="date" id="returnDate" name="returnDate" required><br>

  <label for="customerName">Customer Name:</label>
  <input type="text" id="customerName" name="customerName" required><br>

  <label for="contactNumber">Contact Number:</label>
  <input type="text" id="contactNumber" name="contactNumber" required><br>

  <input type="submit" value="Reserve">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vehicleType = $_POST["vehicleType"];
    $pickupDate = $_POST["pickupDate"];
    $returnDate = $_POST["returnDate"];
    $customerName = $_POST["customerName"];
    $contactNumber = $_POST["contactNumber"];

    // Convert dates to Unix timestamps
    $pickupTimeStamp = strtotime($pickupDate);
    $returnTimeStamp = strtotime($returnDate);

    // Calculate rental duration in days
    $durationDays = ceil(($returnTimeStamp - $pickupTimeStamp) / (60 * 60 * 24));

    // Check for scheduling conflicts (not implemented)

    echo "<h3>Reservation Confirmation</h3>";
    echo "<p><strong>Vehicle Type:</strong> $vehicleType</p>";
    echo "<p><strong>Pickup Date:</strong> $pickupDate</p>";
    echo "<p><strong>Return Date:</strong> $returnDate</p>";
    echo "<p><strong>Rental Duration:</strong> $durationDays days</p>";
    echo "<p><strong>Customer Name:</strong> $customerName</p>";
    echo "<p><strong>Contact Number:</strong> $contactNumber</p>";
    echo "<p>Vehicle reserved successfully!</p>";
}
?>
</body>
</html>
