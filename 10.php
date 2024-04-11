<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Product Comparison and Recommendation</title>
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
    var productName1 = document.getElementById('productName1').value.trim();
    var productPrice1 = document.getElementById('productPrice1').value.trim();
    var productRating1 = document.getElementById('productRating1').value.trim();
    var productName2 = document.getElementById('productName2').value.trim();
    var productPrice2 = document.getElementById('productPrice2').value.trim();
    var productRating2 = document.getElementById('productRating2').value.trim();
    var isValid = true;

    if (productName1 === '' || productPrice1 === '' || productRating1 === '' ||
        productName2 === '' || productPrice2 === '' || productRating2 === '') {
      alert('Please fill in all fields.');
      isValid = false;
    }

    if (isNaN(productPrice1) || parseFloat(productPrice1) <= 0) {
      alert('Product Price 1 must be a positive number.');
      isValid = false;
    }

    if (isNaN(productPrice2) || parseFloat(productPrice2) <= 0) {
      alert('Product Price 2 must be a positive number.');
      isValid = false;
    }

    if (isNaN(productRating1) || parseFloat(productRating1) < 0 || parseFloat(productRating1) > 5) {
      alert('Product Rating 1 must be a number between 0 and 5.');
      isValid = false;
    }

    if (isNaN(productRating2) || parseFloat(productRating2) < 0 || parseFloat(productRating2) > 5) {
      alert('Product Rating 2 must be a number between 0 and 5.');
      isValid = false;
    }

    return isValid;
  }
</script>
</head>
<body>
<h2>Product Comparison and Recommendation</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()">
  <label for="productName1">Product Name 1:</label>
  <input type="text" id="productName1" name="productName1" required><br>

  <label for="productPrice1">Product Price 1:</label>
  <input type="number" id="productPrice1" name="productPrice1" min="0" required><br>

  <label for="productRating1">Product Rating 1:</label>
  <input type="number" id="productRating1" name="productRating1" min="0" max="5" step="0.1" required><br>

  <label for="productName2">Product Name 2:</label>
  <input type="text" id="productName2" name="productName2" required><br>

  <label for="productPrice2">Product Price 2:</label>
  <input type="number" id="productPrice2" name="productPrice2" min="0" required><br>

  <label for="productRating2">Product Rating 2:</label>
  <input type="number" id="productRating2" name="productRating2" min="0" max="5" step="0.1" required><br>

  <input type="submit" value="Compare Products">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName1 = $_POST["productName1"];
    $productPrice1 = $_POST["productPrice1"];
    $productRating1 = $_POST["productRating1"];
    $productName2 = $_POST["productName2"];
    $productPrice2 = $_POST["productPrice2"];
    $productRating2 = $_POST["productRating2"];

    echo "<h3>Comparison Result</h3>";
    echo "<p><strong>Product Name 1:</strong> $productName1</p>";
    echo "<p><strong>Product Price 1:</strong> $$productPrice1</p>";
    echo "<p><strong>Product Rating 1:</strong> $productRating1</p>";
    echo "<p><strong>Product Name 2:</strong> $productName2</p>";
    echo "<p><strong>Product Price 2:</strong> $$productPrice2</p>";
    echo "<p><strong>Product Rating 2:</strong> $productRating2</p>";

    if ($productPrice1 < $productPrice2) {
        echo "<p>$productName1 is cheaper than $productName2.</p>";
    } elseif ($productPrice1 > $productPrice2) {
        echo "<p>$productName2 is cheaper than $productName1.</p>";
    } else {
        echo "<p>Both products have the same price.</p>";
    }

    if ($productRating1 > $productRating2) {
        echo "<p>You may prefer $productName1 for its higher rating.</p>";
    } elseif ($productRating1 < $productRating2) {
        echo "<p>You may prefer $productName2 for its higher rating.</p>";
    } else {
        echo "<p>Both products have the same rating.</p>";
    }
}
?>
</body>
</html>
