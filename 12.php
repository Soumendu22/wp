<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Equipment Rental Management</title>
<style>
  body {
    font-family: Arial, sans-serif;
  }
  form {
    max-width: 400px;
    margin: 0 auto;
  }
  input[type="text"],
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
    var quantityToRent = document.getElementById('quantityToRent').value.trim();
    var rentalDuration = document.getElementById('rentalDuration').value.trim();
    var isValid = true;

    if (quantityToRent === '' || isNaN(quantityToRent) || parseInt(quantityToRent) <= 0) {
      alert('Please enter a valid quantity to rent.');
      isValid = false;
    }

    if (rentalDuration === '' || isNaN(rentalDuration) || parseInt(rentalDuration) <= 0) {
      alert('Please enter a valid rental duration.');
      isValid = false;
    }

    return isValid;
  }
</script>
</head>
<body>
<h2>Equipment Rental Management</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()">
  <label for="equipmentName">Equipment Name:</label>
  <input type="text" id="equipmentName" name="equipmentName" required><br>

  <label for="availableQuantity">Available Quantity:</label>
  <input type="number" id="availableQuantity" name="availableQuantity" min="0" value="0" readonly><br>

  <label for="quantityToRent">Quantity to Rent:</label>
  <input type="number" id="quantityToRent" name="quantityToRent" min="0" required><br>

  <label for="rentalDuration">Rental Duration (days):</label>
  <input type="number" id="rentalDuration" name="rentalDuration" min="0" required><br>

  <label for="customerName">Customer Name:</label>
  <input type="text" id="customerName" name="customerName" required><br>

  <input type="submit" value="Rent">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $equipmentName = $_POST["equipmentName"];
    $availableQuantity = isset($_POST["availableQuantity"]) ? $_POST["availableQuantity"] : 0;
    $quantityToRent = $_POST["quantityToRent"];
    $rentalDuration = $_POST["rentalDuration"];
    $customerName = $_POST["customerName"];

    $newQuantity = $availableQuantity - $quantityToRent;
    $rentalFee = 10 * $rentalDuration * $quantityToRent;

    echo "<h3>Rental Confirmation</h3>";
    echo "<p><strong>Equipment Name:</strong> $equipmentName</p>";
    echo "<p><strong>Available Quantity:</strong> $availableQuantity</p>";
    echo "<p><strong>Quantity to Rent:</strong> $quantityToRent</p>";
    echo "<p><strong>Rental Duration:</strong> $rentalDuration days</p>";
    echo "<p><strong>Customer Name:</strong> $customerName</p>";
    echo "<p><strong>Rental Fee:</strong> $$rentalFee</p>";
    echo "<p>Equipment rented successfully!</p>";
}
?>
</body>
</html>
