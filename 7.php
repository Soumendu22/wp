<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Product Review Submission</title>
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
    var reviewerName = document.getElementById('reviewerName').value.trim();
    var reviewerEmail = document.getElementById('reviewerEmail').value.trim();
    var rating = document.querySelector('input[name="rating"]:checked');
    var reviewText = document.getElementById('reviewText').value.trim();
    var isValid = true;

    if (productName === '') {
      document.getElementById('productNameError').innerHTML = 'Product Name is required';
      isValid = false;
    } else {
      document.getElementById('productNameError').innerHTML = '';
    }

    if (reviewerName === '') {
      document.getElementById('reviewerNameError').innerHTML = 'Reviewer Name is required';
      isValid = false;
    } else {
      document.getElementById('reviewerNameError').innerHTML = '';
    }

    if (reviewerEmail === '' || !isValidEmail(reviewerEmail)) {
      document.getElementById('reviewerEmailError').innerHTML = 'Enter a valid email address';
      isValid = false;
    } else {
      document.getElementById('reviewerEmailError').innerHTML = '';
    }

    if (!rating) {
      document.getElementById('ratingError').innerHTML = 'Rating is required';
      isValid = false;
    } else {
      document.getElementById('ratingError').innerHTML = '';
    }

    if (reviewText === '') {
      document.getElementById('reviewTextError').innerHTML = 'Review Text is required';
      isValid = false;
    } else {
      document.getElementById('reviewTextError').innerHTML = '';
    }

    return isValid;
  }

  function isValidEmail(email) {
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
  }
</script>
</head>
<body>
<h2>Product Review Submission</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()">
  <label for="productName">Product Name:</label>
  <input type="text" id="productName" name="productName" required>
  <span class="error" id="productNameError"></span><br>

  <label for="reviewerName">Reviewer Name:</label>
  <input type="text" id="reviewerName" name="reviewerName" required>
  <span class="error" id="reviewerNameError"></span><br>

  <label for="reviewerEmail">Reviewer Email:</label>
  <input type="email" id="reviewerEmail" name="reviewerEmail" required>
  <span class="error" id="reviewerEmailError"></span><br>

  <label for="rating">Rating:</label><br>
  <input type="radio" id="rating1" name="rating" value="1">
  <label for="rating1">1 Star</label><br>
  <input type="radio" id="rating2" name="rating" value="2">
  <label for="rating2">2 Stars</label><br>
  <input type="radio" id="rating3" name="rating" value="3">
  <label for="rating3">3 Stars</label><br>
  <input type="radio" id="rating4" name="rating" value="4">
  <label for="rating4">4 Stars</label><br>
  <input type="radio" id="rating5" name="rating" value="5">
  <label for="rating5">5 Stars</label>
  <span class="error" id="ratingError"></span><br>

  <label for="reviewText">Review Text:</label><br>
  <textarea id="reviewText" name="reviewText" rows="4" required></textarea>
  <span class="error" id="reviewTextError"></span><br>

  <input type="submit" value="Submit Review">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST["productName"];
    $reviewerName = $_POST["reviewerName"];
    $reviewerEmail = $_POST["reviewerEmail"];
    $rating = $_POST["rating"];
    $reviewText = $_POST["reviewText"];

    echo "<h3>Review Submitted</h3>";
    echo "<p><strong>Product Name:</strong> $productName</p>";
    echo "<p><strong>Reviewer Name:</strong> $reviewerName</p>";
    echo "<p><strong>Reviewer Email:</strong> $reviewerEmail</p>";
    echo "<p><strong>Rating:</strong> $rating</p>";
    echo "<p><strong>Review Text:</strong> $reviewText</p>";
    echo "<p>Thank you for your feedback!</p>";
}
?>
</body>
</html>
