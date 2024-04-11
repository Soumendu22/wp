<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Monthly Budget Tracker</title>
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
    var monthlyIncome = document.getElementById('monthlyIncome').value.trim();
    var rentExpense = document.getElementById('rentExpense').value.trim();
    var groceriesExpense = document.getElementById('groceriesExpense').value.trim();
    var transportationExpense = document.getElementById('transportationExpense').value.trim();
    var entertainmentExpense = document.getElementById('entertainmentExpense').value.trim();
    var utilitiesExpense = document.getElementById('utilitiesExpense').value.trim();
    var isValid = true;

    if (monthlyIncome === '' || isNaN(monthlyIncome) || parseFloat(monthlyIncome) <= 0) {
      document.getElementById('monthlyIncomeError').innerHTML = 'Enter a valid monthly income';
      isValid = false;
    } else {
      document.getElementById('monthlyIncomeError').innerHTML = '';
    }

    if (rentExpense === '' || isNaN(rentExpense) || parseFloat(rentExpense) < 0) {
      document.getElementById('rentExpenseError').innerHTML = 'Enter a valid expense';
      isValid = false;
    } else {
      document.getElementById('rentExpenseError').innerHTML = '';
    }

    if (groceriesExpense === '' || isNaN(groceriesExpense) || parseFloat(groceriesExpense) < 0) {
      document.getElementById('groceriesExpenseError').innerHTML = 'Enter a valid expense';
      isValid = false;
    } else {
      document.getElementById('groceriesExpenseError').innerHTML = '';
    }

    if (transportationExpense === '' || isNaN(transportationExpense) || parseFloat(transportationExpense) < 0) {
      document.getElementById('transportationExpenseError').innerHTML = 'Enter a valid expense';
      isValid = false;
    } else {
      document.getElementById('transportationExpenseError').innerHTML = '';
    }

    if (entertainmentExpense === '' || isNaN(entertainmentExpense) || parseFloat(entertainmentExpense) < 0) {
      document.getElementById('entertainmentExpenseError').innerHTML = 'Enter a valid expense';
      isValid = false;
    } else {
      document.getElementById('entertainmentExpenseError').innerHTML = '';
    }

    if (utilitiesExpense === '' || isNaN(utilitiesExpense) || parseFloat(utilitiesExpense) < 0) {
      document.getElementById('utilitiesExpenseError').innerHTML = 'Enter a valid expense';
      isValid = false;
    } else {
      document.getElementById('utilitiesExpenseError').innerHTML = '';
    }

    return isValid;
  }
</script>
</head>
<body>
<h2>Monthly Budget Tracker</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()">
  <label for="monthlyIncome">Monthly Income:</label>
  <input type="number" id="monthlyIncome" name="monthlyIncome" min="0" required>
  <span class="error" id="monthlyIncomeError"></span><br>

  <label for="rentExpense">Rent Expense:</label>
  <input type="number" id="rentExpense" name="rentExpense" min="0" required>
  <span class="error" id="rentExpenseError"></span><br>

  <label for="groceriesExpense">Groceries Expense:</label>
  <input type="number" id="groceriesExpense" name="groceriesExpense" min="0" required>
  <span class="error" id="groceriesExpenseError"></span><br>

  <label for="transportationExpense">Transportation Expense:</label>
  <input type="number" id="transportationExpense" name="transportationExpense" min="0" required>
  <span class="error" id="transportationExpenseError"></span><br>

  <label for="entertainmentExpense">Entertainment Expense:</label>
  <input type="number" id="entertainmentExpense" name="entertainmentExpense" min="0" required>
  <span class="error" id="entertainmentExpenseError"></span><br>

  <label for="utilitiesExpense">Utilities Expense:</label>
  <input type="number" id="utilitiesExpense" name="utilitiesExpense" min="0" required>
  <span class="error" id="utilitiesExpenseError"></span><br>

  <input type="submit" value="Save Budget">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $monthlyIncome = $_POST["monthlyIncome"];
    $rentExpense = $_POST["rentExpense"];
    $groceriesExpense = $_POST["groceriesExpense"];
    $transportationExpense = $_POST["transportationExpense"];
    $entertainmentExpense = $_POST["entertainmentExpense"];
    $utilitiesExpense = $_POST["utilitiesExpense"];

    $totalExpenses = $rentExpense + $groceriesExpense + $transportationExpense + $entertainmentExpense + $utilitiesExpense;
    $remainingBudget = $monthlyIncome - $totalExpenses;

    echo "<h3>Budget Summary</h3>";
    echo "<p><strong>Monthly Income:</strong> $monthlyIncome</p>";
    echo "<p><strong>Rent Expense:</strong> $rentExpense</p>";
    echo "<p><strong>Groceries Expense:</strong> $groceriesExpense</p>";
    echo "<p><strong>Transportation Expense:</strong> $transportationExpense</p>";
    echo "<p><strong>Entertainment Expense:</strong> $entertainmentExpense</p>";
    echo "<p><strong>Utilities Expense:</strong> $utilitiesExpense</p>";
    echo "<p><strong>Total Expenses:</strong> $totalExpenses</p>";
    echo "<p><strong>Remaining Budget:</strong> $remainingBudget</p>";
}
?>
</body>
</html>
