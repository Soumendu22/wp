<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ingredient Inventory Management</title>
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
    var quantityToOrder = document.getElementById('quantityToOrder').value.trim();
    var isValid = true;

    if (quantityToOrder === '' || isNaN(quantityToOrder) || parseInt(quantityToOrder) <= 0) {
      alert('Please enter a valid quantity to order.');
      isValid = false;
    }

    return isValid;
  }
</script>
</head>
<body>
<h2>Ingredient Inventory Management</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()">
  <label for="ingredientName">Ingredient Name:</label>
  <input type="text" id="ingredientName" name="ingredientName" required><br>

  <label for="currentQuantity">Current Quantity:</label>
  <input type="number" id="currentQuantity" name="currentQuantity" min="0" value="0" readonly><br>

  <label for="quantityToOrder">Quantity to Order:</label>
  <input type="number" id="quantityToOrder" name="quantityToOrder" min="0" required><br>

  <label for="supplier">Supplier:</label>
  <input type="text" id="supplier" name="supplier" required><br>

  <label for="costPerUnit">Cost Per Unit:</label>
  <input type="number" id="costPerUnit" name="costPerUnit" min="0" step="0.01" required><br>

  <input type="submit" value="Order">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ingredientName = $_POST["ingredientName"];
    $currentQuantity = isset($_POST["currentQuantity"]) ? $_POST["currentQuantity"] : 0;
    $quantityToOrder = $_POST["quantityToOrder"];
    $supplier = $_POST["supplier"];
    $costPerUnit = $_POST["costPerUnit"];

    $totalCost = $costPerUnit * $quantityToOrder;
    $newQuantity = $currentQuantity + $quantityToOrder;

    echo "<h3>Order Confirmation</h3>";
    echo "<p><strong>Ingredient Name:</strong> $ingredientName</p>";
    echo "<p><strong>Current Quantity:</strong> $currentQuantity</p>";
    echo "<p><strong>Quantity to Order:</strong> $quantityToOrder</p>";
    echo "<p><strong>Supplier:</strong> $supplier</p>";
    echo "<p><strong>Cost Per Unit:</strong> $$costPerUnit</p>";
    echo "<p><strong>Total Cost:</strong> $" . number_format($totalCost, 2) . "</p>";
    echo "<p><strong>New Quantity:</strong> $newQuantity</p>";
    echo "<p>Stock ordered successfully!</p>";
}
?>
</body>
</html>
