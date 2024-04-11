<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Product Inventory Tracker</title>
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
    var productName = document.getElementById('productName').value.trim();
    var quantityInStock = document.getElementById('quantityInStock').value.trim();
    var newStockQuantity = document.getElementById('newStockQuantity').value.trim();
    var supplier = document.getElementById('supplier').value.trim();
    var costPerUnit = document.getElementById('costPerUnit').value.trim();
    var isValid = true;

    if (productName === '') {
      document.getElementById('productNameError').innerHTML = 'Product Name is required';
      isValid = false;
    } else {
      document.getElementById('productNameError').innerHTML = '';
    }

    if (quantityInStock === '' || isNaN(quantityInStock) || parseInt(quantityInStock) < 0) {
      document.getElementById('quantityInStockError').innerHTML = 'Enter a valid quantity';
      isValid = false;
    } else {
      document.getElementById('quantityInStockError').innerHTML = '';
    }

    if (newStockQuantity === '' || isNaN(newStockQuantity) || parseInt(newStockQuantity) < 0) {
      document.getElementById('newStockQuantityError').innerHTML = 'Enter a valid quantity';
      isValid = false;
    } else {
      document.getElementById('newStockQuantityError').innerHTML = '';
    }

    if (supplier === '') {
      document.getElementById('supplierError').innerHTML = 'Supplier is required';
      isValid = false;
    } else {
      document.getElementById('supplierError').innerHTML = '';
    }

    if (costPerUnit === '' || isNaN(costPerUnit) || parseFloat(costPerUnit) <= 0) {
      document.getElementById('costPerUnitError').innerHTML = 'Enter a valid cost per unit';
      isValid = false;
    } else {
      document.getElementById('costPerUnitError').innerHTML = '';
    }

    return isValid;
  }
</script>
</head>
<body>
<h2>Product Inventory Tracker</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()">
  <label for="productName">Product Name:</label>
  <input type="text" id="productName" name="productName" required>
  <span class="error" id="productNameError"></span><br>

  <label for="quantityInStock">Quantity In Stock:</label>
  <input type="number" id="quantityInStock" name="quantityInStock" min="0" required>
  <span class="error" id="quantityInStockError"></span><br>

  <label for="newStockQuantity">New Stock Quantity:</label>
  <input type="number" id="newStockQuantity" name="newStockQuantity" min="0" required>
  <span class="error" id="newStockQuantityError"></span><br>

  <label for="supplier">Supplier:</label>
  <input type="text" id="supplier" name="supplier" required>
  <span class="error" id="supplierError"></span><br>

  <label for="costPerUnit">Cost Per Unit:</label>
  <input type="number" id="costPerUnit" name="costPerUnit" min="0" step="0.01" required>
  <span class="error" id="costPerUnitError"></span><br>

  <input type="submit" value="Update Inventory">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST["productName"];
    $quantityInStock = $_POST["quantityInStock"];
    $newStockQuantity = $_POST["newStockQuantity"];
    $supplier = $_POST["supplier"];
    $costPerUnit = $_POST["costPerUnit"];

    $updatedQuantity = $quantityInStock + $newStockQuantity;
    $totalCost = $newStockQuantity * $costPerUnit;

    echo "<h3>Inventory Updated</h3>";
    echo "<p><strong>Product Name:</strong> $productName</p>";
    echo "<p><strong>Quantity In Stock:</strong> $quantityInStock</p>";
    echo "<p><strong>New Stock Quantity:</strong> $newStockQuantity</p>";
    echo "<p><strong>Supplier:</strong> $supplier</p>";
    echo "<p><strong>Cost Per Unit:</strong> $$costPerUnit</p>";
    echo "<p><strong>Updated Quantity:</strong> $updatedQuantity</p>";
    echo "<p><strong>Total Cost:</strong> $$totalCost</p>";
}
?>
</body>
</html>
