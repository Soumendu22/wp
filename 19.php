<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Investment Portfolio Tracker</title>
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
  .result {
    margin-top: 20px;
  }
</style>
</head>
<body>
<h2>Investment Portfolio Tracker</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="investmentName">Investment Name:</label>
  <input type="text" id="investmentName" name="investmentName" required><br>

  <label for="investmentAmount">Investment Amount:</label>
  <input type="number" id="investmentAmount" name="investmentAmount" min="0" step="0.01" required><br>

  <label for="investmentDate">Investment Date:</label>
  <input type="date" id="investmentDate" name="investmentDate" required><br>

  <label for="currentValue">Current Value:</label>
  <input type="number" id="currentValue" name="currentValue" min="0" step="0.01" required><br>

  <input type="submit" name="addInvestment" value="Add Investment">
</form>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="totalInvestmentAmount">Total Investment Amount:</label>
  <input type="number" id="totalInvestmentAmount" name="totalInvestmentAmount" min="0" step="0.01" readonly><br>

  <label for="totalCurrentValue">Total Current Value:</label>
  <input type="number" id="totalCurrentValue" name="totalCurrentValue" min="0" step="0.01" readonly><br>

  <label for="roi">Return on Investment (ROI):</label>
  <input type="text" id="roi" name="roi" readonly><br>

  <input type="submit" name="calculateROI" value="Calculate ROI">
</form>

<div class="result">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["calculateROI"])) {
    $totalInvestmentAmount = 0;
    $totalCurrentValue = 0;
    $investments = isset($_POST["investments"]) ? $_POST["investments"] : [];
    foreach ($investments as $investment) {
        $totalInvestmentAmount += $investment["investmentAmount"];
        $totalCurrentValue += $investment["currentValue"];
    }
    
    if ($totalInvestmentAmount != 0) {
        $roi = ($totalCurrentValue - $totalInvestmentAmount) / $totalInvestmentAmount * 100;
        echo "Total Investment Amount: $totalInvestmentAmount<br>";
        echo "Total Current Value: $totalCurrentValue<br>";
        echo "Return on Investment (ROI): " . number_format($roi, 2) . "%";
    } else {
        echo "Total Investment Amount is zero. Cannot calculate ROI.";
    }
}
?>
    
</div>
</body>
</html>
