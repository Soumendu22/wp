<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Book Order Form</title>
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
    var title = document.getElementById('bookTitle').value.trim();
    var author = document.getElementById('author').value.trim();
    var price = document.getElementById('price').value.trim();
    var quantity = document.getElementById('quantity').value.trim();
    var isValid = true;

    if (title === '') {
      document.getElementById('titleError').innerHTML = 'Title is required';
      isValid = false;
    } else {
      document.getElementById('titleError').innerHTML = '';
    }

    if (author === '') {
      document.getElementById('authorError').innerHTML = 'Author is required';
      isValid = false;
    } else {
      document.getElementById('authorError').innerHTML = '';
    }

    if (price === '' || isNaN(price) || parseFloat(price) <= 0) {
      document.getElementById('priceError').innerHTML = 'Enter a valid price';
      isValid = false;
    } else {
      document.getElementById('priceError').innerHTML = '';
    }

    if (quantity === '' || isNaN(quantity) || parseInt(quantity) <= 0 || parseInt(quantity) > 10) {
      document.getElementById('quantityError').innerHTML = 'Enter a valid quantity (between 1 and 10)';
      isValid = false;
    } else {
      document.getElementById('quantityError').innerHTML = '';
    }

    return isValid;
  }
</script>
</head>
<body>
<h2>Book Order Form</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()">
  <label for="bookTitle">Book Title:</label>
  <input type="text" id="bookTitle" name="bookTitle" >
  <span class="error" id="titleError"></span><br>
  <label for="author">Author:</label>
  <input type="text" id="author" name="author" >
  <span class="error" id="authorError"></span><br>

  <label for="price">Price ($):</label>
  <input type="number" id="price" name="price" min="0" step="0.01" >
  <span class="error" id="priceError"></span><br>

  <label for="quantity">Quantity:</label>
  <input type="number" id="quantity" name="quantity" min="1" max="10" >
  <span class="error" id="quantityError"></span><br>

  <input type="submit" value="Order">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookTitle = $_POST["bookTitle"];
    $author = $_POST["author"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];

    $totalCost = $price * $quantity;

    echo "<h3>Order Summary</h3>";
    echo "<p><strong>Book Title:</strong> $bookTitle</p>";
    echo "<p><strong>Author:</strong> $author</p>";
    echo "<p><strong>Price:</strong> $$price</p>";
    echo "<p><strong>Quantity:</strong> $quantity</p>";
    echo "<p><strong>Total Cost:</strong> $$totalCost</p>";
    echo "<p>Your order has been placed successfully!</p>";
}
?>
</body>
</html>
