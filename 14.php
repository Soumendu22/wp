<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Medical Supply Request Form</title>
<style>
  body {
    font-family: Arial, sans-serif;
  }
  form {
    max-width: 400px;
    margin: 0 auto;
  }
  input[type="text"],
  input[type="number"],
  input[type="date"] {
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
    var quantityToRequest = document.getElementById('quantityToRequest').value.trim();
    var estimatedDeliveryDate = document.getElementById('estimatedDeliveryDate').value.trim();
    var isValid = true;

    if (quantityToRequest === '' || isNaN(quantityToRequest) || parseInt(quantityToRequest) <= 0) {
      alert('Please enter a valid quantity to request.');
      isValid = false;
    }

    if (estimatedDeliveryDate === '') {
      alert('Please enter the estimated delivery date.');
      isValid = false;
    }

    return isValid;
  }
</script>
</head>
<body>
<h2>Medical Supply Request Form</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()">
  <label for="supplyName">Supply Name:</label>
  <input type="text" id="supplyName" name="supplyName" required><br>

  <label for="currentQuantity">Current Quantity:</label>
  <input type="number" id="currentQuantity" name="currentQuantity" min="0" value="0" readonly><br>

  <label for="quantityToRequest">Quantity to Request:</label>
  <input type="number" id="quantityToRequest" name="quantityToRequest" min="0" required><br>

  <label for="supplier">Supplier:</label>
  <input type="text" id="supplier" name="supplier" required><br>

  <label for="estimatedDeliveryDate">Estimated Delivery Date:</label>
  <input type="date" id="estimatedDeliveryDate" name="estimatedDeliveryDate" required><br>

  <input type="submit" value="Request">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $supplyName = $_POST["supplyName"];
    $currentQuantity = isset($_POST["currentQuantity"]) ? $_POST["currentQuantity"] : 0;
    $quantityToRequest = $_POST["quantityToRequest"];
    $supplier = $_POST["supplier"];
    $estimatedDeliveryDate = $_POST["estimatedDeliveryDate"];

    // Update the quantity in stock (Assuming it's updated in the database)
    $updatedQuantity = $currentQuantity + $quantityToRequest;

    echo "<h3>Supply Request Confirmation</h3>";
    echo "<p><strong>Supply Name:</strong> $supplyName</p>";
    echo "<p><strong>Current Quantity:</strong> $currentQuantity</p>";
    echo "<p><strong>Quantity Requested:</strong> $quantityToRequest</p>";
    echo "<p><strong>Supplier:</strong> $supplier</p>";
    echo "<p><strong>Estimated Delivery Date:</strong> $estimatedDeliveryDate</p>";
    echo "<p>Supply request submitted successfully!</p>";
    echo "<p><strong>Updated Quantity in Stock:</strong> $updatedQuantity</p>";
}
?>
</body>
</html>
